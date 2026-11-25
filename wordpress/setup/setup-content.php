<?php
/**
 * Creates/updates the content for both network sites. Run with:
 *   wp eval-file wordpress/setup/setup-content.php --url=<main site url>
 * (install.sh does this). Idempotent: pages, menus and posts are matched by slug and updated.
 *
 * @package RTS
 */

if ( ! defined( 'WP_CLI' ) ) {
	exit;
}

require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

// Content includes inline SVG icons; store it as-is (as a super admin would).
kses_remove_filters();

$ote_id = get_main_site_id();
$rts    = get_site_by_path( get_network()->domain, get_network()->path . 'rts/' );
if ( ! $rts || (int) $rts->blog_id === (int) $ote_id ) {
	WP_CLI::error( 'The rts site was not found. Create it first: wp site create --slug=rts --title=Rts' );
}
$rts_id = (int) $rts->blog_id;
if ( 1 !== (int) $ote_id || 2 !== $rts_id ) {
	WP_CLI::warning( "Site IDs are OTE=$ote_id, RTS=$rts_id. Add define( 'RTG_OTE_BLOG_ID', $ote_id ); and define( 'RTG_RTS_BLOG_ID', $rts_id ); to wp-config.php." );
}
$ids = array( 'ote' => (int) $ote_id, 'rts' => $rts_id );

/** URL of a page on either site. */
function rtg_setup_url( $ids, $site, $slug ) {
	return trailingslashit( get_home_url( $ids[ $site ], '/' ) ) . ( $slug ? $slug . '/' : '' );
}

/** Create or update a page; returns its ID. */
function rtg_setup_page( $slug, $title, $template, $order ) {
	$existing = get_page_by_path( $slug, OBJECT, 'page' );
	$id       = wp_insert_post(
		wp_slash( array(
			'ID'           => $existing ? $existing->ID : 0,
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_name'    => $slug,
			'post_title'   => $title,
			'post_content' => $existing ? $existing->post_content : '',
			'menu_order'   => $order,
		) ),
		true
	);
	if ( is_wp_error( $id ) ) {
		WP_CLI::error( $id );
	}
	// Set directly: wp_insert_post would validate against the theme loaded for the main site.
	if ( $template ) {
		update_post_meta( $id, '_wp_page_template', $template );
	} else {
		delete_post_meta( $id, '_wp_page_template' );
	}
	return $id;
}

/**
 * Build a nav menu. Items: array( site, slug, label, class ). Same-site pages become page items.
 */
function rtg_setup_menu( $ids, $site, $name, $location, $items ) {
	$menu = wp_get_nav_menu_object( $name );
	$menu_id = $menu ? $menu->term_id : wp_create_nav_menu( $name );
	foreach ( (array) wp_get_nav_menu_items( $menu_id, array( 'post_status' => 'any' ) ) as $old ) {
		wp_delete_post( $old->ID, true );
	}
	foreach ( $items as $pos => $item ) {
		list( $isite, $slug, $label ) = $item;
		$args = array(
			'menu-item-title'    => $label,
			'menu-item-classes'  => isset( $item[3] ) ? $item[3] : '',
			'menu-item-status'   => 'publish',
			'menu-item-position' => $pos + 1,
		);
		$page = $isite === $site ? get_page_by_path( $slug, OBJECT, 'page' ) : null;
		if ( $page ) {
			$args += array( 'menu-item-type' => 'post_type', 'menu-item-object' => 'page', 'menu-item-object-id' => $page->ID );
		} else {
			$args += array( 'menu-item-type' => 'custom', 'menu-item-url' => rtg_setup_url( $ids, $isite, $slug ) );
		}
		wp_update_nav_menu_item( $menu_id, 0, $args );
	}
	$locations              = get_theme_mod( 'nav_menu_locations', array() );
	$locations[ $location ] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}

/** Remove the default "Hello world!" post and "Sample Page". */
function rtg_setup_remove_defaults() {
	foreach ( array( array( 'hello-world', 'post' ), array( 'sample-page', 'page' ) ) as $d ) {
		$p = get_page_by_path( $d[0], OBJECT, $d[1] );
		if ( $p ) {
			wp_delete_post( $p->ID, true );
		}
	}
	$privacy = (int) get_option( 'wp_page_for_privacy_policy' );
	if ( $privacy && 'draft' === get_post_status( $privacy ) ) {
		wp_delete_post( $privacy, true );
	}
}

/** Copy a theme image into the media library (once) and return the attachment ID. */
function rtg_setup_media( $file, $post_id ) {
	$found = get_posts( array( 'post_type' => 'attachment', 'meta_key' => '_rtg_source', 'meta_value' => basename( $file ), 'numberposts' => 1, 'fields' => 'ids' ) );
	if ( $found ) {
		return (int) $found[0];
	}
	$tmp = wp_tempnam( basename( $file ) );
	copy( $file, $tmp );
	$id = media_handle_sideload( array( 'name' => basename( $file ), 'tmp_name' => $tmp ), $post_id );
	if ( is_wp_error( $id ) ) {
		WP_CLI::warning( basename( $file ) . ': ' . $id->get_error_message() . ' (the theme copy will be used instead)' );
		@unlink( $tmp ); // phpcs:ignore WordPress.PHP.NoSilencedErrors
		return 0;
	}
	update_post_meta( $id, '_rtg_source', basename( $file ) );
	return $id;
}

/* ------------------------------------------------------------------ Site 1: Ote */
switch_to_blog( $ids['ote'] );
WP_CLI::log( 'Ote: pages' );
update_option( 'blogname', 'Ote' );
update_option( 'blogdescription', 'Ohio Truck Equipment · Truck bodies & upfitting, Mt Vernon, Ohio' );
update_option( 'permalink_structure', '/%postname%/' );
rtg_setup_remove_defaults();
$ote_home = rtg_setup_page( 'home', 'Home', 'page-templates/home.php', 0 );
rtg_setup_page( 'inventory', 'Body Inventory', 'page-templates/inventory.php', 1 );
rtg_setup_page( 'quote', 'Install Quote', 'page-templates/quote.php', 2 );
rtg_setup_page( 'tutorials', 'Tutorials & PDFs', 'page-templates/tutorials.php', 3 );
update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $ote_home );
update_option( 'page_for_posts', 0 );
restore_current_blog();

/* ------------------------------------------------------------------ Site 2: Rts */
switch_to_blog( $ids['rts'] );
WP_CLI::log( 'Rts: pages' );
update_option( 'blogname', 'Rts' );
update_option( 'blogdescription', "Robertson Truck Sales · Ohio's premiere used truck dealer" );
update_option( 'permalink_structure', '/%postname%/' );
rtg_setup_remove_defaults();
$rts_pages = array(
	array( 'home', 'Home', 'page-templates/home.php' ),
	array( 'inventory', 'Inventory', 'page-templates/inventory.php' ),
	array( 'trade', 'Value My Trade', 'page-templates/trade.php' ),
	array( 'capabilities', 'Capabilities', 'page-templates/capabilities.php' ),
	array( 'quote', 'Get a Quote', 'page-templates/quote.php' ),
	array( 'about', 'About Us', 'page-templates/about.php' ),
	array( 'gallery', 'Gallery', 'page-templates/gallery.php' ),
	array( 'blog', 'Blog', '' ),
	array( 'contact', 'Contact Us', 'page-templates/contact.php' ),
	array( 'rtg', 'Robertson Truck Group', 'page-templates/rtg.php' ),
	array( 'wheelbase-sheet', 'Wheelbase Sheet', 'page-templates/wheelbase-sheet.php' ),
	array( 'home-classic', 'Home (Classic)', 'page-templates/home-classic.php' ),
);
$rts_ids = array();
foreach ( $rts_pages as $i => $p ) {
	$rts_ids[ $p[0] ] = rtg_setup_page( $p[0], $p[1], $p[2], $i );
}
update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $rts_ids['home'] );
update_option( 'page_for_posts', $rts_ids['blog'] );

WP_CLI::log( 'Rts: blog posts' );
$posts = json_decode( file_get_contents( __DIR__ . '/data/blog-posts.json' ), true );
$theme = get_theme_root() . '/rts/assets/';
foreach ( $posts as $p ) {
	$cat = get_category_by_slug( $p['category_slug'] );
	$cat_id = $cat ? $cat->term_id : wp_insert_category( array( 'cat_name' => $p['category'], 'category_nicename' => $p['category_slug'] ) );
	$existing = get_page_by_path( $p['slug'], OBJECT, 'post' );
	$content  = isset( $p['content'] ) ? $p['content'] : '<p>' . esc_html( $p['excerpt'] ) . '…</p>';
	$id       = wp_insert_post(
		wp_slash( array(
			'ID'            => $existing ? $existing->ID : 0,
			'post_type'     => 'post',
			'post_status'   => 'publish',
			'post_name'     => $p['slug'],
			'post_title'    => $p['title'],
			'post_excerpt'  => $p['excerpt'],
			'post_content'  => $existing && empty( $p['content'] ) ? $existing->post_content : $content,
			'post_date'     => $p['date'],
			'post_category' => array( $cat_id ),
		) ),
		true
	);
	if ( is_wp_error( $id ) ) {
		WP_CLI::error( $id );
	}
	update_post_meta( $id, '_rtg_image', $p['image'] );
	update_post_meta( $id, '_rtg_read_time', $p['read_time'] );
	if ( ! empty( $p['source_url'] ) ) {
		update_post_meta( $id, '_rtg_source_url', $p['source_url'] ); // full article still to be migrated from here
	}
	if ( ! has_post_thumbnail( $id ) ) {
		$att = rtg_setup_media( $theme . $p['image'], $id );
		if ( $att ) {
			set_post_thumbnail( $id, $att );
		}
	}
}
$uncat = get_category_by_slug( 'uncategorized' );
if ( $uncat && 0 === (int) $uncat->count ) {
	update_option( 'default_category', get_category_by_slug( 'general' )->term_id );
	wp_delete_category( $uncat->term_id );
}

WP_CLI::log( 'Rts: menus' );
rtg_setup_menu(
	$ids,
	'rts',
	'RTS Main',
	'primary',
	array(
		array( 'rts', 'inventory', 'Inventory', 'nav__inv' ),
		array( 'rts', 'trade', 'Value My Trade' ),
		array( 'rts', 'capabilities', 'Capabilities' ),
		array( 'rts', 'about', 'About Us' ),
		array( 'rts', 'gallery', 'Gallery' ),
		array( 'rts', 'blog', 'Blog' ),
		array( 'rts', 'contact', 'Contact Us' ),
	)
);
rtg_setup_menu(
	$ids,
	'rts',
	'RTS Footer',
	'footer',
	array(
		array( 'rts', 'inventory', 'Inventory' ),
		array( 'rts', 'trade', 'Value My Trade' ),
		array( 'rts', 'capabilities', 'Capabilities' ),
		array( 'rts', 'about', 'About Us' ),
		array( 'rts', 'blog', 'Blog' ),
		array( 'rts', 'contact', 'Contact Us' ),
		array( 'rts', 'rtg', 'Robertson Truck Group' ),
	)
);
restore_current_blog();

/* Ote menus last, so links into the Rts site resolve to its pages. */
switch_to_blog( $ids['ote'] );
WP_CLI::log( 'Ote: menus' );
rtg_setup_menu(
	$ids,
	'ote',
	'OTE Main',
	'primary',
	array(
		array( 'ote', 'inventory', 'Body Inventory', 'nav__inv' ),
		array( 'ote', 'quote', 'Install Quote' ),
		array( 'ote', 'tutorials', 'Tutorials & PDFs' ),
		array( 'rts', 'capabilities', 'Capabilities' ),
		array( 'rts', 'inventory', 'Truck Inventory' ),
		array( 'rts', 'contact', 'Contact Us' ),
	)
);
rtg_setup_menu(
	$ids,
	'ote',
	'OTE Footer',
	'footer',
	array(
		array( 'ote', 'inventory', 'Body Inventory' ),
		array( 'ote', 'quote', 'Install Quote' ),
		array( 'ote', 'tutorials', 'Tutorials & PDFs' ),
		array( 'rts', 'capabilities', 'Capabilities' ),
		array( 'rts', 'contact', 'Contact Us' ),
		array( 'rts', 'rtg', 'Robertson Truck Group' ),
	)
);
restore_current_blog();

WP_CLI::success( 'Content ready on both sites.' );

<?php
/**
 * URL, asset and page-config helpers shared by both sites.
 *
 * Page templates refer to other pages by site + slug ( rtg_url( 'rts', 'inventory' ) ) and to files by
 * asset reference ( 'images/x.jpg' = current theme, 'rts:images/x.jpg' = RTS theme, 'ote:...' = OTE theme ),
 * so links keep working across both network sites and any domain.
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Home URL of a network site, with a trailing slash. Cached per request.
 *
 * @param string $site 'rts' or 'ote'.
 */
function rtg_site_home( $site ) {
	static $homes = array();
	if ( ! isset( $homes[ $site ] ) ) {
		$id              = 'ote' === $site ? RTG_OTE_BLOG_ID : RTG_RTS_BLOG_ID;
		$homes[ $site ] = trailingslashit( is_multisite() ? get_home_url( $id, '/' ) : home_url( '/' ) );
	}
	return $homes[ $site ];
}

/**
 * URL of a page on either site, e.g. rtg_url( 'rts', 'inventory' ). An empty slug is the site home.
 *
 * @param string $site 'rts' or 'ote'.
 * @param string $slug Page slug (path below the site home).
 */
function rtg_url( $site, $slug = '' ) {
	$slug = trim( $slug, '/' );
	return rtg_site_home( $site ) . ( '' === $slug ? '' : $slug . '/' );
}

/** Echo rtg_url(), escaped. */
function rtg_u( $site, $slug = '' ) {
	echo esc_url( rtg_url( $site, $slug ) );
}

/**
 * URL of a theme asset.
 *
 * @param string $ref 'path' (current theme), 'rts:path' or 'ote:path'.
 */
function rtg_asset( $ref ) {
	if ( preg_match( '#^(https?:)?//#', $ref ) ) {
		return $ref;
	}
	if ( 0 === strpos( $ref, 'rts:' ) ) {
		return get_template_directory_uri() . '/assets/' . substr( $ref, 4 );
	}
	if ( 0 === strpos( $ref, 'ote:' ) ) {
		return get_theme_root_uri() . '/ote/assets/' . substr( $ref, 4 );
	}
	return get_stylesheet_directory_uri() . '/assets/' . $ref;
}

/** Echo rtg_asset(), escaped. */
function rtg_a( $ref ) {
	echo esc_url( rtg_asset( $ref ) );
}

/** Filesystem path of a theme asset (for cache-busting versions). */
function rtg_asset_path( $ref ) {
	if ( 0 === strpos( $ref, 'rts:' ) ) {
		return get_template_directory() . '/assets/' . substr( $ref, 4 );
	}
	if ( 0 === strpos( $ref, 'ote:' ) ) {
		return get_theme_root() . '/ote/assets/' . substr( $ref, 4 );
	}
	return get_stylesheet_directory() . '/assets/' . $ref;
}

/**
 * Resolve {{u:site:slug}} and {{a:ref}} tokens used inside inline scripts.
 *
 * @param string $code JavaScript.
 */
function rtg_resolve_tokens( $code ) {
	$code = preg_replace_callback(
		'/\{\{u:(rts|ote):([a-z0-9-]*)\}\}/',
		function ( $m ) {
			return esc_url_raw( rtg_url( $m[1], $m[2] ) );
		},
		$code
	);
	return preg_replace_callback(
		'/\{\{a:([^}]+)\}\}/',
		function ( $m ) {
			return esc_url_raw( rtg_asset( $m[1] ) );
		},
		$code
	);
}

/**
 * Contact details for each company.
 *
 * @param string $site 'rts' or 'ote'.
 */
function rtg_contact( $site ) {
	$contacts = array(
		'rts' => array(
			'phone'   => '740-397-4969',
			'tel'     => '7403974969',
			'address' => '8920 Columbus Rd., Mount Vernon, OH 43050',
		),
		'ote' => array(
			'phone'   => '740-830-6488',
			'tel'     => '7408306488',
			'address' => 'Ohio Truck Equipment · 8895 Columbus Rd, Mt Vernon, OH 43050',
		),
	);
	return apply_filters( 'rtg_contact', $contacts[ 'ote' === $site ? 'ote' : 'rts' ], $site );
}

/**
 * Declare the current page's head data and assets. Called at the top of a page template, before get_header().
 *
 * Keys: title, description, body_class, theme_color, noindex, fonts (bool), styles (asset refs),
 * scripts (asset refs, external URLs, or array( 'inline' => js ) entries; order is preserved).
 *
 * @param array $config Page config.
 */
function rtg_page( array $config ) {
	$GLOBALS['rtg_page'] = wp_parse_args(
		$config,
		array(
			'title'       => '',
			'description' => '',
			'body_class'  => '',
			'theme_color' => '#050a1a',
			'noindex'     => false,
			'fonts'       => true,
			'styles'      => array(),
			'scripts'     => array(),
		)
	);
}

/** The current page config, or the brand's default page config for generic templates. */
function rtg_page_config() {
	if ( empty( $GLOBALS['rtg_page'] ) ) {
		rtg_page( rtg_brand( 'default_page' ) );
		$GLOBALS['rtg_page']['generic'] = true;
	}
	return apply_filters( 'rtg_page_config', $GLOBALS['rtg_page'] );
}

/** URL of the page being viewed, used to mark the active menu item. */
function rtg_current_url() {
	if ( is_front_page() ) {
		return home_url( '/' );
	}
	if ( is_home() || is_singular( 'post' ) || is_category() ) {
		$blog = (int) get_option( 'page_for_posts' );
		return $blog ? get_permalink( $blog ) : home_url( '/' );
	}
	if ( is_singular() ) {
		return get_permalink();
	}
	return '';
}

/** Same URL, ignoring scheme, trailing slash and query string. */
function rtg_same_url( $a, $b ) {
	$norm = function ( $u ) {
		$u = preg_replace( '#^https?:#', '', strtok( (string) $u, '?#' ) );
		return untrailingslashit( $u );
	};
	return '' !== $norm( $a ) && $norm( $a ) === $norm( $b );
}

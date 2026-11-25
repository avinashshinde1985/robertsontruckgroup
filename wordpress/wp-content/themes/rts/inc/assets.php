<?php
/**
 * Enqueues each page template's CSS/JS (declared with rtg_page()) and prints its head data.
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

/** Script/style handle for an asset reference. */
function rtg_handle( $ref ) {
	return 'rtg-' . sanitize_title( str_replace( array( ':', '/', '.' ), '-', preg_replace( '#^https?://#', '', $ref ) ) );
}

/** Version string for an asset (file mtime for local files). */
function rtg_ver( $ref ) {
	if ( preg_match( '#^(https?:)?//#', $ref ) ) {
		return null;
	}
	$file = rtg_asset_path( $ref );
	return file_exists( $file ) ? (string) filemtime( $file ) : wp_get_theme()->get( 'Version' );
}

add_action(
	'wp_enqueue_scripts',
	function () {
		$page = rtg_page_config();

		if ( $page['fonts'] ) {
			wp_enqueue_style(
				'rtg-fonts',
				'https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@600;700;800;900&family=Manrope:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500&display=swap',
				array(),
				null
			);
		}

		$prev = $page['fonts'] ? array( 'rtg-fonts' ) : array();
		foreach ( $page['styles'] as $ref ) {
			$handle = rtg_handle( $ref );
			wp_enqueue_style( $handle, rtg_asset( $ref ), $prev, rtg_ver( $ref ) );
			$prev = array( $handle );
		}

		// Scripts keep the static page's order: each one depends on the one before it.
		// Inline blocks attach "before" the next file, or "after" the last one.
		$prev    = array();
		$pending = array();
		$last    = null;
		foreach ( $page['scripts'] as $entry ) {
			if ( is_array( $entry ) ) {
				$pending[] = rtg_resolve_tokens( $entry['inline'] );
				continue;
			}
			$handle = rtg_handle( $entry );
			wp_enqueue_script( $handle, rtg_asset( $entry ), $prev, rtg_ver( $entry ), true );
			foreach ( $pending as $code ) {
				wp_add_inline_script( $handle, $code, 'before' );
			}
			$pending = array();
			$prev    = array( $handle );
			$last    = $handle;
		}
		if ( $pending ) {
			if ( ! $last ) {
				$last = 'rtg-inline';
				wp_register_script( $last, false, array(), null, true );
				wp_enqueue_script( $last );
			}
			foreach ( $pending as $code ) {
				wp_add_inline_script( $last, $code, 'after' );
			}
		}

		// The converted designs ship their own styles; drop the block editor CSS on those pages.
		if ( empty( $page['generic'] ) ) {
			foreach ( array( 'wp-block-library', 'wp-block-library-theme', 'classic-theme-styles', 'global-styles' ) as $h ) {
				wp_dequeue_style( $h );
			}
		}
	},
	20
);

/* Head: meta, favicon and the site paths the shared JS uses to build links. */
add_action(
	'wp_head',
	function () {
		$page = rtg_page_config();
		printf( '<meta name="theme-color" content="%s">' . "\n", esc_attr( $page['theme_color'] ) );
		if ( $page['description'] ) {
			printf( '<meta name="description" content="%s">' . "\n", esc_attr( $page['description'] ) );
		}
		if ( ! has_site_icon() ) {
			printf( '<link rel="icon" type="image/png" href="%s">' . "\n", esc_url( rtg_asset( 'rts:images/favicon.png' ) ) );
		}
		$paths = array(
			'rts'       => rtg_url( 'rts' ),
			'ote'       => rtg_url( 'ote' ),
			'assets'    => rtg_asset( 'rts:' ),
			'oteAssets' => rtg_asset( 'ote:' ),
		);
		wp_print_inline_script_tag( 'window.RTG_PATHS = ' . wp_json_encode( $paths, JSON_UNESCAPED_SLASHES ) . ';' );
	},
	1
);

/* Fixed/sticky headers sit below the admin bar when logged in. */
add_action(
	'wp_head',
	function () {
		if ( ! is_admin_bar_showing() ) {
			return;
		}
		echo '<style id="rtg-admin-bar">body.admin-bar .nav{top:50px}body.admin-bar .header{top:32px}' .
			'@media screen and (max-width:782px){body.admin-bar .nav{top:64px}body.admin-bar .header{top:46px}}' .
			'@media screen and (max-width:600px){body.admin-bar .nav{top:18px}body.admin-bar .header{top:0}}</style>' . "\n";
	},
	100
);

/* The static design's exact <title>, when the template declares one. */
add_filter(
	'pre_get_document_title',
	function ( $title ) {
		$page = rtg_page_config();
		return $page['title'] ? $page['title'] : $title;
	}
);

add_filter(
	'body_class',
	function ( $classes ) {
		$page = rtg_page_config();
		if ( $page['body_class'] ) {
			$classes = array_merge( $classes, preg_split( '/\s+/', trim( $page['body_class'] ) ) );
		}
		return $classes;
	}
);

add_filter(
	'wp_robots',
	function ( $robots ) {
		$page = rtg_page_config();
		if ( $page['noindex'] ) {
			$robots['noindex'] = true;
		}
		return $robots;
	}
);

<?php
/**
 * Robertson Truck Sales theme (parent of the Ohio Truck Equipment child theme).
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

/*
 * Network layout. Site 1 is Ohio Truck Equipment (the main site), site 2 is Robertson Truck Sales.
 * Override in wp-config.php if the sites are ever created with other IDs.
 */
if ( ! defined( 'RTG_OTE_BLOG_ID' ) ) {
	define( 'RTG_OTE_BLOG_ID', 1 );
}
if ( ! defined( 'RTG_RTS_BLOG_ID' ) ) {
	define( 'RTG_RTS_BLOG_ID', 2 );
}

require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/brand.php';
require get_template_directory() . '/inc/assets.php';
require get_template_directory() . '/inc/menus.php';
require get_template_directory() . '/inc/blog.php';
require get_template_directory() . '/inc/fields.php';

add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
		register_nav_menus(
			array(
				'primary' => __( 'Main navigation', 'rts' ),
				'footer'  => __( 'Footer navigation', 'rts' ),
			)
		);
	}
);

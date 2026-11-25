<?php
/**
 * Ohio Truck Equipment child theme. Everything shared lives in the parent (rts) theme;
 * this file only swaps the branding and menus.
 *
 * @package OTE
 */

defined( 'ABSPATH' ) || exit;

add_filter(
	'rtg_brand',
	function ( $brand ) {
		$brand['site']         = 'ote';
		$brand['name']         = 'Ohio Truck Equipment';
		$brand['nav_logo']     = array( 'src' => 'images/ote-logo-white.svg', 'w' => 155, 'h' => 40 );
		$brand['footer_logo']  = array( 'src' => 'images/ote-logo-white.svg', 'w' => 200, 'h' => 52 );
		$brand['menus']        = array(
			'primary' => array(
				array( 'ote', 'inventory', 'Body Inventory', 'nav__inv' ),
				array( 'ote', 'quote', 'Install Quote' ),
				array( 'ote', 'tutorials', 'Tutorials & PDFs' ),
				array( 'rts', 'capabilities', 'Capabilities' ),
				array( 'rts', 'inventory', 'Truck Inventory' ),
				array( 'rts', 'contact', 'Contact Us' ),
			),
			'footer'  => array(
				array( 'ote', 'inventory', 'Body Inventory' ),
				array( 'ote', 'quote', 'Install Quote' ),
				array( 'ote', 'tutorials', 'Tutorials & PDFs' ),
				array( 'rts', 'capabilities', 'Capabilities' ),
				array( 'rts', 'contact', 'Contact Us' ),
				array( 'rts', 'rtg', 'Robertson Truck Group' ),
			),
		);
		$brand['default_page'] = array(
			'styles'  => array( 'rts:css/v2.css', 'rts:css/site.css', 'rts:css/chat.css', 'css/ote.css', 'rts:css/wp-content.css' ),
			'scripts' => array( 'js/bodies-data.js', 'rts:js/inventory-data.js', 'rts:js/chat.js', 'rts:js/site.js' ),
		);
		return $brand;
	}
);

/* Only offer this site's page designs in the editor's Template picker, not the RTS ones. */
add_filter(
	'theme_page_templates',
	function ( $templates ) {
		$own = array();
		foreach ( glob( get_stylesheet_directory() . '/page-templates/*.php' ) as $file ) {
			$own[] = 'page-templates/' . basename( $file );
		}
		return array_intersect_key( $templates, array_flip( $own ) );
	}
);

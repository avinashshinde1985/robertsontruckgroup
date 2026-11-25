<?php
/**
 * Per-site branding. The OTE child theme overrides this through the `rtg_brand` filter.
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Brand settings for the active site.
 *
 * @param string|null $key Setting name, or null for all.
 */
function rtg_brand( $key = null ) {
	static $brand = null;
	if ( null === $brand ) {
		$brand = apply_filters(
			'rtg_brand',
			array(
				'site'         => 'rts',
				'name'         => 'Robertson Truck Sales',
				'nav_logo'     => array( 'src' => 'rts:images/rts-logo-white.svg', 'w' => 170, 'h' => 46 ),
				'footer_logo'  => array( 'src' => 'rts:images/rts-logo-white.svg', 'w' => 220, 'h' => 59 ),
				// Default menu items, used until menus are assigned under Appearance → Menus.
				// Each item: site, slug, label, optional class.
				'menus'        => array(
					'primary' => array(
						array( 'rts', 'inventory', 'Inventory', 'nav__inv' ),
						array( 'rts', 'trade', 'Value My Trade' ),
						array( 'rts', 'capabilities', 'Capabilities' ),
						array( 'rts', 'about', 'About Us' ),
						array( 'rts', 'gallery', 'Gallery' ),
						array( 'rts', 'blog', 'Blog' ),
						array( 'rts', 'contact', 'Contact Us' ),
					),
					'footer'  => array(
						array( 'rts', 'inventory', 'Inventory' ),
						array( 'rts', 'trade', 'Value My Trade' ),
						array( 'rts', 'capabilities', 'Capabilities' ),
						array( 'rts', 'about', 'About Us' ),
						array( 'rts', 'blog', 'Blog' ),
						array( 'rts', 'contact', 'Contact Us' ),
						array( 'rts', 'rtg', 'Robertson Truck Group' ),
					),
				),
				// Assets for templates that do not declare their own (page.php, index.php, 404.php).
				'default_page' => array(
					'styles'  => array( 'rts:css/v2.css', 'rts:css/site.css', 'rts:css/chat.css', 'rts:css/wp-content.css' ),
					'scripts' => array( 'rts:js/inventory-data.js', 'rts:js/chat.js', 'rts:js/site.js' ),
				),
			)
		);
	}
	if ( null === $key ) {
		return $brand;
	}
	return isset( $brand[ $key ] ) ? $brand[ $key ] : null;
}

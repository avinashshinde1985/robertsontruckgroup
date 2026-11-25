<?php
/**
 * Menu data for the hand-built nav/footer markup. Uses the menu assigned under Appearance → Menus,
 * or the brand defaults until one is assigned.
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Top-level items of a menu location.
 *
 * @param string $location 'primary' or 'footer'.
 * @return array[] Each: url, label, class.
 */
function rtg_menu_items( $location ) {
	$locations = get_nav_menu_locations();
	if ( ! empty( $locations[ $location ] ) ) {
		$items = wp_get_nav_menu_items( $locations[ $location ] );
		if ( $items ) {
			$out = array();
			foreach ( $items as $item ) {
				if ( (int) $item->menu_item_parent ) {
					continue;
				}
				$out[] = array(
					'url'   => $item->url,
					'label' => $item->title,
					'class' => trim( implode( ' ', array_filter( (array) $item->classes ) ) ),
				);
			}
			return $out;
		}
	}

	$defaults = rtg_brand( 'menus' );
	$out      = array();
	foreach ( (array) ( isset( $defaults[ $location ] ) ? $defaults[ $location ] : array() ) as $d ) {
		$out[] = array(
			'url'   => rtg_url( $d[0], $d[1] ),
			'label' => $d[2],
			'class' => isset( $d[3] ) ? $d[3] : '',
		);
	}
	return $out;
}

/**
 * Attributes for a nav link: class list plus is-active / aria-current.
 *
 * @param array  $item   Menu item.
 * @param string $active URL of the section to highlight.
 * @param string $extra  Extra classes.
 */
function rtg_nav_attrs( $item, $active, $extra = '' ) {
	$classes = trim( $item['class'] . ' ' . $extra );
	$current = '';
	if ( $active && rtg_same_url( $item['url'], $active ) ) {
		$classes .= ' is-active';
		if ( rtg_same_url( $item['url'], rtg_current_url() ) ) {
			$current = ' aria-current="page"';
		}
	}
	$classes = trim( $classes );
	return ( $classes ? ' class="' . esc_attr( $classes ) . '"' : '' ) . $current;
}

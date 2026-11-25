<?php
/**
 * Editable page content with Advanced Custom Fields (works with the free version).
 *
 * Each page template has a schema file, fields/<template>.php (child theme first, then parent), returning:
 *
 *   array(
 *     'title'    => 'About page',                       // field group title in the editor
 *     'location' => array( ... ),                       // optional ACF location; default: this page template
 *     'tabs'     => array(
 *       'Hero' => array(
 *         'hero_title' => array( 'type' => 'text', 'label' => 'Heading', 'default' => 'Ohio\'s <span class="hl">best</span>' ),
 *         'hero_image' => array( 'type' => 'image', 'label' => 'Background', 'default' => 'images/about/hero.jpg' ),
 *         'hero_btn'   => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:inventory' ),
 *         'stats'      => array(                         // repeated items: groups stats_1 .. stats_N
 *           'type'   => 'items',
 *           'label'  => 'Stat',
 *           'spare'  => 2,                               // extra empty slots editors can fill in
 *           'fields' => array( 'num' => array( 'type' => 'text', 'label' => 'Number' ), ... ),
 *           'items'  => array( array( 'num' => '1984', ... ), ... ),   // defaults, one per item
 *         ),
 *       ),
 *     ),
 *   );
 *
 * Field types: text (one line, inline HTML allowed), textarea (plain multi-line, output as is),
 * html (multi-line HTML, e.g. several <p>), wysiwyg (rich editor), image (default = theme asset ref, value = URL),
 * link (see rtg_link()), and items.
 *
 * Values are read straight from post meta, so a page that was never saved, or a site without ACF, renders the
 * defaults (= the original static design). ACF only provides the editing screens.
 *
 * Templates read values with rtg_f( 'name' ) / rtg_e( 'name' ) and rtg_items( 'name' ).
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

/**
 * Schema files that apply to the current site, keyed by template basename (child theme overrides parent).
 *
 * @return array<string,string> basename => file path
 */
function rtg_field_schema_files() {
	$files = array();
	foreach ( array_unique( array( get_template_directory(), get_stylesheet_directory() ) ) as $dir ) {
		foreach ( (array) glob( $dir . '/fields/*.php' ) as $file ) {
			$files[ basename( $file, '.php' ) ] = $file;
		}
	}
	return $files;
}

/**
 * A template's schema (cached).
 *
 * @param string $name Template basename, e.g. 'about'.
 * @return array|null
 */
function rtg_field_schema( $name ) {
	static $cache = array();
	if ( ! array_key_exists( $name, $cache ) ) {
		$files            = rtg_field_schema_files();
		$cache[ $name ] = isset( $files[ $name ] ) ? include $files[ $name ] : null;
	}
	return $cache[ $name ];
}

/** Basename of the template being rendered, set by rtg_fields_for(). */
function rtg_fields_template( $set = null ) {
	static $current = null;
	if ( null !== $set ) {
		$current = $set;
	}
	return $current;
}

/**
 * Declare which schema the rest of the template reads from. Call once near the top of a page template.
 *
 * @param string $name Schema basename (fields/<name>.php).
 */
function rtg_fields_for( $name ) {
	rtg_fields_template( $name );
}

/** Flat map of field name => definition for the current schema (items included). */
function rtg_field_defs() {
	$schema = rtg_field_schema( (string) rtg_fields_template() );
	$defs   = array();
	foreach ( ( $schema['tabs'] ?? array() ) as $fields ) {
		$defs += $fields;
	}
	return $defs;
}

/** Post that holds the current page's field values. */
function rtg_fields_post_id() {
	return (int) get_queried_object_id();
}

/** 'ote' or 'rts' for the current site. */
function rtg_current_site() {
	return ( is_multisite() && (int) get_current_blog_id() === (int) RTG_OTE_BLOG_ID ) ? 'ote' : 'rts';
}

/**
 * Resolve a link field value to a URL.
 *
 *   rts:inventory, ote:quote, rts:contact#form, rts:   page on a site (rts: alone = home page)
 *   inventory, about/                                   page slug on the current site
 *   https://..., /path, #anchor, tel:..., mailto:...    used as is
 *
 * @param string $value Link value.
 * @return string
 */
function rtg_link( $value ) {
	$value = trim( (string) $value );
	$site  = rtg_current_site();
	if ( preg_match( '~^(rts|ote):(.*)$~', $value, $m ) ) {
		$site  = $m[1];
		$value = $m[2];
	} elseif ( '' === $value || preg_match( '~^([a-z][a-z0-9+.-]*:|[#/?])~i', $value ) ) {
		return $value;
	}
	preg_match( '~^([^#?]*)(.*)$~', $value, $m );
	return rtg_url( $site, trim( $m[1], '/' ) ) . $m[2];
}

/**
 * Turn a stored (or default) value into output-ready form.
 *
 * @param array $def      Field definition.
 * @param mixed $raw      Stored value, or null when the field was never saved.
 * @return string
 */
function rtg_field_value( array $def, $raw ) {
	$type    = $def['type'] ?? 'text';
	$default = $def['default'] ?? '';
	if ( 'image' === $type ) {
		$url = $raw ? wp_get_attachment_image_url( (int) $raw, 'full' ) : '';
		return $url ? $url : ( '' === $default ? '' : rtg_asset( $default ) );
	}
	if ( 'link' === $type ) {
		return rtg_link( null === $raw ? $default : $raw );
	}
	if ( 'toggle' === $type ) {
		return ( null === $raw ? ! empty( $default ) : (bool) $raw ) ? '1' : '';
	}
	if ( 'select' === $type ) {
		$value = null === $raw ? (string) $default : (string) $raw;
		return array_key_exists( $value, $def['choices'] ?? array() ) ? $value : (string) $default;
	}
	if ( null === $raw ) {
		return (string) $default; // Defaults come from the theme and are trusted HTML.
	}
	$raw = (string) $raw;
	if ( 'wysiwyg' === $type ) {
		return wpautop( wp_kses_post( $raw ) );
	}
	if ( 'textarea' === $type ) {
		return esc_html( $raw );
	}
	return wp_kses_post( $raw );
}

/**
 * Raw stored meta value, or null when never saved.
 *
 * @param string $key Meta key.
 */
function rtg_field_raw( $key ) {
	$post_id = rtg_fields_post_id();
	if ( ! $post_id || ! metadata_exists( 'post', $post_id, $key ) ) {
		return null;
	}
	return get_post_meta( $post_id, $key, true );
}

/**
 * A field's output-ready value: HTML for text types, a URL for image and link fields.
 *
 * @param string $name Field name.
 * @return string
 */
function rtg_f( $name ) {
	$defs = rtg_field_defs();
	if ( ! isset( $defs[ $name ] ) ) {
		_doing_it_wrong( __FUNCTION__, esc_html( "Unknown field '$name' in fields/" . rtg_fields_template() . '.php' ), '' );
		return '';
	}
	return rtg_field_value( $defs[ $name ], rtg_field_raw( $name ) );
}

/** Echo a field (text types are already sanitised; use esc_url()/esc_attr() for image and link fields). */
function rtg_e( $name ) {
	echo rtg_f( $name ); // phpcs:ignore WordPress.Security.EscapeOutput -- sanitised in rtg_field_value().
}

/**
 * Text for use inside an attribute (alt, aria-label, data-*): tags stripped, escaped.
 *
 * @param string $value Field value.
 */
function rtg_attr( $value ) {
	return esc_attr( wp_strip_all_tags( (string) $value ) );
}

/**
 * Repeated items as a list of output-ready arrays. Items whose first sub-field is empty are skipped.
 *
 * @param string $name Items field name.
 * @return array<int,array<string,string>>
 */
function rtg_items( $name ) {
	$defs = rtg_field_defs();
	$def  = $defs[ $name ] ?? null;
	if ( ! $def || 'items' !== ( $def['type'] ?? '' ) ) {
		_doing_it_wrong( __FUNCTION__, esc_html( "Unknown items field '$name'" ), '' );
		return array();
	}
	$out   = array();
	$count = count( $def['items'] ?? array() ) + (int) ( $def['spare'] ?? 0 );
	$first = array_key_first( $def['fields'] );
	for ( $i = 1; $i <= $count; $i++ ) {
		$item = array();
		foreach ( $def['fields'] as $sub => $sub_def ) {
			$sub_def['default'] = $def['items'][ $i - 1 ][ $sub ] ?? '';
			$item[ $sub ]       = rtg_field_value( $sub_def, rtg_field_raw( "{$name}_{$i}_{$sub}" ) );
		}
		if ( '' !== trim( wp_strip_all_tags( $item[ $first ] ) ) || ( 'image' === ( $def['fields'][ $first ]['type'] ?? '' ) && '' !== $item[ $first ] ) ) {
			$out[] = $item;
		}
	}
	return $out;
}

/* -------------------------------------------------------------------------------------------------------------
 * ACF registration
 * ---------------------------------------------------------------------------------------------------------- */

/**
 * One schema field as an ACF field array.
 *
 * @param string $group   Group key prefix (unique per schema).
 * @param string $name    Field name.
 * @param array  $def     Definition.
 * @param mixed  $default Default override (for item sub-fields).
 * @return array
 */
function rtg_acf_field( $group, $name, array $def, $default = null ) {
	$type    = $def['type'] ?? 'text';
	$default = null === $default ? ( $def['default'] ?? '' ) : $default;
	$field   = array(
		'key'          => 'field_' . md5( $group . '|' . $name ),
		'name'         => $name,
		'label'        => $def['label'] ?? ucwords( str_replace( '_', ' ', $name ) ),
		'instructions' => $def['help'] ?? '',
		'wrapper'      => array( 'width' => $def['width'] ?? '' ),
	);
	switch ( $type ) {
		case 'image':
			$field += array(
				'type'          => 'image',
				'return_format' => 'id',
				'preview_size'  => 'medium',
				'library'       => 'all',
			);
			if ( '' !== $default ) {
				$field['instructions'] = trim( $field['instructions'] . ' Leave empty to use the design image (' . basename( $default ) . ').' );
			}
			break;
		case 'link':
			$field += array(
				'type'          => 'text',
				'default_value' => $default,
			);
			$field['instructions'] = trim( $field['instructions'] . ' A full URL, #anchor, tel:/mailto:, or a page as rts:slug / ote:slug.' );
			break;
		case 'toggle':
			$field += array(
				'type'          => 'true_false',
				'ui'            => 1,
				'default_value' => empty( $default ) ? 0 : 1,
			);
			break;
		case 'select':
			$field += array(
				'type'          => 'select',
				'choices'       => $def['choices'] ?? array(),
				'default_value' => $default,
				'allow_null'    => 0,
				'return_format' => 'value',
			);
			break;
		case 'wysiwyg':
			$field += array(
				'type'          => 'wysiwyg',
				'default_value' => $default,
				'tabs'          => 'all',
				'toolbar'       => 'basic',
				'media_upload'  => 0,
			);
			break;
		case 'html':
		case 'textarea':
			$field += array(
				'type'          => 'textarea',
				'default_value' => $default,
				'rows'          => $def['rows'] ?? 4,
				'new_lines'     => '',
			);
			if ( 'html' === $type ) {
				$field['instructions'] = trim( $field['instructions'] . ' HTML allowed.' );
			}
			break;
		default:
			$field += array(
				'type'          => 'text',
				'default_value' => $default,
			);
	}
	return $field;
}

/**
 * Register one schema as an ACF field group.
 *
 * @param string $name   Schema basename.
 * @param array  $schema Schema.
 */
function rtg_acf_register_schema( $name, array $schema ) {
	$group  = 'rtg_' . $name;
	$fields = array();
	foreach ( $schema['tabs'] as $tab => $defs ) {
		$fields[] = array(
			'key'       => 'field_' . md5( $group . '|tab|' . $tab ),
			'label'     => $tab,
			'name'      => '',
			'type'      => 'tab',
			'placement' => 'left',
		);
		foreach ( $defs as $field_name => $def ) {
			if ( 'items' !== ( $def['type'] ?? '' ) ) {
				$fields[] = rtg_acf_field( $group, $field_name, $def );
				continue;
			}
			$count = count( $def['items'] ?? array() ) + (int) ( $def['spare'] ?? 0 );
			for ( $i = 1; $i <= $count; $i++ ) {
				$subs = array();
				foreach ( $def['fields'] as $sub => $sub_def ) {
					$subs[] = rtg_acf_field( $group . "|{$field_name}_{$i}", $sub, $sub_def, $def['items'][ $i - 1 ][ $sub ] ?? '' );
				}
				$is_spare = $i > count( $def['items'] ?? array() );
				$fields[] = array(
					'key'          => 'field_' . md5( $group . '|' . $field_name . '_' . $i ),
					'name'         => "{$field_name}_{$i}",
					'label'        => ( $def['label'] ?? $field_name ) . " $i" . ( $is_spare ? ' (optional)' : '' ),
					'instructions' => 1 === $i ? 'Clear the first field of an item to hide it.' : '',
					'type'         => 'group',
					'layout'       => 'block',
					'sub_fields'   => $subs,
				);
			}
		}
	}

	// SEO overrides for every converted page.
	$fields[] = array(
		'key'       => 'field_' . md5( $group . '|tab|seo' ),
		'label'     => 'SEO',
		'name'      => '',
		'type'      => 'tab',
		'placement' => 'left',
	);
	$fields[] = rtg_acf_field( $group, 'rtg_seo_title', array( 'label' => 'Browser title', 'help' => 'Leave empty to use the design title.' ) );
	$fields[] = rtg_acf_field( $group, 'rtg_seo_description', array( 'type' => 'textarea', 'label' => 'Meta description', 'help' => 'Leave empty to use the design description.', 'rows' => 3 ) );

	acf_add_local_field_group(
		array(
			'key'            => 'group_' . $group,
			'title'          => $schema['title'] ?? ucfirst( $name ) . ' content',
			'fields'         => $fields,
			'location'       => $schema['location'] ?? array(
				array(
					array(
						'param'    => 'page_template',
						'operator' => '==',
						'value'    => 'page-templates/' . $name . '.php',
					),
				),
			),
			'position'       => 'normal',
			'style'          => 'default',
			'hide_on_screen' => array( 'the_content' ),
		)
	);
}

add_action(
	'acf/init',
	function () {
		foreach ( array_keys( rtg_field_schema_files() ) as $name ) {
			$schema = rtg_field_schema( $name );
			if ( is_array( $schema ) && ! empty( $schema['tabs'] ) ) {
				rtg_acf_register_schema( $name, $schema );
			}
		}
	}
);

/** Pages built from a converted template, or the posts page, which has a schema. */
function rtg_post_has_schema( $post ) {
	$post = get_post( $post );
	if ( ! $post || 'page' !== $post->post_type ) {
		return false;
	}
	$template = (string) get_page_template_slug( $post );
	if ( $template && rtg_field_schema( basename( $template, '.php' ) ) ) {
		return true;
	}
	return (int) get_option( 'page_for_posts' ) === (int) $post->ID && rtg_field_schema( 'blog' );
}

// Converted pages are edited through their fields, so use the classic screen (no block editor, no content box).
add_filter(
	'use_block_editor_for_post',
	function ( $use, $post ) {
		return rtg_post_has_schema( $post ) ? false : $use;
	},
	10,
	2
);

// SEO overrides.
add_action(
	'wp',
	function () {
		if ( ! ( is_page() || is_home() ) || ! rtg_fields_post_id() ) {
			return;
		}
		add_filter(
			'rtg_page_config',
			function ( $config ) {
				$post_id = rtg_fields_post_id();
				foreach ( array( 'title' => 'rtg_seo_title', 'description' => 'rtg_seo_description' ) as $key => $meta ) {
					$value = trim( (string) get_post_meta( $post_id, $meta, true ) );
					if ( '' !== $value ) {
						// The title is printed unescaped by core when a pre_get_document_title filter supplies it.
						$config[ $key ] = 'title' === $key ? esc_html( $value ) : $value;
					}
				}
				return $config;
			}
		);
	}
);

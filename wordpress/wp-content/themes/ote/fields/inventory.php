<?php
/**
 * Fields for page-templates/inventory.php (Ohio Truck Equipment body inventory). See rts/inc/fields.php for the format.
 *
 * The listing itself (filters, results, detail dialog) is rendered by js/bodies.js and is not edited here.
 *
 * @package OTE
 */

return array(
	'title' => 'Body inventory page',
	'tabs'  => array(
		'Page head'     => array(
			'head_crumb' => array( 'label' => 'Breadcrumb label', 'default' => 'Body Inventory' ),
			'head_title' => array( 'label' => 'Heading', 'default' => 'Body &amp; <span class="grad">Equipment</span>', 'help' => 'class="grad" gives the gradient.' ),
			'head_text'  => array( 'type' => 'textarea', 'label' => 'Intro', 'rows' => 3, 'default' => 'Pick a type to jump straight to it. Every body here can be installed in our shop, on your truck or one of ours.' ),
		),
		'Install band'  => array(
			'cap_kicker'     => array( 'label' => 'Kicker', 'default' => 'What we can install' ),
			'cap_title'      => array( 'label' => 'Heading', 'default' => 'Found a body? We\'ll fit it to your truck.' ),
			'cap_items'      => array(
				'type'   => 'items',
				'label'  => 'Capability link',
				'spare'  => 2,
				'fields' => array(
					'text' => array( 'label' => 'Text', 'width' => 60 ),
					'url'  => array( 'type' => 'link', 'label' => 'Link', 'width' => 40 ),
				),
				'items'  => array(
					array( 'text' => 'Body installs', 'url' => 'rts:capabilities' ),
					array( 'text' => 'Frame stretch &amp; shorten', 'url' => 'rts:capabilities' ),
					array( 'text' => 'Wheelbase changes', 'url' => 'rts:capabilities' ),
					array( 'text' => 'Driveline work', 'url' => 'rts:capabilities' ),
					array( 'text' => 'Lift gates, hitches, 5th wheels', 'url' => 'rts:capabilities' ),
				),
			),
			'cap_quote_text' => array( 'label' => 'Highlighted last link text', 'default' => 'Get a quote to install', 'width' => 60 ),
			'cap_quote_url'  => array( 'type' => 'link', 'label' => 'Highlighted last link', 'default' => 'ote:quote', 'width' => 40 ),
		),
		'Filters'       => array(
			'fit_text'      => array( 'label' => '"Fits my truck" help text', 'default' => 'Shows bodies that fit your cab-to-axle.' ),
			'fit_link_text' => array( 'label' => 'Help link text', 'default' => 'How to measure', 'width' => 50 ),
			'fit_link_url'  => array( 'type' => 'link', 'label' => 'Help link', 'default' => 'ote:tutorials#wheelbase', 'width' => 50 ),
		),
		'No results'    => array(
			'empty_title'      => array( 'label' => 'Heading', 'default' => 'No exact matches' ),
			'empty_text'       => array( 'type' => 'textarea', 'label' => 'Text', 'rows' => 2, 'default' => 'New bodies arrive all the time, and we can order what we don\'t stock. Tell us what you need.' ),
			'empty_btn_text'   => array( 'label' => 'Button text', 'default' => 'Get a quote', 'width' => 50 ),
			'empty_btn_url'    => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'ote:quote', 'width' => 50 ),
			'empty_phone_text' => array( 'label' => 'Phone button text', 'default' => 'Call 740-830-6488', 'width' => 50 ),
			'empty_phone_url'  => array( 'type' => 'link', 'label' => 'Phone link', 'default' => 'tel:7408306488', 'width' => 50 ),
		),
	),
);

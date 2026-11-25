<?php
/**
 * Fields for page-templates/inventory.php (Truck Inventory). See inc/fields.php for the format.
 *
 * The truck listing itself, the filters and the sort menu are built by js/inventory.js from inventory data.
 *
 * @package RTS
 */

return array(
	'title' => 'Inventory page',
	'tabs'  => array(
		'Page header' => array(
			'head_crumb' => array( 'label' => 'Breadcrumb label', 'default' => 'Inventory' ),
			'head_title' => array( 'label' => 'Heading', 'default' => 'Truck <span class="grad">Inventory</span>', 'help' => '<span class="grad"> gives the gradient.' ),
			'head_text'  => array( 'type' => 'textarea', 'label' => 'Intro', 'default' => 'Medium and heavy-duty trucks, reconditioned and ready to work. Describe what you need, or filter on the left.' ),
		),
		'AI search'   => array(
			'ai_label' => array( 'label' => 'Search box label (screen readers)', 'default' => 'Describe the truck you need', 'width' => 50 ),
			'ai_btn'   => array( 'label' => 'Search button text', 'default' => 'Find trucks', 'width' => 50 ),
			'ai_chips' => array(
				'type'   => 'items',
				'label'  => 'Example search',
				'spare'  => 2,
				'fields' => array(
					'label' => array( 'label' => 'Chip text', 'width' => 40 ),
					'q'     => array( 'label' => 'Search it runs', 'width' => 60 ),
				),
				'items'  => array(
					array( 'label' => 'Dump truck under $130k', 'q' => 'Tandem dump truck for construction under $130k' ),
					array( 'label' => 'Non-CDL box truck', 'q' => 'Non-CDL box truck' ),
					array( 'label' => 'Chassis to upfit', 'q' => 'Cab and chassis ready to upfit, 2020 or newer' ),
					array( 'label' => 'Day cab', 'q' => 'Heavy duty day cab under 450,000 miles' ),
				),
			),
		),
		'No results'  => array(
			'empty_title'     => array( 'label' => 'Heading', 'default' => 'No exact matches' ),
			'empty_text'      => array( 'type' => 'textarea', 'label' => 'Text', 'default' => 'New trucks arrive every week. Loosen a filter, or let us find one for you.' ),
			'empty_btn_label' => array( 'label' => 'Button text', 'default' => 'Call 740-397-4969', 'width' => 50 ),
			'empty_btn_url'   => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'tel:7403974969', 'width' => 50 ),
		),
	),
);

<?php
/**
 * Fields for page-templates/wheelbase-sheet.php (printable Wheelbase Measurement Sheet). See inc/fields.php for the format.
 *
 * The diagram and the fill-in lines of the paper form stay in the template.
 *
 * @package RTS
 */

return array(
	'title' => 'Wheelbase Sheet page',
	'tabs'  => array(
		'Top bar'       => array(
			'bar_back_label' => array( 'label' => 'Back link text', 'default' => '← Back to quote', 'width' => 50 ),
			'bar_back_url'   => array( 'type' => 'link', 'label' => 'Back link', 'default' => 'rts:quote', 'width' => 50 ),
			'bar_print'      => array( 'label' => 'Print button text', 'default' => 'Print / Save as PDF' ),
		),
		'Header'        => array(
			'head_title' => array( 'label' => 'Heading', 'default' => 'Wheelbase Measurement Sheet' ),
			'head_logo'  => array( 'type' => 'image', 'label' => 'Logo', 'default' => 'images/ote-logo.svg' ),
		),
		'How to measure' => array(
			'measure_title' => array( 'label' => 'Heading', 'default' => 'How to measure' ),
			'measure_steps' => array(
				'type'   => 'items',
				'label'  => 'Step',
				'spare'  => 2,
				'fields' => array(
					'text' => array( 'label' => 'Text', 'help' => 'Use <b>…</b> for bold.' ),
				),
				'items'  => array(
					array( 'text' => 'Park on level ground with the front wheels straight.' ),
					array( 'text' => '<b>Wheelbase (WB):</b> from the center of the front axle to the center of the rear axle. On a tandem, measure to the midpoint between the two rear axles.' ),
					array( 'text' => '<b>Cab-to-axle (CA):</b> from the back of the cab to the center of the rear axle (or tandem midpoint).' ),
					array( 'text' => '<b>Frame behind cab:</b> from the back of the cab to the end of the frame rails.' ),
					array( 'text' => 'Find <b>GVWR</b> and axle ratings on the sticker inside the driver\'s door.' ),
				),
			),
		),
		'Form sections' => array(
			'truck_title'   => array( 'label' => 'Truck section heading', 'default' => 'Your truck', 'width' => 50 ),
			'meas_title'    => array( 'label' => 'Measurements section heading', 'default' => 'Measurements (inches)', 'width' => 50 ),
			'body_title'    => array( 'label' => 'Body section heading', 'default' => 'Body you want', 'width' => 50 ),
			'contact_title' => array( 'label' => 'Contact section heading', 'default' => 'Contact', 'width' => 50 ),
		),
		'Footer'        => array(
			'foot_note'    => array( 'label' => 'Note', 'default' => 'Upload a photo of this sheet with your quote request, or bring it in.' ),
			'foot_contact' => array( 'label' => 'Company, address and phone', 'default' => 'Ohio Truck Equipment · 8895 Columbus Rd, Mt Vernon, OH 43050 · 740-830-6488' ),
		),
	),
);

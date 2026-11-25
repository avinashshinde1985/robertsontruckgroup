<?php
/**
 * Fields for page-templates/quote.php (Get a Quote to install a body). See inc/fields.php for the format.
 *
 * @package RTS
 */

return array(
	'title' => 'Get a Quote page',
	'tabs'  => array(
		'Page header' => array(
			'head_crumb' => array( 'label' => 'Breadcrumb label', 'default' => 'Get a Quote' ),
			'head_title' => array( 'label' => 'Heading', 'default' => 'Get a Quote to <span class="grad">Install This Body</span>', 'help' => '<span class="grad"> gives the gradient.' ),
			'head_text'  => array( 'type' => 'textarea', 'label' => 'Intro', 'default' => 'Send us your wheelbase measurements and a few photos of your truck. A rep will use them to help you choose the right body and quote the install.' ),
		),
		'Form steps'  => array(
			'body_title'      => array( 'label' => 'Step 1 (Body) heading', 'default' => 'What do you want installed?' ),
			'body_text'       => array( 'label' => 'Step 1 (Body) intro', 'default' => 'Pick a body type. If you found one in our body inventory, we have already filled it in.' ),
			'wb_title'        => array( 'label' => 'Step 2 (Wheelbase) heading', 'default' => 'Your wheelbase sheet' ),
			'wb_text'         => array( 'label' => 'Step 2 (Wheelbase) intro', 'default' => 'Enter your measurements, or upload a filled-out wheelbase sheet. Not sure how to measure? It takes five minutes with a tape measure.' ),
			'wb_help'         => array( 'label' => 'Measuring help box text', 'default' => 'How to measure a wheelbase' ),
			'wb_howto_label'  => array( 'label' => 'How-to button text', 'default' => 'Read the how-to', 'width' => 50 ),
			'wb_howto_url'    => array( 'type' => 'link', 'label' => 'How-to button link', 'default' => 'ote:tutorials#wheelbase', 'width' => 50 ),
			'wb_sheet_label'  => array( 'label' => 'Wheelbase sheet button text', 'default' => 'Wheelbase sheet (PDF)', 'width' => 50 ),
			'wb_sheet_url'    => array( 'type' => 'link', 'label' => 'Wheelbase sheet button link', 'default' => 'rts:wheelbase-sheet', 'width' => 50 ),
			'photos_title'    => array( 'label' => 'Step 3 (Photos) heading', 'default' => 'Photos of your truck' ),
			'photos_text'     => array( 'label' => 'Step 3 (Photos) intro', 'default' => 'These help the rep confirm fitment before quoting. Phone photos are perfect.' ),
			'contact_title'   => array( 'label' => 'Step 4 (Contact) heading', 'default' => 'Where should we send your quote?' ),
			'contact_text'    => array( 'label' => 'Step 4 (Contact) intro', 'default' => 'An Ohio Truck Equipment rep will follow up to go over options.' ),
			'review_title'    => array( 'label' => 'Step 5 (Review) heading', 'default' => 'Review and send' ),
			'review_text'     => array( 'label' => 'Step 5 (Review) intro', 'default' => 'Check the details below. You can go back to change anything.' ),
			'submit_label'    => array( 'label' => 'Submit button text', 'default' => 'Request my quote' ),
		),
		'Thank you'   => array(
			'done_title'      => array( 'label' => 'Heading (after "Thanks NAME! ")', 'default' => 'Quote request sent.' ),
			'done_text'       => array( 'type' => 'textarea', 'label' => 'Text', 'default' => 'An Ohio Truck Equipment rep will review your wheelbase and photos and follow up to help you choose the right body.' ),
			'done_btn_label'  => array( 'label' => 'Button text', 'default' => 'Browse truck inventory', 'width' => 50 ),
			'done_btn_url'    => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:inventory', 'width' => 50 ),
			'done_call_label' => array( 'label' => 'Call button text', 'default' => 'Call 740-830-6488', 'width' => 50 ),
			'done_call_url'   => array( 'type' => 'link', 'label' => 'Call button link', 'default' => 'tel:7408306488', 'width' => 50 ),
		),
		'Sidebar'     => array(
			'install_title'     => array( 'label' => 'Install list heading', 'default' => 'What we can install' ),
			'install_list'      => array(
				'type'   => 'items',
				'label'  => 'List item',
				'spare'  => 2,
				'fields' => array(
					'text' => array( 'label' => 'Text' ),
				),
				'items'  => array(
					array( 'text' => 'Dump bodies and hoists' ),
					array( 'text' => 'Flatbeds and platforms' ),
					array( 'text' => 'Service and van bodies' ),
					array( 'text' => 'Lift gates, hitches, 5th wheels' ),
					array( 'text' => 'Frame alterations and wheelbase changes' ),
					array( 'text' => 'Complete driveline work' ),
				),
			),
			'install_btn_label' => array( 'label' => 'Button text', 'default' => 'All capabilities', 'width' => 50 ),
			'install_btn_url'   => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:capabilities', 'width' => 50 ),
			'needs_title'       => array( 'label' => 'Info box heading', 'default' => 'What the rep needs' ),
			'needs_text'        => array( 'type' => 'textarea', 'label' => 'Info box text', 'default' => 'Your wheelbase and cab-to-axle measurements decide which body lengths fit. Photos of the frame and door sticker confirm weight ratings, so your quote is right the first time.' ),
			'call_title'        => array( 'label' => 'Phone box heading', 'default' => 'Ohio Truck Equipment' ),
			'call_text'         => array( 'label' => 'Phone box text', 'default' => 'Talk to an upfit specialist' ),
			'call_phone'        => array( 'label' => 'Phone (shown)', 'default' => '740-830-6488', 'width' => 50 ),
			'call_tel'          => array( 'type' => 'link', 'label' => 'Phone link', 'default' => 'tel:7408306488', 'width' => 50 ),
		),
	),
);

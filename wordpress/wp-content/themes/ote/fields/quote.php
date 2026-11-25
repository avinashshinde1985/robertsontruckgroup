<?php
/**
 * Fields for page-templates/quote.php (Ohio Truck Equipment install quote). See rts/inc/fields.php for the format.
 *
 * Form controls (inputs, options, photo slots) are not editable: the wizard script and the emailed summary
 * depend on them.
 *
 * @package OTE
 */

return array(
	'title' => 'Install quote page',
	'tabs'  => array(
		'Page head'     => array(
			'head_crumb' => array( 'label' => 'Breadcrumb label', 'default' => 'Get a Quote' ),
			'head_title' => array( 'label' => 'Heading', 'default' => 'Get a Quote to <span class="grad">Install This Body</span>', 'help' => 'class="grad" gives the gradient.' ),
			'head_text'  => array( 'type' => 'textarea', 'label' => 'Intro', 'rows' => 3, 'default' => 'Send us your wheelbase measurements and a few photos of your truck. A rep will use them to help you choose the right body and quote the install.' ),
		),
		'Form steps'    => array(
			'step1_title'     => array( 'label' => 'Step 1 heading', 'default' => 'What do you want installed?' ),
			'step1_text'      => array( 'type' => 'textarea', 'label' => 'Step 1 text', 'rows' => 2, 'default' => 'Pick a body type. If you found one in our body inventory, we have already filled it in.' ),
			'step2_title'     => array( 'label' => 'Step 2 heading', 'default' => 'Your wheelbase sheet' ),
			'step2_text'      => array( 'type' => 'textarea', 'label' => 'Step 2 text', 'rows' => 2, 'default' => 'Enter your measurements, or upload a filled-out wheelbase sheet. Not sure how to measure? It takes five minutes with a tape measure.' ),
			'step2_help'      => array( 'label' => 'Step 2 help box label', 'default' => 'How to measure a wheelbase' ),
			'step2_howto'     => array( 'label' => 'How-to button text', 'default' => 'Read the how-to', 'width' => 50 ),
			'step2_howto_url' => array( 'type' => 'link', 'label' => 'How-to link', 'default' => 'ote:tutorials#wheelbase', 'width' => 50 ),
			'step2_sheet'     => array( 'label' => 'Sheet button text', 'default' => 'Wheelbase sheet (PDF)', 'width' => 50 ),
			'step2_sheet_url' => array( 'type' => 'link', 'label' => 'Sheet link', 'default' => 'rts:wheelbase-sheet', 'width' => 50 ),
			'step3_title'     => array( 'label' => 'Step 3 heading', 'default' => 'Photos of your truck' ),
			'step3_text'      => array( 'type' => 'textarea', 'label' => 'Step 3 text', 'rows' => 2, 'default' => 'These help the rep confirm fitment before quoting. Phone photos are perfect.' ),
			'step4_title'     => array( 'label' => 'Step 4 heading', 'default' => 'Where should we send your quote?' ),
			'step4_text'      => array( 'type' => 'textarea', 'label' => 'Step 4 text', 'rows' => 2, 'default' => 'An Ohio Truck Equipment rep will follow up to go over options.' ),
			'step5_title'     => array( 'label' => 'Step 5 heading', 'default' => 'Review and send' ),
			'step5_text'      => array( 'type' => 'textarea', 'label' => 'Step 5 text', 'rows' => 2, 'default' => 'Check the details below. You can go back to change anything.' ),
			'submit_label'    => array( 'label' => 'Submit button label', 'default' => 'Request my quote' ),
		),
		'Thank you'     => array(
			'done_title'      => array( 'label' => 'Heading (after "Thanks, name")', 'default' => '! Quote request sent.', 'help' => 'Shown right after "Thanks" and the visitor\'s name.' ),
			'done_text'       => array( 'type' => 'textarea', 'label' => 'Text', 'rows' => 2, 'default' => 'An Ohio Truck Equipment rep will review your wheelbase and photos and follow up to help you choose the right body.' ),
			'done_btn_text'   => array( 'label' => 'Button text', 'default' => 'Browse body inventory', 'width' => 50 ),
			'done_btn_url'    => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'ote:inventory', 'width' => 50 ),
			'done_phone_text' => array( 'label' => 'Phone button text', 'default' => 'Call 740-830-6488', 'width' => 50 ),
			'done_phone_url'  => array( 'type' => 'link', 'label' => 'Phone link', 'default' => 'tel:7408306488', 'width' => 50 ),
		),
		'Sidebar'       => array(
			'caps_title'    => array( 'label' => 'Capabilities heading', 'default' => 'What we can install' ),
			'caps'          => array(
				'type'   => 'items',
				'label'  => 'Capability',
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
			'caps_btn_text' => array( 'label' => 'Capabilities button text', 'default' => 'All capabilities', 'width' => 50 ),
			'caps_btn_url'  => array( 'type' => 'link', 'label' => 'Capabilities button link', 'default' => 'rts:capabilities', 'width' => 50 ),
			'need_title'    => array( 'label' => '"What the rep needs" heading', 'default' => 'What the rep needs' ),
			'need_text'     => array( 'type' => 'textarea', 'label' => '"What the rep needs" text', 'rows' => 3, 'default' => 'Your wheelbase and cab-to-axle measurements decide which body lengths fit. Photos of the frame and door sticker confirm weight ratings, so your quote is right the first time.' ),
			'call_title'    => array( 'label' => 'Call box heading', 'default' => 'Ohio Truck Equipment' ),
			'call_text'     => array( 'label' => 'Call box text', 'default' => 'Talk to an upfit specialist' ),
			'call_phone'    => array( 'label' => 'Phone (shown)', 'default' => '740-830-6488', 'width' => 50 ),
			'call_tel'      => array( 'type' => 'link', 'label' => 'Phone link', 'default' => 'tel:7408306488', 'width' => 50 ),
		),
	),
);

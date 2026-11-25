<?php
/**
 * Fields for page-templates/trade.php (Value My Trade). See inc/fields.php for the format.
 *
 * @package RTS
 */

return array(
	'title' => 'Value My Trade page',
	'tabs'  => array(
		'Page header' => array(
			'head_crumb' => array( 'label' => 'Breadcrumb label', 'default' => 'Value My Trade' ),
			'head_title' => array( 'label' => 'Heading', 'default' => 'Value My <span class="grad">Trade</span>', 'help' => '<span class="grad"> gives the gradient.' ),
			'head_text'  => array( 'type' => 'textarea', 'label' => 'Intro', 'default' => 'Tell us about your truck and add a few photos. It takes about two minutes, and a sales rep follows up with a number.' ),
		),
		'Form steps'  => array(
			'truck_title'   => array( 'label' => 'Step 1 (Your truck) heading', 'default' => 'Your truck' ),
			'truck_text'    => array( 'label' => 'Step 1 (Your truck) intro', 'default' => 'Year, make and model are all we need to start. The more you add, the more accurate the number.' ),
			'photos_title'  => array( 'label' => 'Step 2 (Photos) heading', 'default' => 'Add photos' ),
			'photos_text'   => array( 'label' => 'Step 2 (Photos) intro', 'default' => 'Tap each box to take or upload a photo. Clear, daylight photos get you the most accurate value.' ),
			'photos_note'   => array( 'label' => 'Note under the photo boxes', 'default' => '<b>Placeholder shot list.</b> Ethan\'s exact required photos are still to be confirmed. This list will be updated to match (and shared with the Skeye check-in).' ),
			'contact_title' => array( 'label' => 'Step 3 (Contact) heading', 'default' => 'Where should we send your value?' ),
			'contact_text'  => array( 'label' => 'Step 3 (Contact) intro', 'default' => 'A Robertson Truck Sales rep will reach out. No spam, ever.' ),
			'review_title'  => array( 'label' => 'Step 4 (Review) heading', 'default' => 'Review and send' ),
			'review_text'   => array( 'label' => 'Step 4 (Review) intro', 'default' => 'Check the details below. You can go back to change anything.' ),
			'submit_label'  => array( 'label' => 'Submit button text', 'default' => 'Send for my value' ),
		),
		'Thank you'   => array(
			'done_title'      => array( 'label' => 'Heading (after "Thanks NAME! ")', 'default' => 'We\'ve got it.' ),
			'done_text'       => array( 'type' => 'textarea', 'label' => 'Text', 'default' => 'A Robertson Truck Sales rep will review your truck and photos and follow up within one business day with your trade value.' ),
			'done_btn_label'  => array( 'label' => 'Button text', 'default' => 'Browse inventory', 'width' => 50 ),
			'done_btn_url'    => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:inventory', 'width' => 50 ),
			'done_call_label' => array( 'label' => 'Call button text', 'default' => 'Call 740-397-4969', 'width' => 50 ),
			'done_call_url'   => array( 'type' => 'link', 'label' => 'Call button link', 'default' => 'tel:7403974969', 'width' => 50 ),
		),
		'Sidebar'     => array(
			'how_title'  => array( 'label' => 'How it works heading', 'default' => 'How it works' ),
			'how_list'   => array(
				'type'   => 'items',
				'label'  => 'Step',
				'spare'  => 2,
				'fields' => array(
					'text' => array( 'label' => 'Text' ),
				),
				'items'  => array(
					array( 'text' => 'Tell us the year, make and model' ),
					array( 'text' => 'Add a few photos from your phone' ),
					array( 'text' => 'A sales rep follows up with your value' ),
					array( 'text' => 'Put it toward any truck in our inventory' ),
				),
			),
			'call_title' => array( 'label' => 'Phone box heading', 'default' => 'Rather talk it through?' ),
			'call_text'  => array( 'label' => 'Phone box text', 'default' => 'Call Robertson Truck Sales' ),
			'call_phone' => array( 'label' => 'Phone (shown)', 'default' => '740-397-4969', 'width' => 50 ),
			'call_tel'   => array( 'type' => 'link', 'label' => 'Phone link', 'default' => 'tel:7403974969', 'width' => 50 ),
		),
	),
);

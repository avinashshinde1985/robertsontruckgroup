<?php
/**
 * Fields for page-templates/tutorials.php (Ohio Truck Equipment tutorials & PDFs). See rts/inc/fields.php for the format.
 *
 * The wheelbase diagram (SVG) and its script are not editable.
 *
 * @package OTE
 */

return array(
	'title' => 'Tutorials & PDFs page',
	'tabs'  => array(
		'Page head'        => array(
			'head_crumb' => array( 'label' => 'Breadcrumb label', 'default' => 'Tutorials &amp; PDFs' ),
			'head_title' => array( 'label' => 'Heading', 'default' => 'Tutorials &amp; <span class="grad">PDFs</span>', 'help' => 'class="grad" gives the gradient.' ),
			'head_text'  => array( 'type' => 'textarea', 'label' => 'Intro', 'rows' => 3, 'default' => 'Short guides that help you pick the right body the first time, and the sheets our reps need to quote your install.' ),
		),
		'On this page'     => array(
			'toc_title' => array( 'label' => 'Heading', 'default' => 'On this page' ),
			'toc'       => array(
				'type'   => 'items',
				'label'  => 'Contents link',
				'spare'  => 1,
				'fields' => array(
					'text' => array( 'label' => 'Text', 'width' => 40 ),
					'note' => array( 'label' => 'Small note', 'width' => 30 ),
					'url'  => array( 'type' => 'link', 'label' => 'Link', 'width' => 30, 'help' => 'Sections: #wheelbase, #terms, #pdfs.' ),
				),
				'items'  => array(
					array( 'text' => 'How to measure a wheelbase', 'note' => 'Guide · 5 min', 'url' => '#wheelbase' ),
					array( 'text' => 'Measurements that matter', 'note' => 'Guide · 3 min', 'url' => '#terms' ),
					array( 'text' => 'PDFs &amp; downloads', 'note' => 'Printable sheets', 'url' => '#pdfs' ),
				),
			),
		),
		'Wheelbase guide'  => array(
			'g1_tag'       => array( 'label' => 'Tag', 'default' => '[ Guide 01 ]' ),
			'g1_title'     => array( 'label' => 'Heading', 'default' => 'How to measure a wheelbase' ),
			'g1_meta'      => array(
				'type'   => 'items',
				'label'  => 'Meta label',
				'spare'  => 1,
				'fields' => array( 'text' => array( 'label' => 'Text' ) ),
				'items'  => array(
					array( 'text' => '5 minutes' ),
					array( 'text' => 'Tape measure' ),
					array( 'text' => 'Single or tandem axle' ),
				),
			),
			'g1_intro'     => array( 'type' => 'textarea', 'label' => 'Intro', 'rows' => 3, 'default' => 'Your wheelbase and cab-to-axle decide which body lengths fit your truck. Measure once, write it on the wheelbase sheet, and send it with your quote request.' ),
			'g1_steps'     => array(
				'type'   => 'items',
				'label'  => 'Step',
				'spare'  => 1,
				'fields' => array(
					'text' => array( 'label' => 'Text', 'help' => 'Inline HTML. <span data-single>…</span> / <span data-tandem>…</span> show only for that axle type.' ),
					'dim'  => array( 'label' => 'Diagram dimension', 'help' => 'Highlights a dimension on the diagram: wb, ca, af, or empty for none.' ),
				),
				'items'  => array(
					array( 'text' => 'Park on level ground with the front wheels pointed straight.' ),
					array(
						'text' => '<b>Wheelbase (WB):</b> center of the front axle to the center of the rear axle. <span data-single>On a single axle, measure to the middle of the rear hub.</span><span data-tandem>On a tandem, measure to the midpoint between the two rear axles.</span>',
						'dim'  => 'wb',
					),
					array(
						'text' => '<b><span data-single>Cab-to-axle (CA):</span><span data-tandem>Cab-to-tandem (CT):</span></b> back of the cab to the center of the rear axle<span data-tandem> midpoint</span>. This is the number that decides body length.',
						'dim'  => 'ca',
					),
					array(
						'text' => '<b>Frame behind cab:</b> back of the cab to the end of the frame rails.',
						'dim'  => 'af',
					),
					array( 'text' => 'Read <b>GVWR</b> and axle ratings off the sticker inside the driver\'s door, and take a photo of it.' ),
				),
			),
			'g1_tip'       => array( 'label' => 'Tip', 'default' => '<b>Tip:</b> measure to the back of the cab itself, not to exhaust stacks, a headache rack or tanks. Note anything mounted behind the cab, because it can change what fits.' ),
			'g1_btn1_text' => array( 'label' => 'PDF button text', 'default' => 'Wheelbase sheet (PDF)', 'width' => 50 ),
			'g1_btn1_url'  => array( 'type' => 'link', 'label' => 'PDF button link', 'default' => 'rts:wheelbase-sheet', 'width' => 50 ),
			'g1_btn2_text' => array( 'label' => 'Button 2 text', 'default' => 'Send it with a quote request', 'width' => 50 ),
			'g1_btn2_url'  => array( 'type' => 'link', 'label' => 'Button 2 link', 'default' => 'ote:quote', 'width' => 50 ),
			'g1_btn3_text' => array( 'label' => 'Button 3 text', 'default' => 'Find bodies that fit my CA', 'width' => 50 ),
			'g1_btn3_url'  => array( 'type' => 'link', 'label' => 'Button 3 link', 'default' => 'ote:inventory', 'width' => 50 ),
		),
		'Terms guide'      => array(
			'g2_tag'      => array( 'label' => 'Tag', 'default' => '[ Guide 02 ]' ),
			'g2_title'    => array( 'label' => 'Heading', 'default' => 'Measurements that matter' ),
			'g2_meta'     => array(
				'type'   => 'items',
				'label'  => 'Meta label',
				'spare'  => 1,
				'fields' => array( 'text' => array( 'label' => 'Text' ) ),
				'items'  => array(
					array( 'text' => '3 minutes' ),
					array( 'text' => 'Plain English' ),
				),
			),
			'g2_intro'    => array( 'type' => 'textarea', 'label' => 'Intro', 'rows' => 3, 'default' => 'Having the right equipment on the back of your truck is key to any job. These are the numbers we check before matching a body to a chassis.' ),
			'terms'       => array(
				'type'   => 'items',
				'label'  => 'Term',
				'spare'  => 2,
				'fields' => array(
					'abbr' => array( 'label' => 'Short term', 'width' => 30 ),
					'name' => array( 'label' => 'Full name', 'width' => 70 ),
					'text' => array( 'type' => 'textarea', 'label' => 'Explanation', 'rows' => 2 ),
				),
				'items'  => array(
					array( 'abbr' => 'GVWR', 'name' => 'Gross vehicle weight rating', 'text' => 'The most the truck can weigh fully loaded: chassis, body, fuel, crew and cargo. Over 26,000 lb needs a CDL.' ),
					array( 'abbr' => 'Payload', 'name' => 'What you can actually haul', 'text' => 'GVWR minus the weight of the truck with its body. A heavier body leaves less room for cargo.' ),
					array( 'abbr' => 'GAWR', 'name' => 'Gross axle weight rating', 'text' => 'The most each axle can carry, front and rear listed separately on the door sticker.' ),
					array( 'abbr' => 'WB', 'name' => 'Wheelbase', 'text' => 'Center of the front axle to the center of the rear axle, or the tandem midpoint.' ),
					array( 'abbr' => 'CA', 'name' => 'Cab-to-axle', 'text' => 'Back of the cab to the center of the rear axle. The key number for choosing body length.' ),
					array( 'abbr' => 'CT', 'name' => 'Cab-to-tandem', 'text' => 'On a tandem truck, back of the cab to the midpoint (trunnion) between the rear axles.' ),
					array( 'abbr' => 'Tanks', 'name' => 'Fuel &amp; DEF tank location', 'text' => 'Tanks on the frame rails or behind the cab can block a hoist, toolboxes or body mounts. Tell us where yours are.' ),
				),
			),
			'g2_btn_text' => array( 'label' => 'Button text', 'default' => 'Truck doesn\'t fit? See frame &amp; wheelbase changes', 'width' => 50 ),
			'g2_btn_url'  => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:capabilities', 'width' => 50 ),
		),
		'PDFs & downloads' => array(
			'pdf_tag'   => array( 'label' => 'Tag', 'default' => '[ Downloads ]' ),
			'pdf_title' => array( 'label' => 'Heading', 'default' => 'PDFs &amp; downloads' ),
			'pdf_text'  => array( 'type' => 'textarea', 'label' => 'Intro', 'rows' => 2, 'default' => 'Print it, fill it out at the truck, and upload a photo of it with your quote.' ),
			'pdfs'      => array(
				'type'   => 'items',
				'label'  => 'Download',
				'spare'  => 2,
				'fields' => array(
					'title' => array( 'label' => 'Title' ),
					'text'  => array( 'type' => 'textarea', 'label' => 'Description', 'rows' => 2 ),
					'btn'   => array( 'label' => 'Button text', 'width' => 50 ),
					'url'   => array( 'type' => 'link', 'label' => 'PDF link', 'width' => 50, 'help' => 'Leave empty to show the card as "Coming soon".' ),
				),
				'items'  => array(
					array(
						'title' => 'Wheelbase measurement sheet',
						'text'  => 'One page. WB, CA, frame, weight ratings and the body you want.',
						'btn'   => 'Open &amp; print PDF',
						'url'   => 'rts:wheelbase-sheet',
					),
					array(
						'title' => 'Choosing a dump body length',
						'text'  => 'Matching body length to your cab-to-axle and payload.',
					),
					array(
						'title' => 'Body spec sheets',
						'text'  => 'Manufacturer spec sheets for the bodies we stock.',
					),
				),
			),
		),
	),
);

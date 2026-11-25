<?php
/**
 * Fields for page-templates/home.php (Ohio Truck Equipment home page). See rts/inc/fields.php for the format.
 *
 * @package OTE
 */

return array(
	'title' => 'Home page',
	'tabs'  => array(
		'Hero'         => array(
			'hero_pill'       => array( 'label' => 'Pill text', 'default' => 'Ohio Truck Equipment · Mt Vernon, Ohio' ),
			'hero_title'      => array( 'label' => 'Heading', 'default' => 'Pick your body.<br><span class="grad">We\'ll install it.</span>', 'help' => 'class="grad" gives the gradient.' ),
			'hero_sub'        => array( 'type' => 'textarea', 'label' => 'Intro', 'rows' => 3, 'default' => 'Bodies and equipment in stock, installed in our own fabrication shop on your truck or one of ours.' ),
			'hero_search_btn' => array( 'label' => 'Search button label', 'default' => 'Search' ),
			'hero_btn1_text'  => array( 'label' => 'Button 1 text', 'default' => 'Browse all bodies', 'width' => 50 ),
			'hero_btn1_url'   => array( 'type' => 'link', 'label' => 'Button 1 link', 'default' => 'ote:inventory', 'width' => 50 ),
			'hero_btn2_text'  => array( 'label' => 'Button 2 text', 'default' => 'Get a quote to install', 'width' => 50 ),
			'hero_btn2_url'   => array( 'type' => 'link', 'label' => 'Button 2 link', 'default' => 'ote:quote', 'width' => 50 ),
		),
		'Featured'     => array(
			'feat_tag'      => array( 'label' => 'Tag', 'default' => '[ In stock now ]' ),
			'feat_title'    => array( 'label' => 'Heading', 'default' => 'Featured <span class="grad">bodies</span>' ),
			'feat_btn_text' => array( 'label' => 'Button text', 'default' => 'See all bodies', 'width' => 50 ),
			'feat_btn_url'  => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'ote:inventory', 'width' => 50 ),
		),
		'Capabilities' => array(
			'caps_tag'      => array( 'label' => 'Tag', 'default' => '[ Capabilities ]' ),
			'caps_title'    => array( 'label' => 'Heading', 'default' => 'Every body we sell,<br><span class="grad">we install.</span>' ),
			'caps_btn_text' => array( 'label' => 'Button text', 'default' => 'All capabilities', 'width' => 50 ),
			'caps_btn_url'  => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:capabilities', 'width' => 50 ),
			'caps'          => array(
				'type'   => 'items',
				'label'  => 'Capability card',
				'spare'  => 2,
				'fields' => array(
					'title' => array( 'label' => 'Title' ),
					'text'  => array( 'type' => 'textarea', 'label' => 'Text', 'rows' => 2 ),
					'image' => array( 'type' => 'image', 'label' => 'Image', 'width' => 50 ),
					'url'   => array( 'type' => 'link', 'label' => 'Link', 'width' => 50 ),
				),
				'items'  => array(
					array(
						'title' => 'Dump body installs',
						'text'  => '8 to 21 ft, in high-tensile steel, Hardox, aluminum or stainless.',
						'image' => 'rts:images/v2/dump-body.jpg',
						'url'   => 'ote:inventory?type=Dump%20Body',
					),
					array(
						'title' => 'Flatbed installs',
						'text'  => 'Floor, headboard and material options to fit the job.',
						'image' => 'rts:images/v2/flatbed.jpg',
						'url'   => 'ote:inventory?type=Flatbed',
					),
					array(
						'title' => 'Frame &amp; wheelbase changes',
						'text'  => 'Stretch, shorten or overlay a frame so the body you want fits.',
						'image' => 'rts:images/v2/frame.jpg',
						'url'   => 'rts:capabilities',
					),
					array(
						'title' => 'Complete driveline',
						'text'  => 'Shortening, lengthening and repair, done on site.',
						'image' => 'rts:images/v2/driveline.jpg',
						'url'   => 'rts:capabilities',
					),
					array(
						'title' => 'Fabrication',
						'text'  => 'Lift gates, hitches, 5th wheels, tarps, wetline kits and body repairs.',
						'image' => 'rts:images/v2/fabrication.jpg',
						'url'   => 'rts:capabilities',
					),
					array(
						'title' => 'Need a truck too?',
						'text'  => 'Pick a chassis from Robertson Truck Sales and we build it out.',
						'image' => 'rts:images/v2/build.jpg',
						'url'   => 'rts:inventory?type=Cab%20%26%20Chassis',
					),
				),
			),
		),
		'Quote steps'  => array(
			'flow_tag'   => array( 'label' => 'Tag', 'default' => '[ Get a quote to install ]' ),
			'flow_title' => array( 'label' => 'Heading', 'default' => 'Three steps to <span class="grad">the right body</span>' ),
			'flow'       => array(
				'type'   => 'items',
				'label'  => 'Step',
				'spare'  => 1,
				'fields' => array(
					'title'   => array( 'label' => 'Title' ),
					'text'    => array( 'type' => 'textarea', 'label' => 'Text', 'rows' => 2 ),
					'btn'     => array( 'label' => 'Button text', 'width' => 40 ),
					'url'     => array( 'type' => 'link', 'label' => 'Button link', 'width' => 40 ),
					'new_tab' => array( 'type' => 'toggle', 'label' => 'PDF / new tab', 'help' => 'Open in a new tab with a document icon (for PDFs).', 'width' => 20 ),
				),
				'items'  => array(
					array(
						'title' => 'Measure your truck',
						'text'  => 'Wheelbase and cab-to-axle decide which body lengths fit. Five minutes with a tape measure.',
						'btn'   => 'How to measure',
						'url'   => 'ote:tutorials#wheelbase',
					),
					array(
						'title'   => 'Snap a few photos',
						'text'    => 'Driver side, the frame behind the cab, and the door sticker. Phone photos are perfect.',
						'btn'     => 'Wheelbase sheet',
						'url'     => 'rts:wheelbase-sheet',
						'new_tab' => 'yes',
					),
					array(
						'title' => 'Get your quote',
						'text'  => 'An upfit specialist reviews it and helps you choose the right body for the job.',
						'btn'   => 'Start my quote',
						'url'   => 'ote:quote',
					),
				),
			),
		),
		'Tutorials'    => array(
			'tut_tag'      => array( 'label' => 'Tag', 'default' => '[ Tutorials &amp; PDFs ]' ),
			'tut_title'    => array( 'label' => 'Heading', 'default' => 'Know before <span class="grad">you buy</span>' ),
			'tut_btn_text' => array( 'label' => 'Button text', 'default' => 'All tutorials', 'width' => 50 ),
			'tut_btn_url'  => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'ote:tutorials', 'width' => 50 ),
			'tut_docs'     => array(
				'type'   => 'items',
				'label'  => 'Guide card',
				'spare'  => 1,
				'fields' => array(
					'title'   => array( 'label' => 'Title' ),
					'text'    => array( 'type' => 'textarea', 'label' => 'Text', 'rows' => 2 ),
					'btn'     => array( 'label' => 'Button text', 'width' => 40 ),
					'url'     => array( 'type' => 'link', 'label' => 'Button link', 'width' => 40 ),
					'new_tab' => array( 'type' => 'toggle', 'label' => 'New tab', 'help' => 'Open in a new tab (for PDFs).', 'width' => 20 ),
				),
				'items'  => array(
					array(
						'title' => 'How to measure a wheelbase',
						'text'  => 'Step-by-step, with a diagram for single and tandem axles.',
						'btn'   => 'Read the guide',
						'url'   => 'ote:tutorials#wheelbase',
					),
					array(
						'title'   => 'Wheelbase measurement sheet',
						'text'    => 'Printable PDF. Fill it out and upload it with your quote.',
						'btn'     => 'Open the PDF',
						'url'     => 'rts:wheelbase-sheet',
						'new_tab' => 'yes',
					),
					array(
						'title' => 'Measurements that matter',
						'text'  => 'GVWR, payload, axle ratings, CA and CT explained in plain English.',
						'btn'   => 'Read the guide',
						'url'   => 'ote:tutorials#terms',
					),
				),
			),
		),
		'Brands'       => array(
			'brands_tag' => array( 'label' => 'Tag', 'default' => '[ Product lines we sell and install ]' ),
			'brands'     => array(
				'type'   => 'items',
				'label'  => 'Brand',
				'spare'  => 2,
				'fields' => array(
					'name' => array( 'label' => 'Name' ),
				),
				'items'  => array(
					array( 'name' => 'Beau-Roc' ),
					array( 'name' => 'CAM-Superline' ),
					array( 'name' => 'Futureline' ),
					array( 'name' => 'Godwin' ),
					array( 'name' => 'NRC Industries' ),
					array( 'name' => 'Sure-Trac' ),
					array( 'name' => 'Switch N Go' ),
					array( 'name' => 'TruckCraft' ),
				),
			),
		),
		'Sister companies' => array(
			'sisters' => array(
				'type'   => 'items',
				'label'  => 'Sister company link',
				'fields' => array(
					'name'  => array( 'label' => 'Company name', 'width' => 50 ),
					'label' => array( 'label' => 'Link text', 'width' => 50 ),
					'url'   => array( 'type' => 'link', 'label' => 'Link' ),
				),
				'items'  => array(
					array(
						'name'  => 'Robertson Truck Sales',
						'label' => 'Shop truck inventory',
						'url'   => 'rts:inventory',
					),
					array(
						'name'  => 'Equipment Leasing Solutions',
						'label' => 'Lease containers &amp; trailers',
						'url'   => 'https://leasingsolutionsnow.com/',
					),
				),
			),
		),
	),
);

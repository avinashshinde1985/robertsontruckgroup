<?php
/**
 * Fields for page-templates/about.php (About Us). See inc/fields.php for the format.
 *
 * @package RTS
 */

$icon_help = 'Icon name from the sprite: flag, truck, dollar, award, wrench, users, heart, shield, check, phone, mail, pin, nav, quote.';

return array(
	'title' => 'About Us page',
	'tabs'  => array(
		'Hero'          => array(
			'hero_slides'    => array(
				'type'   => 'items',
				'label'  => 'Background slide',
				'spare'  => 2,
				'fields' => array(
					'image' => array( 'type' => 'image', 'label' => 'Image' ),
				),
				'items'  => array(
					array( 'image' => 'images/about/hero-build.jpg' ),
					array( 'image' => 'images/about/hero-stock.jpg' ),
					array( 'image' => 'images/about/hero-trusted.jpg' ),
				),
			),
			'hero_title'     => array( 'label' => 'Heading', 'default' => 'Ohio\'s Premiere <span class="hl">Truck Dealer</span>', 'help' => 'Wrap words in <span class="hl"> to highlight them.' ),
			'hero_lead'      => array( 'type' => 'textarea', 'label' => 'Intro', 'rows' => 3, 'default' => 'Medium &amp; heavy-duty trucks, Ohio\'s largest Sure-Trac trailer dealer and over 200 trucks currently in stock — with a team that treats you like a client, not a customer.' ),
			'hero_btn1_text' => array( 'label' => 'Button 1 text', 'default' => 'Browse Inventory', 'width' => 50 ),
			'hero_btn1_url'  => array( 'type' => 'link', 'label' => 'Button 1 link', 'default' => 'rts:inventory', 'width' => 50 ),
			'hero_btn2_text' => array( 'label' => 'Button 2 text', 'default' => 'Meet the Team', 'width' => 50 ),
			'hero_btn2_url'  => array( 'type' => 'link', 'label' => 'Button 2 link', 'default' => '#team', 'width' => 50 ),
		),
		'Since card'    => array(
			'since_label'       => array( 'label' => 'Small label', 'default' => 'Est.', 'width' => 30 ),
			'since_year'        => array( 'label' => 'Year', 'default' => '1984', 'width' => 70 ),
			'since_text'        => array( 'label' => 'Text', 'default' => 'Founded by Phil Robertson in Mount Vernon, Ohio.' ),
			'since_from_label'  => array( 'label' => 'Bar 1 label', 'default' => '1984', 'width' => 34 ),
			'since_from_value'  => array( 'label' => 'Bar 1 value', 'default' => '3 trucks', 'width' => 33 ),
			'since_from_width'  => array( 'label' => 'Bar 1 length', 'default' => '3%', 'width' => 33, 'help' => 'CSS width, e.g. 3%.' ),
			'since_now_label'   => array( 'label' => 'Bar 2 label', 'default' => 'Today', 'width' => 34 ),
			'since_now_value'   => array( 'label' => 'Bar 2 value', 'default' => '200+', 'width' => 33 ),
			'since_now_width'   => array( 'label' => 'Bar 2 length', 'default' => '100%', 'width' => 33, 'help' => 'CSS width, e.g. 100%.' ),
		),
		'Stats'         => array(
			'stats' => array(
				'type'   => 'items',
				'label'  => 'Stat',
				'fields' => array(
					'num'     => array( 'label' => 'Number', 'width' => 25 ),
					'suffix'  => array( 'label' => 'After the number', 'width' => 25, 'help' => 'e.g. + or  ft²' ),
					'animate' => array( 'type' => 'toggle', 'label' => 'Count up', 'width' => 25, 'help' => 'Animate the number counting up (digits only).' ),
					'label'   => array( 'label' => 'Label', 'width' => 25 ),
				),
				'items'  => array(
					array( 'num' => '1984', 'suffix' => '', 'animate' => '', 'label' => 'Founded in Mount Vernon, Ohio' ),
					array( 'num' => '200', 'suffix' => '+', 'animate' => 'yes', 'label' => 'Trucks currently in stock' ),
					array( 'num' => '42', 'suffix' => '', 'animate' => 'yes', 'label' => 'Years serving Central Ohio' ),
					array( 'num' => '100000', 'suffix' => ' ft²', 'animate' => 'yes', 'label' => 'Fabrication facility' ),
				),
			),
		),
		'What we do'    => array(
			'what_eyebrow'     => array( 'label' => 'Eyebrow', 'default' => 'What We Do' ),
			'what_title'       => array( 'label' => 'Heading', 'default' => 'From 3 trucks to well over 200 on the lot' ),
			'what_text'        => array(
				'type'    => 'html',
				'label'   => 'Text',
				'rows'    => 6,
				'default' => "<p>Robertson Truck Sales was founded in 1984 by Phil Robertson in Mount Vernon, Ohio. With only 3 trucks in inventory, Robertson Truck Sales quickly grew over the years to well over 200 trucks on the lot.</p>\n      <p>Specializing in body upfitting and fabrication, Robertson Truck Sales provides its clients with the highest quality medium &amp; heavy-duty trucks in the industry today.</p>",
			),
			'what_checks'      => array(
				'type'   => 'items',
				'label'  => 'Check list item',
				'spare'  => 2,
				'fields' => array(
					'text' => array( 'label' => 'Text' ),
				),
				'items'  => array(
					array( 'text' => 'Body upfitting' ),
					array( 'text' => 'Fabrication' ),
					array( 'text' => 'Medium-duty trucks' ),
					array( 'text' => 'Heavy-duty trucks' ),
				),
			),
			'what_btn_text'    => array( 'label' => 'Button text', 'default' => 'Our Capabilities', 'width' => 50 ),
			'what_btn_url'     => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:capabilities', 'width' => 50 ),
			'what_phone'       => array( 'label' => 'Phone', 'default' => '740-397-4969', 'help' => 'The call link is built from the digits.' ),
			'what_video'       => array( 'label' => 'Vimeo video ID', 'default' => '296664216', 'width' => 50 ),
			'what_video_title' => array( 'label' => 'Video title (player)', 'default' => 'What We Do – Robertson Truck Sales', 'width' => 50 ),
			'what_poster'      => array( 'type' => 'image', 'label' => 'Video poster image', 'default' => 'images/about/hero-stock.jpg' ),
			'what_video_tag'   => array( 'label' => 'Video tag', 'default' => 'Watch', 'width' => 50 ),
			'what_video_cap'   => array( 'label' => 'Video caption', 'default' => 'What We Do', 'width' => 50 ),
			'what_badge_title' => array( 'label' => 'Badge title', 'default' => 'Since 1984', 'width' => 50 ),
			'what_badge_text'  => array( 'label' => 'Badge text', 'default' => 'Mount Vernon, Ohio', 'width' => 50 ),
		),
		'Journey'       => array(
			'journey_eyebrow' => array( 'label' => 'Eyebrow', 'default' => 'Our Journey' ),
			'journey_title'   => array( 'label' => 'Heading', 'default' => 'Four decades of building trucks &amp; trust' ),
			'journey'         => array(
				'type'   => 'items',
				'label'  => 'Milestone',
				'spare'  => 2,
				'fields' => array(
					'title' => array( 'label' => 'Title', 'width' => 50 ),
					'year'  => array( 'label' => 'Year / label', 'width' => 25 ),
					'icon'  => array( 'label' => 'Icon', 'width' => 25, 'help' => $icon_help ),
					'text'  => array( 'type' => 'textarea', 'label' => 'Text', 'rows' => 2 ),
				),
				'items'  => array(
					array( 'title' => 'Founded', 'year' => '1984', 'icon' => 'flag', 'text' => 'Phil Robertson opens Robertson Truck Sales in Mount Vernon, Ohio — with only 3 trucks in inventory.' ),
					array( 'title' => '200+ trucks', 'year' => 'Growth', 'icon' => 'truck', 'text' => 'Specializing in body upfitting and fabrication, the lot grows over the years to well over 200 trucks.' ),
					array( 'title' => 'Equipment Leasing Solutions', 'year' => '2016', 'icon' => 'dollar', 'text' => 'Officially opened in the fall of 2016 — now leasing containers and storage trailers across Ohio.' ),
					array( 'title' => 'Ohio\'s premiere dealer', 'year' => 'Today', 'icon' => 'award', 'text' => 'Three on-site shops, a 100,000 sq ft fabrication facility and Ohio\'s largest Sure-Trac trailer dealer.' ),
				),
			),
		),
		'Philosophy'    => array(
			'clients_bg'       => array( 'type' => 'image', 'label' => 'Background image', 'default' => 'images/about/contact.jpg' ),
			'clients_eyebrow'  => array( 'label' => 'Eyebrow', 'default' => 'Our Philosophy' ),
			'clients_title'    => array( 'label' => 'Heading', 'default' => 'Clients, <span>not customers</span>', 'help' => 'The <span> part is shown on its own line.' ),
			'clients_text'     => array(
				'type'    => 'html',
				'label'   => 'Text',
				'rows'    => 6,
				'default' => "<p>Robertson Truck Sales does not have customers, we have clients. We are not just selling you a product, we are building a life-long relationship with you and your business.</p>\n      <p>In order to accomplish this, we have to have product specialists and industry experts. Feel free to reach out to any of our team below with any questions.</p>",
			),
			'clients_btn_text' => array( 'label' => 'Button text', 'default' => 'Meet Our Team', 'width' => 50 ),
			'clients_btn_url'  => array( 'type' => 'link', 'label' => 'Button link', 'default' => '#team', 'width' => 50 ),
			'clients_quote'    => array( 'type' => 'textarea', 'label' => 'Quote', 'rows' => 2, 'default' => 'We may be in the truck industry, but we are in the business of people.' ),
			'clients_quote_by' => array( 'label' => 'Quote author', 'default' => '— Robertson Truck Sales' ),
			'clients_pillars'  => array(
				'type'   => 'items',
				'label'  => 'Pillar',
				'spare'  => 1,
				'fields' => array(
					'title' => array( 'label' => 'Title', 'width' => 70 ),
					'icon'  => array( 'label' => 'Icon', 'width' => 30, 'help' => $icon_help ),
				),
				'items'  => array(
					array( 'title' => 'Life-long relationships', 'icon' => 'heart' ),
					array( 'title' => 'Product specialists', 'icon' => 'users' ),
					array( 'title' => 'Industry experts', 'icon' => 'wrench' ),
				),
			),
		),
		'Team'          => array(
			'team_eyebrow' => array( 'label' => 'Eyebrow', 'default' => 'Meet Our Talented Team' ),
			'team_title'   => array( 'label' => 'Heading', 'default' => 'The people behind every truck' ),
			'team'         => array(
				'type'   => 'items',
				'label'  => 'Team member',
				'spare'  => 3,
				'fields' => array(
					'name'  => array( 'label' => 'Name', 'width' => 50 ),
					'role'  => array( 'label' => 'Job title', 'width' => 50 ),
					'email' => array( 'label' => 'Email', 'width' => 50 ),
					'group' => array( 'label' => 'Filter group', 'width' => 50, 'help' => 'leadership, sales or hr (matches the filter buttons).' ),
					'photo' => array( 'type' => 'image', 'label' => 'Photo', 'help' => 'Shown at 262 × 275.' ),
				),
				'items'  => array(
					array( 'name' => 'Phil Robertson', 'role' => 'Founder', 'email' => 'phil@robertsontrucksales.com', 'group' => 'leadership', 'photo' => 'images/about/phil-robertson.jpg' ),
					array( 'name' => 'Ethan Robertson', 'role' => 'CEO', 'email' => 'ethan@robertsontrucksales.com', 'group' => 'leadership', 'photo' => 'images/about/ethan-robertson.jpg' ),
					array( 'name' => 'Justin Smith', 'role' => 'COO', 'email' => 'justin@robertsontrucksales.com', 'group' => 'leadership', 'photo' => 'images/about/justin-smith.jpg' ),
					array( 'name' => 'Jeremy Kuhlman', 'role' => 'NRC Sales Professional', 'email' => 'jeremy@robertsontrucksales.com', 'group' => 'sales', 'photo' => 'images/about/jeremy-kuhlman.jpg' ),
					array( 'name' => 'Brad Crawford', 'role' => 'Sales Professional', 'email' => 'brad@robertsontrucksales.com', 'group' => 'sales', 'photo' => 'images/about/brad-crawford.png' ),
					array( 'name' => 'Holly Kuhlman', 'role' => 'HR Manager', 'email' => 'holly@robertsontrucksales.com', 'group' => 'hr', 'photo' => 'images/about/holly-kuhlman.jpg' ),
				),
			),
		),
		'Locations'     => array(
			'loc_eyebrow'  => array( 'label' => 'Eyebrow', 'default' => 'Our Locations' ),
			'loc_title'    => array( 'label' => 'Heading', 'default' => 'Come see us in Mount Vernon' ),
			'locations'    => array(
				'type'   => 'items',
				'label'  => 'Location',
				'spare'  => 1,
				'fields' => array(
					'name'    => array( 'label' => 'Name', 'width' => 50 ),
					'phone'   => array( 'label' => 'Phone', 'width' => 50, 'help' => 'The call button is built from the digits.' ),
					'address' => array( 'label' => 'Address', 'help' => 'Use <br> for a line break.' ),
					'dir'     => array( 'label' => 'Directions destination', 'help' => 'Address Google Maps routes to, e.g. "Company, 8920 Columbus Rd, Mount Vernon, OH 43050".' ),
					'map'     => array( 'label' => 'Google Maps embed URL', 'help' => 'Google Maps → Share → Embed a map → the src="…" URL.' ),
				),
				'items'  => array(
					array(
						'name'    => 'Robertson Truck Sales',
						'phone'   => '740-397-4969',
						'address' => '8920 Columbus Rd. · P.O. Box 1146<br>Mount Vernon, OH 43050',
						'dir'     => 'Robertson Truck Sales, 8920 Columbus Rd, Mount Vernon, OH 43050',
						'map'     => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6080.166876326157!2d-82.5164687573944!3d40.36267422084092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x883834e2879c69a3%3A0xa674f1c55a85b493!2sRobertson%20Truck%20Sales!5e0!3m2!1sen!2sin!4v1753346949728!5m2!1sen!2sin',
					),
					array(
						'name'    => 'Ohio Truck Equipment',
						'phone'   => '740-830-6488',
						'address' => '8895 Columbus Rd · Mailing: P.O. Box 991<br>Mount Vernon, OH 43050',
						'dir'     => 'Ohio Truck Equipment, 8895 Columbus Rd, Mount Vernon, OH 43050',
						'map'     => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3039.983690951662!2d-82.52163468425162!3d40.36488597937123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x883834e27fdac267%3A0x13b5127c745cda1!2sOhio+Truck+Equipment!5e0!3m2!1sen!2sin!4v1543831465487',
					),
					array(
						'name'    => 'Equipment Leasing Solutions',
						'phone'   => '877-359-4969',
						'address' => '8920 Columbus Rd · Mailing: P.O. Box 1146<br>Mount Vernon, OH 43050',
						'dir'     => 'Equipment Leasing Solutions, Ohio',
						'map'     => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3059.3417826282157!2d-82.82977468461871!3d39.93374397942417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88386350a0686f55%3A0x19c8e5477d69ad30!2sEquipment+Leasing+Solutions!5e0!3m2!1sen!2sin!4v1543831296894',
					),
				),
			),
			'loc_dir_text' => array( 'label' => 'Directions button text', 'default' => 'Get Directions' ),
		),
		'Call to action' => array(
			'cta_eyebrow'     => array( 'label' => 'Eyebrow', 'default' => 'Let\'s Build a Relationship' ),
			'cta_title'       => array( 'label' => 'Heading', 'default' => 'Questions about a truck, a body or financing? Our team is here to help.' ),
			'cta_text'        => array( 'type' => 'textarea', 'label' => 'Text', 'rows' => 3, 'default' => 'Robertson Truck Group has been serving Central Ohio for the last 42 years — reach out to any of our product specialists and industry experts.' ),
			'cta_phone_label' => array( 'label' => 'Text above the phone', 'default' => 'Call Robertson Truck Sales at', 'width' => 50 ),
			'cta_phone'       => array( 'label' => 'Phone', 'default' => '740-397-4969', 'width' => 50, 'help' => 'The call link is built from the digits.' ),
			'cta_btn_text'    => array( 'label' => 'Button text', 'default' => 'or send us a message', 'width' => 50 ),
			'cta_btn_url'     => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:contact#form', 'width' => 50 ),
		),
		'Divisions'     => array(
			'div_eyebrow' => array( 'label' => 'Eyebrow', 'default' => 'Other divisions of' ),
			'div_logo'    => array( 'type' => 'image', 'label' => 'Group logo', 'default' => 'images/rtg-logo-new-white.png' ),
			'div_cta'     => array( 'label' => 'Link text under each logo', 'default' => 'Visit site' ),
			'divisions'   => array(
				'type'   => 'items',
				'label'  => 'Division',
				'spare'  => 1,
				'fields' => array(
					'name' => array( 'label' => 'Name (logo alt text)', 'width' => 50 ),
					'url'  => array( 'type' => 'link', 'label' => 'Link', 'width' => 50 ),
					'logo' => array( 'type' => 'image', 'label' => 'Logo' ),
				),
				'items'  => array(
					array( 'name' => 'Equipment Leasing Solutions', 'url' => '#', 'logo' => 'images/els-logo.svg' ),
					array( 'name' => 'Ohio Truck Equipment', 'url' => '#', 'logo' => 'images/ote-logo.svg' ),
				),
			),
		),
	),
);

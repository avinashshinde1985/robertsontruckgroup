<?php
/**
 * Fields for page-templates/contact.php (Contact Us). See inc/fields.php for the format.
 *
 * @package RTS
 */

return array(
	'title' => 'Contact Us page',
	'tabs'  => array(
		'Hero'         => array(
			'hero_slides'    => array(
				'type'   => 'items',
				'label'  => 'Background slide',
				'spare'  => 2,
				'fields' => array(
					'image'   => array( 'type' => 'image', 'label' => 'Image', 'width' => 40 ),
					'caption' => array( 'label' => 'Caption', 'width' => 60, 'help' => 'Shown in the ticker line under the heading while this slide is visible.' ),
				),
				'items'  => array(
					array( 'image' => 'images/contact/hero-stock.jpg', 'caption' => 'Over 200 trucks in stock today' ),
					array( 'image' => 'images/contact/hero-jobsite.jpg', 'caption' => 'Built for the jobsite' ),
					array( 'image' => 'images/contact/hero-brands.jpg', 'caption' => 'Kenworth, Peterbilt, Freightliner &amp; many other brands in stock now' ),
				),
			),
			'hero_title'     => array( 'label' => 'Heading', 'default' => 'Let\'s Get You <span class="hl">On the Road</span>', 'help' => 'Wrap words in <span class="hl"> to highlight them.' ),
			'hero_btn_text'  => array( 'label' => 'Button text', 'default' => 'Send a Message', 'width' => 50 ),
			'hero_btn_url'   => array( 'type' => 'link', 'label' => 'Button link', 'default' => '#form', 'width' => 50 ),
			'phone'          => array( 'label' => 'Main phone', 'default' => '740-397-4969', 'help' => 'Used in the hero button, the "Talk to us" card, the contact details card and the "message sent" note. Call links are built from the digits.' ),
		),
		'Talk to us'   => array(
			'reach_title'       => array( 'label' => 'Title', 'default' => 'Talk to us', 'width' => 50 ),
			'reach_text'        => array( 'label' => 'Subtitle', 'default' => 'Pick the fastest way to reach our team', 'width' => 50 ),
			'reach_call_label'  => array( 'label' => 'Call row label', 'default' => 'Call Robertson Truck Sales', 'help' => 'The number is the main phone (Hero tab).' ),
			'reach_msg_label'   => array( 'label' => 'Message row label', 'default' => 'Send us a message', 'width' => 50 ),
			'reach_msg_value'   => array( 'label' => 'Message row text', 'default' => 'Contact form', 'width' => 50 ),
			'reach_visit_label' => array( 'label' => 'Visit row label', 'default' => 'Visit us', 'width' => 50 ),
			'reach_visit_value' => array( 'label' => 'Visit row text', 'default' => '8920 Columbus Rd.', 'width' => 50, 'help' => 'Links to directions (Contact form tab → Directions destination).' ),
		),
		'Quick dial'   => array(
			'dial' => array(
				'type'   => 'items',
				'label'  => 'Phone card',
				'spare'  => 1,
				'fields' => array(
					'name'  => array( 'label' => 'Company', 'width' => 40 ),
					'phone' => array( 'label' => 'Phone', 'width' => 30, 'help' => 'The call link is built from the digits.' ),
					'icon'  => array( 'label' => 'Icon', 'width' => 30, 'help' => 'Icon name from the sprite: truck, wrench, dollar, phone, chat, pin, brief, flame, brush, file.' ),
				),
				'items'  => array(
					array( 'name' => 'Robertson Truck Sales', 'phone' => '740-397-4969', 'icon' => 'truck' ),
					array( 'name' => 'Ohio Truck Equipment', 'phone' => '740-830-6488', 'icon' => 'wrench' ),
					array( 'name' => 'Equipment Leasing Solutions', 'phone' => '877-359-4969', 'icon' => 'dollar' ),
				),
			),
		),
		'Contact form' => array(
			'form_eyebrow'      => array( 'label' => 'Eyebrow', 'default' => 'Contact Us', 'width' => 50 ),
			'form_title'        => array( 'label' => 'Heading', 'default' => 'Send us a message', 'width' => 50 ),
			'form_intro'        => array( 'label' => 'Intro', 'default' => 'Choose a department and our team will get back to you. Fields marked <span class="req">*</span> are required.' ),
			'form_submit'       => array( 'label' => 'Submit button text', 'default' => 'Send Message', 'width' => 50 ),
			'form_sent_title'   => array( 'label' => '"Sent" title', 'default' => 'Message sent!', 'width' => 50 ),
			'form_sent_again'   => array( 'label' => '"Send another" button text', 'default' => 'Send another message' ),
			'info_eyebrow'      => array( 'label' => 'Details card eyebrow', 'default' => 'Visit Our Campus', 'width' => 50 ),
			'info_title'        => array( 'label' => 'Details card title', 'default' => 'Robertson Truck Sales', 'width' => 50 ),
			'info_address'      => array( 'label' => 'Address', 'default' => '8920 Columbus Rd.<br>P.O. Box 1146<br>Mount Vernon, OH 43050', 'help' => 'Use <br> for line breaks. The phone below it is the main phone (Hero tab).' ),
			'info_map'          => array( 'label' => 'Google Maps embed URL', 'default' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6080.166876326157!2d-82.5164687573944!3d40.36267422084092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x883834e2879c69a3%3A0xa674f1c55a85b493!2sRobertson%20Truck%20Sales!5e0!3m2!1sen!2sin!4v1753346949728!5m2!1sen!2sin', 'help' => 'Google Maps → Share → Embed a map → the src="…" URL.' ),
			'info_dir'          => array( 'label' => 'Directions destination', 'default' => 'Robertson Truck Sales, 8920 Columbus Rd, Mount Vernon, OH 43050', 'help' => 'Address Google Maps routes to (used by the "Visit us" row and the directions button).' ),
			'info_dir_text'     => array( 'label' => 'Directions button text', 'default' => 'Get Directions' ),
			'info_careers_title' => array( 'label' => 'Careers link title', 'default' => 'Looking for a job?', 'width' => 50 ),
			'info_careers_text' => array( 'label' => 'Careers link text', 'default' => 'See careers at Robertson Truck Group', 'width' => 50 ),
		),
		'Careers'      => array(
			'careers_bg'       => array( 'type' => 'image', 'label' => 'Background image', 'default' => 'images/v2/facility.jpg' ),
			'careers_eyebrow'  => array( 'label' => 'Eyebrow', 'default' => 'Careers' ),
			'careers_title'    => array( 'label' => 'Heading', 'default' => 'Apply below! <span>Join our team</span>', 'help' => 'The <span> part is shown on its own line.' ),
			'careers_lead'     => array( 'type' => 'textarea', 'label' => 'Lead', 'rows' => 2, 'default' => 'We are always looking for talented individuals for future job openings.' ),
			'careers_text'     => array(
				'type'    => 'html',
				'label'   => 'Text',
				'rows'    => 6,
				'default' => "<p>Robertson Trucks Group is a family owned and operated business since 1984 and includes Robertson Truck Sales, Ohio Truck Equipment, National Truck &amp; Equipment Sales and Equipment Leasing Solutions. We specialize in quality, preowned medium and heavy-duty trucks and equipment.</p>\n      <p>We offer a positive work environment, a culture that appreciates and rewards excellence, competitive compensation and a full benefit package.</p>",
			),
			'careers_thanks'   => array( 'type' => 'textarea', 'label' => 'Closing line', 'rows' => 2, 'default' => 'Thank you for your interest in working for our company and have a great day!' ),
			'careers_btn_text' => array( 'label' => 'Button text', 'default' => 'Apply Now', 'width' => 50 ),
			'careers_btn_url'  => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'https://linktr.ee/RobertsonTruckGroup', 'width' => 50, 'help' => 'Opens in a new tab.' ),
			'perks_title'      => array( 'label' => 'Benefits title', 'default' => 'Full benefit package' ),
			'perks'            => array(
				'type'   => 'items',
				'label'  => 'Benefit',
				'spare'  => 2,
				'fields' => array(
					'text' => array( 'label' => 'Text', 'width' => 70 ),
					'wide' => array( 'type' => 'toggle', 'label' => 'Full width', 'width' => 30, 'help' => 'Give this line the full width (for long text).' ),
				),
				'items'  => array(
					array( 'text' => 'Medical', 'wide' => '' ),
					array( 'text' => 'Dental', 'wide' => '' ),
					array( 'text' => 'Vision', 'wide' => '' ),
					array( 'text' => 'Life', 'wide' => '' ),
					array( 'text' => 'Disability', 'wide' => '' ),
					array( 'text' => 'Paid time off', 'wide' => '' ),
					array( 'text' => 'Retirement plan with company match', 'wide' => 'yes' ),
				),
			),
			'family_title'     => array( 'label' => 'Companies title', 'default' => 'The Robertson family of companies' ),
			'family'           => array(
				'type'   => 'items',
				'label'  => 'Company',
				'spare'  => 2,
				'fields' => array(
					'name' => array( 'label' => 'Name' ),
				),
				'items'  => array(
					array( 'name' => 'Robertson Truck Sales' ),
					array( 'name' => 'Ohio Truck Equipment' ),
					array( 'name' => 'National Truck &amp; Equipment Sales' ),
					array( 'name' => 'Equipment Leasing Solutions' ),
				),
			),
		),
		'Divisions'    => array(
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
		'Locations'    => array(
			'locs' => array(
				'type'   => 'items',
				'label'  => 'Location',
				'spare'  => 2,
				'fields' => array(
					'name'    => array( 'label' => 'Name', 'width' => 50 ),
					'phone'   => array( 'label' => 'Phone', 'width' => 50, 'help' => 'The call link is built from the digits.' ),
					'address' => array( 'label' => 'Address', 'help' => 'Use <br> for line breaks.' ),
				),
				'items'  => array(
					array( 'name' => 'Robertson Truck Sales', 'phone' => '740-397-4969', 'address' => '8920 Columbus Rd.<br>P.O. Box 1146<br>Mount Vernon, OH 43050' ),
					array( 'name' => 'Ohio Truck Equipment Sales Office', 'phone' => '740-830-6488', 'address' => '8895 Columbus Rd,<br>P.O. Box 991<br>Mt Vernon, OH 43050' ),
					array( 'name' => 'Equipment Leasing &amp; Solutions', 'phone' => '877-359-4969', 'address' => '8920 Columbus Rd.<br>P.O. Box 1146<br>Mount Vernon, OH 43050' ),
					array( 'name' => 'Ohio Truck Equipment Production Facility', 'phone' => '740-830-6488', 'address' => '525 West Chestnut St.<br>Lot 11<br>Mt Vernon, OH 43050' ),
				),
			),
		),
	),
);

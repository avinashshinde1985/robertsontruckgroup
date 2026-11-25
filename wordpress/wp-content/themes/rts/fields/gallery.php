<?php
/**
 * Fields for page-templates/gallery.php (Gallery page). See inc/fields.php for the format.
 *
 * @package RTS
 */

return array(
	'title' => 'Gallery page',
	'tabs'  => array(
		'Hero'           => array(
			'hero_slides'    => array(
				'type'   => 'items',
				'label'  => 'Background slide',
				'spare'  => 2,
				'fields' => array(
					'image' => array( 'type' => 'image', 'label' => 'Image' ),
				),
				'items'  => array(
					array( 'image' => 'images/about/hero-trusted.jpg' ),
					array( 'image' => 'images/gallery/g04.jpg' ),
					array( 'image' => 'images/about/hero-stock.jpg' ),
				),
			),
			'hero_crumb'     => array( 'label' => 'Breadcrumb label', 'default' => 'Gallery' ),
			'hero_title'     => array( 'label' => 'Heading', 'default' => 'See Our <span class="hl">Work</span>', 'help' => '<span class="hl"> highlights words.' ),
			'hero_lead'      => array( 'type' => 'textarea', 'label' => 'Intro', 'rows' => 3, 'default' => 'Central Ohio\'s most trusted truck dealer for more than 30 years. Don\'t see what you\'re looking for? We can build it.' ),
			'hero_btn1_text' => array( 'label' => 'Button 1 text', 'default' => 'Browse the Gallery', 'width' => 50 ),
			'hero_btn1_url'  => array( 'type' => 'link', 'label' => 'Button 1 link', 'default' => '#work', 'width' => 50 ),
			'hero_btn2_text' => array( 'label' => 'Button 2 text', 'default' => 'Browse Inventory', 'width' => 50 ),
			'hero_btn2_url'  => array( 'type' => 'link', 'label' => 'Button 2 link', 'default' => 'rts:inventory', 'width' => 50 ),
			'glance_sub'     => array( 'label' => 'Photo card sub-heading', 'default' => 'Jump to a category', 'help' => 'The photo counts in this card are calculated from the Photos tab.' ),
		),
		'Photos'         => array(
			'work_tag'   => array( 'label' => 'Eyebrow', 'default' => 'See Our Work' ),
			'work_title' => array( 'label' => 'Heading', 'default' => 'Built, serviced &amp; detailed in Mount Vernon' ),
			'photos'     => array(
				'type'   => 'items',
				'label'  => 'Photo',
				'spare'  => 8,
				'fields' => array(
					'image'   => array( 'type' => 'image', 'label' => 'Photo', 'width' => 30 ),
					'caption' => array( 'label' => 'Caption', 'width' => 35 ),
					'alt'     => array( 'label' => 'Alt text (describes the photo)', 'width' => 35 ),
					'cat'     => array( 'type' => 'select', 'label' => 'Category', 'choices' => array( 'fabrication' => 'Fabrication', 'shop' => 'Shop', 'trucks' => 'Trucks', 'facility' => 'Facility' ), 'width' => 30 ),
					'size'    => array( 'type' => 'select', 'label' => 'Tile size', 'choices' => array( '' => 'Normal', 'big' => 'Big', 'wide' => 'Wide' ), 'width' => 30 ),
					'w'       => array( 'label' => 'Width (px)', 'width' => 20 ),
					'h'       => array( 'label' => 'Height (px)', 'width' => 20 ),
				),
				'items'  => array(
					array( 'image' => 'images/gallery/g06.jpg', 'caption' => 'Flatbed build ready for the road', 'alt' => 'White Kenworth tractor with a long flatbed trailer', 'cat' => 'trucks', 'size' => 'big', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g03.jpg', 'caption' => 'Precision welding in the fab shop', 'alt' => 'Welder at work with sparks and smoke', 'cat' => 'fabrication', 'size' => '', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g02.jpg', 'caption' => 'Robertson Truck Sales mud flap', 'alt' => 'Robertson Truck Sales branded mud flap on a dump truck', 'cat' => 'trucks', 'size' => '', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g08.jpg', 'caption' => 'Fabrication facility with overhead cranes', 'alt' => 'Fabrication shop with yellow overhead cranes and truck chassis', 'cat' => 'fabrication', 'size' => 'wide', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g10.jpg', 'caption' => 'Full mechanical shop', 'alt' => 'Trucks being serviced in the mechanical shop', 'cat' => 'shop', 'size' => '', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g07.jpg', 'caption' => 'Cutting steel for a custom build', 'alt' => 'Sparks flying while cutting steel', 'cat' => 'fabrication', 'size' => '', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g09.jpg', 'caption' => 'Our showroom in Mount Vernon', 'alt' => 'Robertson Truck Sales showroom and front desk', 'cat' => 'facility', 'size' => 'big', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g11.jpg', 'caption' => 'Dump truck in for service', 'alt' => 'Dump truck in the service bay', 'cat' => 'shop', 'size' => 'wide', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g01.jpg', 'caption' => 'Custom flatbed upfit in progress', 'alt' => 'Red flatbed body being upfitted on a truck', 'cat' => 'fabrication', 'size' => 'big', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g05.jpg', 'caption' => 'Paint booth – prepped and masked', 'alt' => 'Truck masked inside the paint booth', 'cat' => 'facility', 'size' => '', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g16.jpg', 'caption' => 'Robertson Truck Group – Mt. Vernon, OH', 'alt' => 'Robertson Truck Group logo on a truck door', 'cat' => 'trucks', 'size' => '', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g17.jpg', 'caption' => 'Welding after hours', 'alt' => 'Welder in a dark shop lit by the welding arc', 'cat' => 'fabrication', 'size' => 'wide', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g12.jpg', 'caption' => 'Cab tilted for service', 'alt' => 'Truck with cab tilted forward in the shop', 'cat' => 'shop', 'size' => '', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g15.jpg', 'caption' => 'Engine work by our technicians', 'alt' => 'Technician working on a truck engine', 'cat' => 'shop', 'size' => 'big', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g04.jpg', 'caption' => 'Built in Mt. Vernon, Ohio', 'alt' => 'Robertson Truck Sales mud flap close-up', 'cat' => 'trucks', 'size' => '', 'w' => '1200', 'h' => '546' ),
					array( 'image' => 'images/gallery/g14.jpg', 'caption' => 'Room for every job', 'alt' => 'Spacious service shop with trucks and tool carts', 'cat' => 'shop', 'size' => '', 'w' => '1140', 'h' => '570' ),
					array( 'image' => 'images/gallery/g13.jpg', 'caption' => 'Service bays at work', 'alt' => 'Wide view of the service shop with several trucks', 'cat' => 'shop', 'size' => '', 'w' => '1140', 'h' => '570' ),
				),
			),
		),
		'Call to action' => array(
			'cta_tag'        => array( 'label' => 'Eyebrow', 'default' => 'Over 200 Trucks Currently in Stock' ),
			'cta_title'      => array( 'label' => 'Heading', 'default' => 'Don\'t see what you\'re looking for? We can build it.' ),
			'cta_text'       => array( 'type' => 'textarea', 'label' => 'Text', 'rows' => 3, 'default' => 'Our fabrication center, mechanical shop and paint &amp; detail facility can take any chassis and build it for your job.' ),
			'cta_btn2_text'  => array( 'label' => 'Left button text', 'default' => 'See Our Capabilities', 'width' => 50 ),
			'cta_btn2_url'   => array( 'type' => 'link', 'label' => 'Left button link', 'default' => 'rts:capabilities', 'width' => 50 ),
			'cta_call_label' => array( 'label' => 'Text above the phone', 'default' => 'Call Robertson Truck Sales at' ),
			'cta_phone'      => array( 'label' => 'Phone (shown)', 'default' => '740-397-4969', 'width' => 50 ),
			'cta_tel'        => array( 'type' => 'link', 'label' => 'Phone link', 'default' => 'tel:7403974969', 'width' => 50 ),
			'cta_btn_text'   => array( 'label' => 'Button text', 'default' => 'or send us a message', 'width' => 50 ),
			'cta_btn_url'    => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:contact#form', 'width' => 50 ),
		),
		'Divisions'      => array(
			'div_tag'   => array( 'label' => 'Eyebrow', 'default' => 'Other divisions of', 'width' => 50 ),
			'div_logo'  => array( 'type' => 'image', 'label' => 'Group logo', 'default' => 'images/rtg-logo-new-white.png', 'width' => 50 ),
			'divisions' => array(
				'type'   => 'items',
				'label'  => 'Division',
				'spare'  => 1,
				'fields' => array(
					'name' => array( 'label' => 'Name (logo alt text)', 'width' => 50 ),
					'logo' => array( 'type' => 'image', 'label' => 'Logo', 'width' => 50 ),
					'cta'  => array( 'label' => 'Link text', 'width' => 50 ),
					'url'  => array( 'type' => 'link', 'label' => 'Link', 'width' => 50 ),
				),
				'items'  => array(
					array( 'name' => 'Equipment Leasing Solutions', 'logo' => 'images/els-logo.svg', 'cta' => 'Visit site', 'url' => '#' ),
					array( 'name' => 'Ohio Truck Equipment', 'logo' => 'images/ote-logo.svg', 'cta' => 'Visit site', 'url' => '#' ),
				),
			),
		),
	),
);

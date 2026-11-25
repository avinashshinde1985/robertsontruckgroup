<?php
/**
 * Fields for page-templates/home.php (Robertson Truck Sales front page). See inc/fields.php for the format.
 *
 * @package RTS
 */

$icon_help = 'Icon name from the sprite: truck, wrench, shield, award, dollar, check, phone, spark, arrow, arrow-ur.';

return array(
	'title' => 'Home page',
	'tabs'  => array(
		'Hero'               => array(
			'hero_image'      => array( 'type' => 'image', 'label' => 'Background image', 'default' => 'images/v2/build.jpg' ),
			'hero_pill'       => array( 'label' => 'Pill text', 'default' => '42 Years in the Making · Mount Vernon, Ohio' ),
			'hero_title_1'    => array( 'label' => 'Heading line 1', 'default' => 'Ohio\'s Premiere', 'width' => 33 ),
			'hero_title_2'    => array( 'label' => 'Heading line 2 (outlined)', 'default' => 'Used Truck', 'width' => 33 ),
			'hero_title_3'    => array( 'label' => 'Heading line 3', 'default' => 'Dealer<em>.</em>', 'width' => 34 ),
			'hero_sub_1'      => array( 'label' => 'Subline before the rotating word', 'default' => 'Medium &amp; heavy-duty', 'width' => 50 ),
			'hero_rotator'    => array( 'label' => 'Rotating word (first shown)', 'default' => 'dump trucks', 'width' => 50 ),
			'hero_sub_2'      => array( 'label' => 'Subline second line', 'default' => 'reconditioned, upfitted &amp; financed — under one roof.' ),
			'hero_btn1_text'  => array( 'label' => 'Button 1 text', 'default' => 'Browse Inventory', 'width' => 50 ),
			'hero_btn1_url'   => array( 'type' => 'link', 'label' => 'Button 1 link', 'default' => 'rts:inventory', 'width' => 50 ),
			'hero_btn2_text'  => array( 'label' => 'Button 2 text', 'default' => 'Value My Trade', 'width' => 50 ),
			'hero_btn2_url'   => array( 'type' => 'link', 'label' => 'Button 2 link', 'default' => 'rts:trade', 'width' => 50 ),
			'hero_search_btn' => array( 'label' => 'Search button text', 'default' => 'Find truck' ),
			'hero_types_label' => array( 'label' => 'Type links label', 'default' => 'Shop by type' ),
			'hero_types'      => array(
				'type'   => 'items',
				'label'  => 'Type link',
				'spare'  => 2,
				'fields' => array(
					'text' => array( 'label' => 'Text', 'width' => 40 ),
					'url'  => array( 'type' => 'link', 'label' => 'Link', 'width' => 60 ),
				),
				'items'  => array(
					array( 'text' => 'Dump trucks', 'url' => 'rts:inventory?type=Dump%20Truck' ),
					array( 'text' => 'Box trucks', 'url' => 'rts:inventory?type=Box%20Truck' ),
					array( 'text' => 'Flatbeds', 'url' => 'rts:inventory?type=Flatbed' ),
					array( 'text' => 'Day cabs', 'url' => 'rts:inventory?type=Day%20Cab' ),
					array( 'text' => 'Cab &amp; chassis', 'url' => 'rts:inventory?type=Cab%20%26%20Chassis' ),
				),
			),
			'hero_cards'      => array(
				'type'   => 'items',
				'label'  => 'Side card',
				'fields' => array(
					'kind'   => array( 'label' => 'Label', 'width' => 25 ),
					'num'    => array( 'label' => 'Number (counts up)', 'width' => 25, 'help' => 'Digits only.' ),
					'suffix' => array( 'label' => 'After the number', 'width' => 25, 'help' => 'Start with a space if needed.' ),
					'text'   => array( 'label' => 'Text', 'width' => 25 ),
				),
				'items'  => array(
					array( 'kind' => 'Campus', 'num' => '15', 'suffix' => '-acre', 'text' => 'Mechanical &amp; detail shop' ),
					array( 'kind' => 'Fabrication', 'num' => '100000', 'suffix' => ' ft²', 'text' => 'Minutes from our main campus' ),
				),
			),
		),
		'Featured inventory' => array(
			'feat_tag'      => array( 'label' => 'Tag', 'default' => '[ In stock now ]' ),
			'feat_title'    => array( 'label' => 'Heading', 'default' => 'Featured <span class="grad">inventory</span>' ),
			'feat_btn_text' => array( 'label' => 'Button text', 'default' => 'See all trucks', 'width' => 50 ),
			'feat_btn_url'  => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:inventory', 'width' => 50 ),
		),
		'Value my trade'     => array(
			'trade_tag'      => array( 'label' => 'Tag', 'default' => '[ Value My Trade ]' ),
			'trade_title'    => array( 'label' => 'Heading', 'default' => 'What\'s your truck worth?' ),
			'trade_text'     => array( 'type' => 'textarea', 'label' => 'Text', 'default' => 'Send us the year, make, model and a few photos. A sales rep follows up with a number you can put toward any truck on our lot.' ),
			'trade_btn_text' => array( 'label' => 'Button text', 'default' => 'Value my trade', 'width' => 50 ),
			'trade_btn_url'  => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:trade', 'width' => 50 ),
			'trade_steps'    => array(
				'type'   => 'items',
				'label'  => 'Step',
				'spare'  => 1,
				'fields' => array( 'text' => array( 'label' => 'Text' ) ),
				'items'  => array(
					array( 'text' => 'Tell us about your truck' ),
					array( 'text' => 'Snap a few photos' ),
					array( 'text' => 'A rep follows up with your value' ),
				),
			),
		),
		'Brands marquee'     => array(
			'brands' => array(
				'type'   => 'items',
				'label'  => 'Brand',
				'spare'  => 2,
				'fields' => array( 'name' => array( 'label' => 'Name' ) ),
				'items'  => array(
					array( 'name' => 'Freightliner' ),
					array( 'name' => 'International' ),
					array( 'name' => 'Beau-Roc' ),
					array( 'name' => 'CAM-Superline' ),
					array( 'name' => 'Godwin' ),
					array( 'name' => 'NRC Industries' ),
					array( 'name' => 'Sure-Trac' ),
					array( 'name' => 'Switch N Go' ),
				),
			),
		),
		'About'              => array(
			'intro_tag'  => array( 'label' => 'Tag', 'default' => '[ 01 — About ]' ),
			'intro_lead' => array( 'type' => 'textarea', 'label' => 'Lead text (lights up on scroll)', 'default' => 'At Robertson Truck Group, we know that you’re looking for the highest quality pre-owned trucks in order to keep your business moving. Based in Mount Vernon, Ohio, we provide all our clients a wide variety of inventory that meets all of your standards and then some.' ),
			'intro_text' => array(
				'type'    => 'html',
				'label'   => 'Two columns of text',
				'help'    => 'One <p> per column.',
				'rows'    => 6,
				'default' => "<p>With Robertson Truck Group, it’s easy to find the right vehicle for you in our inventory of used trucks for sale in Ohio. Whether you’re looking for medium or used heavy-duty trucks for sale in Ohio then turn to Robertson Truck Group.</p>\n      <p>Our full suite of services and used trucks for sale in Columbus Ohio include fabrication, upfitting, financing and a high-quality level of customer service to get you on the road with a truck that will take you and your business farther.</p>",
			),
			'rings'      => array(
				'type'   => 'items',
				'label'  => 'Stat ring',
				'fields' => array(
					'label'  => array( 'label' => 'Label', 'width' => 40 ),
					'num'    => array( 'label' => 'Number (counts up)', 'width' => 20, 'help' => 'Digits only.' ),
					'suffix' => array( 'label' => 'After the number', 'width' => 20 ),
					'pct'    => array( 'label' => 'Ring fill (0 to 1)', 'width' => 20, 'help' => 'e.g. .6' ),
				),
				'items'  => array(
					array( 'label' => 'Years serving Central Ohio', 'num' => '42', 'suffix' => '', 'pct' => '.84' ),
					array( 'label' => 'Sq ft fabrication facility', 'num' => '25000', 'suffix' => '', 'pct' => '.6' ),
					array( 'label' => 'Containers leased statewide', 'num' => '100', 'suffix' => '+', 'pct' => '.33' ),
					array( 'label' => 'Storage trailers leased', 'num' => '200', 'suffix' => '+', 'pct' => '.66' ),
				),
			),
		),
		'Why Robertson'      => array(
			'bento_tag'   => array( 'label' => 'Tag', 'default' => '[ 02 — Why Robertson ]' ),
			'bento_title' => array( 'label' => 'Heading', 'default' => 'The Robertson<br><span class="grad">Truck Group Standard</span>' ),
			'bento'       => array(
				'type'   => 'items',
				'label'  => 'Tile',
				'help'   => 'Five tiles fill the grid; tile 5 is red.',
				'fields' => array(
					'title'     => array( 'label' => 'Title', 'width' => 70 ),
					'icon'      => array( 'label' => 'Icon', 'width' => 30, 'help' => $icon_help ),
					'text'      => array( 'type' => 'textarea', 'label' => 'Text', 'rows' => 4 ),
					'image'     => array( 'type' => 'image', 'label' => 'Image (optional)', 'width' => 50 ),
					'image_alt' => array( 'label' => 'Image alt text', 'width' => 50 ),
					'link_text' => array( 'label' => 'Link text (optional)', 'width' => 50 ),
					'link_url'  => array( 'type' => 'link', 'label' => 'Link', 'width' => 50 ),
				),
				'items'  => array(
					array(
						'title'     => 'One Stop Shop',
						'icon'      => 'wrench',
						'text'      => 'Our 15-acre campus includes a full mechanical and detail shop as well as a 100,000 square foot fabrication facility within minutes of our main campus, that allows you to receive your truck fast and tailored to fit your specific needs. Robertson Truck Group is a one-stop shop for all your commercial truck needs.',
						'image'     => 'images/v2/fabrication.jpg',
						'image_alt' => 'Technician welding in the fabrication shop',
					),
					array(
						'title' => 'Road-Ready Condition',
						'icon'  => 'truck',
						'text'  => 'As a group of heavy duty truck dealers in Ohio, we know how important it is that we stand behind our vehicles and want you on the road as quickly as possible. Our heavy-duty vehicles are reconditioned and detailed so you can get right to work.',
					),
					array(
						'title' => 'Quality Sourced',
						'icon'  => 'shield',
						'text'  => 'Our vast and well-maintained inventory are sourced from major fleets across the country and each truck is hand selected to ensure quality as well as reliability.',
					),
					array(
						'title' => 'Raising the Bar',
						'icon'  => 'award',
						'text'  => 'We pride ourselves on going the extra mile and raising the standard of quality within the used medium and heavy-duty truck industry. Our Robertson Truck Group Standard exceeds the quality of detail of any other dealership within the market. When you look for used heavy duty trucks for sale in Columbus, Ohio, there’s no better company to turn to than Robertson Truck Group.',
					),
					array(
						'title'     => 'Financing',
						'icon'      => 'dollar',
						'text'      => 'Let us help you determine the best financial solution for your needs and guide you throughout the financing process. Finding used trucks for sale in Ohio that meet your needs and match your budget shouldn’t be difficult, and we make it easy to find that sweet spot to get you on the road and driving as soon as possible.',
						'link_text' => 'Finance Application',
						'link_url'  => 'rts:contact',
					),
				),
			),
		),
		'Upfitting'          => array(
			'caps_tag'       => array( 'label' => 'Tag', 'default' => '[ 03 — Upfitting Made Easy ]' ),
			'caps_title'     => array( 'label' => 'Heading', 'default' => 'Pick a truck. We build it for <span class="grad">your</span> job.' ),
			'caps_text'      => array( 'type' => 'textarea', 'label' => 'Text', 'default' => 'Choose any truck in our inventory and our fabrication facility will take the chassis and alter it to make your next job easier.' ),
			'caps_link_text' => array( 'label' => 'Link text', 'default' => 'Get an upfit quote', 'width' => 50 ),
			'caps_link_url'  => array( 'type' => 'link', 'label' => 'Link', 'default' => 'rts:quote', 'width' => 50 ),
			'caps'           => array(
				'type'   => 'items',
				'label'  => 'Capability card',
				'spare'  => 2,
				'fields' => array(
					'title' => array( 'label' => 'Title' ),
					'image' => array( 'type' => 'image', 'label' => 'Image', 'width' => 50 ),
					'alt'   => array( 'label' => 'Image alt text', 'width' => 50 ),
				),
				'items'  => array(
					array( 'title' => 'Ohio\'s Leading Body Upfitter', 'image' => 'images/v2/upfitter.jpg', 'alt' => 'Chassis being upfitted' ),
					array( 'title' => 'Dump Body Installations', 'image' => 'images/v2/dump-body.jpg', 'alt' => 'Dump body installation' ),
					array( 'title' => 'Flatbed Installations', 'image' => 'images/v2/flatbed.jpg', 'alt' => 'Flatbed installation' ),
					array( 'title' => 'Frame Alterations', 'image' => 'images/v2/frame.jpg', 'alt' => 'Frame alterations' ),
					array( 'title' => 'Wheelbase Modifications', 'image' => 'images/v2/wheelbase.jpg', 'alt' => 'Wheelbase modifications' ),
					array( 'title' => 'Complete Driveline Work', 'image' => 'images/v2/driveline.jpg', 'alt' => 'Driveline work' ),
					array( 'title' => '25,000 Sq Ft Dedicated to Building Your Truck', 'image' => 'images/v2/facility.jpg', 'alt' => 'Fabrication facility' ),
				),
			),
			'caps_cta_url'   => array( 'type' => 'link', 'label' => '"View all capabilities" card link', 'default' => 'rts:capabilities' ),
		),
		'Visit'              => array(
			'story_image'     => array( 'type' => 'image', 'label' => 'Image', 'default' => 'images/v2/wheelbase.jpg', 'width' => 50 ),
			'story_image_alt' => array( 'label' => 'Image alt text', 'default' => 'Truck chassis on lift', 'width' => 50 ),
			'story_chip'      => array( 'label' => 'Floating chip', 'default' => 'Any chassis. Any spec.' ),
			'story_tag'       => array( 'label' => 'Tag', 'default' => '[ 04 — Commercial Truck Dealers in Ohio ]' ),
			'story_title'     => array( 'label' => 'Heading', 'default' => 'Visit Robertson Truck Sales' ),
			'story_text'      => array(
				'type'    => 'html',
				'label'   => 'Text',
				'help'    => 'Keep class="reveal" on each paragraph for the scroll animation.',
				'rows'    => 8,
				'default' => "<p class=\"reveal\">What makes us different from other heavy-duty truck dealers in Ohio is that we provide our clients the opportunity to upfit their own trucks or choose one from our inventory and build it to their own specific needs. Robertson Truck Group knows that not every business and entrepreneur have the same specs that they want for their truck, which is why we offer upfitting to bring customer satisfaction and the perfect vehicle to you.</p>\n      <p class=\"reveal\">Robertson Truck Sales understands how important it is to keep your equipment functional and on the road in order to keep your business moving that is why we work with only trusted body manufactures and source quality vehicle parts for our trucks for sale in Columbus, Ohio.</p>",
			),
			'story_btn1_text' => array( 'label' => 'Button 1 text', 'default' => 'Browse Inventory', 'width' => 50 ),
			'story_btn1_url'  => array( 'type' => 'link', 'label' => 'Button 1 link', 'default' => 'rts:inventory', 'width' => 50 ),
			'story_btn2_text' => array( 'label' => 'Button 2 text', 'default' => 'Explore Capabilities', 'width' => 50 ),
			'story_btn2_url'  => array( 'type' => 'link', 'label' => 'Button 2 link', 'default' => 'rts:capabilities', 'width' => 50 ),
		),
		'Products'           => array(
			'prods_tag'      => array( 'label' => 'Tag', 'default' => '[ 05 — Featured Products ]' ),
			'prods_title'    => array( 'label' => 'Heading', 'default' => 'Bodies &amp; trailers <span class="grad">we trust</span>' ),
			'prods_btn_text' => array( 'label' => 'Button text', 'default' => 'Get an install quote', 'width' => 50 ),
			'prods_btn_url'  => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:quote', 'width' => 50 ),
			'prods'          => array(
				'type'   => 'items',
				'label'  => 'Product',
				'spare'  => 2,
				'fields' => array(
					'name'  => array( 'label' => 'Name', 'width' => 40 ),
					'image' => array( 'type' => 'image', 'label' => 'Image', 'width' => 30 ),
					'url'   => array( 'type' => 'link', 'label' => 'Link', 'width' => 30 ),
				),
				'items'  => array(
					array( 'name' => 'Beau-Roc', 'image' => 'images/p-beau-roc.jpg', 'url' => '#' ),
					array( 'name' => 'CAM-Superline Trailers', 'image' => 'images/p-cam-superline.jpg', 'url' => '#' ),
					array( 'name' => 'Godwin Manufacturing', 'image' => 'images/p-godwin.jpg', 'url' => '#' ),
					array( 'name' => 'NRC Industries', 'image' => 'images/p-nrc.jpg', 'url' => '#' ),
					array( 'name' => 'Sure-Trac Trailers', 'image' => 'images/p-sure-trac.jpg', 'url' => '#' ),
					array( 'name' => 'Switch N Go', 'image' => 'images/p-switch-n-go.jpg', 'url' => '#' ),
				),
			),
		),
		'Inventory'          => array(
			'inv_tag'       => array( 'label' => 'Tag', 'default' => '[ 06 — Inventory ]' ),
			'inv_title'     => array( 'label' => 'Heading', 'default' => 'Offering the highest quality pre-owned trucks in Ohio' ),
			'inv_p1_start'  => array( 'label' => 'Paragraph 1: before the link', 'default' => 'As a', 'width' => 30 ),
			'inv_p1_link'   => array( 'label' => 'Paragraph 1: link text', 'default' => 'top-rated commercial truck dealer in Ohio', 'width' => 40 ),
			'inv_p1_url'    => array( 'type' => 'link', 'label' => 'Paragraph 1: link', 'default' => 'rts:inventory', 'width' => 30 ),
			'inv_p1_end'    => array( 'type' => 'textarea', 'label' => 'Paragraph 1: after the link', 'rows' => 3, 'default' => ', we keep a wide variety of inventory so that you can find the right heavy-duty truck for your business. Whether you simply need something to get you from point A to point B or you’re looking for a truck that you can upfit with all the bells and whistles, Robertson Truck Group has the inventory to keep your business moving.' ),
			'inv_p2'        => array( 'type' => 'textarea', 'label' => 'Paragraph 2', 'rows' => 3, 'default' => 'We pride ourselves on keeping a diverse variety of used trucks for sale in Ohio so you’ll be hard-pressed not to find a truck that will suit your needs and exceed your standards. Look through our inventory below and see for yourself why many businesses opt for a Robertson Truck Group heavy-duty vehicle.' ),
			'inv_tabs'      => array(
				'type'   => 'items',
				'label'  => 'Tab',
				'spare'  => 1,
				'fields' => array(
					'label' => array( 'label' => 'Tab label', 'width' => 50 ),
					'title' => array( 'label' => 'Heading', 'width' => 50 ),
					'text'  => array( 'type' => 'textarea', 'label' => 'Text', 'rows' => 4 ),
					'chips' => array( 'label' => 'Chips (optional)', 'help' => 'Comma-separated.' ),
				),
				'items'  => array(
					array(
						'label' => 'Types of Trucks',
						'title' => 'Types of Used Trucks Available',
						'text'  => 'At Robertson Truck Sales, part of the Robertson Truck Group family, we take pride in offering one of the most comprehensive selections of used trucks for sale in the Mount Vernon area and throughout Ohio. Our inventory is carefully curated to meet the diverse needs of businesses and owner-operators across the industry, featuring medium and heavy-duty trucks from trusted brands like Freightliner, International, and more.',
						'chips' => 'Freightliner, International, Medium Duty, Heavy Duty, &amp; more',
					),
					array(
						'label' => 'Our Process',
						'title' => 'Rigorous inspection &amp; servicing',
						'text'  => 'Each truck in our lineup undergoes a rigorous inspection and servicing process to ensure it meets the high standards that have made Robertson Truck Group a leader in the industry. Whether you need a dependable workhorse for your fleet or a versatile vehicle for specialized applications, our knowledgeable team is here to guide you every step of the way.',
					),
					array(
						'label' => 'Get Help',
						'title' => 'Browse, ask, drive',
						'text'  => 'We invite you to explore our current inventory on our website, where you can easily browse by make, model, and specifications to find the perfect fit for your operation. If you have questions about a specific truck or want personalized assistance, simply reach out to us via email or give us a call. Our dedicated staff is committed to serving the Mount Vernon community and beyond, making your truck sales experience as smooth and efficient as possible. Visit our page today to discover why so many businesses trust Robertson Truck Group for their used truck needs.',
					),
				),
			),
		),
		'Buyer\'s guide'     => array(
			'guide_tag'   => array( 'label' => 'Tag', 'default' => '[ 07 — Buyer\'s Guide ]' ),
			'guide_title' => array( 'label' => 'Heading', 'default' => 'Brands and Things to Check When <span class="grad">Buying a Used Truck</span> in Ohio' ),
			'guide_text'  => array( 'type' => 'textarea', 'label' => 'Intro', 'default' => 'There are many things to check when buying a used truck. There are many advantages to getting a used truck such as saving money on your purchase. However, you need to make sure you’re getting a good deal before you buy a used truck in Ohio. It is the point of this article to help you find the diamond in the rough quickly by giving you the 3 top things to check when buying a used truck.' ),
			'guide_stops' => array(
				'type'   => 'items',
				'label'  => 'Stop',
				'spare'  => 1,
				'fields' => array(
					'title' => array( 'label' => 'Title' ),
					'text'  => array( 'type' => 'html', 'label' => 'Text', 'rows' => 8 ),
				),
				'items'  => array(
					array(
						'title' => 'Inspect the Body',
						'text'  => "<p>You must know what to look for when buying a used truck. Rust is one of the first things to check for when buying a used truck.</p>\n          <p>Of course, many second-hand vehicles may have rust, but it’s the location that matters. There is significant damage to a truck if there is rust on the exhaust pipes, muffler, wheels, frame rails, or floor pans.</p>\n          <p>You may notice certain parts of the body seem newer than others. This could be a sign that there was some serious damage to the truck that caused the owner to replace parts.</p>\n          <p>Scratches and dents should be at the top of things to check when buying a used truck. You need a keen eye for subtle cosmetic damage.</p>",
					),
					array(
						'title' => 'Rev The Engine',
						'text'  => "<p>One of the most important things to check when buying a used truck is the engine. Make sure the engine is cool before you take a look at it.</p>\n          <p>Check the ground under the hood for splattered oil. This is a major red flag. Another thing to check before you buy a used truck in Ohio is the battery. If you see any corrosion on it, you’ll probably want to keep shopping.</p>\n          <p>Check the color of the coolant in the radiator — it should be green or orange. Radiator leaks are also on the list of things to check when buying a used truck. Stains on the outside of the radiator could mean there are leaks.</p>\n          <p>If you want to buy a used truck in Ohio, make sure the truck you’re looking at has a good battery. There are indicators that will help you. Green is usually a sign of a good battery, while yellow or black could mean the opposite.</p>\n          <p>Have a mechanic take a look at it if possible. They can do a “load” test. A mechanic can be of great help with all the things to check when buying a used truck.</p>",
					),
					array(
						'title' => 'Service Records',
						'text'  => "<p>If you really want to buy a used truck in Ohio, then check the truck’s history. Every car has a paper trail, so ordering a complete report is highly advised.</p>\n          <p>Repairs and accidents will be easy to spot. However, there may be many more subtle issues that turn out to be deal-breakers.</p>\n          <p>Finding out the number of previous owners should be high on the list of things to check when buying a used truck. If there have been many over a short period of time, you don’t want it.</p>\n          <p>You want your used truck to be up-to-date and able to pass emissions testing. This will make sure you are in line with any safety regulations in your area.</p>",
					),
				),
			),
			'guide_end'   => array( 'label' => 'Closing line', 'default' => 'The body, engine, and service records are the top 3 things to check when buying a used truck.' ),
		),
		'Ask Robertson'      => array(
			'assist_tag'   => array( 'label' => 'Tag', 'default' => '[ 08 — Ask Robertson ]' ),
			'assist_title' => array( 'label' => 'Heading', 'default' => 'Find the right truck<br><span class="grad">in a minute.</span>' ),
			'assist_text'  => array( 'type' => 'textarea', 'label' => 'Text', 'default' => 'Tell our assistant what you\'re shopping for. It shows you what\'s in stock, then connects you with the right team: Robertson Truck Sales, Ohio Truck Equipment or Equipment Leasing Solutions.' ),
			'assist_links' => array(
				'type'   => 'items',
				'label'  => 'Quick link',
				'spare'  => 1,
				'fields' => array(
					'text' => array( 'label' => 'Text', 'width' => 50 ),
					'url'  => array( 'type' => 'link', 'label' => 'Link', 'width' => 25 ),
					'icon' => array( 'label' => 'Icon', 'width' => 25, 'help' => $icon_help ),
				),
				'items'  => array(
					array( 'text' => 'Trucks in stock, matched to your job', 'url' => 'rts:inventory', 'icon' => 'truck' ),
					array( 'text' => 'Bodies and upfit quotes', 'url' => 'rts:quote', 'icon' => 'wrench' ),
					array( 'text' => 'Trade-in values', 'url' => 'rts:trade', 'icon' => 'dollar' ),
				),
			),
		),
		'Call to action'     => array(
			'cta_tag'         => array( 'label' => 'Tag', 'default' => '[ Your Top Rated Used Truck Dealership In Ohio ]' ),
			'cta_title'       => array( 'label' => 'Heading', 'default' => 'When you want to buy a used truck in Ohio, make sure you know what to look for. <span>We’re here to help!</span>' ),
			'cta_text'        => array( 'type' => 'textarea', 'label' => 'Text', 'default' => 'Robertson Truck Group has been serving Central Ohio for the last 42 years within the rental industry. Officially opening Equipment Leasing Solutions in the fall of 2016, Equipment Leasing Solutions now leases over 100 containers and 200 storage trailers across the state of Ohio.' ),
			'cta_phone_label' => array( 'label' => 'Phone label', 'default' => 'Call Robertson Truck Sales at' ),
			'cta_phone'       => array( 'label' => 'Phone (shown)', 'default' => '740-397-4969', 'width' => 50 ),
			'cta_tel'         => array( 'type' => 'link', 'label' => 'Phone link', 'default' => 'tel:7403974969', 'width' => 50 ),
			'cta_btn_text'    => array( 'label' => 'Button text', 'default' => 'or send us a message', 'width' => 50 ),
			'cta_btn_url'     => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:contact', 'width' => 50 ),
		),
		'Divisions'          => array(
			'divs_tag'      => array( 'label' => 'Tag', 'default' => '[ 09 — Other divisions of ]' ),
			'divs_logo'     => array( 'type' => 'image', 'label' => 'Group logo', 'default' => 'images/rtg-logo-new-white.png', 'width' => 50 ),
			'divs_logo_url' => array( 'type' => 'link', 'label' => 'Group logo link', 'default' => 'rts:rtg', 'width' => 50 ),
			'divisions'     => array(
				'type'   => 'items',
				'label'  => 'Division logo',
				'spare'  => 1,
				'fields' => array(
					'name' => array( 'label' => 'Name (alt text)', 'width' => 40 ),
					'logo' => array( 'type' => 'image', 'label' => 'Logo', 'width' => 30 ),
					'url'  => array( 'type' => 'link', 'label' => 'Link', 'width' => 30 ),
				),
				'items'  => array(
					array( 'name' => 'Equipment Leasing Solutions', 'logo' => 'images/els-logo.svg', 'url' => '#' ),
					array( 'name' => 'Ohio Truck Equipment', 'logo' => 'images/ote-logo.svg', 'url' => '#' ),
				),
			),
			'locs'          => array(
				'type'   => 'items',
				'label'  => 'Location',
				'spare'  => 1,
				'fields' => array(
					'name'    => array( 'label' => 'Name' ),
					'address' => array( 'label' => 'Address', 'help' => 'Use <br> for line breaks.' ),
					'phone'   => array( 'label' => 'Phone (shown)', 'width' => 50 ),
					'tel'     => array( 'type' => 'link', 'label' => 'Phone link', 'width' => 50 ),
				),
				'items'  => array(
					array( 'name' => 'Robertson Truck Sales', 'address' => '8920 Columbus Rd.<br>P.O. Box 1146<br>Mount Vernon, OH 43050', 'phone' => '740-397-4969', 'tel' => 'tel:7403974969' ),
					array( 'name' => 'Ohio Truck Equipment Sales Office', 'address' => '8895 Columbus Rd,<br>P.O. Box 991<br>Mt Vernon, OH 43050', 'phone' => '740-830-6488', 'tel' => 'tel:7408306488' ),
					array( 'name' => 'Equipment Leasing &amp; Solutions', 'address' => '8920 Columbus Rd.<br>P.O. Box 1146<br>Mount Vernon, OH 43050', 'phone' => '877-359-4969', 'tel' => 'tel:8773594969' ),
					array( 'name' => 'Ohio Truck Equipment Production Facility', 'address' => '525 West Chestnut St.<br>Lot 11<br>Mt Vernon, OH 43050', 'phone' => '740-830-6488', 'tel' => 'tel:7408306488' ),
				),
			),
		),
	),
);

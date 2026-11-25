<?php
/**
 * Fields for page-templates/home-classic.php (classic Robertson Truck Sales home page). See inc/fields.php for the format.
 *
 * The top bar, header, footer and mobile action bar are site chrome and stay in the template.
 *
 * @package RTS
 */

$icon_help = 'Icon name from the sprite: truck, wrench, shield, award, dollar, check, phone, pin, mail, arrow.';
$guide_p   = "\n          ";

return array(
	'title' => 'Home page (classic)',
	'tabs'  => array(
		'Hero'          => array(
			'hero_slides'    => array(
				'type'   => 'items',
				'label'  => 'Background slide',
				'spare'  => 2,
				'fields' => array( 'image' => array( 'type' => 'image', 'label' => 'Image' ) ),
				'items'  => array(
					array( 'image' => 'images/hero-3.jpg' ),
					array( 'image' => 'images/hero-4.jpg' ),
					array( 'image' => 'images/hero-5.jpg' ),
					array( 'image' => 'images/hero-2.jpg' ),
					array( 'image' => 'images/hero-6.jpg' ),
					array( 'image' => 'images/hero-1.jpg' ),
				),
			),
			'hero_eyebrow'   => array( 'label' => 'Eyebrow', 'default' => '42 Years in the Making' ),
			'hero_title'     => array( 'label' => 'Heading', 'default' => 'Ohio\'s Premiere <span class="hl">Used Truck</span> Dealer', 'help' => '<span class="hl"> highlights words.' ),
			'hero_text'      => array( 'type' => 'textarea', 'label' => 'Intro', 'default' => 'High-quality pre-owned medium and heavy-duty trucks — with fabrication, upfitting and financing to get your business on the road.' ),
			'hero_btn1_text' => array( 'label' => 'Button 1 text', 'default' => 'View Inventory', 'width' => 50 ),
			'hero_btn1_url'  => array( 'type' => 'link', 'label' => 'Button 1 link', 'default' => '#', 'width' => 50 ),
			'hero_btn2_text' => array( 'label' => 'Button 2 text', 'default' => 'Finance Application', 'width' => 50 ),
			'hero_btn2_url'  => array( 'type' => 'link', 'label' => 'Button 2 link', 'default' => '#', 'width' => 50 ),
			'finder_title'   => array( 'label' => 'Finder heading', 'default' => 'Find your next truck', 'width' => 50 ),
			'finder_sub'     => array( 'label' => 'Finder subheading', 'default' => 'Search our live inventory', 'width' => 50 ),
			'finder_tags'    => array(
				'type'   => 'items',
				'label'  => 'Finder tag',
				'spare'  => 2,
				'fields' => array( 'text' => array( 'label' => 'Text' ) ),
				'items'  => array(
					array( 'text' => 'Medium Duty' ),
					array( 'text' => 'Heavy Duty' ),
					array( 'text' => 'Freightliner' ),
					array( 'text' => 'International' ),
				),
			),
		),
		'Stats'         => array(
			'stats' => array(
				'type'   => 'items',
				'label'  => 'Stat',
				'fields' => array(
					'label'  => array( 'label' => 'Label', 'width' => 50 ),
					'num'    => array( 'label' => 'Number (counts up)', 'width' => 25, 'help' => 'Digits only.' ),
					'suffix' => array( 'label' => 'After the number', 'width' => 25, 'help' => 'Start with a space if needed.' ),
				),
				'items'  => array(
					array( 'label' => 'Years serving Central Ohio', 'num' => '42', 'suffix' => '' ),
					array( 'label' => 'Campus with mechanical &amp; detail shop', 'num' => '15', 'suffix' => '-acre' ),
					array( 'label' => 'Fabrication facility minutes away', 'num' => '100000', 'suffix' => ' ft²' ),
					array( 'label' => 'Containers &amp; storage trailers leased', 'num' => '300', 'suffix' => '+' ),
				),
			),
		),
		'About'         => array(
			'about_img_main'     => array( 'type' => 'image', 'label' => 'Main image', 'default' => 'images/hero-4.jpg', 'width' => 50 ),
			'about_img_main_alt' => array( 'label' => 'Main image alt text', 'default' => 'Robertson Truck Sales campus in Mount Vernon, Ohio', 'width' => 50 ),
			'about_img_small'    => array( 'type' => 'image', 'label' => 'Small image', 'default' => 'images/hero-3.jpg', 'width' => 50 ),
			'about_img_small_alt' => array( 'label' => 'Small image alt text', 'default' => 'Used heavy-duty dump truck', 'width' => 50 ),
			'about_badge_num'    => array( 'label' => 'Badge number', 'default' => '42', 'width' => 50 ),
			'about_badge_text'   => array( 'label' => 'Badge text', 'default' => 'Years in<br>the Making', 'width' => 50 ),
			'about_eyebrow'      => array( 'label' => 'Eyebrow', 'default' => 'About Robertson Truck Group' ),
			'about_title'        => array( 'label' => 'Heading', 'default' => 'The highest quality pre-owned trucks to keep your business moving' ),
			'about_text'         => array(
				'type'    => 'html',
				'label'   => 'Text',
				'rows'    => 8,
				'default' => "<p>At Robertson Truck Group, we know that you’re looking for the highest quality pre-owned trucks in order to keep your business moving. Based in Mount Vernon, Ohio, we provide all our clients a wide variety of inventory that meets all of your standards and then some. With Robertson Truck Group, it’s easy to find the right vehicle for you in our inventory of used trucks for sale in Ohio.</p>\n      <p>Whether you’re looking for medium or used heavy-duty trucks for sale in Ohio then turn to Robertson Truck Group. Our full suite of services and used trucks for sale in Columbus Ohio include fabrication, upfitting, financing and a high-quality level of customer service to get you on the road with a truck that will take you and your business farther.</p>",
			),
			'about_checks'       => array(
				'type'   => 'items',
				'label'  => 'Check item',
				'spare'  => 2,
				'fields' => array( 'text' => array( 'label' => 'Text' ) ),
				'items'  => array(
					array( 'text' => 'Fabrication' ),
					array( 'text' => 'Upfitting' ),
					array( 'text' => 'Financing' ),
					array( 'text' => 'Customer Service' ),
				),
			),
			'about_btn_text'     => array( 'label' => 'Button text', 'default' => 'Browse Inventory', 'width' => 50 ),
			'about_btn_url'      => array( 'type' => 'link', 'label' => 'Button link', 'default' => '#', 'width' => 50 ),
			'about_phone'        => array( 'label' => 'Phone (shown)', 'default' => '740-397-4969', 'width' => 50 ),
			'about_tel'          => array( 'type' => 'link', 'label' => 'Phone link', 'default' => 'tel:7403974969', 'width' => 50 ),
		),
		'Why Robertson' => array(
			'why_eyebrow'        => array( 'label' => 'Eyebrow', 'default' => 'Why Robertson' ),
			'why_title'          => array( 'label' => 'Heading', 'default' => 'The Robertson Truck Group Standard' ),
			'why_cards'          => array(
				'type'   => 'items',
				'label'  => 'Card',
				'spare'  => 1,
				'fields' => array(
					'title'     => array( 'label' => 'Title', 'width' => 70 ),
					'icon'      => array( 'label' => 'Icon', 'width' => 30, 'help' => $icon_help ),
					'text'      => array( 'type' => 'textarea', 'label' => 'Text', 'rows' => 4 ),
					'link_text' => array( 'label' => 'Link text (optional)', 'width' => 50 ),
					'link_url'  => array( 'type' => 'link', 'label' => 'Link', 'width' => 50 ),
				),
				'items'  => array(
					array(
						'title' => 'One Stop Shop',
						'icon'  => 'wrench',
						'text'  => 'Our 15-acre campus includes a full mechanical and detail shop as well as a 100,000 square foot fabrication facility within minutes of our main campus, that allows you to receive your truck fast and tailored to fit your specific needs. Robertson Truck Group is a one-stop shop for all your commercial truck needs.',
					),
					array(
						'title' => 'Road-Ready Condition',
						'icon'  => 'truck',
						'text'  => 'As a group of heavy duty truck dealers in Ohio, we know how important it is that we stand behind our vehicles and want you on the road as quickly as possible. Our heavy-duty vehicles are reconditioned and detailed so you can get right to work.',
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
						'link_url'  => '#',
					),
					array(
						'title' => 'Quality Sourced',
						'icon'  => 'shield',
						'text'  => 'Our vast and well-maintained inventory are sourced from major fleets across the country and each truck is hand selected to ensure quality as well as reliability.',
					),
				),
			),
			'why_cta_title'      => array( 'label' => 'Last card: heading', 'default' => 'Ready to get rolling?' ),
			'why_cta_text'       => array( 'type' => 'textarea', 'label' => 'Last card: text', 'rows' => 2, 'default' => 'Browse our current stock of medium and heavy-duty trucks, or apply for financing online in minutes.' ),
			'why_cta_btn1_text'  => array( 'label' => 'Last card: button 1 text', 'default' => 'View Inventory', 'width' => 50 ),
			'why_cta_btn1_url'   => array( 'type' => 'link', 'label' => 'Last card: button 1 link', 'default' => '#', 'width' => 50 ),
			'why_cta_btn2_text'  => array( 'label' => 'Last card: button 2 text', 'default' => 'Apply', 'width' => 50 ),
			'why_cta_btn2_url'   => array( 'type' => 'link', 'label' => 'Last card: button 2 link', 'default' => '#', 'width' => 50 ),
		),
		'Products'      => array(
			'prods_eyebrow' => array( 'label' => 'Eyebrow', 'default' => 'Featured Products' ),
			'prods_title'   => array( 'label' => 'Heading', 'default' => 'Trusted bodies &amp; trailers we carry' ),
			'prods'         => array(
				'type'   => 'items',
				'label'  => 'Product',
				'spare'  => 2,
				'fields' => array(
					'name'  => array( 'label' => 'Name', 'width' => 50 ),
					'tag'   => array( 'label' => 'Category', 'width' => 50 ),
					'image' => array( 'type' => 'image', 'label' => 'Image', 'width' => 50 ),
					'alt'   => array( 'label' => 'Image alt text', 'width' => 50 ),
				),
				'items'  => array(
					array( 'name' => 'Beau-Roc', 'tag' => 'Dump Bodies', 'image' => 'images/p-beau-roc.jpg', 'alt' => 'Beau-Roc dump body' ),
					array( 'name' => 'CAM-Superline Trailers', 'tag' => 'Trailers', 'image' => 'images/p-cam-superline.jpg', 'alt' => 'CAM-Superline trailer' ),
					array( 'name' => 'Godwin Manufacturing', 'tag' => 'Truck Bodies', 'image' => 'images/p-godwin.jpg', 'alt' => 'Godwin Manufacturing bodies' ),
					array( 'name' => 'NRC Industries', 'tag' => 'Wreckers', 'image' => 'images/p-nrc.jpg', 'alt' => 'NRC Industries wrecker' ),
					array( 'name' => 'Sure-Trac Trailers', 'tag' => 'Trailers', 'image' => 'images/p-sure-trac.jpg', 'alt' => 'Sure-Trac trailer' ),
					array( 'name' => 'Switch N Go', 'tag' => 'Hoist Systems', 'image' => 'images/p-switch-n-go.jpg', 'alt' => 'Switch N Go hoist system' ),
				),
			),
		),
		'Inventory'     => array(
			'split_eyebrow'     => array( 'label' => 'Eyebrow', 'default' => 'Our Inventory' ),
			'split_title'       => array( 'label' => 'Heading', 'default' => 'Offering the highest quality pre-owned trucks in Ohio' ),
			'split_text'        => array(
				'type'    => 'html',
				'label'   => 'Text',
				'rows'    => 8,
				'default' => "<p>As a <a href=\"#\">top-rated commercial truck dealer in Ohio</a>, we keep a wide variety of inventory so that you can find the right heavy-duty truck for your business. Whether you simply need something to get you from point A to point B or you’re looking for a truck that you can upfit with all the bells and whistles, Robertson Truck Group has the inventory to keep your business moving.</p>\n      <p>We pride ourselves on keeping a diverse variety of used trucks for sale in Ohio so you’ll be hard-pressed not to find a truck that will suit your needs and exceed your standards. Look through our inventory below and see for yourself why many businesses opt for a Robertson Truck Group heavy-duty vehicle.</p>",
			),
			'split_btn_text'    => array( 'label' => 'Button text', 'default' => 'View Inventory', 'width' => 50 ),
			'split_btn_url'     => array( 'type' => 'link', 'label' => 'Button link', 'default' => '#', 'width' => 50 ),
			'split_image'       => array( 'type' => 'image', 'label' => 'Image', 'default' => 'images/hero-2.jpg', 'width' => 50 ),
			'split_image_alt'   => array( 'label' => 'Image alt text', 'default' => 'Trucks inside the Robertson service shop', 'width' => 50 ),
			'split_float_title' => array( 'label' => 'Floating card: title', 'default' => 'Reconditioned &amp; detailed', 'width' => 50 ),
			'split_float_text'  => array( 'label' => 'Floating card: text', 'default' => 'Road-ready on delivery', 'width' => 50 ),
		),
		'Upfitting'     => array(
			'upfit_bg'      => array( 'type' => 'image', 'label' => 'Background image', 'default' => 'images/hero-5.jpg' ),
			'upfit_eyebrow' => array( 'label' => 'Eyebrow', 'default' => 'Upfitting Made Easy' ),
			'upfit_title'   => array( 'label' => 'Heading', 'default' => 'Visit Robertson Truck Sales for High-Quality Commercial Truck Dealers in Ohio' ),
			'upfit_text'    => array(
				'type'    => 'html',
				'label'   => 'Text',
				'rows'    => 8,
				'default' => "<p>What makes us different from other heavy-duty truck dealers in Ohio is that we provide our clients the opportunity to upfit their own trucks or choose one from our inventory and build it to their own specific needs. Robertson Truck Group knows that not every business and entrepreneur have the same specs that they want for their truck, which is why we offer upfitting to bring customer satisfaction and the perfect vehicle to you.</p>\n      <p>Robertson Truck Sales understands how important it is to keep your equipment functional and on the road in order to keep your business moving that is why we work with only trusted body manufactures and source quality vehicle parts for our trucks for sale in Columbus, Ohio. Within our 25,000 square-foot fabrication facility, we can take any chassis and alter it in order to make your next job easier.</p>",
			),
			'upfit_chips'   => array(
				'type'   => 'items',
				'label'  => 'Chip',
				'spare'  => 1,
				'fields' => array( 'text' => array( 'label' => 'Text' ) ),
				'items'  => array(
					array( 'text' => 'Any chassis' ),
					array( 'text' => 'Trusted body manufacturers' ),
					array( 'text' => 'Quality parts' ),
				),
			),
		),
		'Truck types'   => array(
			'types_image'     => array( 'type' => 'image', 'label' => 'Image', 'default' => 'images/hero-6.jpg', 'width' => 50 ),
			'types_image_alt' => array( 'label' => 'Image alt text', 'default' => 'Detailed truck headlight', 'width' => 50 ),
			'types_brands'    => array(
				'type'   => 'items',
				'label'  => 'Brand chip',
				'spare'  => 2,
				'fields' => array( 'text' => array( 'label' => 'Text' ) ),
				'items'  => array(
					array( 'text' => 'Freightliner' ),
					array( 'text' => 'International' ),
					array( 'text' => '&amp; more' ),
				),
			),
			'types_eyebrow'   => array( 'label' => 'Eyebrow', 'default' => 'Types of Used Trucks Available' ),
			'types_title'     => array( 'label' => 'Heading', 'default' => 'Medium &amp; heavy-duty trucks from trusted brands' ),
			'types_text'      => array(
				'type'    => 'html',
				'label'   => 'Text',
				'rows'    => 10,
				'default' => "<p>At Robertson Truck Sales, part of the Robertson Truck Group family, we take pride in offering one of the most comprehensive selections of used trucks for sale in the Mount Vernon area and throughout Ohio. Our inventory is carefully curated to meet the diverse needs of businesses and owner-operators across the industry, featuring medium and heavy-duty trucks from trusted brands like Freightliner, International, and more.</p>\n      <p>Each truck in our lineup undergoes a rigorous inspection and servicing process to ensure it meets the high standards that have made Robertson Truck Group a leader in the industry. Whether you need a dependable workhorse for your fleet or a versatile vehicle for specialized applications, our knowledgeable team is here to guide you every step of the way.</p>\n      <p>We invite you to explore our current inventory on our website, where you can easily browse by make, model, and specifications to find the perfect fit for your operation. If you have questions about a specific truck or want personalized assistance, simply reach out to us via email or give us a call. Our dedicated staff is committed to serving the Mount Vernon community and beyond, making your truck sales experience as smooth and efficient as possible. Visit our page today to discover why so many businesses trust Robertson Truck Group for their used truck needs.</p>",
			),
		),
		'Buyer\'s guide' => array(
			'guide_eyebrow'   => array( 'label' => 'Eyebrow', 'default' => 'Buyer\'s Guide' ),
			'guide_title'     => array( 'label' => 'Heading', 'default' => 'Brands and Things to Check When Buying a Used Truck in Ohio' ),
			'guide_text'      => array( 'type' => 'textarea', 'label' => 'Intro', 'default' => 'There are many things to check when buying a used truck. There are many advantages to getting a used truck such as saving money on your purchase. However, you need to make sure you’re getting a good deal before you buy a used truck in Ohio. It is the point of this article to help you find the diamond in the rough quickly by giving you the 3 top things to check when buying a used truck.' ),
			'guide_more_label' => array( 'label' => '"Read more" label', 'default' => 'Read more' ),
			'guide_cards'     => array(
				'type'   => 'items',
				'label'  => 'Guide card',
				'spare'  => 1,
				'fields' => array(
					'title' => array( 'label' => 'Title' ),
					'intro' => array( 'type' => 'textarea', 'label' => 'Intro (always shown)', 'rows' => 3 ),
					'more'  => array( 'type' => 'html', 'label' => 'More (shown on "Read more")', 'rows' => 8 ),
				),
				'items'  => array(
					array(
						'title' => 'Inspect the Body',
						'intro' => 'You must know what to look for when buying a used truck. Rust is one of the first things to check for when buying a used truck.',
						'more'  => '<p>Of course, many second-hand vehicles may have rust, but it’s the location that matters. There is significant damage to a truck if there is rust on the exhaust pipes, muffler, wheels, frame rails, or floor pans.</p>' . $guide_p
							. '<p>You may notice certain parts of the body seem newer than others. This could be a sign that there was some serious damage to the truck that caused the owner to replace parts.</p>' . $guide_p
							. '<p>Scratches and dents should be at the top of things to check when buying a used truck. You need a keen eye for subtle cosmetic damage.</p>',
					),
					array(
						'title' => 'Rev The Engine',
						'intro' => 'One of the most important things to check when buying a used truck is the engine. Make sure the engine is cool before you take a look at it.',
						'more'  => '<p>Check the ground under the hood for splattered oil. This is a major red flag. Another thing to check before you buy a used truck in Ohio is the battery.</p>' . $guide_p
							. '<p>If you see any corrosion on it, you’ll probably want to keep shopping.</p>' . $guide_p
							. '<p>Check the color of the coolant in the radiator — it should be green or orange.</p>' . $guide_p
							. '<p>Radiator leaks are also on the list of things to check when buying a used truck. Stains on the outside of the radiator could mean there are leaks.</p>' . $guide_p
							. '<p>If you want to buy a used truck in Ohio, make sure the truck you’re looking at has a good battery. There are indicators that will help you.</p>' . $guide_p
							. '<p>Green is usually a sign of a good battery, while yellow or black could mean the opposite.</p>' . $guide_p
							. '<p>Have a mechanic take a look at it if possible. They can do a “load” test. A mechanic can be of great help with all the things to check when buying a used truck.</p>',
					),
					array(
						'title' => 'Service Records',
						'intro' => 'If you really want to buy a used truck in Ohio, then check the truck’s history. Every car has a paper trail, so ordering a complete report is highly advised.',
						'more'  => '<p>Repairs and accidents will be easy to spot. However, there may be many more subtle issues that turn out to be deal-breakers.</p>' . $guide_p
							. '<p>Finding out the number of previous owners should be high on the list of things to check when buying a used truck. If there have been many over a short period of time, you don’t want it.</p>' . $guide_p
							. '<p>You want your used truck to be up-to-date and able to pass emissions testing. This will make sure you are in line with any safety regulations in your area.</p>',
					),
				),
			),
			'guide_note'      => array( 'label' => 'Closing note', 'default' => 'The body, engine, and service records are the top 3 things to check when buying a used truck.' ),
		),
		'Call to action' => array(
			'cta_eyebrow'     => array( 'label' => 'Eyebrow', 'default' => 'Your Top Rated Used Truck Dealership In Ohio' ),
			'cta_title'       => array( 'label' => 'Heading', 'default' => 'When you want to buy a used truck in Ohio, make sure you know what to look for. We’re here to help!' ),
			'cta_text'        => array( 'type' => 'textarea', 'label' => 'Text', 'default' => 'Robertson Truck Group has been serving Central Ohio for the last 42 years within the rental industry. Officially opening Equipment Leasing Solutions in the fall of 2016, Equipment Leasing Solutions now leases over 100 containers and 200 storage trailers across the state of Ohio.' ),
			'cta_phone_label' => array( 'label' => 'Phone label', 'default' => 'Call Robertson Truck Sales at' ),
			'cta_phone'       => array( 'label' => 'Phone (shown)', 'default' => '740-397-4969', 'width' => 50 ),
			'cta_tel'         => array( 'type' => 'link', 'label' => 'Phone link', 'default' => 'tel:7403974969', 'width' => 50 ),
			'cta_btn_text'    => array( 'label' => 'Button text', 'default' => 'or send us a message', 'width' => 50 ),
			'cta_btn_url'     => array( 'type' => 'link', 'label' => 'Button link', 'default' => 'rts:contact#form', 'width' => 50 ),
		),
		'Divisions'     => array(
			'div_eyebrow' => array( 'label' => 'Eyebrow', 'default' => 'Other divisions of' ),
			'div_logo'    => array( 'type' => 'image', 'label' => 'Group logo', 'default' => 'images/rtg-logo.svg' ),
			'div_visit'   => array( 'label' => '"Visit site" label', 'default' => 'Visit site' ),
			'divisions'   => array(
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
			'locs'        => array(
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

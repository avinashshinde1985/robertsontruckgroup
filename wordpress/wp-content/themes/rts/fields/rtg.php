<?php
/**
 * Fields for page-templates/rtg.php (Robertson Truck Group landing page). See inc/fields.php for the format.
 *
 * @package RTS
 */

return array(
	'title' => 'Robertson Truck Group page',
	'tabs'  => array(
		'Top bar' => array(
			'top_tag'   => array( 'label' => 'Tag line', 'default' => 'Robertson Truck Group · Mount Vernon, Ohio' ),
			'top_phone' => array( 'label' => 'Phone (shown)', 'default' => '740-397-4969', 'width' => 50 ),
			'top_tel'   => array( 'type' => 'link', 'label' => 'Phone link', 'default' => 'tel:7403974969', 'width' => 50 ),
		),
		'Hero'    => array(
			'hero_logo'  => array( 'type' => 'image', 'label' => 'Logo', 'default' => 'images/rtg-logo-new-white.png' ),
			'hero_title' => array( 'label' => 'Heading', 'default' => '<span>One team, one source,</span><span class="grad">one solution.</span>', 'help' => 'Each <span> is one line; class="grad" gives the gradient.' ),
			'hero_text'  => array( 'type' => 'textarea', 'label' => 'Intro', 'default' => 'Robertson Truck Group brings together truck sales, body and equipment upfitting, and equipment leasing in Mount Vernon, Ohio. Pick where you want to start.' ),
			'companies'  => array(
				'type'   => 'items',
				'label'  => 'Company card',
				'spare'  => 1,
				'fields' => array(
					'name' => array( 'label' => 'Company name' ),
					'kind' => array( 'label' => 'Label above the name', 'width' => 50 ),
					'logo' => array( 'type' => 'image', 'label' => 'Logo', 'width' => 50 ),
					'text' => array( 'type' => 'textarea', 'label' => 'Description', 'rows' => 3 ),
					'cta'  => array( 'label' => 'Link text', 'width' => 50 ),
					'url'  => array( 'type' => 'link', 'label' => 'Link', 'width' => 50 ),
				),
				'items'  => array(
					array(
						'name' => 'Robertson Truck Sales',
						'kind' => 'Trucks',
						'logo' => 'images/rts-logo.svg',
						'text' => 'Used medium and heavy-duty trucks: dump trucks, box trucks, flatbeds, tractors and chassis, reconditioned and ready to work.',
						'cta'  => 'Shop truck inventory',
						'url'  => 'rts:inventory',
					),
					array(
						'name' => 'Ohio Truck Equipment',
						'kind' => 'Bodies &amp; equipment',
						'logo' => 'images/ote-logo.svg',
						'text' => 'Dump bodies, flatbeds, service bodies and more, in stock and installed in our own fabrication facility.',
						'cta'  => 'Shop body &amp; equipment inventory',
						'url'  => 'ote:inventory',
					),
					array(
						'name' => 'Equipment Leasing Solutions',
						'kind' => 'Leasing',
						'logo' => 'images/els-logo.svg',
						'text' => 'Storage containers and storage trailers leased and delivered across Ohio, on short or long terms.',
						'cta'  => 'Go to Equipment Leasing',
						'url'  => 'https://leasingsolutionsnow.com/',
					),
				),
			),
		),
		'About'   => array(
			'about_tag'   => array( 'label' => 'Tag', 'default' => '[ Who we are ]' ),
			'about_title' => array( 'label' => 'Heading', 'default' => 'Family-run in Central Ohio for 42 years' ),
			'about_text'  => array(
				'type'    => 'html',
				'label'   => 'Text',
				'rows'    => 6,
				'default' => "<p>Robertson Truck Group started in the rental industry and has grown into three companies that work as one. Robertson Truck Sales finds you the right truck. Ohio Truck Equipment builds it out for the job. Equipment Leasing Solutions covers storage when you need it.</p>\n      <p>One call gets you all three, from the same team and the same campus.</p>",
			),
			'facts'       => array(
				'type'   => 'items',
				'label'  => 'Fact',
				'spare'  => 1,
				'fields' => array(
					'num'   => array( 'label' => 'Number', 'width' => 30 ),
					'label' => array( 'label' => 'Label', 'width' => 70 ),
				),
				'items'  => array(
					array( 'num' => '42', 'label' => 'Years in Central Ohio' ),
					array( 'num' => '15', 'label' => 'Acre campus' ),
					array( 'num' => '3', 'label' => 'Companies, one team' ),
				),
			),
		),
		'Footer'  => array(
			'foot_name'    => array( 'label' => 'Company name', 'default' => 'Robertson Truck Group', 'width' => 50 ),
			'foot_address' => array( 'label' => 'Address', 'default' => '8920 Columbus Rd., Mount Vernon, OH 43050', 'width' => 50 ),
			'foot_phones'  => array(
				'type'   => 'items',
				'label'  => 'Phone link',
				'spare'  => 1,
				'fields' => array(
					'text' => array( 'label' => 'Text', 'width' => 60 ),
					'url'  => array( 'type' => 'link', 'label' => 'Link', 'width' => 40 ),
				),
				'items'  => array(
					array( 'text' => 'Truck Sales 740-397-4969', 'url' => 'tel:7403974969' ),
					array( 'text' => 'Truck Equipment 740-830-6488', 'url' => 'tel:7408306488' ),
					array( 'text' => 'Leasing 877-359-4969', 'url' => 'tel:8773594969' ),
				),
			),
		),
	),
);

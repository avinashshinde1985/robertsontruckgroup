<?php
/**
 * Fields for home.php (the blog posts index, i.e. the page set as "Posts page"). See inc/fields.php for the format.
 *
 * Only the static copy is editable here; posts, categories and recent posts come from WordPress.
 *
 * @package RTS
 */

return array(
	'title'    => 'Blog page',
	'location' => array(
		array(
			array(
				'param'    => 'page_type',
				'operator' => '==',
				'value'    => 'posts_page',
			),
		),
	),
	'tabs'     => array(
		'Hero'           => array(
			'hero_slides'  => array(
				'type'   => 'items',
				'label'  => 'Background slide',
				'spare'  => 2,
				'fields' => array(
					'image' => array( 'type' => 'image', 'label' => 'Image' ),
				),
				'items'  => array(
					array( 'image' => 'images/contact/hero-stock.jpg' ),
					array( 'image' => 'images/contact/hero-jobsite.jpg' ),
					array( 'image' => 'images/contact/hero-brands.jpg' ),
				),
			),
			'hero_crumb'   => array( 'label' => 'Breadcrumb label', 'default' => 'Blog' ),
			'hero_title'   => array( 'label' => 'Heading', 'default' => 'News &amp; <span class="hl">Insights</span>', 'help' => '<span class="hl"> highlights words.' ),
			'hero_lead'    => array( 'type' => 'textarea', 'label' => 'Intro', 'rows' => 3, 'default' => 'Costs, buying guides and practical tips for medium &amp; heavy-duty trucks, trailers, leasing and storage containers in Ohio.' ),
			'search_title' => array( 'label' => 'Search box heading', 'default' => 'Find an article', 'width' => 50 ),
			'search_sub'   => array( 'label' => 'Search box sub-heading', 'default' => 'Search {count} more articles from our team', 'help' => '{count} is replaced by the number of articles.', 'width' => 50 ),
			'search_btn'   => array( 'label' => 'Search button text', 'default' => 'Search', 'width' => 50 ),
			'search_popular' => array( 'label' => 'Popular searches label', 'default' => 'Popular:', 'width' => 50 ),
			'search_tags'  => array(
				'type'   => 'items',
				'label'  => 'Popular search',
				'spare'  => 2,
				'fields' => array(
					'label' => array( 'label' => 'Button text', 'width' => 50 ),
					'q'     => array( 'label' => 'Search for', 'width' => 50 ),
				),
				'items'  => array(
					array( 'label' => 'Leasing', 'q' => 'lease' ),
					array( 'label' => 'Costs', 'q' => 'cost' ),
					array( 'label' => 'Dump trucks', 'q' => 'dump truck' ),
					array( 'label' => 'Trailers', 'q' => 'trailer' ),
					array( 'label' => 'Selling', 'q' => 'sell' ),
				),
			),
		),
		'Posts'          => array(
			'empty_title' => array( 'label' => 'No results heading', 'default' => 'No articles found' ),
			'empty_text'  => array( 'label' => 'No results text', 'default' => 'Try a different word or topic — or call <a href="tel:7403974969">740-397-4969</a> and ask our team directly.' ),
			'empty_btn'   => array( 'label' => 'Show all button text', 'default' => 'Show all articles', 'width' => 50 ),
			'more_btn'    => array( 'label' => 'Load more button text', 'default' => 'Load more articles', 'width' => 50 ),
		),
		'Sidebar'        => array(
			'side_topics_title' => array( 'label' => 'Topics heading', 'default' => 'Topics', 'width' => 50 ),
			'side_recent_title' => array( 'label' => 'Recent posts heading', 'default' => 'Recent posts', 'width' => 50 ),
			'side_cta_image'    => array( 'type' => 'image', 'label' => 'Promo box icon', 'default' => 'images/rts-emblem.svg' ),
			'side_cta_title'    => array( 'label' => 'Promo box heading', 'default' => 'Looking for your next truck?' ),
			'side_cta_text'     => array( 'type' => 'textarea', 'label' => 'Promo box text', 'rows' => 3, 'default' => 'Over 200 trucks currently in stock — Kenworth, Peterbilt, Freightliner &amp; many other brands.' ),
			'side_cta_btn_text' => array( 'label' => 'Promo button text', 'default' => 'View Inventory', 'width' => 50 ),
			'side_cta_btn_url'  => array( 'type' => 'link', 'label' => 'Promo button link', 'default' => 'rts:inventory', 'width' => 50 ),
			'side_cta_phone'    => array( 'label' => 'Phone (shown)', 'default' => '740-397-4969', 'width' => 50 ),
			'side_cta_tel'      => array( 'type' => 'link', 'label' => 'Phone link', 'default' => 'tel:7403974969', 'width' => 50 ),
		),
		'Call to action' => array(
			'cta_tag'        => array( 'label' => 'Eyebrow', 'default' => 'Have a Question?' ),
			'cta_title'      => array( 'label' => 'Heading', 'default' => 'Talk to a product specialist about the right truck for your job.' ),
			'cta_text'       => array( 'type' => 'textarea', 'label' => 'Text', 'rows' => 3, 'default' => 'Our team can help with buying, leasing, upfitting and financing — call or send us a message.' ),
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

<?php
/**
 * Blog helpers: images, reading time, categories, related posts, article anchors and SEO tags.
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

/** URL of the blog index (the "Posts page"). */
function rtg_blog_url() {
	$id = (int) get_option( 'page_for_posts' );
	return $id ? get_permalink( $id ) : rtg_url( 'rts', 'blog' );
}

/**
 * Post image: the featured image, else the theme image recorded at import (_rtg_image), else the emblem.
 *
 * @param WP_Post|int $post Post.
 * @param string      $size Image size.
 */
function rtg_post_image( $post, $size = 'large' ) {
	$post = get_post( $post );
	if ( has_post_thumbnail( $post ) ) {
		return get_the_post_thumbnail_url( $post, $size );
	}
	$ref = get_post_meta( $post->ID, '_rtg_image', true );
	return rtg_asset( $ref ? 'rts:' . $ref : 'rts:images/rts-emblem.svg' );
}

/** Minutes to read: the stored value, else ~200 words a minute. */
function rtg_read_time( $post ) {
	$post = get_post( $post );
	$set  = (int) get_post_meta( $post->ID, '_rtg_read_time', true );
	if ( $set ) {
		return $set;
	}
	return max( 1, (int) ceil( str_word_count( wp_strip_all_tags( $post->post_content ) ) / 200 ) );
}

/** Primary category (first non-default one). */
function rtg_post_category( $post ) {
	$cats = get_the_category( get_post( $post )->ID );
	foreach ( $cats as $cat ) {
		if ( (int) get_option( 'default_category' ) !== $cat->term_id || 1 === count( $cats ) ) {
			return $cat;
		}
	}
	return null;
}

/** Card text: the excerpt cut to ~190 characters. */
function rtg_card_excerpt( $post ) {
	$post = get_post( $post );
	$text = $post->post_excerpt ? $post->post_excerpt : wp_strip_all_tags( strip_shortcodes( $post->post_content ) );
	$text = trim( preg_replace( '/\s+/', ' ', $text ) );
	if ( mb_strlen( $text ) > 190 ) {
		$text = rtrim( mb_substr( $text, 0, 190 ) ) . '…';
	}
	return $text;
}

/**
 * Topic chips for the blog index: categories of the given posts with counts, most used first.
 *
 * @param WP_Post[] $posts Posts.
 */
function rtg_blog_categories( $posts ) {
	$out = array();
	foreach ( $posts as $post ) {
		$cat = rtg_post_category( $post );
		if ( ! $cat ) {
			continue;
		}
		if ( ! isset( $out[ $cat->slug ] ) ) {
			$out[ $cat->slug ] = array( 'slug' => $cat->slug, 'name' => $cat->name, 'count' => 0 );
		}
		++$out[ $cat->slug ]['count'];
	}
	uasort(
		$out,
		function ( $a, $b ) {
			return $b['count'] - $a['count'];
		}
	);
	return array_values( $out );
}

/** Related posts: same category first, then the most recent. */
function rtg_related_posts( $post, $count = 3 ) {
	$post    = get_post( $post );
	$cat     = rtg_post_category( $post );
	$related = $cat ? get_posts( array( 'category' => $cat->term_id, 'post__not_in' => array( $post->ID ), 'numberposts' => $count ) ) : array();
	if ( count( $related ) < $count ) {
		$exclude = array_merge( array( $post->ID ), wp_list_pluck( $related, 'ID' ) );
		$related = array_merge( $related, get_posts( array( 'post__not_in' => $exclude, 'numberposts' => $count - count( $related ) ) ) );
	}
	return $related;
}

/* The blog index lists every post; blog.js pages and filters them in the browser. */
add_action(
	'pre_get_posts',
	function ( $q ) {
		if ( ! is_admin() && $q->is_main_query() && $q->is_home() ) {
			$q->set( 'posts_per_page', 200 );
		}
	}
);

/* Article headings get ids and a copy-link anchor; post.js builds the table of contents from them. */
add_filter(
	'the_content',
	function ( $content ) {
		if ( ! is_singular( 'post' ) || ! in_the_loop() || ! is_main_query() ) {
			return $content;
		}
		$used = array();
		return preg_replace_callback(
			'#<h2([^>]*)>(.*?)</h2>#s',
			function ( $m ) use ( &$used ) {
				$attrs = $m[1];
				if ( preg_match( '/\sid="([^"]+)"/', $attrs, $id ) ) {
					$id = $id[1];
				} else {
					$id = substr( sanitize_title( wp_strip_all_tags( $m[2] ) ), 0, 60 );
					$base = $id;
					for ( $i = 2; isset( $used[ $id ] ); $i++ ) {
						$id = $base . '-' . $i;
					}
					$attrs .= ' id="' . esc_attr( $id ) . '"';
				}
				$used[ $id ] = true;
				if ( false !== strpos( $m[2], 'h-anchor' ) ) {
					return '<h2' . $attrs . '>' . $m[2] . '</h2>';
				}
				return '<h2' . $attrs . '>' . $m[2] . '<a class="h-anchor" href="#' . esc_attr( $id ) . '" aria-label="Link to this section"><svg><use href="#i-link"/></svg></a></h2>';
			},
			$content
		);
	},
	20
);

/* Open Graph + BlogPosting schema on single posts (the static page had them hard-coded). */
add_action(
	'wp_head',
	function () {
		if ( ! is_singular( 'post' ) ) {
			return;
		}
		$post  = get_queried_object();
		$desc  = wp_strip_all_tags( get_the_excerpt( $post ) );
		$image = rtg_post_image( $post );
		printf( '<meta property="og:type" content="article">' . "\n" );
		printf( '<meta property="og:title" content="%s">' . "\n", esc_attr( get_the_title( $post ) ) );
		printf( '<meta property="og:description" content="%s">' . "\n", esc_attr( $desc ) );
		printf( '<meta property="og:image" content="%s">' . "\n", esc_url( $image ) );
		printf( '<meta property="article:published_time" content="%s">' . "\n", esc_attr( get_the_date( 'Y-m-d', $post ) ) );
		$schema = array(
			'@context'      => 'https://schema.org',
			'@type'         => 'BlogPosting',
			'headline'      => get_the_title( $post ),
			'datePublished' => get_the_date( 'c', $post ),
			'dateModified'  => get_the_modified_date( 'c', $post ),
			'image'         => $image,
			'description'   => $desc,
			'author'        => array( '@type' => 'Organization', 'name' => 'Robertson Truck Group' ),
			'publisher'     => array( '@type' => 'Organization', 'name' => 'Robertson Truck Sales' ),
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
	},
	5
);

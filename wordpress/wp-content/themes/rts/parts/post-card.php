<?php
/**
 * Blog post card (blog list, related articles).
 *
 * Args: post (WP_Post), filterable (bool: add data-cat for the topic chips), class (extra classes).
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

$args    = wp_parse_args( $args, array( 'post' => null, 'filterable' => false, 'class' => '' ) );
$rtg_p   = get_post( $args['post'] );
$rtg_cat = rtg_post_category( $rtg_p );
$rtg_url = get_permalink( $rtg_p );
$rtg_t   = get_the_title( $rtg_p );
?>
        <article class="<?php echo esc_attr( trim( 'pcard ' . $args['class'] ) ); ?>"<?php if ( $args['filterable'] ) : ?> data-cat="<?php echo esc_attr( $rtg_cat ? $rtg_cat->slug : 'general' ); ?>"<?php endif; ?>>
          <a href="<?php echo esc_url( $rtg_url ); ?>" class="pcard__img" tabindex="-1" aria-hidden="true"><img src="<?php echo esc_url( rtg_post_image( $rtg_p ) ); ?>" alt="" loading="lazy"><?php if ( $rtg_cat ) : ?><span class="pcat"><?php echo esc_html( $rtg_cat->name ); ?></span><?php endif; ?></a>
          <div class="pcard__body">
            <div class="pmeta"><span><svg><use href="#i-cal"/></svg><time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d', $rtg_p ) ); ?>"><?php echo esc_html( get_the_date( 'M j, Y', $rtg_p ) ); ?></time></span><span><svg><use href="#i-clock"/></svg><?php echo (int) rtg_read_time( $rtg_p ); ?> min read</span></div>
            <h3><a href="<?php echo esc_url( $rtg_url ); ?>"><?php echo esc_html( $rtg_t ); ?></a></h3>
            <p><?php echo esc_html( rtg_card_excerpt( $rtg_p ) ); ?></p>
            <a href="<?php echo esc_url( $rtg_url ); ?>" class="pcard__more" aria-label="<?php echo esc_attr( 'Read more: ' . $rtg_t ); ?>">Read More <svg><use href="#i-arrow"/></svg></a>
          </div>
        </article>

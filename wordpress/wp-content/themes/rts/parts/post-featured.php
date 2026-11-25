<?php
/**
 * Featured (latest) post on the blog index.
 *
 * Args: post (WP_Post).
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

$rtg_p   = get_post( $args['post'] );
$rtg_cat = rtg_post_category( $rtg_p );
$rtg_url = get_permalink( $rtg_p );
?>
    <article class="fpost reveal">
      <a href="<?php echo esc_url( $rtg_url ); ?>" class="fpost__img" tabindex="-1" aria-hidden="true"><img src="<?php echo esc_url( rtg_post_image( $rtg_p ) ); ?>" alt="" width="1000" height="562"></a>
      <div class="fpost__body">
        <div class="fpost__badges"><span class="fpost__new">Latest</span><?php if ( $rtg_cat ) : ?><span class="pcat"><?php echo esc_html( $rtg_cat->name ); ?></span><?php endif; ?></div>
        <h2><a href="<?php echo esc_url( $rtg_url ); ?>"><?php echo esc_html( get_the_title( $rtg_p ) ); ?></a></h2>
        <p><?php echo esc_html( rtg_card_excerpt( $rtg_p ) ); ?></p>
        <div class="pmeta"><span><svg><use href="#i-cal"/></svg><time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d', $rtg_p ) ); ?>"><?php echo esc_html( get_the_date( 'M j, Y', $rtg_p ) ); ?></time></span><span><svg><use href="#i-clock"/></svg><?php echo (int) rtg_read_time( $rtg_p ); ?> min read</span></div>
        <a href="<?php echo esc_url( $rtg_url ); ?>" class="btn btn--red">Read Article <svg><use href="#i-arrow"/></svg></a>
      </div>
    </article>

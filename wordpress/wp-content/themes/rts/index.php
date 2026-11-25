<?php
/**
 * Fallback template (archives, search results). Lists posts with the v2 chrome.
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

get_header();
get_template_part( 'parts/sprite' );
?>
<div class="progress" id="progress"></div>

<?php get_template_part( 'parts/nav', 'v2' ); ?>

<main class="wpc">
  <div class="wrap wpc__wrap">
    <h1 class="h2"><?php echo esc_html( is_search() ? sprintf( 'Search: %s', get_search_query() ) : wp_strip_all_tags( get_the_archive_title() ) ); ?></h1>
    <div class="wpc__body">
<?php if ( have_posts() ) : ?>
      <ul class="wpc__list">
<?php while ( have_posts() ) : the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <small><?php echo esc_html( get_the_date() ); ?></small></li>
<?php endwhile; ?>
      </ul>
      <?php the_posts_pagination(); ?>
<?php else : ?>
      <p>Nothing found.</p>
<?php endif; ?>
    </div>
  </div>
</main>

<?php
get_template_part( 'parts/footer', 'v2' );
get_footer();

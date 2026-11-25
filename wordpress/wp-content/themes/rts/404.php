<?php
/**
 * Not found.
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
    <div class="tag">[ 404 ]</div>
    <h1 class="h2">Page <span class="grad">not found</span></h1>
    <div class="wpc__body">
      <p>The page you were looking for has moved or no longer exists.</p>
      <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--red"><span>Back to the home page</span><svg><use href="#i-arrow"/></svg></a></p>
    </div>
  </div>
</main>

<?php
get_template_part( 'parts/footer', 'v2' );
get_footer();

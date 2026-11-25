<?php
/**
 * Default template for pages without a converted design (pages added later in the editor).
 * Uses the dark v2 header/footer and renders the editor content.
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

get_header();
get_template_part( 'parts/sprite' );
?>
<div class="progress" id="progress"></div>

<?php get_template_part( 'parts/nav', 'v2', array( 'cta_url' => rtg_url( rtg_brand( 'site' ), 'inventory' ), 'cta_label' => 'rts' === rtg_brand( 'site' ) ? 'View Inventory' : 'Shop Bodies' ) ); ?>

<main class="wpc">
<?php while ( have_posts() ) : the_post(); ?>
  <div class="wrap wpc__wrap">
    <nav class="crumb" aria-label="Breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>/<span><?php the_title(); ?></span></nav>
    <h1 class="h2"><?php the_title(); ?></h1>
    <div class="wpc__body">
      <?php the_content(); ?>
    </div>
  </div>
<?php endwhile; ?>
</main>

<?php
get_template_part( 'parts/footer', 'v2' );
get_footer();

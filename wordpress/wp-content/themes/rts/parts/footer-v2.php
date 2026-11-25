<?php
/**
 * Dark "v2" footer.
 *
 * Args: big (bool) adds the back-to-top button and oversized wordmark used on the RTS home page.
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

$args  = wp_parse_args( $args, array( 'big' => false ) );
$brand = rtg_brand();
$logo  = $brand['footer_logo'];
?>
<footer class="foot">
  <div class="wrap">
    <div class="foot__top">
      <img src="<?php rtg_a( $logo['src'] ); ?>" alt="<?php echo esc_attr( $brand['name'] ); ?>" width="<?php echo (int) $logo['w']; ?>" height="<?php echo (int) $logo['h']; ?>">
      <nav aria-label="Footer">
        <?php foreach ( rtg_menu_items( 'footer' ) as $item ) : ?><a href="<?php echo esc_url( $item['url'] ); ?>"<?php echo $item['class'] ? ' class="' . esc_attr( $item['class'] ) . '"' : ''; ?>><?php echo esc_html( $item['label'] ); ?></a><?php endforeach; ?>

      </nav>
<?php if ( $args['big'] ) : ?>
      <a href="#top" class="foot__up" aria-label="Back to top"><svg style="transform:rotate(-90deg)"><use href="#i-arrow"/></svg></a>
<?php endif; ?>
    </div>
<?php if ( $args['big'] ) : ?>
    <div class="foot__big" aria-hidden="true">ROBERTSON</div>
<?php endif; ?>
    <div class="foot__bottom">
      <span>Robertson Truck Group © <span id="year"><?php echo esc_html( wp_date( 'Y' ) ); ?></span></span>
      <nav aria-label="Legal"><a href="#">Privacy Policy</a><a href="#">Terms of Use</a><a href="#">Employee Portal</a><a href="#">Sitemap</a></nav>
      <span class="foot__credit"><a href="#">Responsive Web Design Company</a> – <a href="#">Split Reef</a></span>
    </div>
  </div>
</footer>

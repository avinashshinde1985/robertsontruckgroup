<?php
/**
 * Footer, mobile action bar and back-to-top button for the RTS inner pages.
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

$contact = rtg_contact( 'rts' );
?>
<!-- ===== Footer ===== -->
<footer class="footer">
  <div class="container footer__top">
    <div class="footer__brand">
      <img src="<?php rtg_a( 'rts:images/rts-logo-white.svg' ); ?>" alt="Robertson Truck Sales" width="230" height="62">
      <p>Ohio's premiere used medium and heavy-duty truck dealer. 42 years in the making.</p>
    </div>
    <div class="footer__col">
      <h4>Explore</h4>
      <a href="<?php rtg_u( 'rts', 'inventory' ); ?>">Inventory</a>
      <a href="<?php rtg_u( 'rts', 'trade' ); ?>">Value My Trade</a>
      <a href="<?php rtg_u( 'rts', 'capabilities' ); ?>">Capabilities</a>
      <a href="<?php rtg_u( 'rts', 'about' ); ?>">About Us</a>
      <a href="<?php rtg_u( 'rts', 'gallery' ); ?>">Gallery</a>
      <a href="<?php rtg_u( 'rts', 'blog' ); ?>">Blog</a>
    </div>
    <div class="footer__col">
      <h4>Get in touch</h4>
      <a href="tel:<?php echo esc_attr( $contact['tel'] ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a>
      <a href="<?php rtg_u( 'rts', 'contact' ); ?>">Contact Us</a>
      <a href="#">Finance Application</a>
      <a href="<?php rtg_u( 'rts', 'rtg' ); ?>">Robertson Truck Group</a>
    </div>
    <div class="footer__col">
      <h4>Visit</h4>
      <address>8920 Columbus Rd.<br>P.O. Box 1146<br>Mount Vernon, OH 43050</address>
    </div>
  </div>
  <div class="container footer__bottom">
    <span>Robertson Truck Group &copy; <span id="year"><?php echo esc_html( wp_date( 'Y' ) ); ?></span></span>
    <nav aria-label="Legal">
      <a href="#">Privacy Policy</a>
      <a href="#">Terms of Use</a>
      <a href="#">Employee Portal</a>
      <a href="#">Sitemap</a>
    </nav>
    <span class="footer__credit"><a href="#">Responsive Web Design Company</a> – <a href="#">Split Reef</a></span>
  </div>
</footer>

<!-- Mobile sticky action bar -->
<div class="mbar">
  <a href="tel:<?php echo esc_attr( $contact['tel'] ); ?>"><svg><use href="#i-phone"/></svg>Call</a>
  <a href="<?php rtg_u( 'rts', 'inventory' ); ?>" class="mbar__main"><svg><use href="#i-truck"/></svg>Inventory</a>
  <a href="#"><svg><use href="#i-dollar"/></svg>Finance</a>
</div>

<button class="totop" id="totop" aria-label="Back to top"><svg style="transform:rotate(-90deg)"><use href="#i-chev"/></svg></button>

<?php
/**
 * Top bar + header used by the RTS inner pages (about, capabilities, gallery, blog, contact).
 *
 * Args: active (URL of the highlighted item).
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

$args    = wp_parse_args( $args, array( 'active' => rtg_current_url() ) );
$contact = rtg_contact( 'rts' );
$items   = rtg_menu_items( 'primary' );
?>
<!-- ===== Top bar ===== -->
<div class="topbar">
  <div class="container topbar__in">
    <span class="topbar__loc"><svg><use href="#i-pin"/></svg><?php echo esc_html( $contact['address'] ); ?></span>
    <div class="topbar__right">
      <a href="tel:<?php echo esc_attr( $contact['tel'] ); ?>"><svg><use href="#i-phone"/></svg><?php echo esc_html( $contact['phone'] ); ?></a>
      <a href="<?php rtg_u( 'rts', 'contact' ); ?>#form"><svg><use href="#i-mail"/></svg>Send us a message</a>
      <a href="<?php rtg_u( 'rts', 'rtg' ); ?>" class="topbar__group">Robertson Truck Group</a>
    </div>
  </div>
</div>

<!-- ===== Header ===== -->
<header class="header" id="header">
  <div class="container header__in">
    <a href="<?php rtg_u( 'rts' ); ?>" class="brand" aria-label="Robertson Truck Sales – Home">
      <img src="<?php rtg_a( 'rts:images/rts-logo-white.svg' ); ?>" alt="Robertson Truck Sales" width="210" height="56">
    </a>

    <nav class="nav" id="nav" aria-label="Main">
      <ul>
<?php foreach ( $items as $item ) : ?>
        <li><a href="<?php echo esc_url( $item['url'] ); ?>"<?php echo rtg_nav_attrs( $item, $args['active'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?>><?php echo esc_html( $item['label'] ); ?></a></li>
<?php endforeach; ?>
        <li class="nav__mobile-only"><a href="<?php rtg_u( 'rts', 'rtg' ); ?>">Robertson Truck Group</a></li>
      </ul>
      <a href="tel:<?php echo esc_attr( $contact['tel'] ); ?>" class="btn btn--red nav__mobile-only nav__call"><svg><use href="#i-phone"/></svg>Call <?php echo esc_html( $contact['phone'] ); ?></a>
    </nav>

    <div class="header__cta">
      <a href="tel:<?php echo esc_attr( $contact['tel'] ); ?>" class="header__phone">
        <span class="header__phone-ic"><svg><use href="#i-phone"/></svg></span>
        <span><small>Call us today</small><?php echo esc_html( $contact['phone'] ); ?></span>
      </a>
      <a href="<?php rtg_u( 'rts', 'inventory' ); ?>" class="btn btn--red btn--sm">View Inventory</a>
      <button class="burger" id="burger" aria-label="Open menu" aria-expanded="false" aria-controls="nav"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>

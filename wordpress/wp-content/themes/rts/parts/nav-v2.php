<?php
/**
 * Dark "v2" header + full-screen mobile menu (RTS home/inventory/trade/quote, all OTE pages).
 *
 * Args: active (URL of the highlighted item), contact ('rts'|'ote' phone shown), cta_url, cta_label.
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;

$args    = wp_parse_args(
	$args,
	array(
		'active'    => rtg_current_url(),
		'contact'   => rtg_brand( 'site' ),
		'cta_url'   => rtg_url( 'rts', 'inventory' ),
		'cta_label' => 'View Inventory',
	)
);
$brand   = rtg_brand();
$contact = rtg_contact( $args['contact'] );
$logo    = $brand['nav_logo'];
$items   = rtg_menu_items( 'primary' );
?>
<header class="nav" id="nav">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav__logo" aria-label="<?php echo esc_attr( $brand['name'] ); ?> home"><img src="<?php rtg_a( $logo['src'] ); ?>" alt="<?php echo esc_attr( $brand['name'] ); ?>" width="<?php echo (int) $logo['w']; ?>" height="<?php echo (int) $logo['h']; ?>"></a>
  <nav class="nav__links" aria-label="Main">
<?php foreach ( $items as $item ) : ?>
    <a href="<?php echo esc_url( $item['url'] ); ?>"<?php echo rtg_nav_attrs( $item, $args['active'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?>><?php echo esc_html( $item['label'] ); ?></a>
<?php endforeach; ?>
  </nav>
  <div class="nav__right">
    <a href="tel:<?php echo esc_attr( $contact['tel'] ); ?>" class="nav__phone"><svg><use href="#i-phone"/></svg><span><?php echo esc_html( $contact['phone'] ); ?></span></a>
    <a href="<?php echo esc_url( $args['cta_url'] ); ?>" class="btn btn--red btn--sm"><span><?php echo esc_html( $args['cta_label'] ); ?></span></a>
    <button class="nav__burger" id="burger" aria-label="Open menu" aria-expanded="false"><span></span><span></span></button>
  </div>
</header>

<div class="menu" id="menu" aria-hidden="true">
  <nav>
<?php
$n = 0;
foreach ( $items as $item ) :
	++$n;
	$mclass = false !== strpos( $item['class'], 'nav__inv' ) ? 'menu__inv' : '';
	?>
    <a href="<?php echo esc_url( $item['url'] ); ?>"<?php echo $mclass ? ' class="' . esc_attr( $mclass ) . '"' : ''; ?>><small><?php echo esc_html( sprintf( '%02d', $n ) ); ?></small><?php echo esc_html( $item['label'] ); ?></a>
<?php endforeach; ?>
    <a href="<?php rtg_u( 'rts', 'rtg' ); ?>"><small><?php echo esc_html( sprintf( '%02d', $n + 1 ) ); ?></small>Robertson Truck Group</a>
  </nav>
  <div class="menu__foot">
    <a href="tel:<?php echo esc_attr( $contact['tel'] ); ?>"><?php echo esc_html( $contact['phone'] ); ?></a>
    <span><?php echo esc_html( $contact['address'] ); ?></span>
  </div>
</div>

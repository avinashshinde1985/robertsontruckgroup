<?php
/**
 * Template Name: Gallery
 *
 * Converted from rts/gallery.html.
 *
 * @package RTS
 */

rtg_page(
	array(
		'title'       => 'Gallery – See Our Work | Robertson Truck Sales',
		'description' => 'See our work: custom fabrication, upfitting, our service shop, paint & detail and the trucks we build at Robertson Truck Sales in Mount Vernon, Ohio.',
		'body_class'  => 'page-gallery',
		'styles'      => array( 'css/style.css', 'css/inner.css', 'css/gallery.css', 'css/dark.css', 'css/chat.css' ),
		'scripts'     => array(
			'js/main.js',
			'js/gallery.js',
			'js/inventory-data.js',
			'js/chat.js',
			array(
				'inline' => <<<'JS'
RTGChat.floating();
JS
			),
		),
	)
);

rtg_fields_for( 'gallery' );
$rtg_photos = rtg_items( 'photos' );
$rtg_counts = array_count_values( array_column( $rtg_photos, 'cat' ) );
get_header();
?>
<!-- SVG icon sprite -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></symbol>
  <symbol id="i-mail" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></g></symbol>
  <symbol id="i-pin" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></g></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></symbol>
  <symbol id="i-wrench" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.8-3.8a6 6 0 0 1-7.9 7.9l-6.9 6.9a2.1 2.1 0 0 1-3-3l6.9-6.9a6 6 0 0 1 7.9-7.9z"/></symbol>
  <symbol id="i-truck" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2M15 18H9M19 18h2a1 1 0 0 0 1-1v-3.6a1 1 0 0 0-.2-.6l-3.5-4.4A1 1 0 0 0 17.5 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></g></symbol>
  <symbol id="i-dollar" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2.5"/><path d="M6 12h.01M18 12h.01"/></g></symbol>
  <symbol id="i-chev" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6"/></symbol>
  <symbol id="i-flame" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.4-.5-2-1-3-1.1-2.1-.2-4.1 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.2.4-2.3 1-3.4.3 1.6 1.4 2.9 2.5 2.9z"/></symbol>
  <symbol id="i-home" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 10 9-7 9 7v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><path d="M9 22V12h6v10"/></g></symbol>
  <symbol id="i-grid" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></g></symbol>
  <symbol id="i-expand" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></symbol>
  <symbol id="i-x" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" d="M18 6 6 18M6 6l12 12"/></symbol>
  <symbol id="i-camera" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3z"/><circle cx="12" cy="13" r="3.5"/></g></symbol>
</svg>

<a class="skip" href="#main">Skip to content</a>

<?php get_template_part( 'parts/nav', 'classic', array( 'active' => rtg_url( 'rts', 'gallery' ) ) ); ?>

<main id="main">

<!-- ===== Page hero ===== -->
<section class="hero hero--inner hero--gallery">
  <div class="hero__slides" aria-hidden="true">
<?php foreach ( rtg_items( 'hero_slides' ) as $rtg_i => $rtg_slide ) : ?>
    <div class="hero__slide<?php echo 0 === $rtg_i ? ' is-active' : ''; ?>" style="background-image:url(<?php echo esc_url( $rtg_slide['image'] ); ?>)"></div>
<?php endforeach; ?>
  </div>
  <div class="hero__shade"></div>

  <div class="container hero__in">
    <div class="hero__copy">
      <nav class="crumbs" aria-label="Breadcrumb">
        <a href="<?php rtg_u( 'rts', '' ); ?>">Home</a><svg><use href="#i-chev"/></svg><span aria-current="page"><?php rtg_e( 'hero_crumb' ); ?></span>
      </nav>
      <h1><?php rtg_e( 'hero_title' ); ?></h1>
      <p class="hero__lead"><?php rtg_e( 'hero_lead' ); ?></p>
      <div class="hero__btns">
        <a href="<?php echo esc_url( rtg_f( 'hero_btn1_url' ) ); ?>" class="btn btn--red btn--lg"><?php rtg_e( 'hero_btn1_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
        <a href="<?php echo esc_url( rtg_f( 'hero_btn2_url' ) ); ?>" class="btn btn--glass btn--lg"><?php rtg_e( 'hero_btn2_text' ); ?></a>
      </div>
    </div>

    <div class="glance glass-card">
      <div class="glance__head">
        <span class="glance__ic"><svg><use href="#i-camera"/></svg></span>
        <div>
          <strong><span data-total><?php echo (int) count( $rtg_photos ); ?></span> Photos</strong>
          <span><?php rtg_e( 'glance_sub' ); ?></span>
        </div>
      </div>
      <a href="#work" class="glance__row" data-jump="fabrication"><span class="glance__ic glance__ic--sm"><svg><use href="#i-flame"/></svg></span><b>Fabrication &amp; Upfitting</b><em data-count-cat="fabrication"><?php echo (int) ( $rtg_counts['fabrication'] ?? 0 ); ?></em></a>
      <a href="#work" class="glance__row" data-jump="shop"><span class="glance__ic glance__ic--sm"><svg><use href="#i-wrench"/></svg></span><b>Service Shop</b><em data-count-cat="shop"><?php echo (int) ( $rtg_counts['shop'] ?? 0 ); ?></em></a>
      <a href="#work" class="glance__row" data-jump="trucks"><span class="glance__ic glance__ic--sm"><svg><use href="#i-truck"/></svg></span><b>Trucks &amp; Brand</b><em data-count-cat="trucks"><?php echo (int) ( $rtg_counts['trucks'] ?? 0 ); ?></em></a>
      <a href="#work" class="glance__row" data-jump="facility"><span class="glance__ic glance__ic--sm"><svg><use href="#i-home"/></svg></span><b>Facility</b><em data-count-cat="facility"><?php echo (int) ( $rtg_counts['facility'] ?? 0 ); ?></em></a>
    </div>
  </div>

  <div class="hero__dots" id="heroDots" role="tablist" aria-label="Hero slides"></div>
  <a href="#work" class="hero__scroll" aria-label="Scroll down"><span></span></a>
</section>

<!-- ===== Gallery ===== -->
<section class="section work" id="work">
  <div class="container">
    <div class="sec-head reveal">
      <span class="eyebrow"><?php rtg_e( 'work_tag' ); ?></span>
      <h2><?php rtg_e( 'work_title' ); ?></h2>
    </div>

    <div class="gbar" id="gbar">
      <div class="gfilters" role="group" aria-label="Filter photos">
        <button type="button" class="gf is-active" data-filter="all" aria-pressed="true"><svg><use href="#i-grid"/></svg>All <span class="gf__n" data-n="all"></span></button>
        <button type="button" class="gf" data-filter="fabrication" aria-pressed="false"><svg><use href="#i-flame"/></svg>Fabrication &amp; Upfitting <span class="gf__n" data-n="fabrication"></span></button>
        <button type="button" class="gf" data-filter="shop" aria-pressed="false"><svg><use href="#i-wrench"/></svg>Service Shop <span class="gf__n" data-n="shop"></span></button>
        <button type="button" class="gf" data-filter="trucks" aria-pressed="false"><svg><use href="#i-truck"/></svg>Trucks &amp; Brand <span class="gf__n" data-n="trucks"></span></button>
        <button type="button" class="gf" data-filter="facility" aria-pressed="false"><svg><use href="#i-home"/></svg>Facility <span class="gf__n" data-n="facility"></span></button>
      </div>
      <p class="gbar__count" aria-live="polite">Showing <b id="gShown"><?php echo (int) count( $rtg_photos ); ?></b> photos</p>
    </div>

    <div class="ggrid" id="ggrid">
<?php foreach ( $rtg_photos as $rtg_photo ) : ?>
      <a href="<?php echo esc_url( $rtg_photo['image'] ); ?>" class="gitem<?php echo $rtg_photo['size'] ? ' g--' . rtg_attr( $rtg_photo['size'] ) : ''; ?>" data-cat="<?php echo rtg_attr( $rtg_photo['cat'] ); ?>" data-caption="<?php echo rtg_attr( $rtg_photo['caption'] ); ?>">
        <img src="<?php echo esc_url( $rtg_photo['image'] ); ?>" alt="<?php echo rtg_attr( $rtg_photo['alt'] ); ?>" loading="lazy"<?php echo $rtg_photo['w'] ? ' width="' . rtg_attr( $rtg_photo['w'] ) . '"' : ''; ?><?php echo $rtg_photo['h'] ? ' height="' . rtg_attr( $rtg_photo['h'] ) . '"' : ''; ?>>
      </a>
<?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== CTA band ===== -->
<section class="cta">
  <div class="container cta__in reveal">
    <div class="cta__copy">
      <span class="eyebrow eyebrow--light"><?php rtg_e( 'cta_tag' ); ?></span>
      <h2><?php rtg_e( 'cta_title' ); ?></h2>
      <p><?php rtg_e( 'cta_text' ); ?></p>
      <a href="<?php echo esc_url( rtg_f( 'cta_btn2_url' ) ); ?>" class="btn btn--glass"><?php rtg_e( 'cta_btn2_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
    </div>
    <div class="cta__actions">
      <p><?php rtg_e( 'cta_call_label' ); ?></p>
      <a href="<?php echo esc_url( rtg_f( 'cta_tel' ) ); ?>" class="cta__phone"><svg><use href="#i-phone"/></svg><?php rtg_e( 'cta_phone' ); ?></a>
      <a href="<?php echo esc_url( rtg_f( 'cta_btn_url' ) ); ?>" class="btn btn--white"><?php rtg_e( 'cta_btn_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>

<!-- ===== Divisions ===== -->
<section class="section divisions">
  <div class="container">
    <div class="sec-head reveal">
      <span class="eyebrow"><?php rtg_e( 'div_tag' ); ?></span>
      <img class="divisions__rtg" src="<?php echo esc_url( rtg_f( 'div_logo' ) ); ?>" alt="Robertson Truck Group" width="280" height="82">
    </div>
    <div class="divisions__logos" style="margin-bottom:0">
<?php foreach ( rtg_items( 'divisions' ) as $rtg_div ) : ?>
      <a href="<?php echo esc_url( $rtg_div['url'] ); ?>" class="dlogo reveal"><img src="<?php echo esc_url( $rtg_div['logo'] ); ?>" alt="<?php echo rtg_attr( $rtg_div['name'] ); ?>"><span><?php echo $rtg_div['cta']; ?> <svg><use href="#i-arrow"/></svg></span></a>
<?php endforeach; ?>
    </div>
  </div>
</section>

</main>

<!-- ===== Lightbox ===== -->
<div class="lb" id="lb" role="dialog" aria-modal="true" aria-label="Photo viewer" hidden>
  <div class="lb__top">
    <span class="lb__count"><b id="lbIdx">1</b> / <span id="lbTotal"><?php echo (int) count( $rtg_photos ); ?></span></span>
    <button type="button" class="lb__btn lb__close" aria-label="Close viewer"><svg><use href="#i-x"/></svg></button>
  </div>
  <div class="lb__stage">
    <button type="button" class="lb__btn lb__nav lb__prev" aria-label="Previous photo"><svg style="transform:rotate(180deg)"><use href="#i-chev"/></svg></button>
    <figure class="lb__fig">
      <img id="lbImg" src="" alt="">
      <figcaption><span class="lb__cat" id="lbCat"></span><strong id="lbCap"></strong></figcaption>
    </figure>
    <button type="button" class="lb__btn lb__nav lb__next" aria-label="Next photo"><svg><use href="#i-chev"/></svg></button>
  </div>
  <div class="lb__thumbs" id="lbThumbs"></div>
</div>

<?php get_template_part( 'parts/footer', 'classic' ); ?>
<?php
get_footer();

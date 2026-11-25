<?php
/**
 * Template Name: Home (Classic)
 *
 * Converted from rts/index-classic.html.
 *
 * @package RTS
 */

rtg_page(
	array(
		'title'       => 'Used Trucks for Sale in Ohio | Robertson Truck Sales',
		'description' => 'Robertson Truck Group – Ohio\'s premiere used medium and heavy-duty truck dealer in Mount Vernon, OH. Fabrication, upfitting, financing and road-ready trucks. 42 years in the making.',
		'theme_color' => '#091F4F',
		'noindex'     => true,
		'fonts'       => false,
		'styles'      => array( 'css/style.css' ),
		'scripts'     => array(
			'js/main.js',
		),
	)
);

rtg_fields_for( 'home-classic' );
get_header();
?>
<!-- SVG icon sprite -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></symbol>
  <symbol id="i-mail" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></g></symbol>
  <symbol id="i-pin" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></g></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></symbol>
  <symbol id="i-search" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></g></symbol>
  <symbol id="i-check" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M20 6 9 17l-5-5"/></symbol>
  <symbol id="i-wrench" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.8-3.8a6 6 0 0 1-7.9 7.9l-6.9 6.9a2.1 2.1 0 0 1-3-3l6.9-6.9a6 6 0 0 1 7.9-7.9z"/></symbol>
  <symbol id="i-truck" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2M15 18H9M19 18h2a1 1 0 0 0 1-1v-3.6a1 1 0 0 0-.2-.6l-3.5-4.4A1 1 0 0 0 17.5 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></g></symbol>
  <symbol id="i-award" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.5 12.9 17 22l-5-3-5 3 1.5-9.1"/></g></symbol>
  <symbol id="i-dollar" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2.5"/><path d="M6 12h.01M18 12h.01"/></g></symbol>
  <symbol id="i-shield" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></g></symbol>
  <symbol id="i-chev" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6"/></symbol>
</svg>

<a class="skip" href="#main">Skip to content</a>

<!-- ===== Top bar ===== -->
<div class="topbar">
  <div class="container topbar__in">
    <span class="topbar__loc"><svg><use href="#i-pin"/></svg>8920 Columbus Rd., Mount Vernon, OH 43050</span>
    <div class="topbar__right">
      <a href="tel:7403974969"><svg><use href="#i-phone"/></svg>740-397-4969</a>
      <a href="<?php rtg_u( 'rts', 'contact' ); ?>#form"><svg><use href="#i-mail"/></svg>Send us a message</a>
      <a href="#" class="topbar__group">Robertson Truck Group</a>
    </div>
  </div>
</div>

<!-- ===== Header ===== -->
<header class="header" id="header">
  <div class="container header__in">
    <a href="#" class="brand" aria-label="Robertson Truck Sales – Home">
      <img src="<?php rtg_a( 'images/rts-logo.svg' ); ?>" alt="Robertson Truck Sales" width="210" height="56">
    </a>

    <nav class="nav" id="nav" aria-label="Main">
      <ul>
        <li><a href="#" class="is-active">Home</a></li>
        <li><a href="#">Inventory</a></li>
        <li><a href="<?php rtg_u( 'rts', 'capabilities' ); ?>">Capabilities</a></li>
        <li><a href="<?php rtg_u( 'rts', 'about' ); ?>">About Us</a></li>
        <li><a href="<?php rtg_u( 'rts', 'gallery' ); ?>">Gallery</a></li>
        <li><a href="<?php rtg_u( 'rts', 'blog' ); ?>">Blog</a></li>
        <li><a href="<?php rtg_u( 'rts', 'contact' ); ?>">Contact Us</a></li>
        <li class="nav__mobile-only"><a href="#">Robertson Truck Group</a></li>
      </ul>
      <a href="tel:7403974969" class="btn btn--red nav__mobile-only nav__call"><svg><use href="#i-phone"/></svg>Call 740-397-4969</a>
    </nav>

    <div class="header__cta">
      <a href="tel:7403974969" class="header__phone">
        <span class="header__phone-ic"><svg><use href="#i-phone"/></svg></span>
        <span><small>Call us today</small>740-397-4969</span>
      </a>
      <a href="#" class="btn btn--red btn--sm">View Inventory</a>
      <button class="burger" id="burger" aria-label="Open menu" aria-expanded="false" aria-controls="nav"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>

<main id="main">

<!-- ===== Hero ===== -->
<section class="hero">
  <div class="hero__slides" aria-hidden="true">
<?php foreach ( rtg_items( 'hero_slides' ) as $i => $it ) : ?>
    <div class="hero__slide<?php echo 0 === $i ? ' is-active' : ''; ?>" style="background-image:url(<?php echo esc_url( $it['image'] ); ?>)"></div>
<?php endforeach; ?>
  </div>
  <div class="hero__shade"></div>

  <div class="container hero__in">
    <div class="hero__copy">
      <span class="eyebrow eyebrow--light"><span class="dot"></span><?php rtg_e( 'hero_eyebrow' ); ?></span>
      <h1><?php rtg_e( 'hero_title' ); ?></h1>
      <p class="hero__lead"><?php rtg_e( 'hero_text' ); ?></p>
      <div class="hero__btns">
        <a href="<?php echo esc_url( rtg_f( 'hero_btn1_url' ) ); ?>" class="btn btn--red btn--lg"><?php rtg_e( 'hero_btn1_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
        <a href="<?php echo esc_url( rtg_f( 'hero_btn2_url' ) ); ?>" class="btn btn--glass btn--lg"><?php rtg_e( 'hero_btn2_text' ); ?></a>
      </div>
    </div>

    <form class="finder" action="#" method="get">
      <div class="finder__head">
        <img src="<?php rtg_a( 'images/rts-emblem.svg' ); ?>" alt="" width="44" height="44">
        <div>
          <strong><?php rtg_e( 'finder_title' ); ?></strong>
          <span><?php rtg_e( 'finder_sub' ); ?></span>
        </div>
      </div>
      <label for="stock">Stock</label>
      <div class="finder__field">
        <input id="stock" type="text" name="inventory" placeholder="Stock #" autocomplete="off">
        <button type="submit" aria-label="Search"><svg><use href="#i-search"/></svg></button>
      </div>
      <div class="finder__tags">
        <?php foreach ( rtg_items( 'finder_tags' ) as $it ) : ?><span><?php echo $it['text']; ?></span><?php endforeach; ?>

      </div>
    </form>
  </div>

  <div class="hero__dots" id="heroDots" role="tablist" aria-label="Hero slides"></div>
  <a href="#about" class="hero__scroll" aria-label="Scroll down"><span></span></a>
</section>

<!-- ===== Stats ===== -->
<section class="stats">
  <div class="container stats__grid">
<?php foreach ( rtg_items( 'stats' ) as $it ) : ?>
    <div class="stat reveal"><strong><span data-count="<?php echo rtg_attr( $it['num'] ); ?>">0</span><?php echo $it['suffix']; ?></strong><span><?php echo $it['label']; ?></span></div>
<?php endforeach; ?>
  </div>
</section>

<!-- ===== About ===== -->
<section class="section about" id="about">
  <div class="container about__grid">
    <div class="about__media reveal">
      <div class="about__img about__img--main"><img src="<?php echo esc_url( rtg_f( 'about_img_main' ) ); ?>" alt="<?php echo rtg_attr( rtg_f( 'about_img_main_alt' ) ); ?>" loading="lazy"></div>
      <div class="about__img about__img--small"><img src="<?php echo esc_url( rtg_f( 'about_img_small' ) ); ?>" alt="<?php echo rtg_attr( rtg_f( 'about_img_small_alt' ) ); ?>" loading="lazy"></div>
      <div class="about__badge">
        <strong><?php rtg_e( 'about_badge_num' ); ?></strong>
        <span><?php rtg_e( 'about_badge_text' ); ?></span>
      </div>
    </div>
    <div class="about__copy reveal">
      <span class="eyebrow"><?php rtg_e( 'about_eyebrow' ); ?></span>
      <h2><?php rtg_e( 'about_title' ); ?></h2>
      <?php rtg_e( 'about_text' ); ?>
      <ul class="checks">
<?php foreach ( rtg_items( 'about_checks' ) as $it ) : ?>
        <li><svg><use href="#i-check"/></svg><?php echo $it['text']; ?></li>
<?php endforeach; ?>
      </ul>
      <div class="about__btns">
        <a href="<?php echo esc_url( rtg_f( 'about_btn_url' ) ); ?>" class="btn btn--navy"><?php rtg_e( 'about_btn_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
        <a href="<?php echo esc_url( rtg_f( 'about_tel' ) ); ?>" class="link-phone"><span><svg><use href="#i-phone"/></svg></span><?php rtg_e( 'about_phone' ); ?></a>
      </div>
    </div>
  </div>
</section>

<!-- ===== Why us ===== -->
<section class="section why">
  <div class="container">
    <div class="sec-head sec-head--light reveal">
      <span class="eyebrow eyebrow--light"><?php rtg_e( 'why_eyebrow' ); ?></span>
      <h2><?php rtg_e( 'why_title' ); ?></h2>
    </div>
    <div class="why__grid">
<?php foreach ( rtg_items( 'why_cards' ) as $it ) : ?>
      <article class="card-why reveal">
        <div class="card-why__ic"><svg><use href="#i-<?php echo rtg_attr( $it['icon'] ); ?>"/></svg></div>
        <h3><?php echo $it['title']; ?></h3>
        <p><?php echo $it['text']; ?></p>
	<?php if ( $it['link_text'] ) : ?>
        <a href="<?php echo esc_url( $it['link_url'] ); ?>" class="card-why__link"><?php echo $it['link_text']; ?> <svg><use href="#i-arrow"/></svg></a>
	<?php endif; ?>
      </article>
<?php endforeach; ?>
      <article class="card-why card-why--cta reveal">
        <img src="<?php rtg_a( 'images/rts-emblem.svg' ); ?>" alt="" width="64" height="64">
        <h3><?php rtg_e( 'why_cta_title' ); ?></h3>
        <p><?php rtg_e( 'why_cta_text' ); ?></p>
        <div class="card-why__btns">
          <a href="<?php echo esc_url( rtg_f( 'why_cta_btn1_url' ) ); ?>" class="btn btn--white btn--sm"><?php rtg_e( 'why_cta_btn1_text' ); ?></a>
          <a href="<?php echo esc_url( rtg_f( 'why_cta_btn2_url' ) ); ?>" class="btn btn--glass btn--sm"><?php rtg_e( 'why_cta_btn2_text' ); ?></a>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- ===== Featured products ===== -->
<section class="section products">
  <div class="container">
    <div class="sec-head sec-head--row reveal">
      <div>
        <span class="eyebrow"><?php rtg_e( 'prods_eyebrow' ); ?></span>
        <h2><?php rtg_e( 'prods_title' ); ?></h2>
      </div>
      <div class="carousel-nav">
        <button class="cbtn" data-dir="-1" aria-label="Previous"><svg style="transform:rotate(180deg)"><use href="#i-chev"/></svg></button>
        <button class="cbtn" data-dir="1" aria-label="Next"><svg><use href="#i-chev"/></svg></button>
      </div>
    </div>
  </div>
  <div class="carousel" id="carousel">
    <div class="carousel__track">
<?php foreach ( rtg_items( 'prods' ) as $it ) : ?>
      <article class="pcard"><div class="pcard__img"><img src="<?php echo esc_url( $it['image'] ); ?>" alt="<?php echo rtg_attr( $it['alt'] ); ?>" loading="lazy"></div><div class="pcard__body"><span class="pcard__tag"><?php echo $it['tag']; ?></span><h3><?php echo $it['name']; ?></h3></div></article>
<?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== Inventory split ===== -->
<section class="section split">
  <div class="container split__grid">
    <div class="split__copy reveal">
      <span class="eyebrow"><?php rtg_e( 'split_eyebrow' ); ?></span>
      <h2><?php rtg_e( 'split_title' ); ?></h2>
      <?php rtg_e( 'split_text' ); ?>
      <a href="<?php echo esc_url( rtg_f( 'split_btn_url' ) ); ?>" class="btn btn--red"><?php rtg_e( 'split_btn_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
    </div>
    <div class="split__media reveal">
      <img src="<?php echo esc_url( rtg_f( 'split_image' ) ); ?>" alt="<?php echo rtg_attr( rtg_f( 'split_image_alt' ) ); ?>" loading="lazy">
      <div class="float-card">
        <span class="float-card__ic"><svg><use href="#i-shield"/></svg></span>
        <div><strong><?php rtg_e( 'split_float_title' ); ?></strong><span><?php rtg_e( 'split_float_text' ); ?></span></div>
      </div>
    </div>
  </div>
</section>

<!-- ===== Upfitting ===== -->
<section class="upfit">
  <div class="upfit__bg" style="background-image:url(<?php echo esc_url( rtg_f( 'upfit_bg' ) ); ?>)"></div>
  <div class="container upfit__in">
    <div class="upfit__card reveal">
      <span class="eyebrow eyebrow--light"><?php rtg_e( 'upfit_eyebrow' ); ?></span>
      <h2><?php rtg_e( 'upfit_title' ); ?></h2>
      <?php rtg_e( 'upfit_text' ); ?>
      <div class="upfit__chips">
<?php foreach ( rtg_items( 'upfit_chips' ) as $it ) : ?>
        <span><svg><use href="#i-check"/></svg><?php echo $it['text']; ?></span>
<?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ===== Types of trucks ===== -->
<section class="section types">
  <div class="container types__grid">
    <div class="types__media reveal">
      <img src="<?php echo esc_url( rtg_f( 'types_image' ) ); ?>" alt="<?php echo rtg_attr( rtg_f( 'types_image_alt' ) ); ?>" loading="lazy">
      <div class="types__brands">
        <?php foreach ( rtg_items( 'types_brands' ) as $it ) : ?><span><?php echo $it['text']; ?></span><?php endforeach; ?>

      </div>
    </div>
    <div class="types__copy reveal">
      <span class="eyebrow"><?php rtg_e( 'types_eyebrow' ); ?></span>
      <h2><?php rtg_e( 'types_title' ); ?></h2>
      <?php rtg_e( 'types_text' ); ?>
    </div>
  </div>
</section>

<!-- ===== Buying guide ===== -->
<section class="section guide">
  <div class="container">
    <div class="sec-head reveal">
      <span class="eyebrow"><?php rtg_e( 'guide_eyebrow' ); ?></span>
      <h2><?php rtg_e( 'guide_title' ); ?></h2>
      <p><?php rtg_e( 'guide_text' ); ?></p>
    </div>

    <div class="guide__grid">
<?php foreach ( rtg_items( 'guide_cards' ) as $i => $it ) : ?>
      <article class="gcard reveal">
        <span class="gcard__num"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
        <h3><?php echo $it['title']; ?></h3>
        <p><?php echo $it['intro']; ?></p>
	<?php if ( '' !== trim( $it['more'] ) ) : ?>
        <details>
          <summary><?php rtg_e( 'guide_more_label' ); ?> <svg><use href="#i-chev"/></svg></summary>
          <?php echo $it['more']; ?>
        </details>
	<?php endif; ?>
      </article>
<?php endforeach; ?>
    </div>
    <p class="guide__note reveal"><?php rtg_e( 'guide_note' ); ?></p>
  </div>
</section>

<!-- ===== CTA band ===== -->
<section class="cta">
  <div class="container cta__in reveal">
    <div class="cta__copy">
      <span class="eyebrow eyebrow--light"><?php rtg_e( 'cta_eyebrow' ); ?></span>
      <h2><?php rtg_e( 'cta_title' ); ?></h2>
      <p><?php rtg_e( 'cta_text' ); ?></p>
    </div>
    <div class="cta__actions">
      <p><?php rtg_e( 'cta_phone_label' ); ?></p>
      <a href="<?php echo esc_url( rtg_f( 'cta_tel' ) ); ?>" class="cta__phone"><svg><use href="#i-phone"/></svg><?php rtg_e( 'cta_phone' ); ?></a>
      <a href="<?php echo esc_url( rtg_f( 'cta_btn_url' ) ); ?>" class="btn btn--white"><?php rtg_e( 'cta_btn_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>

<!-- ===== Divisions ===== -->
<section class="section divisions">
  <div class="container">
    <div class="sec-head reveal">
      <span class="eyebrow"><?php rtg_e( 'div_eyebrow' ); ?></span>
      <img class="divisions__rtg" src="<?php echo esc_url( rtg_f( 'div_logo' ) ); ?>" alt="Robertson Truck Group" width="280" height="121">
    </div>
    <div class="divisions__logos">
<?php foreach ( rtg_items( 'divisions' ) as $it ) : ?>
      <a href="<?php echo esc_url( $it['url'] ); ?>" class="dlogo reveal"><img src="<?php echo esc_url( $it['logo'] ); ?>" alt="<?php echo rtg_attr( $it['name'] ); ?>"><span><?php rtg_e( 'div_visit' ); ?> <svg><use href="#i-arrow"/></svg></span></a>
<?php endforeach; ?>
    </div>
    <div class="locs">
<?php foreach ( rtg_items( 'locs' ) as $it ) : ?>
      <div class="loc reveal">
        <span class="loc__ic"><svg><use href="#i-pin"/></svg></span>
        <h3><?php echo $it['name']; ?></h3>
        <address><?php echo $it['address']; ?></address>
        <a href="<?php echo esc_url( $it['tel'] ); ?>"><svg><use href="#i-phone"/></svg><?php echo $it['phone']; ?></a>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>

</main>

<!-- ===== Footer ===== -->
<footer class="footer">
  <div class="container footer__top">
    <div class="footer__brand">
      <img src="<?php rtg_a( 'images/rts-logo-white.svg' ); ?>" alt="Robertson Truck Sales" width="230" height="62">
      <p>Ohio's premiere used medium and heavy-duty truck dealer. 42 years in the making.</p>
    </div>
    <div class="footer__col">
      <h4>Explore</h4>
      <a href="#">Inventory</a>
      <a href="<?php rtg_u( 'rts', 'capabilities' ); ?>">Capabilities</a>
      <a href="<?php rtg_u( 'rts', 'about' ); ?>">About Us</a>
      <a href="<?php rtg_u( 'rts', 'gallery' ); ?>">Gallery</a>
      <a href="<?php rtg_u( 'rts', 'blog' ); ?>">Blog</a>
    </div>
    <div class="footer__col">
      <h4>Get in touch</h4>
      <a href="tel:7403974969">740-397-4969</a>
      <a href="<?php rtg_u( 'rts', 'contact' ); ?>">Contact Us</a>
      <a href="#">Finance Application</a>
      <a href="#">Robertson Truck Group</a>
    </div>
    <div class="footer__col">
      <h4>Visit</h4>
      <address>8920 Columbus Rd.<br>P.O. Box 1146<br>Mount Vernon, OH 43050</address>
    </div>
  </div>
  <div class="container footer__bottom">
    <span>Robertson Truck Group &copy; <span id="year">2026</span></span>
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
  <a href="tel:7403974969"><svg><use href="#i-phone"/></svg>Call</a>
  <a href="#" class="mbar__main"><svg><use href="#i-truck"/></svg>Inventory</a>
  <a href="#"><svg><use href="#i-dollar"/></svg>Finance</a>
</div>

<button class="totop" id="totop" aria-label="Back to top"><svg style="transform:rotate(-90deg)"><use href="#i-chev"/></svg></button>
<?php
get_footer();

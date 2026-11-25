<?php
/**
 * Template Name: Capabilities
 *
 * Converted from rts/capabilities.html.
 *
 * @package RTS
 */

rtg_page(
	array(
		'title'       => 'Capabilities | Truck Upfitting, Fabrication & Service | Robertson Truck Sales',
		'description' => 'Ohio\'s leading body upfitter. Three on-site shops – mechanical, paint & detail, and a 100,000 sq ft fabrication center – for driveline work, dump body and flatbed installations, frame alterations and wheelbase modifications in Mount Vernon, OH.',
		'body_class'  => 'page-cap',
		'styles'      => array( 'css/style.css', 'css/inner.css', 'css/capabilities.css', 'css/dark.css', 'css/chat.css' ),
		'scripts'     => array(
			'js/main.js',
			'js/video.js',
			'js/capabilities.js',
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

rtg_fields_for( 'capabilities' );
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
  <symbol id="i-dollar" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2.5"/><path d="M6 12h.01M18 12h.01"/></g></symbol>
  <symbol id="i-shield" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></g></symbol>
  <symbol id="i-chev" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6"/></symbol>
  <symbol id="i-brush" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m14.6 3.4 6 6L11 19a2.8 2.8 0 0 1-4-4z"/><path d="M7 15c-2 0-3 1.5-3 3s-1 2.5-2 3c3 1 7 0 7-3"/></g></symbol>
  <symbol id="i-flame" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.4-.5-2-1-3-1.1-2.1-.2-4.1 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.2.4-2.3 1-3.4.3 1.6 1.4 2.9 2.5 2.9z"/></symbol>
  <symbol id="i-ruler" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.4 2.4 0 0 1 0-3.4l2.6-2.6a2.4 2.4 0 0 1 3.4 0z"/><path d="m14.5 12.5 2-2M11.5 9.5l2-2M8.5 6.5l2-2M17.5 15.5l2-2"/></g></symbol>
  <symbol id="i-play" viewBox="0 0 24 24"><path fill="currentColor" d="M8 5.5v13a1 1 0 0 0 1.5.86l10.6-6.5a1 1 0 0 0 0-1.72L9.5 4.64A1 1 0 0 0 8 5.5z"/></symbol>
  <symbol id="i-x" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" d="M18 6 6 18M6 6l12 12"/></symbol>
</svg>

<a class="skip" href="#main">Skip to content</a>

<?php get_template_part( 'parts/nav', 'classic', array( 'active' => rtg_url( 'rts', 'capabilities' ) ) ); ?>

<main id="main">

<!-- ===== Page hero ===== -->
<section class="hero hero--inner">
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

    <div class="shops-card glass-card">
      <div class="shops-card__head">
        <img src="<?php rtg_a( 'images/rts-emblem.svg' ); ?>" alt="" width="44" height="44">
        <div>
          <strong><?php rtg_e( 'shops_card_title' ); ?></strong>
          <span><?php rtg_e( 'shops_card_sub' ); ?></span>
        </div>
      </div>
<?php foreach ( rtg_items( 'shops_card_rows' ) as $rtg_row ) : ?>
      <a href="#shops" class="shops-card__row"><span class="shops-card__ic"><svg><use href="#i-<?php echo rtg_attr( $rtg_row['icon'] ); ?>"/></svg></span><span><b><?php echo $rtg_row['title']; ?></b><small><?php echo $rtg_row['text']; ?></small></span><svg class="shops-card__go"><use href="#i-chev"/></svg></a>
<?php endforeach; ?>
    </div>
  </div>

  <div class="hero__dots" id="heroDots" role="tablist" aria-label="Hero slides"></div>
  <a href="#shops" class="hero__scroll" aria-label="Scroll down"><span></span></a>
</section>

<!-- ===== Stats ===== -->
<section class="stats">
  <div class="container stats__grid">
<?php foreach ( rtg_items( 'stats' ) as $rtg_stat ) : ?>
    <div class="stat reveal"><strong><span data-count="<?php echo rtg_attr( $rtg_stat['num'] ); ?>">0</span><?php echo $rtg_stat['suffix']; ?></strong><span><?php echo $rtg_stat['label']; ?></span></div>
<?php endforeach; ?>
  </div>
</section>

<!-- ===== Inventory → upfit → quote (capabilities support inventory) ===== -->
<section class="capflow" id="how">
  <div class="container">
    <div class="sec-head sec-head--row reveal">
      <div>
        <span class="eyebrow"><?php rtg_e( 'flow_tag' ); ?></span>
        <h2><?php rtg_e( 'flow_title' ); ?></h2>
      </div>
      <a href="<?php echo esc_url( rtg_f( 'flow_btn_url' ) ); ?>" class="btn btn--red"><?php rtg_e( 'flow_btn_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
    </div>
    <div class="capflow__grid">
<?php foreach ( rtg_items( 'flow_steps' ) as $rtg_step ) : ?>
      <div class="capflow__step reveal">
        <h3><?php echo $rtg_step['title']; ?></h3>
        <p><?php echo $rtg_step['text']; ?></p>
        <a href="<?php echo esc_url( $rtg_step['url'] ); ?>" class="btn btn--<?php echo rtg_attr( $rtg_step['color'] ? $rtg_step['color'] : 'navy' ); ?> btn--sm"><?php echo $rtg_step['btn']; ?> <svg><use href="#i-arrow"/></svg></a>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== Intro + shops ===== -->
<section class="section intro" id="shops">
  <div class="container">
    <div class="intro__grid">
      <div class="intro__copy reveal">
        <span class="eyebrow"><?php rtg_e( 'intro_tag' ); ?></span>
        <h2><?php rtg_e( 'intro_title' ); ?></h2>
        <?php rtg_e( 'intro_text' ); ?>
        <div class="about__btns">
          <a href="<?php echo esc_url( rtg_f( 'intro_btn_url' ) ); ?>" class="btn btn--navy"><?php rtg_e( 'intro_btn_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
          <a href="<?php echo esc_url( rtg_f( 'intro_tel' ) ); ?>" class="link-phone"><span><svg><use href="#i-phone"/></svg></span><?php rtg_e( 'intro_phone' ); ?></a>
        </div>
      </div>
      <div class="intro__media reveal">
        <div class="intro__img"><img src="<?php echo esc_url( rtg_f( 'intro_image' ) ); ?>" alt="<?php echo rtg_attr( rtg_f( 'intro_image_alt' ) ); ?>" loading="lazy"></div>
        <div class="intro__badge">
          <strong><?php rtg_e( 'intro_badge_num' ); ?></strong>
          <span><?php rtg_e( 'intro_badge_text' ); ?></span>
        </div>
      </div>
    </div>

    <div class="shops">
<?php foreach ( rtg_items( 'shops' ) as $rtg_i => $rtg_shop ) : ?>
      <article class="shop reveal">
        <span class="shop__num"><?php echo esc_html( sprintf( '%02d', $rtg_i + 1 ) ); ?></span>
        <div class="shop__ic"><svg><use href="#i-<?php echo rtg_attr( $rtg_shop['icon'] ); ?>"/></svg></div>
        <h3><?php echo $rtg_shop['title']; ?></h3>
        <p><?php echo $rtg_shop['text']; ?></p>
      </article>
<?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== Featured capabilities ===== -->
<section class="section featured" id="featured">
  <div class="container">
    <div class="sec-head sec-head--row reveal">
      <div>
        <span class="eyebrow"><?php rtg_e( 'feat_tag' ); ?></span>
        <h2><?php rtg_e( 'feat_title' ); ?></h2>
      </div>
      <a href="<?php echo esc_url( rtg_f( 'feat_btn_url' ) ); ?>" class="btn btn--navy"><?php rtg_e( 'feat_btn_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
    </div>

    <div class="fgrid">
<?php foreach ( rtg_items( 'features' ) as $rtg_i => $rtg_feat ) : ?>
      <a href="<?php echo esc_url( $rtg_feat['url'] ); ?>" class="fcard reveal" data-tab="<?php echo rtg_attr( $rtg_feat['tab'] ); ?>">
        <img src="<?php echo esc_url( $rtg_feat['image'] ); ?>" alt="<?php echo rtg_attr( $rtg_feat['alt'] ); ?>" loading="lazy">
        <span class="fcard__num"><?php echo esc_html( sprintf( '%02d', $rtg_i + 1 ) ); ?></span>
        <div class="fcard__body">
          <span class="fcard__tag"><?php echo $rtg_feat['tag']; ?></span>
          <h3><?php echo $rtg_feat['title']; ?></h3>
          <span class="fcard__more"><?php echo $rtg_feat['more']; ?> <svg><use href="#i-arrow"/></svg></span>
        </div>
      </a>
<?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== Upfitting ===== -->
<section class="upfit">
  <div class="upfit__bg" style="background-image:url(<?php echo esc_url( rtg_f( 'upfit_bg' ) ); ?>)"></div>
  <div class="container upfit__in upfit__in--video">
    <div class="vplayer vplayer--dark reveal" data-vimeo="<?php echo rtg_attr( rtg_f( 'upfit_video_id' ) ); ?>" data-h="<?php echo rtg_attr( rtg_f( 'upfit_video_hash' ) ); ?>" data-title="<?php echo rtg_attr( rtg_f( 'upfit_video_title' ) ); ?>">
      <img src="<?php echo esc_url( rtg_f( 'upfit_poster' ) ); ?>" alt="" loading="lazy">
      <button type="button" class="vplayer__play" aria-label="Play video: <?php echo rtg_attr( rtg_f( 'upfit_video_title' ) ); ?>"><svg><use href="#i-play"/></svg></button>
      <div class="vplayer__cap">
        <span class="vplayer__tag"><span class="vplayer__dot"></span>Watch</span>
        <strong><?php rtg_e( 'upfit_video_title' ); ?></strong>
      </div>
    </div>
    <div class="upfit__card reveal">
      <span class="eyebrow eyebrow--light"><?php rtg_e( 'upfit_tag' ); ?></span>
      <h2><?php rtg_e( 'upfit_title' ); ?></h2>
      <?php rtg_e( 'upfit_text' ); ?>
      <div class="upfit__chips">
<?php foreach ( rtg_items( 'upfit_chips' ) as $rtg_chip ) : ?>
        <span><svg><use href="#i-check"/></svg><?php echo $rtg_chip['text']; ?></span>
<?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ===== Measurements Matter ===== -->
<section class="section measure" id="measure">
  <div class="container measure__grid">
    <div class="measure__copy reveal">
      <span class="eyebrow"><?php rtg_e( 'measure_tag' ); ?></span>
      <h2><?php rtg_e( 'measure_title' ); ?></h2>
      <p><?php rtg_e( 'measure_text' ); ?></p>
      <ul class="factors" aria-label="Factors to consider">
<?php foreach ( rtg_items( 'measure_factors' ) as $rtg_factor ) : ?>
        <li><?php echo $rtg_factor['text']; ?></li>
<?php endforeach; ?>
      </ul>
      <p><?php rtg_e( 'measure_text2' ); ?></p>
      <div class="about__btns">
        <a href="<?php echo esc_url( rtg_f( 'measure_btn1_url' ) ); ?>" class="btn btn--red"><?php rtg_e( 'measure_btn1_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
        <a href="<?php echo esc_url( rtg_f( 'measure_btn2_url' ) ); ?>" class="btn btn--navy" target="_blank" rel="noopener"><?php rtg_e( 'measure_btn2_text' ); ?></a>
      </div>
    </div>
    <div class="diagram reveal" id="diagram" data-dim="ca" data-axle="single">
      <div class="diagram__bar">
        <div class="seg" role="group" aria-label="Measurement">
          <button type="button" class="seg__btn is-active" data-dim="ca" aria-pressed="true"><span class="ca-lbl">Cab-to-Axle (CA)</span></button>
          <button type="button" class="seg__btn" data-dim="wb" aria-pressed="false">Wheelbase (WB)</button>
        </div>
        <div class="seg seg--sm" role="group" aria-label="Rear axle">
          <button type="button" class="seg__btn is-active" data-axle="single" aria-pressed="true">Single axle</button>
          <button type="button" class="seg__btn" data-axle="tandem" aria-pressed="false">Tandem</button>
        </div>
      </div>

      <svg class="truck" viewBox="0 0 900 400" role="img" aria-labelledby="truckTitle">
        <title id="truckTitle">Truck side profile showing cab-to-axle and wheelbase dimensions</title>
        <defs>
          <pattern id="grid" width="30" height="30" patternUnits="userSpaceOnUse"><path d="M30 0H0V30" fill="none" class="truck__grid"/></pattern>
          <marker id="arr" viewBox="0 0 10 10" refX="5" refY="5" markerWidth="7" markerHeight="7" orient="auto-start-reverse"><path d="M0 0 10 5 0 10z" fill="#9aa3b8"/></marker>
          <marker id="arrOn" viewBox="0 0 10 10" refX="5" refY="5" markerWidth="7" markerHeight="7" orient="auto-start-reverse"><path d="M0 0 10 5 0 10z" fill="#BD1539"/></marker>
        </defs>
        <rect width="900" height="400" fill="url(#grid)"/>
        <line x1="10" y1="330" x2="890" y2="330" class="truck__ground"/>

        <!-- body outline -->
        <g class="truck__body">
          <rect x="304" y="118" width="540" height="110" rx="6"/>
          <text x="574" y="180" text-anchor="middle">BODY</text>
        </g>
        <!-- frame -->
        <rect x="40" y="230" width="810" height="16" rx="3" class="truck__frame"/>
        <!-- cab -->
        <path class="truck__cab" d="M30 236V184q2-14 18-16l112-8 18-70q3-8 12-8h88q12 0 12 12v142z"/>
        <path class="truck__win" d="M188 102h76v50h-90z"/>
        <rect x="32" y="196" width="10" height="20" rx="2" class="truck__light"/>
        <rect x="276" y="70" width="8" height="28" rx="3" class="truck__cab"/>

        <!-- wheels -->
        <g class="truck__wheel"><circle cx="125" cy="290" r="40"/><circle cx="125" cy="290" r="15"/></g>
        <g class="axle-single"><g class="truck__wheel"><circle cx="640" cy="290" r="40"/><circle cx="640" cy="290" r="15"/></g></g>
        <g class="axle-tandem">
          <g class="truck__wheel"><circle cx="592" cy="290" r="40"/><circle cx="592" cy="290" r="15"/></g>
          <g class="truck__wheel"><circle cx="688" cy="290" r="40"/><circle cx="688" cy="290" r="15"/></g>
          <path d="M592 290h96" class="truck__trun"/>
        </g>
        <line x1="640" y1="40" x2="640" y2="372" class="truck__center"/>

        <!-- CA / CT dimension -->
        <g class="dim dim--ca" data-dim="ca" tabindex="0" role="button" aria-label="Show cab-to-axle dimension">
          <line x1="290" y1="62" x2="290" y2="230" class="dim__ext"/>
          <line x1="296" y1="62" x2="634" y2="62" class="dim__line"/>
          <rect x="415" y="44" width="90" height="36" rx="18" class="dim__pill"/>
          <text x="460" y="68" text-anchor="middle" class="dim__txt ca-txt">CA</text>
        </g>
        <!-- WB dimension -->
        <g class="dim dim--wb" data-dim="wb" tabindex="0" role="button" aria-label="Show wheelbase dimension">
          <line x1="125" y1="290" x2="125" y2="378" class="dim__ext"/>
          <line x1="131" y1="364" x2="634" y2="364" class="dim__line"/>
          <rect x="337" y="346" width="90" height="36" rx="18" class="dim__pill"/>
          <text x="382" y="370" text-anchor="middle" class="dim__txt">WB</text>
        </g>
      </svg>

      <div class="diagram__info" aria-live="polite">
        <div class="diagram__ic"><svg><use href="#i-ruler"/></svg></div>
        <div>
          <h3 id="dimTitle">Cab-to-axle (CA) dimension</h3>
          <p id="dimText">The distance from the back of the cab to the centerline of the rear axle, this dimension helps determine the length of body that can be mounted on the chassis.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="mvideo reveal">
      <div class="mvideo__head">
        <div>
          <span class="eyebrow"><?php rtg_e( 'mvideo_tag' ); ?></span>
          <h3><?php rtg_e( 'mvideo_title' ); ?></h3>
        </div>
        <p><?php rtg_e( 'mvideo_text' ); ?></p>
      </div>
      <div class="vplayer vplayer--wide" data-vimeo="<?php echo rtg_attr( rtg_f( 'mvideo_id' ) ); ?>" data-h="<?php echo rtg_attr( rtg_f( 'mvideo_hash' ) ); ?>" data-title="<?php echo rtg_attr( rtg_f( 'mvideo_vtitle' ) ); ?>">
        <img src="<?php echo esc_url( rtg_f( 'mvideo_poster' ) ); ?>" alt="" loading="lazy">
        <button type="button" class="vplayer__play" aria-label="Play video: <?php echo rtg_attr( rtg_f( 'mvideo_vtitle' ) ); ?>"><svg><use href="#i-play"/></svg></button>
        <div class="vplayer__cap">
          <span class="vplayer__tag"><span class="vplayer__dot"></span>Watch</span>
          <strong><?php rtg_e( 'mvideo_vtitle' ); ?></strong>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== All capabilities ===== -->
<section class="section all" id="all">
  <div class="container">
    <div class="sec-head sec-head--light reveal">
      <span class="eyebrow eyebrow--light"><?php rtg_e( 'all_tag' ); ?></span>
      <h2><?php rtg_e( 'all_title' ); ?></h2>
      <p><?php rtg_e( 'all_text' ); ?></p>
    </div>

    <div class="all__bar reveal">
      <div class="tabs" role="tablist" aria-label="Capability categories">
        <button type="button" role="tab" class="tab is-active" id="tab-all" aria-selected="true" data-filter="all">All <span class="tab__n" data-n="all"></span></button>
        <button type="button" role="tab" class="tab" id="tab-fabrication" aria-selected="false" data-filter="fabrication"><svg><use href="#i-flame"/></svg>Fabrication <span class="tab__n" data-n="fabrication"></span></button>
        <button type="button" role="tab" class="tab" id="tab-mechanical" aria-selected="false" data-filter="mechanical"><svg><use href="#i-wrench"/></svg>Mechanical <span class="tab__n" data-n="mechanical"></span></button>
      </div>
      <label class="search">
        <span class="sr-only">Search capabilities</span>
        <svg><use href="#i-search"/></svg>
        <input type="search" id="capSearch" placeholder="Search a service…" autocomplete="off">
        <button type="button" class="search__clear" aria-label="Clear search"><svg><use href="#i-x"/></svg></button>
      </label>
    </div>

    <ul class="caps" id="caps" role="tabpanel" aria-labelledby="tab-all">
<?php foreach ( rtg_items( 'caps' ) as $rtg_cap ) : ?>
      <li data-cat="<?php echo rtg_attr( $rtg_cap['cat'] ); ?>"><?php echo $rtg_cap['text']; ?></li>
<?php endforeach; ?>
    </ul>
    <p class="caps__empty" id="capsEmpty" hidden><?php rtg_e( 'all_empty' ); ?></p>
  </div>
</section>

<!-- ===== CTA band ===== -->
<section class="cta">
  <div class="container cta__in reveal">
    <div class="cta__copy">
      <span class="eyebrow eyebrow--light"><?php rtg_e( 'cta_tag' ); ?></span>
      <h2><?php rtg_e( 'cta_title' ); ?></h2>
      <p><?php rtg_e( 'cta_text' ); ?></p>
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
    <div class="divisions__logos">
<?php foreach ( rtg_items( 'divisions' ) as $rtg_div ) : ?>
      <a href="<?php echo esc_url( $rtg_div['url'] ); ?>" class="dlogo reveal"><img src="<?php echo esc_url( $rtg_div['logo'] ); ?>" alt="<?php echo rtg_attr( $rtg_div['name'] ); ?>"><span><?php echo $rtg_div['cta']; ?> <svg><use href="#i-arrow"/></svg></span></a>
<?php endforeach; ?>
    </div>
    <div class="locs">
<?php foreach ( rtg_items( 'locs' ) as $rtg_loc ) : ?>
      <div class="loc reveal">
        <span class="loc__ic"><svg><use href="#i-pin"/></svg></span>
        <h3><?php echo $rtg_loc['name']; ?></h3>
        <address><?php echo $rtg_loc['address']; ?></address>
        <a href="<?php echo esc_url( $rtg_loc['tel'] ); ?>"><svg><use href="#i-phone"/></svg><?php echo $rtg_loc['phone']; ?></a>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>

</main>

<?php get_template_part( 'parts/footer', 'classic' ); ?>
<?php
get_footer();

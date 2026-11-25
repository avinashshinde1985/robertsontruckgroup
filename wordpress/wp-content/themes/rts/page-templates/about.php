<?php
/**
 * Template Name: About Us
 *
 * Converted from rts/about.html.
 *
 * @package RTS
 */

rtg_page(
	array(
		'title'       => 'About Us | Robertson Truck Sales – Mount Vernon, Ohio Since 1984',
		'description' => 'Founded in 1984 by Phil Robertson in Mount Vernon, Ohio, Robertson Truck Sales grew from 3 trucks to well over 200. Specializing in body upfitting and fabrication. Meet our team and visit our locations.',
		'body_class'  => 'page-about',
		'styles'      => array( 'css/style.css', 'css/inner.css', 'css/about.css', 'css/dark.css', 'css/chat.css' ),
		'scripts'     => array(
			'js/main.js',
			'js/video.js',
			'js/about.js',
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

rtg_fields_for( 'about' );

// Call link from a phone number as shown ("740-397-4969" -> tel:7403974969).
$tel = static function ( $phone ) {
	return esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', wp_strip_all_tags( $phone ) ) );
};

get_header();
?>
<!-- SVG icon sprite -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></symbol>
  <symbol id="i-mail" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></g></symbol>
  <symbol id="i-pin" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></g></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></symbol>
  <symbol id="i-check" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M20 6 9 17l-5-5"/></symbol>
  <symbol id="i-wrench" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.8-3.8a6 6 0 0 1-7.9 7.9l-6.9 6.9a2.1 2.1 0 0 1-3-3l6.9-6.9a6 6 0 0 1 7.9-7.9z"/></symbol>
  <symbol id="i-truck" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2M15 18H9M19 18h2a1 1 0 0 0 1-1v-3.6a1 1 0 0 0-.2-.6l-3.5-4.4A1 1 0 0 0 17.5 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></g></symbol>
  <symbol id="i-award" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.5 12.9 17 22l-5-3-5 3 1.5-9.1"/></g></symbol>
  <symbol id="i-dollar" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2.5"/><path d="M6 12h.01M18 12h.01"/></g></symbol>
  <symbol id="i-shield" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></g></symbol>
  <symbol id="i-chev" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6"/></symbol>
  <symbol id="i-play" viewBox="0 0 24 24"><path fill="currentColor" d="M8 5.5v13a1 1 0 0 0 1.5.86l10.6-6.5a1 1 0 0 0 0-1.72L9.5 4.64A1 1 0 0 0 8 5.5z"/></symbol>
  <symbol id="i-users" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8"/></g></symbol>
  <symbol id="i-heart" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M19 14c1.5-1.5 3-3.2 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.8 0-3 .5-4.5 2-1.5-1.5-2.7-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4 3 5.5l7 7z"/></symbol>
  <symbol id="i-flag" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><path d="M4 22v-7"/></g></symbol>
  <symbol id="i-nav" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="m3 11 19-9-9 19-2-8z"/></symbol>
  <symbol id="i-quote" viewBox="0 0 24 24"><path fill="currentColor" d="M4 21c3 0 7-1 7-8V5c0-1.3-.8-2-2-2H5c-1.3 0-2 .8-2 2v6c0 1.3.8 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 0-1 1v2c0 1 0 1 1 1zm11 0c3 0 7-1 7-8V5c0-1.3-.8-2-2-2h-4c-1.3 0-2 .8-2 2v6c0 1.3.8 2 2 2h.8c0 2.3.2 4-2.8 4v3c0 1 0 1 1 1z"/></symbol>
</svg>

<a class="skip" href="#main">Skip to content</a>

<?php get_template_part( 'parts/nav', 'classic', array( 'active' => rtg_url( 'rts', 'about' ) ) ); ?>

<main id="main">

<!-- ===== Page hero ===== -->
<section class="hero hero--inner">
  <div class="hero__slides" aria-hidden="true">
<?php foreach ( rtg_items( 'hero_slides' ) as $i => $slide ) : ?>
    <div class="hero__slide<?php echo 0 === $i ? ' is-active' : ''; ?>" style="background-image:url(<?php echo esc_url( $slide['image'] ); ?>)"></div>
<?php endforeach; ?>
  </div>
  <div class="hero__shade"></div>

  <div class="container hero__in">
    <div class="hero__copy">
      <nav class="crumbs" aria-label="Breadcrumb">
        <a href="<?php rtg_u( 'rts', '' ); ?>">Home</a><svg><use href="#i-chev"/></svg><span aria-current="page">About Us</span>
      </nav>
      <h1><?php rtg_e( 'hero_title' ); ?></h1>
      <p class="hero__lead"><?php rtg_e( 'hero_lead' ); ?></p>
      <div class="hero__btns">
        <a href="<?php echo esc_url( rtg_f( 'hero_btn1_url' ) ); ?>" class="btn btn--red btn--lg"><?php rtg_e( 'hero_btn1_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
        <a href="<?php echo esc_url( rtg_f( 'hero_btn2_url' ) ); ?>" class="btn btn--glass btn--lg"><?php rtg_e( 'hero_btn2_text' ); ?></a>
      </div>
    </div>

    <div class="since glass-card">
      <div class="since__head">
        <img src="<?php rtg_a( 'images/rts-emblem.svg' ); ?>" alt="" width="48" height="48">
        <div>
          <small><?php rtg_e( 'since_label' ); ?></small>
          <strong><?php rtg_e( 'since_year' ); ?></strong>
        </div>
      </div>
      <p><?php rtg_e( 'since_text' ); ?></p>
      <div class="grow" id="grow">
        <div class="grow__row">
          <span><?php rtg_e( 'since_from_label' ); ?></span>
          <div class="grow__bar"><i style="--w:<?php echo rtg_attr( rtg_f( 'since_from_width' ) ); ?>"></i></div>
          <b><?php rtg_e( 'since_from_value' ); ?></b>
        </div>
        <div class="grow__row grow__row--now">
          <span><?php rtg_e( 'since_now_label' ); ?></span>
          <div class="grow__bar"><i style="--w:<?php echo rtg_attr( rtg_f( 'since_now_width' ) ); ?>"></i></div>
          <b><?php rtg_e( 'since_now_value' ); ?></b>
        </div>
      </div>
    </div>
  </div>

  <div class="hero__dots" id="heroDots" role="tablist" aria-label="Hero slides"></div>
  <a href="#what" class="hero__scroll" aria-label="Scroll down"><span></span></a>
</section>

<!-- ===== Stats ===== -->
<section class="stats">
  <div class="container stats__grid">
<?php foreach ( rtg_items( 'stats' ) as $stat ) : ?>
    <div class="stat reveal"><strong><?php if ( '' !== trim( $stat['animate'] ) ) : ?><span data-count="<?php echo rtg_attr( $stat['num'] ); ?>">0</span><?php else : ?><?php echo $stat['num']; ?><?php endif; ?><?php echo $stat['suffix']; ?></strong><span><?php echo $stat['label']; ?></span></div>
<?php endforeach; ?>
  </div>
</section>

<!-- ===== What we do ===== -->
<section class="section what" id="what">
  <div class="container what__grid">
    <div class="what__copy reveal">
      <span class="eyebrow"><?php rtg_e( 'what_eyebrow' ); ?></span>
      <h2><?php rtg_e( 'what_title' ); ?></h2>
      <?php rtg_e( 'what_text' ); ?>
      <ul class="checks">
<?php foreach ( rtg_items( 'what_checks' ) as $check ) : ?>
        <li><svg><use href="#i-check"/></svg><?php echo $check['text']; ?></li>
<?php endforeach; ?>
      </ul>
      <div class="about__btns">
        <a href="<?php echo esc_url( rtg_f( 'what_btn_url' ) ); ?>" class="btn btn--navy"><?php rtg_e( 'what_btn_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
        <a href="<?php echo $tel( rtg_f( 'what_phone' ) ); ?>" class="link-phone"><span><svg><use href="#i-phone"/></svg></span><?php rtg_e( 'what_phone' ); ?></a>
      </div>
    </div>
    <div class="what__media reveal">
      <div class="vplayer" data-vimeo="<?php echo rtg_attr( rtg_f( 'what_video' ) ); ?>" data-title="<?php echo rtg_attr( rtg_f( 'what_video_title' ) ); ?>">
        <img src="<?php echo esc_url( rtg_f( 'what_poster' ) ); ?>" alt="" loading="lazy">
        <button type="button" class="vplayer__play" aria-label="Play video: <?php echo rtg_attr( rtg_f( 'what_video_cap' ) ); ?>"><svg><use href="#i-play"/></svg></button>
        <div class="vplayer__cap">
          <span class="vplayer__tag"><span class="vplayer__dot"></span><?php rtg_e( 'what_video_tag' ); ?></span>
          <strong><?php rtg_e( 'what_video_cap' ); ?></strong>
        </div>
      </div>
      <div class="what__badge">
        <span class="what__badge-ic"><svg><use href="#i-flag"/></svg></span>
        <div><strong><?php rtg_e( 'what_badge_title' ); ?></strong><span><?php rtg_e( 'what_badge_text' ); ?></span></div>
      </div>
    </div>
  </div>
</section>

<!-- ===== Journey timeline ===== -->
<section class="section journey" id="journey">
  <div class="container">
    <div class="sec-head reveal">
      <span class="eyebrow"><?php rtg_e( 'journey_eyebrow' ); ?></span>
      <h2><?php rtg_e( 'journey_title' ); ?></h2>
    </div>
    <ol class="tl" id="timeline">
<?php foreach ( rtg_items( 'journey' ) as $step ) : ?>
      <li class="tl__item">
        <span class="tl__dot"><svg><use href="#i-<?php echo rtg_attr( $step['icon'] ); ?>"/></svg></span>
        <span class="tl__year"><?php echo $step['year']; ?></span>
        <h3><?php echo $step['title']; ?></h3>
        <p><?php echo $step['text']; ?></p>
      </li>
<?php endforeach; ?>
    </ol>
  </div>
</section>

<!-- ===== Clients not customers ===== -->
<section class="clients">
  <div class="clients__bg" style="background-image:url(<?php echo esc_url( rtg_f( 'clients_bg' ) ); ?>)"></div>
  <div class="container clients__in">
    <div class="clients__copy reveal">
      <span class="eyebrow eyebrow--light"><?php rtg_e( 'clients_eyebrow' ); ?></span>
      <h2><?php rtg_e( 'clients_title' ); ?></h2>
      <?php rtg_e( 'clients_text' ); ?>
      <a href="<?php echo esc_url( rtg_f( 'clients_btn_url' ) ); ?>" class="btn btn--red"><?php rtg_e( 'clients_btn_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
    </div>
    <div class="clients__side">
      <blockquote class="quote reveal">
        <svg class="quote__ic"><use href="#i-quote"/></svg>
        <p><?php rtg_e( 'clients_quote' ); ?></p>
        <footer><?php rtg_e( 'clients_quote_by' ); ?></footer>
      </blockquote>
      <div class="pillars">
<?php foreach ( rtg_items( 'clients_pillars' ) as $pillar ) : ?>
        <div class="pillar reveal"><span><svg><use href="#i-<?php echo rtg_attr( $pillar['icon'] ); ?>"/></svg></span><strong><?php echo $pillar['title']; ?></strong></div>
<?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ===== Team ===== -->
<section class="section team" id="team">
  <div class="container container--team">
    <div class="sec-head sec-head--row reveal">
      <div>
        <span class="eyebrow"><?php rtg_e( 'team_eyebrow' ); ?></span>
        <h2><?php rtg_e( 'team_title' ); ?></h2>
      </div>
      <div class="chips" role="group" aria-label="Filter team">
        <button type="button" class="chip is-active" data-filter="all" aria-pressed="true">All</button>
        <button type="button" class="chip" data-filter="leadership" aria-pressed="false">Leadership</button>
        <button type="button" class="chip" data-filter="sales" aria-pressed="false">Sales</button>
        <button type="button" class="chip" data-filter="hr" aria-pressed="false">HR</button>
      </div>
    </div>

    <div class="tgrid" id="tgrid">
<?php foreach ( rtg_items( 'team' ) as $member ) : ?>
      <article class="tcard reveal" data-group="<?php echo rtg_attr( $member['group'] ); ?>">
        <div class="tcard__img"><img src="<?php echo esc_url( $member['photo'] ); ?>" alt="<?php echo rtg_attr( $member['name'] ); ?>" width="262" height="275" loading="lazy"></div>
        <div class="tcard__body">
          <span class="tcard__role"><?php echo $member['role']; ?></span>
          <h3><?php echo $member['name']; ?></h3>
<?php if ( '' !== trim( $member['email'] ) ) : ?>
          <a href="<?php echo esc_url( 'mailto:' . wp_strip_all_tags( $member['email'] ) ); ?>" class="tcard__mail"><svg><use href="#i-mail"/></svg><span><?php echo $member['email']; ?></span></a>
<?php endif; ?>
        </div>
      </article>
<?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== Locations ===== -->
<?php
$locations = rtg_items( 'locations' );
$first_loc = $locations ? $locations[0] : array( 'name' => '', 'phone' => '', 'dir' => '', 'map' => '' );
?>
<section class="section where" id="locations">
  <div class="container">
    <div class="sec-head reveal">
      <span class="eyebrow"><?php rtg_e( 'loc_eyebrow' ); ?></span>
      <h2><?php rtg_e( 'loc_title' ); ?></h2>
    </div>

    <div class="where__grid reveal">
      <div class="where__list" role="tablist" aria-label="Locations">
<?php foreach ( $locations as $i => $loc ) : ?>
        <button type="button" role="tab" class="wloc<?php echo 0 === $i ? ' is-active' : ''; ?>" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>"
          data-map="<?php echo esc_url( $loc['map'] ); ?>"
          data-dir="<?php echo rtg_attr( $loc['dir'] ); ?>">
          <span class="wloc__ic"><svg><use href="#i-pin"/></svg></span>
          <span class="wloc__txt">
            <strong><?php echo $loc['name']; ?></strong>
            <span><?php echo $loc['address']; ?></span>
            <em><?php echo $loc['phone']; ?></em>
          </span>
        </button>
<?php endforeach; ?>
      </div>

      <div class="where__map">
        <iframe id="mapFrame" title="Map: <?php echo rtg_attr( $first_loc['name'] ); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen
          src="<?php echo esc_url( $first_loc['map'] ); ?>"></iframe>
        <div class="where__actions">
          <a href="<?php echo $tel( $first_loc['phone'] ); ?>" class="btn btn--white btn--sm" id="mapCall"><svg><use href="#i-phone"/></svg><span><?php echo $first_loc['phone']; ?></span></a>
          <a href="https://www.google.com/maps/dir/?api=1&amp;destination=<?php echo rawurlencode( wp_strip_all_tags( html_entity_decode( $first_loc['dir'] ) ) ); ?>" target="_blank" rel="noopener" class="btn btn--red btn--sm" id="mapDir"><svg><use href="#i-nav"/></svg><?php rtg_e( 'loc_dir_text' ); ?></a>
        </div>
      </div>
    </div>
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
      <a href="<?php echo $tel( rtg_f( 'cta_phone' ) ); ?>" class="cta__phone"><svg><use href="#i-phone"/></svg><?php rtg_e( 'cta_phone' ); ?></a>
      <a href="<?php echo esc_url( rtg_f( 'cta_btn_url' ) ); ?>" class="btn btn--white"><?php rtg_e( 'cta_btn_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>

<!-- ===== Divisions ===== -->
<section class="section divisions">
  <div class="container">
    <div class="sec-head reveal">
      <span class="eyebrow"><?php rtg_e( 'div_eyebrow' ); ?></span>
      <img class="divisions__rtg" src="<?php echo esc_url( rtg_f( 'div_logo' ) ); ?>" alt="Robertson Truck Group" width="280" height="82">
    </div>
    <div class="divisions__logos" style="margin-bottom:0">
<?php foreach ( rtg_items( 'divisions' ) as $division ) : ?>
      <a href="<?php echo esc_url( $division['url'] ); ?>" class="dlogo reveal"><img src="<?php echo esc_url( $division['logo'] ); ?>" alt="<?php echo rtg_attr( $division['name'] ); ?>"><span><?php rtg_e( 'div_cta' ); ?> <svg><use href="#i-arrow"/></svg></span></a>
<?php endforeach; ?>
    </div>
  </div>
</section>

</main>

<?php get_template_part( 'parts/footer', 'classic' ); ?>
<?php
get_footer();

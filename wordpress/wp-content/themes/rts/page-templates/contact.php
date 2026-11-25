<?php
/**
 * Template Name: Contact Us
 *
 * Converted from rts/contact.html.
 *
 * @package RTS
 */

rtg_page(
	array(
		'title'       => 'Contact Us | Robertson Truck Sales – Mount Vernon, Ohio',
		'description' => 'Contact Robertson Truck Sales in Mount Vernon, Ohio. Call 740-397-4969 or send a message to our sales, office, paint & detail, mechanical or fabrication & upfitting departments. Careers at Robertson Truck Group.',
		'body_class'  => 'page-contact',
		'styles'      => array( 'css/style.css', 'css/inner.css', 'css/contact.css', 'css/dark.css', 'css/chat.css' ),
		'scripts'     => array(
			'js/main.js',
			'js/contact.js',
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

rtg_fields_for( 'contact' );

// Call link from a phone number as shown ("740-397-4969" -> tel:7403974969).
$tel = static function ( $phone ) {
	return esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', wp_strip_all_tags( $phone ) ) );
};
// Google Maps directions link to the "Directions destination" field.
$directions = 'https://www.google.com/maps/dir/?api=1&amp;destination=' . rawurlencode( wp_strip_all_tags( html_entity_decode( rtg_f( 'info_dir' ) ) ) );

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
  <symbol id="i-dollar" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2.5"/><path d="M6 12h.01M18 12h.01"/></g></symbol>
  <symbol id="i-chev" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6"/></symbol>
  <symbol id="i-brush" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m14.6 3.4 6 6L11 19a2.8 2.8 0 0 1-4-4z"/><path d="M7 15c-2 0-3 1.5-3 3s-1 2.5-2 3c3 1 7 0 7-3"/></g></symbol>
  <symbol id="i-flame" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.4-.5-2-1-3-1.1-2.1-.2-4.1 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.2.4-2.3 1-3.4.3 1.6 1.4 2.9 2.5 2.9z"/></symbol>
  <symbol id="i-chat" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></symbol>
  <symbol id="i-file" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M8 13h8M8 17h5"/></g></symbol>
  <symbol id="i-send" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="m22 2-7 20-4-9-9-4zM22 2 11 13"/></symbol>
  <symbol id="i-nav" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="m3 11 19-9-9 19-2-8z"/></symbol>
  <symbol id="i-brief" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></g></symbol>
  <symbol id="i-ext" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M15 3h6v6M10 14 21 3M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></symbol>
</svg>

<a class="skip" href="#main">Skip to content</a>

<?php get_template_part( 'parts/nav', 'classic', array( 'active' => rtg_url( 'rts', 'contact' ) ) ); ?>

<main id="main">

<!-- ===== Page hero ===== -->
<?php $slides = rtg_items( 'hero_slides' ); ?>
<section class="hero hero--inner hero--contact">
  <div class="hero__slides" aria-hidden="true">
<?php foreach ( $slides as $i => $slide ) : ?>
    <div class="hero__slide<?php echo 0 === $i ? ' is-active' : ''; ?>" style="background-image:url(<?php echo esc_url( $slide['image'] ); ?>)" data-caption="<?php echo rtg_attr( $slide['caption'] ); ?>"></div>
<?php endforeach; ?>
  </div>
  <div class="hero__shade"></div>

  <div class="container hero__in">
    <div class="hero__copy">
      <nav class="crumbs" aria-label="Breadcrumb">
        <a href="<?php rtg_u( 'rts', '' ); ?>">Home</a><svg><use href="#i-chev"/></svg><span aria-current="page">Contact Us</span>
      </nav>
      <h1><?php rtg_e( 'hero_title' ); ?></h1>
      <p class="hero__lead ticker" aria-live="polite"><span class="ticker__dot"></span><span id="ticker"><?php echo $slides ? $slides[0]['caption'] : ''; ?></span></p>
      <div class="hero__btns">
        <a href="<?php echo esc_url( rtg_f( 'hero_btn_url' ) ); ?>" class="btn btn--red btn--lg"><?php rtg_e( 'hero_btn_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
        <a href="<?php echo $tel( rtg_f( 'phone' ) ); ?>" class="btn btn--glass btn--lg"><svg><use href="#i-phone"/></svg><?php rtg_e( 'phone' ); ?></a>
      </div>
    </div>

    <div class="reach glass-card">
      <div class="reach__head">
        <img src="<?php rtg_a( 'images/rts-emblem.svg' ); ?>" alt="" width="44" height="44">
        <div>
          <strong><?php rtg_e( 'reach_title' ); ?></strong>
          <span><?php rtg_e( 'reach_text' ); ?></span>
        </div>
      </div>
      <a href="<?php echo $tel( rtg_f( 'phone' ) ); ?>" class="reach__row">
        <span class="reach__ic"><svg><use href="#i-phone"/></svg></span>
        <span><small><?php rtg_e( 'reach_call_label' ); ?></small><b><?php rtg_e( 'phone' ); ?></b></span>
        <svg class="reach__go"><use href="#i-chev"/></svg>
      </a>
      <a href="#form" class="reach__row">
        <span class="reach__ic"><svg><use href="#i-chat"/></svg></span>
        <span><small><?php rtg_e( 'reach_msg_label' ); ?></small><b><?php rtg_e( 'reach_msg_value' ); ?></b></span>
        <svg class="reach__go"><use href="#i-chev"/></svg>
      </a>
      <a href="<?php echo $directions; ?>" target="_blank" rel="noopener" class="reach__row">
        <span class="reach__ic"><svg><use href="#i-pin"/></svg></span>
        <span><small><?php rtg_e( 'reach_visit_label' ); ?></small><b><?php rtg_e( 'reach_visit_value' ); ?></b></span>
        <svg class="reach__go"><use href="#i-chev"/></svg>
      </a>
    </div>
  </div>

  <div class="hero__dots" id="heroDots" role="tablist" aria-label="Hero slides"></div>
  <a href="#form" class="hero__scroll" aria-label="Scroll down"><span></span></a>
</section>

<!-- ===== Quick dial strip ===== -->
<section class="stats dial">
  <div class="container dial__grid">
<?php foreach ( rtg_items( 'dial' ) as $card ) : ?>
    <a href="<?php echo $tel( $card['phone'] ); ?>" class="dcard reveal">
      <span class="dcard__ic"><svg><use href="#i-<?php echo rtg_attr( $card['icon'] ); ?>"/></svg></span>
      <span class="dcard__txt"><small><?php echo $card['name']; ?></small><b><?php echo $card['phone']; ?></b></span>
    </a>
<?php endforeach; ?>
  </div>
</section>

<!-- ===== Contact form ===== -->
<section class="section reachout" id="form">
  <div class="container reachout__grid">
    <div class="formcard reveal">
      <div class="formcard__head">
        <span class="eyebrow"><?php rtg_e( 'form_eyebrow' ); ?></span>
        <h2><?php rtg_e( 'form_title' ); ?></h2>
        <p><?php rtg_e( 'form_intro' ); ?></p>
      </div>

      <form class="cform" id="cform" action="#" method="post" novalidate>
        <fieldset class="dept">
          <legend>Department <span class="req">*</span></legend>
          <div class="dept__grid">
            <label class="dept__opt"><input type="radio" name="Department" value="General Inquiry" required checked><span><svg><use href="#i-chat"/></svg>General Inquiry</span></label>
            <label class="dept__opt"><input type="radio" name="Department" value="Office/Accounting"><span><svg><use href="#i-file"/></svg>Office / Accounting</span></label>
            <label class="dept__opt"><input type="radio" name="Department" value="Paint &amp; Detail"><span><svg><use href="#i-brush"/></svg>Paint &amp; Detail</span></label>
            <label class="dept__opt"><input type="radio" name="Department" value="Mechanical"><span><svg><use href="#i-wrench"/></svg>Mechanical</span></label>
            <label class="dept__opt"><input type="radio" name="Department" value="Fabrication &amp; Upfitting"><span><svg><use href="#i-flame"/></svg>Fabrication &amp; Upfitting</span></label>
          </div>
        </fieldset>

        <div class="fgrid2">
          <div class="field field--full">
            <input id="f-name" name="fname" type="text" autocomplete="name" placeholder=" " required>
            <label for="f-name">Name <span class="req">*</span></label>
            <small class="field__err">Please enter your name.</small>
          </div>
          <div class="field">
            <input id="f-phone" name="phone" type="tel" autocomplete="tel" inputmode="tel" placeholder=" " required pattern="^\(?\d{3}\)?[\s.\-]?\d{3}[\s.\-]?\d{4}$">
            <label for="f-phone">Phone <span class="req">*</span></label>
            <small class="field__err">Enter a 10-digit phone number.</small>
          </div>
          <div class="field">
            <input id="f-email" name="email-556" type="email" autocomplete="email" placeholder=" " required>
            <label for="f-email">Email <span class="req">*</span></label>
            <small class="field__err">Enter a valid email address.</small>
          </div>
          <div class="field field--full">
            <input id="f-address" name="address" type="text" autocomplete="street-address" placeholder=" " required>
            <label for="f-address">Address <span class="req">*</span></label>
            <small class="field__err">Please enter your address.</small>
          </div>
          <div class="field">
            <input id="f-city" name="city" type="text" autocomplete="address-level2" placeholder=" " required>
            <label for="f-city">City <span class="req">*</span></label>
            <small class="field__err">Please enter your city.</small>
          </div>
          <div class="field-row">
            <div class="field field--select">
              <select id="f-state" name="state" autocomplete="address-level1">
                <option>Alabama</option><option>Alaska</option><option>Arizona</option><option>Arkansas</option><option>California</option><option>Colorado</option><option>Connecticut</option><option>Delaware</option><option>Florida</option><option>Georgia</option><option>Hawaii</option><option>Idaho</option><option>Illinois</option><option>Indiana</option><option>Iowa</option><option>Kansas</option><option>Kentucky</option><option>Louisiana</option><option>Maine</option><option>Maryland</option><option>Massachusetts</option><option>Michigan</option><option>Minnesota</option><option>Mississippi</option><option>Missouri</option><option>Montana</option><option>Nebraska</option><option>Nevada</option><option>New Hampshire</option><option>New Jersey</option><option>New Mexico</option><option>New York</option><option>North Carolina</option><option>North Dakota</option><option selected>Ohio</option><option>Oklahoma</option><option>Oregon</option><option>Pennsylvania</option><option>Rhode Island</option><option>South Carolina</option><option>South Dakota</option><option>Tennessee</option><option>Texas</option><option>Utah</option><option>Vermont</option><option>Virginia</option><option>Washington</option><option>West Virginia</option><option>Wisconsin</option><option>Wyoming</option>
              </select>
              <label for="f-state">State</label>
              <svg class="field__chev"><use href="#i-chev"/></svg>
            </div>
            <div class="field">
              <input id="f-zip" name="zipcode" type="text" inputmode="numeric" autocomplete="postal-code" maxlength="5" placeholder=" " pattern="^\d{5}$">
              <label for="f-zip">Zip Code</label>
              <small class="field__err">5 digits.</small>
            </div>
          </div>
          <div class="field field--full field--area">
            <textarea id="f-msg" name="message" rows="5" maxlength="1000" placeholder=" " required></textarea>
            <label for="f-msg">Message <span class="req">*</span></label>
            <small class="field__err">Please tell us how we can help.</small>
            <span class="field__count"><span id="msgCount">0</span>/1000</span>
          </div>
        </div>

        <div class="cform__foot">
          <p class="cform__note"><svg><use href="#i-check"/></svg>Sending to: <b id="deptOut">General Inquiry</b></p>
          <button type="submit" class="btn btn--red btn--lg cform__btn"><span><?php rtg_e( 'form_submit' ); ?></span><svg><use href="#i-send"/></svg></button>
        </div>
      </form>

      <div class="sent" id="sent" hidden tabindex="-1">
        <div class="sent__ic"><svg><use href="#i-check"/></svg></div>
        <h3><?php rtg_e( 'form_sent_title' ); ?></h3>
        <p>Thanks, <b id="sentName">there</b>. Your message is on its way to our <b id="sentDept">General Inquiry</b> team — we'll be in touch soon. Need us sooner? Call <a href="<?php echo $tel( rtg_f( 'phone' ) ); ?>"><?php rtg_e( 'phone' ); ?></a>.</p>
        <button type="button" class="btn btn--navy" id="sentAgain"><?php rtg_e( 'form_sent_again' ); ?></button>
      </div>
    </div>

    <aside class="info reveal" aria-label="Contact details">
      <div class="info__card">
        <span class="eyebrow eyebrow--light"><?php rtg_e( 'info_eyebrow' ); ?></span>
        <h3><?php rtg_e( 'info_title' ); ?></h3>
        <ul class="info__list">
          <li><span class="info__ic"><svg><use href="#i-pin"/></svg></span><span><?php rtg_e( 'info_address' ); ?></span></li>
          <li><span class="info__ic"><svg><use href="#i-phone"/></svg></span><a href="<?php echo $tel( rtg_f( 'phone' ) ); ?>"><?php rtg_e( 'phone' ); ?></a></li>
        </ul>
        <div class="info__map">
          <iframe title="Map: <?php echo rtg_attr( rtg_f( 'info_title' ) ); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen
            src="<?php echo esc_url( rtg_f( 'info_map' ) ); ?>"></iframe>
        </div>
        <a href="<?php echo $directions; ?>" target="_blank" rel="noopener" class="btn btn--white info__btn"><svg><use href="#i-nav"/></svg><?php rtg_e( 'info_dir_text' ); ?></a>
      </div>
      <a href="#careers" class="info__careers">
        <span class="info__ic"><svg><use href="#i-brief"/></svg></span>
        <span><b><?php rtg_e( 'info_careers_title' ); ?></b><small><?php rtg_e( 'info_careers_text' ); ?></small></span>
        <svg class="info__go"><use href="#i-arrow"/></svg>
      </a>
    </aside>
  </div>
</section>

<!-- ===== Careers ===== -->
<section class="careers" id="careers">
  <div class="careers__bg" style="background-image:url(<?php echo esc_url( rtg_f( 'careers_bg' ) ); ?>)"></div>
  <div class="container careers__in">
    <div class="careers__copy reveal">
      <span class="eyebrow eyebrow--light"><?php rtg_e( 'careers_eyebrow' ); ?></span>
      <h2><?php rtg_e( 'careers_title' ); ?></h2>
      <p class="careers__lead"><?php rtg_e( 'careers_lead' ); ?></p>
      <?php rtg_e( 'careers_text' ); ?>
      <p class="careers__thanks"><?php rtg_e( 'careers_thanks' ); ?></p>
      <a href="<?php echo esc_url( rtg_f( 'careers_btn_url' ) ); ?>" target="_blank" rel="noopener" class="btn btn--red btn--lg"><?php rtg_e( 'careers_btn_text' ); ?> <svg><use href="#i-ext"/></svg></a>
    </div>
    <div class="careers__side">
      <div class="perks reveal">
        <h3><?php rtg_e( 'perks_title' ); ?></h3>
        <ul>
<?php foreach ( rtg_items( 'perks' ) as $perk ) : ?>
          <li<?php echo '' !== trim( $perk['wide'] ) ? ' class="perks__wide"' : ''; ?>><svg><use href="#i-check"/></svg><?php echo $perk['text']; ?></li>
<?php endforeach; ?>
        </ul>
      </div>
      <div class="family reveal">
        <h3><?php rtg_e( 'family_title' ); ?></h3>
        <div class="family__list">
<?php foreach ( rtg_items( 'family' ) as $company ) : ?>
          <span><?php echo $company['name']; ?></span>
<?php endforeach; ?>
        </div>
      </div>
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
    <div class="divisions__logos">
<?php foreach ( rtg_items( 'divisions' ) as $division ) : ?>
      <a href="<?php echo esc_url( $division['url'] ); ?>" class="dlogo reveal"><img src="<?php echo esc_url( $division['logo'] ); ?>" alt="<?php echo rtg_attr( $division['name'] ); ?>"><span><?php rtg_e( 'div_cta' ); ?> <svg><use href="#i-arrow"/></svg></span></a>
<?php endforeach; ?>
    </div>
    <div class="locs">
<?php foreach ( rtg_items( 'locs' ) as $loc ) : ?>
      <div class="loc reveal">
        <span class="loc__ic"><svg><use href="#i-pin"/></svg></span>
        <h3><?php echo $loc['name']; ?></h3>
        <address><?php echo $loc['address']; ?></address>
        <a href="<?php echo $tel( $loc['phone'] ); ?>"><svg><use href="#i-phone"/></svg><?php echo $loc['phone']; ?></a>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>

</main>

<?php get_template_part( 'parts/footer', 'classic' ); ?>
<?php
get_footer();

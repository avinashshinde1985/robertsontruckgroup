<?php
/**
 * Template Name: Value My Trade
 *
 * Converted from rts/trade.html.
 *
 * @package RTS
 */

rtg_page(
	array(
		'title'       => 'Value My Trade | Robertson Truck Sales',
		'description' => 'Get a value for your truck trade-in. Add the year, make, model and a few photos and a Robertson Truck Sales rep will follow up.',
		'styles'      => array( 'css/v2.css', 'css/site.css', 'css/chat.css' ),
		'scripts'     => array(
			'js/inventory-data.js',
			array(
				'inline' => <<<'JS'
  (function () {
    var sel = document.getElementById('tYear'), now = new Date().getFullYear() + 1, h = '';
    for (var y = now; y >= 1990; y--) h += '<option>' + y + '</option>';
    sel.insertAdjacentHTML('beforeend', h);
    // Trading toward a specific truck (from the inventory page)
    var stock = new URLSearchParams(location.search).get('for');
    var t = stock && (window.RTS_INVENTORY || []).filter(function (x) { return x.stock === stock; })[0];
    if (t) {
      document.getElementById('tFor').value = t.year + ' ' + t.make + ' ' + t.model + ' (#' + t.stock + ')';
      var c = document.getElementById('forCard'); c.hidden = false;
      c.innerHTML = '<h3>Trading toward</h3><div class="acard__item"><img src="' + t.img + '" alt=""><span><b>' + t.year + ' ' + t.make + ' ' + t.model + '</b><small>$' + t.price.toLocaleString('en-US') + ' · #' + t.stock + '</small></span></div>';
    }
  })();
JS
			),
			'js/chat.js',
			'js/site.js',
			'js/wizard.js',
		),
	)
);

rtg_fields_for( 'trade' );
get_header();
?>
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></symbol>
  <symbol id="i-check" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M20 6 9 17l-5-5"/></symbol>
  <symbol id="i-camera" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></g></symbol>
  <symbol id="i-info" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></g></symbol>
</svg>

<div class="progress" id="progress"></div>

<?php get_template_part( 'parts/nav', 'v2', array( 'active' => rtg_url( 'rts', 'trade' ), 'contact' => 'rts', 'cta_url' => rtg_url( 'rts', 'inventory' ), 'cta_label' => 'View Inventory' ) ); ?>

<main>
  <section class="phead">
    <div class="wrap">
      <nav class="crumb" aria-label="Breadcrumb"><a href="<?php rtg_u( 'rts', '' ); ?>">Home</a>/<span><?php rtg_e( 'head_crumb' ); ?></span></nav>
      <h1><?php rtg_e( 'head_title' ); ?></h1>
      <p><?php rtg_e( 'head_text' ); ?></p>
    </div>
  </section>

  <section class="wizp">
    <div class="wrap wizp__grid">
      <div>
        <form class="wiz" data-kind="trade" data-company="Robertson Truck Sales" novalidate>
          <ol class="steps">
            <li><span>Your truck</span></li>
            <li><span>Photos</span></li>
            <li><span>Contact</span></li>
            <li><span>Review</span></li>
          </ol>

          <!-- Step 1 -->
          <section class="wstep" aria-label="Step 1 of 4: Your truck">
            <h2><?php rtg_e( 'truck_title' ); ?></h2>
            <p><?php rtg_e( 'truck_text' ); ?></p>
            <div class="fgrid fgrid--3">
              <div class="ff">
                <label for="tYear">Year <i>*</i></label>
                <select id="tYear" name="year" required data-label="Year"><option value="">Select</option></select>
                <span class="ff__err">Choose a year</span>
              </div>
              <div class="ff">
                <label for="tMake">Make <i>*</i></label>
                <input id="tMake" name="make" list="makes" required data-label="Make" placeholder="e.g. Freightliner">
                <datalist id="makes"><option>Freightliner</option><option>International</option><option>Kenworth</option><option>Peterbilt</option><option>Mack</option><option>Volvo</option><option>Western Star</option><option>Isuzu</option><option>Hino</option><option>Ford</option><option>Ram</option><option>Chevrolet</option></datalist>
                <span class="ff__err">Enter the make</span>
              </div>
              <div class="ff">
                <label for="tModel">Model <i>*</i></label>
                <input id="tModel" name="model" required data-label="Model" placeholder="e.g. M2 106">
                <span class="ff__err">Enter the model</span>
              </div>
              <div class="ff">
                <label for="tMiles">Mileage</label>
                <input id="tMiles" name="miles" inputmode="numeric" data-label="Mileage" placeholder="e.g. 185,000">
              </div>
              <div class="ff">
                <label for="tType">Truck type</label>
                <select id="tType" name="type" data-label="Truck type">
                  <option value="">Select</option><option>Dump truck</option><option>Box truck</option><option>Flatbed</option><option>Day cab</option><option>Sleeper</option><option>Cab &amp; chassis</option><option>Rollback / wrecker</option><option>Pickup / service truck</option><option>Other</option>
                </select>
              </div>
              <div class="ff">
                <label for="tVin">VIN <small>(optional)</small></label>
                <input id="tVin" name="vin" maxlength="17" pattern="[A-HJ-NPR-Za-hj-npr-z0-9]{17}" data-label="VIN" placeholder="17 characters">
                <span class="ff__err">A VIN has 17 letters and numbers</span>
              </div>
              <div class="ff ff--full">
                <span class="lbl" id="condL">Overall condition <i>*</i></span>
                <div class="seg2" role="radiogroup" aria-labelledby="condL" data-required data-label="Condition">
                  <label><input type="radio" name="cond" value="Excellent"><span>Excellent</span></label>
                  <label><input type="radio" name="cond" value="Good"><span>Good</span></label>
                  <label><input type="radio" name="cond" value="Fair"><span>Fair</span></label>
                  <label><input type="radio" name="cond" value="Needs work"><span>Needs work</span></label>
                </div>
                <span class="ff__err">Pick the closest match</span>
              </div>
              <div class="ff ff--full">
                <label for="tNotes">Anything we should know?</label>
                <textarea id="tNotes" name="notes" data-label="Notes" placeholder="Recent work, body or equipment on it, known issues…"></textarea>
              </div>
              <input type="hidden" name="for" id="tFor" data-label="Trading toward">
            </div>
          </section>

          <!-- Step 2 -->
          <section class="wstep" aria-label="Step 2 of 4: Photos">
            <h2><?php rtg_e( 'photos_title' ); ?></h2>
            <p><?php rtg_e( 'photos_text' ); ?></p>
            <div class="shots">
              <label class="shot" data-required data-label="Front 3/4"><input type="file" accept="image/*" capture="environment" aria-label="Front three-quarter photo (required)"><svg><use href="#i-camera"/></svg><b>Front 3/4</b><small>Required</small></label>
              <label class="shot" data-required data-label="Rear 3/4"><input type="file" accept="image/*" capture="environment" aria-label="Rear three-quarter photo (required)"><svg><use href="#i-camera"/></svg><b>Rear 3/4</b><small>Required</small></label>
              <label class="shot" data-required data-label="Driver side"><input type="file" accept="image/*" capture="environment" aria-label="Driver side photo (required)"><svg><use href="#i-camera"/></svg><b>Driver side</b><small>Required</small></label>
              <label class="shot" data-required data-label="Odometer"><input type="file" accept="image/*" capture="environment" aria-label="Odometer photo (required)"><svg><use href="#i-camera"/></svg><b>Odometer / dash</b><small>Required</small></label>
              <label class="shot" data-label="Engine"><input type="file" accept="image/*" capture="environment" aria-label="Engine photo"><svg><use href="#i-camera"/></svg><b>Engine</b><small>Optional</small></label>
              <label class="shot" data-label="Interior"><input type="file" accept="image/*" capture="environment" aria-label="Interior photo"><svg><use href="#i-camera"/></svg><b>Interior / cab</b><small>Optional</small></label>
              <label class="shot" data-label="Tires"><input type="file" accept="image/*" capture="environment" aria-label="Tires photo"><svg><use href="#i-camera"/></svg><b>Tires</b><small>Optional</small></label>
              <label class="shot" data-label="More photos"><input type="file" accept="image/*" multiple aria-label="Damage or more photos"><svg><use href="#i-camera"/></svg><b>Damage / more</b><small>Add several</small></label>
            </div>
            <div class="shots__note"><svg><use href="#i-info"/></svg><span><?php rtg_e( 'photos_note' ); ?></span></div>
          </section>

          <!-- Step 3 -->
          <section class="wstep" aria-label="Step 3 of 4: Contact">
            <h2><?php rtg_e( 'contact_title' ); ?></h2>
            <p><?php rtg_e( 'contact_text' ); ?></p>
            <div class="fgrid">
              <div class="ff"><label for="cFirst">First name <i>*</i></label><input id="cFirst" name="first" required autocomplete="given-name" data-label="First name"><span class="ff__err">Enter your first name</span></div>
              <div class="ff"><label for="cLast">Last name</label><input id="cLast" name="last" autocomplete="family-name" data-label="Last name"></div>
              <div class="ff"><label for="cPhone">Phone <i>*</i></label><input id="cPhone" name="phone" type="tel" required autocomplete="tel" data-label="Phone"><span class="ff__err">Enter a 10-digit phone number</span></div>
              <div class="ff"><label for="cEmail">Email</label><input id="cEmail" name="email" type="email" autocomplete="email" data-label="Email"><span class="ff__err">Check the email address</span></div>
              <div class="ff"><label for="cZip">ZIP code</label><input id="cZip" name="zip" inputmode="numeric" maxlength="5" autocomplete="postal-code" data-label="ZIP"></div>
              <div class="ff">
                <span class="lbl" id="prefL">Best way to reach you</span>
                <div class="seg2" role="radiogroup" aria-labelledby="prefL" data-label="Contact by">
                  <label><input type="radio" name="pref" value="Call" checked><span>Call</span></label>
                  <label><input type="radio" name="pref" value="Text"><span>Text</span></label>
                  <label><input type="radio" name="pref" value="Email"><span>Email</span></label>
                </div>
              </div>
              <div class="ff ff--full">
                <span class="lbl" id="buyL">Looking to buy a truck from us too?</span>
                <div class="seg2" role="radiogroup" aria-labelledby="buyL" data-label="Buying too">
                  <label><input type="radio" name="buy" value="Yes, in the next month"><span>Yes, within a month</span></label>
                  <label><input type="radio" name="buy" value="Yes, in 1–3 months"><span>In 1–3 months</span></label>
                  <label><input type="radio" name="buy" value="Not right now"><span>Not right now</span></label>
                </div>
              </div>
            </div>
          </section>

          <!-- Step 4 -->
          <section class="wstep" data-review aria-label="Step 4 of 4: Review">
            <h2><?php rtg_e( 'review_title' ); ?></h2>
            <p><?php rtg_e( 'review_text' ); ?></p>
            <dl class="review-list" data-review-list></dl>
            <div class="ff" style="margin-top:18px">
              <label class="fcheck"><input type="checkbox" required name="ok"> I agree to be contacted by Robertson Truck Sales about my trade.</label>
              <span class="ff__err">Please check the box so we can contact you</span>
            </div>
          </section>

          <div class="wnav">
            <button type="button" class="btn btn--line" data-prev><span>Back</span></button>
            <span></span>
            <button type="button" class="btn btn--red" data-next><span>Continue</span><svg><use href="#i-arrow"/></svg></button>
            <button type="submit" class="btn btn--red" data-submit hidden><span><?php rtg_e( 'submit_label' ); ?></span><svg><use href="#i-arrow"/></svg></button>
          </div>
        </form>

        <div class="wiz done" id="done" hidden>
          <div class="done__ic"><svg><use href="#i-check"/></svg></div>
          <h2>Thanks<span data-name></span>! <?php rtg_e( 'done_title' ); ?></h2>
          <p><?php rtg_e( 'done_text' ); ?></p>
          <span class="done__ref" data-ref></span>
          <div class="done__acts">
            <a href="<?php echo esc_url( rtg_f( 'done_btn_url' ) ); ?>" class="btn btn--red"><span><?php rtg_e( 'done_btn_label' ); ?></span><svg><use href="#i-arrow"/></svg></a>
            <a href="<?php echo esc_url( rtg_f( 'done_call_url' ) ); ?>" class="btn btn--line"><span><?php rtg_e( 'done_call_label' ); ?></span></a>
          </div>
        </div>
      </div>

      <aside class="aside">
        <div class="acard">
          <h3><?php rtg_e( 'how_title' ); ?></h3>
          <ul>
<?php foreach ( rtg_items( 'how_list' ) as $it ) : ?>
            <li><svg><use href="#i-check"/></svg><?php echo $it['text']; ?></li>
<?php endforeach; ?>
          </ul>
        </div>
        <div class="acard" id="forCard" hidden></div>
        <div class="acard acard--red">
          <h3><?php rtg_e( 'call_title' ); ?></h3>
          <p><?php rtg_e( 'call_text' ); ?></p>
          <a href="<?php echo esc_url( rtg_f( 'call_tel' ) ); ?>" class="acard__phone"><?php rtg_e( 'call_phone' ); ?></a>

        </div>
      </aside>
    </div>
  </section>
</main>

<?php get_template_part( 'parts/footer', 'v2', array( 'big' => false ) ); ?>
<?php
get_footer();

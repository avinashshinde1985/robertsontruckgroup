<?php
/**
 * Template Name: Get a Quote
 *
 * Converted from rts/quote.html.
 *
 * @package RTS
 */

rtg_page(
	array(
		'title'       => 'Get a Quote to Install a Body | Robertson Truck Group',
		'description' => 'Get a quote to install a dump body, flatbed or other equipment on your truck. Send your wheelbase measurements and a few photos and a rep will help you pick the right body.',
		'styles'      => array( 'css/v2.css', 'css/site.css', 'css/chat.css' ),
		'scripts'     => array(
			'js/inventory-data.js',
			array(
				'inline' => <<<'JS'
  (function () {
    var p = new URLSearchParams(location.search), stock = p.get('stock') || p.get('body');
    if (p.get('type')) { var s = document.getElementById('qBody'); Array.prototype.forEach.call(s.options, function (o) { if (o.text.toLowerCase().indexOf(p.get('type').toLowerCase()) === 0) s.value = o.value; }); }
    var t = stock && (window.RTS_INVENTORY || []).filter(function (x) { return x.stock === stock; })[0];
    if (stock) document.getElementById('qRef').value = stock;
    if (t) {
      // Installing on one of our trucks: we already know the chassis details
      document.querySelector('input[name=on][value="A truck from Robertson inventory"]').checked = true;
      document.getElementById('qYear').value = t.year; document.getElementById('qMake').value = t.make; document.getElementById('qModel').value = t.model;
      document.getElementById('qWb').value = t.wb; document.getElementById('qGvwr').value = t.gvwr;
      var c = document.getElementById('refCard'); c.hidden = false;
      c.innerHTML = '<h3>Installing on</h3><div class="acard__item"><img src="' + t.img + '" alt=""><span><b>' + t.year + ' ' + t.make + ' ' + t.model + '</b><small>#' + t.stock + ' · ' + t.wb + '" WB</small></span></div>';
    }
    // Step 2 needs WB + CA, or an uploaded sheet
    window.WIZ_CHECK = {
      1: function (step) {
        var wb = document.getElementById('qWb'), ca = document.getElementById('qCa'), sheet = document.getElementById('qSheet');
        var ok = (wb.value.trim() && ca.value.trim()) || (sheet.files && sheet.files.length);
        wb.closest('.ff').classList.toggle('is-bad', !ok && !wb.value.trim());
        ca.closest('.ff').classList.toggle('is-bad', !ok && !ca.value.trim());
        if (!ok) (wb.value.trim() ? ca : wb).focus();
        return !!ok;
      }
    };
  })();
JS
			),
			'js/chat.js',
			'js/site.js',
			'js/wizard.js',
		),
	)
);

rtg_fields_for( 'quote' );
get_header();
?>
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></symbol>
  <symbol id="i-check" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M20 6 9 17l-5-5"/></symbol>
  <symbol id="i-camera" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></g></symbol>
  <symbol id="i-doc" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M12 18v-6M9 15l3 3 3-3"/></g></symbol>
  <symbol id="i-ruler" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.4 2.4 0 0 1 0-3.4l2.6-2.6a2.4 2.4 0 0 1 3.4 0z"/><path d="m14.5 12.5 2-2M11.5 9.5l2-2M8.5 6.5l2-2M17.5 15.5l2-2"/></g></symbol>
</svg>

<div class="progress" id="progress"></div>

<?php get_template_part( 'parts/nav', 'v2', array( 'active' => rtg_url( 'rts', 'capabilities' ), 'contact' => 'ote', 'cta_url' => rtg_url( 'rts', 'inventory' ), 'cta_label' => 'View Inventory' ) ); ?>

<main>
  <section class="phead">
    <div class="wrap">
      <nav class="crumb" aria-label="Breadcrumb"><a href="<?php rtg_u( 'rts', '' ); ?>">Home</a>/<a href="<?php rtg_u( 'rts', 'capabilities' ); ?>">Capabilities</a>/<span><?php rtg_e( 'head_crumb' ); ?></span></nav>
      <h1><?php rtg_e( 'head_title' ); ?></h1>
      <p><?php rtg_e( 'head_text' ); ?></p>
    </div>
  </section>

  <section class="wizp">
    <div class="wrap wizp__grid">
      <div>
        <form class="wiz" data-kind="install-quote" data-company="Ohio Truck Equipment" novalidate>
          <ol class="steps">
            <li><span>Body</span></li>
            <li><span>Wheelbase</span></li>
            <li><span>Truck photos</span></li>
            <li><span>Contact</span></li>
            <li><span>Review</span></li>
          </ol>

          <!-- Step 1: Body -->
          <section class="wstep" aria-label="Step 1 of 5: Body">
            <h2><?php rtg_e( 'body_title' ); ?></h2>
            <p><?php rtg_e( 'body_text' ); ?></p>
            <div class="fgrid">
              <div class="ff">
                <label for="qBody">Body or equipment <i>*</i></label>
                <select id="qBody" name="body" required data-label="Body">
                  <option value="">Select</option><option>Dump body</option><option>Flatbed / platform</option><option>Service body</option><option>Van body</option><option>Landscape / contractor body</option><option>Hoist / hook lift</option><option>Snow and ice equipment</option><option>Not sure, help me choose</option>
                </select>
                <span class="ff__err">Choose a body type</span>
              </div>
              <div class="ff">
                <label for="qLen">Body length</label>
                <select id="qLen" name="len" data-label="Body length">
                  <option value="">Not sure</option><option>10–12 ft</option><option>14–16 ft</option><option>18–20 ft</option><option>22–24 ft</option><option>26 ft +</option>
                </select>
              </div>
              <div class="ff ff--full">
                <label for="qRef">Body or truck from our inventory (stock #)</label>
                <input id="qRef" name="ref" data-label="Inventory item" placeholder="Optional, e.g. RTS-24140">
              </div>
              <div class="ff ff--full">
                <span class="lbl" id="onL">Install it on <i>*</i></span>
                <div class="seg2" role="radiogroup" aria-labelledby="onL" data-required data-label="Install on">
                  <label><input type="radio" name="on" value="My own truck"><span>My own truck</span></label>
                  <label><input type="radio" name="on" value="A truck from Robertson inventory"><span>A truck from Robertson inventory</span></label>
                </div>
                <span class="ff__err">Choose one</span>
              </div>
            </div>
          </section>

          <!-- Step 2: Wheelbase -->
          <section class="wstep" aria-label="Step 2 of 5: Wheelbase">
            <h2><?php rtg_e( 'wb_title' ); ?></h2>
            <p><?php rtg_e( 'wb_text' ); ?></p>
            <div class="acard" style="margin-bottom:22px;display:flex;flex-wrap:wrap;gap:12px;align-items:center;justify-content:space-between">
              <span style="display:flex;gap:12px;align-items:center;color:#c3cadc;font-size:.9rem"><svg style="color:var(--red-hot);width:22px;height:22px"><use href="#i-ruler"/></svg><?php rtg_e( 'wb_help' ); ?></span>
              <span style="display:flex;gap:8px;flex-wrap:wrap">
                <a href="<?php echo esc_url( rtg_f( 'wb_howto_url' ) ); ?>" class="btn btn--line btn--sm" target="_blank" rel="noopener"><span><?php rtg_e( 'wb_howto_label' ); ?></span></a>
                <a href="<?php echo esc_url( rtg_f( 'wb_sheet_url' ) ); ?>" class="btn btn--line btn--sm" target="_blank" rel="noopener"><svg><use href="#i-doc"/></svg><span><?php rtg_e( 'wb_sheet_label' ); ?></span></a>
              </span>
            </div>
            <div class="fgrid fgrid--3">
              <div class="ff"><label for="qYear">Truck year <i>*</i></label><input id="qYear" name="tyear" required inputmode="numeric" maxlength="4" pattern="(19|20)\d\d" data-label="Truck year"><span class="ff__err">Enter a 4-digit year</span></div>
              <div class="ff"><label for="qMake">Make <i>*</i></label><input id="qMake" name="tmake" required data-label="Truck make"><span class="ff__err">Enter the make</span></div>
              <div class="ff"><label for="qModel">Model <i>*</i></label><input id="qModel" name="tmodel" required data-label="Truck model"><span class="ff__err">Enter the model</span></div>
              <div class="ff"><label for="qWb">Wheelbase (WB), inches</label><input id="qWb" name="wb" inputmode="decimal" data-label="Wheelbase (in)"><span class="ff__err">Enter WB and CA, or upload the sheet</span></div>
              <div class="ff"><label for="qCa">Cab-to-axle (CA), inches</label><input id="qCa" name="ca" inputmode="decimal" data-label="Cab-to-axle (in)"><span class="ff__err">Enter WB and CA, or upload the sheet</span></div>
              <div class="ff"><label for="qGvwr">GVWR, lb</label><input id="qGvwr" name="gvwr" inputmode="numeric" data-label="GVWR (lb)" placeholder="On the door sticker"></div>
              <div class="ff ff--full">
                <span class="lbl" id="axL">Rear axle</span>
                <div class="seg2" role="radiogroup" aria-labelledby="axL" data-label="Rear axle">
                  <label><input type="radio" name="axle" value="Single"><span>Single</span></label>
                  <label><input type="radio" name="axle" value="Tandem"><span>Tandem</span></label>
                  <label><input type="radio" name="axle" value="Not sure"><span>Not sure</span></label>
                </div>
              </div>
              <div class="ff ff--full">
                <label for="qSheet">Or upload a filled-out wheelbase sheet</label>
                <input id="qSheet" name="sheet" type="file" accept="image/*,.pdf" data-label="Wheelbase sheet">
                <small>Photo or PDF of the completed sheet works.</small>
              </div>
            </div>
          </section>

          <!-- Step 3: Photos -->
          <section class="wstep" aria-label="Step 3 of 5: Truck photos">
            <h2><?php rtg_e( 'photos_title' ); ?></h2>
            <p><?php rtg_e( 'photos_text' ); ?></p>
            <div class="shots">
              <label class="shot" data-required data-label="Driver side"><input type="file" accept="image/*" capture="environment" aria-label="Driver side full photo (required)"><svg><use href="#i-camera"/></svg><b>Driver side, full truck</b><small>Required</small></label>
              <label class="shot" data-required data-label="Frame behind cab"><input type="file" accept="image/*" capture="environment" aria-label="Frame behind the cab (required)"><svg><use href="#i-camera"/></svg><b>Frame behind the cab</b><small>Required</small></label>
              <label class="shot" data-required data-label="Door sticker"><input type="file" accept="image/*" capture="environment" aria-label="Door sticker with GVWR (required)"><svg><use href="#i-camera"/></svg><b>Door sticker (GVWR)</b><small>Required</small></label>
              <label class="shot" data-label="Passenger side"><input type="file" accept="image/*" capture="environment" aria-label="Passenger side photo"><svg><use href="#i-camera"/></svg><b>Passenger side</b><small>Optional</small></label>
              <label class="shot" data-label="Rear of frame"><input type="file" accept="image/*" capture="environment" aria-label="Rear of frame photo"><svg><use href="#i-camera"/></svg><b>Rear of frame</b><small>Optional</small></label>
              <label class="shot" data-label="Current body"><input type="file" accept="image/*" multiple aria-label="Current body or more photos"><svg><use href="#i-camera"/></svg><b>Current body / more</b><small>Add several</small></label>
            </div>
          </section>

          <!-- Step 4: Contact -->
          <section class="wstep" aria-label="Step 4 of 5: Contact">
            <h2><?php rtg_e( 'contact_title' ); ?></h2>
            <p><?php rtg_e( 'contact_text' ); ?></p>
            <div class="fgrid">
              <div class="ff"><label for="cFirst">First name <i>*</i></label><input id="cFirst" name="first" required autocomplete="given-name" data-label="First name"><span class="ff__err">Enter your first name</span></div>
              <div class="ff"><label for="cLast">Last name</label><input id="cLast" name="last" autocomplete="family-name" data-label="Last name"></div>
              <div class="ff"><label for="cCo">Company</label><input id="cCo" name="company" autocomplete="organization" data-label="Company"></div>
              <div class="ff"><label for="cPhone">Phone <i>*</i></label><input id="cPhone" name="phone" type="tel" required autocomplete="tel" data-label="Phone"><span class="ff__err">Enter a 10-digit phone number</span></div>
              <div class="ff"><label for="cEmail">Email</label><input id="cEmail" name="email" type="email" autocomplete="email" data-label="Email"><span class="ff__err">Check the email address</span></div>
              <div class="ff">
                <label for="cWhen">When do you need it?</label>
                <select id="cWhen" name="when" data-label="Timeline">
                  <option value="">Select</option><option>Less than 1 month</option><option>1–3 months</option><option>3–6 months</option><option>Just getting prices</option>
                </select>
              </div>
              <div class="ff ff--full"><label for="cNotes">What will the truck be used for?</label><textarea id="cNotes" name="notes" data-label="Notes" placeholder="Hauling gravel, landscaping, municipal snow route…"></textarea></div>
            </div>
          </section>

          <!-- Step 5: Review -->
          <section class="wstep" data-review aria-label="Step 5 of 5: Review">
            <h2><?php rtg_e( 'review_title' ); ?></h2>
            <p><?php rtg_e( 'review_text' ); ?></p>
            <dl class="review-list" data-review-list></dl>
            <div class="ff" style="margin-top:18px">
              <label class="fcheck"><input type="checkbox" required name="ok"> I agree to be contacted about this quote.</label>
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

      <!-- Capabilities behind inventory -->
      <aside class="aside">
        <div class="acard" id="refCard" hidden></div>
        <div class="acard">
          <h3><?php rtg_e( 'install_title' ); ?></h3>
          <ul>
<?php foreach ( rtg_items( 'install_list' ) as $it ) : ?>
            <li><svg><use href="#i-check"/></svg><?php echo $it['text']; ?></li>
<?php endforeach; ?>
          </ul>
          <a href="<?php echo esc_url( rtg_f( 'install_btn_url' ) ); ?>" class="btn btn--line btn--sm" style="margin-top:16px"><span><?php rtg_e( 'install_btn_label' ); ?></span><svg><use href="#i-arrow"/></svg></a>
        </div>
        <div class="acard">
          <h3><?php rtg_e( 'needs_title' ); ?></h3>
          <p style="margin:0"><?php rtg_e( 'needs_text' ); ?></p>
        </div>
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

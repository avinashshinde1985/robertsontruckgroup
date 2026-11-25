<?php
/**
 * Template Name: Tutorials & PDFs
 *
 * Converted from ote/tutorials.html.
 *
 * @package OTE
 */

rtg_page(
	array(
		'title'       => 'Tutorials & PDFs | Ohio Truck Equipment',
		'description' => 'How to measure a wheelbase and cab-to-axle, what GVWR, payload and axle ratings mean, and a printable wheelbase sheet for your body install quote.',
		'styles'      => array( 'rts:css/v2.css', 'rts:css/site.css', 'rts:css/chat.css', 'css/ote.css' ),
		'scripts'     => array(
			'js/bodies-data.js',
			'rts:js/inventory-data.js',
			'rts:js/chat.js',
			'rts:js/site.js',
			array(
				'inline' => <<<'JS'
  /* Wheelbase diagram: single/tandem switch; hovering or focusing a step highlights its dimension */
  (function () {
    var dia = document.getElementById('dia'), page = document.getElementById('wheelbase');
    var btns = dia.querySelectorAll('.dia2__bar button'), dims = dia.querySelectorAll('.dim'), steps = page.querySelectorAll('.hsteps li[data-dim]');
    Array.prototype.forEach.call(btns, function (b) {
      b.addEventListener('click', function () {
        dia.dataset.axle = b.dataset.axle; page.dataset.axle = b.dataset.axle;
        Array.prototype.forEach.call(btns, function (x) { x.setAttribute('aria-pressed', x === b); });
      });
    });
    function focus(dim) {
      Array.prototype.forEach.call(dims, function (d) { d.classList.toggle('is-on', !dim || d.dataset.dim === dim); });
      Array.prototype.forEach.call(steps, function (s) { s.classList.toggle('is-on', !!dim && s.dataset.dim === dim); });
    }
    Array.prototype.forEach.call(steps, function (s) {
      s.addEventListener('mouseenter', function () { focus(s.dataset.dim); });
      s.addEventListener('mouseleave', function () { focus(null); });
      s.addEventListener('focus', function () { focus(s.dataset.dim); });
      s.addEventListener('blur', function () { focus(null); });
    });
    page.dataset.axle = 'single';
  })();
JS
			),
		),
	)
);

rtg_fields_for( 'tutorials' );
get_header();
?>
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></symbol>
  <symbol id="i-doc" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M12 18v-6M9 15l3 3 3-3"/></g></symbol>
  <symbol id="i-book" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20V3H6.5A2.5 2.5 0 0 0 4 5.5z"/><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20v-5"/></g></symbol>
</svg>

<div class="progress" id="progress"></div>

<?php get_template_part( 'parts/nav', 'v2', array( 'active' => rtg_url( 'ote', 'tutorials' ), 'contact' => 'ote', 'cta_url' => rtg_url( 'ote', 'inventory' ), 'cta_label' => 'Shop Bodies' ) ); ?>

<main>
  <section class="phead">
    <div class="wrap">
      <nav class="crumb" aria-label="Breadcrumb"><a href="<?php rtg_u( 'ote', '' ); ?>">Home</a>/<span><?php rtg_e( 'head_crumb' ); ?></span></nav>
      <h1><?php rtg_e( 'head_title' ); ?></h1>
      <p><?php rtg_e( 'head_text' ); ?></p>
    </div>
  </section>

  <section class="tut">
    <div class="wrap tut__grid">
      <nav class="toc" aria-label="Guides on this page">
        <h2><?php rtg_e( 'toc_title' ); ?></h2>
<?php foreach ( rtg_items( 'toc' ) as $toc ) : ?>
        <a href="<?php echo esc_url( $toc['url'] ); ?>"><?php echo $toc['text']; ?><small><?php echo $toc['note']; ?></small></a>
<?php endforeach; ?>
      </nav>

      <div>
        <!-- Guide 1 -->
        <article class="guide-sec" id="wheelbase">
          <div class="tag" style="margin-bottom:6px"><?php rtg_e( 'g1_tag' ); ?></div>
          <h2><?php rtg_e( 'g1_title' ); ?></h2>
          <div class="gmeta"><?php foreach ( rtg_items( 'g1_meta' ) as $m ) : ?><span><?php echo $m['text']; ?></span><?php endforeach; ?></div>
          <p style="margin-top:16px"><?php rtg_e( 'g1_intro' ); ?></p>

          <div class="measure2">
            <div class="dia2" id="dia" data-axle="single">
              <div class="dia2__bar" role="group" aria-label="Rear axle">
                <button type="button" data-axle="single" aria-pressed="true">Single rear axle</button>
                <button type="button" data-axle="tandem" aria-pressed="false">Tandem rear axle</button>
              </div>
              <svg viewBox="0 0 900 320" role="img" aria-labelledby="diaT">
                <title id="diaT">Truck side view showing wheelbase, cab-to-axle and frame behind cab</title>
                <line x1="10" y1="262" x2="890" y2="262" stroke="rgba(255,255,255,.18)" stroke-width="2"/>
                <rect x="40" y="192" width="800" height="14" rx="3" fill="#2a3a66"/>
                <path d="M30 198V152q2-12 16-14l100-7 16-62q3-7 11-7h80q10 0 10 10v126z" fill="#2a3a66"/>
                <path d="M172 78h70v52h-84z" fill="rgba(122,162,255,.25)"/>
                <g fill="#0b1124" stroke="#7d89a8" stroke-width="3">
                  <circle cx="120" cy="228" r="32"/>
                  <circle cx="610" cy="228" r="32" class="ax1-only"/>
                  <g class="ax2"><circle cx="568" cy="228" r="32"/><circle cx="652" cy="228" r="32"/></g>
                </g>
                <g fill="#7d89a8"><circle cx="120" cy="228" r="7"/><circle cx="610" cy="228" r="7" class="ax1-only"/><g class="ax2"><circle cx="568" cy="228" r="7"/><circle cx="652" cy="228" r="7"/></g></g>
                <g stroke="rgba(255,255,255,.25)" stroke-width="1.5" stroke-dasharray="4 6">
                  <line x1="120" y1="40" x2="120" y2="300"/><line x1="263" y1="40" x2="263" y2="190"/><line x1="610" y1="40" x2="610" y2="300"/>
                </g>
                <g font-family="Manrope,Segoe UI,sans-serif" font-size="26" font-weight="800" text-anchor="middle">
                  <g class="dim is-on" data-dim="wb" stroke="#ff2d55" stroke-width="3" fill="#ff2d55">
                    <line x1="120" y1="292" x2="610" y2="292"/><line x1="120" y1="282" x2="120" y2="302"/><line x1="610" y1="282" x2="610" y2="302"/>
                    <rect x="325" y="279" width="80" height="26" rx="6" fill="#050a1a" stroke="none"/><text x="365" y="299" stroke="none">WB</text>
                  </g>
                  <g class="dim is-on" data-dim="ca" stroke="#7aa2ff" stroke-width="3" fill="#7aa2ff">
                    <line x1="263" y1="46" x2="610" y2="46"/><line x1="263" y1="36" x2="263" y2="56"/><line x1="610" y1="36" x2="610" y2="56"/>
                    <text x="436" y="28" stroke="none"><tspan data-single>CA · cab-to-axle</tspan><tspan data-tandem>CT · cab-to-tandem</tspan></text>
                  </g>
                  <g class="dim is-on" data-dim="af" stroke="#ffc400" stroke-width="3" fill="#ffc400">
                    <line x1="263" y1="176" x2="840" y2="176" stroke-dasharray="8 7"/><line x1="840" y1="166" x2="840" y2="186"/>
                    <text x="730" y="164" stroke="none">Frame behind cab</text>
                  </g>
                </g>
              </svg>
            </div>

            <div>
              <ol class="hsteps">
<?php foreach ( rtg_items( 'g1_steps' ) as $st ) : ?>
<?php $dim = rtg_attr( $st['dim'] ); ?>
                <li<?php echo '' !== $dim ? ' data-dim="' . $dim . '" tabindex="0"' : ''; ?>><span><?php echo $st['text']; ?></span></li>
<?php endforeach; ?>
              </ol>
              <p class="tips"><?php rtg_e( 'g1_tip' ); ?></p>
            </div>
          </div>

          <div class="gacts">
            <a href="<?php echo esc_url( rtg_f( 'g1_btn1_url' ) ); ?>" class="btn btn--red" target="_blank" rel="noopener"><svg><use href="#i-doc"/></svg><span><?php rtg_e( 'g1_btn1_text' ); ?></span></a>
            <a href="<?php echo esc_url( rtg_f( 'g1_btn2_url' ) ); ?>" class="btn btn--line"><span><?php rtg_e( 'g1_btn2_text' ); ?></span><svg><use href="#i-arrow"/></svg></a>
            <a href="<?php echo esc_url( rtg_f( 'g1_btn3_url' ) ); ?>" class="btn btn--line"><span><?php rtg_e( 'g1_btn3_text' ); ?></span></a>
          </div>
        </article>

        <!-- Guide 2 -->
        <article class="guide-sec" id="terms">
          <div class="tag" style="margin-bottom:6px"><?php rtg_e( 'g2_tag' ); ?></div>
          <h2><?php rtg_e( 'g2_title' ); ?></h2>
          <div class="gmeta"><?php foreach ( rtg_items( 'g2_meta' ) as $m ) : ?><span><?php echo $m['text']; ?></span><?php endforeach; ?></div>
          <p style="margin-top:16px"><?php rtg_e( 'g2_intro' ); ?></p>
          <div class="terms">
<?php foreach ( rtg_items( 'terms' ) as $term ) : ?>
            <div class="term"><abbr><?php echo $term['abbr']; ?></abbr><b><?php echo $term['name']; ?></b><p><?php echo $term['text']; ?></p></div>
<?php endforeach; ?>
          </div>
          <div class="gacts">
            <a href="<?php echo esc_url( rtg_f( 'g2_btn_url' ) ); ?>" class="btn btn--line"><span><?php rtg_e( 'g2_btn_text' ); ?></span><svg><use href="#i-arrow"/></svg></a>
          </div>
        </article>

        <!-- PDFs -->
        <article class="guide-sec" id="pdfs">
          <div class="tag" style="margin-bottom:6px"><?php rtg_e( 'pdf_tag' ); ?></div>
          <h2><?php rtg_e( 'pdf_title' ); ?></h2>
          <p><?php rtg_e( 'pdf_text' ); ?></p>
          <div class="docs">
<?php foreach ( rtg_items( 'pdfs' ) as $pdf ) : ?>
<?php if ( '' !== $pdf['url'] ) : ?>
            <article class="doc">
              <span class="doc__ic"><svg><use href="#i-doc"/></svg></span>
              <h3><?php echo $pdf['title']; ?></h3>
              <p><?php echo $pdf['text']; ?></p>
              <a href="<?php echo esc_url( $pdf['url'] ); ?>" class="btn btn--red btn--sm" target="_blank" rel="noopener"><span><?php echo $pdf['btn']; ?></span></a>
            </article>
<?php else : ?>
            <article class="doc doc--soon">
              <span class="doc__ic"><svg><use href="#i-book"/></svg></span>
              <span class="soon">Coming soon</span>
              <h3><?php echo $pdf['title']; ?></h3>
              <p><?php echo $pdf['text']; ?></p>
            </article>
<?php endif; ?>
<?php endforeach; ?>
          </div>
        </article>
      </div>
    </div>
  </section>
</main>

<?php get_template_part( 'parts/footer', 'v2', array( 'big' => false ) ); ?>
<?php
get_footer();

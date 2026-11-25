<?php
/**
 * Template Name: Body Inventory
 *
 * Converted from ote/inventory.html.
 *
 * @package OTE
 */

rtg_page(
	array(
		'title'       => 'Body & Equipment Inventory | Ohio Truck Equipment',
		'description' => 'Dump bodies, flatbeds, landscape bodies, hooklifts, carriers, snow and ice equipment and trailers in stock at Ohio Truck Equipment. Pick a body and get a quote to install it.',
		'styles'      => array( 'rts:css/v2.css', 'rts:css/site.css', 'rts:css/chat.css', 'css/ote.css' ),
		'scripts'     => array(
			'js/bodies-data.js',
			'rts:js/inventory-data.js',
			'rts:js/chat.js',
			'rts:js/site.js',
			'js/bodies.js',
		),
	)
);

rtg_fields_for( 'inventory' );
get_header();
?>
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></symbol>
  <symbol id="i-check" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M20 6 9 17l-5-5"/></symbol>
  <symbol id="i-filter" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M3 5h18M6 12h12M10 19h4"/></symbol>
  <symbol id="i-wrench" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.8-3.8a6 6 0 0 1-7.9 7.9l-6.9 6.9a2.1 2.1 0 0 1-3-3l6.9-6.9a6 6 0 0 1 7.9-7.9z"/></symbol>
</svg>

<div class="progress" id="progress"></div>

<?php get_template_part( 'parts/nav', 'v2', array( 'active' => rtg_url( 'ote', 'inventory' ), 'contact' => 'ote', 'cta_url' => rtg_url( 'ote', 'quote' ), 'cta_label' => 'Install Quote' ) ); ?>

<main>
  <section class="phead" style="padding-bottom:30px">
    <div class="wrap">
      <nav class="crumb" aria-label="Breadcrumb"><a href="<?php rtg_u( 'ote', '' ); ?>">Home</a>/<span><?php rtg_e( 'head_crumb' ); ?></span></nav>
      <h1><?php rtg_e( 'head_title' ); ?></h1>
      <p><?php rtg_e( 'head_text' ); ?></p>
    </div>
  </section>

  <section class="invp">
    <div class="wrap">
      <div class="picks picks--row" id="picks" role="group" aria-label="Shop by body type"></div>

      <!-- Capabilities stay in the background while browsing -->
      <div class="capband" style="margin:22px 0 30px">
        <div class="capband__in">
          <div>
            <div class="capband__k"><?php rtg_e( 'cap_kicker' ); ?></div>
            <h2><?php rtg_e( 'cap_title' ); ?></h2>
          </div>
          <ul>
<?php foreach ( rtg_items( 'cap_items' ) as $cap ) : ?>
            <li><a href="<?php echo esc_url( $cap['url'] ); ?>"><svg><use href="#i-check"/></svg><?php echo $cap['text']; ?></a></li>
<?php endforeach; ?>
            <li><a href="<?php echo esc_url( rtg_f( 'cap_quote_url' ) ); ?>" style="border-color:var(--red-hot)"><svg><use href="#i-wrench"/></svg><?php rtg_e( 'cap_quote_text' ); ?></a></li>
          </ul>
        </div>
      </div>

      <div class="invp__grid">
        <aside class="filters" id="filters" aria-label="Filter bodies">
          <div class="filters__head">
            <h2>Filters</h2>
            <button type="button" class="filters__reset" id="fReset">Reset all</button>
          </div>
          <div class="fgroup">
            <h3>Search</h3>
            <label class="sr" for="fKw">Keyword or stock number</label>
            <input class="fsearch" id="fKw" type="search" placeholder="Keyword or stock #">
          </div>
          <div class="fgroup">
            <h3>Fits my truck</h3>
            <div class="fitbox">
              <label class="sr" for="fCa">My cab-to-axle (CA) in inches</label>
              <input class="fsearch" id="fCa" type="number" inputmode="numeric" min="30" max="300" placeholder="My CA, inches">
              <p><?php rtg_e( 'fit_text' ); ?> <a href="<?php echo esc_url( rtg_f( 'fit_link_url' ) ); ?>"><?php rtg_e( 'fit_link_text' ); ?></a></p>
            </div>
          </div>
          <div class="fgroup"><h3>Body type</h3><div id="fType"></div></div>
          <div class="fgroup"><h3>Brand</h3><div id="fBrand"></div></div>
          <div class="fgroup"><h3>Material</h3><div id="fMat"></div></div>
          <div class="fgroup"><h3>Condition</h3><div id="fCond"></div></div>
          <div class="fgroup">
            <h3>Length</h3>
            <div class="frange">
              <label class="sr" for="fLmin">Length from</label><select id="fLmin"></select>
              <label class="sr" for="fLmax">Length to</label><select id="fLmax"></select>
            </div>
          </div>
          <div class="fgroup">
            <h3>Max price</h3>
            <label class="sr" for="fPrice">Maximum price</label>
            <select class="fsel" id="fPrice">
              <option value="">Any price</option><option value="5000">Under $5,000</option><option value="10000">Under $10,000</option><option value="15000">Under $15,000</option><option value="25000">Under $25,000</option><option value="40000">Under $40,000</option>
            </select>
          </div>
          <button type="button" class="btn btn--red filters__close" id="fDone"><span>Show bodies</span></button>
        </aside>

        <div>
          <div class="invp__bar">
            <div class="invp__count" id="count" aria-live="polite"></div>
            <div class="invp__tools">
              <button type="button" class="btn btn--line btn--sm invp__fbtn" id="fOpen"><svg><use href="#i-filter"/></svg><span>Filters</span></button>
              <label class="sr" for="sort">Sort</label>
              <select class="fsel" id="sort" style="width:auto">
                <option value="type">Body type</option>
                <option value="plow">Price: low to high</option>
                <option value="phigh">Price: high to low</option>
                <option value="len">Shortest first</option>
              </select>
            </div>
          </div>
          <div class="chipsrow" id="active"></div>
          <div class="tgrid" id="results"></div>
          <div class="invp__empty" id="empty" hidden>
            <h3><?php rtg_e( 'empty_title' ); ?></h3>
            <p><?php rtg_e( 'empty_text' ); ?></p>
            <a href="<?php echo esc_url( rtg_f( 'empty_btn_url' ) ); ?>" class="btn btn--red btn--sm"><span><?php rtg_e( 'empty_btn_text' ); ?></span></a>
            <a href="<?php echo esc_url( rtg_f( 'empty_phone_url' ) ); ?>" class="btn btn--line btn--sm"><span><?php rtg_e( 'empty_phone_text' ); ?></span></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<dialog class="tdlg" id="tdlg" aria-labelledby="tdTitle">
  <button type="button" class="tdlg__x" id="tdX" aria-label="Close">&times;</button>
  <div class="tdlg__in" id="tdBody"></div>
</dialog>

<?php get_template_part( 'parts/footer', 'v2', array( 'big' => false ) ); ?>
<?php
get_footer();

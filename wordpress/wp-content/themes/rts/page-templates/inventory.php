<?php
/**
 * Template Name: Inventory
 *
 * Converted from rts/inventory.html.
 *
 * @package RTS
 */

rtg_page(
	array(
		'title'       => 'Truck Inventory | Robertson Truck Sales',
		'description' => 'Browse used medium and heavy-duty trucks at Robertson Truck Sales in Mount Vernon, Ohio. Search in plain English or filter by type, make, year, price and mileage.',
		'body_class'  => 'mode-both',
		'styles'      => array( 'css/v2.css', 'css/site.css', 'css/chat.css' ),
		'scripts'     => array(
			'js/inventory-data.js',
			'js/chat.js',
			'js/site.js',
			'js/inventory.js',
		),
	)
);

rtg_fields_for( 'inventory' );
get_header();
?>
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></symbol>
  <symbol id="i-spark" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2c.4 4.6 2.4 7.6 8 8.4v1.2c-5.6.8-7.6 3.8-8 8.4h-1.2c-.4-4.6-2.4-7.6-8-8.4v-1.2c5.6-.8 7.6-3.8 8-8.4H12z"/></symbol>
  <symbol id="i-filter" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M3 5h18M6 12h12M10 19h4"/></symbol>
</svg>

<div class="progress" id="progress"></div>

<?php get_template_part( 'parts/nav', 'v2', array( 'active' => rtg_url( 'rts', 'inventory' ), 'contact' => 'rts', 'cta_url' => rtg_url( 'rts', 'trade' ), 'cta_label' => 'Value My Trade' ) ); ?>

<main>
  <section class="phead">
    <div class="wrap">
      <nav class="crumb" aria-label="Breadcrumb"><a href="<?php rtg_u( 'rts', '' ); ?>">Home</a>/<span><?php rtg_e( 'head_crumb' ); ?></span></nav>
      <h1><?php rtg_e( 'head_title' ); ?></h1>
      <p><?php rtg_e( 'head_text' ); ?></p>
    </div>
  </section>

  <section class="invp">
    <div class="wrap">
      <!-- Option A: AI search -->
      <form class="invp__ai" id="aiForm" autocomplete="off">
        <div class="ai-search">
          <div class="ai-search__border"></div>
          <div class="ai-search__inner">
            <span class="ai-search__ic"><svg><use href="#i-spark"/></svg></span>
            <label for="aiQ" class="sr"><?php rtg_e( 'ai_label' ); ?></label>
            <input id="aiQ" type="text" placeholder="e.g. Freightliner dump truck under $125k, 2019 or newer">
            <button type="submit" class="ai-search__btn"><span><?php rtg_e( 'ai_btn' ); ?></span><svg><use href="#i-arrow"/></svg></button>
          </div>
        </div>
        <div class="ai-search__chips">
<?php foreach ( rtg_items( 'ai_chips' ) as $it ) : ?>
          <button type="button" data-q="<?php echo rtg_attr( $it['q'] ? $it['q'] : $it['label'] ); ?>"><?php echo $it['label']; ?></button>
<?php endforeach; ?>
        </div>
        <div class="invp__ai-note" id="aiNote" aria-live="polite"></div>
      </form>

      <div class="invp__grid">
        <!-- Option B: fixed left filter menu -->
        <aside class="filters" id="filters" aria-label="Filter trucks">
          <div class="filters__head">
            <h2>Filters</h2>
            <button type="button" class="filters__reset" id="fReset">Reset all</button>
          </div>
          <div class="fgroup">
            <h3>Search</h3>
            <label class="sr" for="fKw">Keyword or stock number</label>
            <input class="fsearch" id="fKw" type="search" placeholder="Keyword or stock #">
          </div>
          <div class="fgroup"><h3>Truck type</h3><div id="fType"></div></div>
          <div class="fgroup"><h3>Make</h3><div id="fMake"></div></div>
          <div class="fgroup"><h3>Duty</h3><div id="fDuty"></div></div>
          <div class="fgroup">
            <h3>Year</h3>
            <div class="frange">
              <label class="sr" for="fYmin">Year from</label><select id="fYmin"></select>
              <label class="sr" for="fYmax">Year to</label><select id="fYmax"></select>
            </div>
          </div>
          <div class="fgroup">
            <h3>Max price</h3>
            <label class="sr" for="fPrice">Maximum price</label>
            <select class="fsel" id="fPrice">
              <option value="">Any price</option><option value="40000">Under $40,000</option><option value="60000">Under $60,000</option><option value="80000">Under $80,000</option><option value="100000">Under $100,000</option><option value="125000">Under $125,000</option><option value="150000">Under $150,000</option>
            </select>
          </div>
          <div class="fgroup">
            <h3>Max mileage</h3>
            <label class="sr" for="fMiles">Maximum mileage</label>
            <select class="fsel" id="fMiles">
              <option value="">Any mileage</option><option value="75000">Under 75,000</option><option value="100000">Under 100,000</option><option value="150000">Under 150,000</option><option value="250000">Under 250,000</option><option value="450000">Under 450,000</option>
            </select>
          </div>
          <div class="fgroup">
            <h3>License</h3>
            <label class="fcheck"><input type="checkbox" id="fNonCdl">Non-CDL only (26,000 lb GVWR or less)</label>
          </div>
          <button type="button" class="btn btn--red filters__close" id="fDone"><span>Show trucks</span></button>
        </aside>

        <div>
          <div class="invp__bar">
            <div class="invp__count" id="count" aria-live="polite"></div>
            <div class="invp__tools">
              <button type="button" class="btn btn--line btn--sm invp__fbtn" id="fOpen"><svg><use href="#i-filter"/></svg><span>Filters</span></button>
              <label class="sr" for="sort">Sort</label>
              <select class="fsel" id="sort" style="width:auto">
                <option value="new">Newest first</option>
                <option value="plow">Price: low to high</option>
                <option value="phigh">Price: high to low</option>
                <option value="miles">Lowest mileage</option>
              </select>
            </div>
          </div>
          <div class="chipsrow" id="active"></div>
          <div class="tgrid" id="results"></div>
          <div class="invp__empty" id="empty" hidden>
            <h3><?php rtg_e( 'empty_title' ); ?></h3>
            <p><?php rtg_e( 'empty_text' ); ?></p>
            <a href="<?php echo esc_url( rtg_f( 'empty_btn_url' ) ); ?>" class="btn btn--red btn--sm"><span><?php rtg_e( 'empty_btn_label' ); ?></span></a>

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

<div class="review" role="group" aria-label="Design review: search layout">
  <span>Review</span>
  <button type="button" data-mode="both" aria-pressed="true">Both</button>
  <button type="button" data-mode="ai" aria-pressed="false">AI search</button>
  <button type="button" data-mode="filter" aria-pressed="false">Filter menu</button>
</div>

<?php get_template_part( 'parts/footer', 'v2', array( 'big' => false ) ); ?>
<?php
get_footer();

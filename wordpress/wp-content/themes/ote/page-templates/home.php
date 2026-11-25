<?php
/**
 * Template Name: Home
 *
 * Converted from ote/index.html.
 *
 * @package OTE
 */

rtg_page(
	array(
		'title'       => 'Ohio Truck Equipment | Truck Bodies & Upfitting, Mt Vernon, Ohio',
		'description' => 'Dump bodies, flatbeds, hooklifts, carriers, snow and ice equipment and trailers, in stock at Ohio Truck Equipment and installed in our own Mt Vernon, Ohio facility.',
		'styles'      => array( 'rts:css/v2.css', 'rts:css/site.css', 'rts:css/chat.css', 'css/ote.css' ),
		'scripts'     => array(
			'js/bodies-data.js',
			'rts:js/inventory-data.js',
			'rts:js/chat.js',
			'rts:js/site.js',
			array(
				'inline' => <<<'JS'
  (function () {
    OTE_picks(document.getElementById('picks'), { href: function (k) { return '{{u:ote:inventory}}?type=' + encodeURIComponent(k); } });
    var feat = [1, 6, 10, 2].map(function (id) { return OTE_BODIES.filter(function (b) { return b.id === id; })[0]; });
    document.getElementById('featGrid').innerHTML = feat.map(OTE_card).join('');
  })();
JS
			),
		),
	)
);

rtg_fields_for( 'home' );
get_header();
?>
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></symbol>
  <symbol id="i-check" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M20 6 9 17l-5-5"/></symbol>
  <symbol id="i-search" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></g></symbol>
  <symbol id="i-doc" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M12 18v-6M9 15l3 3 3-3"/></g></symbol>
</svg>

<div class="progress" id="progress"></div>

<?php get_template_part( 'parts/nav', 'v2', array( 'contact' => 'ote', 'cta_url' => rtg_url( 'ote', 'inventory' ), 'cta_label' => 'Shop Bodies' ) ); ?>

<main>
  <!-- Hero: inventory first, easy-pick buttons above the fold -->
  <section class="ohero">
    <div class="wrap">
      <div class="ohero__head">
        <div>
          <div class="pill"><span class="pill__dot"></span><?php rtg_e( 'hero_pill' ); ?></div>
          <h1><?php rtg_e( 'hero_title' ); ?></h1>
        </div>
        <div>
          <p class="ohero__sub"><?php rtg_e( 'hero_sub' ); ?></p>
          <form class="osearch" action="<?php rtg_u( 'ote', 'inventory' ); ?>" role="search">
            <label for="oq" class="sr">Search bodies and equipment</label>
            <input id="oq" name="q" type="search" placeholder="Search, e.g. 12 ft steel flatbed">
            <button type="submit" class="btn btn--red btn--sm"><svg><use href="#i-search"/></svg><span><?php rtg_e( 'hero_search_btn' ); ?></span></button>
          </form>
        </div>
      </div>

      <div class="picks" id="picks" aria-label="Shop by body type"></div>

      <div class="ohero__ctas">
        <a href="<?php echo esc_url( rtg_f( 'hero_btn1_url' ) ); ?>" class="btn btn--red"><span><?php rtg_e( 'hero_btn1_text' ); ?></span><svg><use href="#i-arrow"/></svg></a>
        <a href="<?php echo esc_url( rtg_f( 'hero_btn2_url' ) ); ?>" class="btn btn--line"><span><?php rtg_e( 'hero_btn2_text' ); ?></span></a>
      </div>
    </div>
  </section>

  <!-- Featured bodies -->
  <section class="feat">
    <div class="wrap">
      <div class="head head--row">
        <div>
          <div class="tag"><?php rtg_e( 'feat_tag' ); ?></div>
          <h2 class="h2"><?php rtg_e( 'feat_title' ); ?></h2>
        </div>
        <a href="<?php echo esc_url( rtg_f( 'feat_btn_url' ) ); ?>" class="btn btn--line"><span><?php rtg_e( 'feat_btn_text' ); ?></span><svg><use href="#i-arrow"/></svg></a>
      </div>
      <div class="tgrid" id="featGrid"></div>
    </div>
  </section>

  <!-- Capabilities behind inventory -->
  <section class="osec osec--tight">
    <div class="wrap">
      <div class="head head--row" style="margin-bottom:34px">
        <div>
          <div class="tag"><?php rtg_e( 'caps_tag' ); ?></div>
          <h2 class="h2"><?php rtg_e( 'caps_title' ); ?></h2>
        </div>
        <a href="<?php echo esc_url( rtg_f( 'caps_btn_url' ) ); ?>" class="btn btn--line"><span><?php rtg_e( 'caps_btn_text' ); ?></span><svg><use href="#i-arrow"/></svg></a>
      </div>
      <div class="ocaps">
<?php foreach ( rtg_items( 'caps' ) as $cap ) : ?>
        <a class="ocap" href="<?php echo esc_url( $cap['url'] ); ?>"><img src="<?php echo esc_url( $cap['image'] ); ?>" alt="" loading="lazy"><h3><?php echo $cap['title']; ?></h3><p><?php echo $cap['text']; ?></p></a>
<?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Quote-to-install flow -->
  <section class="osec osec--tight">
    <div class="wrap flow__wrap">
      <div class="head" style="margin-bottom:0">
        <div class="tag"><?php rtg_e( 'flow_tag' ); ?></div>
        <h2 class="h2"><?php rtg_e( 'flow_title' ); ?></h2>
      </div>
      <ol class="flow">
<?php
$flow = rtg_items( 'flow' );
foreach ( $flow as $i => $step ) :
	$pdf = '' !== $step['new_tab'];
	?>
        <li><h3><?php echo $step['title']; ?></h3><p><?php echo $step['text']; ?></p><a href="<?php echo esc_url( $step['url'] ); ?>" class="btn <?php echo count( $flow ) - 1 === $i ? 'btn--red' : 'btn--line'; ?> btn--sm"<?php echo $pdf ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo $pdf ? '<svg><use href="#i-doc"/></svg>' : ''; ?><span><?php echo $step['btn']; ?></span></a></li>
<?php endforeach; ?>
      </ol>
    </div>
  </section>

  <!-- Tutorials teaser -->
  <section class="osec osec--tight">
    <div class="wrap">
      <div class="head head--row" style="margin-bottom:10px">
        <div>
          <div class="tag"><?php rtg_e( 'tut_tag' ); ?></div>
          <h2 class="h2"><?php rtg_e( 'tut_title' ); ?></h2>
        </div>
        <a href="<?php echo esc_url( rtg_f( 'tut_btn_url' ) ); ?>" class="btn btn--line"><span><?php rtg_e( 'tut_btn_text' ); ?></span><svg><use href="#i-arrow"/></svg></a>
      </div>
      <div class="docs">
<?php foreach ( rtg_items( 'tut_docs' ) as $doc ) : ?>
        <article class="doc">
          <span class="doc__ic"><svg><use href="#i-doc"/></svg></span>
          <h3><?php echo $doc['title']; ?></h3>
          <p><?php echo $doc['text']; ?></p>
          <a href="<?php echo esc_url( $doc['url'] ); ?>" class="btn btn--line btn--sm"<?php echo '' !== $doc['new_tab'] ? ' target="_blank" rel="noopener"' : ''; ?>><span><?php echo $doc['btn']; ?></span></a>
        </article>
<?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Brands -->
  <section class="osec osec--tight">
    <div class="wrap">
      <div class="tag" style="text-align:center"><?php rtg_e( 'brands_tag' ); ?></div>
      <div class="brands">
        <?php foreach ( rtg_items( 'brands' ) as $brand ) : ?><span><?php echo $brand['name']; ?></span><?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Sister companies -->
  <section class="osec osec--tight">
    <div class="wrap sister">
<?php foreach ( rtg_items( 'sisters' ) as $sis ) : ?>
      <a href="<?php echo esc_url( $sis['url'] ); ?>"><span><small><?php echo $sis['name']; ?></small><b><?php echo $sis['label']; ?></b></span><svg><use href="#i-arrow"/></svg></a>
<?php endforeach; ?>
    </div>
  </section>
</main>

<?php get_template_part( 'parts/footer', 'v2', array( 'big' => false ) ); ?>
<?php
get_footer();

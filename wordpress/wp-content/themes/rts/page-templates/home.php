<?php
/**
 * Template Name: Home
 *
 * Converted from rts/index.html.
 *
 * @package RTS
 */

rtg_page(
	array(
		'title'       => 'Robertson Truck Sales | Ohio\'s Premiere Used Truck Dealer',
		'description' => 'Robertson Truck Group – Ohio\'s premiere used medium and heavy-duty truck dealer in Mount Vernon, OH. Fabrication, upfitting, financing and road-ready trucks. 42 years in the making.',
		'body_class'  => 'is-loading',
		'styles'      => array( 'css/v2.css', 'css/site.css', 'css/chat.css' ),
		'scripts'     => array(
			'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
			'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
			'https://unpkg.com/lenis@1.1.13/dist/lenis.min.js',
			'js/inventory-data.js',
			'js/chat.js',
			'js/v2.js',
		),
	)
);

rtg_fields_for( 'home' );
get_header();
?>
<!-- Icon sprite -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></symbol>
  <symbol id="i-arrow-ur" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M7 17 17 7M8 7h9v9"/></symbol>
  <symbol id="i-pin" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></g></symbol>
  <symbol id="i-spark" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2c.4 4.6 2.4 7.6 8 8.4v1.2c-5.6.8-7.6 3.8-8 8.4h-1.2c-.4-4.6-2.4-7.6-8-8.4v-1.2c5.6-.8 7.6-3.8 8-8.4H12z"/></symbol>
  <symbol id="i-send" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="m22 2-7 20-4-9-9-4 20-7zM22 2 11 13"/></symbol>
  <symbol id="i-wrench" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.8-3.8a6 6 0 0 1-7.9 7.9l-6.9 6.9a2.1 2.1 0 0 1-3-3l6.9-6.9a6 6 0 0 1 7.9-7.9z"/></symbol>
  <symbol id="i-truck" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2M15 18H9M19 18h2a1 1 0 0 0 1-1v-3.6a1 1 0 0 0-.2-.6l-3.5-4.4A1 1 0 0 0 17.5 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></g></symbol>
  <symbol id="i-award" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.5 12.9 17 22l-5-3-5 3 1.5-9.1"/></g></symbol>
  <symbol id="i-dollar" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2.5"/><path d="M6 12h.01M18 12h.01"/></g></symbol>
  <symbol id="i-shield" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></g></symbol>
  <symbol id="i-check" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M20 6 9 17l-5-5"/></symbol>
  <symbol id="i-plus" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M12 5v14M5 12h14"/></symbol>
</svg>

<!-- Preloader -->
<div class="loader" id="loader" aria-hidden="true">
  <div class="loader__inner">
    <svg class="loader__shield" viewBox="0 0 24.6 26.4"><path d="M12.2.2c9.1 0 12.2 3.6 12.2 3.6s.8 7.9-3 13.6c-3.3 5-8.2 8.4-9.2 9.1-1-.7-5.9-4.1-9.2-9.1C-.8 11.7 0 3.8 0 3.8S3.1.2 12.2.2"/></svg>
    <img src="<?php rtg_a( 'images/rts-emblem.svg' ); ?>" alt="" class="loader__emblem">
    <div class="loader__count"><span id="loadNum">0</span>%</div>
    <div class="loader__label">Warming up the engine</div>
  </div>
  <div class="loader__curtain"></div>
</div>

<!-- Scroll progress -->
<div class="progress" id="progress"></div>
<div class="grain" aria-hidden="true"></div>

<!-- ===== Nav ===== -->
<?php get_template_part( 'parts/nav', 'v2', array( 'contact' => 'rts', 'cta_url' => rtg_url( 'rts', 'inventory' ), 'cta_label' => 'View Inventory' ) ); ?>

<main>

<!-- ===== HERO ===== -->
<section class="hero" id="top">
  <div class="hero__media">
    <img src="<?php echo esc_url( rtg_f( 'hero_image' ) ); ?>" alt="" class="hero__img">
  </div>
  <div class="hero__glow hero__glow--a"></div>
  <div class="hero__glow hero__glow--b"></div>

  <div class="hero__content">
    <div class="pill hero__pill"><span class="pill__dot"></span><?php rtg_e( 'hero_pill' ); ?></div>
    <h1 class="hero__title">
      <span class="line"><span class="split"><?php rtg_e( 'hero_title_1' ); ?></span></span>
      <span class="line"><span class="split outline"><?php rtg_e( 'hero_title_2' ); ?></span></span>
      <span class="line"><span class="split"><?php rtg_e( 'hero_title_3' ); ?></span></span>
    </h1>
    <p class="hero__sub"><?php rtg_e( 'hero_sub_1' ); ?> <span class="rotator" id="rotator"><?php rtg_e( 'hero_rotator' ); ?></span><br><?php rtg_e( 'hero_sub_2' ); ?></p>

    <div class="hero__ctas">
      <a href="<?php echo esc_url( rtg_f( 'hero_btn1_url' ) ); ?>" class="btn btn--red"><span><?php rtg_e( 'hero_btn1_text' ); ?></span><svg><use href="#i-arrow"/></svg></a>
      <a href="<?php echo esc_url( rtg_f( 'hero_btn2_url' ) ); ?>" class="btn btn--line"><span><?php rtg_e( 'hero_btn2_text' ); ?></span></a>
    </div>

    <!-- AI Finder: searches the inventory -->
    <form class="ai-search" id="aiSearch" action="<?php rtg_u( 'rts', 'inventory' ); ?>" autocomplete="off">
      <div class="ai-search__border"></div>
      <div class="ai-search__inner">
        <span class="ai-search__ic"><svg><use href="#i-spark"/></svg></span>
        <label for="aiInput" class="sr">Describe the truck you need</label>
        <input id="aiInput" name="q" type="text" placeholder="Describe the truck you need…">
        <button type="submit" class="ai-search__btn" aria-label="Search inventory"><span><?php rtg_e( 'hero_search_btn' ); ?></span><svg><use href="#i-arrow"/></svg></button>
      </div>
    </form>
    <div class="hero__types">
      <span><?php rtg_e( 'hero_types_label' ); ?></span>
<?php foreach ( rtg_items( 'hero_types' ) as $it ) : ?>
      <a href="<?php echo esc_url( $it['url'] ); ?>"><?php echo $it['text']; ?></a>
<?php endforeach; ?>
    </div>
  </div>

  <div class="hero__side">
<?php foreach ( rtg_items( 'hero_cards' ) as $i => $it ) : ?>
    <div class="glass-card<?php echo $i % 2 ? ' float--d' : ''; ?>">
      <span class="glass-card__k"><?php echo $it['kind']; ?></span>
      <strong><span data-count="<?php echo rtg_attr( $it['num'] ); ?>">0</span><?php echo $it['suffix']; ?></strong>
      <span><?php echo $it['text']; ?></span>
    </div>
<?php endforeach; ?>
  </div>

  <a href="#featured" class="hero__scroll"><span>Scroll</span><i></i></a>
</section>

<!-- ===== Featured inventory (inventory first) ===== -->
<section class="feat" id="featured">
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

<!-- ===== Value My Trade ===== -->
<section class="tradeband">
  <div class="wrap">
    <div class="tradeband__in">
      <div>
        <div class="tag tag--light"><?php rtg_e( 'trade_tag' ); ?></div>
        <h2><?php rtg_e( 'trade_title' ); ?></h2>
        <p><?php rtg_e( 'trade_text' ); ?></p>
        <a href="<?php echo esc_url( rtg_f( 'trade_btn_url' ) ); ?>" class="btn btn--white"><span><?php rtg_e( 'trade_btn_text' ); ?></span><svg><use href="#i-arrow"/></svg></a>
      </div>
      <ol class="tradeband__steps">
<?php foreach ( rtg_items( 'trade_steps' ) as $i => $it ) : ?>
        <li><b><?php echo (int) $i + 1; ?></b><?php echo $it['text']; ?></li>
<?php endforeach; ?>
      </ol>
    </div>
  </div>
</section>

<!-- ===== Marquee ===== -->
<div class="marquee" aria-label="Brands">
  <div class="marquee__track">
<?php for ( $pass = 0; $pass < 2; $pass++ ) : ?>
    <?php foreach ( rtg_items( 'brands' ) as $it ) : ?><span><?php echo $it['name']; ?></span><i></i><?php endforeach; ?>

<?php endfor; ?>
  </div>
</div>

<!-- ===== Intro (scroll-lit text) ===== -->
<section class="intro" id="intro">
  <div class="wrap">
    <div class="tag"><?php rtg_e( 'intro_tag' ); ?></div>
    <p class="lit-text" id="litText"><?php rtg_e( 'intro_lead' ); ?></p>
    <div class="intro__grid">
      <?php rtg_e( 'intro_text' ); ?>
    </div>

    <div class="rings">
<?php foreach ( rtg_items( 'rings' ) as $it ) : ?>
      <div class="ring reveal">
        <svg viewBox="0 0 120 120"><circle cx="60" cy="60" r="52"/><circle class="ring__bar" cx="60" cy="60" r="52" style="--p:<?php echo rtg_attr( $it['pct'] ); ?>"/></svg>
        <div class="ring__val"><span data-count="<?php echo rtg_attr( $it['num'] ); ?>">0</span><?php echo $it['suffix']; ?></div>
        <span class="ring__label"><?php echo $it['label']; ?></span>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== Bento: The Standard ===== -->
<section class="bento-sec">
  <div class="wrap">
    <div class="head">
      <div class="tag"><?php rtg_e( 'bento_tag' ); ?></div>
      <h2 class="h2 reveal"><?php rtg_e( 'bento_title' ); ?></h2>
    </div>

    <div class="bento">
<?php
$letters = array( 'a', 'b', 'c', 'd', 'e' );
foreach ( rtg_items( 'bento' ) as $i => $it ) :
	$letter = $letters[ $i ] ?? 'e';
	$cls    = 'tile' . ( $it['image'] ? ' tile--img' : '' ) . ' tile--' . $letter . ( 'e' === $letter ? ' tile--red' : '' );
	?>
      <article class="<?php echo esc_attr( $cls ); ?> reveal">
	<?php if ( $it['image'] ) : ?>
        <img src="<?php echo esc_url( $it['image'] ); ?>" alt="<?php echo rtg_attr( $it['image_alt'] ); ?>" loading="lazy">
        <div class="tile__body">
	<?php endif; ?>
        <span class="tile__ic"><svg><use href="#i-<?php echo rtg_attr( $it['icon'] ); ?>"/></svg></span>
        <h3><?php echo $it['title']; ?></h3>
        <p><?php echo $it['text']; ?></p>
	<?php if ( $it['link_text'] ) : ?>
        <a href="<?php echo esc_url( $it['link_url'] ); ?>" class="tile__link"><?php echo $it['link_text']; ?> <svg><use href="#i-arrow-ur"/></svg></a>
	<?php endif; ?>
	<?php if ( $it['image'] ) : ?>
        </div>
	<?php endif; ?>
      </article>
<?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== Capabilities horizontal scroll ===== -->
<section class="hscroll" id="hscroll">
  <div class="hscroll__pin">
    <div class="hscroll__head wrap">
      <div>
        <div class="tag"><?php rtg_e( 'caps_tag' ); ?></div>
        <h2 class="h2"><?php rtg_e( 'caps_title' ); ?></h2>
      </div>
      <p><?php rtg_e( 'caps_text' ); ?> <a href="<?php echo esc_url( rtg_f( 'caps_link_url' ) ); ?>" class="ul"><?php rtg_e( 'caps_link_text' ); ?></a></p>
    </div>
    <div class="hscroll__track" id="hTrack">
<?php foreach ( rtg_items( 'caps' ) as $i => $it ) : ?>
      <article class="cap">
        <img src="<?php echo esc_url( $it['image'] ); ?>" alt="<?php echo rtg_attr( $it['alt'] ); ?>" loading="lazy">
        <div class="cap__body"><span class="cap__n"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span><h3><?php echo $it['title']; ?></h3></div>
      </article>
<?php endforeach; ?>
      <a href="<?php echo esc_url( rtg_f( 'caps_cta_url' ) ); ?>" class="cap cap--cta" aria-label="View all capabilities">
        <svg class="cap__spin" viewBox="0 0 200 200" aria-hidden="true"><defs><path id="circ" d="M100,100 m-78,0 a78,78 0 1,1 156,0 a78,78 0 1,1 -156,0"/></defs><text><textPath href="#circ">VIEW ALL CAPABILITIES • VIEW ALL CAPABILITIES • </textPath></text></svg>
        <span class="cap__arrow"><svg><use href="#i-arrow-ur"/></svg></span>
      </a>
    </div>
  </div>
</section>

<!-- ===== Upfit story ===== -->
<section class="story">
  <div class="wrap story__grid">
    <div class="story__media">
      <div class="story__img reveal-clip"><img src="<?php echo esc_url( rtg_f( 'story_image' ) ); ?>" alt="<?php echo rtg_attr( rtg_f( 'story_image_alt' ) ); ?>" loading="lazy"></div>
      <div class="story__chip float"><svg><use href="#i-check"/></svg><?php rtg_e( 'story_chip' ); ?></div>
    </div>
    <div class="story__copy">
      <div class="tag"><?php rtg_e( 'story_tag' ); ?></div>
      <h2 class="h2 reveal"><?php rtg_e( 'story_title' ); ?></h2>
      <?php rtg_e( 'story_text' ); ?>
      <a href="<?php echo esc_url( rtg_f( 'story_btn1_url' ) ); ?>" class="btn btn--red reveal"><span><?php rtg_e( 'story_btn1_text' ); ?></span><svg><use href="#i-arrow"/></svg></a>
      <a href="<?php echo esc_url( rtg_f( 'story_btn2_url' ) ); ?>" class="btn btn--line reveal"><span><?php rtg_e( 'story_btn2_text' ); ?></span><svg><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>

<!-- ===== Featured products ===== -->
<section class="prods">
  <div class="wrap">
    <div class="head head--row">
      <div>
        <div class="tag"><?php rtg_e( 'prods_tag' ); ?></div>
        <h2 class="h2 reveal"><?php rtg_e( 'prods_title' ); ?></h2>
      </div>
      <a href="<?php echo esc_url( rtg_f( 'prods_btn_url' ) ); ?>" class="btn btn--line"><span><?php rtg_e( 'prods_btn_text' ); ?></span><svg><use href="#i-arrow"/></svg></a>
    </div>
    <div class="prods__grid">
<?php foreach ( rtg_items( 'prods' ) as $it ) : ?>
      <a href="<?php echo esc_url( $it['url'] ); ?>" class="prod reveal"><div class="prod__img"><img src="<?php echo esc_url( $it['image'] ); ?>" alt="<?php echo rtg_attr( $it['name'] ); ?>" loading="lazy"></div><div class="prod__meta"><h3><?php echo $it['name']; ?></h3><span class="prod__go"><svg><use href="#i-arrow-ur"/></svg></span></div><i class="prod__glare"></i></a>
<?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== Inventory + types ===== -->
<section class="inv">
  <div class="wrap inv__grid">
    <div class="inv__copy">
      <div class="tag"><?php rtg_e( 'inv_tag' ); ?></div>
      <h2 class="h2 reveal"><?php rtg_e( 'inv_title' ); ?></h2>
      <p class="reveal"><?php rtg_e( 'inv_p1_start' ); ?> <a href="<?php echo esc_url( rtg_f( 'inv_p1_url' ) ); ?>" class="ul"><?php rtg_e( 'inv_p1_link' ); ?></a><?php rtg_e( 'inv_p1_end' ); ?></p>
      <p class="reveal"><?php rtg_e( 'inv_p2' ); ?></p>
    </div>
    <div class="inv__panel reveal">
<?php $inv_tabs = rtg_items( 'inv_tabs' ); ?>
      <div class="tabs" role="tablist">
<?php foreach ( $inv_tabs as $i => $it ) : ?>
        <button role="tab" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>" data-tab="<?php echo (int) $i; ?>"><?php echo $it['label']; ?></button>
<?php endforeach; ?>
        <span class="tabs__ink"></span>
      </div>
      <div class="tabpanes">
<?php foreach ( $inv_tabs as $i => $it ) : ?>
        <div class="tabpane<?php echo 0 === $i ? ' is-active' : ''; ?>">
          <h3><?php echo $it['title']; ?></h3>
          <p><?php echo $it['text']; ?></p>
	<?php
	$chips = array_filter( array_map( 'trim', explode( ',', $it['chips'] ) ), 'strlen' );
	if ( $chips ) :
		?>
          <div class="chips"><?php foreach ( $chips as $chip ) : ?><span><?php echo $chip; ?></span><?php endforeach; ?></div>
	<?php endif; ?>
        </div>
<?php endforeach; ?>
      </div>
      <form class="stock" action="<?php rtg_u( 'rts', 'inventory' ); ?>">
        <label for="stock2">Stock</label>
        <input id="stock2" name="q" type="text" placeholder="Stock #">
        <button type="submit" class="btn btn--red btn--sm"><span>Search</span></button>
      </form>
    </div>
  </div>
</section>

<!-- ===== Buyer's guide road ===== -->
<section class="guide" id="guide">
  <div class="wrap">
    <div class="head head--center">
      <div class="tag"><?php rtg_e( 'guide_tag' ); ?></div>
      <h2 class="h2 reveal"><?php rtg_e( 'guide_title' ); ?></h2>
      <p class="reveal"><?php rtg_e( 'guide_text' ); ?></p>
    </div>

    <div class="road" id="road">
      <div class="road__line"><div class="road__fill" id="roadFill"></div></div>
      <div class="road__truck" id="roadTruck"><svg><use href="#i-truck"/></svg></div>

<?php foreach ( rtg_items( 'guide_stops' ) as $i => $it ) : ?>
      <article class="stop reveal">
        <div class="stop__n"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></div>
        <div class="stop__card">
          <h3><?php echo $it['title']; ?></h3>
          <?php echo $it['text']; ?>
        </div>
      </article>
<?php endforeach; ?>
      <div class="road__end reveal"><svg><use href="#i-check"/></svg><?php rtg_e( 'guide_end' ); ?></div>
    </div>
  </div>
</section>

<!-- ===== AI Assistant ===== -->
<section class="assist" id="assist">
  <div class="wrap assist__grid">
    <div class="assist__copy">
      <div class="tag"><?php rtg_e( 'assist_tag' ); ?></div>
      <h2 class="h2 reveal"><?php rtg_e( 'assist_title' ); ?></h2>
      <p class="reveal"><?php rtg_e( 'assist_text' ); ?></p>
      <div class="assist__qs">
<?php foreach ( rtg_items( 'assist_links' ) as $it ) : ?>
        <a href="<?php echo esc_url( $it['url'] ); ?>"><svg><use href="#i-<?php echo rtg_attr( $it['icon'] ); ?>"/></svg><?php echo $it['text']; ?></a>
<?php endforeach; ?>
      </div>
    </div>
    <div class="reveal" id="chat"></div>
  </div>
</section>

<!-- ===== CTA ===== -->
<section class="cta">
  <div class="cta__blob"></div>
  <div class="wrap cta__in">
    <div class="tag tag--light"><?php rtg_e( 'cta_tag' ); ?></div>
    <h2 class="cta__title reveal"><?php rtg_e( 'cta_title' ); ?></h2>
    <p class="reveal"><?php rtg_e( 'cta_text' ); ?></p>
    <div class="cta__row reveal">
      <a href="<?php echo esc_url( rtg_f( 'cta_tel' ) ); ?>" class="cta__phone"><small><?php rtg_e( 'cta_phone_label' ); ?></small><?php rtg_e( 'cta_phone' ); ?></a>
      <a href="<?php echo esc_url( rtg_f( 'cta_btn_url' ) ); ?>" class="btn btn--white"><span><?php rtg_e( 'cta_btn_text' ); ?></span><svg><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>

<!-- ===== Divisions ===== -->
<section class="divs">
  <div class="wrap">
    <div class="divs__top">
      <div>
        <div class="tag"><?php rtg_e( 'divs_tag' ); ?></div>
        <a href="<?php echo esc_url( rtg_f( 'divs_logo_url' ) ); ?>"><img src="<?php echo esc_url( rtg_f( 'divs_logo' ) ); ?>" alt="Robertson Truck Group" class="divs__rtg reveal" width="698" height="205"></a>
      </div>
      <div class="divs__logos">
<?php foreach ( rtg_items( 'divisions' ) as $it ) : ?>
        <a href="<?php echo esc_url( $it['url'] ); ?>" class="dlogo reveal"><img src="<?php echo esc_url( $it['logo'] ); ?>" alt="<?php echo rtg_attr( $it['name'] ); ?>"><svg><use href="#i-arrow-ur"/></svg></a>
<?php endforeach; ?>
      </div>
    </div>

    <div class="locs">
<?php foreach ( rtg_items( 'locs' ) as $i => $it ) : ?>
      <div class="loc reveal">
        <span class="loc__n"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
        <h3><?php echo $it['name']; ?></h3>
        <address><?php echo $it['address']; ?></address>
        <a href="<?php echo esc_url( $it['tel'] ); ?>"><svg><use href="#i-phone"/></svg><?php echo $it['phone']; ?></a>
      </div>
<?php endforeach; ?>
    </div>
  </div>
</section>

</main>

<?php get_template_part( 'parts/footer', 'v2', array( 'big' => true ) ); ?>
<?php
get_footer();

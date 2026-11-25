<?php
/**
 * Blog index (the page set as "Posts page"). Converted from rts/blog.html.
 *
 * @package RTS
 */

$rtg_posts    = $wp_query->posts;
$rtg_featured = array_shift( $rtg_posts );
$rtg_cats     = rtg_blog_categories( $rtg_posts );

rtg_page(
	array(
		'title'       => 'Blog – Truck Buying Guides & Insights | Robertson Truck Sales',
		'description' => 'Guides, costs and buying tips for used medium and heavy-duty trucks, trailers, leasing and storage containers in Ohio from Robertson Truck Sales.',
		'body_class'  => 'page-blog',
		'styles'      => array( 'css/style.css', 'css/inner.css', 'css/blog.css', 'css/dark.css', 'css/chat.css' ),
		'scripts'     => array(
			'js/main.js',
			'js/blog.js',
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

rtg_fields_for( 'blog' );
get_header();
?>
<!-- SVG icon sprite -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></symbol>
  <symbol id="i-mail" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></g></symbol>
  <symbol id="i-pin" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></g></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></symbol>
  <symbol id="i-search" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></g></symbol>
  <symbol id="i-truck" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2M15 18H9M19 18h2a1 1 0 0 0 1-1v-3.6a1 1 0 0 0-.2-.6l-3.5-4.4A1 1 0 0 0 17.5 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></g></symbol>
  <symbol id="i-dollar" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2.5"/><path d="M6 12h.01M18 12h.01"/></g></symbol>
  <symbol id="i-chev" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6"/></symbol>
  <symbol id="i-x" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" d="M18 6 6 18M6 6l12 12"/></symbol>
  <symbol id="i-clock" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></g></symbol>
  <symbol id="i-cal" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/></g></symbol>
  <symbol id="i-book" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20V3H6.5A2.5 2.5 0 0 0 4 5.5z"/><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20v-5"/></g></symbol>
  <symbol id="i-tag" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.6 13.4 13.4 20.6a2 2 0 0 1-2.8 0L3 13V3h10l7.6 7.6a2 2 0 0 1 0 2.8z"/><circle cx="7.5" cy="7.5" r="1.5"/></g></symbol>
</svg>

<a class="skip" href="#main">Skip to content</a>

<?php get_template_part( 'parts/nav', 'classic', array( 'active' => rtg_blog_url() ) ); ?>

<main id="main">

<!-- ===== Page hero ===== -->
<section class="hero hero--inner hero--blog">
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
    </div>

    <form class="hsearch glass-card" id="heroSearch" role="search" action="#posts">
      <label for="heroQ"><strong><?php rtg_e( 'search_title' ); ?></strong><span><?php echo str_replace( '{count}', (string) (int) count( $rtg_posts ), rtg_f( 'search_sub' ) ); // phpcs:ignore WordPress.Security.EscapeOutput -- sanitised field. ?></span></label>
      <div class="hsearch__field">
        <svg><use href="#i-search"/></svg>
        <input id="heroQ" type="search" placeholder="e.g. lease, dump truck, trailer…" autocomplete="off">
        <button type="submit" class="btn btn--red btn--sm"><?php rtg_e( 'search_btn' ); ?></button>
      </div>
      <div class="hsearch__tags" aria-label="Popular searches">
        <span><?php rtg_e( 'search_popular' ); ?></span>
<?php foreach ( rtg_items( 'search_tags' ) as $rtg_tag ) : ?>
        <button type="button" data-q="<?php echo rtg_attr( $rtg_tag['q'] ); ?>"><?php echo $rtg_tag['label']; ?></button>
<?php endforeach; ?>
      </div>
    </form>
  </div>

  <div class="hero__dots" id="heroDots" role="tablist" aria-label="Hero slides"></div>
</section>

<!-- ===== Featured post ===== -->
<section class="featured-post">
  <div class="container">
    <?php if ( $rtg_featured ) : ?>
    <?php get_template_part( 'parts/post', 'featured', array( 'post' => $rtg_featured ) ); ?>
<?php endif; ?>
  </div>
</section>

<!-- ===== Posts ===== -->
<section class="section posts" id="posts">
  <div class="container posts__grid">
    <div class="posts__main">
      <div class="ptools">
        <div class="pchips" role="group" aria-label="Filter by topic">
          <button type="button" class="pchip is-active" data-filter="all" aria-pressed="true">All <span><?php echo (int) count( $rtg_posts ); ?></span></button>
<?php foreach ( $rtg_cats as $rtg_cat ) : ?>
          <button type="button" class="pchip" data-filter="<?php echo esc_attr( $rtg_cat['slug'] ); ?>" aria-pressed="false"><?php echo esc_html( $rtg_cat['name'] ); ?> <span><?php echo (int) $rtg_cat['count']; ?></span></button>
<?php endforeach; ?>
        </div>
        <label class="psearch">
          <span class="sr-only">Search articles</span>
          <svg><use href="#i-search"/></svg>
          <input type="search" id="postQ" placeholder="Search articles…" autocomplete="off">
          <button type="button" class="psearch__clear" aria-label="Clear search"><svg><use href="#i-x"/></svg></button>
        </label>
      </div>
      <p class="pstatus" id="pstatus" aria-live="polite"></p>

      <div class="plist" id="plist">
<?php foreach ( $rtg_posts as $rtg_post ) : ?>
        <?php get_template_part( 'parts/post', 'card', array( 'post' => $rtg_post, 'filterable' => true ) ); ?>
<?php endforeach; ?>
      </div>

      <div class="pempty" id="pempty" hidden>
        <svg><use href="#i-search"/></svg>
        <h3><?php rtg_e( 'empty_title' ); ?></h3>
        <p><?php rtg_e( 'empty_text' ); ?></p>
        <button type="button" class="btn btn--navy btn--sm" id="pReset"><?php rtg_e( 'empty_btn' ); ?></button>
      </div>

      <div class="pmore" id="pmore">
        <div class="pmore__bar"><i id="pmoreFill"></i></div>
        <p id="pmoreTxt"></p>
        <button type="button" class="btn btn--navy" id="pmoreBtn"><?php rtg_e( 'more_btn' ); ?> <svg style="transform:rotate(90deg)"><use href="#i-chev"/></svg></button>
      </div>
    </div>

    <aside class="side" aria-label="Blog sidebar">
      <div class="side__card">
        <h3 class="side__title"><svg><use href="#i-tag"/></svg><?php rtg_e( 'side_topics_title' ); ?></h3>
        <ul class="side__topics">
<?php foreach ( $rtg_cats as $rtg_cat ) : ?>
          <li><button type="button" data-topic="<?php echo esc_attr( $rtg_cat['slug'] ); ?>"><span><?php echo esc_html( $rtg_cat['name'] ); ?></span><em><?php echo (int) $rtg_cat['count']; ?></em></button></li>
<?php endforeach; ?>
        </ul>
      </div>
      <div class="side__card">
        <h3 class="side__title"><svg><use href="#i-book"/></svg><?php rtg_e( 'side_recent_title' ); ?></h3>
        <ul class="side__recent">
<?php foreach ( array_slice( $wp_query->posts, 0, 4 ) as $rtg_post ) : ?>
          <li><a href="<?php echo esc_url( get_permalink( $rtg_post ) ); ?>"><img src="<?php echo esc_url( rtg_post_image( $rtg_post ) ); ?>" alt="" loading="lazy"><span><b><?php echo esc_html( get_the_title( $rtg_post ) ); ?></b><time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d', $rtg_post ) ); ?>"><?php echo esc_html( get_the_date( 'M j, Y', $rtg_post ) ); ?></time></span></a></li>
<?php endforeach; ?>
        </ul>
      </div>
      <div class="side__cta">
        <img src="<?php echo esc_url( rtg_f( 'side_cta_image' ) ); ?>" alt="" width="56" height="56">
        <h3><?php rtg_e( 'side_cta_title' ); ?></h3>
        <p><?php rtg_e( 'side_cta_text' ); ?></p>
        <a href="<?php echo esc_url( rtg_f( 'side_cta_btn_url' ) ); ?>" class="btn btn--white btn--sm"><?php rtg_e( 'side_cta_btn_text' ); ?> <svg><use href="#i-arrow"/></svg></a>
        <a href="<?php echo esc_url( rtg_f( 'side_cta_tel' ) ); ?>" class="side__phone"><svg><use href="#i-phone"/></svg><?php rtg_e( 'side_cta_phone' ); ?></a>
      </div>
    </aside>
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
    <div class="divisions__logos" style="margin-bottom:0">
<?php foreach ( rtg_items( 'divisions' ) as $rtg_div ) : ?>
      <a href="<?php echo esc_url( $rtg_div['url'] ); ?>" class="dlogo reveal"><img src="<?php echo esc_url( $rtg_div['logo'] ); ?>" alt="<?php echo rtg_attr( $rtg_div['name'] ); ?>"><span><?php echo $rtg_div['cta']; ?> <svg><use href="#i-arrow"/></svg></span></a>
<?php endforeach; ?>
    </div>
  </div>
</section>

</main>

<?php get_template_part( 'parts/footer', 'classic' ); ?>
<?php
get_footer();

<?php
/**
 * Single blog post. Converted from rts/blog-detail.html.
 *
 * @package RTS
 */

$rtg_post = get_queried_object();
$rtg_cat  = rtg_post_category( $rtg_post );
$rtg_img  = rtg_post_image( $rtg_post );

rtg_page(
	array(
		'title'       => single_post_title( '', false ) . ' | Robertson Truck Sales Blog',
		'description' => wp_strip_all_tags( get_the_excerpt( $rtg_post ) ),
		'body_class'  => 'page-post',
		'styles'      => array( 'css/style.css', 'css/inner.css', 'css/blog.css', 'css/post.css', 'css/dark.css', 'css/chat.css' ),
		'scripts'     => array(
			'js/main.js',
			'js/post.js',
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

get_header();
the_post();
?>
<!-- SVG icon sprite -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></symbol>
  <symbol id="i-mail" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></g></symbol>
  <symbol id="i-pin" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></g></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></symbol>
  <symbol id="i-check" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="M20 6 9 17l-5-5"/></symbol>
  <symbol id="i-truck" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2M15 18H9M19 18h2a1 1 0 0 0 1-1v-3.6a1 1 0 0 0-.2-.6l-3.5-4.4A1 1 0 0 0 17.5 8H14"/><circle cx="17" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></g></symbol>
  <symbol id="i-dollar" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"/><circle cx="12" cy="12" r="2.5"/><path d="M6 12h.01M18 12h.01"/></g></symbol>
  <symbol id="i-chev" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6"/></symbol>
  <symbol id="i-clock" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></g></symbol>
  <symbol id="i-cal" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/></g></symbol>
  <symbol id="i-list" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M8 6h13M8 12h13M8 18h13M3.5 6h.01M3.5 12h.01M3.5 18h.01"/></symbol>
  <symbol id="i-bolt" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M13 2 3 14h9l-1 8 10-12h-9z"/></symbol>
  <symbol id="i-link" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.5.5l3-3a5 5 0 0 0-7-7l-1.7 1.7"/><path d="M14 11a5 5 0 0 0-7.5-.5l-3 3a5 5 0 0 0 7 7l1.7-1.7"/></g></symbol>
  <symbol id="i-fb" viewBox="0 0 24 24"><path fill="currentColor" d="M14 8V6.5c0-.8.2-1.3 1.4-1.3H17V2.2C16.7 2.1 15.7 2 14.6 2 12.2 2 10.6 3.4 10.6 6v2H8v3.2h2.6V22H14V11.2h2.7L17 8z"/></symbol>
  <symbol id="i-in" viewBox="0 0 24 24"><path fill="currentColor" d="M6.9 21H3.4V9h3.5zM5.2 7.4a2 2 0 1 1 0-4.1 2 2 0 0 1 0 4.1zM21 21h-3.5v-5.8c0-1.4 0-3.2-2-3.2s-2.2 1.5-2.2 3.1V21H9.8V9h3.3v1.6h.1c.5-.9 1.6-1.9 3.4-1.9 3.6 0 4.3 2.4 4.3 5.4z"/></symbol>
  <symbol id="i-xs" viewBox="0 0 24 24"><path fill="currentColor" d="M17.8 3h3.1l-6.8 7.7L22 21h-6.2l-4.9-6.4L5.3 21H2.2l7.3-8.3L1.8 3h6.4l4.4 5.8zm-1.1 16.2h1.7L7.4 4.7H5.6z"/></symbol>
  <symbol id="i-plus" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" d="M12 5v14M5 12h14"/></symbol>
  <symbol id="i-hash" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M4 9h16M4 15h16M10 3 8 21M16 3l-2 18"/></symbol>
</svg>

<a class="skip" href="#article">Skip to article</a>
<div class="rprogress" aria-hidden="true"><i id="rprogress"></i></div>

<?php get_template_part( 'parts/nav', 'classic', array( 'active' => rtg_blog_url() ) ); ?>

<main id="main">

<!-- ===== Article hero ===== -->
<section class="phero">
  <div class="phero__bg" style="background-image:url(<?php echo esc_url( $rtg_img ); ?>)"></div>
  <div class="container phero__in">
    <nav class="crumbs" aria-label="Breadcrumb">
      <a href="<?php rtg_u( 'rts', '' ); ?>">Home</a><svg><use href="#i-chev"/></svg><a href="<?php echo esc_url( rtg_blog_url() ); ?>">Blog</a><svg><use href="#i-chev"/></svg><span aria-current="page"><?php echo esc_html( $rtg_cat ? $rtg_cat->name : get_the_title() ); ?></span>
    </nav>
    <h1><?php the_title(); ?></h1>
    <div class="phero__meta">
      <span class="phero__author"><img src="<?php rtg_a( 'images/rts-emblem.svg' ); ?>" alt="" width="40" height="40"><span><small>Written by</small><b>Robertson Truck Group</b></span></span>
      <span><svg><use href="#i-cal"/></svg><time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></time></span>
      <span><svg><use href="#i-clock"/></svg><?php echo (int) rtg_read_time( $rtg_post ); ?> min read</span>
    </div>
  </div>
</section>

<!-- ===== Article ===== -->
<section class="post">
  <div class="container post__grid">
    <article class="post__main" id="article">
      <figure class="post__cover">
        <img src="<?php echo esc_url( $rtg_img ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" width="1000" height="562">
      </figure>

      <details class="toc-m" id="tocMobile">
        <summary><svg><use href="#i-list"/></svg>In this article <span class="toc-m__n"></span><svg class="toc-m__chev"><use href="#i-chev"/></svg></summary>
        <ol class="toc-list"></ol>
      </details>

      <div class="prose" id="prose">
        <?php the_content(); ?>
      </div>

      <div class="post__end">
        <div class="post__tags"><svg><use href="#i-hash"/></svg><span>Filed under</span><a href="<?php echo esc_url( rtg_blog_url() ); ?>"><?php echo esc_html( $rtg_cat ? $rtg_cat->name : 'Blog' ); ?></a></div>
        <div class="share share--inline" aria-label="Share this article">
          <span>Share</span>
          <a class="share__btn" data-share="fb" href="#" target="_blank" rel="noopener" aria-label="Share on Facebook"><svg><use href="#i-fb"/></svg></a>
          <a class="share__btn" data-share="in" href="#" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><svg><use href="#i-in"/></svg></a>
          <a class="share__btn" data-share="x" href="#" target="_blank" rel="noopener" aria-label="Share on X"><svg><use href="#i-xs"/></svg></a>
          <a class="share__btn" data-share="mail" href="#" aria-label="Share by email"><svg><use href="#i-mail"/></svg></a>
          <button type="button" class="share__btn" data-share="copy" aria-label="Copy link"><svg><use href="#i-link"/></svg></button>
        </div>
      </div>

      <div class="author">
        <img src="<?php rtg_a( 'images/rts-emblem.svg' ); ?>" alt="" width="64" height="64">
        <div>
          <small>About the author</small>
          <h3>Robertson Truck Group</h3>
          <p>Founded in 1984 in Mount Vernon, Ohio — a family of companies including Robertson Truck Sales, Ohio Truck Equipment and Equipment Leasing Solutions, specializing in quality medium &amp; heavy-duty trucks, upfitting and equipment.</p>
        </div>
      </div>

      <nav class="pnav" aria-label="More posts">
        <a href="<?php echo esc_url( rtg_blog_url() ); ?>" class="pnav__item pnav__item--back"><span class="pnav__ic"><svg style="transform:rotate(180deg)"><use href="#i-arrow"/></svg></span><span><small>Back to</small><b>All articles</b></span></a>
        <?php $rtg_next = get_previous_post(); if ( $rtg_next ) : ?>
        <a href="<?php echo esc_url( get_permalink( $rtg_next ) ); ?>" class="pnav__item pnav__item--next"><img src="<?php echo esc_url( rtg_post_image( $rtg_next ) ); ?>" alt="" loading="lazy"><span><small>Next article</small><b><?php echo esc_html( get_the_title( $rtg_next ) ); ?></b></span><span class="pnav__ic"><svg><use href="#i-arrow"/></svg></span></a>
        <?php endif; ?>
      </nav>
    </article>

    <aside class="post__side">
      <div class="toc" id="toc">
        <div class="toc__head"><svg><use href="#i-list"/></svg><b>In this article</b><span class="toc__pct" id="tocPct">0%</span></div>
        <ol class="toc-list"></ol>
      </div>
      <div class="share share--side" aria-label="Share this article">
        <span>Share</span>
        <a class="share__btn" data-share="fb" href="#" target="_blank" rel="noopener" aria-label="Share on Facebook"><svg><use href="#i-fb"/></svg></a>
        <a class="share__btn" data-share="in" href="#" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><svg><use href="#i-in"/></svg></a>
        <a class="share__btn" data-share="x" href="#" target="_blank" rel="noopener" aria-label="Share on X"><svg><use href="#i-xs"/></svg></a>
        <a class="share__btn" data-share="mail" href="#" aria-label="Share by email"><svg><use href="#i-mail"/></svg></a>
        <button type="button" class="share__btn" data-share="copy" aria-label="Copy link"><svg><use href="#i-link"/></svg></button>
      </div>
      <div class="side__cta">
        <img src="<?php rtg_a( 'images/els-logo.svg' ); ?>" alt="Equipment Leasing Solutions" class="side__cta-logo" width="160" height="60">
        <h3>Need a container?</h3>
        <p>Rent or buy 20 ft &amp; 40 ft containers with delivery across Ohio — get both quotes and compare.</p>
        <a href="<?php rtg_u( 'rts', 'contact' ); ?>#form" class="btn btn--white btn--sm">Request a Quote <svg><use href="#i-arrow"/></svg></a>
        <a href="tel:8773594969" class="side__phone"><svg><use href="#i-phone"/></svg>877-359-4969</a>
      </div>
    </aside>
  </div>
</section>

<!-- ===== Related ===== -->
<section class="section related">
  <div class="container">
    <div class="sec-head sec-head--row reveal">
      <div>
        <span class="eyebrow">Keep Reading</span>
        <h2>Related articles</h2>
      </div>
      <a href="<?php echo esc_url( rtg_blog_url() ); ?>" class="btn btn--navy">All Articles <svg><use href="#i-arrow"/></svg></a>
    </div>
    <div class="plist plist--3">
<?php foreach ( rtg_related_posts( $rtg_post, 3 ) as $rtg_rel ) : ?>
      <?php get_template_part( 'parts/post', 'card', array( 'post' => $rtg_rel, 'class' => 'reveal' ) ); ?>
<?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ===== CTA band ===== -->
<section class="cta">
  <div class="container cta__in reveal">
    <div class="cta__copy">
      <span class="eyebrow eyebrow--light">Rent or Buy — We Do Both</span>
      <h2>Get a rental and a purchase quote, then compare side by side.</h2>
      <p>Tell us your container size, timeline and delivery address in Ohio, and our leasing team will put the numbers together.</p>
    </div>
    <div class="cta__actions">
      <p>Call Equipment Leasing Solutions at</p>
      <a href="tel:8773594969" class="cta__phone"><svg><use href="#i-phone"/></svg>877-359-4969</a>
      <a href="<?php rtg_u( 'rts', 'contact' ); ?>#form" class="btn btn--white">or send us a message <svg><use href="#i-arrow"/></svg></a>
    </div>
  </div>
</section>

</main>

<?php get_template_part( 'parts/footer', 'classic' ); ?>
<?php
get_footer();

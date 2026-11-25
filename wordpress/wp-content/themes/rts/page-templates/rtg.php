<?php
/**
 * Template Name: Robertson Truck Group
 *
 * Converted from rts/rtg.html.
 *
 * @package RTS
 */

rtg_page(
	array(
		'title'       => 'Robertson Truck Group | Mount Vernon, Ohio',
		'description' => 'Robertson Truck Group: Robertson Truck Sales, Ohio Truck Equipment and Equipment Leasing Solutions. One team, one source, one solution for commercial trucks, bodies and leasing in Central Ohio.',
		'styles'      => array( 'css/v2.css', 'css/site.css', 'css/chat.css' ),
		'scripts'     => array(
			'js/inventory-data.js',
			'js/chat.js',
			'js/site.js',
		),
	)
);

rtg_fields_for( 'rtg' );
get_header();
?>
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <symbol id="i-phone" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.4 1.8.7 2.7a2 2 0 0 1-.5 2.1L8 9.8a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.7.7a2 2 0 0 1 1.7 2z"/></symbol>
  <symbol id="i-arrow" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6"/></symbol>
</svg>

<div class="rtg">
  <header class="rtg-top">
    <span class="tag" style="margin:0"><?php rtg_e( 'top_tag' ); ?></span>
    <a href="<?php echo esc_url( rtg_f( 'top_tel' ) ); ?>"><svg><use href="#i-phone"/></svg><span><?php rtg_e( 'top_phone' ); ?></span></a>
  </header>

  <main class="rtg-hero">
    <div class="wrap">
      <div class="rtg-hero__head">
        <img src="<?php echo esc_url( rtg_f( 'hero_logo' ) ); ?>" alt="Robertson Truck Group" class="rtg-hero__logo" width="698" height="205">
        <h1><?php rtg_e( 'hero_title' ); ?></h1>
        <p><?php rtg_e( 'hero_text' ); ?></p>
      </div>

      <nav class="cos" aria-label="Robertson Truck Group companies">
<?php foreach ( rtg_items( 'companies' ) as $co ) : ?>
        <a href="<?php echo esc_url( $co['url'] ); ?>" class="co">
          <div class="co__logo"><img src="<?php echo esc_url( $co['logo'] ); ?>" alt=""></div>
          <span class="co__k"><?php echo $co['kind']; ?></span>
          <h2><?php echo $co['name']; ?></h2>
          <p><?php echo $co['text']; ?></p>
          <span class="co__go"><?php echo $co['cta']; ?><svg><use href="#i-arrow"/></svg></span>
        </a>
<?php endforeach; ?>
      </nav>
    </div>
  </main>
</div>

<section class="rtg-about">
  <div class="wrap rtg-about__grid">
    <div>
      <div class="tag"><?php rtg_e( 'about_tag' ); ?></div>
      <h2><?php rtg_e( 'about_title' ); ?></h2>
    </div>
    <div>
      <?php rtg_e( 'about_text' ); ?>
      <div class="rtg-facts">
<?php foreach ( rtg_items( 'facts' ) as $fact ) : ?>
        <div><strong><?php echo $fact['num']; ?></strong><span><?php echo $fact['label']; ?></span></div>
<?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<footer class="rtg-foot">
  <div class="wrap">
    <span><?php rtg_e( 'foot_name' ); ?> © <span id="year"><?php echo esc_html( wp_date( 'Y' ) ); ?></span> · <?php rtg_e( 'foot_address' ); ?></span>
    <nav aria-label="Companies">
<?php foreach ( rtg_items( 'foot_phones' ) as $ph ) : ?>
      <a href="<?php echo esc_url( $ph['url'] ); ?>"><?php echo $ph['text']; ?></a>
<?php endforeach; ?>
    </nav>
  </div>
</footer>
<?php
get_footer();

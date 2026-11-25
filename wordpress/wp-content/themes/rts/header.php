<?php
/**
 * Document head and opening <body>. Each template prints its own site chrome
 * (parts/nav-*.php) so pages can keep their own icon sprites and overlays.
 *
 * @package RTS
 */

defined( 'ABSPATH' ) || exit;
rtg_page_config();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

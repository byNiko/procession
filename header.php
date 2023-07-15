<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package procession
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<?php $bg_img_url = get_field('body_background_image', 'options'); ?>
<style>
	body:before {
		background-image: url(<?php echo $bg_img_url; ?>);
	}
</style>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="inner-masthead">
		<header id="masthead" class="site-header container">

			<div class="site-branding">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php the_custom_logo(); ?></a>
			</div><!-- .site-branding -->

			<button class="menu-toggle hamburger hamburger--collapse" type="button" aria-label="Menu" aria-controls="primary-menu">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
			<nav id="site-navigation" class="main-navigation">

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class' => 'menu main-menu'
					)
				);
				wp_nav_menu(
					array(
						'theme_location' => 'menu-2',
						'menu_id'        => 'secondary-menu',
						'menu_class' => 'menu secondary-menu'
					)
				);
				?>
			</nav><!-- #site-navigation -->

	</div> <!-- #inner-masthead -->

	</header><!-- #masthead -->

	<div id="page" class="site-wrapper">
		<div class="header-wave">
			<?php procession_get_wavy_line(); ?>
		</div>
		<div class="inner-page--wrapper">
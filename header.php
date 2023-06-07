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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
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
	</header><!-- #masthead -->
	<div id="page" class="site-wrapper">
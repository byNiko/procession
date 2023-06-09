<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package procession
 */

?>
<?php
get_template_part('/template-parts/bloomberg');
?>

<footer id="colophon" class="site-footer ">
	<div class="scallop"></div>

	<div class="site-info container">
		<div class="row">
			<div class="column column-33">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'footer-primary-menu',
						'menu_class' => "footer-menu menu"
					)
				);
				?>
			</div>
			<div class="column column-66">
				<?php get_template_part('/template-parts/footer-info'); ?>
			</div>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
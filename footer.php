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
<div class="scallop"></div>
</div>
<!--inner-page--wrapper-->

<footer id="colophon" class="site-footer ">


	<div class="site-info container">
		<div class="row">
			<div class="column col1">
				<?php get_template_part('/template-parts/footer-info'); ?>
			</div>
			<div class="border-vert hide-mobile"></div>
			<div class="column col2">
				<div class="footer-menu">
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
				<?php //echo FrmFormsController::get_form_shortcode(array('id' => 2)); 
				?>
			</div>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php get_template_part('template-parts/popups'); ?>
<?php wp_footer(); ?>

</body>

</html>
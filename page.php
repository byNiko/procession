<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package procession
 */

get_header();
?>
<div class="container">
	<div class="row">
		<main id="primary" class="site-main column">
			<?php
			while (have_posts()) :
				the_post();

				get_template_part('template-parts/content', 'page');

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

		<?php
		// get_sidebar();
		?>
	</div>
</div>
<?php
get_footer();

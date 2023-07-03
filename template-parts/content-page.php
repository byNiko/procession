<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package procession
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

		<?php // the_content(); 
		procession_post_thumbnail('narrow');
		?>
	</header><!-- .entry-header -->

	<?php // procession_post_thumbnail('narrow'); 
	?>

	<div class="entry-content">
		<?php
		get_template_part('template-parts/flexible-layouts/flexible-loop');
		?>

		<?php get_template_part('/template-parts/partials/partial', strtolower($post->post_title)); ?>
	</div><!-- .entry-content -->
	<?php if (get_edit_post_link()) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Edit <span class="screen-reader-text">%s</span>', 'procession'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
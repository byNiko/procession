<?php
$dir = get_sub_field('direction');
?>

<?php if ($dir === "Vertical") : ?>
	<div class="container mt-1">
		<div class="row">
			<?php get_template_part('/template-parts/acf-cards'); ?>
		</div>
	</div>
<?php endif; ?>

<?php if ($dir === "Horizontal") : ?>
	<div class="container mt-1">

		<?php if (is_single('event')) : ?>
			<?php if (have_rows('horizontal_cards')) :  while (have_rows('horizontal_cards')) : the_row(); ?>

					<?php setup_postdata($post); ?>
					<?php get_template_part('template-parts/partials/card-horizontal', null, array('post' => $post)); ?>
					<?php wp_reset_postdata(); ?>
			<?php endwhile;
			endif; ?>
		<?php elseif (is_page()) : ?>
			<?php if (have_rows('horizontal_cards')) :  while (have_rows('horizontal_cards')) : the_row(); ?>
					<?php $p = array(
						'title' => get_sub_field('title'),
						'image' => get_sub_field('image'),
						'copy' => get_sub_field('copy'),
						'link' => get_sub_field('link'),
					);
					?>

					<?php get_template_part('template-parts/partials/card-horizontal', null, array('fields' => $p)); ?>

			<?php endwhile;
			endif; ?>
		<?php endif; ?>

	</div>
<?php endif;

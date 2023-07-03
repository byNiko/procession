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
		<div class="row">
			<?php if (have_rows('cards')) :  while (have_rows('cards')) : the_row(); ?>
					<?php setup_postdata($post); ?>
					<?php get_template_part('template-parts/partials/card-horizontal', null, array('post' => $post)); ?>
					<?php wp_reset_postdata(); ?>
			<?php endwhile;
			endif; ?>
		</div>
	</div>
<?php endif;

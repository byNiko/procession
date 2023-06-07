<?php
if (have_rows('cards')) :  ?>
	<?php while (have_rows('cards')) : the_row(); ?>
		<div class="card column">
			<div class="card--image">
				<?php echo wp_get_attachment_image(get_sub_field('image'), 'medium'); ?>
			</div>
			<div class="card-copy">
				<?php if (get_sub_field('title')) : ?>
					<h3 class="h3 card--title"><?php the_sub_field('title'); ?></h3>
				<?php endif; ?>
				<?php if (get_sub_field('copy')) : ?>
					<p class="card--copy"><?php the_sub_field('copy'); ?></p>
				<?php endif; ?>
				<?php if (get_sub_field('link')) : ?>
					<a class="card--link" href="<?php echo get_sub_field('link')['url']; ?>" target="<?php echo get_sub_field('link')['target']; ?>">
						<?php echo get_sub_field('link')['title']; ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php
// if we're passing in the post as a variable of get_template_part use it
// otherwise use the post that we're in
$p = $args ? $args['post'] : $post; ?>

<div class="card <?php echo get_post_type(); ?>--card is-horizontal row">
	<div class="column">
		<?php echo  get_the_post_thumbnail($p, 'med-rect'); ?>
	</div>
	<div class="column d-flex justify-center direction-column">
		<header class="card--header <?php echo get_post_type(); ?>--header <?php echo get_post_type(); ?>--card-header">
			<?php procession_the_event_header($post); ?>
		</header>

		<div class="card--link-wrapper <?php echo get_post_type(); ?>--link-wrapper mt-2">
			<a class="card--link <?php echo get_post_type(); ?>--link learn-more button button-primary button-hollow"
			   href="<?php the_permalink($p); ?>">
				Learn More
			</a>
		</div>
	</div>
</div>
<?php
// Check rows existexists.
if (have_rows('modules')) :
?>
	<div class=" container-limit">
		<?php
		$count = 0;
		// Loop through rows.
		while (have_rows('modules')) : the_row();
			$count++;
			// Load sub field value.
			$image = get_sub_field('image');
			$copy = get_sub_field('copy');
			$title = get_sub_field('title');
			$link = get_sub_field('link');
		?>
			<div class="row <?= ($count > 1) ?  "mt-4" : null; ?> ">
				<div class="column column-40">
					<?php _e(wp_get_attachment_image($image, 'medium')); ?>
				</div>
				<div class="column">
					<h2 class="h2"><?php _e($title); ?></h2>
					<p class="m-0"><?php _e($copy); ?></p>
					<?php if (!empty($link)) : ?>
						<a target='<?php _e($link['target']); ?>' href='<?php _e($link['url']); ?>'>
							<?php _e($link['title']); ?>
						</a>
					<?php endif; ?>
				</div>

			</div>
		<?php
		// End loop.
		endwhile;
		?>
	</div>
<?php
// No value.
else :
// Do something...
endif;

<?php

if (have_rows('artists_group')) : while (have_rows('artists_group')) : the_row();
?>
		<div class="event--section event--connected-artists-wrapper ">
			<?php if (get_sub_field('section_title')) : ?>
				<h2 class="section_title">
					<?php the_sub_field('section_title'); ?>
				</h2>
			<?php endif; ?>
			<?php if (get_sub_field('section_image')) : ?>
				<div class="connected-artist--image-wrap">
					<?php echo wp_get_attachment_image(get_sub_field('section_image'), 'full wp-post-image'); ?>
				</div>
			<?php endif; ?>
			<div class="connected-artists--items row">
				<?php
				$artists = get_sub_field('artists');

				foreach ($artists as $artist) :
					get_template_part('template-parts/partials/partial-artist', null, array('artist' => $artist));
				endforeach;
				?>
			</div>
		</div>
<?php endwhile;
endif; ?>
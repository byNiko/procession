<?php

$artist_group = get_field('connected_artists_group');

if ($artist_group && $artist_group['connected_artists']) :

?>
	<div class="event--section event--connected-artists-wrapper ">
		<?php procession_get_wavy_line(); ?>
		<?php if (get_field('connected_artist_image')) : ?>
			<div class="connected-artist--image-wrap">
				<?php echo wp_get_attachment_image(get_field('connected_artist_image'), 'full'); ?>
			</div>
		<?php endif; ?>
		<?php if ($artist_group['section_title']) : ?>
			<h2 class="connected-artist--section-title"><?php echo $artist_group['section_title'] ?> </h2>
		<?php endif; ?>
		<?php
		if (count($artist_group['connected_artists'])) : ?>
			<div class="connected-artists--items row">
				<?php
				foreach ($artist_group['connected_artists'] as $artist) :
					get_template_part('template-parts/partials/partial-artist', null, array('artist' => $artist));
				endforeach; ?>
			</div>
		<?php
		endif; ?>
	</div>
<?php
endif;
?>
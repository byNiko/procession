<?php
$group = get_sub_field('special_image_group');

if ($group && $group['image']) :
?>
<div class="container">
	<div class="row">
		<div class="column">
			<div class="special-image--container">
				<?php if ($group['overlay_text']) : ?>
				<div class="overlay-text">
					<?php echo $group['overlay_text']; ?>
				</div>
				<?php endif; ?>
				<?php echo wp_get_attachment_image($group['image'], 'full responsive'); ?>
			</div>
		</div>
	</div>
</div>
<?php endif;
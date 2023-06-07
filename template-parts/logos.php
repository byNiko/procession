<?php
$logos = get_field('logos', 'option');
if (!empty($logos)) : ?>
	<div class="row">
		<?php foreach ($logos as $item) : ?>
			<div class="footer-logo column ">
				<?php
				if (!empty($item['link'])) {
					$target = $item['link']['target'];
					echo "<a target='" . $target . "' href='" . $item['link']['url'] . "'>";
				}
				echo wp_get_attachment_image($item['image'], 'small');
				if (!empty($item['link'])) echo "</a>";
				?>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
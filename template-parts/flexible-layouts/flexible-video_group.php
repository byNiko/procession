<?php
$group = get_sub_field('video_group');
if ($group && $group['vimeo_id'] && $group['padding-top']) :
?>
<div class="container">
	<div class="row">
		<div class="column">
			<div class="flexible-video--container" style="padding:<?php echo $group['padding-top']; ?> 0 0 0;">
				<iframe src="https://player.vimeo.com/video/<?php echo $group['vimeo_id']; ?>?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479&amp;autoplay=1&amp;muted=1&amp;playsinline=1"
						frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
						title="video1747494092"></iframe>
			</div>
			<script src="https://player.vimeo.com/api/player.js"></script>
		</div>
	</div>
</div>
<?php endif;
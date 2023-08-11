<?php
$group = get_sub_field('video_group');
if ($group && $group['vimeo_id']) :
?>
<div class="container">
	<div class="row">
		<div class="column">
			<div style="padding:56.25% 0 0 0;position:relative;">
				<iframe src="https://player.vimeo.com/video/<?php echo $group['vimeo_id']; ?>?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479&amp;autoplay=1&amp;muted=1&amp;playsinline=1"
						frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
						style="position:absolute;top:0;left:0;width:100%;height:100%;" title="video1747494092"></iframe>
			</div>
			<script src="https://player.vimeo.com/api/player.js"></script>
		</div>
	</div>
</div>
<?php endif;
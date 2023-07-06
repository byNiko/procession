<?php

$width = get_sub_field('desktop_width')['value']; ?>
<div class="container">
	<div class="row">
		<div class="column column-<?php echo $width; ?>">
			<?php the_sub_field('paragraph', true, false); ?>
		</div>
	</div>
</div>
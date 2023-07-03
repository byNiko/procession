<?php

$width = get_sub_field('desktop_width')['value']; ?>
<div class="container">
	<div class="row">
		<div class="column column-<?php echo $width; ?>">
			<?php echo the_sub_field('paragraph'); ?>
		</div>
	</div>
</div>
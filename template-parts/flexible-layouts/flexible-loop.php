<?php
// check if the flexible content field has rows of data
if (have_rows('flexible_layouts')) :

	// loop through the selected ACF layouts and display the matching partial
	while (have_rows('flexible_layouts')) : the_row();
?>
		<div class="section-divider flexible-loop-item-wrapper">
			<?php
			get_template_part('template-parts/flexible-layouts/flexible', get_row_layout());
			?>
		</div>
<?php

	endwhile;

elseif (get_the_content()) :

	// no layouts found
	the_content();

endif;
?>
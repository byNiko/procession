<?php
if (have_rows('join_the_procession')) :	while (have_rows('join_the_procession')) : 		the_row();
?>
		<div class="container">
			<div class="row">
				<div class="column column-66">
					<h2 class="h2"><?php the_sub_field('title'); ?></h2>
					<p> <?php the_sub_field('copy'); ?></p>
				</div>
			</div>
		</div>
<?php
	endwhile;
endif;

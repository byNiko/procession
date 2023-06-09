<?php
if (have_rows('join_the_procession')) :	while (have_rows('join_the_procession')) : 		the_row();
?>
		<div class="container">
			<div class="row">
				<div class="column column-66">
					<h2 class="h2"><?php the_sub_field('title', false, false); ?></h2>
					<p class="fw-normal"> <?php the_sub_field('copy', false, false); ?></p>
				</div>
			</div>
		</div>
<?php
	endwhile;
endif;

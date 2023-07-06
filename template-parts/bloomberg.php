<div class="section-divider">
	<div class="wave "></div>
</div>
<div id="bloomberg-container" class="bloomberg-container section-divider">
	<div class="container  bloomberg">
		<div class="row justify-center">
			<div class="">
				<?php //echo wp_get_attachment_image(get_field('logo', 'option'), 'small', false, array('class' => "filter-invert ")); 
				?>
			</div>
			<div class="column ">
				<h3><?php the_field('title', 'option'); ?></h3>
				<div class="new-copy">
					<?php the_sub_field('copy'); ?>
				</div>
				<!-- <p class="fw-normal"><?php the_field('copy', 'option', false); ?></p> -->
				<a class="button  button-primary" href="<?php echo get_field('link', 'option', false, false)['url']; ?>">
					<?php echo get_field('link', 'option')['title']; ?>
				</a>
			</div>
			<div class="column column-20">
				<?php echo wp_get_attachment_image(get_field('qr_code', 'option'), 'small', false, array('class' => "")); ?>
			</div>
		</div>
	</div>
</div>
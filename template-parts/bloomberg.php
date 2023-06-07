<div id="bloomberg-container" class="bloomberg-container section-divider">
	<div class="container w-85 bloomberg">
		<div class="row justify-center">
			<div class="column column-10">
				<?php echo wp_get_attachment_image(get_field('logo', 'option'), 'small', false, array('class' => "filter-invert")); ?>
			</div>
			<div class="column column">
				<h3><?php the_field('title', 'option'); ?></h3>
				<p><?php the_field('copy', 'option'); ?></p>
				<a class="button" href="<?php echo get_field('link', 'option')['url']; ?>">
					<?php echo get_field('link', 'option')['title']; ?>
				</a>
			</div>
			<div class="column column-20">
				<?php echo wp_get_attachment_image(get_field('qr_code', 'option'), 'small'); ?>
			</div>
		</div>
	</div>
</div>
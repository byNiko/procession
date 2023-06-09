<div id="bloomberg-container" class="bloomberg-container section-divider">
	<div class="container  bloomberg">
		<div class="row ">
			<div class="column column-75">
				<h3><?php the_field('title', 'option'); ?></h3>
				<p class="fw-normal"><?php the_field('copy', 'option', false); ?></p>
			</div>
			<div class="column column-25">
				<div class="row align-end flex-wrap">
					<div class="column column-33">
						<?php echo wp_get_attachment_image(get_field('logo', 'option'), 'small', false, array('class' => "filter-invert ")); ?>
					</div>
					<div class="column column-66">
						<?php echo wp_get_attachment_image(get_field('qr_code', 'option'), 'small', false, array('class' => "")); ?>
					</div>
					<div class="column font-sm">
						<a class="button d-block" href="<?php echo get_field('link', 'option', false, false)['url']; ?>">
							<?php echo get_field('link', 'option')['title']; ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
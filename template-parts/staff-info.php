<section id="staff" class="container ">
	<!-- <header class="row"> -->
	<h2 class="h2">Staff</h2>
	<!-- </header> -->
	<?php
	if (have_rows('staff', 'option')) :  ?>
		<dl class="staff-members row">
			<?php while (have_rows('staff', 'option')) : the_row(); ?>
				<div class="staff-member column">
					<dt class="staff--name">
						<?php _e(the_sub_field('first_name')); ?>
						<?php _e(the_sub_field('last_name')); ?>
					</dt>
					<dd class="staff--title">
						<?php _e(the_sub_field('role')); ?>
					</dd>
				</div>
			<?php endwhile; ?>
		</dl>
</section>
<?php
	endif;

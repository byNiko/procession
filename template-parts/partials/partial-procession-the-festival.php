<?php procession_get_wavy_line(); ?>
<div class="container">
	<div class="row">
		<div class="column">
			<?php
			$festival = get_scheduled_events('future', ['festival']);
			if ($festival) :
			?>
				<div class="upcoming-festival">
					<h2 class="mb-5">Upcoming Festival Events</h2>
					<?php
					foreach ($festival as $post) : setup_postdata($post);
						get_template_part('template-parts/content', get_post_type());
						wp_reset_postdata();
					endforeach;
					?>
				</div>
			<?php else : ?>
				<h2>Looks like there are no Festival events coming up. </h2>
			<?php endif; ?>
		</div>
	</div>
</div>
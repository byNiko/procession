<?php
$today = current_time('timestamp');
$futureEvents = get_scheduled_events("future");

if ($futureEvents) : ?>
	<section id="future-events" class="future-events">
		<div class="container">
			<div class="row relative">
				<div class="column">
					<h2>Upcoming Events</h1>
				</div>
				<div class="column column-20 absolute-top-right text-right">
					<a class="font-xs lh-default d-inline-block td-u" href="/events">View All Events</a>
				</div>
			</div>

			<div class="event--items future--event-items mt-5">
				<?php
				foreach ($futureEvents as $post) : setup_postdata($post);
					get_template_part('template-parts/content', get_post_type());
					wp_reset_postdata();
				endforeach; ?>
			</div>
		</div>
	</section>
<?php
endif;

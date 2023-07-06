<?php
$filter = get_sub_field('event_type')->slug;
// print_r($filter['slug']);
$futureEvents = get_scheduled_events('future', [$filter]);
if ($futureEvents) :
?>
	<div class="upcoming-workshops mt-5">
		<h2 class="mb-5">Upcoming Workshops</h2>
		<?php
		foreach ($futureEvents as $post) : setup_postdata($post);
			get_template_part('template-parts/content', get_post_type());
			wp_reset_postdata();
		endforeach;
		?>
	</div>
<?php endif;

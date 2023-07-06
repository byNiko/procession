<?php
$eventType = get_sub_field('event_type');

$connected_events = get_scheduled_events('future', $eventType->slug);
if ($connected_events) : ?>
	<?php // procession_get_wavy_line(); 
	?>
	<div class="full-width">
		<div class="container">
			<?php foreach ($connected_events as $post) :
				// Setup this post for WP functions (variable must be named $post).
				setup_postdata($post);
				get_template_part('template-parts/partials/card-horizontal', null, array('post' => $post));
				wp_reset_postdata();
			endforeach;
			?>

		</div>
	</div>
<?php endif; ?>
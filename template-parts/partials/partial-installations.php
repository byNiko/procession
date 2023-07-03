<?php

$args = array(
	'post_type' => 'event',
	'tax_query' => array(
		array(
			'taxonomy' => 'event-tag',
			'field' => 'slug',
			'terms' => array('installation')
		)
	)
);
$query = new WP_Query($args);
if ($query->have_posts()) : ?>

<?php while ($query->have_posts()) :	$query->the_post();

		get_template_part('template-parts/partials/event-card');

	endwhile;
endif;

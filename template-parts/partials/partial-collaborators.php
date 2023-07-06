<?php
$args = array(
	'post_type' => 'artist',
	'numberposts' => -1,
	'tax_query' => array(
		array(
			'taxonomy' => 'artist-type',
			'field'    => 'slug',
			'terms'    => array('collaborator')
		)
	)
);
$artists = get_posts($args);
?>

<?php if ($artists) : ?>
	<div class="grid grid-3 row">
		<?php foreach ($artists as $artist) : ?>
			<?php get_template_part('/template-parts/partials/partial-artist', null, array('artist' => $artist)); ?>
		<?php endforeach; ?>
	</div>
<?php endif;

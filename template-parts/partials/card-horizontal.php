<?php
// if we're passing in the post as a variable of get_template_part use it
// otherwise use the post that we're in
if (isset($args)) {

	if (isset($args['fields'])) {
		$p = $post;
		$f = $args['fields'];
?>
<div class="card <?php echo get_post_type($p); ?>--card is-horizontal row">

	<div class="column">
		<a href="<?php echo $f['link']['url']; ?>">
			<?php echo  wp_get_attachment_image($f['image'], 'med-rect'); ?>
		</a>
	</div>
	<div class="column d-flex justify-center direction-column">
		<header
				class="card--header <?php echo get_post_type($p); ?>--header <?php echo get_post_type($p); ?>--card-header">
			<a href="<?php echo $f['link']['url']; ?>">
				<h2 class="font-lg"><?php echo $f['title']; ?></h2>
				<div class="font-ms"><?php echo $f['copy']; ?></div>
			</a>
		</header>
		<div class="card--link-wrapper <?php echo get_post_type(); ?>--link-wrapper mt-2">
			<a class="card--link <?php echo get_post_type($p); ?>--link learn-more button button-primary button-hollow"
			   href="<?php echo $f['link']['url']; ?>">
				Learn More
			</a>
		</div>
	</div>
</div>
<?php
	} else
	if (isset($args['post'])) {
		$p = $args ? $args['post'] : $post;
	?>
<div class="card <?php echo get_post_type($p); ?>--card is-horizontal row">

	<div class="column">
		<a href="<?php the_permalink($p); ?>">
			<?php echo  get_the_post_thumbnail($p, 'med-rect'); ?>
		</a>
	</div>
	<div class="column d-flex justify-center direction-column">
		<header
				class="card--header <?php echo get_post_type($p); ?>--header <?php echo get_post_type($p); ?>--card-header">
			<!-- <a href="<?php the_permalink($p); ?>"> -->
			<?php procession_the_event_header($p, true); ?>
			<!-- </a> -->
		</header>
		<div class="card--link-wrapper <?php echo get_post_type(); ?>--link-wrapper mt-2">
			<a class="card--link <?php echo get_post_type($p); ?>--link learn-more button button-primary button-hollow"
			   href="<?php the_permalink($p); ?>">
				Learn More
			</a>
		</div>
	</div>
</div>
<?php
		// wp_reset_postdata();
	}
}

?>
<div class="event-tag--filter">
	<!-- <label for="event-tag--select">Filter Events:</label> -->
	<?php
	$args = array(
		'post_type' => 'event',
		'taxonomy' => 'event-tag'
	);
	$tags = get_terms($args);
	?>
	<select name="event-tags" id="event-tag-select" class="font-sm">
		<option selected value="">All Events</option>
		<?php foreach ($tags as $tag) : ?>
			<option value="<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></option>
		<?php endforeach; ?>
	</select>
</div>

<?php $futures = get_scheduled_events("future"); ?>
<?php if ($futures) : ?>
	<div class="current-events mt-5">
		<?php foreach ($futures as $post) : setup_postdata($post); ?>
			<?php get_template_part('template-parts/content', get_post_type()); ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<?php $past = get_scheduled_events("past"); ?>
<?php if ($past) : ?>

	<div class="archived-events mt-5">
		<h2>Archived Events</h2>
		<?php foreach ($past as $post) : setup_postdata($post); ?>
			<?php get_template_part('template-parts/content', get_post_type()); ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
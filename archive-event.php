<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package procession
 */

get_header();
?>
<div class="container">
	<div class="row">
		<main id="primary" class="site-main column">

			<?php if (have_posts()) : ?>

				<header class="page-header">
					<?php

					the_archive_title('<h1 class="page-title">', '</h1>');
					?>
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
				</header><!-- .page-header -->
				<div class="current-events mt-5">
					<?php while (have_posts()) : 	the_post(); ?>
						<?php get_template_part('template-parts/content', get_post_type()); ?>
					<?php endwhile; ?>
				</div>
				<?php the_posts_navigation(); ?>
			<?php endif; ?>

			<?php $archivedEvents = get_scheduled_events("past"); ?>
			<?php if ($archivedEvents) : ?>
				<section id="archived-events" class="archived-events mt-5">
					<h2 class="mb-3">Archived Events</h2>
					<?php foreach ($archivedEvents as $post) : setup_postdata($post); ?>
						<?php get_template_part('template-parts/content', get_post_type()); ?>
						<?php wp_reset_postdata(); ?>
					<?php endforeach; ?>
				</section> <!-- archived-events-->
			<?php endif; 	?>
		</main><!-- #main -->
	</div>
</div>
<?php
get_footer();

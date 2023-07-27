<?php

/**
 * Template part for displaying page content in single event pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package procession
 */

?>

<div class="container">
	<div class="row">
		<div class="column">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="event--header entry-header">
					<?php procession_the_event_header($post); ?>
				</header><!-- .entry-header -->

				<?php procession_post_thumbnail('narrow'); ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row grid event--grid-copy">
		<aside class="event--meta-wrapper mt-5 column">
			<div class="event--meta-container">
				<div class="event--meta-title">Date & Time</div>
				<div class="event--meta-text">
					<?php echo procession_printDateFromString(get_field('start_date_time')); ?>
				</div>
				<div class="event--meta-text">
					<?php echo procession_printTimeFromString(get_field('start_date_time')); ?>
				</div>
			</div>
			<?php
			// $location = get_field('location_info');
			//if ($location) : 
			?>
			<div class="event--meta-container">
				<div class="event--meta-title">Location</div>
				<?php procession_the_event_location($post) ?>
			</div>
			<?php
			$cost = (get_field('cost'));
			$rsvp = (get_field('rsvp_link'));
			if ($rsvp || $cost) : ?>
			<div class="event--meta-container">
				<div class="event--rsvp event--meta-button">
					<?php if ($cost) : ?>
					<div class="event--cost event--meta-title"><?php echo $cost; ?> </div>
					<?php endif; ?>
					<?php if ($rsvp) : ?>
					<a class="button button-sm button-primary" target="<?php echo $rsvp['target']; ?>"
					   href="<?php echo $rsvp['url']; ?>">
						<?php echo $rsvp['title']; ?>
					</a>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>

			<?php if (have_rows('notes_group')) : ?>
			<?php while (have_rows('notes_group')) : the_row(); ?>
			<?php if (get_sub_field('note') !== '') : ?>
			<div class="event--meta-container ">
				<div class="event--notes">
					<div class="event--meta-title">Note</div>
					<div class="event--note">
						<?php the_sub_field('note'); ?>
					</div>
					<?php $link = get_sub_field('link'); ?>
					<?php if ($link) : ?>
					<div class="text-right">
						<a class="event--note-link font-parent" target="<?php echo $link['target']; ?>"
						   href="<?php echo $link['url']; ?>">
							<?php echo $link['title']; ?>
						</a>
					</div>
					<?php endif; ?>
				</div>

			</div>
			<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</aside>
		<div class="entry-content column mt-5">
			<div class="event--main-copy">
				<?php the_content(); ?>
			</div>
			<?php get_template_part('template-parts/connected-aritsts-group'); ?>
		</div><!-- .entry-content -->
	</div>
</div>
<?php
$connected_events = get_field('connected_events');
if ($connected_events) : ?>
<?php procession_get_wavy_line(); ?>
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

<?php get_template_part('/template-parts/partials/partial', str_replace(":", "", strtolower($post->post_name))); ?>

<?php if (get_edit_post_link()) : ?>
<footer class="entry-footer">
	<?php
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Edit <span class="screen-reader-text">%s</span>', 'procession'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			),
			'<span class="edit-link">',
			'</span>'
		);
		?>
</footer><!-- .entry-footer -->
<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package procession
 */

$startDayTimestamp = get_field('start_date_time');
$endDayTimestamp = get_field('end_date_time');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('event--listing'); ?>>
	<div class="row  event--listing-grid-row">
		<div class="column">
			<div class="row grid grid-2">
				<div class="column ">
					<div class="event--day">
						<?php echo procession_printDayFromString($startDayTimestamp); ?>,
					</div>
					<div class="event--date">
						<?php echo procession_printDateFromString($startDayTimestamp); ?>
					</div>
				</div>
				<div class="column ">
					<div class="event--time event--start-time">
						<?php echo procession_printTimeFromString($startDayTimestamp); ?>
					</div>
					<div class="event--time event--end-time">
						<?php echo ($endDayTimestamp) ? procession_printTimeFromString($endDayTimestamp) : ''; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="column ">
			<header class="entry-header event--header">
				<?php procession_the_event_header($post, isset($args['parent'])); ?>
			</header><!-- .entry-header -->
			<?php //procession_post_thumbnail(); 
			?>
			<!-- .entry-content -->
		</div>
		<?php $link = get_field('rsvp_link'); ?>
		<?php if ($link) : ?>
		<div class="column d-flex flex-end">
			<div class="event--rsvp-link-wrapper">
				<a class="event--rsvp-link font-parent" target="<?php echo $link['target']; ?>"
				   href="<?php echo $link['url']; ?>">
					<?php echo $link['title']; ?>
				</a>
			</div>
		</div>
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
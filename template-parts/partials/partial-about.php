<?php procession_get_wavy_line(); ?>
<div class="container collaborators-container">
	<div class="row">
		<div class="column">
			<?php $post = byniko_get_page_by_title('collaborators'); ?>
			<?php setup_postdata($post); ?>
			<h3><?php the_title(); ?></h3>
			<?php get_template_part('template-parts/flexible-layouts/flexible-loop'); ?>
			<div>
				<a href="<?php the_permalink($page); ?>" class="button button-hollow button-primary">See all
					Collaborators
				</a>
			</div>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); ?>
<?php get_template_part('/template-parts/staff-info');

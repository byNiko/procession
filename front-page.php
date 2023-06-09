<?php get_header(); ?>


<main class="">

	<?php get_template_part('/template-parts/frontpage/map'); ?>

	<div class="container section-divider">
		<?php
		while (have_posts()) :
			the_post();
			the_content();
		endwhile;
		?>
	</div>
	<div class="section-divider">
		<?php get_template_part('/template-parts/events-schedule'); ?>
	</div>
	<div class="section-divider">
		<?php get_template_part('/template-parts/frontpage/join-procession'); ?>
		<div class="container">
			<div class="row">
				<?php get_template_part('/template-parts/acf-cards'); ?>
			</div>

		</div>
		<?php procession_get_wavy_line(); ?>
	</div>
</main>
<?php get_footer(); ?>
<?php
$post = $args['artist'];
setup_postdata($post);
?>
<div class="artist--wrapper column">
	<div class="artist--img-wrap"><?php the_post_thumbnail('med-rect', array('class' => 'artist--img')); ?></div>
	<div class="artist--name"><?php the_title(); ?></div>
	<div class="artist--bio"><?php the_content(); ?></div>
</div>
<?php
wp_reset_postdata();

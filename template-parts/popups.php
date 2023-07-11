<div class="background-overlay" id="background-overlay"></div>
<div class="popup" id="joinPopup">
	<button class="popup--close-button">x</button>
	<div class="inner-popup">

		<div class="popup-content">
			<?php the_field('popup_header', 'options'); ?>
			<div class="font-ms popup--text"><?php the_field('popup_copy', 'options'); ?></div>
			<?php echo FrmFormsController::get_form_shortcode(array('id' => 2)); ?>
		</div>
	</div>
</div>
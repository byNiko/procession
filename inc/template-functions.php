<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package procession
 */

/** add Image Sizes */
add_image_size('narrow', 1300, 300, array('center', 'center'));
add_image_size('box-500', 500, 500, array('center', 'center'));
add_image_size('med-rect', 800, 450, array('center', 'center'));


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
/** add body classes */
function procession_body_classes($classes) {
	global $post;
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	$classes[] = $post->post_type . "-" . $post->post_name;

	return $classes;
}
add_filter('body_class', 'procession_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function procession_pingback_header() {
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'procession_pingback_header');


function procession_printDayFromString($string) {
	$timestamp = strtotime($string);
	return date("l", $timestamp);
}
function procession_printDateFromString($string) {
	$timestamp = strtotime($string);
	return date("M", $timestamp) . ' ' . date("d", $timestamp);
}

function timeIsInFuture($stringTime, $gracePeriodMinutes = 5) {
	$grace = + (60 * $gracePeriodMinutes);
	$timestamp = strtotime($stringTime);
	return current_time('timestamp') < $timestamp + $grace;
}
function procession_printTimeFromString($string) {
	$timestamp = strtotime($string);
	return date('g:i A', $timestamp);
}


function procession_the_event_tags($post) {
	echo procession_get_event_tags($post);
}
function procession_get_event_tags($post) {
	$tags = get_the_terms($post, 'event-tag');
	$html = "";
	if ($tags) :
		foreach ($tags as $t => $value) {
			$event_tag = "tag-" . $value->slug;
			$html .= "<span class='event--tag " . $event_tag . "'>" . $value->name . "</span>";		# code...
		}
	endif;
	return $html;
}



function procession_remove_archive_label($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} elseif (is_tax()) {
		$title = single_term_title('', false);
	}

	return $title;
}
add_filter('get_the_archive_title', 'procession_remove_archive_label');


function get_popup_button($text = "Join the Procession", $type = "", $theme = "primary", $size) {
	$html = '';
	$html .= '<button class="button button-' . $theme . ' button-' . $type . ' button-' . $size . ' openJoinPopup">' . $text . '</button>';
	return $html;
}
function the_popup_button($text = "Join the Procession", $type, $theme, $size) {
	echo get_popup_button($text, $type, $theme, $size);
}

// Add Popup Button Shortcode
function byniko_create_popup_button($atts) {
	$a = shortcode_atts(array(
		'title' => 'Join the Procession',
		'type' => '',
		'theme' => 'primary',
		'size' => ''
	), $atts);
	return get_popup_button($a['title'], $a['type'], $a['theme'], $a['size']);
}
add_shortcode('popup_button', 'byniko_create_popup_button');


// save ACF Datetime as unix
add_filter('acf/update_value/type=date_time_picker', 'my_update_value_date_time_picker', 10, 3);

function my_update_value_date_time_picker($value, $post_id, $field) {
	return strtotime($value);
}




function setup_global_var_today() {
	global $today;
	$today = current_time('timestamp');
}
add_action('after_setup_theme', 'setup_global_var_today');

function byniko_pre_get_posts_events_archive($query) {
	global $today;

	// if (!is_admin() && $query->is_main_query() && is_post_type_archive('event')) {
	if (!is_admin() && $query->is_main_query() && is_page('event')) {

		$query->set('meta_key', 'start_date_time');
		$query->set('orderby', 'meta_value_num');
		$query->set('order', 'ASC');
		$query->set('meta_query', array(
			array(
				'key'     => 'start_date_time',
				'compare' => '>=',
				'value'   => $today,
				'type'    => 'numeric',
			)
		));
		return;
	}
}
add_action('pre_get_posts', 'byniko_pre_get_posts_events_archive');


function get_scheduled_events($tense = "future") {
	$compare = $tense === "future" ? ">=" : ($tense === "past" ? "<" : null);
	global $today;
	$arr = array(
		'post_type'         => 'event',
		'posts_per_page'    => -1,
		'meta_key'          => 'start_date_time',
		'meta_value'        => $today,
		'orderby'           => 'meta_value',
		'order'             => 'ASC',
		'meta_compare'      => $compare,
		'type'              => 'NUMERIC',
	);
	return get_posts($arr);
}
function procession_the_event_location($post) {

	echo procession_get_event_location($post);
}
function procession_get_event_location($post) {

	$location = get_field('location_info', $post);
	$html = '';
	if ($location) :
		$name = $location['name'] ? $location['name'] : '';
		$address = $location['street_address'] ? $location['street_address'] : '';
		$city = $location['city_sate_zip'] ? $location['city_sate_zip'] : '';
		$html .= '
 <div class="event--meta-text event--location-container">
	 <div class="location--name">' . $name . '</div>
	 <div class="location--address">' . $address . '</div>
	 <div class="location--city-state">' . $city . '</div>
 </div>';
	endif;

	return $html;
}
function procession_the_event_header($post) {
	echo procession_get_event_header($post);
}
function procession_get_event_header($post, $withLink = false) {
	$title_class = "class='entry-title event--title'";
	$link = '<a class="event--title-link" href="' . get_the_permalink($post) . '">' . get_the_title() . '</a>';
	$nolink = get_the_title();
	$title = '';
	$title = (is_single()) ? '<h1 ' . $title_class . '>' . $nolink  . '</h1>' : '<h2 ' . $title_class . '>' . $link . '</h2>';

	$html = '<div class="event--tags">' .
		procession_get_event_tags($post) .
		'</div>' .
		$title .
		'<div class="event--subtitle">' .
		get_field('subtitle', $post) .
		'</div>' .
		'<div class="event--date">' .
		procession_printDateFromString(get_field('start_date_time')) .
		'</div>' .
		procession_get_event_location($post);

	return $html;
}

<?php

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title'    => 'Theme General Settings',
		'menu_title'    => 'Theme Settings',
		'menu_slug'     => 'theme-general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
	acf_add_options_sub_page(array(
		'page_title'    => 'CTAs & Popup',
		'menu_title'    => 'CTAs & Popup Settings',
		'parent_slug'   => 'theme-general-settings',
		'capability'    => 'edit_posts',
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Theme Header Settings',
		'menu_title'    => 'Header',
		'parent_slug'   => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Theme Footer Settings',
		'menu_title'    => 'Footer',
		'parent_slug'   => 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title'    => 'Bloomberg Settings',
		'menu_title'    => 'Bloomberg Settings',
		'parent_slug'   => 'theme-general-settings',
	));
	acf_add_options_sub_page(array('page_title'    => 'Staff Info',
		'menu_title'    => 'Staff Settings',
		'parent_slug'   => 'theme-general-settings',
	));
}
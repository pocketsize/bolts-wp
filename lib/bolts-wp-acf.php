<?php

/**
 * Bolts v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

if ( function_exists('acf_add_options_page') ) {

	$options_page = acf_add_options_page(array(
		'page_title' => 'Options',
		'menu_title' => 'Options',
		'menu_slug'  => 'options'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'General Options',
		'menu_title' 	=> 'General',
		'menu_slug'     => 'general',
		'parent_slug' 	=> $options_page['menu_slug'],
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Options',
		'menu_title' 	=> 'Header',
		'menu_slug'     => 'header',
		'parent_slug' 	=> $options_page['menu_slug'],
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Options',
		'menu_title' 	=> 'Footer',
		'menu_slug'     => 'footer',
		'parent_slug' 	=> $options_page['menu_slug'],
	));

}
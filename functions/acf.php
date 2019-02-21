<?php

if ( function_exists('acf_add_options_page') ) {
	$options_page = acf_add_options_page(array(
		'page_title' => 'Options',
		'menu_title' => 'Options',
		'menu_slug'  => 'options'
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Theme Options',
		'menu_title'    => 'Theme',
		'menu_slug'     => 'theme',
		'parent_slug'   => $options_page['menu_slug'],
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Header Options',
		'menu_title'    => 'Header',
		'menu_slug'     => 'header',
		'parent_slug'   => $options_page['menu_slug'],
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Footer Options',
		'menu_title'    => 'Footer',
		'menu_slug'     => 'footer',
		'parent_slug'   => $options_page['menu_slug'],
	));
}

if ( function_exists('acf_add_local_field_group') ) {
	acf_add_local_field_group(array(
		'key' => 'group_5c6e7468e7c00',
		'title' => 'Theme Options',
		'fields' => array(
			array(
				'key' => 'field_5c6e746eb4219',
				'label' => '404 page',
				'name' => '404_page',
				'type' => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array(
					0 => 'page',
				),
				'taxonomy' => array(
				),
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'id',
				'ui' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'theme',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => 1,
		'description' => '',
	));
}
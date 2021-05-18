<?php 

if( function_exists('acf_add_options_page') ) { 	
 	// add parent
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title' 	=> 'Theme Settings',
		'menu_slug' 	=> 'acf-options-theme-settings',
		'redirect' 		=> false
	));
}
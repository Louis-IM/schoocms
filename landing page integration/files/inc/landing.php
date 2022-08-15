<?php 
//Landing addtion scripts
function schoocms_landing_styles(){
	//required scripts. Do not modify
	wp_enqueue_style( 'landing-style', get_template_directory_uri() . '/css/landing.css', '', '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'schoocms_landing_styles' ); 
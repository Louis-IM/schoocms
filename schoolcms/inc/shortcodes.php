<?php 
//Set Column Divider
function column_divider(){
	return '</div><div class="col-md">';
}
add_shortcode( 'column_divider', 'column_divider' ); 
//Add inline shortcode icon
function fontawesome_function( $atts ) {
	$a = shortcode_atts( array(
		'class' => '',
	), $atts );
	if($a['class']){
		$return = '<i class="'.$a['class'].'"></i>';
		return $return;
	}	
}
add_shortcode( 'fa_icon', 'fontawesome_function' );
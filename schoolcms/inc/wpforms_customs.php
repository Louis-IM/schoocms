<?php 
/**
* Change WPForms capability requirement.
*
* @param string $cap
* @return string
*/
function wpforms_custom_capability( $cap ) {

	// unfiltered_html by default means Editors and up.
	// See more about WordPress roles and capabilities
	// https://codex.wordpress.org/Roles_and_Capabilities
	return 'unfiltered_html';
}
add_filter( 'wpforms_manage_cap', 'wpforms_custom_capability' );

function wpf_dev_email_display_other_fields( $fields ) { 
    return array( 'divider');
} 
add_filter( 'wpforms_email_display_other_fields', 'wpf_dev_email_display_other_fields', 10, 1 );

function wpf_add_innermedia_tracking_script( $form_data, $form ) {
	$form_title = '';
	$form_title = $form_data['settings']['form_title'];
	$return = "<script>
	window.dataLayer = window.dataLayer || [];
	window.dataLayer.push({
	'event': 'wpFormSubmit',
	'formId': '".$form_title."',
	});
	</script>";
     echo $return;
}
add_action('wpforms_frontend_output_after', 'wpf_add_innermedia_tracking_script', 10, 2 );

function wpf_dev_field_new_default( $field ) { 
    // default scheme set to international
    if ($field[ 'type' ] === 'address') { 
        $field[ 'format' ] = 'international'; 
        $field[ 'scheme_selected' ] = 'international'; 
        $field[ 'scheme' ] = 'international'; 
        $field[ 'country_default' ] = 'GB';
    } 
        // Return
        return $field; 
}
 
add_filter( 'wpforms_field_new_default', 'wpf_dev_field_new_default', 10, 1 );
?>
<?php
/**
 * Schoocms Functions and Definitions
 */
function schoocms_setup() {

	add_theme_support( 'post-thumbnails' );
	/*Do not edit*/
	add_image_size( 'small-thumbnail'	, 150, 150, true );
	add_image_size( 'medium-thumbnail'	, 300, 300, true );
	add_image_size( 'large-thumbnail'	, 768, 768, true );
  	add_image_size( 'landscape', 1024, 768,true ); 
  	add_image_size( 'portrait', 768, 1024,true ); 
	/*Thumbnail, Medium and Large sizes are edited within the media settings*/	
	
	/*Edit and add as design sees fit*/
	add_image_size( 'page-banner'	, 1560, 560, true );
	add_image_size( 'home-banner'	, 1560, 875, true );
	

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main'    => 'Main Menu',
		'top'    => 'Top Links',
		'footer' => 'Footer Links',
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
add_action( 'after_setup_theme', 'schoocms_setup' );




function schoocms_widgets_init() {
	register_sidebar( array(
		'name'          => 'News Sidebar',
		'id'            => 'news-sidebar',
		'description'   => 'Add widgets here to appear in your news sidebar.',
		'before_widget' => '<div class="sidebarSec">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="its">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'schoocms_widgets_init' );
	
	
	
/**
 * Enqueue scripts and styles.
 */
 function schoocms_required_scripts(){
	//required scripts. Do not modify
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', '', '4.3.1' );
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.7.1/css/all.css');
	wp_enqueue_style( 'owl-style', get_template_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'fancybox-style', get_template_directory_uri() . '/css/jquery.fancybox.min.css' );
	
	wp_enqueue_script( 'bootstrap-scripts', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js', array('jquery'), '4.3.1', true );
	wp_enqueue_script( 'cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'), '', true );
	wp_enqueue_script( 'cycle2', get_template_directory_uri() . '/js/jquery.cycle2.min.js', array('jquery'), '2.1.6', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array('jquery'), '4.1.1', true );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'), '3', true );	
	
	
 }
add_action( 'wp_enqueue_scripts', 'schoocms_required_scripts' ); 
 
 
function schoocms_fonts() {
	/*Put Font Includes here*/	
	wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap' );
	wp_enqueue_style( 'crimson-pro', 'https://fonts.googleapis.com/css?family=Crimson+Pro:400,700&display=swap' );
	
	
}
add_action( 'wp_enqueue_scripts', 'schoocms_fonts' );

function schoolcms_custom_scripts() {
	/*Further Scripts and Styles Stylesheet and scripts file set here to overwrite*/
	
	
	wp_enqueue_style( 'sc-style', get_stylesheet_uri() );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1', true );
	
}
add_action( 'wp_enqueue_scripts', 'schoolcms_custom_scripts' );


// FIX FOR MANUAL IMAGE CROP PLUGIN
add_action('admin_head', 'azrPluginFix');
function azrPluginFix() {
  echo '<style>
	.mic-left-col {
	  width:400px !important;
	} 
	.mic-editor-wrapper .nav-tab-wrapper {
		margin-bottom:20px !important;
	}
  </style>';
}


// **************************************
// **************************************
// SCHOOCMS FUNCTIONS
// **************************************
// **************************************


// **************************************
// rename posts to news
// **************************************
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );




// **************************************
// **************************************
// SCHOOCMS ADMIN FILTERS
// **************************************
// **************************************

add_filter('admin_footer_text', 'left_admin_footer_text_output'); //left side
function left_admin_footer_text_output($text) {
    $text = 'schoocms | designed and built by <a href="https://www.innermedia.co.uk">innermedia</a>';
    return $text;
}
 
add_filter('update_footer', 'right_admin_footer_text_output', 11); //right side
function right_admin_footer_text_output($text) {
    $text = 'powered by <a href="http://www.wordpress.com">wordpress</a>';
    return $text;
}
// change login image
add_action("login_head", "my_login_head");
function my_login_head() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('".get_bloginfo('template_url')."/images/SCHooCMS-logo.jpg') no-repeat scroll center top transparent;
		height: 85px;
		width:100%;
	}
	body.login {
		background-color:#fff;
	}
	</style>
	";
}
 
// Change title for login screen
add_filter('login_headertext', create_function(false,"return 'SchooCMS by Innermedia';"));
 
// change url for login screen
add_filter('login_headerurl', create_function(false,"return home_url();"));

// disable default dashboard widgets
function remove_dashboard_widgets() {

	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');




// **************************************
// remove page formats options
// **************************************
add_action('after_setup_theme', 'remove_post_formats', 11);
function remove_post_formats() {
    remove_theme_support('post-formats');
}



// **************************************
// Custom Excerpts

function html5wp_custom_post($length)
{
    return 40;
}
function html5_footer_length($length)
{
    return 20;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... ';
}
add_filter('excerpt_more', 'html5_blank_view_article'); 
/*add sub_menu functionality to wp_nav_menu*/


// filter_hook function to react on sub_menu flag
function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
  if ( isset( $args->sub_menu ) ) {
    $root_id = 0;
    
    // find the current menu item
    foreach ( $sorted_menu_items as $menu_item ) {
      if ( $menu_item->current ) {
        // set the root id based on whether the current menu item has a parent or not
        $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
        break;
      }
    }
    
    // find the top level parent
    if ( ! isset( $args->direct_parent ) ) {
      $prev_root_id = $root_id;
      while ( $prev_root_id != 0 ) {
        foreach ( $sorted_menu_items as $menu_item ) {
          if ( $menu_item->ID == $prev_root_id ) {
            $prev_root_id = $menu_item->menu_item_parent;
            // don't set the root_id to 0 if we've reached the top of the menu
            if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
            break;
          } 
        }
      }
    }

    $menu_item_parents = array();
    foreach ( $sorted_menu_items as $key => $item ) {
      // init menu_item_parents
      if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;

      if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
        // part of sub-tree: keep!
        $menu_item_parents[] = $item->ID;
      } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
        // not part of sub-tree: away with it!
        unset( $sorted_menu_items[$key] );
      }
    }
    
    return $sorted_menu_items;
  } else {
    return $sorted_menu_items;
  }
}
// add hook
add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );


// TinyMCE styles...
// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');


// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings				
		array(  
			'title' => 'Button Link',  
			'block' => 'span',  
			'classes' => 'blockButton',
			'wrapper' => true
		),		
	); 
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 

// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  





//hide update notices
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );



/*SchooCMS Custom Post Types*/

add_action('init', 'cptui_register_my_cpt_call_outs');
function cptui_register_my_cpt_call_outs() {
register_post_type('call_outs', array(
'label' => 'Call Outs',
'description' => '',
'public' => false,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => true,
'rewrite' => array('slug' => 'call_outs', 'with_front' => true),
'query_var' => true,
'has_archive' => true,
'supports' => array('title','thumbnail'),
'labels' => array (
  'name' => 'Call Outs',
  'singular_name' => 'Call Out',
  'menu_name' => 'Call Outs',
  'add_new' => 'Add Call Out',
  'add_new_item' => 'Add New Call Out',
  'edit' => 'Edit',
  'edit_item' => 'Edit Call Out',
  'new_item' => 'New Call Out',
  'view' => 'View Call Out',
  'view_item' => 'View Call Out',
  'search_items' => 'Search Call Outs',
  'not_found' => 'No Call Outs Found',
  'not_found_in_trash' => 'No Call Outs Found in Trash',
  'parent' => 'Parent Call Out',
)
) ); 
}
add_action('init', 'cptui_register_my_cpt_quote');
function cptui_register_my_cpt_quote() {
register_post_type('quote', array(
'label' => 'Quotes',
'description' => '',
'public' => false,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => true,
'rewrite' => array('slug' => 'quote', 'with_front' => true),
'query_var' => true,
'has_archive' => true,
'exclude_from_search' => true,
'menu_position' => '50',
'supports' => array('title','editor'),
'labels' => array (
  'name' => 'Quotes',
  'singular_name' => 'Quote',
  'menu_name' => 'Quotes',
  'add_new' => 'Add Quote',
  'add_new_item' => 'Add New Quote',
  'edit' => 'Edit',
  'edit_item' => 'Edit Quote',
  'new_item' => 'New Quote',
  'view' => 'View Quote',
  'view_item' => 'View Quote',
  'search_items' => 'Search Quotes',
  'not_found' => 'No Quotes Found',
  'not_found_in_trash' => 'No Quotes Found in Trash',
  'parent' => 'Parent Quote',
)
) ); }


add_action('init', 'cptui_register_my_cpt_staff');
function cptui_register_my_cpt_staff() {
register_post_type('staff', array(
'label' => 'Staff',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'staff', 'with_front' => true),
'query_var' => true,
'has_archive' => false,
'supports' => array('title','editor','thumbnail','page-attributes'),
'labels' => array (
  'name' => 'Staff',
  'singular_name' => 'Staff Member',
  'menu_name' => 'Staff',
  'add_new' => 'Add Staff Member',
  'add_new_item' => 'Add New Staff Member',
  'edit' => 'Edit',
  'edit_item' => 'Edit Staff Member',
  'new_item' => 'New Staff Member',
  'view' => 'View Staff Member',
  'view_item' => 'View Staff Member',
  'search_items' => 'Search Staff',
  'not_found' => 'No Staff Found',
  'not_found_in_trash' => 'No Staff Found in Trash',
  'parent' => 'Parent Staff Member',
)
) ); }



add_action('init', 'cptui_register_my_cpt_documents');
function cptui_register_my_cpt_documents() {
register_post_type('documents', array(
'label' => 'Documents',
'description' => '',
'public' => false,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => true,
'rewrite' => array('slug' => 'documents', 'with_front' => true),
'query_var' => true,
'has_archive' => true,
'supports' => array('title'),
'labels' => array (
  'name' => 'Documents',
  'singular_name' => 'Document',
  'menu_name' => 'Documents',
  'add_new' => 'Add Document',
  'add_new_item' => 'Add New Document',
  'edit' => 'Edit',
  'edit_item' => 'Edit Document',
  'new_item' => 'New Document',
  'view' => 'View Document',
  'view_item' => 'View Document',
  'search_items' => 'Search Documents',
  'not_found' => 'No Documents Found',
  'not_found_in_trash' => 'No Documents Found in Trash',
  'parent' => 'Parent Document',
)
) ); }

add_action('init', 'cptui_register_my_cpt_poi_banners');
function cptui_register_my_cpt_poi_banners() {
register_post_type('poi_banners', array(
'label' => 'Points of Interest',
'description' => '',
'public' => false,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => true,
'rewrite' => array('slug' => 'poi_banners', 'with_front' => true),
'query_var' => true,
'has_archive' => true,
'supports' => array('title','thumbnail'),
'labels' => array (
  'name' => 'Points of Interest',
  'singular_name' => 'POI',
  'menu_name' => 'Points of Interest',
  'add_new' => 'Add POI',
  'add_new_item' => 'Add New POI',
  'edit' => 'Edit',
  'edit_item' => 'Edit POI',
  'new_item' => 'New POI',
  'view' => 'View POI',
  'view_item' => 'View POI',
  'search_items' => 'Search POIs',
  'not_found' => 'No POIs Found',
  'not_found_in_trash' => 'No POIs Found in Trash',
  'parent' => 'Parent POI',
)
) ); }





/*Custom fields*/
if(function_exists("register_field_group"))
{


	
	

	register_field_group(array (
		'id' => 'acf_documents',
		'title' => 'Documents',
		'fields' => array (
			array (
				'key' => 'field_52a1fa91d76b9',
				'label' => 'Document',
				'name' => 'document',
				'type' => 'file',
				'save_format' => 'object',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'documents',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	
	
	register_field_group( array (
		'id' => 'acf_quote-fields',
		'title' => 'Quote Fields',
		'fields' => array (
			array (
				'key' => 'field_52ab345a5878b',
				'label' => 'Cite',
				'name' => 'cite',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'quote',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	

	
	

	

	register_field_group(array (
		'id' => 'acf_staff-members',
		'title' => 'Staff Members',
		'fields' => array (
			array (
				'key' => 'field_52a70cf108ce1',
				'label' => 'Position',
				'name' => 'position',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52a6fcbc883be',
				'label' => 'Qualifications',
				'name' => 'qualifications',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52a6fcc8883bf',
				'label' => 'Email',
				'name' => 'email',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'staff',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

}
/*End Custom Fields*/


if( function_exists('acf_add_options_page') ) { 	
 	// add parent
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title' 	=> 'Theme Settings',
		'menu_slug' 	=> 'acf-options-theme-settings',
		'redirect' 		=> false
	));
}

include_once('alerts.php');

//columns


function my_gallery_default_type_set_link( $settings ) {
    $settings['galleryDefaults']['link'] = 'file';
    return $settings;
}
add_filter( 'media_view_settings', 'my_gallery_default_type_set_link');



function column_divider(){
	return '</div><div class="col-lg-6">';
}
add_shortcode( 'column_divider', 'column_divider' ); 



function SearchFilter($query) {
    // If 's' request variable is set but empty
    if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
        $query->is_search = true;
        $query->is_home = false;
    }
    return $query;}
add_filter('pre_get_posts','SearchFilter');

add_filter('wp_get_attachment_link', 'rc_add_rel_attribute');
function rc_add_rel_attribute($link) {
	global $post;
	return str_replace('<a href', '<a data-fancybox="onpage-gallery" href', $link);
}


//Query fields cascading up through ancestors
function query_ancestors_acf($args,$srcId = null){
	//needs to be an acf field name ie 'banner_slides'
	if(!$srcID){
		$srcID = $post->ID;
	}
	$ancestors = get_post_ancestors($srcID);
	if($ancestors){
		foreach($ancestors as $parent){
			if(get_field($args,$parent)){
				$parent_field_from = $parent;
				break;
			}
		}
	}
	return $parent_field_from;
}



/*Include Dynamic Content functions*/
include_once('inc/dynamic-functions.php');



/*MainBody clases to be used across site*/
function main_column_classes($xtraclass=null){
	$return = 'col-lg-8 col-md-7 order-md-2'.$xtraclass;
	return $return;
}
function left_column_classes($xtraclass=null){
	$return = 'col-lg-4 col-md-5 order-md-1'.$xtraclass;
	return $return;
}

function right_column_classes($xtraclass=null){	
	$return = 'col-lg-4 col-md-5 order-md-3'.$xtraclass;
	return $return;
}

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

function remove_h1_from_editor( $settings ) {
    $settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre;';
    return $settings;
}
add_filter( 'tiny_mce_before_init', 'remove_h1_from_editor' );

<?php
/*Schoocms Functions and Definitions*/
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
add_theme_support( 'title-tag' ); 
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
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', '', '5.3.0' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/fontawesome/css/all.min.css', '', '6.4.0');
	wp_enqueue_style( 'aos-style', get_template_directory_uri() . '/css/aos.css', '', '2.3.4');
	
	wp_enqueue_script( 'bootstrap-scripts', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js', array('jquery'), '5.3.0', true );
	wp_enqueue_script( 'cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'), '', true );
	wp_enqueue_script( 'cycle2', get_template_directory_uri() . '/js/jquery.cycle2.min.js', array('jquery'), '2.1.6', true );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.3.4', true );
	wp_enqueue_script( 'aos-script', get_template_directory_uri() . '/js/aos.js', array('jquery'), '2.3.4', true );
	wp_enqueue_script( 'fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array('jquery'), '', true );	
 }
add_action( 'wp_enqueue_scripts', 'schoocms_required_scripts' ); 
function schoocms_required_scripts_defer(){
	wp_enqueue_style( 'fancybox-style', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css','', '');  
	wp_enqueue_style( 'owl-style', get_template_directory_uri() . '/css/owl.carousel.min.css', '', '2.3.4' );
}
 add_action( 'wp_enqueue_scripts', 'schoocms_required_scripts_defer' ); 
function schoocms_fonts() {
	/*Put Font Includes here*/	
	wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i&display=swap' );
	wp_enqueue_style( 'crimson-pro', 'https://fonts.googleapis.com/css?family=Crimson+Pro:400,700&display=swap' );		
}
add_action( 'wp_enqueue_scripts', 'schoocms_fonts' );


function schoolcms_custom_scripts() {
	/*Further Scripts and Styles Stylesheet and scripts file set here to overwrite*/		
	wp_enqueue_style( 'sc-typography', get_template_directory_uri() . '/css/typography.css', '', '5.0' );
	wp_enqueue_style( 'sc-defaults', get_template_directory_uri() . '/css/default.css', '', '5.0' );
	wp_enqueue_style( 'sc-style', get_stylesheet_uri() );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1', true );
	
}
add_action( 'wp_enqueue_scripts', 'schoolcms_custom_scripts' );

function my_theme_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/css/typography.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );
// **************************************
// SCHOOCMS FUNCTIONS
// **************************************
//No Srcset attachment image
if (!function_exists('wp_get_attachment_image_no_srcset')) {
	function wp_get_attachment_image_no_srcset($attachment_id, $size = 'thumbnail', $icon = false, $attr = '') {
		// add a filter to return null for srcset
		add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
		// get the srcset-less img html
		$html = wp_get_attachment_image($attachment_id, $size, $icon, $attr);
		// remove the above filter
		remove_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
		return $html;
	}
}

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
// SCHOOCMS ADMIN FILTERS
// **************************************

include_once('inc/login-page.php');

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
add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );

//Nav Walker Add Toggle.
class nav_arrow_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		if(is_array($item->classes)){
			if(in_array('menu-item-has-children',$item->classes)){
				if(in_array('current-menu-ancestor',$item->classes) || in_array('current-menu-item',$item->classes)){
					$item->classes[] = 'open';
					$item->classes[] = 'toggleable';
				} else {
					$item->classes[] = 'toggleable';		
				}
			}			
		} else {
			$item->classes = array();
		}
		$output .= "<li class='" .  implode(" ", $item->classes) . "'>"; 
		$output .= $args->before;
		$output .= '<a href="' . $item->url . '">';
		$output .= $args->link_before . $item->title . $args->link_after;
		$output .= '</a>';
		$output .= $args->after;
		if ($args->walker->has_children) {
			$output .= '<span class="arrow toggleItem"></span>';
		}
	}
}
class mobile_nav_walker extends Walker_Nav_Menu {
	private $parent_title = false;
	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		if ( '_blank' === $item->target && empty( $item->xfn ) ) {
			$atts['rel'] = 'noopener';
		} else {
			$atts['rel'] = $item->xfn;
		}

		if ( ! empty( $item->url ) ) {
			if ( get_privacy_policy_url() === $item->url ) {
				$atts['rel'] = empty( $atts['rel'] ) ? 'privacy-policy' : $atts['rel'] . ' privacy-policy';
			}

			$atts['href'] = $item->url;
		} else {
			$atts['href'] = '';
		}
		if(is_array($item->classes)){
			if(in_array('menu-item-has-children',$item->classes)){
				if(in_array('current-menu-ancestor',$item->classes) || in_array('current-menu-item',$item->classes)){
					$item->classes[] = 'open';
					$item->classes[] = 'toggleable';
				} else {
					$item->classes[] = 'toggleable';		
				}
			}			
		} else {
			$item->classes = array();
		}
		if((in_array('menu-item-has-children',$item->classes) && in_array('current-menu-ancestor',$item->classes)) || (in_array('menu-item-has-children',$item->classes) && in_array('current-menu-item',$item->classes))){
			$item->classes[] = 'open';
			$item->classes[] = 'toggleable';
		} else {
			$item->classes[] = 'toggleable';			
		}
		$atts       = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
		$attributes = $this->build_atts( $atts );
		
		$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
		$output .= $args->before;		
		if ($args->walker->has_children) {
			$output .=  '<a' . $attributes . ' class="toggleItem">';

		} else {
			$output .=  '<a' . $attributes . '>';
		}			
		$output .= $args->link_before . $item->title . $args->link_after;
		$output .= '</a>';		
		$output .= $args->after;
		$parentclasses = str_replace('menu-item-has-children','submenu_parent', implode(" ", $item->classes));
		$this->parent_title = '<li class="' .  $parentclasses . '"><a href="' . $item->url . '">'.$item->title.'</a></li>';
	}
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat( $t, $depth );

		$classes = array( 'sub-menu' );
		
		$class_names = implode( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$output .= "{$n}{$indent}<ul$class_names>{$n}";
		$output .= $this->parent_title;
		$this->parent_title = '';
	}
}


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


include_once('inc/post_types.php');
include_once('inc/custom-fields.php');
include_once('inc/content-partials.php');

/*End Custom Fields*/

include_once('inc/schoocms_options.php');
include_once('inc/shortcodes.php');
include_once('inc/alerts.php');
include_once('inc/curriculum.php');

//columns
function my_gallery_default_type_set_link( $settings ) {
    $settings['galleryDefaults']['link'] = 'file';
    return $settings;
}
add_filter( 'media_view_settings', 'my_gallery_default_type_set_link');


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
	global $post;
	$parent_field_from = false;
	if(!isset($srcID)){
		if(isset($post)){
			$srcID = $post->ID;
		} else {
			$srcID = '';
		}		
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
	$return = 'col-lg-8 col-md-7 order-md-2 '.$xtraclass;
	return $return;
}
function left_column_classes($xtraclass=null){
	$return = 'col-lg-4 col-md-5 order-md-1 '.$xtraclass;
	return $return;
}
function right_column_classes($xtraclass=null){	
	$return = 'col-lg-4 col-md-5 order-md-3 '.$xtraclass;
	return $return;
}
include_once('inc/wpforms_customs.php');
function remove_h1_from_editor( $settings ) {
    $settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre;';
    return $settings;
}
add_filter( 'tiny_mce_before_init', 'remove_h1_from_editor' );


//Fix crop thumbnails not appearing on acf options page or term pages
add_filter('crop_thumbnails_activat_on_adminpages', function($oldValue) {
	global $pagenow;
	return $oldValue || $pagenow==='admin.php' || $pagenow==='term.php' ;
});
add_action( 'the_content', 'wpse_260756_the_content', 10, 1 );
function wpse_260756_the_content( $content ) {
  $pattern = "/<table(.*?)>(.*?)<\/table>/i";
  $replacement = '<div class="table-responsive"><table$1>$2</table></div>';

  return preg_replace( $pattern, $replacement, $content );
}
add_filter( 'embed_oembed_html', 'wrap_oembed_html', 99, 4 );

function wrap_oembed_html( $cached_html, $url, $attr, $post_id ) {
	if ( false !== strpos( $url, "youtube.com") || false !== strpos( $url, "youtu.be" ) || false !== strpos( $url, "vimeo.com" )) {
		$cached_html = '<div class="embed-container">' . $cached_html . '</div>';
	}
	return $cached_html;
}
function insert_admin_fixeditem_fix_in_footer(){
	if(is_user_logged_in()){?>
	<style type="text/css">		
	.admin-bar .headGroup,
	.admin-bar .fixedItem,
	.admin-bar #navbar{
		margin-top:46px
	}

	@media (max-width:600px){
	.admin-bar.fixedHeader .headGroup,
	.admin-bar.fixedHeader .fixedItem,
	.admin-bar.fixedHeader #navbar{
		margin-top:0;
	}
	}
		
	@media (min-width:768px){
		.admin-bar .headGroup,
		.admin-bar .fixedItem,
		.admin-bar #navbar{
			margin-top:32px
		}	
	}
	</style>
<?php }
}
 add_action( 'get_footer', 'insert_admin_fixeditem_fix_in_footer' ); 

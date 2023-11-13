<?php

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

?>
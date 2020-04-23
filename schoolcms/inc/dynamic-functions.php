<?php 
/*Dynamic content function
the_dynamic_content($dynamic_content,$dynamic_style,$cascade,$custom_class)
$dynamic_content = The content type. Defaults to column_content but can use any other dynamic content that uses the same layout (left_column_content)
$dynamic_style = The sub type of dynamic content. Defaults to using base content but options such as "sidebar" and "home" refer to the folder
$cascade = true/false will cascades the content up to the top level.
$custom_class

Sidebar exceptions : The sidebar will default to casscade as well as set a $is_sidebar variable as true
*/

function the_dynamic_content($dynamic_content = 'column_content', $dynamic_style = null, $cascade = null, $custom_class = null){
	global $post;	
	global $content_type;
	global $is_sidebar;
	//Set cascade if is sidebar and not explicitly set or if cascade is true
	if(($dynamic_style == 'sidebar' && $cascade !== false) || $cascade == true){
		if(have_rows($dynamic_content)){
			$content_from = get_the_ID();
		} elseif(query_ancestors_acf($dynamic_content)) {
			$content_from = query_ancestors_acf($dynamic_content);
		}  else {
			$content_from = 'options';
		} 
	}
	//Set value is_sidebar true if sidebar
	if($dynamic_style == 'sidebar'){
		$is_sidebar = true;
	}
	$dynamic_type_class = $dynamic_style.'Dynamic';
	while ( have_rows($dynamic_content, $content_from) ) : the_row(); ?>	
		<?php $content_type = get_sub_field('content_type');?>
		<section class="dynamicContent <?php echo $dynamic_type_class;?> dynamic-<?php echo $content_type;?> <?php echo $custom_class;?>">
			<?php 
				get_template_part('template-parts/dynamic-content/'.$dynamic_style.'/dynamic', $content_type);
			?>
		</section>		
	<?php endwhile;
	
}

/*Dynamic ACF Fields Central and Sidebar*/
/*
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_594a34c088d43',
	'title' => 'Central Column',
	'fields' => array(
		array(
			'key' => 'field_594a34ea18e16',
			'label' => 'Column Content',
			'name' => 'column_content',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Content',
			'sub_fields' => array(
				array(
					'key' => 'field_594a353818e17',
					'label' => 'Content Type',
					'name' => 'content_type',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'text' => 'Text',
						'image' => 'Image',
						'faq' => 'FAQ',
						'quote' => 'Quote',
						'gallery' => 'Gallery',
						'carousel' => 'Carousel',
						'documents' => 'Documents',
						'staff' => 'Staff',
						'callout' => 'Call Out',
						'poi' => 'Points of Interest',
						'divider' => 'Divider',
					),
					'default_value' => array(
					),
					'allow_null' => 1,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5c5c459f03d64',
					'label' => 'Section Title',
					'name' => 'section_title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'quote',
							),
						),
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'documents',
							),
						),
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'staff',
							),
						),
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'faq',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_594a39b76ad90',
					'label' => 'Text Block',
					'name' => 'text_block',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'text',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
				array(
					'key' => 'field_594cd1a76e635',
					'label' => 'Image',
					'name' => 'image_item',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'image',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => 'jpg,jpeg',
				),
				array(
					'key' => 'field_594cd556d7059',
					'label' => 'Image Size',
					'name' => 'image_item_size',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'image',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'landscape' => 'Landscape',
						'portrait' => 'Portrait',
						'post-thumbnail' => 'Square',
						'page-banner' => 'Banner',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_594a39e86ad91',
					'label' => 'FAQ items',
					'name' => 'faq_items',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'faq',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'block',
					'button_label' => 'Add FAQ',
					'sub_fields' => array(
						array(
							'key' => 'field_594a3a1c6ad92',
							'label' => 'Question',
							'name' => 'question',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_594a3a5d6ad93',
							'label' => 'Answer',
							'name' => 'answer',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
							'delay' => 0,
						),
					),
				),
				array(
					'key' => 'field_594a3a7d6ad94',
					'label' => 'Quotes',
					'name' => 'quotes',
					'type' => 'relationship',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'quote',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
						0 => 'quote',
					),
					'taxonomy' => array(
					),
					'filters' => '',
					'elements' => '',
					'min' => '',
					'max' => '',
					'return_format' => 'object',
				),
				array(
					'key' => 'field_594ccfb6078fe',
					'label' => 'Members of Staff',
					'name' => 'members_of_staff',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'staff',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_594ccfcf078ff',
							'label' => 'Member of Staff',
							'name' => 'member_of_staff',
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
								0 => 'staff',
							),
							'taxonomy' => array(
							),
							'allow_null' => 0,
							'multiple' => 0,
							'return_format' => 'object',
							'ui' => 1,
						),
						array(
							'key' => 'field_594ccfe707900',
							'label' => 'Display Type',
							'name' => 'member_of_staff_display_type',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'standard' => 'Standard',
								'featured' => 'Featured',
							),
							'default_value' => array(
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
					),
				),
				array(
					'key' => 'field_594a3ac26ad97',
					'label' => 'Gallery Images',
					'name' => 'gallery_images',
					'type' => 'gallery',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'gallery',
							),
						),
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'carousel',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'min' => '',
					'max' => '',
					'insert' => 'append',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
					'return_format' => 'array',
					'preview_size' => 'medium',
				),
				array(
					'key' => 'field_594a3b4c6ad9b',
					'label' => 'Documents',
					'name' => 'documents',
					'type' => 'relationship',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'documents',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
						0 => 'documents',
					),
					'taxonomy' => array(
					),
					'filters' => array(
						0 => 'search',
					),
					'elements' => '',
					'min' => '',
					'max' => '',
					'return_format' => 'object',
				),
				array(
					'key' => 'field_594a3c736ad9f',
					'label' => 'Call Outs',
					'name' => 'callouts',
					'type' => 'relationship',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'callout',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
						0 => 'call_outs',
					),
					'taxonomy' => array(
					),
					'filters' => array(
						0 => 'search',
					),
					'elements' => '',
					'min' => '',
					'max' => 1,
					'return_format' => 'object',
				),
				array(
					'key' => 'field_594a4226536d5',
					'label' => 'Points Of Interest',
					'name' => 'points_of_interest',
					'type' => 'relationship',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'poi',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
						0 => 'poi_banners',
					),
					'taxonomy' => array(
					),
					'filters' => array(
						0 => 'search',
					),
					'elements' => '',
					'min' => '',
					'max' => '',
					'return_format' => 'object',
				),
				array(
					'key' => 'field_594a4293536d6',
					'label' => 'Divider',
					'name' => 'divider',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_594a353818e17',
								'operator' => '==',
								'value' => 'divider',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'dividera' => 'Divider A',
						'dividerb' => 'Divider B',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
			array(
				'param' => 'page_type',
				'operator' => '!=',
				'value' => 'front_page',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 10,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_595f5de6ab548',
	'title' => 'Sidebar',
	'fields' => array(
		array(
			'key' => 'field_5d443c3679cbe',
			'label' => 'Sidebar Content',
			'name' => 'left_column_content',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Content',
			'sub_fields' => array(
				array(
					'key' => 'field_5d443c3679cbf',
					'label' => 'Content Type',
					'name' => 'content_type',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'text' => 'Text',
						'image' => 'Image',
						'faq' => 'FAQ',
						'quote' => 'Quote',
						'gallery' => 'Gallery',
						'carousel' => 'Carousel',
						'documents' => 'Documents',
						'staff' => 'Staff',
						'callout' => 'Call Out',
						'poi' => 'Points of Interest',
						'divider' => 'Divider',
					),
					'default_value' => array(
					),
					'allow_null' => 1,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5d443c3679cc0',
					'label' => 'Section Title',
					'name' => 'section_title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'quote',
							),
						),
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'staff',
							),
						),
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'documents',
							),
						),
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'faq',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5d443c3679cc1',
					'label' => 'Text Block',
					'name' => 'text_block',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'text',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
				array(
					'key' => 'field_5d443c3679cc2',
					'label' => 'Image',
					'name' => 'image_item',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'image',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => 'jpg,jpeg',
				),
				array(
					'key' => 'field_5d443c3679cc3',
					'label' => 'Image Size',
					'name' => 'image_item_size',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'image',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'landscape' => 'Landscape',
						'portrait' => 'Portrait',
						'post-thumbnail' => 'Square',
						'page-banner' => 'Banner',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => 'field_5d443c3679cc4',
					'label' => 'FAQ items',
					'name' => 'faq_items',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'faq',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'block',
					'button_label' => 'Add FAQ',
					'sub_fields' => array(
						array(
							'key' => 'field_5d443c3679cc5',
							'label' => 'Question',
							'name' => 'question',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5d443c3679cc6',
							'label' => 'Answer',
							'name' => 'answer',
							'type' => 'wysiwyg',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'tabs' => 'all',
							'toolbar' => 'full',
							'media_upload' => 1,
							'delay' => 0,
						),
					),
				),
				array(
					'key' => 'field_5d443c3679cc7',
					'label' => 'Quotes',
					'name' => 'quotes',
					'type' => 'relationship',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'quote',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
						0 => 'quote',
					),
					'taxonomy' => array(
					),
					'filters' => '',
					'elements' => '',
					'min' => '',
					'max' => '',
					'return_format' => 'object',
				),
				array(
					'key' => 'field_5d443c3679cc8',
					'label' => 'Members of Staff',
					'name' => 'members_of_staff',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'staff',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'table',
					'button_label' => '',
					'sub_fields' => array(
						array(
							'key' => 'field_5d443c3679cc9',
							'label' => 'Member of Staff',
							'name' => 'member_of_staff',
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
								0 => 'staff',
							),
							'taxonomy' => array(
							),
							'allow_null' => 0,
							'multiple' => 0,
							'return_format' => 'object',
							'ui' => 1,
						),
						array(
							'key' => 'field_5d443c3679cca',
							'label' => 'Display Type',
							'name' => 'member_of_staff_display_type',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'standard' => 'Standard',
								'featured' => 'Featured',
							),
							'default_value' => array(
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'ajax' => 0,
							'return_format' => 'value',
							'placeholder' => '',
						),
					),
				),
				array(
					'key' => 'field_5d443c3679ccb',
					'label' => 'Gallery Images',
					'name' => 'gallery_images',
					'type' => 'gallery',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'gallery',
							),
						),
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'carousel',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'min' => '',
					'max' => '',
					'insert' => 'append',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
					'return_format' => 'array',
					'preview_size' => 'medium',
				),
				array(
					'key' => 'field_5d443c3679ccc',
					'label' => 'Documents',
					'name' => 'documents',
					'type' => 'relationship',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'documents',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
						0 => 'documents',
					),
					'taxonomy' => array(
					),
					'filters' => array(
						0 => 'search',
					),
					'elements' => '',
					'min' => '',
					'max' => '',
					'return_format' => 'object',
				),
				array(
					'key' => 'field_5d443c3679ccd',
					'label' => 'Call Outs',
					'name' => 'callouts',
					'type' => 'relationship',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'callout',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
						0 => 'call_outs',
					),
					'taxonomy' => array(
					),
					'filters' => array(
						0 => 'search',
					),
					'elements' => '',
					'min' => '',
					'max' => 1,
					'return_format' => 'object',
				),
				array(
					'key' => 'field_5d443c3679cce',
					'label' => 'Points Of Interest',
					'name' => 'points_of_interest',
					'type' => 'relationship',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'poi',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
						0 => 'poi_banners',
					),
					'taxonomy' => array(
					),
					'filters' => array(
						0 => 'search',
					),
					'elements' => '',
					'min' => '',
					'max' => '',
					'return_format' => 'object',
				),
				array(
					'key' => 'field_5d443c3679ccf',
					'label' => 'Divider',
					'name' => 'divider',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5d443c3679cbf',
								'operator' => '==',
								'value' => 'divider',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'dividera' => 'Divider A',
						'dividerb' => 'Divider B',
					),
					'default_value' => array(
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
			array(
				'param' => 'page_type',
				'operator' => '!=',
				'value' => 'front_page',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-theme-settings',
			),
		),
	),
	'menu_order' => 20,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
*/
?>
<?php
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Site Alert',
		'menu_title'	=> 'Alert Settings',
		'menu_slug' 	=> 'alert-settings',
		'capability'	=> 'edit_posts',
		'parent_slug'	=> 'acf-options-theme-settings',
		'post_id' => 'custom_alert',
		'redirect'		=> false
	));
	
}

/*Alert Fields*/
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5e442aa2bc62d',
	'title' => 'Alert',
	'fields' => array(
		array(
			'key' => 'field_5e442b07341e9',
			'label' => 'Title',
			'name' => 'title',
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
			'key' => 'field_5e442b0c341ea',
			'label' => 'Text',
			'name' => 'text',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '80',
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
			'key' => 'field_5e442d139ceed',
			'label' => 'Image',
			'name' => 'image',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '20',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5e442ae9341e8',
			'label' => 'Alert Status',
			'name' => 'alert_status',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'Disabled' => 'Disabled',
				'Active' => 'Active',
				'Test' => 'Test',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5e442b1d0de07',
			'label' => 'Active Dates',
			'name' => 'active_dates',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e442ae9341e8',
						'operator' => '==',
						'value' => 'Active',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'row',
			'sub_fields' => array(
				array(
					'key' => 'field_5e442b440de08',
					'label' => 'Date From',
					'name' => 'date_from',
					'type' => 'date_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'display_format' => 'd/m/Y',
					'return_format' => 'Ymd',
					'first_day' => 1,
				),
				array(
					'key' => 'field_5e442b4c0de09',
					'label' => 'Date To',
					'name' => 'date_to',
					'type' => 'date_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'display_format' => 'd/m/Y',
					'return_format' => 'Ymd',
					'first_day' => 1,
				),
			),
		),
		array(
			'key' => 'field_5e442be7b113f',
			'label' => 'Frequency',
			'name' => 'frequency',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e442ae9341e8',
						'operator' => '==',
						'value' => 'Active',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				1 => 'Once a Day',
				7 => 'Once a Week',
				30 => 'Once a Month',
				'session' => 'On every new visit',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'alert-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;



function hook_alert(){
	//jquery script to load if it's active
	if(get_field('alert_status','custom_alert') == 'Active'){	
		$active_dates = get_field('active_dates','custom_alert');
		$startDate = $active_dates['date_from'];
		$endDate = $active_dates['date_to'];
		$thisDate = date('Ymd');
		if($startDate <= $thisDate && $endDate >= $thisDate) { 
			$showAlert = true;
		} else {
			$showAlert = false;
		}
	}

	if((get_field('alert_status','custom_alert') == 'Active' && $showAlert == true) || (get_field('alert_status','custom_alert') == 'Test' && is_user_logged_in())){?>
		<div style="display:none">
			<a id="trig" href="#notice" class="fancybox-inline" data-fancybox></a>
			<div id="notice" class="popupAlert clear">
				<div class="noticeBody clear">
					<div class="row">						
						<div class="noticeText col">
							<div class="popTitle entry-title"><?php the_field('title','custom_alert') ?></div>
							<?php the_field('text','custom_alert') ?>						
						</div>
						<?php if ( get_field('image','custom_alert')): 
						$img = get_field('image','custom_alert');?>
							<div class="popupImg col-6"><?php echo wp_get_attachment_image($img['id'],'medium'); ?></div>
						<?php endif; ?>
					</div>
				</div>
			</div> 
		</div>
		<script type="text/javascript">
			// alert
			
			<?php if(get_field('alert_status','custom_alert') == 'Test' && is_user_logged_in()):?>
				jQuery(document).ready(function($){
						setTimeout(function(){$("a#trig").click();},1000);
				});
			<?php else:
			$noVar = get_field('frequency','custom_alert');
			?>
				jQuery(document).ready(function($){
					if(jQuery.cookie("schooAlert<?php echo $noVar;?>") != 'true') {
						setTimeout(function(){jQuery("a#trig").click();},1000);
						jQuery.cookie("schooAlert<?php echo $noVar;?>", "true", { path: '/', <?php if($noVar != 'session'){?>expires: <?php if($noVar) echo $noVar; else echo '1';}?> }); 
					}
				})
			<?php endif;?>
		</script>	
<?php }
}
add_action('wp_footer','hook_alert');

?>
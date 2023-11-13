<?php 
function curriculum_scripts_styles(){
	wp_enqueue_style( 'curriculum-style', get_template_directory_uri() . '/css/curriculum.css' );
	wp_enqueue_script( 'curriculum-script', get_template_directory_uri() . '/js/curriculum-script.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'curriculum_scripts_styles' ); 
function get_curriculum_blocks($rowcount = 3){
	$subjects = get_field('subjects');
	//Rowcount from 1 to 4 only
	if($rowcount == 4){
		$blockClass = 'col-lg-3';	
		$subjectClass = 'order-lg-4';		
	} elseif($rowcount == 3){
		$blockClass = 'col-lg-4';	
		$subjectClass = 'order-lg-4';			
	} elseif($rowcount == 2){
		$blockClass = 'col-lg-6';	
		$subjectClass = 'order-lg-4';
	} else {
		$blockClass = 'col-lg-12';	
		$subjectClass = 'order-lg-4';
	}		
	$count = 0;
	if (have_rows('subjects')) {
	echo '<div id="subject-tiles">';
	echo '<div class=row>';
		while(have_rows('subjects')) {
			$count++;
			$index = $count;
			the_row();
			$image = get_sub_field('image');
			$previewimage = $image['sizes']['large-thumbnail'];
			$title = get_sub_field('title');
			$body = get_sub_field('text');
			?>
			<div class="<?php echo $blockClass;?>">
				<div class="tile subject-tile" data-subject="<?php echo $index; ?>" >
					<div class="tile-bg" style="background-image: url('<?php echo $previewimage; ?>');"></div>								
					<div class="overlay-hint"></div>
					<div class="cover">
						<div class="title"><?php echo $title; ?></div>
						<div class="button-wrap">
							<div class="toggle-subject"></div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-12 <?php echo $subjectClass;?>">
				<div id="subject-<?php echo $index ;?>" class="subject-block">
					<div class="spacing">
						<div class="panel">
							<div class="subject-close"></div>
							<div class="photo"><?php echo wp_get_attachment_image($image['id'],'large');?></div>
							<div class="subjContent">
								<h2 class="title"><?php echo $title ;?></h2>
								<div class="body"><?php echo $body ;?></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php 
			if ($count % $rowcount == 0) {
				echo '</div><div class="row">';				
			}
		}
	echo '</div>';
	echo '</div>';
	?>	
	
	<?php } else {
		return false;
	}

}

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5c9cbcbed6a80',
	'title' => 'Curriculum Template',
	'fields' => array(
		array(
			'key' => 'field_5c9cbcc605e59',
			'label' => 'Subjects',
			'name' => 'subjects',
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
			'layout' => 'row',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5c9cbcd705e5a',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
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
					'mime_types' => '',
				),
				array(
					'key' => 'field_5c9cbcdc05e5b',
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
					'key' => 'field_5c9cbcf605e5c',
					'label' => 'Text',
					'name' => 'text',
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
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/curriculum-page.php',
			),
		),
	),
	'menu_order' => 5,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

?>
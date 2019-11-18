	<?php 
	global $dynamic_content;
	global $content_type;
	global $is_sidebar;
	if(!isset($dynamic_content)) {
		$dynamic_content = 'column_content';
	} 
	if($dynamic_content != 'column_content') { 
		// is side column
		$is_sidebar = true;
		if(have_rows($dynamic_content)){
			$content_from = get_the_ID();
		} elseif(query_ancestors_acf($dynamic_content)) {
			$content_from = query_ancestors_acf($dynamic_content);;
		}  else {
			$content_from = 'options';
		} 
	} else {			
		$is_sidebar = false;
	}

	?>
					
	<!-- page_on_front -->
	<!-- extra content -->
	<?php  while ( have_rows($dynamic_content, $content_from) ) : the_row(); ?>	
		<?php $content_type = get_sub_field('content_type'); ?>
		<section class="dynamicContent dynamic-<?php echo $content_type;?>">
			<?php if($is_sidebar == true){
				get_template_part('template-parts/dynamic-content/sidebar/dynamic', $content_type);
			} else {
				get_template_part('template-parts/dynamic-content/dynamic', $content_type);
			}?>
		</section>		
	<?php endwhile; ?>
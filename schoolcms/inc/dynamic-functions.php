<?php 
/*Dynamic content function
the_dynamic_content($dynamic_content,$dynamic_style,$cascade,$custom_class)
$dynamic_content = The content type. Defaults to column_content but can use any other dynamic content that uses the same layout (left_column_content)
$dynamic_style = The sub type of dynamic content. Defaults to using base content but options such as "sidebar" and "home" refer to the folder
$cascade = true/false will cascades the content up to the top level.
$custom_class

Sidebar excerptions : The sidebar will default to casscade as well as set a $is_sidebar variable as true
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
	//Set is sidebar if sidebar
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

?>
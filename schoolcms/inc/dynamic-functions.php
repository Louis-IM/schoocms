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
	$content_from = '';
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
	} else {
		$is_sidebar = false;
	}
	$dynamic_type_class = ' ';
	if(isset($dynamic_style)){
		$dynamic_type_class .= $dynamic_style.'Dynamic';
	}
	$i = 0;
	while ( have_rows($dynamic_content, $content_from) ) : the_row();
	$i++;
		$content_type = get_sub_field('content_type');
		$content_type = get_row_layout();?>
		<section id="<?php echo $dynamic_content.'_'.$i;?>" class="dynamicContent <?php echo $dynamic_type_class;?> dynamic-<?php echo $content_type; if(isset($custom_class)){echo ' '.$custom_class;}?>">
			<?php 
				get_template_part('template-parts/dynamic-content/'.$dynamic_style.'/dynamic', $content_type);
			?>
		</section>		
	<?php endwhile;
	
}

?>
<div class="row pois">
<?php 
if(count(get_sub_field('points_of_interest')) % 3 == 0) {
	$post_col = "col-md-4 ";
} else {		
	$post_col = "col";
}	
//POI For Home Content
if(have_rows('points_of_interest')):
	
while(have_rows('points_of_interest')): the_row();				
//Perform setting checks
$link = get_sub_field('link');
$text = get_sub_field('text');
$image = get_sub_field('image');
$furthertxt = get_sub_field('further_text');
/* Check if link is a youtube or vimeo link */
if(strpos($link['url'],'youtube') || strpos($link['url'],'vimeo')){
	$style = 'vidBlock';
} else {
	$style = '';
}
if(!isset($thumbnailSize)){
	$thumbnailSize = 'large-thumbnail';
}

?>
<div class="<?php echo $post_col;?>">		
	<?php  $args = array(
			'link'=> $link,
			'text'=>$text,
			'lightbox'=>get_sub_field('open_in_lightbox'),
			'image_id'=>$image['id'],
			'further_text'=>$furthertxt,
		);
		get_the_poi($args);?>
</div>
<?php endwhile; ?>
</div>
<?php endif; ?>
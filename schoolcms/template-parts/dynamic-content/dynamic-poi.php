<?php if(get_sub_field('points_of_interest')):
global $is_sidebar;
?>

<div class="row pois">
<?php $posts = get_sub_field('points_of_interest'); ?>		
<?php foreach( $posts as $post ):  
setup_postdata($post);
if($is_sidebar){
	$post_col = "col-12";
} else {
	if(count($posts) % 3 == 0) {
		$post_col = "col-md-4 ";
	} else {		
		$post_col = "col";
	}						
}
//Perform setting checks
$link = get_field('link',$post);
$text = ( get_field('text',$post) )? get_field('text',$post) : get_the_title($post);
/* Check if link is a youtube or vimeo link */
if(strpos($link['url'],'youtube') || strpos($link['url'],'vimeo')){
	$style = 'vidBlock';
} else {
	$style = '';
}
if(!$thumbnailSize){
	$thumbnailSize = 'large-thumbnail';
}

?>
<div class="<?php echo $post_col;?>">		
	<a href="<?php echo $link['url']?>" target="<?php echo $link['target'];?>" class="poi <?php echo $style;?>" <?php if(get_field('open_in_lightbox',$post)){ echo 'data-fancybox';}?>>
		<?php //output different pois depending on whether poi has a thumbnail
		if(get_the_post_thumbnail_url($post)):?>
			<div class="poiImage">
				<div class="poiImageBG">
				<?php echo get_the_post_thumbnail($post, $thumbnailSize ) ?>
				</div>
					<div class="poiText">				
						<div class="poiTitle">
							<?php echo $text ?>
						</div>	
						<?php if(get_field('further_text')):?>
							<div class="poiEx">							
								<?php the_field('further_text');?>
							</div>
						<?php endif;?>
					</div>
			</div>
		<?php else:?>
		
			<div class="textOnlyBlock <?php if($icon){echo 'hasicon';}?>">
				 
				<div class="poiText">
					<div class="poiTitle">					
						<?php echo $text ?>
					</div>
					<?php if(get_field('further_text')):?>
						<div class="poiEx">							
							<?php the_field('further_text');?>
						</div>
					<?php endif;?>
				</div>
				
			</div>
		<?php endif;?>
	</a>
</div>
<?php endforeach; ?>
</div>

			<?php wp_reset_postdata();
			endif; ?>
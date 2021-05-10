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
	<a href="<?php echo $link['url']?>" target="<?php echo $link['target'];?>" class="poi <?php echo $style;?>" <?php if(get_sub_field('open_in_lightbox')){ echo 'data-fancybox';}?>>
		<?php //output different pois depending on whether poi has a thumbnail
		if($image):?>
			<div class="poiImage">
				<div class="poiImageBG">
				<?php echo wp_get_attachment_image($image['id'], $thumbnailSize ) ?>
				</div>
					<div class="poiText">				
						<div class="poiTitle">
							<?php echo $text ?>
						</div>	
						<?php if(get_sub_field('further_text')):?>
							<div class="poiEx">							
								<?php the_sub_field('further_text');?>
							</div>
						<?php endif;?>
					</div>
			</div>
		<?php else:?>
		
			<div class="textOnlyBlock">
				 
				<div class="poiText">
					<div class="poiTitle">					
						<?php echo $text ?>
					</div>
					<?php if(get_sub_field('further_text')):?>
						<div class="poiEx">							
							<?php the_sub_field('further_text');?>
						</div>
					<?php endif;?>
				</div>
				
			</div>
		<?php endif;?>
	</a>
</div>
<?php endwhile; ?>
</div>
<?php endif; ?>
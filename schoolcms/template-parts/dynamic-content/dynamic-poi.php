<?php if(get_sub_field('points_of_interest')){
global $is_sidebar;
$posts = get_sub_field('points_of_interest');?>
<div class="row pois <?php if(count($posts) > 1){echo 'carouselSwitch';}?>">
<?php 
if($is_sidebar){
	$post_col = "col-12";
} else {
	if(count($posts) % 3 == 0) {
		$post_col = "col-md-4 ";
	} else {		
		$post_col = "col";
	}						
}
foreach( $posts as $post ){?>
<div class="<?php echo $post_col;?>">		
	<?php if($post->post_type == 'poi_banners'){
	scms_linked_poi();
	} else {
		$args = array(
			'link'=> $post['link'],
			'text'=>$post['text'],
			'lightbox'=>$post['open_in_lightbox'],
			'image_id'=>$post['image']['id'],
			'further_text'=>$post['further_text'],
		);
		get_the_poi($args);
	}
	?>
</div>
<?php } ?>
</div>
<?php wp_reset_postdata();
} ?>
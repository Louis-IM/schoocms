<?php if(get_sub_field('gallery_images')):?>
	<?php $images = get_sub_field('gallery_images'); $imgArray = array(); ?>
	<?php foreach( $images as $image ){ array_push($imgArray,$image['ID']); } 
	$columns = get_sub_field('items_per_row');?>
	<?php echo do_shortcode('[gallery link="file" size="medium-thumbnail" columns="'.$columns.'" ids="' . implode(',', $imgArray) . '"]'); ?>
<?php 
endif; ?>
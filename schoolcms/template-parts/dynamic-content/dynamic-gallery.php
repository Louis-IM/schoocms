<?php if(get_sub_field('gallery_images')):?>
	<?php $images = get_sub_field('gallery_images'); $imgArray = array(); ?>
	<?php foreach( $images as $image ){ array_push($imgArray,$image['ID']); } ?>
	<?php echo do_shortcode('[gallery link="file" size="medium-thumbnail" columns="3" include="' . implode(',', $imgArray) . '"]'); ?>
<?php endif; ?>
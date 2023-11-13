<?php if(get_sub_field('gallery_images')):
	$images = get_sub_field('gallery_images'); $imgArray = array();
	foreach( $images as $image ){ array_push($imgArray,$image['ID']); } 
	$columns = get_sub_field('items_per_row');
	echo do_shortcode('[gallery link="file" size="medium-thumbnail" columns="'.$columns.'" include="' . implode(',', $imgArray) . '"]');
endif; ?>
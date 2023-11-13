<?php if(get_sub_field('image_item')):
	$image_item = get_sub_field('image_item');
	$image_item_size = get_sub_field('image_item_size');?>
		<figure class="image-item">
			<?php echo wp_get_attachment_image($image_item['id'],$image_item_size);
			if($image_item['caption'] != ''):?>
				<figcaption class="imageItemCaption">
					<?php echo $image_item['caption'];?>
				</figcaption>
			<?php endif;?>
		</figure>
<?php endif;?>
<?php if(get_sub_field('image_item')):?>

	<?php $image_item = get_sub_field('image_item') ; ?>
	<?php $image_item_size = get_sub_field('image_item_size') ; ?>
		<div class="image-item">
			<?php echo wp_get_attachment_image($image_item['id'],$image_item_size);?>
			<?php if($image_item['caption'] != ''):?>
				<div class="imageItemCaption">
					<?php echo $image_item['caption'];?>
				</div>
			<?php endif;?>
		</div>
<?php endif;?>
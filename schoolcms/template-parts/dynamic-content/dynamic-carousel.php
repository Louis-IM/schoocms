<?php if(get_sub_field('gallery_images')):?>
	<?php $images = get_sub_field('gallery_images'); ?>
	<?php $uid = 'uid' . rand(11111111,99999999);
	$columns = get_sub_field('items_per_row');?>
	<div class="owl-carousel <?php echo $uid ?> scms-carousel" data-columns="<?php echo $columns;?>">
	<?php foreach( $images as $image ): ?>
		<div class="item">
			<a class="image" href="<?php echo $image['url']; ?>" data-fancybox="carousel<?php echo $uid;?>">
				<?php echo wp_get_attachment_image($image['id'],'medium-thumbnail');?>
			</a>
		</div>
	<?php endforeach; ?>
	</div>
<?php endif; ?>
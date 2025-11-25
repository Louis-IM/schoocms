<?php 
$image_classes = '';
$text_classes = '';
$text = get_sub_field('text');
$image = get_sub_field('image');
$image_position = get_sub_field('image_position');
if($image_position == 'right'){
	$image_classes = 'order-lg-2';
	$text_classes = 'order-lg-1';	
}
?>
<div class="row">
	<?php if($image){?>
	<div class="col-lg-6 <?php echo $image_classes;?>">
		<?php echo wp_get_attachment_image($image['id'],'large');?>
	</div>
	<?php }?>
	<div class="col-lg-6 <?php echo $text_classes;?>">
		<?php echo $text;?>
	</div>
</div>
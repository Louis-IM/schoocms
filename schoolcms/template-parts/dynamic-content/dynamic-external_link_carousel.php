<?php $columns = get_sub_field('items_per_row');
if(have_rows('carousel_item')):?>
	<div class="owl-carousel scms-carousel" data-columns="<?php echo $columns;?>">
	<?php while(have_rows('carousel_item')): the_row();
		$url = get_sub_field('url');
		$image = get_sub_field('image');?>
		<div class="item">
			<?php if($url){?>
				<a class="image" href="<?php echo $url; ?>" target="_blank">
				<?php 	echo wp_get_attachment_image($image['id'],'medium');?>
				</a>
			<?php } else {
				echo wp_get_attachment_image($image['id'],'medium');
			}?>
		</div>
	<?php endwhile; ?>
	</div>
<?php endif; ?>
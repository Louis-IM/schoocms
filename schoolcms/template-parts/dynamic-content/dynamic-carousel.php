<?php if(get_sub_field('gallery_images')):?>
	<?php $images = get_sub_field('gallery_images'); ?>
	<?php $uid = 'uid' . rand(11111111,99999999);?>
	<div class="owl-carousel <?php echo $uid ?> scms-carousel">
	<?php foreach( $images as $image ): ?>
		<div class="item">
			<a class="image" href="<?php echo $image['url']; ?>" data-fancybox="carousel<?php echo $uid;?>">
				<img src="<?php echo $image['sizes']['medium-thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
			</a>
		</div>
	<?php endforeach; ?>
	</div>
	<script> 
	jQuery( document ).ready(function($) {
		$('.owl-carousel.<?php echo $uid ?>').owlCarousel({
			loop:true,
			autoplay:false,
			margin:15,
			nav:true,
			navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:2
				},
				992:{
					items:3
				}
			}
		})
	});
	</script>
<?php endif; ?>
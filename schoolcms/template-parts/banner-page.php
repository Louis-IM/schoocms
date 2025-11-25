<?php 
$banner_slides_from = 'options';
if(have_rows('banner_slides')){
	$banner_slides_from = $post->ID;
} elseif(query_ancestors_acf('banner_slides') != false){
	$banner_slides_from = query_ancestors_acf('banner_slides');
} else {
	$banner_slides_from = 'options';
}
if( have_rows('banner_slides',$banner_slides_from) ): ?>
<div class="page-banner" id="pageBanner">
	<div class="hero cycle-slideshow" data-cycle-log="false" data-cycle-fx="fadeout" data-cycle-timeout="6000" data-cycle-slides=">.slide">		
		<?php while ( have_rows('banner_slides', $banner_slides_from) ) : the_row(); ?>
		<?php $banner_slide = get_sub_field('banner_image'); ?>
			<div class="slide">
				<picture>		
					<source srcset="<?php echo $banner_slide['sizes']['page-banner'];?>" media="(min-width:992px)">
					<?php echo wp_get_attachment_image_no_srcset($banner_slide['id'],'large-thumbnail',false,array('class'=>'bannerImage'));?>
				</picture>							
			</div>
		<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>
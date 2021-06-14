<div class="page-banner" id="pageBanner">
	<?php 
	global $bannerGeneral;
	$srcID = $post->ID;
	$banner_slides_from = false;
	$thumbnail_from = false;
	/*Check if page has banner or thumbnail*/
	if(have_rows('banner_slides')){
		$banner_slides_from = $srcID;
	} else {
		/*query for page banners above*/		
		$banner_slides_from = query_ancestors_acf('banner_slides');
	}
	/*if news post without banner use news page as first fallback*/
	if($post->post_type == 'post' ){
		$newsPage = get_option('page_for_posts');
		if(!is_single()){
			if(have_rows('banner_slides',$newsPage)){			
				$banner_slides_from = $newsPage;
			}
		} else {
			if(!$banner_slides_from){
				if(have_rows('banner_slides',$newsPage)){
					$banner_slides_from = $newsPage;
				}
			}
		}		
	}
	/*get options page banner as fallback*/
	if(!$banner_slides_from || $bannerGeneral == true){
		$banner_slides_from = 'options';
	}
	if( $banner_slides_from ): ?>
		<div id="hero" class="cycle-slideshow cycle-slideshow-init hiddenNow" data-cycle-log="false" data-cycle-fx="fadeout" data-cycle-timeout="6000" data-cycle-slides=">.slide">
			
			<?php while ( have_rows('banner_slides', $banner_slides_from) ) : the_row(); ?>
			<?php $banner_slide = get_sub_field('banner_image'); ?>
				<div class="slide">
					<picture>		
						<source srcset="<?php echo $banner_slide['sizes']['page-banner'];?>" media="(min-width:992px)">
						<?php echo wp_get_attachment_image_no_srcset($banner_slide['id'],'large-thumbnail');?>
					</picture>							
				</div>
			<?php endwhile; ?>
		</div>
	
	<?php endif; ?>
</div>
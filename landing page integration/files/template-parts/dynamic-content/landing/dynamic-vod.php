<?php if(get_sub_field('intro_text')):?>
<div class="container">
	<div class="row">
		<div class="col col-xl-10 offset-xl-1">
		<?php the_sub_field('intro_text');?>			
		</div>
	</div>
</div>	
<?php endif;?>
<?php if(have_rows('virtual_open_day')): while(have_rows('virtual_open_day')): the_row();
$uid = rand(111,999);?>
<div class="container">
<div class="row"><div class="col-xl-10 offset-xl-1">
<div id="videos<?php echo $uid;?>" class="videoSlideshow">


	<div id="slideshow-1_<?php echo $uid;?>" class="slideshowMain" data-uid="<?php echo $uid;?>">		
	<div id="mainCar<?php echo $uid;?>" class="tourMainCar cycle-slideshow tourSlideshow"
        data-cycle-slides="> .tourSlide"
        data-cycle-timeout="0"
        data-cycle-prev="#slideshow-1 .cycle-prev"
        data-cycle-next="#slideshow-1 .cycle-next"
        data-cycle-caption="#slideshow-1 .custom-caption"
        data-cycle-caption-template="Slide {{slideNum}} of {{slideCount}}"
		data-cycle-auto-height=container
        data-cycle-fx="tileBlind">	
		<?php if(have_rows('additional_carousel')):
			$navItems = array();
			while(have_rows('additional_carousel')): the_row();?>
				<div class="tourSlide layout-<?php echo get_row_layout();?>">
					<?php if( get_row_layout() == 'gallery' ):?>
						<div class="row">							
							<div class="col-md-12">
								<div class="tourGallery">
									<?php if(get_sub_field('gallery_images')):
									$gallery = get_sub_field('gallery_images');
									$rand = rand(1,9999);?>
									<div class="galleryWrap">
										<div class="row">
										<?php foreach($gallery as $image):?>
										<div class="galleryItem col-xs-4 col-md-2">
											<a href="<?php echo $image['url'];?>" data-fancybox="<?php echo $rand;?>">
												<?php echo wp_get_attachment_image($image['id'],'medium-thumbnail');?>
											</a>
										</div>
										<?php endforeach;?>
										</div>
									</div>
									<?php $navItems[] = array(
										'title'=>get_sub_field('slide_title'),
										'type'=>'gallery',
										'thumbnail'=>$gallery[0]['sizes']['medium-thumbnail']
										);
									endif;?>
								</div>	
							</div>

						</div>
					<?php 
					endif;?>
					<?php if( get_row_layout() == 'video' ):
					$preview_image = get_sub_field('preview_image')?>
					<div class="tourVid">
						<div class="videoWrapper">
							<?php the_sub_field('video_embed');?>
						</div>
					</div>
					<?php $navItems[] = array(
										'title'=>get_sub_field('slide_title'),
										'type'=>'video',
										'thumbnail'=>$preview_image['sizes']['medium-thumbnail']
										);
					endif;?>
					<?php if( get_row_layout() == 'text' ):
					$gallery = get_sub_field('images');?>
					<?php if(count($gallery) == 1):?>
						<div class="row">							
							<div class="col-md-6 col-lg-7">
								<h2><?php echo get_sub_field('slide_title');?></h2>
								<?php the_sub_field('text');?>
							</div>							
							<div class="col-md-6 col-lg-5">
								<div class="tourFeatured">
									<?php echo wp_get_attachment_image($gallery[0]['id'],'large-thumbnail')?>
								</div>
							</div>
						</div>
						<?php $navItems[] = array(
						'title'=>get_sub_field('slide_title'),
						'type'=>'text',
						'thumbnail'=>$gallery[0]['sizes']['medium-thumbnail']
						);?>
					<?php else:?>
						<div class="row">
							<div class="col-md-6 col-lg-7">
								<h2><?php echo get_sub_field('slide_title');?></h2>
								<?php the_sub_field('text');?>
								<?php $rand = rand(1,9999);?>
							</div>
							<div class="col-md-6 col-lg-5">
								<div class="tourGallery" >
									<div class="row">
									<?php foreach($gallery as $image):
										?>
										<div class="<?php if(count($gallery) == 1){echo 'col';} else {echo 'col-4';}?>">	
												<a href="<?php echo $image['url'];?>" data-fancybox="<?php echo $rand;?>">
													<?php echo wp_get_attachment_image($image['id'],'medium-thumbnail');?>
												</a>
										</div>
									<?php endforeach;?>	
									</div>
								</div>
							</div>		
						</div>
						<?php $navItems[] = array(
							'title'=>get_sub_field('slide_title'),
							'type'=>'gallery',
							'thumbnail'=>$gallery[0]['sizes']['medium-thumbnail']
							);
						endif;?>
					<?php endif;?>
					
				</div>
			<?php endwhile;?>
		<?php endif;?>
	</div>
	</div>
	

	
	<div id="slideshow-2_<?php echo $uid;?>" class="slideshowSecondary" data-uid="<?php echo $uid;?>">
		<div id="tourNav<?php echo $uid;?>" class="tourNav owl-carousel">
			<?php $index = 0;
			foreach($navItems as $item):
			$itemtype = $item['type'];
			$itemimg = $item['thumbnail'];?>
			<div class="navIcon <?php echo $itemtype;?>-block" data-index="<?php echo $index++;?>">
				<div class="title"><span><?php echo $item['title'];?></span></div>
				<div class="navIconImg">
					<?php if($itemtype != 'text'):?>
					<div class="icon">
						<img src="<?php bloginfo('template_url');?>/images/icon-<?php echo $itemtype;?>.png"  class="odIcon"/>
					</div>
					<?php endif;?>
					<img src="<?php echo $itemimg;?>" class="sizerimg"/>
					
				</div>					
			</div>
			<?php endforeach;?>
		</div>
		
	</div>
	
	

	
		</div>


<script src="<?php bloginfo('template_url');?>/js/virtualopenday.js" ></script>
<link rel='stylesheet' href='<?php bloginfo('template_url');?>/css/virtualopenday.css' type='text/css' media='all' />
</div></div>
</div>

<?php endwhile; endif;?>

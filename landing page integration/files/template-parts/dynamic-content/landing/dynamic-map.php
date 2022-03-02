<?php if(have_rows('map')): while(have_rows('map')): the_row();?>
<?php $uid = '_u'.rand(111,999);?>
<div class="">
    <div class="map-body">

		<div class="row">
			<div class="col-sm-12">
			<div id="pageMap<?php echo $uid;?>" class="pageMap">
				<div class="mapWrap" style="position:relative">
					<?php $map_image = get_sub_field('map_image');
					echo wp_get_attachment_image($map_image['id'],'full');?>

					
					<?php 
					// if(have_rows('map_items')):
					$map_items = get_sub_field('map_items');
					$i = 0;
					?>
						<div class="mapItems" id="mapItems<?php $uid;?>">
							<?php 
							// while(have_rows('map_items')): the_row();
							
							foreach($map_items as $item):
							
							//$coords = get_sub_field('map_coordinates');
							//$opts = get_sub_field('marker_options');
							
							$coords = $item['map_coordinates'];
							$opts = $item['marker_options'];
							
							if($coords['x'] !== null){
								$locX = $coords['x'];
							}
							if($coords['y'] !== null){
								$locY = $coords['y'];
							}
							if($opts['width'] > 0){
								$width = $opts['width'];
							} else {
								$width = 'auto';
							}
							$i++;?>
							<div class="mapIcon activeIcon" style="top:<?php echo $locY;?>%;left:<?php echo $locX;?>%;">
								<a 
								href="#mapItem<?php echo $uid;?>_<?php echo $i;?>" 
								data-fancybox="mapItems" 
								class=" deskLink positionbottom<?php // if($opts['icon_position']){echo $opts['icon_position'];} else {echo 'bottom';}?>" 
								title="<?php echo $item['title']; // the_sub_field('title'); ?>"
								>
									<span class="iconButton"></span>							
									<div class="iconLabel" style="width:<?php echo $width;?>px"><?php echo $item['title']; // the_sub_field('title'); ?> </div>
								</a>
								<a 
								class="moblink" 
								href="#mapItem<?php echo $uid;?>_<?php echo $i;?>" 
								title="<?php echo $item['title']; // the_sub_field('title'); ?>"
								>
								<span class="iconKey"><?php echo $i ?></span>
								</a>
							</div>
							<?php endforeach;?>
							<?php // endwhile;?>
						</div>
					<?php //reset_rows();?>
					<?php // endif;?>

				</div>


				<div class="mapKey" style="position:relative">
					<?php 
					// if(have_rows('map_items')):
					
					$i = 0;
					?>
						<div class="mapItems" id="mapItems<?php echo $uid;?>">
							<?php 
							
							// while(have_rows('map_items')): the_row();
							// $coords = get_sub_field('map_coordinates');
							// $opts = get_sub_field('marker_options');
							
							foreach($map_items as $item):
							$coords = $item['map_coordinates'];
							$opts = $item['marker_options'];
							
							if($coords['x'] !== null){
								$locX = $coords['x'];
							}
							if($coords['y'] !== null){
								$locY = $coords['y'];
							}
							if($opts['width'] > 0){
								$width = $opts['width'];
							} else {
								$width = 'auto';
							}
							$i++;?>
							<div class="mapKeyItem">
								<a 
								href="#mapItem<?php echo $uid;?>_<?php echo $i;?>" 
								title="<?php echo $item['title']; // the_sub_field('title'); ?>"
								>
								<span class="iconKey"><?php echo $i ?></span>
								<div class="iconKeyLabel"><?php echo $item['title']; // the_sub_field('title'); ?> </div>
								</a>
							</div>
							<?php //endwhile;?>
							<?php endforeach;?>
						</div>
					<?php // reset_rows();?>
					<?php // endif;?>

				</div>












			
			<?php 
			//if(have_rows('map_items')):
			$i= 0;
			?>
				<div class="mapItems" id="mapItems<?php echo $uid;?>">
					<?php // while(have_rows('map_items')): the_row();
					
					foreach($map_items as $item):
					$i++;?>
					<div class="mapItemWRap">
						<div class="mapItem" id="mapItem<?php echo $uid;?>_<?php echo $i;?>">	
							<div class="itemInner">
								<div class="row">
									<div class="col-lg-7 itemBdy">	
										<a href="#pageMap<?php echo $uid;?>" class="btm">Back to Map ^</a>
										<h2><?php  echo $item['title']; // the_sub_field('title');?></h2>
										<?php  echo $item['text']; // the_sub_field('text'); ?>
										<div class="itemNav">			
											 <a href="javascript:;" class="button" data-fancybox-prev>Prev</a>
											 <a href="javascript:;" class="button" data-fancybox-next>Next</a>
										</div>
									</div>
									<?php // if(get_sub_field('images')):
										// $images = get_sub_field('images');
									
										if( isset($item['images'])  && $item['images'] ):
										$images = $item['images'];
										
										?>						
										<div class="col-lg-5">
										<?php if(count($images) > 1){?>
											<div class="mapImagesSlider cycle-slideshow" 
											data-cycle-slides=">.slide" 
											data-cycle-pager=">.pagerWrap .advPager" 
											data-cycle-auto-height="calc" 
											data-cycle-timeout=0 
											>
											<?php foreach($images as $image):
												?>
												<div class="slide" data-cycle-pager-template="<a href='#' class='pager <?php if(strpos($image['description'], 'you')) echo 'isvid' ?>'><img src='<?php echo wp_get_attachment_image_url($image['id'],'thumbnail');?>'></a>">
													<?php if(strpos($image['description'], 'you')): ?>
														<div class="clearfix">
														<div class="videoWrapper"><?php echo ( apply_filters('the_content', $image['description'] ) ) ?></div>
														<div style="display:table;clear: both;"></div>
														</div>
													<?php else: ?>
														<?php echo wp_get_attachment_image($image['id'],'large-thumbnail');?>
													<?php endif; ?>
												</div>
											<?php endforeach;?>
											<div class="cycle-prev nextprev">&lt;</div>
											<div class="cycle-next nextprev">&gt;</div>
											<div class="pagerWrap"><div class="advPager center external"></div></div>											
											</div>	
											
											
										<?php }else{?>
											<?php foreach($images as $image):
												echo wp_get_attachment_image($image['id'],'large-thumbnail');
											endforeach;
										}?>
										</div>
									<?php endif;?>
								</div>
							</div>
						</div>
					</div>
					<?php // endwhile;?>
					<?php endforeach;?>
				</div>
			<?php //endif;?>
			
			</div>
			</div>
		</div>
    </div>
</div>


<link rel='stylesheet' href='<?php bloginfo('template_url');?>/css/map.css' type='text/css' media='all' />

<?php endwhile; endif;?>

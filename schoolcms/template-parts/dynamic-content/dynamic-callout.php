<?php if(get_sub_field('callouts')):?>		
	<?php $callouts = get_sub_field('callouts') ?>		
	<?php foreach( $callouts as $callout ):?>
	<?php if($callout):
	$post = $callout;
	setup_postdata($post);?>
	<?php $link = get_field('link',$callout);
		if(get_field('callout_text')){
			$hasText = ' hastext';
		} else {
			$hasText = ' notext';			
		}
	?>
						

						
	<div class="callout <?php if(has_post_thumbnail($callout)){echo 'hasbg ';} echo $hasText;?>">
		<?php if(has_post_thumbnail($callout)){ ?>
		<div class="coimg">	
			<picture>
				<source srcset="<?php echo get_the_post_thumbnail_url( $callout->ID, 'home-banner' );?>" media="(min-width:768px)">
				<img src="<?php echo get_the_post_thumbnail_url( $callout->ID, 'large-thumbnail' );?>" alt="<?php the_field('text');?>"/>
			</picture>
		</div>
		<?php }?>
		<div class="calloutContent">
			<div class="row">
				<div class="col">
					<div class="calloutTitle">
						<h3><?php the_field('text');?></h3>
						<?php if(get_field('callout_subtitle')):?><div class="calloutSubtitle"><?php the_field('callout_subtitle');?></div><?php endif;?>
					</div>
					<?php if(get_field('callout_text')):?>
						<div class="calloutText">
							<?php the_field('callout_text');?>
						</div>
					<?php endif;?>
					<?php if($link):?>
						<a href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>" class="readmore" <?php if(get_field('open_in_lightbox',$post)){ echo 'data-fancybox';}?>><?php if($link['title']){echo $link['title'];}else{echo 'Read More';}?></a>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>


	<?php endif;
	wp_reset_postdata();?>
	<?php endforeach; ?>
<?php endif;?>
<?php 
//Callout For Home Content
if(have_rows('callouts')):?>		
	<?php $callouts = get_sub_field('callouts') ?>		
	<?php while(have_rows('callouts')): the_row();?>
	<?php $link = get_sub_field('link');
		if(get_sub_field('callout_text')){
			$hasText = ' hastext';
		} else {
			$hasText = ' notext';			
		}
		$image = get_sub_field('image');
	?>
						

						
	<div class="callout <?php if($image){echo 'hasbg ';} echo $hasText;?>">
		<?php if($image){ ?>
		<div class="coimg">	
			<picture>
				<source srcset="<?php echo $image['sizes']['home-banner'];?>" media="(min-width:768px)">
				<img src="<?php echo $image['sizes']['large-thumbnail-banner'];;?>" alt="<?php the_sub_field('text');?>"/>
			</picture>
		</div>
		<?php }?>
		<div class="calloutContent">
			<div class="row">
				<div class="col">
					<div class="calloutTitle">
						<h3><?php the_sub_field('text');?></h3>
						<?php if(get_sub_field('callout_subtitle')):?><div class="calloutSubtitle"><?php the_sub_field('callout_subtitle');?></div><?php endif;?>
					</div>
					<?php if(get_sub_field('callout_text')):?>
						<div class="calloutText">
							<?php the_sub_field('callout_text');?>
						</div>
					<?php endif;?>
					<?php if($link):?>
						<a href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>" class="readmore" <?php if(get_sub_field('open_in_lightbox')){ echo 'data-fancybox';}?>><?php if($link['title']){echo $link['title'];}else{echo 'Read More';}?></a>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>


	<?php endwhile; ?>
<?php endif;?>
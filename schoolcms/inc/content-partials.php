<?php if(!function_exists('featured_staff')){
	function featured_staff($header_ele = 'h1'){
		global $post;?>
		<div class="staffContent bodyContent">
			<?php echo '<'.$header_ele.'>'.get_the_title().'</'.$header_ele.'>';?>
			<div class="row">
				<?php if(has_post_thumbnail()):?>
				<div class="col-3 col-sm-4">
					<div class="postThumb ">
						<?php the_post_thumbnail('portrait'); ?>
					</div>
				</div>
				<?php endif;?>
				<div class="col">
					<?php if(get_field('position') || get_field('qualifications') || get_field('email') ): ?>
						<div class="featured-staff-metas staff-meta">
							<?php if(get_field('position')): ?>
								<div class="staff-meta">
									<div class="meta-label">Position:</div>
									<div class="meta-value"><?php the_field('position') ; ?></div>
								</div>
							<?php endif; ?>
							<?php if(get_field('qualifications')): ?>
								<div class="staff-meta">
									<div class="meta-label">Qualifications:</div>
									<div class="meta-value"><?php the_field('qualifications') ; ?></div>
								</div>
							<?php endif; ?>
							<?php if(get_field('email')): ?>
								<div class="staff-meta">
									<div class="meta-label">Email:</div>
									<div class="meta-value"><a href="mailto:<?php the_field('email') ; ?>" class="email-value"><?php the_field('email') ; ?></a></div>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<div class="body-text">
						<div class="row">
							<div class="col-md">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	<?php }
}
if(!function_exists('standard_staff')){
	function standard_staff($header_ele = 'h3'){
		global $post;?>
		<div class="standard-staff-member staffMember">
			<div class="row">
				<div class="col-sm-12">
					<?php echo '<'.$header_ele.'>'.get_the_title().'</'.$header_ele.'>';?>
				</div>
			</div>
			<div class="row">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="standard-staff-image col-sm-auto col-3">
						<?php the_post_thumbnail('medium-thumbnail' );?>
					</div>
				<?php endif; ?>					
				<div class="standard-staff-text col <?php if ( !has_post_thumbnail() ){echo 'noimg';};?>">											
						<?php if(get_field('position') || get_field('qualifications') || get_field('email') ): ?>
						<div class="standard-staff-metas staff-meta row">
							<?php if(get_field('position')): ?>
								<div class="staff-meta col">
									<div class="meta-label">Position:</div>
									<div class="meta-value"><?php the_field('position') ; ?></div>
								</div>
							<?php endif; ?>
							<?php if(get_field('qualifications')): ?>
								<div class="staff-meta col">
									<div class="meta-label">Qualifications:</div>
									<div class="meta-value"><?php the_field('qualifications') ; ?></div>
								</div>
							<?php endif; ?>
							<?php if(get_field('email')): ?>
								<div class="staff-meta col">
									<div class="meta-label">Email:</div>
									<div class="meta-value"><a href="mailto:<?php the_field('email') ; ?>" class="email-value"><?php the_field('email') ; ?></a></div>
								</div>
							<?php endif; ?>
						</div>
						<?php if($post->post_content != ''):?>
							<div class="staff-biog">
								<?php html5wp_excerpt('html5wp_custom_post') ?>	
								<a href="<?php the_permalink();?>" class="button">Read More</a>
							</div>
						<?php endif;?>
					<?php endif; ?>
				</div>					
			</div>
			
		</div>
	<?php }
}
if(!function_exists('get_the_poi')){
	function get_the_poi($args = null,$opts = null){
		/*args requirements*/
		/*
		(
			[link] => Array
				(
					[title] => 
					[url] => 
					[target] => 
				)

			[text] => String
			[lightbox] => Bool
			[image_id] => int
			[further_text] => String
		)*/
		if(isset($args)){
		$link = $args['link'];
		$text = $args['text'];
		$image_id = $args['image_id'];
		$excerpt = $args['further_text'];
		$style = '';
		if(strpos($link['url'],'youtube') || strpos($link['url'],'vimeo')){
			$style .= ' vidBlock';
		}
		if(!isset($thumbnailSize)){
			$thumbnailSize = 'large-thumbnail';
		}
		$poiattr = '';		
		if($link){
			if($args['lightbox']== true){
				$poiattr .= 'data-fancybox';
			}
			$poiStart = 'a href="'.$link['url'].'" target="'.$link['target'].'" '.$poiattr;
			$poiEnd = 'a';
		} else {
			$poiStart = 'div';
			$poiEnd = 'div';
		}
		?>
		<<?php echo $poiStart;?> class="poi <?php echo $style;?>">
			<?php if($image_id){?>
			<div class="poiImage">
				<div class="poiImageBG">
					<?php echo wp_get_attachment_image($image_id, $thumbnailSize ) ?>
				</div>
				<div class="poiText">				
					<div class="poiTitle">
						<?php echo $text ?>
					</div>	
					<?php if($excerpt){?>
						<div class="poiEx">							
							<?php echo $excerpt;?>
						</div>
					<?php }?>
				</div>
			</div>
			<?php } else {?>
			<div class="textOnlyBlock">
				<div class="poiText">
					<div class="poiTitle">					
						<?php echo $text ?>
					</div>
					<?php if($excerpt){?>
						<div class="poiEx">							
							<?php echo $excerpt;?>
						</div>
					<?php }?>
				</div>
			</div>
			<?php }?>
		</<?php echo $poiEnd;?> >
		<?php 
		}//print_r($args);
	}
}
if(!function_exists('linked_poi')){
	function scms_linked_poi(){
		global $post;
		setup_postdata($post);
		$args = array(
			'link'=> get_field('link'),
			'text'=>get_field('text'),
			'lightbox'=>get_field('open_in_lightbox'),
			'image_id'=>get_post_thumbnail_id(),
			'further_text'=>get_field('further_text'),
		);
		get_the_poi($args);
	}
}
if(!function_exists('get_the_callout')){
	function get_the_callout($args = null,$opts = null){
		if(isset($args)){
		$link = $args['link'];
		$text = $args['text'];
		$subtitle = $args['subtitle'];
		$image_id = $args['image_id'];
		$excerpt = $args['further_text'];
		$style = '';
		$hasText = '';
		if($excerpt){
			$hasText = ' hastext';
		} else {
			$hasText = ' notext';			
		}
		?>
		
		<div class="callout <?php if($image_id){echo 'hasbg ';} echo $hasText;?>">
			<?php if($image_id){ ?>
			<div class="coimg">	
				<picture>
					<source srcset="<?php echo wp_get_attachment_image_url( $image_id, 'home-banner' );?>" media="(min-width:768px)">
					<?php echo wp_get_attachment_image_no_srcset($image_id, 'large-thumbnail');?>
				</picture>
			</div>
			<?php }?>
			<div class="calloutContent container">
				<div class="row">
					<div class="col">
						<div class="calloutTitle">
							<h3 class="h2"><?php echo $text;?></h3>
							<?php if($subtitle):?><div class="calloutSubtitle"><?php echo $subtitle;?></div><?php endif;?>
						</div>
						<?php if($excerpt):?>
							<div class="calloutText">
								<?php echo $excerpt;?>
							</div>
						<?php endif;?>
						<?php if($link):?>
							<a href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>" class="button" <?php if($args['lightbox']== true){ echo 'data-fancybox';}?>><?php if($link['title']){echo $link['title'];}else{echo 'Read More';}?></a>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
		<?php }
	}
}
if(!function_exists('scms_linked_callout')){
	function scms_linked_callout(){
		global $post;
		setup_postdata($post);
		$args = array(
			'link'=> get_field('link'),
			'text'=>get_field('text'),
			'subtitle'=>get_field('callout_subtitle'),
			'lightbox'=>get_field('open_in_lightbox'),
			'image_id'=>get_post_thumbnail_id(),
			'further_text'=>get_field('callout_text'),
		);
		get_the_callout($args);
	}
}
?>
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
		$text = get_sub_field('text');
		$subtitle = get_sub_field('callout_subtitle');
		$lightbox = get_sub_field('open_in_lightbox');
		$callout_txt = get_sub_field('callout_text');
		$args = array(
			'link'=> $link,
			'text'=>$text,
			'subtitle'=>$subtitle,
			'lightbox'=>$lightbox,
			'image_id'=>$image['id'],
			'further_text'=>$callout_txt,
		);
		get_the_callout($args);
		
	?>
					
	<?php endwhile; ?>
<?php endif;?>
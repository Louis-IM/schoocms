<?php
if(have_rows('image_text_block')):
while(have_rows('image_text_block')): the_row();
 $style = get_sub_field('style');
if(get_sub_field('image')){ $image = get_sub_field('image');}
if(get_sub_field('text_block_position') == 'Left'){
	$textcolbt = 'col-md-7 col-xl-5';	
	$textrow = 'justify-content-start';
}
if(get_sub_field('text_block_position') == 'Center'){
	$textcolbt = 'col-md-7 col-xl-5';	
	$textrow = 'justify-content-center';
}
if(get_sub_field('text_block_position') == 'Right'){
	$textcolbt = 'col-md-7 col-xl-5';	
	$textrow = 'justify-content-end';
}
?>
<div class="ImgtextBlock">
<div class="imageBackground" style="background-image:url(<?php echo $image['url'];?>)"></div>
	<div class="container">
		<div class="row <?php echo $textrow;?>">
			<div class="<?php echo $textcolbt;?>">
			<div class="textBlock <?php echo $style;?> hasimg">
				<?php the_sub_field('text');?>
				<?php if(get_sub_field('read_more_link')):
				$link = get_sub_field('read_more_link');?>
					<div class="textLink">
						<a href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>">
							<?php echo $link['title'];?>
						</a>
					</div>
				<?php endif;?>
			</div>
			</div>
		</div>
	</div>	
</div>
<?php endwhile;
endif;?>

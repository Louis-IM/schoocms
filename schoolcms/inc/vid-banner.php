<?php 
if(have_rows('video_banner')){
	while(have_rows('video_banner')){ the_row();
$banner = get_sub_field('placeholder');
$video_url = get_sub_field('video_banner_url');
if(get_sub_field('mobile_video_banner_url')){
	$video_url_mob = get_sub_field('mobile_video_banner_url');	
}
if($video_url):?>
<div class="videoframe">
	<?php if($video_url_mob):?>
	<video class="vidSwap" <?php if($banner){ echo 'poster="'.$banner['sizes']['home-banner'].'"';}?> <?php if(get_sub_field('unmuted')){echo 'playsinline controls autoplay';} else{echo 'muted playsinline autoplay loop';}?> -webkit-playsinline=true  data-desktop-vid="<?php echo $video_url;?>" data-mobile-vid="<?php echo $video_url_mob;?>" >
	</video>
	<?php else:?>
	<video <?php if($banner){ echo 'poster="'.$banner['sizes']['home-banner'].'"';}?> <?php if(get_sub_field('unmuted')){echo 'playsinline controls autoplay';} else{echo 'muted playsinline autoplay loop';}?> -webkit-playsinline=true >
		<source src="<?php echo $video_url;?>" type="video/mp4" />
	</video>
	<?php endif;?>
</div>
<?php endif;
}
}?>
<script type='text/javascript' src='<?php bloginfo('template_url');?>/js/vidbanner.js' id='vidswitch-js'></script>
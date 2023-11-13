<?php if(get_sub_field('callouts')):
	$callouts = get_sub_field('callouts');
	foreach( $callouts as $callout ):
	if($callout->post_type == 'call_outs'){
	$post = $callout;
	setup_postdata($post);
	scms_linked_callout();
	} else {
		$args = array(
			'link'=> $callout['link'],
			'text'=>$callout['text'],
			'subtitle'=>$callout['callout_subtitle'],
			'lightbox'=>$callout['open_in_lightbox'],
			'image_id'=>$callout['image']['id'],
			'further_text'=>$callout['callout_text'],
		);
		get_the_callout($args);
	}
	wp_reset_postdata();?>
	<?php endforeach; ?>
<?php endif;?>
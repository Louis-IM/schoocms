<?php $quote = new WP_query(
	array(
		'post_type'=>'alert',
		'orderby'=>'menu_order',
		'order'=>'DESC'
	)
);

if($quote->have_posts()):

	while($quote->have_posts()):
	
		$quote->the_post();
		$startDate = get_field('timeframe_start');
		$endDate = get_field('timeframe_end');
		$thisDate = date('Ymd');
		
		if($startDate <= $thisDate && $endDate >= $thisDate) { 
			$showAlert = 1;
		} else {
			$showAlert = 0;
		}
		
		if(get_field('test_alert_box') && is_user_logged_in() || $showAlert == 1):
		
			$noVar = get_field('display_every');

			?>
			<script type="text/javascript">
				// alert
				
				<?php if(get_field('test_alert_box') && is_user_logged_in()):?>
					jQuery(document).ready(function($){
							setTimeout(function(){$("a#trig").click();},1000);
					});
				<?php else:?>
					if(jQuery.cookie("schooAlert<?php echo $post->ID.$noVar;?>") != 'true') {
						setTimeout(function(){jQuery("a#trig").click();},1000);
						jQuery.cookie("schooAlert<?php echo $post->ID.$noVar;?>", "true", { path: '/', <?php if($noVar != 'session'){?>expires: <?php if($noVar) echo $noVar; else echo '1';}?> }); 
					}
				<?php endif;?>
			</script>
			<div style="display:none">
			<a id="trig" href="#notice" class="fancybox-inline" data-fancybox></a>
			<div id="notice" class="popupAlert clear">
				<div class="noticeBody clear <?php if ( has_post_thumbnail()) echo 'featimg';?>">
					<?php if ( has_post_thumbnail()): ?>
						<div class="popupImg"><?php the_post_thumbnail('medium'); ?></div>
					<?php endif; ?>
					<div class="noticeText clear">
						<div class="popTitle"><?php the_title() ?></div>
						<?php the_content(); ?>
						<?php
						if(get_field('add_contact_form')){
							echo '<div class="alertForm">';
							$alert_post_form = get_field('related_contact_form');
							$alert_post_form_shortcode = '[contact-form-7 id="' . $alert_post_form[0]->ID .  '" title="'  . $alert_post_form[0]->post_title .'"]';
							echo do_shortcode($alert_post_form_shortcode);
							echo '</div> ';
						}
						?>
					</div>
				</div>
				<div class="notice-footer">
					&nbsp;
				</div>
			</div> 
			</div>
			<?php
			break;
		
		endif;
	
	endwhile;

endif;
wp_reset_query(); ?>
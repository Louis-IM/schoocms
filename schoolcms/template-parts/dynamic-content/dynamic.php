<?php if(get_sub_field('text_block')):?>
<div class="row column-text">
	<div class="<?php echo (strpos($raw_content,'[column_divider]')) ? 'col-lg-6' : 'col-lg-12' ; ?>">
		<?php the_sub_field('text_block') ?>
	</div>
</div>
<?php elseif(get_sub_field('divider')):?>
<div class="<?php the_sub_field('divider') ?>"></div>	
<?php else:?>
	<?php if(is_user_logged_in()):?>
		<h1><strong>Something went wrong. Please check your settings and template</strong></h1>
	<?php endif;?>
<?php endif;?>

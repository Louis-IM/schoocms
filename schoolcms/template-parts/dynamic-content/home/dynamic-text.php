<?php if(get_sub_field('text_block')):?>
<?php $raw_content = get_sub_field('text_block', false, false) ; ?>
	<div class="row column-text">
		<div class="col-xl-10 offset-xl-1"><div class="row">
			<div class="<?php echo (strpos($raw_content,'[column_divider]')) ? 'col-lg-6' : 'col-lg-12' ; ?>">
				<?php the_sub_field('text_block') ?>
			</div>
		</div></div>
	</div>
<?php endif; ?>
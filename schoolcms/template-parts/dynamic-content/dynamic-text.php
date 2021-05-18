<?php if(get_sub_field('text_block')):?>
<?php $raw_content = get_sub_field('text_block', false, false) ; ?>
	<div class="row column-text body-text">
		<div class="col-md">
			<?php the_sub_field('text_block') ?>
		</div>
	</div>
<?php endif; ?>
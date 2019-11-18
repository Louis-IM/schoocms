<?php if(have_rows('faq_items')):?>
	<div class="faqs">
	<?php while ( have_rows('faq_items') ) : the_row(); ?>
		<div class="faq">
			<h3 class="faq-question">
				<?php the_sub_field('question') ?>	
			</h3>
			<div class="faq-answer">
				<?php the_sub_field('answer') ?>	
			</div>
		</div>
	<?php endwhile; ?>
	</div>
<?php endif;?>
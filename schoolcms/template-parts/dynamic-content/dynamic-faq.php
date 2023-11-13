<?php $section_title = get_sub_field('section_title');
if($section_title):?><h2 class="sectionTitle"><?php echo $section_title;?></h2><?php endif;?>
<?php if(have_rows('faq_items')):?>
	<div class="faqs accordionGroup">
	<?php while ( have_rows('faq_items') ) : the_row(); ?>
		<div class="faq accordionItem">
			<h3 class="faq-question accordionTab">
				<?php the_sub_field('question') ?>	
			</h3>
			<div class="faq-answer accordionContent body-text">
				<div class="row"><div class="col-md">
					<?php the_sub_field('answer') ?>	
				</div></div>
			</div>
		</div>
	<?php endwhile; ?>
	</div>
<?php endif;?>

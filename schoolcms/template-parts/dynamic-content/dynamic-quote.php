<?php if(get_sub_field('quotes')):?>
<?php $quotes = get_sub_field('quotes');
$quotesTitle = get_sub_field('text_line'); ?>
		<div class="quotes-holder">
			<div class="quoteContainer">
			<?php if($quotesTitle):?><h3 class="quotesTitle"><?php echo $quotesTitle;?></h3><?php endif;?>
			<div id="quotes" class="cycle-slideshow cycle-slideshow-init hiddenNow" data-cycle-log="false" data-cycle-fx="fade" data-cycle-auto-height="calc" data-cycle-timeout="7000" data-cycle-slides="> .singleQuote">
				<?php foreach( $quotes as $post ):
					setup_postdata($post);?>
					<div class="singleQuote">
						<blockquote class="quote-text">
							<?php the_content(); ?>
						</blockquote>
						<?php if(get_field('cite')):?>
						<div class="quote-cite">
							<?php the_field( 'cite')  ?>	
						</div>
						<?php endif;?>
					</div>
				<?php endforeach; 
					wp_reset_postdata();?>
					<?php if(1 < count($quotes)):?>
						<div class="cycle-pager"></div>
					<?php endif;?>
			</div>
			</div>
		</div>
<?php endif; ?>
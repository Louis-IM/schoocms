<?php 
$source = get_sub_field('source');
if($source == 'linked'){
	$quote_source = get_sub_field('quotes');
	$quotes = array();
	foreach($quote_source as $quote_item){
		$quote = $quote_item->post_content;
		$cite = get_field('cite',$quote_item->ID);
		$quotes[] = array('quote'=>$quote,'cite'=>$cite);
	}
	
} else {
	$quotes = get_sub_field('quotes_manual');	
}
if($quotes):
$section_title = get_sub_field('section_title'); ?>
		<div class="quotes-holder">
			<div class="quoteContainer">
			<?php if($section_title):?><h3 class="quotesTitle"><?php echo $section_title;?></h3><?php endif;?>
			<div id="quotes" class="cycle-slideshow cycle-slideshow-init hiddenNow" data-cycle-log="false" data-cycle-fx="fade" data-cycle-auto-height="calc" data-cycle-timeout="7000" data-cycle-slides="> .singleQuote">
				<?php foreach( $quotes as $quote ):?>
					<div class="singleQuote">
						<blockquote class="quote-text">
							<?php echo $quote['quote']; ?>
							<?php if( $quote['cite'] != ''):?>
							<cite class="quote-cite">
								<?php echo  $quote['cite']  ?>	
							</cite>
							<?php endif;?>
						</blockquote>						
					</div>
				<?php endforeach; ?>
					<?php if(1 < count($quotes)):?>
						<div class="cycle-pager"></div>
					<?php endif;?>
			</div>
			</div>
		</div>
<?php endif; ?>
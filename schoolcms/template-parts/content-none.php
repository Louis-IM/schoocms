<!-- page title -->
<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentynineteen' ); ?></h1>
<!-- main content -->
<div class="row">
	<div class="col-lg-12">
		<?php
	if ( is_search() ) :
		?>

		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ); ?></p>
		
		<div class="well"><?php
		get_search_form();?>
		</div>

	<?php else :
		?>

		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.' ); ?></p>
		
		<div class="well"><?php
		get_search_form();?>
		</div>
	<?php endif;
	?>
	</div>
</div>

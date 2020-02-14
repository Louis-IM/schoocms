<?php

get_header(); 

?>



	
<div class="container special-container">
	<?php get_template_part('page-banner-holder'); ?>
	
<div class="row">

		<div class="col-lg-12 bodyContent">
			<!-- breadcrumbs -->	
			<div class="breadcrumbs">
				<?php if(function_exists('bcn_display')) {	bcn_display();	} ?>
			</div>
			<div class="bodyContent">
				<!-- page title -->
				<h1 class="entry-title">404 Page Not Found</h1>	
			
			<!-- main content -->
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>

			<div class="well">
               <?php get_search_form(); ?>
            </div><!--/.well -->
			</div>
		</div>
		
	</div>

</div> <!-- /container -->


<?php // include('page-wide-pois.php') ?>




<?php get_footer(); ?>

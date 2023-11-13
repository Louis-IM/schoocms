<?php get_header(); 
get_template_part('template-parts/banner','page'); ?>		
<div class="container body-container">		
	<div class="row">
		<div class="col-lg-12 bodyContent">
			<main class="bodyContent">
				<!-- page title -->
				<h1 class="entry-title">404 Page Not Found</h1>	
			
			<!-- main content -->
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>

			<div class="well">
               <?php get_search_form(); ?>
            </div><!--/.well -->
			</main>
		</div>		
	</div>
</div> 
<?php get_footer(); ?>

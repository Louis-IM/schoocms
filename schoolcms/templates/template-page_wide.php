<?php /*Template Name: Wide Page*/
get_header(); ?>
<?php get_template_part('template-parts/banner'); ?>		
<main class="container body-container">	
	<div class="row">
		<div class="col-12">		
		<!-- breadcrumbs -->	
		<div class="breadcrumbs">
			<?php if(function_exists('bcn_display')) {	bcn_display();	} ?>	
		</div>
			<?php while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.?>

		</div>
	</div>
</main> <!-- /container -->
<?php get_footer(); ?>
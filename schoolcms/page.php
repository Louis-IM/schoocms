<?php get_header(); ?>
<?php get_template_part('template-parts/banner','page'); ?>		
<div class="container body-container">	
	<div class="row">
		<div class="<?php echo main_column_classes();?>">		
		<!-- breadcrumbs -->	
		<div class="breadcrumbs">
			<?php if(function_exists('bcn_display')) {	bcn_display();	} ?>	
		</div>
			<?php while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.?>

		</div>
		<div class="<?php echo left_column_classes();?>">		
			<?php get_template_part('template-parts/sidebar/sidebar');?>
		</div>
	</div>
</div> <!-- /container -->
<?php get_footer(); ?>
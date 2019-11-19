<?php get_header(); ?>

	
	<?php get_template_part('page-banner-holder'); ?>
	


<div class="container body-container">
<div class="row">

		<div class="<?php echo main_column_classes();?>">		
			<!-- breadcrumbs -->	
			<div class="breadcrumbs">
				<?php if(function_exists('bcn_display')) {	bcn_display();	} ?>
			</div>
				<!-- page title -->
				<h1 class="entry-title">News</h1>	
			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'excerpt' );?>
				
			<?	endwhile;
				the_posts_pagination();
			else :
			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
			
			

		</div>
		
		<div class="<?php echo left_column_classes();?>">
			<?php get_template_part('template-parts/sidebar/sidebar','archive');?>			
		</div>
		
	</div>

</div> <!-- /container -->


<?php get_footer();?>

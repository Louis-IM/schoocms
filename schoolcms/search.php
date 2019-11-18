<?php get_header();?>


<?php global $bannerGeneral;
$bannerGeneral = true;
get_template_part('page-banner-holder'); ?>

<div class="container body-container">
	<div class="row">
	

		<div class="bodyContent  <?php echo main_column_classes();?>">		

			<!-- breadcrumbs -->	
			<div class="breadcrumbs">
				<?php if(function_exists('bcn_display')) {	bcn_display();	} ?>
			</div>
			<?php
			if ( have_posts() && strlen( trim(get_search_query()) ) != 0 ) :?>
			<h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'twentythirteen' ), get_search_query() ); ?></h1>	
			
			<div class="well">
               <?php get_search_form(); ?>
            </div><!--/.well -->
				<?php
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

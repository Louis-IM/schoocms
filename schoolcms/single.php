<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template. 
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); 

?>

	<?php get_template_part('page-banner-holder'); ?>

<div class="container body-container">
<div class="row">

		<div class="<?php echo main_column_classes();?>">		
		<!-- breadcrumbs -->	
		<div class="breadcrumbs">
			<?php if(function_exists('bcn_display')) {	bcn_display();	} ?>
			
			
		</div>
			<?php while ( have_posts() ) :
				the_post();
				$post_type = get_post_type( $post_id );
				get_template_part( 'template-parts/content', $post_type );


			endwhile; // End of the loop.?>

		</div>
		
		<div class="<?php echo left_column_classes();?>">			
			<?php get_template_part('template-parts/sidebar/sidebar',$post_type);?>
		
		</div>
		
	</div>

</div> <!-- /container -->



<?php get_footer(); ?>
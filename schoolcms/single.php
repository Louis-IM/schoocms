<?php get_header(); 
$post_type = get_post_type( $post->ID );
get_template_part('template-parts/banner',$post_type); ?>
<div class="container body-container">
	<div class="row">
		<div class="<?php echo main_column_classes();?>">	
			<div class="breadcrumbs">
				<?php if(function_exists('bcn_display')) {	bcn_display();	} ?>
			</div>
			<?php while ( have_posts() ) :
				the_post();				
				get_template_part( 'template-parts/content', $post_type );
			endwhile; // End of the loop.?>
		</div>		
		<div class="<?php echo left_column_classes();?>">			
			<?php get_template_part('template-parts/sidebar/sidebar',$post_type);?>		
		</div>		
	</div>
</div>
<?php get_footer(); ?>

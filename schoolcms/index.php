<?php get_header(); 
$post_type = get_post_type( $post->ID );
get_template_part('template-parts/banner',$post_type); ?>
<div class="container body-container">
	<div class="row">
		<main class="<?php echo main_column_classes();?>">		
			<!-- breadcrumbs -->	
			<div class="breadcrumbs">
				<?php if(function_exists('bcn_display')) {	bcn_display();	} ?>
			</div>
				<!-- page title -->
			<h1 class="entry-title"><?php echo get_the_title(get_option('page_for_posts'));?></h1>	
			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post(); 
					get_template_part( 'template-parts/content', 'excerpt' );
				endwhile;
					the_posts_pagination();
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; ?>
		</main>		
		<div class="<?php echo left_column_classes();?>">
			<?php get_template_part('template-parts/sidebar/sidebar','archive');?>			
		</div>		
	</div>
</div>
<?php get_footer();?>

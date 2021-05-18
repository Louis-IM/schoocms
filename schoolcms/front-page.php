<?php get_header();


?>
<?php if(have_rows('home_banner')):?>
<div class="homeBanner">
	<div id="hero" class="cycle-slideshow cycle-slideshow-init hiddenNow" data-cycle-log="false" data-cycle-fx="fadeout" data-cycle-timeout="6000" data-cycle-slides=">.slide">
		<?php while ( have_rows('home_banner') ) : the_row(); ?>
		<?php $banner_slide = get_sub_field('banner_image'); ?>
			<div class="slide">
				<div class="slideImage">
					<picture>		
						<source srcset="<?php echo $banner_slide['sizes']['home-banner'];?>" media="(min-width:768px)">
						<source srcset="<?php echo $banner_slide['sizes']['portrait'];?>" media="(max-width:767.99px)">
						<?php echo wp_get_attachment_image_no_srcset($banner_slide['id'],'medium');?>
					</picture>				
				</div>
				<div class="slideText">
					<?php the_sub_field('top_text');?>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</div>
<?php endif;?>
<?php while ( have_posts() ) :
			the_post();?>
<div class="container">
	<div class="welcomeBlock">
		<div class="row">
			
				<div class="welcomeBlockText offset-xl-1 col-md-5">
					<h1 class="entry-title home-title"><?php the_title();?></h1>
					<?php the_content();?>
				</div>
		
			
			<?php if(has_post_thumbnail()):?>
				<div class="col-md-7 col-lg-6 col-xl-5">
					<div class="welcomeImage" style="background-image:url(<?php echo get_the_post_thumbnail_url($post->ID,'large');?>);">
						<?php the_post_thumbnail();?>
					</div>
				</div>
			<?php endif;?>
		</div>
	</div>
</div>

<div class="homeContent container">
	<?php the_dynamic_content('home_content','home',false,'hideme');?>
</div>
	<?php endwhile;?>

<?php get_footer(); ?>

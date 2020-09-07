<?php get_header();


?>
<?php if(have_rows('home_banner')):?>
<div class="homeBanner">
	<div id="hero" class="cycle-slideshow cycle-slideshow-init hiddenNow" data-cycle-log="false" data-cycle-fx="fadeout" data-cycle-timeout="6000" data-cycle-slides=">.slide">
		<?php while ( have_rows('home_banner') ) : the_row(); ?>
		<?php $banner_slide = get_sub_field('banner_image'); ?>
			<div class="slide">
				<div class="slideImage" style="background-image:url(<?php echo $banner_slide['sizes']['home-banner']; ?>)">
					<?php echo wp_get_attachment_image($banner_slide['id'],'home-banner');?>					
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
<div class="container hideme">
	<div class="row">
		<div class="col-sm-12 col-md-5 newsSlider">
			<h2>Blog</h2>
			<?php 
			$args = array(
				'post_type'=>'post',
				'posts_per_page'=>4,
			);
			$blog_slider = get_posts($args);
			if($blog_slider):?>
			<div class="newsSlider cycle-slideshow" data-cycle-slides=">.newsSlide" data-cycle-auto-height="calc">
				<div class="cycle-pager"></div>
				<?php foreach($blog_slider as $post):
				setup_postdata($post);?>
				<div class="newsSlide">
					<div class="date">Posted: <?php the_time('j F Y');?></div>
					<a href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
					<?php html5wp_excerpt(html5wp_custom_post);?>
				</div>
				<?php endforeach;
				wp_reset_postdata();?>
			</div>
			<div class="newsSliderLinks">
				<a href="<?php the_permalink(get_option('page_for_posts'));?>" class="readmore blue">Blog</a>
			</div>
			<?php endif;?>
		</div>
		<div class="col-sm-12 col-md-7 col-xl-6 offset-xl-1">
			<div class="socialBlock">
				<?php echo do_shortcode('[custom-twitter-feeds num=1]');?>
			</div>
		</div>
	</div>
</div>

<?php  if(have_rows('home_callout_carousel') ):?>
<div class="container">
	<div class="calloutCarousel owl-carousel">
	<?php while ( have_rows('home_callout_carousel') ) : the_row(); ?>	
			<div class="calloutSlide">
				<?php get_template_part('template-parts/dynamic-content/dynamic', 'callout');?>
			</div>
		<?php endwhile;?>
	</div>
</div>
<?php endif;?>
<?php if(have_rows('image_block')):
while(have_rows('image_block')): the_row();
$img = get_sub_field('image');?>
<div class="container homeAlumniGroup hideme">
	<div class="row">
		<div class="col-xl-offset-1 col-sm-7 col-md-8 col-xl-6">
			<div class="imgBlockTxt">
				<?php the_sub_field('text');?>
			</div>
		</div>
		<div class="col-sm-5 col-md-4">
			<div class="imgBlockImg">
				<?php echo wp_get_attachment_image($img['id'],'large-thumbnail');?>
			</div>
		</div>
	</div>
</div>
<?php endwhile;
endif;?>

<?php if(have_rows('news_group')):
while(have_rows('news_group')): the_row();
?>
<div class="container homeNewsGroup hideme">
	<div class="row">
		<div class="col-xl-offset-1 col-sm-7 col-md-8 col-xl-6">
			<?php get_template_part('template-parts/dynamic-content/dynamic', 'quote');?>
			</div>
		<div class="col-sm-5 col-md-4 newsSlider col-xl-3 col-xl-offset-1">
			<h2><?php the_sub_field('news_slider_title');?></h3>
		<?php $category = get_sub_field('category');
			$args = array(
				'post_type'=>'post',
				'cat'=>$category,
				'posts_per_page'=>4,
			);
			$blog_slider = get_posts($args);
			if($blog_slider):?>
			<div class="newsSlider cycle-slideshow" data-cycle-slides=">.newsSlide" data-cycle-auto-height="calc">
				<div class="cycle-pager"></div>
				<?php foreach($blog_slider as $post):
				setup_postdata($post);?>
				<div class="newsSlide">
					<div class="date">Posted: <?php the_time('j F Y');?></div>
					<a href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
					<?php html5wp_excerpt(html5wp_custom_post);?>
				</div>
				<?php endforeach;
				wp_reset_postdata();?>
			</div>			
			<?php endif;?>
		</div>
	</div>
</div>
<?php endwhile;
endif?>
<?php get_footer(); ?>

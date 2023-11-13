<article class="bodyContent">
	<header>
		<h1><?php the_title(); ?></h1>
		<?php if(has_post_thumbnail()):?>
		<div class="postThumb">
			<?php the_post_thumbnail('landscape'); ?>
		</div>
		<?php endif;?>
	</header>
	<!-- main content -->
	<div class="body-text">
		<div class="row">
			<div class="col-md">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<?php 
	if ( ! post_password_required() ) {
	the_dynamic_content('column_content');
	}?>
</article>
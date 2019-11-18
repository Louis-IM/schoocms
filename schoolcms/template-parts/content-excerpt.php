<div class="list-item">	
	<div class="row">
		<div class="list-item-image col-3 col-lg-2">
			<a href="<?php echo the_permalink() ?>">
			<?php if(has_post_thumbnail()) { the_post_thumbnail('thumbnail') ;} else { echo('<img src="'.get_template_directory_uri().'/images/icon.png"/>') ;}?>
			</a>
		</div>
		<div class="list-item-text col-9 col-lg-10">
			<h2 class="list-item-title">
				<a href="<?php echo the_permalink() ?>"><?php the_title() ?></a>
			</h2>
			<div class="list-item-excerpt">
			<p class="date"><a href="<?php echo the_permalink() ?>"><span><?php the_time('jS F Y');?></span></a></p>
				<?php the_excerpt() ?>
			</div>
		</div>
	</div>
</div>
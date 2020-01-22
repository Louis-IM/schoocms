<div class="bodyContent">
	<!-- page title -->
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<div class="row">
	<?php if(has_post_thumbnail()):?>
	<div class="col-3 col-sm-4">
		<div class="postThumb ">
			<?php the_post_thumbnail('portrait'); ?>
		</div>
	</div>
	<?php endif;?>
	<!-- main content -->
	<?php $raw_content = get_the_content(); 
	?>
		<div class="col">
			<?php if(get_field('position') || get_field('qualifications') || get_field('email') ): ?>
				<div class="featured-staff-metas staff-meta">
					<?php if(get_field('position')): ?>
						<div class="staff-meta">
							<div class="meta-label">Position:</div>
							<div class="meta-value"><?php the_field('position') ; ?></div>
						</div>
					<?php endif; ?>
					<?php if(get_field('qualifications')): ?>
						<div class="staff-meta">
							<div class="meta-label">Qualifications:</div>
							<div class="meta-value"><?php the_field('qualifications') ; ?></div>
						</div>
					<?php endif; ?>
					<?php if(get_field('email')): ?>
						<div class="staff-meta">
							<div class="meta-label">Email:</div>
							<div class="meta-value"><a href="mailto:<?php the_field('email') ; ?>" class="email-value"><?php the_field('email') ; ?></a></div>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="row body-text">
				<div class="<?php echo (strpos($raw_content,'[column_divider]')) ? 'col-lg-6' : 'col-lg-12' ; ?>">
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

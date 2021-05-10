<?php $section_title = get_sub_field('section_title');
if($section_title):?><h2 class="sectionTitle"><?php echo $section_title;?></h2><?php endif;?>
<?php if(have_rows('members_of_staff')):?>	
	<div class="staff">
	<?php  while ( have_rows('members_of_staff') ) : the_row();
		$display_type = get_sub_field( 'member_of_staff_display_type' ); 
		$staff_member = get_sub_field('member_of_staff'); 
		$post = $staff_member;
		setup_postdata($post);?>
		<?php if ($display_type == 'featured' ) : ?>
				<div class="featured-staff-member staffMember">
					<div class="row">
					<?php if ( has_post_thumbnail($post->ID) ) : ?>
						<div class="featured-staff-image  col-sm-auto col-3">						
							<?php the_post_thumbnail( 'medium' );?>
						</div>
					<?php endif; ?>
						<div class="featured-staff-text col <?php if ( !has_post_thumbnail($post->ID) ){echo 'noimg';};?>">
							<h3 class="featured-staff-name">
								<?php if($post->post_content != ''):?>
									<a href="<?php the_permalink();?>"><?php the_title(); ?></a>								
								<?php else:?>
									<?php the_title(); ?>
								<?php endif;?>
							</h3>
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
							<?php if($post->post_content != ''):?>
							<div class="staff-biog">
								<?php the_content() ; ?>	
							</div>
							<?php endif;?>
						</div>
					</div>	
				</div>
		<?php else: ?>
			<div class="standard-staff-member staffMember">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="standard-staff-name">
							<?php the_title(); ?>
						</h3>
					</div>
				</div>
				<div class="row">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="standard-staff-image col-sm-auto col-3">
							<?php the_post_thumbnail('thumbnail' );?>
						</div>
					<?php endif; ?>					
					<div class="standard-staff-text col <?php if ( !has_post_thumbnail() ){echo 'noimg';};?>">											
							<?php if(get_field('position') || get_field('qualifications') || get_field('email') ): ?>
							<div class="standard-staff-metas staff-meta row">
								<?php if(get_field('position')): ?>
									<div class="staff-meta col">
										<div class="meta-label">Position:</div>
										<div class="meta-value"><?php the_field('position') ; ?></div>
									</div>
								<?php endif; ?>
								<?php if(get_field('qualifications')): ?>
									<div class="staff-meta col">
										<div class="meta-label">Qualifications:</div>
										<div class="meta-value"><?php the_field('qualifications') ; ?></div>
									</div>
								<?php endif; ?>
								<?php if(get_field('email')): ?>
									<div class="staff-meta col">
										<div class="meta-label">Email:</div>
										<div class="meta-value"><a href="mailto:<?php the_field('email') ; ?>" class="email-value"><?php the_field('email') ; ?></a></div>
									</div>
								<?php endif; ?>
							</div>
							<?php if($post->post_content != ''):?>
								<div class="staff-biog">
									<?php html5wp_excerpt('html5wp_custom_post') ?>	
									<a href="<?php the_permalink();?>" class="readmore">Read More</a>
								</div>
							<?php endif;?>
						<?php endif; ?>
					</div>					
				</div>
				
			</div>
		<?php endif;
		
wp_reset_postdata();		?>
		<?php endwhile;?>	
	</div>
<?php endif; ?>
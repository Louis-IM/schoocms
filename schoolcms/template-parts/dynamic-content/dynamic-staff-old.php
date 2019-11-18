<?php if(have_rows('members_of_staff')):?>	
	<div class="staff">
	<?php  while ( have_rows('members_of_staff') ) : the_row(); ?>	
		<?php $staff_member = get_sub_field('member_of_staff');   ?>
		<?php if ( get_sub_field( 'member_of_staff_display_type' ) == 'featured' ) : ?>
			<div class="featured-staff-member staffMember">
				<?php if ( has_post_thumbnail($staff_member->ID) ) : ?>
					<div class="featured-staff-image">						
						<?php echo get_the_post_thumbnail( $staff_member, 'medium' );?>
					</div>
				<?php endif; ?>
				<div class="featured-staff-text <?php if ( !has_post_thumbnail($staff_member->ID) ){echo 'noimg';};?>">
					<h3 class="featured-staff-name">
						<?php echo ( $staff_member->post_title ) ; ?>
					</h3>
					<?php if(get_field('position', $staff_member->ID) || get_field('qualifications', $staff_member->ID) || get_field('email', $staff_member->ID) ): ?>
						<div class="featured-staff-metas">
							<?php if(get_field('position', $staff_member->ID)): ?>
								<div class="featured-staff-meta">
									<div class="featured-meta-label">Position:</div>
									<div class="featured-meta-value"><?php the_field('position', $staff_member->ID) ; ?></div>
								</div>
							<?php endif; ?>
							<?php if(get_field('qualifications', $staff_member->ID)): ?>
								<div class="featured-staff-meta">
									<div class="featured-meta-label">Qualifications:</div>
									<div class="featured-meta-value"><?php the_field('qualifications', $staff_member->ID) ; ?></div>
								</div>
							<?php endif; ?>
							<?php if(get_field('email', $staff_member->ID)): ?>
								<div class="featured-staff-meta">
									<div class="featured-meta-label">Email:</div>
									<div class="featured-meta-value"><a href="mailto:<?php the_field('email', $staff_member->ID) ; ?>"><?php the_field('email', $staff_member->ID) ; ?></a></div>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<div class="featured-staff-biog">
						<?php echo apply_filters('the_content', $staff_member->post_content ) ; ?>	
					</div>
				</div>
			</div>	
		<?php else: ?>
			<div class="standard-staff-member staffMember">
				<?php if ( has_post_thumbnail($staff_member->ID) ) : ?>
					<div class="standard-staff-image">
						<?php echo get_the_post_thumbnail( $staff_member, 'thumbnail' );?>
					</div>
				<?php endif; ?>
				
				<div class="standard-staff-text <?php if ( !has_post_thumbnail($staff_member->ID) ){echo 'noimg';};?>">
					<div class="row noclear">
						<div class="col-sm-12">
							<h3 class="standard-staff-name">
								<?php echo ( $staff_member->post_title ) ; ?>
							</h3>
						</div>
					</div>
					<div class="row">
					<?php if($is_sidebar){
						$standard_staff_cols = "col-sm-12";									
					} else {
						$standard_staff_cols = "col-sm-4";
					}?>
						<div class="<?php echo $standard_staff_cols;?>">
						<?php if(get_field('position', $staff_member->ID)): ?>
							<div class="standard-staff-meta">
								<div class="standard-meta-label">Position:</div>
								<div class="standard-meta-value"><?php the_field('position', $staff_member->ID) ; ?></div>
							</div>
						<?php endif; ?>
						</div>
						<div class="<?php echo $standard_staff_cols;?>">
						<?php if(get_field('qualifications', $staff_member->ID)): ?>
							<div class="standard-staff-meta">
								<div class="standard-meta-label">Qualifications:</div>
								<div class="standard-meta-value"><?php the_field('qualifications', $staff_member->ID) ; ?></div>
							</div>
						<?php endif; ?>
						</div>
						<div class="<?php echo $standard_staff_cols;?>">
						<?php if(get_field('email', $staff_member->ID)): ?>
							<div class="standard-staff-meta">
								<div class="standard-meta-label">Email:</div>
								<div class="standard-meta-value"><a class="email-value" href="mailto:<?php the_field('email', $staff_member->ID) ; ?>"><?php the_field('email', $staff_member->ID) ; ?></a></div>
							</div>
						<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
	</div>
<?php endif; ?>
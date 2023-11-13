<?php $section_title = get_sub_field('section_title');
if($section_title):?><h2 class="sectionTitle"><?php echo $section_title;?></h2><?php endif;?>
<?php if(have_rows('members_of_staff')):?>	
	<div class="staff">
	<?php  while ( have_rows('members_of_staff') ) : the_row();
		$display_type = get_sub_field( 'member_of_staff_display_type' ); 
		$staff_member = get_sub_field('member_of_staff'); 
		$post = $staff_member;
		setup_postdata($post);?>
		<?php if ($display_type == 'featured' ) : 
			featured_staff('h3');
		else: 
			standard_staff('h3');
		endif;		
		wp_reset_postdata();?>
		<?php endwhile;?>	
	</div>
<?php endif; ?>
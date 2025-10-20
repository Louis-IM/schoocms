<?php 
$section_title = get_sub_field('section_title');
?>
<div class="body-text">
	<div class="row">
		<div class="col-md">
            <?php if($section_title):?><h2 class="sectionTitle"><?php echo $section_title;?></h2><?php endif;?>
			<?php get_curriculum_blocks();?>
		</div>
	</div>
</div>
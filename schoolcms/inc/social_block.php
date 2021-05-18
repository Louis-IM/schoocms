<ul class="socials">
	<?php if(get_field('twitter','options')):?><li><a href="<?php the_field('twitter','options');?>" target="_blank"><i class="fab fa-twitter"></i></a></li><?php endif;?>
	<?php if(get_field('facebook','options')):?><li><a href="<?php the_field('facebook','options');?>" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li><?php endif;?>
	<?php if(get_field('instagram','options')):?><li><a href="<?php the_field('instagram','options');?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li><?php endif;?>
	<?php if(get_field('youtube','options')):?><li><a href="<?php the_field('youtube','options');?>" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a></li><?php endif;?>
	<?php if(get_field('google','options')):?><li><a href="<?php the_field('google','options');?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li><?php endif;?>
	<?php if(get_field('vimeo','options')):?><li><a href="<?php the_field('vimeo','options');?>" target="_blank"><i class="fab fa-vimeo-v" aria-hidden="true"></i></a></li><?php endif;?>
	<?php if(get_field('linkedin','options')):?><li><a href="<?php the_field('linkedin','options');?>" target="_blank"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li><?php endif;?>
</ul>
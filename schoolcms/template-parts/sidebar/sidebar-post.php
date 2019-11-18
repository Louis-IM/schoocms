<div class="sidebar">		
	<nav id="blognav" class="sub-navigation" role="navigation">
		<?php dynamic_sidebar( 'news-sidebar' ); ?>
	</nav>
	<?php global $dynamic_content;	
	$dynamic_content = 'left_column_content';?>
	<?php get_template_part('dynamic-content'); ?>
</div>
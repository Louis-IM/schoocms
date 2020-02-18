<div class="sidebar">
		<?php wp_nav_menu( array(
	'theme_location'=>'main',
	'menu_id' => 'menu-side',
	'show_parent'=>true,
	'sub_menu'=>true,
	'container_class'=>'side-menu-container',	
	'items_wrap' => '<nav id="subnav" class="sub-navigation" role="navigation"><ul id="%1$s" class="%2$s">%3$s</ul></nav>',
	'link_before'=>'<span>',
	'link_after'=>'</span>',
	'after'=>'<span class="arrow"></span>'
	) ); ?>			
<nav id="blognav" class="sub-navigation" role="navigation">
	<?php dynamic_sidebar( 'news-sidebar' ); ?>
</nav>

	<?php the_dynamic_content('left_column_content','sidebar');?>
</div>
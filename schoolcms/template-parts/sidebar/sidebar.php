<div class="sidebar">
	<?php wp_nav_menu( array(
	'theme_location'=>'main',
	'menu_id' => 'menu-side',
	'show_parent'=>true,
	'sub_menu'=>true,
	'container_class'=>'side-menu-container',
	'items_wrap' => '<nav id="subnav" class="sub-navigation" role="navigation"><ul id="%1$s" class="%2$s">%3$s</ul></nav>',
	'walker'=>new nav_arrow_walker()
	) ); ?>			
	
	<?php the_dynamic_content('left_column_content','sidebar');?>
</div>
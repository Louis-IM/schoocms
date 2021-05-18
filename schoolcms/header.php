<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link href="<?php bloginfo('template_url'); ?>/images/favicon.png" rel="shortcut icon">
	<link rel="profile" href="http://gmpg.org/xfn/11">
<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

	<?php wp_head(); ?>
</head>

<body id="body" <?php body_class(); ?>>
<script>var d = document.getElementById("body"); d.className += " heroPause";</script>
<div class="wrapper">
	<header class="mainHeader">
	<div class="headGroup">
		<div class="container">
			<div class="row  align-items-center">			
				
				<div class="col-md-4 col-sm-4 headLogoWrap col-7 order-sm-2 ">
					<div class="headerIcon">
						<a href="<?php bloginfo('url');?>">
							<img src="<?php bloginfo('template_url');?>/images/logo.png" alt="<?php bloginfo('name');?>" class="mainLogo" width="320" height="90"/>
						</a>
					</div>
				</div>
				
				<div class="col-md-4 headerRight col-sm-4 order-sm-3  col-5">		
					<div class="socialDesktop"><?php get_template_part('inc/social_block');?></div>
					<div class="menu-toggle">
						<div class="toggleIcon">
							<span></span>
							<span></span>
							<span></span>
						</div>
						<div class="toggleText">MENU</div>
					</div>
							
				</div>
				<div class="col-md-4 headerLeft col-sm-4 order-sm-1 col-12 d-none d-sm-block">
						<div class="headerSearch">
							<?php get_search_form() ?>
						</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
		<div class="menuContainer">			
			<nav id="navbar" class="main-navigation" role="navigation">
				<div class="menu-toggle">
					<div class="toggleIcon">
					<span></span>
					<span></span>
					<span></span>
					</div>
					<div class="toggleText">MENU</div>
				</div>
						<?php 
					wp_nav_menu( array('theme_location'=>'main', 'after'=>'<span class="arrow"></span>','menu_id'=>'menu-main','container_class'=>'menu-main-container') ); 
					
					?>
					<?php get_template_part('inc/social_block');?>
			</nav>	
		</div>
	</header>








	
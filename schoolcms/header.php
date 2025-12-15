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
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body id="body" <?php body_class(); ?>>
<div class="wrapper">
	<header class="mainHeader">
	<div class="headGroup">
		<div class="container">
			<div class="row  align-items-center">							
				<div class="col-7 col-sm-4 order-sm-2 text-sm-center">
					<div class="headerIcon">
						<a href="<?php bloginfo('url');?>">
							<img src="<?php bloginfo('template_url');?>/images/logo.png" alt="<?php bloginfo('name');?>" class="mainLogo" width="320" height="90"/>
						</a>
					</div>
				</div>				
				<div class="col-5 col-sm-4 order-sm-3 text-sm-end">		
					<div class="socialDesktop"><?php get_template_part('inc/social_block');?></div>
					<div class="menu-toggle">
						<div class="toggleIcon">
							<span></span>
						</div>
						<div class="toggleText">MENU</div>
					</div>							
				</div>
				<div class="d-none d-sm-block col-sm-4 order-sm-1 text-sm-start">
					<div class="headerSearch">
						<?php get_search_form() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
		
		<nav id="navbar" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array('theme_location'=>'main','menu_id'=>'menu-main','container_class'=>'menu-main-container','walker'=>new nav_arrow_walker()) ); ?>
			<div class="navbarExtra"><?php get_template_part('inc/social_block');?></div>
		</nav>	
	</header>








	
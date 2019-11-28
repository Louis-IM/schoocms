<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>


<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php the_field('get_in_touch','options');?>
			</div>
			<div class="col-md-6">
				<?php wp_nav_menu( array('theme_location'=>'footer', 'menu_id'=>'menu-useful','items_wrap'=>'<h3>Useful Links</h3><ul id="%1$s" class="%2$s">%3$s</ul>','depth'=>1) ); ?>
			</div>
		</div>
	</div>
	<div class="footerLower">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<p>&copy; <?php bloginfo('name');?> <?php echo date('Y');?></p>
					<?php the_field('registered_information','options');?>
				</div>
				<div class="col-sm-4 sm-text-center">
					<p><a href="<?php bloginfo('url');?>/sitemap.xml">Sitemap</a> | <a href="<?php bloginfo('url');?>/privacy-policy">Privacy Policy</a> | <a href="<?php bloginfo('url');?>/cookie-policy">Cookies</a> </p>
				</div>
				<div class="col-sm-4 sm-text-right">
					<p><a href="https://www.innermedia.co.uk/" rel="nofollow">Designed by Innermedia <img src="<?php bloginfo('template_url');?>/images/im-logo.png" alt="innermedia" /></a></p>
				</div>
			</div>
		</div>
	</div>
</footer>

				
<?php wp_footer(); 

	get_template_part('alerts');?>
</body>
</html>

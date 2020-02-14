<div class="bodyContent">
<!-- page title -->
<h1 class="entry-title"><?php the_title(); ?></h1>

<?php if(has_post_thumbnail()):?>
<div class="postThumb">
	<?php the_post_thumbnail('landscape'); ?>
</div>
<?php endif;?>
<!-- main content -->
<?php $raw_content = get_the_content(); 
?>
	<div class="row body-text">
		<div class="<?php echo (strpos($raw_content,'[column_divider]')) ? 'col-lg-6' : 'col-lg-12' ; ?>">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div>
	</div>


<?php 
global $dynamic_content;
if ( ! post_password_required() ) {
the_dynamic_content('column_content');
}?>
</div>
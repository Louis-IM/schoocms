<article class="bodyContent">
	<header>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<time class="date" datetime="<?php the_time('Y-M-D');?>"><span>Posted: <?php the_time('jS F Y');?></span></time>
		<?php if(has_post_thumbnail()):?>
		<div class="postThumb">
			<?php the_post_thumbnail('landscape'); ?>
		</div>
		<?php endif;?>
	</header>
	<div class="row body-text">
		<div class="col-md">
			<?php the_content(); ?>				
		</div>
	</div>
	<footer>
		<div class="row">
			<div class="col">
			<?php wp_link_pages(); ?>
				
				<?php
				$categories = get_the_category();
				$separator = ' ';
				$output = '';
				if ( ! empty( $categories ) ) {
					foreach( $categories as $category ) {
						$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
					}
					echo 'Categories: ';
					echo trim( $output, $separator );
				}?>
			</div>
		</div>
	</footer>
	<?php 
	if ( ! post_password_required() ) {
	the_dynamic_content('column_content');
	}?>
</article>
<?php global $is_sidebar;
if( get_sub_field('documents')):		?>
	<?php $docs = get_sub_field('documents'); 
		$total_docs = count($docs);
		if($is_sidebar){
			$docs_col_class = 'col-12';
		} else {
			$docs_col_class = 'col-sm-6';
		}
		$section_title = get_sub_field('section_title');
	?>		
	<div class="documents">
		<?php if($section_title):?><h2 class="sectionTitle"><?php echo $section_title;?></h2><?php endif;?>
		<div class="row  align-items-center">
		<?php foreach( $docs as $doc ):  ?>
			<div class="document <?php echo $docs_col_class ?>">
				<a class="button document-link" href="<?php $docfile = get_field ('document',$doc->ID)  ; echo $docfile['url'] ?>" target="_blank">
					<?php echo get_the_title( $doc->ID ) ; ?>
				</a>
			</div>			
		<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
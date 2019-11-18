<?php global $is_sidebar;
if( get_sub_field('documents')):		?>
	<?php $docs = get_sub_field('documents'); 
		$total_docs = count($docs);
		if($is_sidebar){
			$docs_col_class = 'col-12';
		} else {
			$docs_col_class = 'col-sm-6';
		}
	?>		
	<div class="documents">
	<div class="row  align-items-center">
	<?php $i=1; foreach( $docs as $doc ):  ?>
		<div class="document <?php echo $docs_col_class ?>">
				<a class="document-link" href="<?php $docfile = get_field ('document',$doc->ID)  ; echo $docfile['url'] ?>" target="_blank">
					<?php echo get_the_title( $doc->ID ) ; ?>
				</a>
		</div>
		<?php if($i % 3 == 0 && $total_docs > 3) echo '</div><div class="row">';?>
	<?php $i++; endforeach; ?>
	</div>
	</div>
<?php endif; ?>
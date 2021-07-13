jQuery( document ).ready(function($) {
	//Subject Tiles
	$('.subject-tile').click(function () {
		var subject = $(this).data('subject');
		var block = $('#subject-' + subject);
		
		if (block.is(':visible')) {
			$('.subject-block').slideUp();			
		} else {
			$('.subject-block').slideUp();
			block.slideDown();
		}
		$('.subject-tile').not(this).removeClass('subjectOpen');
		$(this).toggleClass('subjectOpen');
	});
		
	$('.subject-close').click(function () {
		$('.subject-block').slideUp();
		$('.subject-tile.subjectOpen').removeClass('subjectOpen');;
	});		
	
});
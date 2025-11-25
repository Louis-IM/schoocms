jQuery( document ).ready(function($) {
	//scroll to if needed
	$.fn.scrollToCurriculum = function ($target) {
		var $container = this.first();      // Only scrolls the first matched container

		var pos = $target.position(), height = $target.outerHeight();
		var containerScrollTop = $container.scrollTop(), containerHeight = $container.height();
		var top = pos.top + containerScrollTop;     // position.top is relative to the scrollTop of the containing element

		var paddingPx = containerHeight * 0.15;      // padding keeps the target from being butted up against the top / bottom of the container after scroll

		if (top < containerScrollTop) {     // scroll up                
			$container.scrollTop(top - paddingPx);
		}
		else if (top + height > containerScrollTop + containerHeight) {     // scroll down
			$container.scrollTop(top + height - containerHeight + paddingPx);
		}
	};
	
	var $root = $('html, body');
	$('.subject-tile').click(function () {
		var group = $(this).parents('.subject-tiles');
		var subject = $(this).data('subject');
		var block = $('.subject-block[data-subject=subject-'+subject+']',group);
		
		if (block.is(':visible')) {
			$('.subject-block',group).slideUp();				
		} else {
			$('.subject-block',group).slideUp();	
			block.slideDown(400,function(){
				var triggerpoint_top = $root.scrollTop();
				var triggerpoint_bottom = $root.scrollTop() + $(window).height()*0.5;
				var blocktop = block.offset().top;
				if(triggerpoint_bottom < blocktop || triggerpoint_top > blocktop){
				$root.animate({
	
					scrollTop: block.offset().top - $(window).height()*0.5
	
				}, 500);
				}
				block.addClass('subjectOpen');
			});
		}
		$('.subject-tile',group).not(this).removeClass('subjectOpen');
		$(this).toggleClass('subjectOpen');
	});
		
	$('.subject-close').click(function () {
		var group = $(this).parents('.subject-tiles');
		$('.subject-block',group).slideUp();
		$('.subject-tile.subjectOpen',group).removeClass('subjectOpen');;
	});	
	
});
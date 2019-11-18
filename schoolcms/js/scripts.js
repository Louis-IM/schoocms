jQuery( document ).ready(function($) {
	// menu-toggles
	$('.menu-toggle, .close-link, #toggler').on('click',function(){
		  $('body').toggleClass('menuopen');

	});
	
	$(window).resize(function(){
		  $('body').removeClass('menuopen');
	});
		
	$('#menu-main li.menu-item-has-children .arrow').on('click',function(e){
		$(this).parent('li').toggleClass('open');
		e.stopPropagation();
	});
	$('#menu-side li.menu-item-has-children .arrow').on('click',function(e){
		$(this).parent('li').toggleClass('open');
		e.stopPropagation();
	});

	$('#menu-main li.current-menu-ancestor').addClass('open');
	$('#menu-main li.menu-item-has-children.current-menu-ancestor').addClass('open');
	$('#menu-side li.current-menu-ancestor').addClass('open');
	$('#menu-side li.menu-item-has-children.current-menu-ancestor').addClass('open');
	$('#menu-side li.menu-item-has-children.current-menu-item').addClass('open');
	
	
	// end-menu-toggles
	
	$('.faq-question').on('click',function(){
		var faq = $(this).parents('.faq');
		var faqgroup = $(this).parents('.faqs');
		$('.faq',faqgroup).not(faq).removeClass('open');
		$('.faq',faqgroup).not(faq).children('.faq-answer').slideUp();
		$(faq).toggleClass('open');
		$(faq).children('.faq-answer').slideToggle();
	});
	
	
	
	$('#searchform .searchSubmit').click(function(e){
     var parentContainer = $(this).parents('#searchform');
	 //prevent default if there is no value
	  if($('#s',parentContainer).val() == ''){
		  e.preventDefault();		  
	  }
   });
   //smooth anchor scrolling
  var $root = $('html, body');
  $('a.bodyAnchor').click(function() {
    $root.animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top - 40
    }, 500);
    return false;
  });
  $('body.home').addClass('fixedHome');
  var fixHeader =  function(){
var windowHeight = $(window).height();
if($(window).scrollTop() < 150) {
$('body').removeClass('fixedHeader');
$('body.home').addClass('fixedHome');
}
else {
$('body').addClass('fixedHeader');
if($(window).width() > 752){
	$('body.home').removeClass('fixedHome');
}
} 
  }
$(document).ready(fixHeader);
$(window).scroll(fixHeader);  

$('a[data-fancybox]').fancybox();


$(window).scroll( function(){

	/* Check the location of each desired element */
	$('.hideme').each( function(i){
		var bottom_of_object = $(this).offset().top + $(this).outerHeight();
		var bottom_of_window = $(window).scrollTop() + $(window).height();
		var top_of_object = $(this).offset().top;
		var mid_of_window = $(window).scrollTop() + $(window).height() / 2 ;
		
		/* If the object is completely visible in the window, fade it it */
		if( mid_of_window > top_of_object ){
			
			$(this).addClass('active');    
		}
		
	}); 

});



});

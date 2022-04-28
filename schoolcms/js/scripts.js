(function($) {
	// menu-toggles
	$('.menu-toggle, .close-link, #toggler').on('click',function(){
		  $('body').toggleClass('menuopen');
	});		
	$('#menu-main li.menu-item-has-children .arrow').on('click',function(e){
		$(this).parent('li').toggleClass('open');
		e.stopPropagation();
	});
	$('#menu-side li.menu-item-has-children .arrow').on('click',function(e){
		$(this).parent('li').toggleClass('open');
		e.stopPropagation();
	});
	$('#menu-main li.menu-item-has-children.current-menu-ancestor').addClass('open');
	$('#menu-main li.menu-item-has-children.current-menu-item').addClass('open');
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
  $(document).on('click', 'a[href^="#"]', function (event) {
	event.preventDefault();

	$('html, body').animate({
		scrollTop: $($.attr(this, 'href')).offset().top - 140
	}, 500);
	});
  $('body.home').addClass('fixedHome');
  function fixHeader(){
	var windowHeight = $(window).height();
	if($(window).scrollTop() < 150) {
	$('body').removeClass('fixedHeader');
	$('body.home').addClass('fixedHome');
	}
	else {
	$('body').addClass('fixedHeader');
	$('body.home').removeClass('fixedHome');
	} 
  }
$(document).ready(fixHeader);
$(window).scroll(fixHeader);  

$('a[data-fancybox]').fancybox();

//Trigger to add in class firsthand
 $('.hideme').each( function(i){
	$(this).addClass('sectionfadein');
 });
/* Every time the window is scrolled ... */
$(window).scroll( function(){

	/* Check the location of each desired element */
	$('.sectionfadein').each( function(i){
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

$('.wpforms-field-address-country').val('GB');

$('.body-text iframe').each(function(){
	var wrapitem = $(this);
	if(!wrapitem.parent().hasClass('embed-container')){
		wrapitem.wrap('<div class="embed-container"></div>');
	}
});
$('.body-text table').each(function(){
	var wrapitem = $(this);
	if(!wrapitem.parent().hasClass('table-responsive')){
		wrapitem.wrap('<div class="table-responsive"></div>');
	}
});
})( jQuery );

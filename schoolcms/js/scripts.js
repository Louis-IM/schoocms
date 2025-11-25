(function($) {
	// menu-toggles
	$('.menu-toggle').on('click',function(){
		  $('body').toggleClass('menuopen');
	});
	$('li.menu-item-has-children.toggleable .toggleItem').on('click',function(e){
		e.preventDefault();
		$(this).parent('li').toggleClass('open');
		e.stopPropagation();
	});
	// end-menu-toggles
	
	$('.accordionTab').on('click',function(){
		var faq = $(this).parents('.accordionItem');
		var faqgroup = $(this).parents('.accordionGroup');
		$('.accordionItem',faqgroup).not(faq).children('.accordionContent').stop().slideUp();
		$('.accordionItem',faqgroup).not(faq).removeClass('open');
		$(faq).children('.accordionContent').stop().slideToggle();
		$(faq).toggleClass('open');
	});
	
	$('.searchform .searchSubmit').click(function(e){
     var parentContainer = $(this).parents('#searchform');
	 //prevent default if there is no value
	  if($('.searchInput',parentContainer).val() == ''){
		  e.preventDefault();		  
	  }
   });
   
  function fixHeader(){
	var windowHeight = $(window).height();
	if($(window).scrollTop() < 100) {
	$('body').removeClass('fixedHeader');
	}
	else {
	$('body').addClass('fixedHeader');
	} 
  }
$(document).ready(fixHeader);
$(window).scroll(fixHeader);  

Fancybox.bind("[data-fancybox]", {
	'dragToClose' : false,
	'autoFocus' : false,	
});
/* Every time the window is scrolled ... */
$(window).scroll( function(){
	/* Check the location of each desired element */
	$('.sectionfadein').each( function(i){
		var bottom_of_object = $(this).offset().top + $(this).outerHeight();
		var bottom_of_window = $(window).scrollTop() + $(window).height();
		var top_of_object = $(this).offset().top;
		var mid_of_window = $(window).scrollTop() + $(window).height() / 0.75 ;	
		console.log(mid_of_window);
		/* If the object is completely visible in the window, fade it it */
		if( mid_of_window > top_of_object ){			
			$(this).addClass('active');    
		}		
	}); 
});

/*carousels*/
$('.scms-carousel').each(function(index){
	var the_carousel = $(this);
	var car_cols = the_carousel.data('columns');
	var car_options = {
		loop:true,
		autoplay:false,
		margin:15,
		nav:true,
		navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
		items: 1,
		responsive:{
			0:{
				items:1
			},
		}
	}
	if (car_cols > 1){
		car_options['responsive'][480] = {items : 2};
	}
	if (car_cols > 2){
		car_options['responsive'][992] = {items : 3};
	}
	if (car_cols > 3){
		car_options['responsive'][1200] = {items : car_cols};
	}
	the_carousel.owlCarousel(car_options);
});
function socialSwitch(){
	var carousel_switch = $('.row.carouselSwitch');
	if(window.matchMedia('(min-width: 992px)').matches){
		carousel_switch.owlCarousel('destroy');
		carousel_switch.removeClass('owl-carousel');
	} else {
		if(carousel_switch){
			carousel_switch.addClass('owl-carousel');
			carousel_switch.owlCarousel({
				loop:true,
				items:1,
				nav: true,
				navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
				autoplay:true,
				stagePadding: 0,
				margin: 0
			});
		}
	}	
}
$(document).ready(socialSwitch);
$(window).resize(socialSwitch);
$('.body-text table').each(function(){
	var wrapitem = $(this);
	if(!wrapitem.parent().hasClass('table-responsive')){
		wrapitem.wrap('<div class="table-responsive"></div>');
	}
});
AOS.init({
offset: 100,
delay : 400,
});
$(window).scroll(function(){
	AOS.refreshHard();
});  
})( jQuery );

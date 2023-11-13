(function($) {
	var downlink = 5;
		if (typeof navigator.connection !== 'undefined') {
			downlink = navigator.connection.downlink;
		}
	var video =  document.querySelectorAll('video');
	function addSourceToVideo(element, src) {
		var source = document.createElement('source');
		source.src = src;
		source.type = 'video/mp4';
		console.log(src);
		if(src){
			element.appendChild(source);		
		}	
	}

	//determine screen size and select mobile or desktop vid
	function whichSizeVideo(element, src) {
		var windowWidth = window.innerWidth ? window.innerWidth : $(window).width();
		if (windowWidth > 768 && downlink >= 5) {
			addSourceToVideo( element, src.dataset.desktopVid);
		} else {
			addSourceToVideo(element, src.dataset.mobileVid);
		}
	}

	//init only if page has videos
	function videoSize() {
		if (video !== undefined) {
		video.forEach(function(element, index) {
				whichSizeVideo(  
					element, //element
					element  //src locations
				);	
			});
		}
	}
	videoSize();
})( jQuery );
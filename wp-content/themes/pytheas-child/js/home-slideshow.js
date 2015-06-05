(function($) {
	"use strict";
	$(window).load(function() {
		$('#home-slideshow').hide();
		if(flexLocalize.slideshow == "true") flexLocalize.slideshow = true; else flexLocalize.slideshow = false;
		if(flexLocalize.randomize == "true") flexLocalize.randomize = true; else flexLocalize.randomize = false;
		$('#home-slider.flexslider').flexslider({
			slideshow : flexLocalize.slideshow,
			randomize : flexLocalize.randomize,
			animation : 'fade',
			slideshowSpeed : flexLocalize.slideshowSpeed,
			animationSpeed : flexLocalize.animationSpeed,
			smoothHeight : true,
			controlNav : true,
			prevText : '<span class="fa fa-angle-left"></span>',
			nextText : '<span class="fa fa-angle-right"></span>'
		});
	});
})(jQuery);
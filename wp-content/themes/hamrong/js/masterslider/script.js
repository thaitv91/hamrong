jQuery(document).ready(function($){

	/*-----Setup for Gallery slider on homepage-----*/
	(function ( $ ) {
		"use strict";

		$(function () {
			var masterslider_5846 = new MasterSlider();

			// slider controls
			masterslider_5846.control('arrows'     ,{ autohide:true, overVideo:true  });                    
			masterslider_5846.control('slideinfo'  ,{ autohide:false, overVideo:true, dir:'h', align:'bottom',inset:false , margin:10   });
			// slider setup
			masterslider_5846.setup("MS558a1eec15846", {
					width           : 250,
					height          : 250,
					space           : 0,
					start           : 1,
					grabCursor      : true,
					swipe           : true,
					mouse           : true,
					keyboard        : false,
					layout          : "partialview", 
					wheel           : true,
					autoplay        : true,
					instantStartLayers:false,
					loop            : true,
					shuffle         : false,
					preload         : 0,
					heightLimit     : true,
					autoHeight      : false,
					smoothHeight    : true,
					endPause        : false,
					overPause       : true,
					fillMode        : "fill", 
					centerControls  : true,
					startOnAppear   : false,
					layersMode      : "center", 
					hideLayers      : false, 
					fullscreenMargin: 0,
					speed           : 20, 
					dir             : "h", 
					parallaxMode    : 'swipe',
					view            : "focus"
			});

			window.masterslider_instances = window.masterslider_instances || [];
			window.masterslider_instances.push( masterslider_5846 );
		 });
		
	})(jQuery);

	/*popup video*/
	if ($('body > .video-popup span').length > 0) {
		var width_of_iframe = $('body > .video-popup iframe').width();

		$('body > .video-popup').hover(function() {
			if ($('body > .video-popup iframe').width() != 420) {
				$('body > .video-popup iframe').animate({
					height: 315,
					width: 420
				}, 300);
			};

		});

		$('body > .video-popup span.close').click(function() {
			$('body > .video-popup').css("display", "none");
		});
		$('body > .video-popup span.minimize').click(function() {
			$('body > .video-popup .video-container').css("display", "none");
			$('body > .video-popup .openvideo').css("display", "block");
		});

		$('body > .video-popup .openvideo').click(function() {
			$('body > .video-popup .video-container').css("display", "block");
			$(this).css("display", "none");
		});
	};

});


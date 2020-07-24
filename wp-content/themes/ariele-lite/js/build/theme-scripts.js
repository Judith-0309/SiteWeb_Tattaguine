/**
 * Theme scripts.
 * Includes all the script functions for this theme.
 */
 
 ( function( $ ) {
	'use strict';
   
	// Global
	var $doc = $( document ),
	$body = $( 'body' );
	
	
	// Resize videos after container
	var vidSelector = ".post iframe, .post object, .post video, .widget-content iframe, .widget-content object, .widget-content iframe";	
	var resizeVideo = function(sSel) {
		$( sSel ).each(function() {
			var $video = $(this),
				$container = $video.parent(),
				iTargetWidth = $container.width();

			if ( !$video.attr("data-origwidth") ) {
				$video.attr("data-origwidth", $video.attr("width"));
				$video.attr("data-origheight", $video.attr("height"));
			}

			var ratio = iTargetWidth / $video.attr("data-origwidth");

			$video.css("width", iTargetWidth + "px");
			$video.css("height", ( $video.attr("data-origheight") * ratio ) + "px");
		});
	};

	resizeVideo(vidSelector);

	$(window).resize(function() {
		resizeVideo(vidSelector);
	});	
	

	
	// scroll to top
	jQuery("#scroll-to-top").hide();
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 1000) {
				jQuery('#scroll-to-top').fadeIn();
			} else {
				jQuery('#scroll-to-top').fadeOut();
			}
		});

	jQuery('#scroll-to-top a').on('click',function(){
		jQuery('html, body').animate({scrollTop:0}, 500 );
		return false;
	});
	});	
	
	
	/* searchtrigger */
	jQuery('a.searchOpen').on('click',function(){ 
			jQuery('#curtain').toggleClass('open'); 
            jQuery(this).toggleClass('opened'); 
			return false; 
	}); 
	
	jQuery('a.curtainclose').on('click',function(){ 
			jQuery('#curtain').removeClass('open'); 
			jQuery('a.searchOpen').removeClass('opened');
			return false; 
	});	
	

	
} )( jQuery );
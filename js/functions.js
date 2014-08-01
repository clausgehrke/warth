$(document).ready(function() {
        $("div.mobil-menu-button").click(
        	function() {
			$( ".mobilnav" ).toggleClass( "show" );
			$( ".mobil-menu-button" ).toggleClass( "active" );
        });
		// auslesen der url
        //var pathArray = window.location.pathname.split( '#' );
        //document.write(pathArray[0]);
    });
// (function ($) {
// 	// get proper height
// 	$.fn.setHeight = function (thisContainer, thisHeaderHeight, thisContainerHeight) {
// 		var minheight = $(thisContainer).height();
// 		return $(this).css('height', gridheight / thisContainerHeight);
// 	};

// 	/*!
// 	 * adapt height for fullheight grid
// 	 * setHeight: get section height, subtract header height, divide container height
// 	 */
// 	$('.sortiment-1-1').setHeight('.section-sortiment', 150, 1);

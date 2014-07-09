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


jQuery(document).ready(function ($) {
	/*
	 * menu interaction
	 */
	$('div.mobil-menu-button').click( function () {
		$('.mobilnav').toggleClass('show');
		$('.mobil-menu-button').toggleClass('active');
	});

	/*
	 * cycle slideshow
	 */
	$('.cycle-slideshow').cycle({
		'log': false
	});

	/*
	 * load images
	 */
	$('.js_get-post').on('click', function () {
		var href = $(this).attr('href'),
			id = $(this).data('id'),
			contact = $('.js_contact').attr('href').replace(/\d+/g, id);
			load_content = [ '.js_title', '.js_content', '.js_image' ];
		// interface
		$('.archive-postlist li').removeClass('active');
		$(this).parent().addClass('active');
		$('.js_contact').attr('href', contact);
		// loading
		$('.archive-postlist').after('<div class="loading">Loading...</div>');
		for ( var i = 0; i < load_content.length; i++ ) {
			// fade out
			$(load_content[i]).animate({
				'opacity': 0
			}, 350);
			// load
			$(load_content[i]).load(href+' '+load_content[i], function() {
				// fade in
				$(this).animate({
					'opacity': 1
				}, 350);
				$('.loading').remove();
			});
		}
		return false;
	});

	/*
	 * defaults
	 */
	$('.archive-postlist li').first().addClass('active');

});
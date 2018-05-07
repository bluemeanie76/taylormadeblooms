/*
	Read Only by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	skel.breakpoints({
		xlarge: '(max-width: 1680px)',
		large: '(max-width: 1280px)',
		medium: '(max-width: 1024px)',
		small: '(max-width: 736px)',
		xsmall: '(max-width: 480px)'
	});

	$(function() {

		var $body = $('body'),
			$header = $('#header'),
			$nav = $('#nav'), $nav_a = $nav.find('a'),
			$wrapper = $('#wrapper');

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on medium.
			skel.on('+medium -medium', function() {
				$.prioritize(
					'.important\\28 medium\\29',
					skel.breakpoint('medium').active
				);
			});

		// Header.
			var ids = [];

			// Set up nav items.
				$nav_a
					.scrolly({ offset: 44 })
					.on('click', function(event) {

						var $this = $(this),
							href = $this.attr('href');

						// Not an internal link? Bail.
							if (href.charAt(0) != '#')
								return;

						// Prevent default behavior.
							event.preventDefault();

						// Remove active class from all links and mark them as locked (so scrollzer leaves them alone).
							$nav_a
								.removeClass('active')
								.addClass('scrollzer-locked');

						// Set active class on this link.
							$this.addClass('active');

					})
					.each(function() {

						var $this = $(this),
							href = $this.attr('href'),
							id;

						// Not an internal link? Bail.
							if (href.charAt(0) != '#')
								return;

						// Add to scrollzer ID list.
							id = href.substring(1);
							$this.attr('id', id + '-link');
							ids.push(id);

					});

			// Initialize scrollzer.
				$.scrollzer(ids, { pad: 300, lastHack: true });

		// Off-Canvas Navigation.

			// Title Bar.
				$(
					'<div id="titleBar">' +
						'<a href="#header" class="toggle"></a>' +
						'<span class="title">' + $('#logo').html() + '</span>' +
					'</div>'
				)
					.appendTo($body);

			// Header.
				$('#header')
					.panel({
						delay: 500,
						hideOnClick: true,
						hideOnSwipe: true,
						resetScroll: true,
						resetForms: true,
						side: 'right',
						target: $body,
						visibleClass: 'header-visible'
					});

			// Fix: Remove navPanel transitions on WP<10 (poor/buggy performance).
				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
					$('#titleBar, #header, #wrapper')
						.css('transition', 'none');

	});

})(jQuery);

function shownumber() {
    $("#dialog").dialog();
}

function showgallery() {


    $("#gallery").dialog({
        width: "80%",
        maxWidth: 600,
        maxHeight: 600
    });

    $('.bxslider').bxSlider({
        mode: 'fade',
        captions: true,
        adaptiveHeight: true,
        responsive: true
    });

}


function addMenu(activepage){

	var navhtml = "<ul>";
	navhtml += "<li>";
	
	navhtml += "<a href='index.html' ";
	if(activepage == 1){navhtml += "class='active'";}
	navhtml += " >Home</a></li>";
	
	navhtml += "<li><a href='biog.html' ";
	if(activepage == 2){navhtml += "class='active'";}
	navhtml +=  ">Biography</a></li>";
	/*
	navhtml += "<li><a href='weddings.html'  ";
	if(activepage == 3){navhtml += "class='active'";}
	navhtml += ">Weddings</a></li>";

	navhtml += "<li><a href='funerals.html'  ";
	if(activepage == 4){navhtml += "class='active'";}
	navhtml += ">Funerals and Sympathy</a></li>";
	
	navhtml += "<li><a href='events.html'  ";
	if(activepage == 5){navhtml += "class='active'";}
	navhtml += ">Occassions</a></li>";

	navhtml += "<li><a href='corporate.html'  ";
	if(activepage == 6){navhtml += "class='active'";}
	navhtml += ">Corporate</a></li>";

	navhtml += "<li><a href='testimonials.html'  ";
	if(activepage == 7){navhtml += "class='active'";}
	navhtml += ">Testimonials</a></li>";
	*/
	navhtml += "<li><a href='payment.html'  ";
	if(activepage == 8){navhtml += "class='active'";}
	navhtml += ">Payment</a></li>";	
	
	navhtml += "</ul>";
	
	$("#nav").html(navhtml);
}
// Hide Header on on scroll down
let didScroll;
let lastScrollTop = 0;
let delta = 5;
let navbarHeight = $('.header').outerHeight();

$(window).scroll(function(){
	didScroll = true;
});

setInterval(function() {
	if (didScroll) {
		hasScrolled();
		didScroll = false;
	}
}, 250);

function hasScrolled() {
	let st = $(this).scrollTop();

	// Make sure they scroll more than delta
	if(Math.abs(lastScrollTop - st) <= delta)
		return;

	// If they scrolled down and are past the navbar, add class .nav-up.
	// This is necessary so you never see what is "behind" the navbar.
	if (st > lastScrollTop && st > navbarHeight){
		// Scroll Down
		// $('.header').removeClass('move-down').addClass('move-up');
		$('.header').addClass('move-up');
	} else {
		// Scroll Up
		if(st + $(window).height() < $(document).height()) {
			// $('.header').removeClass('move-up').addClass('move-down');
			$('.header').removeClass('move-up');
		}
	}

	lastScrollTop = st;
}

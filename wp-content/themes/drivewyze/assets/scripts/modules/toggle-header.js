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

	if(Math.abs(lastScrollTop - st) <= delta)
		return;

	if (st > lastScrollTop && st > navbarHeight){
		// Scroll Down
		$('.header').addClass('move-up');
	} else {
		// Scroll Up
		if(st + $(window).height() < $(document).height()) {
			$('.header').removeClass('move-up');
		}
	}

	lastScrollTop = st;
}

// Prevent closing from click inside dropdown
$(document).on('click', '.dropdown-menu', function (e) {
	e.stopPropagation();
});

function extraUrlCondition() {

	const disableLink = $('#primary-menu .menu-item a[href*="#"]');
	const disabledForClick = disableLink.closest('li').children('a');

	disabledForClick.addClass("disabled");

	$('.menu-item-has-children > a').on('click', function (event) {
		if ($(this).attr('href') !== '#') {
			event.preventDefault();
			window.location.href = $(this).attr('href');
		} else {
			event.preventDefault();
		}
	});

	const elForClick = $('.caret');
	const backClick = $('.caret-back');

	$(elForClick).on('click', function (event) {
		if ($(window).width() < 992) {
			event.preventDefault();

			const linkEl = $(this).closest('.menu-item').children('a').text();
			const containerEl = $(this).siblings('.dropdown-menu');
			const targetEl = containerEl.find('.caret-back');

			$(this).closest('.menu-item').children('a').toggleClass('show-sub');
			$(this).siblings('.dropdown-menu').toggleClass('show');
			$( `<p class='sub-title'>${linkEl}</p>` ).insertAfter( targetEl );
		}
	});

	$(backClick).on('click', function (event) {
		if ($(window).width() < 992) {
			event.preventDefault();

			$(this).siblings('.sub-title').remove();
			$(this).closest('.menu-item').children('a').toggleClass('show-sub');
			$(this).closest('.dropdown-menu').toggleClass('show');
		}
	});

}

function extraNavClasses() {

	$('.dropdown-menu.nested').each(function () {
		$(this).closest('.dropdown-menu.first').addClass('first--row');
	});
}

extraUrlCondition();
extraNavClasses();

$('.navbar-toggler').click(function () {
	let previousScrollY = 0;

	if (!$('#primaryNavBar').hasClass('show')) {
		$('#primaryNavBar').closest('.nav-primary').addClass('nav-show');
		$('.navbar-toggler').addClass('close-menu');
		previousScrollY = window.scrollY;
		$('html').css({
			marginTop: -previousScrollY,
			overflow: 'hidden',
			left: 0,
			right: 0,
			top: 0,
			bottom: 0,
		});
		window.scrollTo(0, previousScrollY);
	} else {
		$('#primaryNavBar').closest('.nav-primary').removeClass('nav-show');
		$('.navbar-toggler').removeClass('close-menu');
		$('html').css({
			marginTop: 0,
			overflow: 'visible',
			left: 'auto',
			right: 'auto',
			top: 'auto',
			bottom: 'auto',
			position: 'static',
		});
		window.scrollTo(0, previousScrollY);
	}
});

$(window).resize(function () {
	const win = $(this);
	if (win.width() >= 992) {
		$('#primaryNavBar').removeClass('show');
		$('#primaryNavBar').closest('.nav-primary').removeClass('nav-show');
		$('.navbar-nav').find('.menu-item.show').removeClass('show');
		$('.dropdown-menu').removeClass('show').removeAttr('style');
		$('.caret').removeClass('active');
		$('.navbar-toggler').removeClass('close-menu');
		$('html').css({
			marginTop: 0,
			overflow: 'visible',
			left: 'auto',
			right: 'auto',
			top: 'auto',
			bottom: 'auto',
			position: 'static',
		});
	}
});

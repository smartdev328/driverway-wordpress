jQuery(document).ready(() => {

	function shareToggle() {
		const openEl = $('.button_add');
		const closeEl = $('.button_close');
		const openElWrap = openEl.closest('.share-buttons');

		openEl.click(function () {
			if ($(window).width() < 992) {
				$(this).hide();
				$(".add_nav").fadeIn();
				$('html').css({overflow: 'hidden'});
			}
		});

		closeEl.click(function () {
			if ($(window).width() < 992) {
				$(".add_nav").hide();
				$(this).closest('.a2a_kit').find('.button_add').fadeIn();
				$('html').css({ overflow: 'visible'});
			}
		});

		openEl.mouseenter(function () {
			if ($(window).width() > 991) {
				$(".add_nav").fadeIn();
				console.log('hov');
			}
		});

		openElWrap.mouseleave(function () {
			if ($(window).width() > 991) {
				$(".add_nav").fadeOut();
			}
		});
	}

	function shareReset() {
		const navEl = $('.add_nav');
		const openBtn = navEl.closest('.a2a_kit').find('.button_add');

		navEl.hide();
		openBtn.fadeIn();
		$('html').css({ overflow: 'visible'});
	}

	$(window).resize(function () {
		shareToggle();
		shareReset();
	});

	shareToggle();
});

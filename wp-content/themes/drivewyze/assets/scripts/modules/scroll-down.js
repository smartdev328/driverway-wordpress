jQuery(document).ready(() => {

	$('.js-scroll-down').on('click', function(e) {
		e.preventDefault();
		const offset =  $($(this).attr('href')).offset().top;
		const scroll = offset - 50;
		$('html, body').animate({ scrollTop: scroll}, 500, 'linear');
	});
});

jQuery(document).ready(($) => {
	const $tabs  = $('.tabs');

	$tabs.each(function() {
		const tabNavs     = $(this).find('.tabs-nav__item');
		const tabContents = $(this).find('.tab-item');

		tabNavs.click((e)=>{
			e.preventDefault();
			const contentId = $(e.target).attr('href');

			tabNavs.removeClass('active');
			tabContents.removeClass('active');

			$(e.target).addClass('active');
			$(contentId).addClass('active');
		});
	});

});

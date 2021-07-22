jQuery(document).ready(($) => {

	$('.faq-item > .faq-item__hidden').slideUp();

	$('.faq-item > .faq-item__shown').click(function () {
		const $content = $(this).closest('.faq-item').find('.faq-item-content');
		if ($(this).parent().hasClass('faq-item_open')) {
			$('.faq-item > .faq-item__hidden').slideUp();
			$('.faq-item').removeClass('faq-item_open');
			$(this).next().slideUp();
			$(this).next().next().show();
			$content.attr('aria-hidden', "true");
			return false;
		} else {
			$('.faq-item > .faq-item__hidden').slideUp();
			$(this).closest('.faq-section__block').find('.faq-item_open').removeClass('faq-item_open');
			$('.faq-item__hidden').next().show();
			$(this).next().next().hide();
			$(this).next().slideDown();
			$(this).parent().addClass('faq-item_open');
			$content.attr('aria-hidden', "false");
			return false;
		}
	});
});

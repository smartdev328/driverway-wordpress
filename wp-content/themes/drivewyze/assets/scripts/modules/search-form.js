const toggleSearch = () => {

	const openBtn = $('.js-s-form');
	const closeBtn = $('.js-s-form-close');
	const searchFormEl = $('.search-form-wrap');

	openBtn.add(closeBtn).on('click', function (e) {
		e.preventDefault();
		searchFormEl.toggleClass('open');
	});
};

export default toggleSearch;

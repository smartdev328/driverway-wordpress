const toggleSearch = () => {

	const openBtn = $('.js-s-form');
	const searchFormEl = $('.search-form-wrap');

  openBtn.on('click', function (e) {
    e.preventDefault();
    searchFormEl.toggleClass('open');
    if (!$('.search-form-wrap').hasClass('open')) {
      e.preventDefault();
      $('#searchform').submit();
      searchFormEl.toggleClass('open');
      return true;
    }
  });
};

export default toggleSearch;

jQuery(document).ready(()=>{
	const pagParent = $('.swiper-pagination')
	const pagContainer = pagParent.children('.swiper-pagination-container')
	const titleMob = $('.fleet-multiple .swiper-container .swiper-pagination').data('titlemob')
	const titleDesk = $('.fleet-multiple .swiper-container .swiper-pagination').data('titledesk')
	const pagEl = '<span class="swiper-pagination-el swiper-pagination-el_title"></span>'

	pagContainer.before(pagEl)

	const pagTitleFunc = function () {
		if($(window).width() >= 992) {
			$('.swiper-pagination-el')
				.first()
				.html(titleDesk)
		} else {
			$('.swiper-pagination-el')
				.first()
				.html(titleMob)
		}
	}

	const pagMove = function () {
		$('.fleet-multiple').prepend(pagParent)
	}

	pagTitleFunc()
	pagMove()
	$(window).resize(pagTitleFunc)
})

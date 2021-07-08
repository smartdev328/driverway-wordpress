jQuery(document).ready(() => {
	const playVideoBtn = $('.hero-product-section-hero-video__play')
	const videoIframe = $('.hero-product-section-hero-video iframe')
	const previewImg = $('.hero-product-section-hero-video__preview')
	const previewOverlay = $('.hero-product-section-hero-video__overlay')
	const tabNavs = $('.hero-product-section-tabs-nav__item')
	const tabContents = $('.hero-product-section-tabs-content__item')

	tabNavs.click((e)=>{
		e.preventDefault()
		const contentId = $(e.target).attr('href')

		tabNavs.removeClass('active')
		tabContents.removeClass('active')

		$(e.target).addClass('active')
		$(contentId).addClass('active')
	})

	playVideoBtn.click((e)=>{
		previewImg.fadeOut()
		previewOverlay.fadeOut()
		videoIframe[0].src += "&autoplay=1"
		e.preventDefault()
	})
})

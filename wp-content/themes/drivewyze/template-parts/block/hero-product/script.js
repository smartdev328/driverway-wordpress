jQuery(document).ready(($) => {
	const playVideoBtn = $('.hero-product-section-hero-video__play')
	const videoIframe = $('.hero-product-section-hero-video iframe')
	const previewImg = $('.hero-product-section-hero-video__preview')
	const previewOverlay = $('.hero-product-section-hero-video__overlay')
	const tabNav = $('.hero-product-section-tabs-nav__item.active')

	tabNav.click((event)=>{
		event.preventDefault()
	})

	playVideoBtn.click((e)=>{
		previewImg.fadeOut()
		previewOverlay.fadeOut()
		videoIframe[0].src += "&autoplay=1"
		e.preventDefault()
	})
})

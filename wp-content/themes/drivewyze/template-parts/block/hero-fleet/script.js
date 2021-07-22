jQuery(document).ready(()=>{
	const tabNavs = $('.fleet-hero-nav-scroll__item')
	const tabContents = $('.fleet-hero__slide')

	tabNavs.click((e)=>{
		e.preventDefault()
		const contentId = $(e.target).attr('href')

		tabNavs.removeClass('active')
		tabContents.removeClass('active')

		$(e.target).addClass('active')
		$(contentId).addClass('active')
	})
})

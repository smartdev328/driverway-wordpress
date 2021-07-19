import Swiper, {Navigation, Autoplay, EffectFade, Pagination} from 'swiper'
Swiper.use([Navigation, Autoplay, EffectFade, Pagination])

const
	sliders = {
		init: function () {
			let customerSlider = $('.customer-slider .swiper-container')
			let fleetSlider = $('.fleet-multiple .swiper-container')

			if (customerSlider.length) {
				customerSlider.each(function () {
					let customerSwiper = new Swiper(this, {
						loop: true,
						slidesPerView: 1,
						navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						},
						breakpoints: {
							320: {
								spaceBetween: 15,
							},
							768: {
								spaceBetween: 50,
							},
						},
					})
					customerSwiper.init()
				})
			}

			if(fleetSlider.length) {
				let slideNames = []
				fleetSlider.each(function (){
					$(this).children('.swiper-wrapper').children('.swiper-slide').each(function (){
						slideNames.push($(this).data('name'))
					})
					let fleetSwiper = new Swiper(this, {
						effect: 'fade',
						loop: false,
						autoplay: false,
						slidesPerView: 1,
						pagination: {
							el: '.swiper-pagination-container',
							bulletClass: 'swiper-pagination-el',
							bulletActiveClass: 'active',
							clickable: true,
								renderBullet(index, className) {
								let pagEl = '<span class="'+ className +'">' + slideNames[index] + '</span>'
								return pagEl
							},
						},
						fadeEffect: {
							crossFade: true,
						},
					})
					fleetSwiper.init()
				})
			}
		},
	}

export default sliders

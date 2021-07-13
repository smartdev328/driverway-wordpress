import Swiper, {Navigation, Autoplay, EffectFade} from 'swiper'
Swiper.use([Navigation, Autoplay, EffectFade])

const
	sliders = {
		init: function () {
			let customerSlider = $('.customer-slider .swiper-container')
			let fleetSlider = $('.fleet-slider .swiper-container')

			if (customerSlider.length > 0) {
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

			if(fleetSlider.length > 0) {
				fleetSlider.each(function (){
					let fleetSwiper = new Swiper(this, {
						loop: false,
						autoplay: false,
						slidesPerView: 1,
						pagination: {
							el: '.swiper-pagination',
							type: 'custom',
						},
						navigation: false,
					})
					fleetSwiper.init()
				})
			}
		},
	}

export default sliders

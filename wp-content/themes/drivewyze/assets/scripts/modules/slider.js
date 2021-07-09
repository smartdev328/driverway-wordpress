import Swiper, {Navigation, Autoplay, EffectFade} from 'swiper'
Swiper.use([Navigation, Autoplay, EffectFade])

const
	sliders = {
		init: function () {
			let customerSlider = $('.customer-slider .swiper-container');

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
					});
					customerSwiper.init()
				})
			}
		},
	}

export default sliders

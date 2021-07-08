import Swiper, {Navigation, Autoplay, EffectFade} from 'swiper'
Swiper.use([Navigation, Autoplay, EffectFade])

const
	sliders = {
		init: function () {
			let customerSlider = $('.customer-slider .swiper-container');
			let slidesQuantity = $('.customer-slider .swiper-container .swiper-wrapper').data('slides')

			if (customerSlider.length > 0) {
				customerSlider.each(function () {
					let customerSwiper = new Swiper(this, {
						loop: true,
						slidesPerView: "auto",
						loopedSlides: slidesQuantity,
						navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						},
					});
					customerSwiper.init()
				})
			}
		},
	}

export default sliders

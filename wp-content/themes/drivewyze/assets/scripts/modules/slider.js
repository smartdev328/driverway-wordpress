import Swiper, {Navigation, Autoplay, EffectFade, Pagination} from 'swiper'
Swiper.use([Navigation, Autoplay, EffectFade, Pagination])

const
	sliders = {
		init: function () {
			let customerSlider = $('.customer-slider .swiper-container');
			let fleetSlider = $('.fleet-multiple .swiper-container');
			let resourcesLinkSlider = $('.resources_link .swiper-container');
			let resourcesFileSlider = $('.resources_file .swiper-container');

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
					});
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

			if (resourcesFileSlider.length > 0) {
				resourcesFileSlider.each(function () {
					let resourcesFileSwiper = new Swiper(this, {
						slidesPerView: '1',
						autoplayDisableOnInteraction: true,
						loop: true,
						centeredSlides: true,
						navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						},
						breakpoints: {
							200: {
								spaceBetween: 15,
							},
							768: {
								spaceBetween: 25,
								slidesPerView: '2',
								centeredSlides: false,
							},

							992: {
								spaceBetween: 25,
								slidesPerView: '3',
							},

							1366: {
								spaceBetween: 30,
								slidesPerView: '3',
							},
							1920: {
								spaceBetween: 30,
								slidesPerView: '5',
							},
						},
					});
					resourcesFileSwiper.init();
				});
			}

			if (resourcesLinkSlider.length > 0) {
				resourcesLinkSlider.each(function () {
					let resourcesLinkSwiper = new Swiper(this, {
						slidesPerView: "auto",
						autoplayDisableOnInteraction: true,
						centeredSlides: false,
						loop: true,
						navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						},
						breakpoints: {
							200: {
								spaceBetween: 15,
							},
							768: {
								spaceBetween: 25,
								slidesPerView: '2',
							},
							992: {
								spaceBetween: 25,
								slidesPerView: '3',
							},

							1366: {
								spaceBetween: 30,
								slidesPerView: '3',
							},
							1920: {
								spaceBetween: 30,
								slidesPerView: '4',
								noSwiping: true,
							},
						},
					});

					if ($(window).width() < 1900) {
						resourcesLinkSwiper.init();
					} else {
						resourcesLinkSwiper.destroy();
					}
				});
			}
		},
	};

export default sliders

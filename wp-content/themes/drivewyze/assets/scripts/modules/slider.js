import Swiper, {Navigation, Autoplay, EffectFade, Pagination} from 'swiper'
Swiper.use([Navigation, Autoplay, EffectFade, Pagination])

const
	sliders = {
		init: function () {
			let customerSlider = $('.customer-slider .swiper-container');
			let resourcesLinkSlider = $('.resources_link .swiper-container');
			let resourcesFileSlider = $('.resources_file .swiper-container');

			if (customerSlider.length) {
				customerSlider.each(function () {
					let customerSwiper = new Swiper(this, {
						loop: true,
						slidesPerView: 1.01,
						centeredSlides: true,
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
                        allowTouchMove: true,
                        loop: true,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        breakpoints: {
                            200: {
                                spaceBetween: 15,
                                allowTouchMove: true,
                                loop: true,
								navigation: {
									nextEl: '.swiper-button-next',
									prevEl: '.swiper-button-prev',
								},
                            },
                            768: {
                                spaceBetween: 25,
                                slidesPerView: '2',
                                allowTouchMove: true,
                                loop: true,
								navigation: {
									nextEl: '.swiper-button-next',
									prevEl: '.swiper-button-prev',
								},
                            },
                            992: {
                                spaceBetween: 25,
                                slidesPerView: '3',
                                allowTouchMove: true,
                                loop: true,
								navigation: {
									nextEl: '.swiper-button-next',
									prevEl: '.swiper-button-prev',
								},
                            },

                            1366: {
                                spaceBetween: 30,
                                slidesPerView: '3',
                                allowTouchMove: true,
                                loop: true,
								navigation: {
									nextEl: '.swiper-button-next',
									prevEl: '.swiper-button-prev',
								},
                            },
                            2350: {
                                spaceBetween: 30,
                                slidesPerView: '4',
                                loop: false,
                                noSwiping: true,
                                allowTouchMove: false,
								navigation: {
									nextEl: '.swiper-button-next',
									prevEl: '.swiper-button-prev',
								},
                            },
                        },
                    });

                    resourcesLinkSwiper.init();
                });
            }
		},
	};

export default sliders

export const getMainPageSliders = () => {
	const mainSlider = document.querySelector('.js-main-slider');
	const infoSlider = document.querySelector('.js-info-slider');

	if(mainSlider){
		new Swiper(mainSlider, {
			pagination: {
				el: '.js-slider-pagination',
			},
			slidePerView: 1,
			spaceBetween: 15,
			breakpoints: {
				900: {
					pagination: false,
					navigation: {
						nextEl: '.js-slider-next',
						prevEl: '.js-slider-prev',
					},
				},
			}
		})
	}

	if(infoSlider){
		new Swiper(infoSlider, {
			slidePerView: 1,
			cssMode: true,
			spaceBetween: 20,
			breakpoints: {
				900: {
					direction: 'horizontal',
					freeMode: true,
					mousewheel: true,
				},
			}
		})
	}
}

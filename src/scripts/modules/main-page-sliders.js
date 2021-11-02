export const getMainPageSliders = () => {
	const mainSlider = document.querySelector('.js-main-slider');
	const infoSlider = document.querySelector('.js-info-slider');

	if(mainSlider){
		new Swiper(mainSlider, {
			lazy: true,
			pagination: {
				el: '.js-slider-pagination',
			},
			slidesPerView: 1,
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
			lazy: {
				loadPrevNext: true
			},
			watchSlidesProgress: true,
			slidesPerView: 'auto',
			spaceBetween: 20,
		})
	}
}

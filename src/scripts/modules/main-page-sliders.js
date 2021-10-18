export const getMainPageSliders = () => {
	const mainSlider = document.querySelector('.js-main-slider');
	const infoSlider = document.querySelector('.js-info-slider');

	if(mainSlider){
		const mainSwiper = new Swiper(mainSlider, {
			pagination: {
				el: '.js-slider-pagination',
			},
			slidePerView: 1,
			spaceBetween: 15
		})
	}

	if(infoSlider){
		const infoSwiper = new Swiper(infoSlider, {
			slidePerView: 1,
			spaceBetween: 20,
		})
	}
}

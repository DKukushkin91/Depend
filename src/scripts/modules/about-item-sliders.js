export const getItemSliders = () => {
	const mainSlider = document.querySelector('.js-about-item-slider');
	const adviseSlider = document.querySelector('.js-advise-slider');
	const otherSlider = document.querySelector('.js-other-slider');

	if(mainSlider){
		new Swiper(mainSlider, {
			lazy: true,
			pagination: {
				el: '.js-about-item-pagination',
			},
			slidesPerView: 'auto',
			spaceBetween: 15,
			watchSlidesProgress: true,
		})
	}

	if(adviseSlider){
		new Swiper(adviseSlider, {
			lazy: true,
			slidesPerView: 'auto',
			spaceBetween: 20,
			watchSlidesProgress: true,
		})
	}

	if(otherSlider){
		new Swiper(otherSlider, {
			lazy: true,
			slidesPerView: 'auto',
			spaceBetween: 20,
			watchSlidesProgress: true,
		})
	}
}

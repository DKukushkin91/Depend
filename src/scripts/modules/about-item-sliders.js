export const getItemSliders = () => {
	const mainSlider = document.querySelector('.js-about-item-slider');

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
}

export const getItemsSlider = () => {
	if(document.querySelector('.js-items-slider')){
		const itemsSlider = document.querySelectorAll('.js-items-slider');

		itemsSlider.forEach(e => {
			new Swiper(e, {
				lazy: true,
				slidesPerView: 'auto',
				spaceBetween: 20,
				watchSlidesProgress: true,
			})
		})
	}
}

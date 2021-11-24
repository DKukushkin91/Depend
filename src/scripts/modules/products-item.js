export const getItemSlider = () => {
	if(document.querySelector('.js-p-item-slider')){
		const itemSlider = document.querySelector('.js-p-item-slider');
		const sliderPagination = itemSlider.querySelector('.js-item-pagination');

		new Swiper(itemSlider, {
			slidePerView: 'auto',
			spaceBetween: 10,
			watchSlidesProgress: true,
			pagination: {
				el: sliderPagination
			}
		})
	}
}

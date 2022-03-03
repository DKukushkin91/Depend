export const getSalesSlider = () => {
	if(document.querySelector('.js-sales-slider')) {
		const salesSlider = document.querySelector('.js-sales-slider');
		if(salesSlider){
			new Swiper(salesSlider, {
				lazy: {
					loadPrevNext: true
				},
				watchSlidesProgress: true,
				slidesPerView: 'auto',
				spaceBetween: 10,
				breakpoints: {
					1280: {
						spaceBetween: 30,
					},
					1366: {
						navigation: {
							nextEl: '.js-sales-next',
							prevEl: '.js-sales-prev',
						}
					}
				}
			})
		}
	}
}

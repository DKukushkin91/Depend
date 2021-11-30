import {createElement} from '../utils/utils';

export const getItemSlider = () => {
	if(document.querySelector('.js-p-item-slider')){
		const itemSlider = document.querySelector('.js-p-item-slider');
		const itemSliderWrap = itemSlider.querySelector('.js-p-item-wrap');
		const itemSlides = itemSlider.querySelectorAll('.js-p-item-slide');
		const sliderPagination = itemSlider.querySelector('.js-item-pagination');

		const slider =	new Swiper(itemSlider, {
			init: false,
			slidePerView: 'auto',
			spaceBetween: 10,
			watchSlidesProgress: true,
			pagination: {
				el: sliderPagination
			}
		})

		if(window.innerWidth <= 1023) {
			slider.init();
		} else {
			itemSlider.classList.remove('swiper');
			itemSliderWrap.classList.remove('swiper-wrapper');
			itemSlides.forEach(e => e.classList.remove('swiper-slide'))
		}

		window.addEventListener('resize', () => {
			if(window.innerWidth <= 1023){
				itemSlider.classList.add('swiper');
				itemSliderWrap.classList.add('swiper-wrapper');
				itemSlides.forEach(e => e.classList.add('swiper-slide'))
				slider.init();
			} else {
				itemSlider.classList.remove('swiper');
				itemSliderWrap.classList.remove('swiper-wrapper');
				itemSlides.forEach(e => e.classList.remove('swiper-slide'))
				// slider.destroy();
			}
		})
	}
}

export const getMainImage = () => {
	if(document.querySelector('.js-main-img-wrap')){
		const imgWrap = document.querySelector('.js-main-img-wrap');
		const thumbsImages = document.querySelectorAll('.js-thumbs-img');
		const testing = document.querySelector('.js-p-item-wrap');
		const template = document.querySelector('.js-main-img-template')
			.content
			.querySelector('.js-main-img');

		const getElement = () => {
			const clone = template.cloneNode(true);
			const removeClass = () => {
				thumbsImages.forEach(e => {
					e.parentNode.classList.remove('products-item__slide--active')
				})
			}

			clone.src = thumbsImages[0].src;

			thumbsImages.forEach(e => {
				if(clone.src === e.src)
					e.parentNode.classList.add('products-item__slide--active')
			})

			testing.addEventListener('click', (evt) => {
				evt.preventDefault();
				if(evt.target.hasAttribute('src')){
					removeClass();
					evt.target.parentNode.classList.add('products-item__slide--active');
					clone.src = evt.target.src;
				} else {
					removeClass();
					evt.target.classList.add('products-item__slide--active');
					clone.src = evt.target.querySelector('img').src;
				}


			})

			return clone;
		};

		const appendElement = () => {
			const fragment = document.createDocumentFragment();
			const element = getElement();

			fragment.appendChild(element);
			createElement(imgWrap, fragment);
		}

		appendElement();
	}
}

import {createElement} from '../utils/utils';

export const getProductsList = () => {
	if(document.querySelector('.js-products-wrap')){
		const productsWrap = document.querySelector('.js-products-wrap');
		const template = document.querySelector('.js-products-template')
			.content
			.querySelectorAll('.js-products-item');

		const getElement = (tmp) => tmp.cloneNode(true);

		const appendElement = (tmp) => {
			const fragment = document.createDocumentFragment();

			tmp.forEach(el => {
				const element = getElement(el);
				fragment.appendChild(element);
			});

			createElement(productsWrap, fragment);
		}

		appendElement(template);
	}
}

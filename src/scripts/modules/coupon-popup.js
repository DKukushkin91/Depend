import {createElement} from '../utils/utils';

export const getCouponPopup = () => {
	if(document.querySelector('.js-coupon-open')) {
		const button = document.querySelector('.js-coupon-open');
		const body = document.querySelector('body');
		const template = document.querySelector('.js-coupon-template')
			.content
			.querySelector('.js-coupon-popup');

		const escPressHandler = (evt) => {
			if (evt.key === 'Escape') {
				evt.preventDefault();
				elementRemoveHandler();
			}
		};

		const elementRemoveHandler = () => {
			const wrap = document.querySelector('.js-coupon-popup');

			if (wrap) {
				wrap.remove();
				document.removeEventListener('keydown', escPressHandler);
				body.classList.remove('lock-scroll--popup');
			}
		};

		const getElement = () => {
			const clone = template.cloneNode(true);
			const closeBtn = clone.querySelector('.js-coupon-close')

			closeBtn.addEventListener('click', elementRemoveHandler);
			body.classList.add('lock-scroll--popup');
			return clone
		}

		const appendElement = () => {
			const fragment = document.createDocumentFragment();
			const element = getElement();

			fragment.appendChild(element);
			document.addEventListener('keydown', escPressHandler);
			createElement(body, fragment);
		}

		button.addEventListener('click', (evt) => {
			evt.preventDefault();
			appendElement();
		})
	}
}

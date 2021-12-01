import {createElement} from '../utils/utils';

export const getCouponPopup = () => {
	if(document.querySelector('.js-coupon-open')) {
		const button = document.querySelector('.js-coupon-open');
		const body = document.querySelector('body');
		const template = document.querySelector('.js-coupon-template')
			.content
			.querySelector('.js-coupon-popup');

		const successTemplate = document.querySelector('.js-coupon-suc-template')
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

		const getElement = (temp) => {
			const clone = temp.cloneNode(true);
			const closeBtn = clone.querySelector('.js-coupon-close')

			if(clone.querySelector('.js-coupon-sbmt')){
				const submitBtn = clone.querySelector('.js-coupon-sbmt');
				submitBtn.addEventListener('click', getSuccess)
			}

			if(clone.querySelector('.js-coupon-link')){
				const link = clone.querySelector('.js-coupon-link');
				link.addEventListener('click', elementRemoveHandler);
			}

			closeBtn.addEventListener('click', elementRemoveHandler);
			body.classList.add('lock-scroll--popup');
			return clone
		}

		const appendElement = (temp) => {
			const fragment = document.createDocumentFragment();
			const element = getElement(temp);

			fragment.appendChild(element);
			document.addEventListener('keydown', escPressHandler);
			createElement(body, fragment);
		}

		const getSuccess = () => {
			elementRemoveHandler();
			appendElement(successTemplate);
		}

		button.addEventListener('click', (evt) => {
			evt.preventDefault();
			appendElement(template);
		})
	}
}

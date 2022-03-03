import {createElement} from '../utils/utils';

export const getPopups = () => {
	if(document.querySelector('.js-coupon-open') || document.querySelector('.js-comment-btn')) {
		const button = document.querySelector('.js-coupon-open');
		const commentBtn = document.querySelector('.js-comment-btn');
		const body = document.querySelector('body');
		const template = document.querySelector('.js-coupon-template')
			.content
			.querySelector('.js-coupon-popup');

		const successTemplate = document.querySelector('.js-coupon-suc-template')
			.content
			.querySelector('.js-coupon-popup');

		const commentTemplate = document.querySelector('.js-comment-template')
			.content
			.querySelector('.js-comment-popup');

		const escPressHandler = (evt) => {
			if (evt.key === 'Escape') {
				evt.preventDefault();
				elementRemoveHandler();
			}
		};

		const elementRemoveHandler = () => {
			const wrap = document.querySelector('.js-coupon-popup');
			const commentWrap = document.querySelector('.js-comment-popup');

			if (wrap || commentWrap) {
				wrap ? wrap.remove() : commentWrap.remove();

				document.removeEventListener('keydown', escPressHandler);
				body.classList.remove('lock-scroll--popup');
			}
		};

		const getElement = (temp) => {
			const clone = temp.cloneNode(true);
			const closeBtn = clone.querySelector('.js-popup-close');
			const inputs = clone.querySelectorAll('.js-popup-input');

			if(clone.querySelector('.js-coupon-sbmt') || clone.querySelector('.js-comment-sbmt')){
				const submitBtn = clone.querySelector('.js-coupon-sbmt') || clone.querySelector('.js-comment-sbmt');

				submitBtn.setAttribute('disabled', true);

				inputs.forEach(input => {
					input.addEventListener('input', () => {
						[...inputs].filter(el => {
							if(el.checkValidity()){
								submitBtn.removeAttribute('disabled');

								if(clone.querySelector('.js-coupon-sbmt')) {
									submitBtn.addEventListener('click', getSuccess);
								}

							}else{
								submitBtn.setAttribute('disabled', true);
							}
						})
					})
				})
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

		if(button) {
			button.addEventListener('click', (evt) => {
				evt.preventDefault();
				appendElement(template);
			})
		} else {
			commentBtn.addEventListener('click', (evt) => {
				evt.preventDefault();
				appendElement(commentTemplate);
			})
		}
	}
}

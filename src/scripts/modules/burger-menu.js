export const getBurgerMenu = () => {
	const burgerButton = document.querySelector('.js-burger-btn');
	const menu = document.querySelector('.js-burger-menu');

	burgerButton.addEventListener('click', () => {
		const body = document.querySelector('body');

    body.classList.toggle('lock-scroll');
    burgerButton.classList.toggle('header__burger-btn--close');
    menu.classList.toggle('header__menu--open');
	})
}


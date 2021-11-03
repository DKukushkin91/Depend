import {getBurgerMenu} from './modules/burger-menu';
import {getMainPageSliders} from './modules/main-page-sliders';
import {getItemSliders} from './modules/about-item-sliders';

document.addEventListener('DOMContentLoaded', () => {
	getBurgerMenu();
	getMainPageSliders();
	getItemSliders();
});

import {getBurgerMenu} from './modules/burger-menu';
import {getMainPageSliders} from './modules/main-page-sliders';
import {getItemSliders} from './modules/about-item-sliders';
import {getActiveItem} from './modules/about-item-nav';
import {getSalesSlider} from './modules/sales-slider';
import {getProductsList} from './modules/products-list';
import {getItemSlider, getMainImage} from './modules/products-item';
import {getItemsSlider} from './modules/items-slider';
import {getPopups} from './modules/popups';

document.addEventListener('DOMContentLoaded', () => {
	getBurgerMenu();
	getMainPageSliders();
	getItemSliders();
	getActiveItem();
	getSalesSlider();
	getProductsList();
	getItemSlider();
	getItemsSlider();
	getMainImage();
	getPopups();
});

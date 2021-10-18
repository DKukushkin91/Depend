"use strict";

var getBurgerMenu = function getBurgerMenu() {
  var burgerButton = document.querySelector('.js-burger-btn');
  var menu = document.querySelector('.js-burger-menu');
  burgerButton.addEventListener('click', function () {
    var body = document.querySelector('body');
    body.classList.toggle('lock-scroll');
    burgerButton.classList.toggle('header__burger-btn--close');
    menu.classList.toggle('header__menu--open');
  });
};

var getMainPageSliders = function getMainPageSliders() {
  var mainSlider = document.querySelector('.js-main-slider');
  var infoSlider = document.querySelector('.js-info-slider');

  if (mainSlider) {
    var mainSwiper = new Swiper(mainSlider, {
      pagination: {
        el: '.js-slider-pagination'
      },
      slidePerView: 1,
      spaceBetween: 15
    });
  }

  if (infoSlider) {
    var infoSwiper = new Swiper(infoSlider, {
      slidePerView: 1,
      spaceBetween: 20
    });
  }
};

document.addEventListener('DOMContentLoaded', function () {
  getBurgerMenu();
  getMainPageSliders();
});
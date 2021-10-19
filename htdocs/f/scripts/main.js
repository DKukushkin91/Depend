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
    new Swiper(mainSlider, {
      pagination: {
        el: '.js-slider-pagination'
      },
      slidePerView: 1,
      spaceBetween: 15,
      breakpoints: {
        900: {
          pagination: false,
          navigation: {
            nextEl: '.js-slider-next',
            prevEl: '.js-slider-prev'
          }
        }
      }
    });
  }

  if (infoSlider) {
    new Swiper(infoSlider, {
      slidePerView: 1,
      cssMode: true,
      spaceBetween: 20,
      breakpoints: {
        900: {
          direction: 'horizontal',
          freeMode: true,
          mousewheel: true
        }
      }
    });
  }
};

document.addEventListener('DOMContentLoaded', function () {
  getBurgerMenu();
  getMainPageSliders();
});
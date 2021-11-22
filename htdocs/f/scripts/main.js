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
      lazy: true,
      pagination: {
        el: '.js-slider-pagination'
      },
      slidesPerView: 1,
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
      lazy: {
        loadPrevNext: true
      },
      watchSlidesProgress: true,
      slidesPerView: 'auto',
      spaceBetween: 20
    });
  }
};

var getItemSliders = function getItemSliders() {
  var mainSlider = document.querySelector('.js-about-item-slider');
  var adviseSlider = document.querySelector('.js-advise-slider');
  var otherSlider = document.querySelector('.js-other-slider');

  if (mainSlider) {
    new Swiper(mainSlider, {
      lazy: true,
      pagination: {
        el: '.js-about-item-pagination'
      },
      slidesPerView: 'auto',
      spaceBetween: 15,
      watchSlidesProgress: true
    });
  }

  if (adviseSlider) {
    new Swiper(adviseSlider, {
      lazy: true,
      slidesPerView: 'auto',
      spaceBetween: 20,
      watchSlidesProgress: true
    });
  }

  if (otherSlider) {
    new Swiper(otherSlider, {
      lazy: true,
      slidesPerView: 'auto',
      spaceBetween: 20,
      watchSlidesProgress: true
    });
  }
};

var getActiveItem = function getActiveItem() {
  if (document.querySelector('.js-title-item')) {
    var items = document.querySelectorAll('.js-title-item');
    var sections = {};
    var i = 0;
    Array.prototype.forEach.call(items, function (e) {
      sections[e.id] = e.offsetTop;
    });
    window.addEventListener('scroll', function () {
      var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

      for (i in sections) {
        if (sections[i] <= scrollPosition) {
          document.querySelector('.about-item__link--active').classList.remove('about-item__link--active');
          document.querySelector('a[href*=' + i + ']').classList.add('about-item__link--active');
        }
      }
    });
  }
};

document.addEventListener('DOMContentLoaded', function () {
  getBurgerMenu();
  getMainPageSliders();
  getItemSliders();
  getActiveItem();
});
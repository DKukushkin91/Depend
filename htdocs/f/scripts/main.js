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
          var elements = document.querySelector('a[href*=' + i + ']');
          document.querySelector('.about-item__link--active').classList.remove('about-item__link--active');
          elements.classList.add('about-item__link--active');
        }
      }
    });
  }
};

var getSalesSlider = function getSalesSlider() {
  if (document.querySelector('.js-sales-slider')) {
    var salesSlider = document.querySelector('.js-sales-slider');

    if (salesSlider) {
      new Swiper(salesSlider, {
        lazy: {
          loadPrevNext: true
        },
        watchSlidesProgress: true,
        slidesPerView: 'auto',
        spaceBetween: 10,
        breakpoints: {
          1280: {
            spaceBetween: 30
          },
          1366: {
            navigation: {
              nextEl: '.js-sales-next',
              prevEl: '.js-sales-prev'
            }
          }
        }
      });
    }
  }
}; //создание елемента из template


var createElement = function createElement(element, fragment) {
  return element.appendChild(fragment);
}; //удаление всех дочерних элементов


var getProductsList = function getProductsList() {
  if (document.querySelector('.js-products-wrap')) {
    var productsWrap = document.querySelector('.js-products-wrap');
    var template = document.querySelector('.js-products-template').content.querySelectorAll('.js-products-item');

    var getElement = function getElement(tmp) {
      return tmp.cloneNode(true);
    };

    var appendElement = function appendElement(tmp) {
      var fragment = document.createDocumentFragment();
      tmp.forEach(function (el) {
        var element = getElement(el);
        fragment.appendChild(element);
      });
      createElement(productsWrap, fragment);
    };

    appendElement(template);
  }
};

document.addEventListener('DOMContentLoaded', function () {
  getBurgerMenu();
  getMainPageSliders();
  getItemSliders();
  getActiveItem();
  getSalesSlider();
  getProductsList();
});
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

var getItemSlider = function getItemSlider() {
  if (document.querySelector('.js-p-item-slider')) {
    var itemSlider = document.querySelector('.js-p-item-slider');
    var itemSliderWrap = itemSlider.querySelector('.js-p-item-wrap');
    var itemSlides = itemSlider.querySelectorAll('.js-p-item-slide');
    var sliderPagination = itemSlider.querySelector('.js-item-pagination');
    var slider = new Swiper(itemSlider, {
      init: false,
      slidePerView: 'auto',
      spaceBetween: 10,
      watchSlidesProgress: true,
      pagination: {
        el: sliderPagination
      }
    });

    if (window.innerWidth <= 1023) {
      slider.init();
    } else {
      itemSlider.classList.remove('swiper');
      itemSliderWrap.classList.remove('swiper-wrapper');
      itemSlides.forEach(function (e) {
        return e.classList.remove('swiper-slide');
      });
    }

    window.addEventListener('resize', function () {
      if (window.innerWidth <= 1023) {
        itemSlider.classList.add('swiper');
        itemSliderWrap.classList.add('swiper-wrapper');
        itemSlides.forEach(function (e) {
          return e.classList.add('swiper-slide');
        });
        slider.init();
      } else {
        itemSlider.classList.remove('swiper');
        itemSliderWrap.classList.remove('swiper-wrapper');
        itemSlides.forEach(function (e) {
          return e.classList.remove('swiper-slide');
        }); // slider.destroy();
      }
    });
  }
};

var getMainImage = function getMainImage() {
  var imgWrap = document.querySelector('.js-main-img-wrap');
  var thumbsImages = document.querySelectorAll('.js-thumbs-img');
  var testing = document.querySelector('.js-p-item-wrap');
  var template = document.querySelector('.js-main-img-template').content.querySelector('.js-main-img');

  var getElement = function getElement() {
    var clone = template.cloneNode(true);

    var removeClass = function removeClass() {
      thumbsImages.forEach(function (e) {
        e.parentNode.classList.remove('products-item__slide--active');
      });
    };

    clone.src = thumbsImages[0].src;
    thumbsImages.forEach(function (e) {
      if (clone.src === e.src) e.parentNode.classList.add('products-item__slide--active');
    });
    testing.addEventListener('click', function (evt) {
      evt.preventDefault();

      if (evt.target.hasAttribute('src')) {
        removeClass();
        evt.target.parentNode.classList.add('products-item__slide--active');
        clone.src = evt.target.src;
      } else {
        removeClass();
        evt.target.classList.add('products-item__slide--active');
        clone.src = evt.target.querySelector('img').src;
      }
    });
    return clone;
  };

  var appendElement = function appendElement() {
    var fragment = document.createDocumentFragment();
    var element = getElement();
    fragment.appendChild(element);
    createElement(imgWrap, fragment);
  };

  appendElement();
};

var getItemsSlider = function getItemsSlider() {
  if (document.querySelector('.js-items-slider')) {
    var itemsSlider = document.querySelectorAll('.js-items-slider');
    itemsSlider.forEach(function (e) {
      new Swiper(e, {
        lazy: true,
        slidesPerView: 'auto',
        spaceBetween: 20,
        watchSlidesProgress: true
      });
    });
  }
};

var getLoadMoreBtn = function getLoadMoreBtn() {
  var loadMoreBtn = document.querySelector('.js-load-more-btn');
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', function () {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', loadMoreBtn.dataset.href);
      xhr.send();
      xhr.onload = function() {
        if (xhr.status === 200) {
          var loadMoreTarget = document.querySelector(loadMoreBtn.dataset.target);
          if (loadMoreTarget) {
            var response = JSON.parse(xhr.response);console.log(response);
            loadMoreTarget.insertAdjacentHTML('beforeend', response.html);
            if (response.href) {
              loadMoreBtn.dataset.href = response.href;
            } else {
              loadMoreBtn.parentNode.removeChild(loadMoreBtn);
            }
          }
        }
      };
    });
  }
};

document.addEventListener('DOMContentLoaded', function () {
  getBurgerMenu();
  getMainPageSliders();
  getItemSliders();
  getActiveItem();
  getSalesSlider();
  getProductsList();
  getItemSlider();
  getItemsSlider();
  //getMainImage();
  getLoadMoreBtn();
});
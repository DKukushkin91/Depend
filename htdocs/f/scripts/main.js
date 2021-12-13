"use strict";

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

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
        });
      }
    });
  }
};

var getMainImage = function getMainImage() {
  if (document.querySelector('.js-main-img-wrap')) {
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
  }
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

var getPopups = function getPopups() {
  if (document.querySelector('.js-coupon-open') || document.querySelector('.js-comment-btn')) {
    var button = document.querySelector('.js-coupon-open');
    var commentBtn = document.querySelector('.js-comment-btn');
    var body = document.querySelector('body');
    var template = document.querySelector('.js-coupon-template').content.querySelector('.js-coupon-popup');
    var successTemplate = document.querySelector('.js-coupon-suc-template').content.querySelector('.js-coupon-popup');
    var commentTemplate = document.querySelector('.js-comment-template').content.querySelector('.js-comment-popup');

    var escPressHandler = function escPressHandler(evt) {
      if (evt.key === 'Escape') {
        evt.preventDefault();
        elementRemoveHandler();
      }
    };

    var elementRemoveHandler = function elementRemoveHandler() {
      var wrap = document.querySelector('.js-coupon-popup');
      var commentWrap = document.querySelector('.js-comment-popup');

      if (wrap || commentWrap) {
        wrap ? wrap.remove() : commentWrap.remove();
        document.removeEventListener('keydown', escPressHandler);
        body.classList.remove('lock-scroll--popup');
      }
    };

    var getElement = function getElement(temp) {
      var clone = temp.cloneNode(true);
      var closeBtn = clone.querySelector('.js-popup-close');
      var inputs = clone.querySelectorAll('.js-popup-input');

      if (clone.querySelector('.js-coupon-sbmt') || clone.querySelector('.js-comment-sbmt')) {
        var submitBtn = clone.querySelector('.js-coupon-sbmt') || clone.querySelector('.js-comment-sbmt');
        submitBtn.setAttribute('disabled', true);
        inputs.forEach(function (input) {
          input.addEventListener('input', function () {
            _toConsumableArray(inputs).filter(function (el) {
              if (el.checkValidity()) {
                submitBtn.removeAttribute('disabled');

                if (clone.querySelector('.js-coupon-sbmt')) {
                  submitBtn.addEventListener('click', getSuccess);
                }
              } else {
                submitBtn.setAttribute('disabled', true);
              }
            });
          });
        });
      }

      if (clone.querySelector('.js-coupon-link')) {
        var link = clone.querySelector('.js-coupon-link');
        link.addEventListener('click', elementRemoveHandler);
      }

      closeBtn.addEventListener('click', elementRemoveHandler);
      body.classList.add('lock-scroll--popup');
      return clone;
    };

    var appendElement = function appendElement(temp) {
      var fragment = document.createDocumentFragment();
      var element = getElement(temp);
      fragment.appendChild(element);
      document.addEventListener('keydown', escPressHandler);
      createElement(body, fragment);
    };

    var getSuccess = function getSuccess() {
      elementRemoveHandler();
      appendElement(successTemplate);
    };

    if (button) {
      button.addEventListener('click', function (evt) {
        evt.preventDefault();
        appendElement(template);
      });
    } else {
      commentBtn.addEventListener('click', function (evt) {
        evt.preventDefault();
        appendElement(commentTemplate);
      });
    }
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
  getMainImage();
  getPopups();
});
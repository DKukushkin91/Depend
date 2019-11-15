$(document).ready(function() {
  // Фильтр, раскрытие фильтра
  // $('.filter__label').click(function() {
  //     if ( $(this).hasClass('visible') ) {
  //         $(this).parent().removeClass('visible');
  //         $(this).removeClass('visible');
  //         $(this).children().removeClass('visible');
  //         $(this).next().hide(300);
  //     } else {
  //         $(this).parent().addClass('visible');
  //         $(this).addClass('visible');
  //         $(this).children().addClass('visible');
  //         $(this).next().show(300);
  //     }
  // });

  $('.js-subcats-click').click(function () {

    var data = {
      catId : $(this).data('id'),
      category : $(this).data('code').slice(0, -1),
      params : 'catId',
  };


    var code = $(this).data('code');

    $(".js-category-load").load('/local/components/depend/catalog.category/templates/.default/ajax.php', data, function () {
      history.replaceState({}, '', '/catalog/' + code);
      window.catalogCategoryConfig.category = code;
      var bannerText = $('.js-category-load h2').text();
      $('.banner-text h1').text(bannerText);
    });

  });

  if($('.catalog-list__item').length > 0) {
    $('.category__pagen').show();
  }
  else {
    $('.category__pagen').hide();
  }

  // Сортировка по цене, популярности, новинкам, рейтингу
  var click = 0;
  $('.js-catalog-set-sort').click(function() {
    $('.catbuttons__sortitem').removeClass('active');
    $(this).toggleClass('active');

    $('.catalog_sort-item').children().removeClass('up');
    $('.catalog_sort-item').children().removeClass('down');
    if (click == 0) {
      $(this).find('.checkbox-way').text('По убыванию цены');
      $(this).addClass('up');
      $(this).children().removeClass('down');
      $(this).children().addClass('up');
      $(this).attr('data-order', 'asc');
      click = 1;
    } else {
      $(this).find('.checkbox-way').text('По возрастанию цены');
      $(this).children().removeClass('up');
      $(this).children().addClass('down');
      $(this).attr('data-order', 'desc');
      click = 0;
    }

    //обновить список товаров
    var params = {
      sortby: $(this).attr('data-by'),
      sortorder: $(this).attr('data-order'),
      page: 1
    };

    window.catalogParams.page = 1;
    window.catalogParams.sortby = params.sortby;
    window.catalogParams.sortorder = params.sortorder;

    categoryLoadProducts(params);
  });


  $('.pagen__link').click(function(){
    $('.pagen__item').removeClass('pagen__item_current');
    $(this).addClass('pagen__item_current');

    //обновить список товаров
    var params = {
      sortby: '',
      sortorder: '',
      page: $('.js-pagen-page.pagen__item_current').data('page')
    };
    categoryLoadProducts(params);
  });

	$('.js-subcats-click').click(function() {
		$(this).addClass('active').siblings().removeClass('active');
	});


  //показать способы сортировки в мобильной версии
  $('.js-mobile-showsort').click(function(){
    $('.mobile-sort').toggleClass('active')
  });

  $('.mobile-filter__btn').click(function(e){
    e.preventDefault();
    $('.mobile-sort').removeClass('active');
    $('.filter').toggleClass('filter-active');
    $('.category__content-catalog').addClass('no-mobile');
    $('footer').addClass('no-mobile');
  });

  $('.mobile-close a').click(function(e){
    e.preventDefault();
    $('.filter').removeClass('filter-active');
    $('.category__content-catalog').removeClass('no-mobile');
    $('footer').removeClass('no-mobile');
  });


  $('.js-catalog-more').click(function() {
    window.catalogFilter.more();
  });
});




function categoryLoadProducts(params)
{
  params.action = 'catalog';
  params.category = window.catalogCategoryConfig.category;

  $.post(window.catalogCategoryConfig.ajaxPath, params, function(answer){
    $('.js-category-products-list').html(answer.html);
    // var scrolltop = 400;
    // var windowWidth = $(window).width();
    // if (windowWidth < 1280) {
    //   scrolltop = 400;
    // }
    // if (windowWidth < 1024) {
    //   scrolltop = 400;
    // }
    // if (windowWidth < 768) {
    //   scrolltop = 200;
    // }
    // $('html,body').animate({
    //   scrollTop: scrolltop
    // }, 300);

    //видимость кнопок
    if (answer.pages > 1) {
      $('.js-catalog-more').show();
    }
    else {
      $('.js-catalog-more').hide();
    }
  }, 'json');

}

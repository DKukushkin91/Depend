$(document).ready(function () {

	if ($().fancybox) {
		$('.fancy-image').fancybox();
	}

    $('.js-categoty-click').click(function () {
      $('.js-categoty-click').removeClass('active');
      $(this).addClass('active');
      var idx = $(this).index();
			$('.shops-tile').removeClass('active');
      $('.shops-tile').eq(idx - 1).addClass('active');
		});


		// $('.js-advice-click').click(function () {
     //  $('.js-advice-click').removeClass('current-rubric');
     //  $(this).addClass('current-rubric');
     //  var idx = $(this).index();
		// 	$('.advices-tile').removeClass('active');
     //  $('.advices-tile').eq(idx - 1).addClass('active');
		// });

    // $('.js-advice-all').click(function () {
			// $('.advices-tile').addClass('active');
		// });
		$('.js-advice-click').click(function () {

			var data = {
				catId : $(this).data('id'),
				category : $(this).data('code'),
				params : 'catId',
			};

			console.log(data);


			$(".js-load-advice").load('/local/templates/depend/components/bitrix/news.list/advices-list/ajax.php', data, function () {
			});
		});


	$('.tabs__item').on('click',function (e) {
        if ($(window).width() <= 690) {
        		if ($(this).hasClass('active')) {
        			$(this).removeAttr('href');
						}
            $(this).addClass('active').siblings().removeClass('active');
            $(this).closest('.tabs-inner').toggleClass('opened');
				}

    });

    $('.main-shops .tabs__item').click(function () {
            $(this).addClass('active').siblings().removeClass('active');
    });


    $('.message-checkboxes-item label').click(function () {
        $(this).toggleClass('checked');
    });

    $('.js-input-tel').mask('+7 (000) 000-00-00');

    // $('.submit-form-btn').magnificPopup({
    //     type: 'inline',
		//
    //     fixedContentPos: false,
    //     fixedBgPos: true,
		//
    //     overflowY: 'auto',
		//
    //     closeBtnInside: true,
    //     preloader: false,
		//
    //     midClick: true,
    //     removalDelay: 300,
    //     mainClass: 'my-mfp-zoom-in'
    // });

	$('#confid, #personal').click(function () {
		if ($('#confid').is(':checked') == true && $('#personal').is(':checked') == true) {
			$('.js-btn-send').removeClass('opacity');
		} else {
			$('.js-btn-send').addClass('opacity');
		}
	});

	if ($().mask) {
		$('.js-mask').mask('+7 (999) 999-99-99', {
			placeholder: '+7 (___) ___-__-__'
		});
	}

    $('.js-feedback-form').submit(function () {
      var $root = $(this);
      var data = {
        theme : $('.js-input-theme', $root).val(),
        name : $('.js-input-name', $root).val(),
        email : $('.js-input-email', $root).val(),
        phone : $('.js-input-phone', $root).val(),
        comment : $('.js-input-comment', $root).val()
      }

      $.post('/feedback/ajax.php', data, function (answer) {
        if (answer.ok == 1) {
					$.magnificPopup.open({
						items: {
							src: '#popup-message-sent'
						},
						type: 'inline',
						mainClass: 'my-mfp-zoom-in',
						    fixedContentPos: false,
						    fixedBgPos: true,

						    overflowY: 'auto',

						    closeBtnInside: true,
						    preloader: false,

						    midClick: true,
						    removalDelay: 300,
					});
        }
			});
			return false;
		});

    $('.popup__btn').click(function() {
        $(this).siblings('.mfp-close').click();
    })

    $('.js-popup-show').magnificPopup({
        type: 'inline',

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });

    $('.main-slider').slick({
        slidesToShow: 1,
        arrows: true,
				autoplay: true,
				autoplaySpeed: 10000,
    });

    $('.selector-button').click(function () {
        $('.selector-button').removeClass('current-photo');
        $(this).addClass('current-photo');
        var imgMedium = $(this).data('medium');
        $('.big-photo').find('img').attr('src', imgMedium);
        var imgLarge = $(this).data('large')
				$('.big-photo').attr('href', imgLarge);
    });
});
$(function(){
    $('.js-element-kh').hover(function(){
        var index = $(this).index();
        $('.js-element-kh-info:eq(' + index + ')').addClass('characteristics-info--hover');
    }, function(){
        var index = $(this).index();
        $('.js-element-kh-info:eq(' + index + ')').removeClass('characteristics-info--hover');
    });
});

$(document).ready(function () {
	$('.js-buy-item').magnificPopup({
		type: 'inline',

		fixedContentPos: true,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,

		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});
});
$(function(){
	$('.menu-burger').on('click', function(){
		if($('.search-mobile-window').attr('style')){
			$('.search-mobile-window').slideToggle(300);
			$('.search-mobile-window').removeAttr('style');
			$('.icon-search-mobile').removeClass("icon-search-invert");
		}
		$('.header-green').addClass("top-shadow");
		$('body').addClass('fixed');
		$('.menu').slideToggle(300, function(){
				if($(this).css('display') === 'none'){
					$(this).removeAttr('style');
					$('.header-green').removeClass("top-shadow");
					$('body').removeClass('fixed');
					}
        });
    });
});

$(function(){
	$('.icon-search-mobile').on('click', function(){
		if($('.menu').attr('style')){
			$('.menu').slideToggle(300);
			$('.menu').removeAttr('style');
		}
		$('.header-green').addClass("top-shadow");
		$(this).addClass("icon-search-invert");
		$('.search-mobile-window').slideToggle(300, function(){
			if($(this).css('display') === 'none'){
				$(this).removeAttr('style');
				$('.header-green').removeClass("top-shadow");
				$('.icon-search-mobile').removeClass("icon-search-invert");
            }
        });
    });
});

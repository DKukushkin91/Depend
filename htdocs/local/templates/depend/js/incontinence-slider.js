$(document).ready(function() {
    if ($(window).width() <= 690) {
        $('.current-tab').slick({
            accessibility: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            variableWidth: true,
            adaptiveHeight: true,
            autoPlay: true,
            centerMode: true,
            dots: true,
            zIndex: 0
        });
    }

    $('.rubric').click(function() {
        if ($(window).width() > 690) {
            $('.rubric').removeClass('current-rubric');
            $('.articles-row').removeClass('current-tab');
            $(this).addClass('current-rubric');
            $('.articles-row').eq($(this).index() - 1).addClass('current-tab');
        } else if ($('.rubricator').hasClass('rub-open')) {
            $('.rubric').removeClass('current-rubric');
            $('.current-tab').slick('unslick');
            $('.articles-row').removeClass('current-tab');
            $(this).addClass('current-rubric');
            $('.articles-row').eq($(this).index() - 1).addClass('current-tab');
            $('.rubricator').removeClass('rub-open');
            $('.current-tab').slick({
                accessibility: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                variableWidth: true,
                adaptiveHeight: true,
                autoPlay: true,
                centerMode: true,
                dots: true,
                zIndex: 0
            });
        } else {
            $('.rubricator').addClass('rub-open');
        }
    });

    $(window).resize(function() {
        if ($(window).width() > 690 && $('.current-tab').hasClass('slick-initialized')) {
            $('.current-tab').slick('unslick');
        }
        if ($(window).width() <= 690 && !$('.current-tab').hasClass('slick-initialized')) {
            $('.current-tab').slick({
                accessibility: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                variableWidth: true,
                adaptiveHeight: true,
                autoPlay: true,
                centerMode: true,
                dots: true,
                zIndex: 0
            });
        }
    });

    $('body').click(function(item) {
        if (!$(item.target).hasClass('rubric') && $('.rubricator').hasClass('rub-open')) {
            console.log($(item.target).hasClass('rubric'));
            $('.rubricator').removeClass('rub-open');
        }
    });
});
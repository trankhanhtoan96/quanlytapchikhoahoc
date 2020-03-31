$(document).ready(function () {

    $('.controller-tabs-popular').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: '<img src="' + base_url + '/asokalaw/assets/media/landingpage/news/right.svg" class="nextArrowBtnNews news">',
        prevArrow: '<img src="' + base_url + '/asokalaw/assets/media/landingpage/news/left.svg" class="prevArrowBtnNews news">'

    });
    $('.controller-tabs-popular').on('beforeChange', function (event, slick, currentSlide, nextSlide) {

        if (currentSlide == 7 && nextSlide == 0) {
            var activeEle = $('.controller-tabs-popular div[data-slick-index="' + 1 + '"]');
            var dataTarget = $('.controller-tabs-popular div[data-slick-index="' + 1 + '"]').data('target');
        } else {
            if (currentSlide < nextSlide) {
                var activeEle = $('.controller-tabs-popular div[data-slick-index="' + (nextSlide + 1) + '"]');
                var dataTarget = $('.controller-tabs-popular div[data-slick-index="' + (nextSlide + 1) + '"]').data('target');
            } else {
                var activeEle = $('.controller-tabs-popular div[data-slick-index="' + (currentSlide) + '"]');
                var dataTarget = $('.controller-tabs-popular div[data-slick-index="' + (currentSlide) + '"]').data('target');
            }
        }


        $('.controller-tabs-popular div').removeClass('active');
        activeEle.addClass('active');

        $('div.tab-pane-business').css("display", "none");
        $(dataTarget + '.tab-pane-business').css('display', "flex");
    });
    $('.feedback-slide-pltx').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: false,
        prevArrow: false,
        customPaging: function (slider, i) {
            return '<i class="fa fa-circle"></i>';
        },
        focusOnSelect: true
    });
    $('.slide-support-pltx').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: '<img src="' + base_url + '/asokalaw/assets/media/landingpage/news/right.svg" class="nextArrowBtnVideo news">',
        prevArrow: '<img src="' + base_url + '/asokalaw/assets/media/landingpage/news/left.svg" class="prevArrowBtnVideo news">'

    });
    $('.controller-tabs ul li button.btn-tab').click(function () {
        $('.controller-tabs ul li button.btn-tab').each(function (index) {
            $(this).removeClass('active');
        })
        $(this).addClass('active');
        var pos = $(this).data('target');
        $('div.tab-pane').each(function (index) {
            $(this).css("display", "none");
        });
        $(pos + '.tab-pane').css("display", "flex");
    })
    $('.btn-collapse').click(function () {
        if ($(this).closest('div').find('.active').length != 0) {
            $(this).removeClass('active');
            $(this).find('i').removeClass('fa-caret-up');
            $(this).find('i').addClass('fa-caret-down');
        } else {
            $(this).addClass('active');
            $(this).find('i').removeClass('fa-caret-down');
            $(this).find('i').addClass('fa-caret-up');
        }

    })

});
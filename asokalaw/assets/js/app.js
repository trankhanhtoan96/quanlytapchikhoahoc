$(document).ready(function () {
    $('.list-slide').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: '<img src="' + base_url + '/asokalaw/assets/media/landingpage/news/right.svg" class="nextArrowBtnNews news">',
        prevArrow: '<img src="' + base_url + '/asokalaw/assets/media/landingpage/news/left.svg" class="prevArrowBtnNews news">',
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]

    });
    $('.list-slide-video').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: '<img src="' + base_url + '/asokalaw/assets/media/landingpage/news/right.svg" class="nextArrowBtnNews news">',
        prevArrow: '<img src="' + base_url + '/asokalaw/assets/media/landingpage/news/left.svg" class="prevArrowBtnNews news">',
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.list-slide-partner').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: '<img src="' + base_url + '/asokalaw/assets/media/landingpage/news/right.svg" class="nextArrowBtnNews news">',
        prevArrow: '<img src="' + base_url + '/asokalaw/assets/media/landingpage/news/left.svg" class="prevArrowBtnNews news">',
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });
    $('.list-slide-team').slick({
        dots: true,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: false,
        prevArrow: false,
        customPaging: function (slider, i) {
            return '<i class="far fa-circle"></i>';
        },
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.slide-asoka-des').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: false,
        prevArrow: false,
        focusOnSelect: true,
        customPaging: function (slider, i) {
            return '<i class="far fa-circle"></i>';
        },
    });

    var lastScrollTop = 0;
    $(window).scroll(function (event) {
        var st = $(this).scrollTop();
        if (st > lastScrollTop) {
            if (st > 37) {
                $('.navbar-custom').addClass('nav-fixed').removeClass('container', 2000, "swing");
            }

        } else {
            if (st < 37) {
                $('.navbar-custom').addClass('container').removeClass('nav-fixed', 2000, "swing");
            }
        }
        lastScrollTop = st;
    });
});

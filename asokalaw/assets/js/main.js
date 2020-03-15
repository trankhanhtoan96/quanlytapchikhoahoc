$(document).ready(function(){
    $('.list-slide').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: '<img src="'+base_url+'/asokalaw/assets/media/news/right.svg" class="nextArrowBtnNews news">',
        prevArrow: '<img src="'+base_url+'/asokalaw/assets/media/news/left.svg" class="prevArrowBtnNews news">'

    });
    $('.list-slide-video').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: '<img src="'+base_url+'/asokalaw/assets/media/news/right.svg" class="nextArrowBtnVideo news">',
        prevArrow: '<img src="'+base_url+'/asokalaw/assets/media/news/left.svg" class="prevArrowBtnVideo news">'

    });
    $('.list-slide-partner').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: '<img src="'+base_url+'/asokalaw/assets/media/partner/right.svg" class="nextArrowBtn arrows">',
        prevArrow: '<img src="'+base_url+'/asokalaw/assets/media/partner/left.svg" class="prevArrowBtn arrows">'
    });
    $('.list-slide-team').slick({
        dots:true,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: false,
        prevArrow: false,
        customPaging : function(slider, i) {
            return '<i class="fa fa-circle"></i>';
        },
        focusOnSelect: true
    });
    $('.slide-asoka-des').slick({
        dots:true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow: false,
        prevArrow: false,
        customPaging : function(slider, i) {
            return '<i class="fa fa-circle"></i>';
        },
        focusOnSelect: true
    });
});

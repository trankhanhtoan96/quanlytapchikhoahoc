$(document).ready(function(){
    $('.list-slide').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left slick-arrow" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next"><i class="fa fa-angle-right slick-arrow" aria-hidden="true"></i></div>'
    });
    $('.list-slide-partner').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left slick-arrow" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next"><i class="fa fa-angle-right slick-arrow" aria-hidden="true"></i></div>'
    });
    $('.list-slide-team').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left slick-arrow" aria-hidden="true"></i></div>',
        nextArrow: '<div class="slick-next"><i class="fa fa-angle-right slick-arrow" aria-hidden="true"></i></div>'
    });
});

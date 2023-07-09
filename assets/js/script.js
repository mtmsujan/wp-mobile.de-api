jQuery(document).ready(function ($) {
  $(".slick-carousel").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow: '<button type="button" class="slick-prev">&#10094;</button>',
    nextArrow: '<button type="button" class="slick-next">&#10095;</button>',
  });
});

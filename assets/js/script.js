$(document).ready(function () {
  $("#image-gallery").lightSlider({
    gallery: true,
    item: 1,
    thumbItem: 3,
    slideMargin: 0,
    speed: 1000,
    pause: 4000,
    auto: true,
    loop: true,
    onSliderLoad: function () {
      $("#image-gallery").removeClass("cS-hidden");
    },
  });
});

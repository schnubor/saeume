$(document).ready(function () {
  $('.js-slick').slick({
    dots: true,
    arrows: false,
    adaptiveHeight: true,
    mobileFirst: true,
  });

  $('.js-slick-multiple').slick({
    dots: false,
    arrows: false,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3
  });

  $('.navigation-wrapper .bars').click(function () {
    toggleNav();
  })

  $('.nav-icon1').click(function () {
    $(this).toggleClass('open');
  });

  $('.js-next').click(function () {
    $('.js-slick-multiple').slick('slickNext');
  })

  $('.js-prev').click(function () {
    $('.js-slick-multiple').slick('slickPrev');
  })
});

function toggleNav() {
  $('.nav-overlay').toggleClass('visible');
}

$('.js-next').click(function () {
  $('.js-slick-multiple').slick('slickNext');
})

$('.js-prev').click(function () {
  $('.js-slick-multiple').slick('slickPrev');
})
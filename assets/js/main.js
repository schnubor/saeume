$(document).ready(function () {
  $('.js-slick').slick({
    dots: true,
    arrows: false,
    adaptiveHeight: true,
    mobileFirst: true,
  });

  $('.navigation-wrapper .bars').click(function () {
    showNav();
  })

  $('.js-close').click(function () {
    hideNav();
  })
});

function showNav() {
  $('.nav-overlay').css("display", "flex").hide().fadeIn();
}

function hideNav() {
  $('.nav-overlay').fadeOut();
}
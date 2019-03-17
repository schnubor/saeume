$(document).ready(function () {
  $('.js-slick').slick({
    dots: true,
    arrows: false,
    adaptiveHeight: true,
    mobileFirst: true,
  });

  $('.js-slick-multiple').slick({
    dots: false,
    arrows: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3
  });

  // $('.navigation-wrapper .bars').click(function () {
  //   showNav();
  // })

  // $('.js-close').click(function () {
  //   hideNav();
  // })

  $('.nav-icon1').click(function(){
		$(this).toggleClass('open');
	});
});

function showNav() {
  $('.nav-overlay').css("display", "flex").hide().fadeIn();
}

function hideNav() {
  $('.nav-overlay').fadeOut();
}
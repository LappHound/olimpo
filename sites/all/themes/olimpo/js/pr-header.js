$('.js__main-menu__profile').click(function(event) {
  event.preventDefault();
  $('.user__menu--dropdown').addClass('user__menu--dropdown--open');
  $('.js__login__menu__closer').css('display', 'block');
  $('.user__menu--dropdown').removeClass('user__menu--dropdown--open');
  $('.user__menu--dropdown').css('display', 'block');
  $('.js__main-search--02').css('display', 'none');
});

$('.js__login__menu__closer').click(function(event) {
  event.preventDefault();
  $('.user__menu--dropdown').removeClass('user__menu--dropdown--open');
  $('.js__login__menu__closer').css('display', 'none');
  $('.user__menu--dropdown').css('display', 'none');
});

if (Olimpo === undefined) {
  var Olimpo = {};
}

$(document).ready(function() {
  $('.rwd-btn--menu-toggle').click(function() {
    $('#container').toggleClass('active');
    $('.rwd__main-header').toggleClass('active');
    $('#admin-menu').addClass('mobile-menu-active');
  });
});

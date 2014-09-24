if (Olimpo === undefined) {
  var Olimpo = {};
}

if (Olimpo.mobileMenu === undefined) {
  Olimpo.mobileMenu = {
    scroll_value: 0
  };
  Olimpo.mobileSidebar = {};
}

Olimpo.mobileMenu.updateScroll = function(value) {
  this.scroll_value = value;
};

Olimpo.mobileMenu.collapse = function() {
  $('.rwd__main-header').addClass('collapsed');
};

Olimpo.mobileMenu.uncollapse = function() {
  $('.rwd__main-header').removeClass('collapsed');
};

Olimpo.mobileMenu.scrollsUp = function() {
  return $(document).scrollTop() < this.scroll_value;
};

Olimpo.mobileMenu.getPixelsScrolledUp = function() {
  return this.scroll_value - $(document).scrollTop();
};

Olimpo.mobileMenu.scrollsDown = function() {
  return $(document).scrollTop() > this.scroll_value;
};

Olimpo.mobileMenu.getCurrentPosition = function() {
  return $(document).scrollTop();
};

Olimpo.mobileMenu.offsetTop = function() {
  return $('.rwd__main-header').offset().top;
};

Olimpo.mobileMenu.initialPosition = function () {
  return $('#container--wrapper').offset().top;
};

Olimpo.mobileMenu.getInitialPositionToAct = function() {
  var initial_position = 200;
  var modifier = $('.takeover--ribbon');
  if (modifier.length > 0) {
    initial_position += modifier.height();
  }
  return initial_position;
};

Olimpo.mobileSidebar.isUncollapsed = function() {
  return $('#container').hasClass('active');
};

Olimpo.mobileSidebar.isCollapsed = function() {
  return !Olimpo.mobileSidebar.isUncollapsed();
};

Olimpo.mobileSidebar.collapse = function() {
  $('#container').removeClass('active');
  $('.rwd__main-header').removeClass('active');
  $('#admin-menu').removeClass('mobile-menu-active');
};

Olimpo.mobileSidebar.toggle = function() {
  $('#container').toggleClass('active');
  $('.rwd__main-header').toggleClass('active');
  $('#admin-menu').addClass('mobile-menu-active');
};

$(document).ready(function() {
  $(document).scroll(function() {
    var scroll_top_value = $(document).scrollTop();
    if (window.innerWidth <= 750) {
      if (Olimpo.mobileSidebar.isCollapsed()) {
        if (scroll_top_value >= Olimpo.mobileMenu.initialPosition()) {
          $('.rwd__main-header').addClass('fixed');
          $('#container--wrapper').addClass('menu--fixed');
        }
        else {
          $('.rwd__main-header').removeClass('fixed');
          $('#container--wrapper').removeClass('menu--fixed');
        }
        if (Olimpo.mobileMenu.scrollsDown() && scroll_top_value > Olimpo.mobileMenu.getInitialPositionToAct()) {
          Olimpo.mobileSidebar.collapse();
          Olimpo.mobileMenu.collapse();
        }
        if (Olimpo.mobileMenu.scrollsUp() && Olimpo.mobileMenu.getPixelsScrolledUp() >= 20) {
          Olimpo.mobileMenu.uncollapse();
        }
      }
    }
    Olimpo.mobileMenu.updateScroll(scroll_top_value);
  });

  $(window).resize(function() {
    if (window.innerWidth > 750 && Olimpo.mobileSidebar.isUncollapsed()) {
      Olimpo.mobileSidebar.collapse();
    }
  });

  $('.rwd-btn--menu-toggle').click(function() {
    Olimpo.mobileSidebar.toggle();
  });
});

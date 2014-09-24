if (PokerRed === undefined) {
  var PokerRed = {};
}

if (PokerRed.mobileMenu === undefined) {
  PokerRed.mobileMenu = {
    scroll_value: 0
  };
  PokerRed.mobileSidebar = {};
}

PokerRed.mobileMenu.updateScroll = function(value) {
  this.scroll_value = value;
};

PokerRed.mobileMenu.collapse = function() {
  $('.rwd__main-header').addClass('collapsed');
};

PokerRed.mobileMenu.uncollapse = function() {
  $('.rwd__main-header').removeClass('collapsed');
};

PokerRed.mobileMenu.scrollsUp = function() {
  return $(document).scrollTop() < this.scroll_value;
};

PokerRed.mobileMenu.getPixelsScrolledUp = function() {
  return this.scroll_value - $(document).scrollTop();
};

PokerRed.mobileMenu.scrollsDown = function() {
  return $(document).scrollTop() > this.scroll_value;
};

PokerRed.mobileMenu.getCurrentPosition = function() {
  return $(document).scrollTop();
};

PokerRed.mobileMenu.offsetTop = function() {
  return $('.rwd__main-header').offset().top;
};

PokerRed.mobileMenu.initialPosition = function () {
  return $('#container--wrapper').offset().top;
};

PokerRed.mobileMenu.getInitialPositionToAct = function() {
  var initial_position = 200;
  var modifier = $('.takeover--ribbon');
  if (modifier.length > 0) {
    initial_position += modifier.height();
  }
  return initial_position;
};

PokerRed.mobileSidebar.isUncollapsed = function() {
  return $('#container').hasClass('active');
};

PokerRed.mobileSidebar.isCollapsed = function() {
  return !PokerRed.mobileSidebar.isUncollapsed();
};

PokerRed.mobileSidebar.collapse = function() {
  $('#container').removeClass('active');
  $('.rwd__main-header').removeClass('active');
  $('#admin-menu').removeClass('mobile-menu-active');
};

PokerRed.mobileSidebar.toggle = function() {
  $('#container').toggleClass('active');
  $('.rwd__main-header').toggleClass('active');
  $('#admin-menu').addClass('mobile-menu-active');
};

$(document).ready(function() {
  $(document).scroll(function() {
    var scroll_top_value = $(document).scrollTop();
    if (window.innerWidth <= 750) {
      if (PokerRed.mobileSidebar.isCollapsed()) {
        if (scroll_top_value >= PokerRed.mobileMenu.initialPosition()) {
          $('.rwd__main-header').addClass('fixed');
          $('#container--wrapper').addClass('menu--fixed');
        }
        else {
          $('.rwd__main-header').removeClass('fixed');
          $('#container--wrapper').removeClass('menu--fixed');
        }
        if (PokerRed.mobileMenu.scrollsDown() && scroll_top_value > PokerRed.mobileMenu.getInitialPositionToAct()) {
          PokerRed.mobileSidebar.collapse();
          PokerRed.mobileMenu.collapse();
        }
        if (PokerRed.mobileMenu.scrollsUp() && PokerRed.mobileMenu.getPixelsScrolledUp() >= 20) {
          PokerRed.mobileMenu.uncollapse();
        }
      }
    }
    PokerRed.mobileMenu.updateScroll(scroll_top_value);
  });

  $(window).resize(function() {
    if (window.innerWidth > 750 && PokerRed.mobileSidebar.isUncollapsed()) {
      PokerRed.mobileSidebar.collapse();
    }
  });

  $('.rwd-btn--menu-toggle').click(function() {   
    PokerRed.mobileSidebar.toggle();
  });
});

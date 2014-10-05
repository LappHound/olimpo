if (Drupal.jsEnabled) {
  if (typeof Olimpo == 'undefined') {
    var Olimpo = {};
  }

  if (Olimpo.storedWindowWidth === undefined) {
    Olimpo.storedWindowWidth = window.innerWidth;
  }

  Olimpo.thisWidthIsOptimizedToDisplayTwoColumns = function(width) {
    return width >= 750;
  }

  Olimpo.optimizeColumns = function() {
    Olimpo.storedWindowWidth = window.innerWidth;
    if (Olimpo.thisWidthIsOptimizedToDisplayTwoColumns(Olimpo.storedWindowWidth)) {
      $('.left_news').detach().appendTo('#left_news');
      $('.right_news').detach().appendTo('#right_news');
    }
    else {
      var left_news = $('.left_news');
      var right_news = $('.right_news');
      $('#left_news').remove();
      $('#right_news').remove();
      for (var i = 0; i <= left_news.length; i++) {
        $('#all_news').appendTo(news[i].html());
      }
      for (var j = 0; j <= right_news.length; j++) {
        $('#all_news').appendTo(news[j].html());
      }
    }
  }

  $(document).ready(function() {
    Olimpo.optimizeColumns();
    $(window).resize(function() {
      var before_resize = Olimpo.thisWidthIsOptimizedToDisplayTwoColumns(Olimpo.storedWindowWidth);
      var after_resize  = Olimpo.thisWidthIsOptimizedToDisplayTwoColumns(window.innerWidth);

      if (before_resize != after_resize) {
        Olimpo.optimizeColumns();
      }
    });
  });
}

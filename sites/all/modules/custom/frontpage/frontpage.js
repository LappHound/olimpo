if (typeof Olimpo == 'undefined') {
  var Olimpo = {};
}

if (Olimpo.storedWindowWidth === undefined) {
  Olimpo.storedWindowWidth = window.innerWidth;
}

Olimpo.thisWidthIsOptimizedToDisplayTwoColumns = function(width) {
  return width >= 750;
};

Olimpo.orderByDataCreation = function (a, b) {
  return +b.dataset.creation - +a.dataset.creation;
};

Olimpo.createColumns = function () {
  var container = document.getElementById('all_news');
  var div_left_news = document.createElement('div');
  var div_right_news = document.createElement('div');

  div_left_news.className = 'gg-62pc gg-column';
  div_right_news.className = 'gg-38pc gg-column';

  div_left_news.id = 'left_news';
  div_right_news.id = 'right_news';

  container.appendChild(div_left_news);
  container.appendChild(div_right_news);
};

Olimpo.optimizeColumns = function() {
  Olimpo.storedWindowWidth = window.innerWidth;
  if (Olimpo.thisWidthIsOptimizedToDisplayTwoColumns(Olimpo.storedWindowWidth)) {
    var left_news = $('.left_news').toArray();
    var right_news = $('.right_news').toArray();

    left_news.sort(Olimpo.orderByDataCreation);
    right_news.sort(Olimpo.orderByDataCreation);

    if ($('#left_news').length < 1 && $('#right_news').length < 1) {
      Olimpo.createColumns();
    }

    $(left_news).detach().appendTo('#left_news');
    $(right_news).detach().appendTo('#right_news');
  }
  else {
    var left_news = $('.left_news').toArray();
    var right_news = $('.right_news').toArray();

    var news = left_news.concat(right_news);
    news.sort(Olimpo.orderByDataCreation);

    $(news).appendTo('#all_news');

    $('#left_news').remove();
    $('#right_news').remove();
  }
};

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

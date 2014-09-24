if (PokerRed === undefined) {
  var PokerRed = {}
}

if (PokerRed.Pager === undefined) {
  PokerRed.Pager = {}
}

PokerRed.Pager.prepare_pager = function() {
  PokerRed.Pager.fix_pager_size();
  PokerRed.Pager.toogle_pager();
  PokerRed.Pager.load_pager();
  PokerRed.Pager.change_pager();
};

PokerRed.Pager.fix_pager_size = function() {
  var list = $('.select.select_pager > ul');
  var pager_position = $('.select.select_pager').offset();
  var footer_position = $('footer.main-footer').offset();


  if ((footer_position.top - pager_position.top) < 200) {
    var listItems = list.children('li');

    list.addClass('at--Bottom');
    list.append(listItems.get().reverse());
  }
};

PokerRed.Pager.toogle_pager = function() {
  $('.select_pager .label a').click(function(event) {
    event.preventDefault();
    
    var list = $(this).parent('p').siblings('ul');
    list.toggleClass('hidden');

    if (list.hasClass('at--Bottom')) {
      var scroll_height = list[0].scrollHeight;
      list.scrollTop(scroll_height);
    }
  });
  $(document).mouseup(function(event) {
    var container = $('.select_pager > ul');

    if (!container.is(event.target) && container.has(event.target).length === 0) {
      container.addClass('hidden');
    }
  });
};

PokerRed.Pager.change_pager = function() {
  $('.page_select').change(function() {
    if (this.selectedIndex > 0) {
      location.replace(location.pathname + '?' + (this.value));
    }
    else {
      var query = $('.page_select').val();
      location.replace(location.pathname + (query.length < 2 ? '' : '?' + query));
    }
  });
};

PokerRed.Pager.load_pager = function() {
  if ($('.page_select').length > 0) {
    var value = (location.search.match(/page=(\d+)/) || [, 0])[1];
    if ($('.page_select')[0].length < value) {
      value = $('.page_select')[0].length;
    }
    $('.page_select').each(function() {
      this.selectedIndex = parseInt(value);
    });
  }
};

$(document).ready(function() {
  if ($('.select.select_pager').length > 0) {
    PokerRed.Pager.prepare_pager();
  }
});

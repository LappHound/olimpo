if (Olimpo === undefined) {
  var Olimpo = {};
}

if (Olimpo.TabsBlock === undefined) {
  Olimpo.TabsBlock = {};
}

Olimpo.TabsBlock.devicePrefersMobileTabs = function () {
  return window.innerWidth <= 750;
};

Olimpo.TabsBlock.slideTab = function (switcher_element) {
  var block_identifier = $(switcher_element).parent().attr('data-block-identifier');
  var tab_wrapper = Olimpo.TabsBlock.getTabWrapper(block_identifier);
  var tab_identifier = Olimpo.TabsBlock.getNextTab(tab_wrapper, switcher_element);
  var tab = Olimpo.TabsBlock.getTab(block_identifier, tab_identifier);
  var content = Olimpo.TabsBlock.getContent(block_identifier, tab_identifier);
  var content_wrapper = Olimpo.TabsBlock.getContentWrapper(block_identifier);

  Olimpo.TabsBlock.slideElement(tab_wrapper, tab_identifier);
  Olimpo.TabsBlock.slideElement(content_wrapper, tab_identifier);
  Olimpo.TabsBlock.resetSwitchers(block_identifier, tab_wrapper);
};

Olimpo.TabsBlock.selectTab = function (selector_element) {
  var block_identifier = $($(selector_element).parents('div')[0]).attr('data-block-identifier');
  var tab_identifier = $(selector_element).attr('data-tab');
  var tab = Olimpo.TabsBlock.getTab(block_identifier, tab_identifier);
  var tab_wrapper = Olimpo.TabsBlock.getTabWrapper(block_identifier);
  var content = Olimpo.TabsBlock.getContent(block_identifier, tab_identifier);
  var content_wrapper = Olimpo.TabsBlock.getContentWrapper(block_identifier);

  Olimpo.TabsBlock.selectNewTab(tab_identifier, tab, tab_wrapper);
  Olimpo.TabsBlock.selectNewContent(tab_identifier, content, content_wrapper);
};

Olimpo.TabsBlock.getTabWrapper = function (block_identifier) {
  return document.getElementById("tab__" + block_identifier);
};

Olimpo.TabsBlock.getContentWrapper = function (block_identifier) {
  return document.getElementById("tab_content__" + block_identifier);
};

Olimpo.TabsBlock.getTab = function (block_identifier, tab_identifier) {
  return document.getElementById("tab__" + block_identifier + "_" + tab_identifier);
};

Olimpo.TabsBlock.getContent = function (block_identifier, tab_identifier) {
  return document.getElementById("tab_content__" + block_identifier + "_" + tab_identifier);
};

Olimpo.TabsBlock.getNextTab = function (tab_wrapper, switcher_element) {
  var tab_wrapper_object = $(tab_wrapper);
  var current_tab = $(tab_wrapper).attr('data-tab-identifier');
  var next_tab = current_tab;

  if ($(switcher_element).hasClass('btn--tab-switch_next')) {
    next_tab++;
  }
  else {
    next_tab--;
  }
  return next_tab;
};

Olimpo.TabsBlock.slideElement = function (wrapper, next_element) {
  var wrapper_object = $(wrapper);

  wrapper_object.children('li')[0].style.marginLeft = "-" + (next_element * 100) + "%";
  wrapper_object.attr('data-tab-identifier', next_element);
};

Olimpo.TabsBlock.selectNewTab = function (tab_identifier, tab, wrapper) {
  var wrapper_object = $(wrapper);
  var tab_object = $(tab);

  wrapper_object.children('li').children('a').removeClass('active');
  wrapper_object.attr('data-tab-identifier', tab_identifier);
  tab_object.addClass('active');
  tab_object.show();
};

Olimpo.TabsBlock.selectNewContent = function (tab_identifier, content, wrapper) {
  var wrapper_object = $(wrapper);
  var content_object = $(content);

  wrapper_object.children('li').hide().removeClass('active');
  wrapper_object.attr('data-tab-identifier', tab_identifier);
  content_object.addClass('active');
  content_object.show();
};

Olimpo.TabsBlock.resetSwitchers = function (block_identifier, tab_wrapper) {
  var wrapper_object = $(tab_wrapper);
  var tab_identifier = wrapper_object.attr('data-tab-identifier');
  $('[data-block-identifier=' + block_identifier + '] a.btn--tab-switch').removeClass('btn--tab-switch--disabled');

  if (tab_identifier == 0) {
    $('[data-block-identifier=' + block_identifier + '] a.btn--tab-switch_prev').addClass('btn--tab-switch--disabled');
  }
  else {
    var total_tabs = wrapper_object.children('li').length;
    if (tab_identifier >= (total_tabs - 1)) {
      $('[data-block-identifier=' + block_identifier + '] a.btn--tab-switch_next').addClass('btn--tab-switch--disabled');
    }
  }
};

Olimpo.TabsBlock.showInitialTab = function() {
  var i;
  var tabs_blocks = $('div.tabs-mobified--wrapper');
  for (i = 0; i < tabs_blocks.length; i++) {
    var tabs_block = tabs_blocks[i];
    var block_identifier = $(tabs_block).attr('data-block-identifier');
    var tab_wrapper = Olimpo.TabsBlock.getTabWrapper(block_identifier);
    var tab_identifier = $(tab_wrapper).attr('data-tab-identifier');
    var content_wrapper = Olimpo.TabsBlock.getContentWrapper(block_identifier);

    if (Olimpo.TabsBlock.devicePrefersMobileTabs()) {
      Olimpo.TabsBlock.slideElement(tab_wrapper, tab_identifier);
      Olimpo.TabsBlock.slideElement(content_wrapper, tab_identifier);
      Olimpo.TabsBlock.resetSwitchers(block_identifier, tab_wrapper);
    }
    else {
      var tab = Olimpo.TabsBlock.getTab(block_identifier, tab_identifier);
      var content = Olimpo.TabsBlock.getContent(block_identifier, tab_identifier);

      Olimpo.TabsBlock.selectNewTab(tab_identifier, tab, tab_wrapper);
      Olimpo.TabsBlock.selectNewContent(tab_identifier, content, content_wrapper);
    }
  }
};

$(document).ready(function () {
  Olimpo.TabsBlock.showInitialTab();
  if (Olimpo.TabsBlock.devicePrefersMobileTabs()) {
    $('a.btn--tab-switch').click(function (event) {
      if (!$(this).hasClass('btn--tab-switch--disabled')) {
        Olimpo.TabsBlock.slideTab(this);
      }
      event.preventDefault();
    });
    $('ul.tabs > li > a.tab').click(function (event) {
      event.preventDefault();
    });
  }
  else {
    $('a.btn--tab-switch').hide();
    $('ul.tabs').parent('div').removeClass('tabs-mobified--wrapper');
    $('ul.tabs > li > a.tab').click(function (event) {
      if (!$(this).hasClass('active')) {
        Olimpo.TabsBlock.selectTab(this);
      }
      event.preventDefault();
    });
  }
});

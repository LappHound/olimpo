if (typeof PokerRed == "undefined") {
  var PokerRed = {};
}

PokerRed.devicr = function() {
  var device = new DevicrDevice(categorizr(), new ScreenDevice(window));
  var selector = new DevicrSourceSelector(device, new DevicrSourceFinder(device));
  var devicr = new Devicr(selector);
  $('img.devicr').each(function() {
    devicr.adapt(new DevicrElement(this));
  });
}

PokerRed.streamr = function() {
  var device = new DevicrDevice(categorizr(), new ScreenDevice(window));
  var selector = new StreamrSourceSelector(device, new DevicrSourceFinder(device));
  var devicr = new Devicr(selector);
  $('img.streamr').each(function() {
    devicr.adapt(new DevicrElement(this));
  });
}

PokerRed.backgroundr = function() {
  var device = new DevicrDevice(categorizr(), new ScreenDevice(window));
  var selector = new DevicrSourceSelector(device, new DevicrSourceFinder(device));
  var backgroundr = new Backgroundr(selector);
  $('.backgroundr').each(function() {
    backgroundr.adapt(new DevicrElement(this));
  });
}

PokerRed.ribbonr = function() {
  var device = new DevicrDevice(categorizr(), new ScreenDevice(window));
  var selector = new RibbonSourceSelector(device, new DevicrSourceFinder(device));
  var backgroundr = new Backgroundr(selector);
  $('.ribbonr').each(function() {
    backgroundr.adapt(new DevicrElement(this));
  });
}

$(document).ready(function() {
  if (typeof DevicrDevice != "undefined") {
    PokerRed.devicr();
    PokerRed.streamr();
    PokerRed.backgroundr();
    PokerRed.ribbonr();
  }

  $('.js__block--streaming__close').click(function() {
    $('.block--streaming').remove();
  });
  $('.js__block--streaming__launch').click(function() {
    var live_report_id = $(this).attr('data-live-report');
    var title = $(this).attr('data-title');
    //window.open(live_report_id, "EPT Gran Final 2014 Streaming", "width=650,height=360,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no");
    window.open("http://poker-red.com/sites/all/themes/poker_red3/pages/streaming-popup.html", "EPT Gran Final 2014 Streaming", "width=650,height=360,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no");
    $('.block--streaming').remove();
  });

  $('input.main-search--03__search').focus(function() {
    $('input.main-search--03__submit').addClass('input-has-focus');
  });

  $('input.main-search--03__search').blur(function() {
    $('input.main-search--03__submit').removeClass('input-has-focus');
  });

  var url = new String(window.location)
    var idFeed = url.substring(url.lastIndexOf('#') + 1)
    if (idFeed.match("^" + "title_") == "title_") {
      PokerRed.expandFeed($("#" + idFeed).parents('article').find('a.hiddenFeed'));
    }

  $('div.hide-comment').hide();

  $('a.hiddenComment').click(function() {
    if ($(this).hasClass('expanded')) {
      $(this).next('div.hide-comment').slideUp();
      $(this).text(Drupal.t('Show comment'));
      $(this).removeClass('expanded');
    }
    else {
      $(this).next('div.hide-comment').slideDown();
      $(this).text(Drupal.t('Hide comment'));
      $(this).addClass('expanded');
    }
  return false;
  });

  $('a.hiddenFeed').click(function() {
    PokerRed.expandFeed(this)
    return false;
  });
  $('a.feedUnpublish').click(function() {
    id = $(this).attr('id');
    status = $(this).attr('status');
    feedUnpublish(id, status);
    return false;
  });

});

PokerRed.expandFeed = function(element) {
  if (!$(element).hasClass('expanded')) {
    $(element).prev('div.hide-feed-teaser').hide();
    $(element).next('div.hide-feed').slideDown();
    $(element).text(Drupal.t(''));
    $(element).removeClass('expanded');
  }
  return false;
}
/**
 * Ajax call to unpublish a feed
 *
 */
function feedUnpublish(id, status) {
  $.getJSON('/aggregator/unpublish', {id: id, status: status}, unpublishJsonResult);
}

/**
 * Show results
 */
function unpublishJsonResult(json, success) {
  if (json.success) {
    if ($('#' + id).parent('article').hasClass('unpublish')) {
      $('#' + id).parent('article').removeClass('unpublish');
      $('#' + id).text(Drupal.t('Unpublish'));
    }
    else {
      $('#' + id).parent('article').addClass('unpublish');
      $('#' + id).text(Drupal.t('Publish'));
    }
  }
}

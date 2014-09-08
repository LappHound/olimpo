
/**
 * Hides / shows fields depending on actual form selections
 */
function epAnnouncesCheckDisplay() {
  //enable/disable forum select
  if ($('#epann_publish').attr('checked')) {
    $('#epann_fid').attr('disabled', '');
    $('#epann_fid2').attr('disabled', '');
  }
  else {
    $('#epann_fid').attr('disabled', 'disabled');
    $('#epann_fid2').attr('disabled', 'disabled');
  }
  //show/hide whisper options
  if ($('#epann_whisper').attr('checked')){
    $('#epann_wop').show();
    //if send whisper is on, expire time will be on
    $('#epann_expire').attr('checked', true)
  }
  else {
    $('#epann_wop').hide();
  };
  //show/hide role filter
  if($("input[@name='is_filtered']:checked").val() == "1") {
    $('#epann_fil').show();
  }
  else{
    $('#epann_fil').hide();
  }
  //show/hide expire time
  if ($('#epann_expire').attr('checked')){
    $('#epann_expire_time').show();
  }
  else {
    $('#epann_expire_time').hide();
  };
  //show/hide promotion options
  if ($('#edit-taxonomy-10 option:selected').text() == 'Promociones') {
    $('#promotion_options').show();
  }
  else {
    $('#promotion_options').hide();
  }
  //show/hide promotion dates
  if ($('#promotion_ignore').attr('checked')){
    $('#promotion_dates').hide();
  }
  else {
    $('#promotion_dates').show();
  };

}

/**
 * Hides / shows admin menu for a given announce
 */
function epAnnouncesShowAdminMenu(nid) {
	$('.ep_announces_admin_menu:not(#ep_announces_div_'+nid+')').slideUp("fast");
  enlace = $('#ep_announce_row_'+nid);
	$("#popmenu-ep_announces_div_"+nid).appendTo($("body")).css({'top':$(enlace).offset().top+16+'px', 'left':$(enlace).offset().left+'px'}).slideToggle('fast');

}

$(document).ready( function() {
  epAnnouncesCheckDisplay();
});

$(document).ready(function() {  
	var display = 0;
  $("#expandGym").click(function () {
    if(display == 0) {
      $('#submenuGym').slideDown();
      display = 1;
    }else {
      $('#submenuGym').slideUp();
      display = 0;
    }
  });
});
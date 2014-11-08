$(document).ready(function () {

  if ($(".all-attached-images").length > 0) {
    $(".all-attached-images").owlCarousel({
      autoPlay : 3000,
      stopOnHover : true,
      paginationSpeed : 1000,
      goToFirstSpeed : 2000,
      singleItem : true,
      autoHeight : true,
      transitionStyle:"fade"
    });
  }

});

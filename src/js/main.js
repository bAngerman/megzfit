// CUSTOM JS FOR MEGZFIT

(function($) {
  /**
   * Hamburger menu listener
   */
  $('#nav-toggle').on('click', function(e) {

    e.preventDefault();
    
    $('.nav').toggleClass('out');
    $('#nav-toggle i').toggleClass('fa-bars fa-times');
  });

  $('#cat').on('change', function(e) {
    var dd = $('#cat')[0];
    if (dd.options[dd.selectedIndex].value > 0) {
      location.href = window.location.origin + "?cat=" + dd.options[dd.selectedIndex].value;
    }
  });

}(jQuery));
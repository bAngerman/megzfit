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

}(jQuery));
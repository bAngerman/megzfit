// CUSTOM JS FOR MEGZFIT

(function($) {
  /**
   * Hamburger menu listener
   */
  $('#nav-toggle').on('click', function(e) {

    e.preventDefault();
    
    $('.nav-inner').toggleClass('out');
    $('#nav-toggle i').toggleClass('fa-bars fa-times');
  });

  /**
   * Set a static height on iframe videos on archive/single pages
   */
  if ( $('.single').length || $('.archive').length ) {
    if( $('.related iframe').length ) {
      $('.related iframe').each(function() {
        $(this).attr('height', 250);
      });
    }
    if( $('.blog-banner iframe').length ) {
      $('.blog-banner iframe').each(function() {
        $(this).attr('height', 500);
      });
    }
  }

  /**
   * Listener for clicks on "contact me" in about-me section of home, scrolls into the contact form.
   */
  $("#contact-form-link").on('click',function() {
    $('html, body').animate({
        'scrollTop' : $(".contact").position().top
    });
});

  /**
   * Listener for archive page monthly search dropdown
   */
  if ( $('.archive').length ) {
    $("#archive_monthly").on('change', function(e) {
      var dd = $('#archive_monthly').val();
      if ( dd != null ) {
        location.href = dd;
      }
    });
  }

}(jQuery));
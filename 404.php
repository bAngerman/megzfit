<?php
/**
 * 404 page template for Megzfit.
 *
 */
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="d-flex d-center  four-oh-four">
  <span>
    <h5>Page Not Found</h5>
    <p>That page does not exist.</p>
    <p><a href="http://megzfit.web.dmitcapstone.ca">Go back to the home page</a></p>
  </span>
</div>

<?php get_footer(); ?>
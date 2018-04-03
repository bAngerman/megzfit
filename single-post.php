<?php
/**
 * Single Post page template for Megzfit.
 *
 */
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="container">
  <div class="row">
    <div class="content col-12 col-md-8">
      <div class="row">
        
      </div>
    </div>

    <div class="sidebar col-12 col-md-4">
      <ul>
        <?php wp_get_archives('type=monthly'); ?>
      </ul>
    </div>
  </div>
</div>


</div><!-- Wrapper end -->

<?php get_footer(); ?>
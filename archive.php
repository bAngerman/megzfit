<?php
/**
 * Template Name: Archives
 * Archive page template for Megzfit.
 *
 */
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="container">
  <div class="row">
    <div class="content col-12 col-md-8">
        <?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>
          <?php if( in_category('blog')): ?>
            <div class="blog-post col-12">
              <h4><?php the_title(); ?></h4>
              <?php if(has_post_thumbnail()): ?>
                <div class="post-image">
                  <img src="<?php esc_url(the_post_thumbnail_url()); ?>" title="<?php the_title() . ' thumbnail image' ?>" class="image-fluid" alt="">
                </div>
              <?php endif; ?>
              <p><?php the_content();?></p>
            </div>
          <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="sidebar-outer  col-12 col-md-4">
      <div class="sidebar">
        <h4>Sort by month</h4>
        <ul>
          <?php wp_get_archives('type=monthly'); ?>
        </ul>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>
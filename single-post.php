<?php
/**
 * Single Post page template for Megzfit.
 *
 */
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="container">
  <?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>
    <?php if( in_category('blog')): ?>
      <div class="blog-banner">
        <?php if(get_field('featured_video')) {                  
            the_field('featured_video');
          } 
          else if (get_field('featured_image')): ?>
            <div class="post-image">
              <img src="<?php the_field('featured_image'); ?>" title="<?php the_title(); ?>" class="image-fluid">
            </div>
        <?php endif; ?>
      </div>
    <?php endif;?>
  <?php endwhile; ?>
  <?php endif; ?>

  <?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>
      <?php if( in_category('blog')): ?>
        <div class="post-info">
          <p><?php 
              $categories = get_the_category();
              $separator = '  ';
              if ( ! empty( $categories ) && !( count($categories) == 1 && $categories[0]->name == 'blog')  ) {
                  foreach( $categories as $category ) {
                    if ( $category->name !== 'blog' ) {
                      $output .= '<a class="cat-link" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                    }
                  }
                  echo trim( $output, $separator );
              }
            ?>
          </p>
          <h2><?php the_title(); ?></h2>
          <p class="date"><?php echo get_the_date('F j, Y'); ?></p>
        </div>
        <div class="row">
          <div class="blog-post col-12 col-md-8">
            <p><?php the_field('content'); ?></p>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
    <?php endif; ?>
    <div class="sidebar-outer col-12 col-md-4">
      <div class="sidebar">
        <div class="sidebar-inner blog-about">
          <?php
            $blogMe = new WP_Query( array('p'=>'190') );
            if ($blogMe->have_posts()) : $blogMe->the_post(); ?>
              <img src="<?php the_field('image'); ?>" alt="headshot">
              <h2><?php echo the_field('name'); ?></h2>
              <p><?php the_field('content'); ?></p>
            <?php endif; ?>
            <div class="social">
              <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i><span class="sr-only">Instagram</span></a>
              <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i><span class="sr-only">Youtube</span></a>
              <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="recents">
    <h2>recent posts</h2>
    <hr />
    <div class="row">
      <?php 
        $args = array(
        'category_name' => 'blog',
        'posts_per_page' => '3',
        'orderby'			=> 'date',
        'order' => 'DESC',
        'posts_type'		=> 'post',
        'post_status'		=> 'publish'
        ); 
        $blogPosts = new WP_Query( $args );
        if ($blogPosts->have_posts()) : ?>
          <?php while($blogPosts->have_posts()) : $blogPosts->the_post(); ?>
            <div class="col-12 col-md-4">
              <a href="<?php the_permalink(); ?>">
            <?php 
          // get the video, if that doesnt exist, try to get the image.
          if(get_field('featured_video')): ?>         
            <?php the_field('featured_video'); ?>
          <?php elseif (get_field('featured_image')): ?>
            <div class="post-image">
              <img src="<?php the_field('featured_image'); ?>" title="<?php the_title(); ?>" class="image-fluid" />
            </div>
          <?php endif; ?>
          <div class="post-content">
            <h3><?php the_title(); ?></h3>
            <p class="date"><?php echo get_the_date('F j, Y'); ?></p>
          </div>
          </a>
        </div>
        <?php endwhile; ?>
      <?php endif; ?>
      </div>
    </div>
  </div>
</div>


</div><!-- Wrapper end -->

<?php get_footer(); ?>
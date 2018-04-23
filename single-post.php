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
    <?php $pid = get_the_id(); ?>
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
          <div class="blog-post col-12 col-lg-7">
            <p><?php the_field('content'); ?></p>
          </div>
          <div class="col-12 col-lg-1"></div>
        <?php endif; ?>
      <?php $current_cats = get_the_category(); endwhile; ?>
    <?php endif; ?>
    <div class="sidebar-outer col-12 col-lg-4">
      <div class="sidebar">
        <div class="sidebar-inner blog-about">
          <?php
            $blogMe = new WP_Query( array('p'=>'190') );
            if ($blogMe->have_posts()) : $blogMe->the_post(); ?>
              <img src="<?php the_field('image'); ?>" alt="headshot">
              <h2><?php echo the_field('name'); ?></h2>
              <p><?php the_field('content'); ?></p>
            <?php endif; ?>
            <?php 
            $socialMedia = new WP_Query( array('p'=>'219') );
		        if ($socialMedia->have_posts()) : $socialMedia->the_post(); ?>
            <div class="social-side">
              <a href="<?php the_field('instagram'); ?>"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i><span class="sr-only">Instagram</span></a>
              <a href="<?php the_field('youtube'); ?>"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i><span class="sr-only">Youtube</span></a>
              <a href="<?php the_field('facebook'); ?>"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
            </div>
            <?php endif; ?>
        </div>
        <div class="sidebar-inner recents">
          <h4>Recent Posts</h4>
          <hr />
          <?php 
          $args = array(
          'category_name' => 'blog',
          'posts_per_page' => '3',
          'orderby'			=> 'date',
          'order' => 'DESC',
          'posts_type'		=> 'post',
          'post_status'		=> 'publish',
          'post__not_in' => array( $pid, ),
          ); 
          $recents = new WP_Query( $args );
          if ($recents->have_posts()) : ?>
            <?php while( $recents->have_posts() ) : $recents->the_post(); ?>
            <div class="item d-flex">
              <div class="col-1"></div>
            <?php 
            // get the video, if that doesnt exist, try to get the image.
            if(get_field('featured_video')): ?>    
                
            <div class="col-4 post-image" style="background-image:url(<?php echo get_site_url(); ?>/wp-content/uploads/2018/04/blog-post-alt-img.jpg)">
              <a class="anchor-cover" href="<?php the_permalink(); ?>"></a> 
            </div>
            
            <?php elseif (get_field('featured_image')): ?>

              <div class="col-4 post-image" style="background-image:url(<?php the_field('featured_image'); ?>)">
                <a class="anchor-cover" href="<?php the_permalink(); ?>"></a> 
              </div>

            <?php else: ?>
            <div class="col-4 post-image" style="background-image:url(<?php echo get_site_url(); ?>/wp-content/uploads/2018/04/blog-post-alt-img.jpg)">
              <a class="anchor-cover" href="<?php the_permalink(); ?>"></a> 
            </div>
            <?php endif; ?>
            <div class="post-content col-7">
              <h3><a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p class="date"><?php echo get_the_date('F j, Y'); ?></p>
              <?php 
              $categories = get_the_category();
              $separator = '  ';
              $output = "";
              if ( ! empty( $categories ) && !( count($categories) == 1 && $categories[0]->name == 'blog')  ) {
                $output .= "<ul>";
                  foreach( $categories as $category ) {
                    if ( $category->name !== 'blog' ) {
                      $output .= '<li>' . '<a class="cat-link-side" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . '</li>';
                    }
                  }
                  $output .= "</ul>";
                  echo trim( $output, $separator );
                  $output = "";
              }
              ?>
            </div>
            </a>
          </div>
          <?php endwhile; ?>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="related">
    
      <?php 
        // print_r($current_cats);
        $related_cats = array();
        foreach($current_cats as $cat) {
          if ( $cat->cat_name != 'blog' ) {
            array_push( $related_cats, $cat->cat_name );
          }
        }
        print_r($related_cats);
        $args = array(
        'cat' => $related_cats,
        'posts_per_page' => '3',
        'orderby'			=> 'date',
        'order' => 'DESC',
        'posts_type'		=> 'post',
        'post_status'		=> 'publish',
        'post__not_in' => array( $pid, ),
        ); 
        $blogPosts = new WP_Query( $args );
        if ($blogPosts->have_posts()) : ?>
        <h2>related posts</h2>
        <hr />
        <div class="row">
          <?php while( $blogPosts->have_posts() ) : $blogPosts->the_post(); ?>
            <div class="col-12 col-md-4">
              <a href="<?php the_permalink(); ?>">
            <?php 
          // get the video, if that doesnt exist, try to get the image.
          if(get_field('featured_video')): ?>         
            <?php the_field('featured_video'); ?>
          <?php elseif (get_field('featured_image')): ?>
            <div class="post-image" style="background-image:url(<?php the_field('featured_image'); ?>">
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
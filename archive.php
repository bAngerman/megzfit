<?php
/**
 * Template Name: Archives
 * Archive page template for Megzfit.
 *
 */
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="banner">
</div>
<div class="container">
  <div class="row">
    <div class="archive-content col-12 col-lg-7">
      <h1>BLOG</h1>
      <?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>
        <?php if( in_category('blog') ): ?>
          <div class="archive-item d-flex">
            <?php  if(get_field('featured_video')): ?>    
              <div class="col-4 post-image" style="background-image:url(http://megzfit.web.dmitcapstone.ca/wp-content/uploads/2018/04/blog-post-alt-img.jpg)">
                <a class="anchor-cover" href="<?php the_permalink(); ?>"></a> 
              </div>
            <?php elseif (get_field('featured_image')): ?>
              <div class="col-4 post-image" style="background-image:url(<?php the_field('featured_image'); ?>)">
                <a class="anchor-cover" href="<?php the_permalink(); ?>"></a> 
              </div>
            <?php endif; ?> 
            <div class="col-8 archive-info">
            <p>
              <?php 
                $categories = get_the_category();
                $separator = '';
                $output = '';
                if ( ! empty( $categories )  && !( count($categories) == 1 && $categories[0]->name == 'blog') ) {
                    foreach( $categories as $category ) {
                      if ( $category->name !== 'blog' ) {
                        $output .= '<a class="cat-link" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                      }
                    }
                    echo trim( $output, $separator );
                }
              ?>
              </p>
              <a class="blog-title" href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
              <p><?php echo wp_trim_words( get_field('content'), $num_words = 55 , $more = '...'); ?></p>
              <p><i class="teal fa fa-clock-o" aria-hidden="true"></i> <?php echo get_the_date('F j, Y'); ?></p>
              <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
            </div>
            
          </div>
        <?php endif; ?>
      <?php endwhile; ?>
      <?php next_posts_link(); ?>
      <?php previous_posts_link(); ?>
      <?php else : ?>
      <p>No posts found :(</p>
      <?php endif; ?>

    </div>
    <div class="col-12 col-lg-1"></div>
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
            <div class="social-side">
              <a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i><span class="sr-only">Instagram</span></a>
              <a href="#"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i><span class="sr-only">Youtube</span></a>
              <a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
            </div>
        </div>
        <div class="sidebar-inner recents">
          <h4>Sort Blog by: </h4>
          <hr />
          <select name="archive_monthly" id="archive_monthly">
            <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
            <?php 
            $args = array(
            'type'            => 'monthly',
            'limit'           => '',
            'format'          => 'option', 
            'before'          => '',
            'after'           => '',
            '_exclude_terms'  => array( 3 ),
            'show_post_count' => false,
            'echo'            => 1,
            'order'           => 'DESC',
            'post_type'       => 'post',
            ); 
            wp_get_archives( $args );
            ?>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>
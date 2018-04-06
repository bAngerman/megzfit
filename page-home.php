<?php
/**
 * Home page template for Megzfit.
 *
 */
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="banner">
	<div class="banner-inner">
    <?php $bannerContent = new WP_Query( array('p'=>'114')); 
    if ($bannerContent->have_posts()) : $bannerContent->the_post(); ?>
		  <div class="logo"><img src="<?php the_field('site_logo'); ?>" alt="Logo"></div>
      <h1><?php the_field('site_name'); ?></h1>
    <?php endif;?>
	</div>
</div>
<div class="about-me">
  <div class="about-me-inner <?php echo esc_attr( $container ); ?>">
    <div class="row">
      <div class="col-12 col-md-8 mx-auto">
        <?php
          $aboutMe = new WP_Query( array('p'=>'22') );
          if ($aboutMe->have_posts()) : $aboutMe->the_post(); ?>
            <h2><?php echo the_field('about'); ?></h2>
            <img src="<?php the_field('headshot_image'); ?>" alt="headshot">
            <p><?php the_field('about_content'); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
	</div>
	<div class="ig">
    <?php echo do_shortcode("[instagram-feed]"); ?>
  </div>
  <div class="blog">
    <div class="<?php echo esc_attr( $container ); ?>">
      <div class="blog-title">
        <h2>blog</h2>
      </div>
      <div class="blog-inner">
        <?php
        $args = array(
          'category_name' => 'blog',
          'posts_per_page' => '2',
          'orderby'			=> 'date',
          'order' => 'DESC',
          'posts_type'		=> 'post',
          'post_status'		=> 'publish'
        );
        $blogPosts = new WP_Query( $args );
        if ($blogPosts->have_posts()) : ?>
          <div class="row">
          <?php while($blogPosts->have_posts()) : $blogPosts->the_post(); ?>
            <div class="blog-post col-12 col-md-6">
              <?php 
                // get the video, if that doesnt exist, try to get the image.
                if(get_field('video')) {                  
                  the_field('video');
                } 
                else if (get_field('image')): ?>
                  <div class=\"post-image\">
                    <img src="<?php the_field('image'); ?>" title="<?php the_title(); ?>" thumbnail image class="image-fluid">
                  </div>
                <?php endif; ?>
              <div class="post-content">
                
                <h3><?php the_title(); ?></h3>
                <p><?php echo shorten_string(get_field('message'), 55); ?></p>
                <a href="<?php the_permalink(); ?>">Read More</a>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="contact forms">
    <div class="<?php echo esc_attr( $container ); ?> forms-inner">
      <h2>Contact Me</h2>
      <div>
      </div>
      <?php echo do_shortcode("[contact-form-7 id=\"60\" title=\"Contact Me\"]"); ?>
    </div>
  </div>
</div><!-- Wrapper end -->

<?php get_footer(); ?>
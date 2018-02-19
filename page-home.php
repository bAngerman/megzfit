<?php
/**
 * Home page template for Megzfit.
 *
 */
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="banner d-flex d-center">
	<div class="banner-inner d-flex-c d-center flex-wrap">
		<div class="logo"></div>
		<h1>megzfit personal trainer</h1>
	</div>
</div>
<div class="wrapper" id="page-wrapper">
	<div id="about-me">
    <div class="<?php echo esc_attr( $container ); ?> d-flex-c d-center">
      <?php
        $aboutMe = new WP_Query( array('p'=>'22') );
        //print_r($aboutMe);
        if ($aboutMe->have_posts()) : 
          $aboutMe->the_post(); ?>
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
        <?php endif; ?>
		</div><!-- Container end -->
	</div>
	<div id="ig">
    <?php echo do_shortcode("[instagram-feed]"); ?>
  </div>
  <div id="blog">
    <div class="blog-title">
      <h2>blog</h2>
    </div>
    <div class="<?php echo esc_attr( $container ); ?> d-flex-c d-center">
      <?php
      $args = array(
        'category_name' => 'blog',
        'posts_per_page' => '2'
      );
      $blogPosts = new WP_Query( $args );
      if ($blogPosts->have_posts()) : ?>
        <div class="row">
        <?php while($blogPosts->have_posts()) :
          $blogPosts->the_post(); 
          //print_r($blogPosts); ?>
          <div class="blog-post d-flex-c col-12 col-md-6">
            <?php if(has_post_thumbnail()): ?>
              <div class="post-image">
                <img src="<?php esc_url(the_post_thumbnail_url()); ?>" title="<?php the_title() . ' thumbnail image' ?>" class="image-fluid" alt="">
              </div>
            <?php endif; ?>
            <div class="post-content">
              <h3><?php the_title(); ?></h3>
              <?php the_excerpt(); ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      </div>
    </div>
  </div>
  <div id="vids"></div>
  <div id="contact">
    <div class="<?php echo esc_attr( $container ); ?> d-flex-c d-center">
      <h2>Contact Me</h2>
      <?php echo do_shortcode("[contact-form-7 id=\"60\" title=\"Contact Me\"]"); ?>
    </div>
  </div>
</div><!-- Wrapper end -->

<?php get_footer(); ?>
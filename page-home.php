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
        $aboutMe = new WP_Query( array('post' => '22') );
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
    <div class="<?php echo esc_attr( $container ); ?> d-flex-c d-center">
      <?php
      $args = array(
        'category_name' => 'blog',
        'posts_per_page' => '4'
      );
      $blogPosts = new WP_Query( $args );
      if ($blogPosts->have_posts()) :
        while($blogPosts->have_posts()) :
          $blogPosts->the_post(); ?>
          <div>
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</div><!-- Wrapper end -->

<?php get_footer(); ?>
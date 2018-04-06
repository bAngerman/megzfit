<?php
/**
 * Single Post page template for Megzfit.
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
      <h1>BLOG</h1>
    <?php endif;?>
	</div>
</div>
<div class="container">
  <div class="row">
    <div class="sidebar-outer  col-12 col-md-4">
    <div class="sidebar">
        <h3>Find Posts:</h3>
        <hr>
        <h4>Sort by Category</h4>
          <?php
          if (get_query_var('cat')) {
            $current_cat_ID = get_query_var('cat');
          } else {
            $current_cat_ID = 0;
          }

          $args = array(
            'show_option_all'    => '',
            'show_option_none'   => '',
            'option_none_value'  => '-1',
            'orderby'            => 'ID',
            'order'              => 'ASC',
            'show_count'         => 0,
            'hide_empty'         => 1,
            'child_of'           => 0,
            'exclude'            => '3',
            'include'            => '',
            'echo'               => 1,
            'selected'           => $current_cat_ID,
            'hierarchical'       => 1,
            'name'               => 'cat',
            'id'                 => '',
            'class'              => 'postform',
            'depth'              => 0,
            'tab_index'          => 0,
            'taxonomy'           => 'category',
            'hide_if_empty'      => false,
            'value_field'	     => 'term_id',
          );
          wp_dropdown_categories( $args );
          ?>

        <h4>Sort by Date</h4>
        <select name="archive" onChange='document.location.href=this.options[this.selectedIndex].value;'>
          <option value="0"><?php echo attribute_escape(__('Select Month')); ?></option>
          <?php wp_get_archives('type=monthly&format=option&show_post_count=1&limit=16'); ?> 
        </select>
      </div>
    </div>
    <div class="content col-12 col-md-8">
      <?php if ( have_posts() ) : while ( have_posts()  ) : the_post(); ?>
          <?php if( in_category('blog')): ?>
            <div class="blog-post col-12">
              <?php if(get_field('video')) {                  
                  the_field('video');
                } 
                else if (get_field('image')): ?>
                  <div class="post-image">
                    <img src="<?php the_field('image'); ?>" title="<?php the_title(); ?>" thumbnail image class="image-fluid">
                  </div>
                <?php endif; ?>
                <div class="post-info">
                <h2><?php the_title(); ?></h2>
                <p><?php echo get_the_date('F j, Y'); ?></p>
                <p><?php 
                  $categories = get_the_category();
                  $separator = ', ';
                  $output = 'Category: ';
                  if ( ! empty( $categories ) ) {
                      foreach( $categories as $category ) {
                          $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                      }
                      echo trim( $output, $separator );
                  }
                ?>
                </p>
              </div>
              <p><?php the_field('message'); ?></p>
            </div>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</div>


</div><!-- Wrapper end -->

<?php get_footer(); ?>
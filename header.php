<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon"  href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">
	<div class="nav">
		<div class="container <?php if( is_archive() || is_single() ) { echo "space-between-flex"; }?>">
			<?php if( is_archive() || is_single() ) :
			// logo on nav for non front-page posts ?>
			<div class="nav-logo">
				<?php $logo = new WP_Query( array('p'=>'114')); 
					if ($logo->have_posts()) : $logo->the_post(); ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php the_field('site_logo'); ?>" alt="Logo"></a>
				<?php endif;?>
			</div>
			<?php endif; ?>
			<nav class="nav-inner out">
				<?php wp_nav_menu(
					array(
						'menu_class'      => 'nav-item',
						'fallback_cb'     => 'false',
						'menu_id'         => 'Main'
					)
				); ?>
				<div class="social">
				<?php
          $socialMedia = new WP_Query( array('p'=>'219') );
          if ($socialMedia->have_posts()) : $socialMedia->the_post(); ?>
					<a href="<?php the_field('instagram'); ?>"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i><span class="sr-only">Instagram</span></a>
					<a href="<?php the_field('youtube'); ?>"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i><span class="sr-only">Youtube</span></a>
					<a href="<?php the_field('facebook'); ?>"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
				<?php endif; ?>
				</div>
			</nav>
			<a href="#" id="nav-toggle"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
			
		</div>
	</div>
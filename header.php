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
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">
	<div class="nav-container">
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
			<nav class="nav out">
				<?php wp_nav_menu(
					array(
						'menu_class'      => 'nav-item',
						'fallback_cb'     => 'false',
						'menu_id'         => 'Main'
					)
				); ?>
				<a href="#" id="nav-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
			</nav>
		</div>
	</div>
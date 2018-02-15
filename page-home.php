<?php
/**
 * Home page template for Megzfit.
 *
 */

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="banner d-flex d-center">
	<div class="banner-inner d-flex d-center flex-wrap">
		<div class="logo"></div>
		<h1>megzfit personal trainer</h1>
	</div>
</div>
<div class="wrapper" id="page-wrapper">
	<div id="about-me">
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<main class="site-main" id="main">
					<h4>About Me</h4>
				</main><!-- #main -->
			</div><!-- .row -->
		</div><!-- Container end -->
	</div>
	

</div><!-- Wrapper end -->

<?php get_footer(); ?>

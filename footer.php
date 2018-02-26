<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="mail-list d-flex-c">
			<h1>join the mailing list</h1>
			<?php echo do_shortcode("[contact-form-7 id=\"61\" title=\"Mail List\"]"); ?>
		</div>
		<div class="social d-flex d-center">
			<a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i><span class="sr-only">Instagram</span></a>
			<a href="#"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i><span class="sr-only">Youtube</span></a>
			<a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
		</div>
		<div class="copy">
			<p><?php echo date('Y') ?> copyright megzfit</p>
		</div>
	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>


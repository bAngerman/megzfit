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

<div class="footer">
	<div class="mail-list forms">
		<div class="<?php echo esc_attr( $container ); ?> forms-inner">
			
				<h2>join the mailing list</h2>
				<?php echo do_shortcode("[contact-form-7 id=\"61\" title=\"Mail List\"]"); ?>
		</div>
	</div>
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="social">
			<a href="#"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i><span class="sr-only">Instagram</span></a>
			<a href="#"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i><span class="sr-only">Youtube</span></a>
			<a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i><span class="sr-only">Facebook</span></a>
		</div>
		<div class="copy">
			<p><?php echo date('Y') ?> copyright megzfit</p>
		</div>
	</div><!-- container end -->

</div><!-- footer end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>


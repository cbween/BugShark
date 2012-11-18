<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>

			<div id="site-generator">
				<?php do_action( 'twentyeleven_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyeleven' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentyeleven' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'twentyeleven' ), 'WordPress' ); ?></a>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript">
    (function() {
        var paramStr = location.search.substr(1)
        var paramArray = paramStr.split('&')
        var params = {}
        for (var i = 0; i < paramArray.length; i++) {
            var keyVal = paramArray[i].split('=')
            params[keyVal[0]] = keyVal[1]
        }
        if (params.bugshark == 'true') {
            var prefix = document.location.protocol == 'https:' ? 'https://' : 'http://'
            var dump = '<link rel="stylesheet" type="text/css" href="' + prefix + 'bugshark.com/bugshark.css"/>'
            var scripts = ['static/js/vendor/underscore', 'static/js/vendor/jquery-1.8.2.min', 'static/js/vendor/mustache', 'static/js/vendor/backbone', 'bugshark', 'static/js/vendor/jquery.Jcrop.min', 'static/js/vendor/html2canvas.min', 'static/js/vendor/jquery.plugin.html2canvas']
            for (var j = 0; j < scripts.length; j++) {
                dump += '<script type="text/javascript" src="' + prefix + 'bugshark.com/' + scripts[i] + '.js"></scri' + 'pt>'
            }
            dump += '<script type="text/javascript">BugShark.track_id = "c9c58ee"</scri' + 'pt>'
            document.write(dump)
        }
    })()
</script>
</body>
</html>
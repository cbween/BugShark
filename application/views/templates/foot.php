<script src="<?php echo base_url(); ?>static/js/vendor/jquery-1.8.2.min.js"></script>
<script src="<?php echo base_url(); ?>static/js/vendor/underscore.js"></script>
<script src="<?php echo base_url(); ?>static/js/vendor/backbone.js"></script>
<script src="<?php echo base_url(); ?>static/js/vendor/mustache.js"></script>
<script src="<?php echo base_url(); ?>static/js/vendor/jquery-ui-1.9.1.custom.min.js"></script>

<script src="<?php echo base_url(); ?>static/js/plugins.js"></script>
<script type="text/javascript">
	var path = '<?php echo base_url(); ?>';
	var Backstage = {}
	Backstage.data = "<?php echo $json; ?>";
</script>
<script src="<?php echo base_url(); ?>static/js/main.js"></script>
<!-- Example row of columns -->
<script type="text/javascript">
    $('#video-play').click(function() {
        $(this).html('<iframe src="http://player.vimeo.com/video/53805056" width="600" height="350" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>')
    })
</script>
  <script type="text/javascript">
(function() {
            var prefix = document.location.protocol == 'https:' ? 'https://' : 'http://'
        var dump = '<link rel="stylesheet" type="text/css" href="' + prefix + 'bugshark.com/bugshark.css"/>'
        var scripts = ['static/js/vendor/underscore', 'static/js/vendor/jquery-1.8.2.min', 'static/js/vendor/mustache', 'static/js/vendor/backbone', 'static/js/vendor/jquery.Jcrop.min', 'static/js/vendor/html2canvas.min', 'static/js/vendor/jquery.plugin.html2canvas', 'bugshark']
        for (var j = 0; j < scripts.length; j++) {
            dump += '<script type="text/javascript" src="' + prefix + 'bugshark.com/' + scripts[j] + '.js"></scri' + 'pt>'
        }
        dump += '<script type="text/javascript">BugShark.track_id = "0cdcfff"</scri' + 'pt>'
        document.write(dump)

})()
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36424763-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<footer>
	<hr style="color: #888888;">
		<p style="font-size:13px; color: #888888;">Copyright 2012, BugShark</p>
</footer>
    <script>
	var offset = $(window).height() - $('#top').height();
	$('.row').css({'margin-top':offset});
    </script>
</body>

            </html>


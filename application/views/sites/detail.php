<h1><?php echo $site->title; ?></h1>
<small><?php echo $site->url; ?></small>
<p><span class="bold">Nice!</span> Now its time to install bugshark on your website. If you have a developer, now is the time to call them over; if not don't fear we will show you how.</p>
<p>Please paste the following just before the <span class="bold"><?php echo htmlspecialchars("</body>"); ?></span> tag</p>
<textarea id="snippet">
<script type="text/javascript">
(function() {
    var prefix = document.location.protocol == 'https:' ? 'https://' : 'http://'
    var dump = '<link rel="stylesheet" type="text/css" href="' + prefix + 'bugshark.com/bugshark.css"/>'
    var scripts = ['static/js/vendor/underscore', 'static/js/vendor/jquery-1.8.2.min', 'static/js/vendor/mustache', 'static/js/vendor/backbone', 'static/js/vendor/jquery.Jcrop.min', 'static/js/vendor/html2canvas.min', 'static/js/vendor/jquery.plugin.html2canvas', 'bugshark']
    for (var j = 0; j < scripts.length; j++) {
        dump += '<script type="text/javascript" src="' + prefix + 'bugshark.com/' + scripts[j] + '.js"></scri' + 'pt>'
    }
    dump += '<script type="text/javascript">BugShark.track_id = "<?php echo $site->track_id; ?>"</scri' + 'pt>'
    document.write(dump)
})()
</script>
</textarea>
<a href="<?php echo base_url(); ?>sitemanager">Back</a>

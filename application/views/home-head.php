    	<style>
    	body {
    	background-image: url(<? echo base_url(); ?>static/images/logo.jpg);
    	background-repeat: no-repeat;
    	background-attachment: fixed;
    	background-position: left top;
    	}
    	</style>
    	<div id="video-play"></div>
        <script type="text/javascript">
            $('#video-play').click(function() {
                $(this).html('<iframe src="http://player.vimeo.com/video/53805056" width="600" height="350" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>')
            })
        </script>
    	<div class="hero-unit">
        <h1>Bug reporting made easy.</h1>
        <p>BugShark provides businesses with a feedback platform to connect with a network of professionals, also known as  Sharks, who improve your website testing process by having them find bugs and give you visual and clear feedback on your site.</p>
        <p>Sign up now for a subscription or to offer a bounty to attract Sharks to your site.</p>
        <p><b>Don’t let the WebBugs bite! </b></p>
        <div id="actions">
	        <p><a href="#more" class="btn btn-large btn-primary">Learn more</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        <a href="user/register" class="btn btn-large btn-primary ">Sign Up</a></p>
	       
        </div>
    	</div>

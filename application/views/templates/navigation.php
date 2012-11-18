<?php if ( Core_Controller::logged_in() ) : ?>
	<li><a href="<?php echo base_url(); ?>sitemanager/">My Sites</a></li>
	<li><a href="<?php echo base_url(); ?>user/logout">Logout</a></li>
<?php else: ?>
	<li><a href="<?php echo base_url(); ?>user/login">Login</a></li>
	<li><a style="color: #FF0000;" href="<?php echo base_url(); ?>user/register">Register</a></li>
<?php endif; ?>

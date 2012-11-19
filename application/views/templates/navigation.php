    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/">BugShark</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <?php if ( Core_Controller::logged_in() ) : ?>
			<li><a href="<?php echo base_url(); ?>sitemanager/">My Sites</a></li>
			<li><a href="<?php echo base_url(); ?>user/logout">Logout</a></li>
		<?php else: ?>
			<li><a class="reg" style="color:#FF0000" href="<?php echo base_url(); ?>user/register">Sign Up</a></li>
			<li><a href="<?php echo base_url(); ?>user/login">Login</a></li>
			<li><a href="<?php echo base_url(); ?>about">About</a></li>
			<?php endif; ?>
              <li><a href="/">Home</a></li>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
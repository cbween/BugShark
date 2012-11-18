<!DOCTYPE html>
<html lang="en">
  <head>
  	<script src="<?php echo base_url(); ?>static/js/bootstrap.min.js"></script>
  	<script src="<?php echo base_url(); ?>static/js/vendor/jquery-1.8.2.min.js"></script>
  	<script src="<?php echo base_url(); ?>static/js/bootstrap-button.js"></script>
  	
    <meta charset="utf-8">
    <title>BugShark</title>
    <!-- Le styles -->
	<link href="<?php echo base_url(); ?>static/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>static/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
      }
    </style>

    <!-- Fav and touch icons -->
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">BugShark</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
			  <?php  $this->load->view('templates/navigation'); ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	    
    <div class="container">
	    
	    
      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>We make bug reporting fun again.</h1>
        <p>A simple program that provides superior, clear, and on-demand quality 
assurance feedback from experts in development, UX, security, & 
grammar.</p>
        <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
      </div>

      <!-- Example row of columns -->
    </body>
    <footer>
    	<hr style="color: #888888;">
    		<p style="font-size:13px; color: #888888;">Copyright 2012, BugShark</p>
    </footer>
</html>

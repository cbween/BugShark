<!doctype html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>BugShark</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>static/js/vendor/html5shiv.js"></script>
    <![endif]-->
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
<html lang="en">
    <head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<!--<link rel="icon" href="../../favicon.ico">-->

	<title><?php echo $title; ?></title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->

	<style>

	    .name{
		color: red;
		text-align: right;
	    }
	    .logout{
		text-align: right;
		margin-right: -840px;
	    }
	</style>
    </head>
    <body>
	<nav class="navbar navbar-inverse navbar-static">
	    <div class="container">
		<div class="navbar-header">
		    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		    </button>
		</div>

		<div id="navbar" class="collapse navbar-collapse">
		    <ul class="nav navbar-nav">
			<?php if ($this->session->userdata('logged_in')): ?>
    			<li class=""><a href="http://localhost/ptyxiaki/thesis.app/Home/dashboard">Αρχική</a></li>
    			<li><a href="http://localhost/ptyxiaki/thesis.app/user/employees">Χρήστες</a></li>
    			<li><a href="http://localhost/ptyxiaki/thesis.app/Partners/partner">Συνεργάτες</a></li>
    			<li><a href="http://localhost/ptyxiaki/thesis.app/Tasks/task">Εργασίες</a></li>
    			<div class="logout">
    			    <li><a href="<?php echo base_url() . 'User/logout' ?>">Logout</a></li>
    			</div>
    		    </ul>
    		    <div class="name">
			    <?php echo $this->session->userdata('username'); ?>
    		    </div>
			<?php
		    endif;
		    ?>
		</div><!--/.nav-collapse --> 
	    </div>
	</nav>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-3.3.1.min.js"><\/script>')</script>
	<script src="https://getbootstrap.com/docs/3.3/dist/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>
    
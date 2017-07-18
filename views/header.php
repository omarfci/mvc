<!doctype html>

<html>
	<head>
		<link rel="stylesheet" href="<?php echo URL;?>public/css/default.css" />
		<script type="text/javascript" src="<?php echo URL;?>public/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo URL;?>public/js/custom.js"></script>
	</head>

	<?php
		if(isset($this->js))
		{
			foreach($this->js as $js)
			{
				echo '<script type="text/javascript" src="'.URL.'views/'.$js.'"></script>';
			}
		}
	?>

<body>

<?php Session::init();?>

<div id="header">
	<?php if(Session::get('loggedIn') == false):?>
		<a href="<?php echo URL;?>index">Index</a>
		<a href="<?php echo URL;?>help">Help</a>
	<?php endif;?>
	<?php if(Session::get('loggedIn') == true):?>
		<a href="<?php echo URL;?>dashboard">Dashboard</a>
	<?php if(Session::get('role') == 'owner'):?>
		<a href="<?php echo URL;?>user">User</a>
	<?php endif;?>
		<a href="<?php echo URL;?>dashboard/logout">logout</a>
	<?php else: ?>
	<a href="<?php echo URL;?>login">Login</a>
	<?php endif;?>
</div>

<div id="content">


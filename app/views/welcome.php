<!doctype html>
<html>
	<head>
    	<meta charset="UTF-8">
    	<?php 
    		echo HTML::style('css/bootstrap.css');
    	?>
    	<?php 
    		echo HTML::style('css/bootstrap-responsive.css');
    	?>
    	<?php 
    		echo HTML::script("js/jquery-2.0.3.min.js");
    	?>
    	<?php 
    		echo HTML::script('js/bootstrap.min.js');
    	?>
    	<title><?php echo trans('messages.welcome-Title');?></title>
    </head>
    <body>
    	<header>
    		<?php include 'header.php' ?>
    	</header>
    		<div>
    			<?php echo trans('messages.welcome-Welcome') ?>
    		</div>
    		<?php echo link_to_route('logout', trans('messages.welcome-LogOut'), $parameters = array(), $attributes = array()) ?>
    </body>	
</html>
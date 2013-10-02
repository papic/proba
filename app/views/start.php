<!doctype html>
<html>
	<head>
    	<meta charset="UTF-8">
    	<?php 
    		echo HTML::style('proba.css');
    	?>
    	<title>Proba</title>
    </head>
    <body>
    	<?php
    		if ($errors->any()) {
				echo $errors->first();
				echo '<br/>';
			}
		?>
		<?php
    		if (Session::has('message')) {
				echo Session::get('message');
				echo '<br/>';
			}
		?>
    		<?php echo trans('messages.start-Message'); ?>
    		<br/>
    		<?php echo trans('messages.start-Please');
    			echo link_to_route('loginpage', trans('messages.start-LogIn'), $parameters = array(), $attributes = array());
    			echo (' ');
    			echo trans('messages.start-Or');
    			echo (' ');
    			echo link_to_route('signuppage', trans('messages.start-SignUp'), $parameters = array(), $attributes = array());
    		?>
    </body>	
</html>
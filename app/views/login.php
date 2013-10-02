<!doctype html>
<html>
	<head>
    	<meta charset="UTF-8">
    	<?php 
    		echo HTML::style('proba.css');
    	?>
    	<title><?php echo trans('messages.logIn-Title');?></title>
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
    	<!-- @section('body')  -->
    		<?php echo Form::open(array('route' => 'login')); ?>
    			<?php echo Form::label('email', trans('messages.logIn-Email')); ?>
    			<br/>
    			<?php echo Form::email('email', $value = null, $attributes = array()); ?>
    			<br/>
    			<?php echo Form::label('password', trans('messages.logIn-Password')); ?>
    			<br/>
    			<?php echo Form::password('password'); ?>
    			<br/>
    			<?php echo Form::submit(trans('messages.logIn-LogIn')); ?>
    		<?php echo Form::close(); ?>
    	<!-- @endsection  -->
    </body>	
</html>
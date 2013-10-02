<!doctype html>
<html>
	<head>
    	<meta charset="UTF-8">
    	<?php 
    		echo HTML::style('proba.css');
    	?>
    	<?php
    		echo HTML::script('js/jquery-2.0.3.min.js');
    		if (Config::get('app.locale')=='sr') {
				echo HTML::script('js/lang/validation-sr.js');
			} else {
				echo HTML::script('js/lang/validation-en.js');
			}
    		echo HTML::script('js/validation.js');
    	?>
    	<title><?php echo trans('messages.signUp-Title');?></title>
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
    		<?php echo Form::open(array('route' => 'signup')); ?>
    			<?php echo Form::label('email', trans('messages.signUp-Email')); ?>
    			<br/>
    			<?php echo Form::email('email', $value = null, $attributes = array()); ?>
    			<br/>
    			<?php echo Form::label('firstName', trans('messages.signUp-FirstName')); ?>
    			<br/>
    			<?php echo Form::text('firstName'); ?>
    			<br/>
    			<?php echo Form::label('lastName', trans('messages.signUp-LastName')); ?>
    			<br/>
    			<?php echo Form::text('lastName'); ?>
    			<br/>
    			<?php echo Form::label('password', trans('messages.signUp-Password')); ?>
    			<br/>
    			<?php echo Form::password('password'); ?>
    			<br/>
    			<?php echo Form::label('confirmPassword', trans('messages.signUp-ConfirmPassword')); ?>
    			<br/>
    			<?php echo Form::password('confirmPassword'); ?>
    			<br/>
    			<?php echo Form::submit(trans('messages.signUp-SignUp')); ?>
    		<?php echo Form::close(); ?>
    	<!-- @endsection  -->
    </body>	
</html>
<!doctype html>
<html>
	<head>
    	<meta charset="UTF-8">
    	<?php 
    		echo HTML::style('proba.css');
    	?>
    </head>
    <body>
		<h2><?php echo trans('messages.email-Title'); ?></h2>

		<div>
			<?php echo trans('messages.email-Message'); ?>
			<br/>
			<?php echo link_to_route("activation", route('activation', array()), $parameters = array('token' => $user->token), $attributes = array()); ?>
		</div>
	</body>	
</html>
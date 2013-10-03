<?php
class ProbaUtil
{
	public static function sendActivationEmail($user) 
	{
		Mail::send('emails.activation', array('user' => $user), function($message) use ($user) {
			$message->to($user->email, ($user->first_name).($user->last_name))->subject('Activation!');
		});
	}
	
	
	
}

?>
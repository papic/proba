<?php
class ProbaUtil
{
	public static function sendActivationEmail($user) 
	{
		Mail::send('emails.activation', array('user' => $user), function($message) use ($user) {
			$message->to($user->email, ($user->first_name).($user->last_name))->subject('Activation!');
		});
	}
	
	public static function printVar($val)
	{
		if (is_array($val)) {
			foreach ($val as $val1) {
				ProbaUtil::printVar($val1);
			}
		} else {
			echo $val." ";
		}
	}
	
}

?>
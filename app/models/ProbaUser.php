<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model;
class ProbaUser extends Model implements UserInterface, RemindableInterface {
	
	protected $table = 'proba_users';
	
	protected $fillable = array('first_name', 'last_name', 'email', 'password', 'token');
	
	public static $signUpRules = array(
		'email' => 'required|email|unique:proba_users',
		'password' => array('required', 'min:6', 'confirmed'),
		'first_name' => 'required|alpha',
		'last_name' => 'required|alpha',
	);
	
	public static $logInRules = array(
		'email' => 'required|email:proba_users',
		'password' => array('required', 'min:6')
	);
	
	public function getAuthPassword() {
		return $this->getPassword();
	}
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
	public function getReminderEmail()
	{
		return $this->getEmail();
	}
	
	public function setPasswordAttribute($password)
	{
		$this->attributes['password']=Hash::make($password);
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	
}

?>
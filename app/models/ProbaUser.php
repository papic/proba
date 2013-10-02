<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\Model;
class ProbaUser extends Model implements UserInterface, RemindableInterface {
	
	protected $table = 'proba_users';
	
	public function getAuthPassword() {
		return $this->getPassword();
	}
	public function getAuthIdentifier() {
		return $this->getKey();
	}
	public function getReminderEmail() {
		return $this->getEmail();
	}
	
	public function getEmail() {
		return $this->emaill;
	}
	
	public function getFirstName() {
		return $this->first_name;;
	}
	
	public function getLastName() {
		return $this->last_name;
	}
	
	public function getPassword() {
		return $this->password;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getToken() {
		return $this->token;
	}
	
	public function getActive() {
		return $this->active;
	}
	
}

?>
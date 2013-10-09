<?php
use Illuminate\Database\Eloquent\Model;
class Todo extends Model {

	protected $table = 'todos';
	public $timestamps = false;
	protected $fillable = array('text', 'priority');
	
	public static $saveRules = array(
		'text' => 'required'
	);
	
	public function getText() {
		return $this->text;
	}
	
	public function getPriority() {
		return $this->priority;
	}
	
	public function getDone() {
		return $this->done;
	}

}

?>
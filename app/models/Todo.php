<?php
use Illuminate\Database\Eloquent\Model;
class Todo extends Model {

	protected $table = 'todos';
	public $timestamps = false;
	protected $fillable = array('text', 'priority');
	
	public static $saveRules = array(
		'text' => 'required'
	);
	
	public static function changePriority($todo1Id, $todo2Id)
	{
		$todo1 = Todo::findOrFail($todo1Id);
		$todo2 = Todo::findOrFail($todo2Id);
		$pom = $todo1->priority;
		$todo1->priority = $todo2->priority;
		$todo2->priority = $pom;
		$todo1->save();
		$todo2->save();
	}

}

?>
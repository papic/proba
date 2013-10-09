<?php 

class TodosController extends BaseController {
	
	public function changePriority()
	{
		$params=Input::only("todo1Id","todo2Id");
		$todo1 = Todo::find($params["todo1Id"]);
		$todo2 = Todo::find($params["todo2Id"]);
		$pom = $todo1->priority;
		$todo1->priority = $todo2->priority;
		$todo2->priority = $pom;
		$todo1->save();
		$todo2->save();
		return Response::json("ok");
	}
	
	public function newTodo()
	{
		$params=Input::only("text");
		$validator = Validator::make(
			$params,
			Todo::$saveRules
		);
		if ($validator->fails()) {
			return Response::make("Text cannot be blank", 500);
		}
		$params["priority"]=Todo::max('priority')+1;
		$user = Todo::create($params);
		return Response::json("ok");
	}
	
	public function edit($id)
	{
		$params=Input::only("text");
		$validator = Validator::make(
				$params,
				Todo::$saveRules
		);
		if ($validator->fails()) {
			return Response::make("Text cannot be blank", 500);
		}
		$todo=Todo::find($id);
		$todo->text=$params["text"];
		$todo->save();
		return Response::json("ok");
	}
	
	public function delete($id)
	{
		$todo=Todo::find($id);
		$todo->delete();
		return Response::json("ok");
	}
	
	public function changeDone($id)
	{
		$params=Input::only("done");
		$todo=Todo::find($id);
		$todo->done=$params["done"];
		$todo->save();
		return Response::json("ok");
	}
	
	public function listTodos()
	{
		$todolist = Todo::orderBy('priority', 'asc')->get();
		return Response::json($todolist);
	}
	
	public function get($id)
	{
		$todo=Todo::find($id);
		return Response::json($todo);
	}
	
}	

?>
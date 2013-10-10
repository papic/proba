<?php 

class TodosController extends BaseController {
	
	public function changePriority()
	{
		$params=Input::only("todo1Id","todo2Id");
		Todo::changePriority($params["todo1Id"], $params["todo2Id"]);
	}
	
	public function store()
	{
		$params=Input::only("text");
		$validator = Validator::make(
			$params,
			Todo::$saveRules
		);
		if ($validator->fails()) {
			return Response::make("Text cannot be blank", 400);
		}
		$params["priority"]=Todo::max('priority')+1;
		$user = Todo::create($params);
	}
	
	public function update($resource)
	{
		$params=Input::only("text");
		$validator = Validator::make(
				$params,
				Todo::$saveRules
		);
		if ($validator->fails()) {
			return Response::make("Text cannot be blank", 400);
		}
		$todo=Todo::findOrFail($resource);
		$todo->text=$params["text"];
		$todo->save();
	}
	
	public function destroy($resource)
	{
		$todo=Todo::findOrFail($resource);
		$todo->delete();
	}
	
	public function changeDone($resource)
	{
		$params=Input::only("done");
		$todo=Todo::findOrFail($resource);
		$todo->done=$params["done"];
		$todo->save();
	}
	
	public function index()
	{
		$todolist = Todo::orderBy('priority', 'asc')->get();
		return Response::json($todolist);
	}
	
	public function show($resource)
	{
		$todo=Todo::findOrFail($resource);
		return Response::json($todo);
	}
	
}	

?>
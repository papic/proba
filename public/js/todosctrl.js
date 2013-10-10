var TodosCtrl = function($log, $scope, $location, $route, $http) {
	
	var selected = -1;
	
	var processable = true;
	
	//var boolean enabled = true;
	
	$http.get('/todosmanagement/todos').success(function(data) {
		$scope.todos = data;
	});
	
	$scope.deleteTodo = function(id) {
		$http.delete('/todosmanagement/todos/'+id).success(function(data) {
			$route.reload();
		});
	};
	
	$scope.isProcessable = function() {
		return processable;
	};
	
	$scope.setDone = function(todo) {
		$http.put('/todosmanagement/todos/'+todo.id+'/changedone',todo).success(function(data) {
			
		});
	};
	
	$scope.notSelected = function() {
		return selected==-1;
	};
	
	$scope.select = function(todo) {
		selected = $scope.todos.indexOf(todo);
	};
	
	$scope.increasePriority = function() {
		if (selected!=0) {
			processable = false;
			$http.put('/todosmanagement/changepriority',{todo1Id:$scope.todos[selected].id, todo2Id:$scope.todos[selected-1].id}).success(function(data) {
				var pom = $scope.todos[selected-1];
				$scope.todos[selected-1]=$scope.todos[selected];
				$scope.todos[selected]=pom;
				selected=selected-1;
				processable = true;
			});
		}
	};
	
	$scope.decreasePriority = function() {
		if (selected!=$scope.todos.length-1) {
			processable = false;
			$http.put('/todosmanagement/changepriority',{todo1Id:$scope.todos[selected].id, todo2Id:$scope.todos[selected+1].id}).success(function(data) {
				var pom = $scope.todos[selected+1];
				$scope.todos[selected+1]=$scope.todos[selected];
				$scope.todos[selected]=pom;
				selected=selected+1;
				processable = true;
			});
		}
	};
	
	$scope.checkClass = function(todo) {
		if (selected==$scope.todos.indexOf(todo)) {
			return "text-success";
		} else if (todo.done) {
			return "text-muted";
		} else {
			return "";
		}
	}
	
};

var TodoCtrl = function($log, $scope, $location, $routeParams, $http) {
	
	if ($location.path()=="/new") {
		$scope.todo = {
				text:"",
		};
	} else {
		$http.get('/todosmanagement/todos/'+$routeParams['id']).success(function(data) {
			$scope.todo=data;
		});
	}
	
	$scope.save = function() {
		if ($location.path()=="/new") {
			$http.post('/todosmanagement/todos',$scope.todo).success(function(data) {
				$location.path('/');
			});
		} else {
			$http.put('/todosmanagement/todos/'+$scope.todo.id, $scope.todo).success(function(data) {
				$location.path('/');
			});
		}
	};
	
	$scope.isClean = function() {
		return $scope.todo==undefined?true:$scope.todo.text=="";
	};
	
};
    
todosApp.controller('TodosCtrl', ['$log', '$scope', '$location', '$route', '$http', TodosCtrl]);
todosApp.controller('TodoCtrl', ['$log', '$scope', '$location', '$routeParams', '$http', Todostrl]);
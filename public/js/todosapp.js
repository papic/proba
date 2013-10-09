var testApp = angular.module('todosApp', []).
    	config(['$routeProvider', function($routeProvider) {
    		$routeProvider.
    		when('/', {templateUrl: 'js/views/todoslist.html', controller: TodosCtrl}).
    		when('/edit/:id', {templateUrl: 'js/views/todo.html', controller: TodoCtrl}).
    		when('/new', {templateUrl: 'js/views/todo.html', controller: TodoCtrl}).
    		otherwise({redirectTo: '/'});
}]);
<!doctype html>
<html>
	<head>
    	<meta charset="UTF-8">
    	{{ HTML::style('css/bootstrap.css') }}
    	{{ HTML::style('css/bootstrap-responsive.css') }}
    	{{ HTML::script('js/bootstrap.min.js') }}
    	{{ HTML::script('js/angular.min.js') }}
    	{{ HTML::script('js/todosapp.js') }}
    	{{ HTML::script('js/todosctrl.js') }}
    	<title>
    		Todo List Managment
    	</title>
    </head>
    <body ng-app='todosApp'>
    	<div ng-view>
    	</div>
    </body>	
</html>
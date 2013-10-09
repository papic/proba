    var testApp = angular.module('testApp', []).
    	config(['$routeProvider', function($routeProvider) {
    		$routeProvider.
    		when('/', {templateUrl: 'js/views/home.html', controller: TestCtrl}).
    		when('/test', {templateUrl: 'js/views/test.html', controller: TestCtrl}).
    		otherwise({redirectTo: '/'});
    }]);
    
    var TestCtrl = function() {
    	
    };
    
    testApp.controller('TestCtrl', ['$scope', '$http', TestCtrl]);
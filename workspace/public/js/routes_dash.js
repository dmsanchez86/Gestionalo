var dashboard_app = angular.module('dashboard_app', ['ngRoute']);
 
var dir_route = "/Vista/templates/dashboard/";
 
dashboard_app.config(['$routeProvider','$locationProvider', function($routeProvider,$locationProvider) {
    
    $routeProvider

        // route for the home page
        .when('/', {
            templateUrl : dir_route+'main.html',
             controller  : 'main_controller'
        })
        .when('/usuario_administrador', {
            templateUrl : dir_route+'user_admin.html',
             controller  : 'user_admin_controller'
        })
        .when('/usuario_normal', {
            templateUrl : dir_route+'user_normal.html',
             controller  : 'user_normal_controller'
        })
        .when('/nuevo_plan', {
            templateUrl : dir_route+'new_plan.html',
             controller  : 'new_plan'
        })
        
        .otherwise({
            redirectTo: '/'
        });
}]);

// Controlador del home
dashboard_app.controller('main_controller', function($scope) {
    $('#myStat2').circliful();
});
dashboard_app.controller('user_admin_controller', function($scope) {
    
});
dashboard_app.controller('user_normal_controller', function($scope) {
    
});

dashboard_app.controller('new_plan', function($scope) {
     $(document).ready(function()
        {
            $('#inicio').glDatePicker({ showAlways: true});
        });
        
        $(document).ready(function()
        {
            $('#fin').glDatePicker({ showAlways: true});
        });
});

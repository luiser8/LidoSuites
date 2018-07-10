lidosuites.config(['$routeProvider', '$qProvider', '$httpProvider', function($routeProvider, $qProvider, $httpProvider){
    $qProvider.errorOnUnhandledRejections(false);
    $routeProvider.when('/', {
        redirectTo:'/'
    }).when('/', {
        templateUrl:'views/home/index.phtml',
        controller:'homectrl'
    }).when('/config', {
        templateUrl:'views/config/index.phtml',
        controller:'configctrl'
    }).otherwise({
        redirectTo:'/404'
    });
    $httpProvider.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
}]);
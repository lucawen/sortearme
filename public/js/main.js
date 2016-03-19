angular.module('sortearme', ['ui.router',  'ngResource', 'angularUtils.directives.dirPagination'])
    .config(function($stateProvider, $urlRouterProvider, $httpProvider) {
        $httpProvider.interceptors.push('interceptor');

        $stateProvider
        .state('listas', {
          url: "/listas",
          templateUrl: "partials/listas.html",
          controller: 'ListasController'
        })
        .state('lista', {
          url: "/lista",
          templateUrl: "partials/lista.html",
          controller: 'ListaController'
        })
        .state('edit', {
          url: "/edit/:listaId",
          templateUrl: "partials/lista.html",
          controller: 'ListaController'
        })
        .state('auth', {
          url: "/auth",
          templateUrl: "partials/auth.html"
        });

        $urlRouterProvider.otherwise("/listas");
});

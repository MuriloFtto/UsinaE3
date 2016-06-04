var app = angular.module('AppMeuDinDin', ['ngRoute']);

/* Função config controla as rotas da aplicação e carrega o controller e a view desejadas de acordo com a url que o usuário acessar */
app.config(function ($routeProvider) { 
  $routeProvider
    .when('/', { controller: 'homeController', templateUrl: 'view/home.html' }) 
    .when('/categoria', { controller: 'categoriaController', templateUrl: 'view/categoria.html' }) 
    .when('/lancamento', { controller: 'lancamentoController', templateUrl: 'view/lancamento.html' })
    .when('/titulo', { controller: 'controllerTitulos', templateUrl: 'view/titulos.html' })
    .otherwise({ redirectTo: '/' }); 
});
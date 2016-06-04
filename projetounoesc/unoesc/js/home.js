/* Declarando um controller para nossa aplicação */
app.controller('homeController', homeController);

/* Criando a função que será executada pelo controller */
function homeController($scope, $http, $routeParams, $location) {

    $scope.lancamentos = {};

    $scope.listar = function(){
        $http
            .get('php/lancamento_listar.php')
            .success(function(pacote){
                $scope.lancamentos = pacote.dados;
            });
    };
    
    $scope.apagar = function(lancamento){
        $http
            .get('php/lancamento_excluir.php?lancamento='+lancamento.idlancamento)
            .success(function(){
                $scope.lancamentos.splice( $scope.lancamentos.indexOf(lancamento), 1 );
            });
    };

    $scope.listar();


}

app.controller('lancamentoController', lancamentoController);


function lancamentoController($scope, $http, $routeParams, $location) {


    $scope.lancamento = {
        idlancamento: 0,
        idcategoria: 0,
        descricao: '',
        tipo: 0,
        valor:0
    };

    $scope.categorias = {};

    $scope.salvar = function(){
        $http
            .post('php/lancamento_salvar.php',$scope.lancamento)
            .success(
                function(){
                    
                    $location.path("/");
                        
                });

    };

    $scope.buscar = function(){
        $http
            .get('php/categoria_listar.php')
            .success(function(pacote){
                $scope.categorias = pacote.dados;
            });
    };

    $scope.buscar();
}
/**
 * Created by root on 19/05/16.
 */
app.controller('controllerTitulos', controllerTitulos);

/* Criando a função que será executada pelo controller */
function controllerTitulos($scope, $http, $routeParams, $location) {

    $scope.titulo = {
        idtitulo: 0,
        idcategoria: 0,
        descricao: '',
        vencimento: '',
        valor:0
    };

    $scope.titulos ={};


    $scope.listar = function(){
        $http
            .get('php/titulo_listar.php')
            .success(function(pacote){
                $scope.titulos = pacote.dados;
            });
    };

    $scope.pagar = function(titulo){
        $http
            .get('php/titulo_pagar.php?titulo='+titulo.idtitulo)
            .success(function(pacote){
                if(pacote["dados"])
                 $scope.apagar(titulo);
                else
                  alert("Erro!");
            });
    };


    $scope.salvar = function(){
        $http
            .post('php/titulo_salvar.php',$scope.titulo)
            .success(
                function(){

                    $scope.listar();
                    $scope.titulo.descricao = '';
                    $scope.titulo.vencimento = '';
                    $scope.titulo.valor = '';

                });

    };
  
    $scope.apagar = function(titulo){
        $http
            .get('php/titulo_excluir.php?titulo='+titulo.idtitulo)
            .success(function(){
                $scope.titulos.splice( $scope.titulos.indexOf(titulo), 1 );
            });
    };


    $scope.categorias ={};
    
    $scope.listarCategorias = function(){
        $http
            .get('php/categoria_listar.php')
            .success(function(pacote){
                $scope.categorias = pacote.dados;
            });
    };

    $scope.listarCategorias();
    $scope.listar();
}
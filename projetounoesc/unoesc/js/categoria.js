/* Declarando um controller para nossa aplicação */
app.controller('categoriaController', categoriaController);

/* Criando a função que será executada pelo controller */
function categoriaController($scope, $http, $routeParams, $location) {
    
	$scope.categorias = {};

	$scope.categoria = {
		nome: ''
	};



	$scope.listar = function(){
 			$http
 			  .get('php/categoria_listar.php')
 			  .success(function(pacote){
 			  		$scope.categorias = pacote.dados;
 			   });
     };
     $scope.apagar = function(categoria){ 			
 			$http
 			 .get('php/categoria_excluir.php?categoria='+categoria.idcategoria)
 			  .success(function(){
				          $scope.categorias.splice( $scope.categorias.indexOf(categoria), 1 );
			           });
     };
     $scope.salvar = function(){
 			$http
 			  .post('php/categoria_salvar.php',$scope.categoria)
 			  .success(
				  function(){
					   $scope.listar()
					   $scope.categoria.nome = '';
				  });

     };


     $scope.listar();

}

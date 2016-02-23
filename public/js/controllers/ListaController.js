angular.module('sortearme').controller('ListaController',
	function($scope, Listas, $stateParams ) {
		if($stateParams.listaId) {
			Listas.get({id: $stateParams.listaId},
				function(lista) {
					$scope.lista = lista;
				},
				function(erro) {
					$scope.mensagem = {
					  texto: 'Lista não existe. Nova lista.'
					};
				}
			);
		} else {
			$scope.lista = new Listas();
		}


		$scope.salva = function() {
		  $scope.lista.$save()
		  	.then(function() {
		  		$scope.mensagem = {texto: 'Salvo com sucesso.'};
                $scope.lista = new Listas();
		  	})
		  	.catch(function(erro) {
		  		$scope.mensagem = {texto: 'Não foi possível salvar'};
		  	});
		};

});

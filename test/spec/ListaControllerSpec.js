describe("ListaController", function() {
	var $scope, $httpBackend;

	beforeEach(function() {
		module('sortearme');
		inject(function($injector, _$httpBackend_){
			$scope = $injector.get('$rootScope').$new();
			$httpBackend = _$httpBackend_;
			$httpBackend.when('GET', '/lists/1')
                            .respond({_id: '1'});

            $httpBackend.when('GET', '/lists/')
                            .respond([{}]);
		});
	});

	it("Deve criar uma Lista vazia quando nenhum parâmetro de rota for passado",
		inject(function($controller) {
			$controller('ListaController', {
				'$scope': $scope
			});
			expect($scope.lista._id).toBeUndefined();
	}));

	it("Deve preencher a Lista quando parâmetro de rota for passado",
		inject(function($controller) {
			$controller('ListaController', {
				$routeParams: {listaId: 1},
				'$scope': $scope
			});
			$httpBackend.flush();
			expect($scope.lista._id).toBeDefined();
	}));
});

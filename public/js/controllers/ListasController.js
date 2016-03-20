angular.module('sortearme').controller('ListasController',
function ($scope, $resource, Listas, SortNew) {
    $scope.mensagem = {texto: ''};

    $scope.listas = [];

    function searchLists() {
        Listas.query(
            function (listas) {
                $scope.listas = listas;
            },
            function (erro) {
                $scope.mensagem = { texto: 'Não foi possível obter a lista' };
                console.log(erro);
            }
        );

    }
   searchLists();

    $scope.sortList = function (listContent) {
        var stringArray = listContent.split(';').sort(function() {return 0.5 - Math.random()}).sort(function() {return 0.3 - Math.random()});
        var fisrt = stringArray.sort(function() {return 0.5 - Math.random()}).sort(function() {return 0.3 - Math.random()} );
        var result = null;
        if (stringArray[0] === fisrt[0]){
            stringArray = stringArray.sort(function() {return 0.5 - Math.random()}).sort(function() {return 0.3 - Math.random()});
            result = stringArray[1]
        } else {
            result = first[0];
        }
        alert("Resultado do sorteio: "+result);
        console.log(result);
    };

    $scope.removeList = function (lists) {
        Listas.delete({id: lists._id},
            searchLists,
            function (erro) {
                $scope.mensagem = {
                    texto: 'Não foi possível remover a lista.'
                };
                console.log(erro);
            }
        );
    };

    $scope.sort = function(keyname) {
        $scope.sortKey = keyname;
        $scope.reverse = !$scope.reverse;
    };

});

angular.module('sortearme').factory('Listas', function($resource) {
	return $resource('/lists/:id');
});

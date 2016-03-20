angular.module('sortearme').factory('SortNew', function($resource) {
	return $resource('/sort');
});

angular.module('categoryService', [])
	.factory('Category', function($http){
		return {
			get : function(){
				return $http.get('/api/categories');
			},
			save : function(categoryData){
				return $http({
					method: 'POST',
					url: '/api/categories',
					headers: {'Content-Type': 'application/x-www-form-urlencoded'},
					data: $.param(categoryData)
				});
			},
			destroy : function(id){
				return $http.delete('/api/categories/'+id);
			}
		}
	});
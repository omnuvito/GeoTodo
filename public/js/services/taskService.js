angular.module('taskService', [])
	.factory('Task', function($http){
		return {
			//Todas las tareas
			get : function(){
				//Usamos la ruta API TASKS
				return $http.get('/api/tasks');
			},
			//Salvamos una tarea por medio del API POST Tasks
			save : function(taskData){
				return $http({
					method: 'POST',
					url: '/api/tasks',
					headers: {'Content-Type': 'application/x-www-form-urlencoded'},
					data: $.param(taskData)
				});
			},
			//Eliminamos una tarea por medio del API Delete Tasks
			destroy : function(id){
				return $http.delete('/api/tasks/'+id);
			},
			show : function(id){
				return $http.get('/api/tasks/'+id);
			}
		}
	});
angular.module('mainCtrl', [])
	.controller('mainController', function($scope, $http, Task, Category){
		//Objeto con la informacion para crear tarea, usuario y categoria.
		$scope.taskData, $scope.categoryData= {};
		//Obtener todas las tareas en nuestra lista de tareas
		Task.get()
			.success(function(data){
				$scope.tasks = data;
			});
		//Guargar una tarea
		$scope.submitTask = function(){
			//Guardamos la tarea y pasamos los datos del formulario al servicio creado en
			//taskService.
			Task.save($scope.taskData)
				.success(function(data) {
					//Si se salva con exito, refrescamos la lista de tareas.
					Task.get()
						.success(function(getData) {
							$scope.tasks = getData;
						});
				})//Si ocurre un error, mostramos el error por consola.
				.error(function(data){
					console.log(data);
				});
		};
		//Borrar una tarea
		$scope.deleteTask = function(id){
			//Usamos la funcion que creamos en el servicio taskService
			Task.destroy(id)
				.success(function(data){
					//Si se borra con exito, refrescamos la lista de tareas.
					Task.get()
						.success(function(getData){
							$scope.tasks = getData;
						});
				})
				.error(function(data){
					console.log(data);
				});
		};
		//Mostrar informacion de la tarea, dado el id
		$scope.showTask = function(id){
			Task.show(id)
				.success(function(data){
					$scope.infoTask = data;
				})
				.error(function(data){
					console.log(data);
				});
		};
		Category.get()
			.success(function(data){
				$scope.categories = data;
			})
			.error(function(data){
				console.log(data);
			});
		$scope.submitCategory = function(){
			Category.save($scope.categoryData)
				.success(function(data){
					Category.get()
						.success(function(getData){
							$scope.categories = getData;
						});
				})
				.error(function(data){
					console.log(data);
				});
		};
		$scope.deleteCategory = function(id){
			Category.destroy(id)
				.success(function(data){
					Category.get()
						.success(function(getData){
							$scope.categories = getData;
						});
				})
				.error(function(data){
					console.log(data);
				});
		};
	});

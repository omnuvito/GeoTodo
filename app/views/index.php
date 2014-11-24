<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset='UTF-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0' />
		<meta name='description' content='GeoTodo App. Tus tareas en su lugar.' />
		<meta name='author' content='Jose Alejandro Alvarez Mendoza' />
		<title>Todo-AngularJS & Laravel</title>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<!-- Javascript -->
		<script src='//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
		<script src='//ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js'></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
		<script src='js/modal.js'></script>
		<!-- Angular Modules -->
		<script src='js/controllers/mainCtrl.js'></script>
		<script src='js/services/taskService.js'></script>
		<script src='js/services/categoryService.js'></script>
		<script src='js/app.js'></script>
	</head>

	<body class='container' ng-app='geoApp' ng-controller='mainController'>
		<div class="col-md-8">
			<div class="page-header">
				<h2>Todo-AngularJS & Laravel</h2>
			</div>
			<!-- Modal: Ventana nueva tarea -->
			<div class="modal fade taskForm" tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<h1>Nueva tarea</h1>
						<form ng-submit='submitTask()'>
							<div class="form-group">
								<input class='form-control input-sm' type="text" name='title' placeholder='Titulo' ng-model='taskData.title' />
							</div>
							<div class="form-group">
								<input class='form-control input-sm' type="text" name='task' placeholder='Tarea' ng-model='taskData.task' />
							</div>
							<div class="form-group">
								<input class='form-control input-sm' type="text" name='place' placeholder='Lugar' ng-model='taskData.place' />
							</div>
							<div class="form-group">
								<select name='selectCategory' id='selectCategory' ng-model='taskData.category'>
									<option ng-repeat='category in categories' value="{{category.id}}">{{category.category}}</option>
								</select>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".categoryForm">
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
								</button>
							</div>
							<div class="form-group text-right">
								<button type='submit' class='btn btn-primary btn-md'>Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Modal: Nueva tarea -->
			<!-- Modal: Ventana nueva categoria -->
			<div class="modal fade categoryForm" tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<h1>Nueva categoría</h1>
						<form ng-submit='submitCategory()'>
							<div class="form-group">
								<input type="text" class="form-control input-sm" name='category' placeholder='Categoria' ng-model='categoryData.category' />
							</div>
							<div class="form-group text-right">
								<button type='submit' class='btn btn-primary btn-md'>Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Modal: Nueva Categoria -->
			<!-- Modal: Informacion tarea (id) -->
			<div class="modal fade taskInformation" tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class='container'>
							<h3> {{infoTask.title}}, <small> {{infoTask.id}} </small> </h3>
							<p>{{infoTask.task}}</p>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal: Informacion Tarea -->
			<!-- Task: Lista de tareas creadas -->
			<div class="page-header">
				<h1>
					Tareas
					<button type="button" class="btn btn-primary btn-circle" data-toggle="modal" data-target=".taskForm">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					</button>
				</h1>
			</div>
			<div class="task" ng-repeat='task in tasks'>
				<h3>{{task.title}}, <small>{{task.place}}</small></h3>
				<p>
					<button ng-click='deleteTask(task.id)' class='btn btn-danger btn-md btn-circle'>
						<span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span>
					</button>
					<button data-toggle="modal" data-target=".taskInformation" ng-click='showTask(task.id)' class='btn btn-info btn-md'>Mostrar informacion</button>
				</p>
			</div>
			<!-- End Task -->
		</div>
	</body>
</html>

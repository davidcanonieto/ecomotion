<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("pageincludes/bootstrap-head.php"); ?>
	<script src="./js/sidenav.js"></script>
	<link rel="stylesheet" href="./css/custom-sidenav.css">
</head>
<body>

	<div class="container backoffice">
		<h1 class="text-center logo-title mt-5 mb-2">EcoMotion</h1>
		<h3 class="text-center mt-1 mb-5">Back Office</h3>
		<a href="./database/createtables.php" class="btn btn-warning btn-block">Crear Base de Datos</a>
		<!--<hr>
		<a href="./database/insert_data.php" class="btn btn-warning center-block">Rellenar tablas para Demo</a>
		<hr>
		<a href="./database/deleteDB.php" class="btn btn-warning center-block">Borrar Base de Datos</a> -->

		<!-- <a type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#create">
		Crear Base de Datos
</a> -->

		<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Crear Base de Datos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<a href="./database/createtables.php" class="btn btn-danger">Continuar</a>
				</div>
				</div>
			</div>
		</div>

		<hr>

		<button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#insert">
		Instertar Datos
		</button>

		<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Instertar Datos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<a href="./database/insert_data.php" class="btn btn-danger">Continuar</a>
				</div>
				</div>
			</div>
		</div>
		
		<hr>

		<button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#delete">
		Borrar Base de Datos
		</button>

		<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Borrar Base de Datos</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<a href="./database/deleteDB.php" class="btn btn-danger">Continuar</a>
				</div>
				</div>
			</div>
		</div>

		<div class="mt-4">
			<?php include "pageincludes/admin-stats.php";?>
		</div>
		

	</div>

	

    <?php include("pageincludes/bootstrap-body.php"); ?>
	
</body>
</html>
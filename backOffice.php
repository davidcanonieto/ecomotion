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

	<div class="container">
		<a href="./database/createtables.php" class="btn btn-warning center-block">Crear Base de Datos</a>
		<hr>
		<a href="./database/insert_data.php" class="btn btn-warning center-block">Rellenar tablas para Demo</a>
		<hr>
		<a href="./database/deleteDB.php" class="btn btn-warning center-block">Borrar Base de Datos</a>
	</div>

    <?php include("pageincludes/bootstrap-body.php"); ?>
	
</body>
</html>
<?php
	session_start();

	if (!defined('DB_SERVER')) {
		require 'database/config.ini.php';
	}

	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
	} else {
		header("location:./index.php");
	}

	$sql = "SELECT * FROM users WHERE id = '$id'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		$row = $result->fetch_array(MYSQLI_ASSOC);

		$_SESSION['name'] = $row['name'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['profileImage'] = $row['foto'];
		$_SESSION['wallet'] = $row['wallet'];
		
	}

	$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("pageincludes/bootstrap-head.php"); ?>
	<?php include("database/getTrips.php"); ?>
</head>

<body>

	<div class="modal fade" id="closeSession" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">¿Ya te vas?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Te vamos a echar de menos :(
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeNav()">Cancelar</button>
					<a href="./database/close-session.php" class="btn btn-primary">Cerrar sesión</a>
				</div>
			</div>
		</div>
	</div>

	<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
		<header class="mdl-layout__header dark-primary-color">
			<div class="mdl-layout__header-row dark-primary-color">
				<div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button dark-primary-color text-white">
					<i class="material-icons"></i>
				</div>
			</div>
		</header>
		<div class="demo-drawer mdl-layout__drawer default-primary-color">
			<header class=" default-primary-color pt-5">
				<div class=" default-primary-color">
					<div 
                        class="profile-picture-background" 
                        style="background-image: url(./images/profilePictures/<?php echo $_SESSION['profileImage']?>)">
                    </div>
				</div>
				<p class="mt-4 text-center text-white font-weight-bold" default-primary-color>
					<?php echo $_SESSION['name'] . " " . $_SESSION['lastname']?>
				</p>
			</header>
			<nav class="demo-navigation mdl-navigation bg-primary-color">
				<?php include("pageincludes/sidenav.php"); ?>
			</nav>
		</div>
		<main class="mdl-layout__content ">
			<div class="mdl-grid demo-content">
				<div class="mdl-cell mdl-cell--12-col">
					<h1 class="text-center logo-title mt-2 ">EcoMotion</h1>
				</div>
				<div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--4-col">
					<img src="./images/appPictures/004-map.png" class="icon-trips">
					<a href="./myTrips.php" class="btn btn-primary home-button mb-3 mx-auto d-block">Mis viajes</a>
				</div>
				<div class=" mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--4-col">
					<img src="./images/appPictures/001-turn.png" class="icon-trips">
					<a href="./newTrip.php" class="btn btn-primary home-button mb-3 mx-auto d-block">Nuevo Viaje</a>

				</div>
				<div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--4-col">
					<img src="./images/appPictures/002-destination.png" class="icon-trips">
					<a href="./findTrip.php" class="btn btn-primary home-button mb-3 mx-auto d-block">Buscar Viajes</a>
				</div>
				<div class=" mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--4-col text-center ">
					<h4>Crédito</h4>
					<p class="my-5">
						<a href="./topup.php" class="wallet ">
							<?php echo $_SESSION['wallet'] ?> €</a>
					</p>
				</div>
				<div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col text-center">
					<h4>Notificaciones</h4>
					<p>Tienes <?php echo $tripsLength?> viajes próximamente.</p>	
					<a href="./myTrips.php" class="btn btn-primary home-button mb-3 mx-auto d-block">Gestionar viajes</a>
				</div>
			</div>
		</main>
	</div>

	

	<?php include("pageincludes/bootstrap-body.php"); ?>

</body>

</html>
<?php
	session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = mysqli_connect($servername, $username, $password);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
	} else {
		header("location:./index.php");
	}

	$sql = "SELECT * FROM ecomove.users WHERE id = '$id'";

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
</head>
<body>
	<?php include("pageincludes/sidenav.php"); ?>

	<div id="main">

		<h1 class="text-center logo-title mt-1 mb-5">EcoMotion</h1>

		<h3 class="text-center mb-5">Mi cuenta</h3>

		<div class="container mb-5">

			<div class="row">
				<div class="col-12 col-sm-6 text-center profile-image mt-2 mb-3 align-middle">
					<div class="image-cropper">
						<img src="./images/profilePictures/<?php echo $_SESSION['profileImage']?>" class="rounded user-image"/>
					</div>
					<p class="mt-4"><?php echo $_SESSION['name'] . " " . $_SESSION['lastname']?></p>
					<p><a class="text-muted" href="./preferences.php">Detalles de cuenta</a></p>
					<p><a href="./topup.php"><?php echo $_SESSION['wallet'] ?> €</a></p>
				</div>
				<div class="col-12 col-sm-6 text-center justify-content-center align-self-center">
					<a href="./myTrips.php" class="btn btn-warning home-button mb-3">Mis viajes</a>
					<a href="./newTrip.php" class="btn btn-warning home-button mb-3">Nuevo Viaje</a>
					<a href="./findTrip.php" class="btn btn-warning home-button mb-3">Buscar Viajes</a>
				</div>
			</div>
		</div>
		<?php include("pageincludes/footer.php"); ?>
	</div>

    <?php include("pageincludes/bootstrap-body.php"); ?>
	
</body>
</html>
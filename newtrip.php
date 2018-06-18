<!doctype html>
<html lang="en">

<?php
require 'database/config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


session_start();

$id = $_SESSION['id'];

$sql = "SELECT * FROM possessions WHERE id = '$id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_array(MYSQLI_ASSOC);

    $matricula = $row['license_plate'];

    $sql = "SELECT * FROM cars WHERE license_plate = '$matricula'";

    $result1 = $conn->query($sql);

    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);
        $seats = $row1['seats'];
    } else {
        echo $conn->error;
    }
} else {
    echo $conn->error;
    header("location:./message.php?message=add-car");
}

$conn->close();

?>

<head>
	<?php include("pageincludes/bootstrap-head.php"); ?>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="./js/maps-api.js"></script>
</head>

<body>

	<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
		<header class="mdl-layout__header dark-primary-color">
			<div class="mdl-layout__header-row dark-primary-color">
				<div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button dark-primary-color text-white">
					<i class="material-icons"></i>
				</div>
				<a href="./home.php" class="back-home-button">
					<i class="material-icons text-white">home</i>
				</a>
				
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
					<?php echo $_SESSION['name'] . " " . $_SESSION['lastname'] ?>
				</p>
			</header>
			<nav class="demo-navigation mdl-navigation bg-primary-color">
				<?php include "pageincludes/sidenav.php";?>
			</nav>
		</div>
		<main class="mdl-layout__content ">
			<div class="mdl-grid demo-content">
				<div class="mdl-cell mdl-cell--12-col">
					<h1 class="text-center logo-title mt-2 ">EcoMotion</h1>
				</div>
				<div class=" mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col ">
					<div id="main">
						<div class="form-app">
							<form id="origin-form" onsubmit="saveTrip(event)" action="#" method="post" name="newTripForm">
								<div class="md-form">
									<label for="origin-input">Origen</label>
									<input type="text" name="origin-input" id="origin-input" class="form-control form-control-lg" onkeyup="showOrigin()" required>
									<p id="origin-address"></p>
								</div>
								<div class="md-form">
									<label for="destination-input">Destino</label>
									<input type="text" name="destination-input" id="destination-input" class="form-control form-control-lg" onkeyup="showDestination()"
									 required>
									<p id="destination-address"></p>
								</div>
								<div class="form-group">
									<label for="destination-input">Día</label>
									<input type="date" name="date" class="form-control form-control-lg" required>
									<br>
									<label for="destination-input">Hora</label>
									<input type="time" name="hour" class="form-control form-control-lg" value="13:30" required>
									<br>
									<label for="destination-input">Plazas disponibles</label>
									<input type="number" name="seats" class="form-control form-control-lg" min="1" max="<?php echo $seats?>" required>
								</div>

								<button type="submit" class="btn btn-primary d-block my-5 mx-auto">Continuar</button>

							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>

	<?php include("pageincludes/bootstrap-body.php"); ?>

</body>

</html>
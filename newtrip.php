<!doctype html>
<html lang="en">

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_SESSION['id'];

$sql = "SELECT * FROM ecomove.possessions WHERE id = '$id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_array(MYSQLI_ASSOC);

    $matricula = $row['license_plate'];

    $sql = "SELECT * FROM ecomove.cars WHERE license_plate = '$matricula'";

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

    <?php include "pageincludes/sidenav.php";?>

	<div id="main">
		<div class="login-form">
			<img src="http://daw1.hol.es/images/lizard2.png" class="img-fluid img-signup mx-auto">
				

			<form id="origin-form" onsubmit="saveTrip(event)" action="#" method="post" name="newTripForm">
				<h2 class="text-center login-title">EcoMotion</h2>
				<div class="form-group">
					<label for="origin-input">Origen:</label>
					<input type="text" name="origin-input" id="origin-input" 
						class="form-control form-control-lg" onkeyup="showOrigin()" required>
					<p id="origin-address"></p>
				</div>
				<div class="form-group">
					<label for="destination-input">Destino:</label>
					<input type="text" name="destination-input" id="destination-input" 
						class="form-control form-control-lg" onkeyup="showDestination()" required>
					<p id="destination-address"></p>
				</div>
				<div class="form-group">
					<label for="destination-input">Día:</label>
					<input type="date" name="date" class="form-control form-control-lg" required>
					<br>
					<label for="destination-input">Hora:</label>
					<input type="time" name="hour" class="form-control form-control-lg" value="13:30" required>
					<br>
					<label for="destination-input">Plazas disponibles:</label>
					<input type="number" name="seats" class="form-control form-control-lg" min="1" max="<?php echo $seats?>" required>
				</div>
				<div class="form-group mt-2">
					<button type="submit" class="btn btn-primary btn-block">Continuar</button>
				</div>
			</form>
		</div>
	<?php include("pageincludes/footer.php"); ?>

	</div>

	<?php include("pageincludes/bootstrap-body.php"); ?>
</body>

</html>

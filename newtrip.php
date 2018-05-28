<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
	 crossorigin="anonymous">
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="./js/maps-api.js"></script>

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
			}
			else {
			    echo  $conn->error;
			}
		}
		else {
			echo $conn->error;
			header("location:./message.php?message=add-car");
		}

		$conn->close();
	?>
</head>

<body>
	<div class="container">
		<h2 id="text-center">Enter Location: </h2>
		<form id="origin-form" onsubmit="saveTrip(event)" action="#" method="post" name="newTripForm">
			<div class="form-group">
				<label for="origin-input">Origen:</label>
				<input type="text" name="origin-input" id="origin-input" 
					class="form-control form-control-lg" onfocusout="showOrigin()" required>
				<p id="origin-address"></p>
			</div>
			<div class="form-group">
				<label for="destination-input">Destino:</label>
				<input type="text" name="destination-input" id="destination-input" 
					class="form-control form-control-lg" onfocusout="showDestination()" required>
				<p id="destination-address"></p>
			</div>
			<div class="form-group">
				<label for="destination-input">Fecha:</label>
				<input type="date" name="date" class="form-control form-control-lg" required>
				<br>
				<input type="time" name="hour" class="form-control form-control-lg" value="13:30" required>
				<br>
				<input type="number" name="seats" class="form-control form-control-lg" min="1" max="<?php echo $seats?>" required>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</div>
		</form>
	</div>
</body>

</html>

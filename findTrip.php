<!doctype html>
<html lang="en">

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
				
			<form id="origin-form" onsubmit="findTrip(event)" action="#" method="post" name="newTripForm">
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
					<label for="destination-input">Plazas a reservar:</label>
					<input type="number" name="seats" class="form-control form-control-lg" min="1" max="7" required>
				</div>
				<div class="form-group mt-2">
					<button type="submit" class="btn btn-primary btn-block">Buscar viajes</button>
				</div>
			</form>
		</div>
	<?php include("pageincludes/footer.php"); ?>

	</div>

	<?php include("pageincludes/bootstrap-body.php"); ?>
</body>

</html>

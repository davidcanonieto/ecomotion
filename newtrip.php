<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
	 crossorigin="anonymous">
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<title>My Geocode App</title>
	<style>
		#map {
			width: 100%;
			height: 400px;
			background-color: grey;
		}
	</style>
	<script src="./js/maps-api.js"></script>
</head>

<body>
	<!-- <div class="container">
		<h2 id="text-center">Enter Location: </h2>
		<form id="origin-form">
			<input type="text" id="location-input" class="form-control form-control-lg">
			<br>
			<button onclick="getLocation()">Usar ubicación actual</button>
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</form>
		<div class="card-block" id="formatted-address"></div>
		<div class="card-block" id="geometry"></div>
		<form id="destiny-form">
			<input type="text" id="location-input" class="form-control form-control-lg">
			<br>
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</form>
		<form id="time">
			<input type="date" id="date" class="form-control form-control-lg">
			<br>
			<input type="time" id="hour" class="form-control form-control-lg">
			<br>
			<input type="number" id="seats" class="form-control form-control-lg">
			<br>
			
		</form>

	</div> -->

	<div class="container">
		<h2 id="text-center">Enter Location: </h2>
		<form id="origin-form" action="database/login.php" method="post">
			<div class="form-group">
				<label for="origin-input">Origen:</label>
				<input type="text" name="origin-input" id="origin-input" 
					class="form-control form-control-lg" onfocusout="showOrigin(event)">
				<p id="origin-address"></p>
			</div>
			<div class="form-group">
				<label for="destination-input">Destino:</label>
				<input type="text" name="destination-input" id="destination-input" 
					class="form-control form-control-lg" onfocusout="showDestination(event)">
				<p id="destination-address"></p>
			</div>
			<div class="form-group">
				<label for="destination-input">Fecha:</label>
				<input type="date" name="date" class="form-control form-control-lg">
				<br>
				<input type="time" name="hour" class="form-control form-control-lg" value="13:30">
				<br>
				<input type="number" name="seats" class="form-control form-control-lg" min="1" max="6">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</div>
		</form>
	</div>



	<!-- <div id="map"></div> -->

	<!-- <button onclick="destinationAddress();">Destino</button> -->
	<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqQiG0nfV43h4GFJQe2Fkh3VPkaoTjXNA"> -->
	</script>
</body>

</html>

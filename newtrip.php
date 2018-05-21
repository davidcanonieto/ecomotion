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
	<div class="container">
		<h2 id="text-center">Enter Location: </h2>
		<form id="location-form">
			<input type="text" id="location-input" class="form-control form-control-lg">
			<br>
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</form>
		<div class="card-block" id="formatted-address"></div>
		<div class="card-block" id="geometry"></div>
	</div>

	<!-- <div id="map"></div> -->

	<button onclick="destinationAddress();">Destino</button>
	<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqQiG0nfV43h4GFJQe2Fkh3VPkaoTjXNA"> -->
	</script>
</body>

</html>
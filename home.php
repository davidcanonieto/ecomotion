<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<?php include("pageincludes/nav.php"); ?>

	<?php  
		echo "Hola " . $_SESSION['username'];
		
	?>
	<br>
	<a href="pilot.php">
		<button>Ser piloto</button>
	</a>
	<br>
	<a href="passenger.php">
		<button>Ser pasajero</button>
	</a>

	<?php include("pageincludes/footer.php"); ?>
	
</body>
</html>
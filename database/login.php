<?php  

	/*ACCESO A LA BASE DE DATOS*/
	
	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = mysqli_connect($servername, $username, $password);


	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM ecomove.users WHERE email = '$email'";

	$result = $conn->query($sql);


	if ($result->num_rows > 0) { 

		$row = $result->fetch_array(MYSQLI_ASSOC);

		if (password_verify($password, $row['password'])) { 

			/*$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
			*/

			if (password_needs_rehash($row['password'], PASSWORD_DEFAULT)) {

				//EN CASO DE QUE EL HASH DEL PASSWORD NECESITE SER RESHEADO

				$newPassword = password_hash($row['password'], PASSWORD_DEFAULT);

				$sql = "UPDATE ecomove.users SET password = '" + $newPassword + "' WHERE email = '$email'";
			}

			header("location:../home.php");
			
		}
		else{
			// echo "Username o Password incorrectos.";

			// echo "<br><a href='login.html'>Volver a Intentarlo</a>";

			header("location:../index.php?success=false");
			
		}



	} 
	else { 

		// echo "Username o Password incorrectos.";

		// echo "<br><a href='login.html'>Volver a Intentarlo</a>";

		header("location:../index.php?success=false");
	}
	 
	$conn->close();



?>
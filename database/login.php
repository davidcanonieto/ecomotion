<?php  

	session_start();
	/*ACCESO A LA BASE DE DATOS*/
	
	require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE email = '$email'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) { 

		$row = $result->fetch_array(MYSQLI_ASSOC);

		if (password_verify($password, $row['password'])) { 

			$_SESSION['loggedin'] = true;
			$_SESSION['id'] = $row['id'];
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
		
			if (password_needs_rehash($row['password'], PASSWORD_DEFAULT)) {

				//EN CASO DE QUE EL HASH DEL PASSWORD NECESITE SER RESHEADO

				$newPassword = password_hash($row['password'], PASSWORD_DEFAULT);

				$sql = "UPDATE users SET password = '" + $newPassword + "' WHERE email = '$email'";

				$conn->query($sql);
			}

			header("location:../home.php");
		}
		else{
			header("location:../index.php?success=false");
		}
	} 
	else { 
		header("location:../index.php?success=false");
	}
	 
	$conn->close();



?>
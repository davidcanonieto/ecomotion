<?php 

		function login () {
			if (isset($_POST['email']) && isset($_POST['password'])) {
		 	
				/*ACCESO A LA BASE DE DATOS*/
			
				require './database/dbConnection.php';
				$conn = newDBConnection();


				$email = $_POST['email'];
				$password = $_POST['password'];

				$sql = "SELECT * FROM users WHERE email = '$email'";

				$result = $conn->query($sql);


				if ($result->num_rows > 0) { 

					$row = $result->fetch_array(MYSQLI_ASSOC);

					if (password_verify($password, $row['password'])) { 

						$_SESSION['loggedin'] = true;
						$_SESSION['userid'] = $row['id'];
						$_SESSION['username'] = $row['name'];
						$_SESSION['start'] = time();
						$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
						

						//echo "Bienvenido!";
						header("Location: home.php");

						if (password_needs_rehash($row['password'], PASSWORD_DEFAULT)) {

							//EN CASO DE QUE EL HASH DEL PASSWORD NECESITE SER RESHEADO

							$newPassword = password_hash($row['password'], PASSWORD_DEFAULT);

							$sql = "UPDATE users SET password = '" + $newPassword + "' WHERE email = '$email'";
						}
						
					}
					else{
						echo "Username o Password incorrectos.";

						echo "<br><a href='login.html'>Volver a Intentarlo</a>";
					}



				} 
				else { 

					echo "Username o Password incorrectos.";

					echo "<br><a href='login.html'>Volver a Intentarlo</a>";
				}
				
				$conn->close();

			} 
		}
	?>
<?php  
		if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['date'])) {

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ecomove";

			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			$name = $_POST['fname'];
			$lastname = $_POST['lname'];
			$email = $_POST['email'];
			$userpassword = $_POST['password1'];
			$rawdate = htmlentities($_POST['date']);
			$birthdate = date('Y-m-d', strtotime($rawdate));

			$hash = password_hash($userpassword, PASSWORD_DEFAULT);

			//Insert User to the database

			$sql = "SELECT * FROM users WHERE email = '$email'";

			$result = $conn->query($sql);


			if ($result->num_rows == 0) { 

				//EL DIRECTORIO DONDE SE VAN A GUARDAR LAS IMAGENES
				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
				    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				    if($check !== false) {
				        echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;
				    } else {
				        echo "El archivo no es una foto";
				        $uploadOk = 0;
				    }
				}

				$temp = explode(".", $_FILES["file"]["name"]);
				$target_file = $target_dir . basename(round(microtime(true)) . '.' . end($temp));

				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        	echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }

			   	$photo = "default.png";

			   	if ($_FILES["fileToUpload"]["name"] != "") {
			   		$photo = $_FILES["fileToUpload"]["name"];
			   	}

				$sql = "INSERT INTO users (email, password, name, lastname, birthdate, foto) VALUES ('$email', '$hash', '$name', '$lastname', '$birthdate', '$photo')";

				if ($conn->query($sql) === TRUE) {

				    header("location:../index.php");
				} else {
					
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}

			}
			else{
				header("location:../index.php?signup=false");

			}

			$conn->close();

		}
    ?>
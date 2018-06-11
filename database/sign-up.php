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

		$name = ucfirst($_POST['fname']);
		$lastname = ucfirst($_POST['lname']);
		$email = $_POST['email'];
		$userpassword = $_POST['password1'];
		$rawdate = htmlentities($_POST['date']);
		$birthdate = date('Y-m-d', strtotime($rawdate));

		$hash = password_hash($userpassword, PASSWORD_DEFAULT);

		//Insert User to the database

		$sql = "SELECT * FROM users WHERE email = '$email'";

		$result = $conn->query($sql);

		if ($result->num_rows == 0) { 

			$target_dir = "../images/profilePictures/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if (isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if ($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}

			$photo = "default.png";

			if ($_FILES["fileToUpload"]["name"] != "") {
				$photo = $_FILES["fileToUpload"]["name"];
			}

			$sql = "INSERT INTO users (email, password, name, lastname, birthdate, foto) VALUES ('$email', '$hash', '$name', '$lastname', '$birthdate', '$photo')";

			if ($conn->query($sql) === TRUE) {

				$sql1 = "SELECT * FROM users WHERE email = '$email'";

				
				$result1 = $conn->query($sql1);
				
				if ($result1->num_rows > 0) { 
					$row = $result1->fetch_array(MYSQLI_ASSOC);	
					session_start();

					$_SESSION['loggedin'] = true;
					$_SESSION['id'] = $row['id'];

						
					header("location:../home.php");
				}
				else{
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

		}
		else{
			//header("location:../index.php?signup=false");
			echo "Error: " . $sql . "<br>" . $conn->error;

		}

		$conn->close();

	}
?>
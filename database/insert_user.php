<?php  

	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = mysqli_connect($servername, $username, $password);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$userpassword = $_POST['password'];
	$rawdate = htmlentities($_POST['birthday']);
	$birthday = date('Y-m-d', strtotime($rawdate));

	$hash = password_hash($userpassword, PASSWORD_DEFAULT);

	//Insert User to the database

	$sql = "SELECT * FROM ecomove.users WHERE email = '$email'";

	$result = $conn->query($sql);


	if ($result->num_rows == 0) { 
		$sql = "INSERT INTO ecomove.users (email, password, name, lastname, birthdate) VALUES ('$email', '$hash', '$name', '$lastname', '$birthday')";

		if ($conn->query($sql) === TRUE) {

		    echo "New user added successfully";
		} else {
			
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
	else{
		echo "Email ya registrado";
	}

	

	$conn->close();





?>
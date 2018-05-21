<?php  

		function redirect($url) {
		    ob_start();
		    header('Location: '.$url);
		    ob_end_flush();
		    die();
		}

		if (isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['year']) && isset($_POST['matricula'])) {
            
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "ecomove";

			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			$marca = $_POST['marca'];
			$modelo = $_POST['modelo'];
			$matricula = $_POST['matricula'];
            $year = $_POST['year'];
            $type = $_POST['combustible'];
            $plazas = $_POST['plazas'];

			$sql = "SELECT * FROM cars WHERE license_plate = '$matricula'";

			$result = $conn->query($sql);

			if ($result->num_rows == 0) { 

				//EL DIRECTORIO DONDE SE VAN A GUARDAR LAS IMAGENES
				$target_dir = "../images/carPictures/";
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
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                
                 $photo = "default.png";

                if ($_FILES["fileToUpload"]["name"] != "") {
                    $photo = $_FILES["foto"]["name"];
                }

				$sql = "INSERT INTO cars (maker, model, year, seats, license_plate, cat_code, picture) VALUES ('$marca', '$modelo', '$year', '$plazas', '$matricula', '$type', '$photo')";

				if ($conn->query($sql) === TRUE) {

				    // header("location:../index.php");
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
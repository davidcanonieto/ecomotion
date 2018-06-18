<?php  

    session_start();

    if (isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['year']) && isset($_POST['matricula'])) {
        
        require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


        $id = $_SESSION['id'];

        $marca = ucfirst($_POST['marca']);
        $modelo = ucfirst($_POST['modelo']);
        $matricula = strtoupper($_POST['matricula']);
        $year = $_POST['year'];
        $type = $_POST['combustible'];
        $plazas = $_POST['plazas'] - 1;

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
                $photo = "default.jpg";

            if ($_FILES["fileToUpload"]["name"] != "") {
                $photo = $_FILES["fileToUpload"]["name"];
            }

            $sql = "INSERT INTO cars (maker, model, year, seats, license_plate, cat_code, picture) VALUES ('$marca', '$modelo', '$year', '$plazas', '$matricula', '$type', '$photo')";

            if ($conn->query($sql) === TRUE) {
                $sql = "INSERT INTO possessions  VALUES ('$id','$matricula')";

                if ($conn->query($sql) === TRUE) {
                    header("location:../home.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }
        else{
            header("location:../home.php");
        }

        $conn->close();

    }
?>
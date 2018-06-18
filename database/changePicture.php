<?php  


require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



    session_start();
    $id = $_SESSION['id'];

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

    $sql = "UPDATE users SET foto = '$photo' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['profileImage'] = $photo;
        header("location:../preferences.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



    $conn->close();


?>
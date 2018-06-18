<?php
require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


    $id = $_SESSION['id'];

	$sql = "SELECT * FROM possessions WHERE id = '$id'";



    if ($result = mysqli_query($conn,$sql)) {

        $rowcount = mysqli_num_rows($result);

        if ($rowcount == 0) {
            include ("location:./pageincludes/addCarButton");
        } else {
            $row = mysqli_fetch_assoc($result);
            // header("location:.pageincludes/carInfo.php/" . $row['license_plate']);
            include ("myTrips.php");

        }
    }
    else {
	    echo  $conn->error;
	}
    
    $conn->close();
?>
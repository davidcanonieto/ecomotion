<?php
require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



session_start();

$id = $_SESSION['id'];

$sql = "SELECT * FROM possessions WHERE id = '$id'";

if ($result = mysqli_query($conn, $sql)) {

    $row = mysqli_fetch_assoc($result);

    $license_plate = $row['license_plate'];

    $query = "DELETE FROM possessions WHERE license_plate = '$license_plate'";


    if (mysqli_query($conn, $query)) {

        $query1 = "DELETE FROM cars WHERE license_plate = '$license_plate'";

        if (mysqli_query($conn, $query1)) {
            header("location:../preferences.php");
        }

    } else {
        header("location:../message.php?message=error");
    }

} else {
    header("location:../message.php?message=error");

}

$conn->close();

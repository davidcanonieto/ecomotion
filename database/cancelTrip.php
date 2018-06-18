<?php
require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



session_start();

$tripCode = $_GET['tripCode'];
$id = $_SESSION['id'];

$query = "DELETE FROM trips WHERE trip_code = $tripCode AND passenger_id = $id";

if (mysqli_query($conn, $query)) {
    header("location:../myTrips.php");
} else {
    header("location:../message.php?message=error");
}

$conn->close();

?>
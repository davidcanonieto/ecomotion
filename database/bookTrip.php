<?php
session_start();
require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$id = $_SESSION['id'];
$tripCode = $_GET['trip_id'];
$seats = $_GET['seats'];

$sql = "SELECT * FROM trip_details WHERE trip_code = '$tripCode'";

if ($result = $conn->query($sql)) {

    $row = $result->fetch_array(MYSQLI_ASSOC);

    $cost = $row["cost"];

    $sql = "UPDATE users SET wallet = wallet - $cost WHERE id = $id";

    if ($result = $conn->query($sql)) {

    } else {
        echo $conn->error;
    }

    $sql = "UPDATE trip_details SET seats = seats - $seats WHERE trip_code = $tripCode";

    if ($result = $conn->query($sql)) {

    } else {
        echo $conn->error;
    }

    $sql = "INSERT INTO trips (passenger_id, trip_code, seats) VALUES ($id, $tripCode, $seats)";

    if ($result = $conn->query($sql)) {

    } else {
        echo $conn->error;
    }

    header("location:../message.php?message=bookedTrip");



} else {
    echo $conn->error;
}

$conn->close();

?>
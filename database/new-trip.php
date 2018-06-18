<?php
    require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



    session_start();

    $id = $_SESSION['id'];
    $olat = $_SESSION["olat"];
    $olng = $_SESSION["olng"];
    $dlat = $_SESSION["dlat"];
    $dlng = $_SESSION["dlng"];
    $time = $_SESSION["time"];
    $date = $_SESSION["date"];
    $seats = $_SESSION["seats"];
    $cost = $_GET["code"];

    $sql = "INSERT INTO trip_details (id, trip_date, trip_time, origin_lat, origin_lng, destiny_lat, destiny_lng, seats, cost) 
            VALUES ('$id', '$date', '$time', '$olat', '$olng', '$dlat', '$dlng', '$seats', $cost)";

    if ($conn->query($sql) === TRUE) {
        header("location:../message.php?message=save-trip");

    }
    else {
        echo $sql;
        echo '<br>';
        echo $conn->error;
        header("location:../message.php?message=error");

    }

    $conn->close();
?>
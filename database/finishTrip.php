<?php
require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

$tripCode = $_GET['tripCode'];
$seats = $_GET['seats'];
$id = $_SESSION['id'];


// Actualizamos el estado del viaje.
$query1 = "UPDATE trip_details SET status = 'finished' WHERE trip_code = $tripCode";
echo $query1;
if (mysqli_query($conn, $query1)) {
} else {
    echo $conn->error;
}

// Seleccionamos el ID del piloto y el coste del viaje
$query2 = "SELECT cost, id FROM trip_details WHERE trip_code = $tripCode";
echo $query2;

if ($result2 = mysqli_query($conn, $query2)) {
    $row2 = mysqli_fetch_assoc($result2);
    $pilotID = $row2['id'];
    $cost = $row2['cost'];


    $query3 = "SELECT license_plate FROM possessions WHERE id = $id";

    if($result3 = mysqli_query($conn, $query3)){
        $row3 = mysqli_fetch_assoc($result3);

        $licensePlate = $row3['license_plate'];

        $query4 = "SELECT cat_code FROM cars WHERE license_plate = '$licensePlate'";

        if ($result4 = mysqli_query($conn, $query4)) {
            $row4 = mysqli_fetch_assoc($result4);

            $cat = 0;

            switch ($row4['cat_code']) {
                case 1: 
                    $cat = 0.95;
                    break;
                case 2: 
                    $cat = 0.92;
                    break;
                case 3: 
                    $cat = 0.90;
                    break;
                case 4: 
                    $cat = 0.85;
            }

            $toPay = floatval($seats) * floatval($cost) * $cat;

            $query5 = "UPDATE users SET wallet = wallet + $toPay WHERE $id = $pilotID";
            echo $query5;

            if (mysqli_query($conn, $query5)) {
                header("location:../myTrips.php");
            } 
            else {
                echo $conn->error;
                header("location:../message.php?message=error");
            } 
        }
        else {
            echo $conn->error;
            header("location:../message.php?message=error");
        } 
    } 
    else {
        echo $conn->error;
        header("location:../message.php?message=error");
    } 
} 
else {
    echo $conn->error;
    header("location:../message.php?message=error");
} 






$conn->close();

?>

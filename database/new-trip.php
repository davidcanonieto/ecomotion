<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecomove";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    session_start();

    $olat = $_GET["olat"];
    $olng = $_GET["olng"];
    $dlat = $_GET["dlat"];
    $dlng = $_GET["dlng"];

    $seats = $_GET["seats"];
    $date = $_GET["date"];
    $time = $_GET["time"];

    $finalDate = strtotime($time . $date);


    $id = $_SESSION['id'];

    $origin = '{"OLAT": $olat, "OLNG": $olng}';
    $destination = '{ "DLAT": $dlat, "DLGN": $dlng}';

    $sql = "SELECT * FROM possessions WHERE id = '$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_array(MYSQLI_ASSOC);

        $sql = "INSERT INTO trips (id, trip_date, start_point, end_point, seats, cost) VALUES ('$id', '$finalDate', '$origin', '$destination', '$seats', 3)";
        echo $sql;
        $conn->query($sql);

        echo $conn->error;

    }
    else {
        echo $conn->error;

    }

    $conn->close();


?>
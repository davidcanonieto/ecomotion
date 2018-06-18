<?php

    $originLat = $_GET["olat"];
    $originLng = $_GET["olng"];
    $destinationLat = $_GET["dlat"];
    $destinationLng = $_GET["dlng"];
    $seats = $_GET["seats"];

    require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



    $trips = array();

    $radius = 0.007;

    if (floatval($originLat) > 0) {
        $maxOrLat = floatval($originLat) + $radius;
        $minOrLat = floatval($originLat) - $radius;
    } else {
        $maxOrLat = floatval($originLat) - $radius;
        $minOrLat = floatval($originLat) + $radius;
    }

    if (floatval($originLat) > 0) {
        $maxOrLng = floatval($originLng) + $radius;
        $minOrLng = floatval($originLng) - $radius;
    } else {
        $maxOrLng = floatval($originLng) - $radius;
        $minOrLng = floatval($originLng) + $radius;
    }

    if (floatval($originLat) > 0) {
        $maxDeLat = floatval($destinationLat) + $radius;
        $minDeLat = floatval($destinationLat) - $radius;
    } else {
        $maxDeLat = floatval($destinationLat) - $radius;
        $minDeLat = floatval($destinationLat) + $radius;
    }

    if (floatval($originLat) > 0) {
        $maxDeLng = floatval($destinationLng) + $radius;
        $minDeLng = floatval($destinationLng) - $radius;
    } else {
        $maxDeLng = floatval($destinationLng) - $radius;
        $minDeLng = floatval($destinationLng) + $radius;
    }

    $sql = "    SELECT * FROM trip_details
                            WHERE origin_lat >= $minOrLat
                                    AND origin_lat <= $maxOrLat
                                    AND origin_lng >= $minOrLng
                                    AND origin_lng <= $maxOrLng
                                    AND destiny_lat >= $minDeLat
                                    AND destiny_lat <= $maxDeLat
                                    AND destiny_lng >= $minDeLng
                                    AND destiny_lng <= $maxDeLng
                                    AND seats >= $seats
                                    AND status = 'active'";

    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $trip = array(
                "originLat" => $row['origin_lat'],
                "originLng" => $row['origin_lng'],
                "destinationLat" => $row['destiny_lat'],
                "destinationLng" => $row['destiny_lng'],
                "seats" => $seats,
                "tripCode" => $row['trip_code'],
                "pilotId" => $row['id'],
                "tripDate" => $row['trip_date'],
                "tripTime" => $row['trip_time'],
                "availableSeats" => $row['seats'],
                "cost" => $row['cost'],
            );

            array_push($trips, $trip);

        }

        $tripsJson = json_encode($trips);


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 ?>
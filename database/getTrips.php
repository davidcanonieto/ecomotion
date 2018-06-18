<?php
// require 'config.ini.php';

if (!defined('DB_SERVER')) {
    require 'config.ini.php';

}

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $id = $_SESSION['id'];
    $trips = array();

    $query = "SELECT seats, trip_code FROM trips WHERE passenger_id = $id AND trip_code IN ( SELECT trip_code FROM trip_details WHERE status = 'active')";

    if ($result = mysqli_query($conn, $query)) {

        while ($row = mysqli_fetch_assoc($result)) {

            $query2 = "SELECT * FROM trip_details WHERE trip_code = " . $row['trip_code'];

            if ($result2 = mysqli_query($conn, $query2)) {

                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $trip = array(
                        "originLat" => $row2['origin_lat'],
                        "originLng" => $row2['origin_lng'],
                        "destinationLat" => $row2['destiny_lat'],
                        "destinationLng" => $row2['destiny_lng'],
                        "seats" => $row['seats'],
                        "tripCode" => $row2['trip_code'],
                        "tripDate" => $row2['trip_date'],
                        "tripTime" => $row2['trip_time'],
                        "cost" => $row2['cost']
                    );

                    array_push($trips, $trip);
                }
            }
        }

    } 

    $query = "  SELECT seats, trip_code FROM trips WHERE trip_code IN ( SELECT trip_code FROM trip_details WHERE id = $id AND status = 'active')";

    if ($result = mysqli_query($conn, $query)) {

        while ($row = mysqli_fetch_assoc($result)) {

            $query2 = "SELECT * FROM trip_details WHERE trip_code = " . $row['trip_code'];

            if ($result2 = mysqli_query($conn, $query2)) {

                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $trip = array(
                        "originLat" => $row2['origin_lat'],
                        "originLng" => $row2['origin_lng'],
                        "destinationLat" => $row2['destiny_lat'],
                        "destinationLng" => $row2['destiny_lng'],
                        "seats" => $row['seats'],
                        "tripCode" => $row2['trip_code'],
                        "tripDate" => $row2['trip_date'],
                        "tripTime" => $row2['trip_time'],
                        "cost" => $row2['cost'],
                    );

                    array_push($trips, $trip);
                }
            }
            else {
                echo $conn->error;
            }
        }

        $tripsLength = count($trips);

        $tripsOpenJson = json_encode($trips);

    }

    $trips = array();

    $query = "SELECT seats, trip_code FROM trips WHERE passenger_id = $id AND trip_code IN ( SELECT trip_code FROM trip_details WHERE status = 'finished')";

    if ($result = mysqli_query($conn, $query)) {

        while ($row = mysqli_fetch_assoc($result)) {

            $query2 = "SELECT * FROM trip_details WHERE trip_code = " . $row['trip_code'];

            if ($result2 = mysqli_query($conn, $query2)) {

                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $trip = array(
                        "originLat" => $row2['origin_lat'],
                        "originLng" => $row2['origin_lng'],
                        "destinationLat" => $row2['destiny_lat'],
                        "destinationLng" => $row2['destiny_lng'],
                        "seats" => $row['seats'],
                        "tripCode" => $row2['trip_code'],
                        "tripDate" => $row2['trip_date'],
                        "tripTime" => $row2['trip_time'],
                        "cost" => $row2['cost'],
                    );

                    array_push($trips, $trip);
                }
            }
        }



    }

    $query = "SELECT seats, trip_code FROM trips WHERE trip_code IN ( SELECT trip_code FROM trip_details WHERE id = $id AND status = 'finished') ";

if ($result = mysqli_query($conn, $query)) {

    while ($row = mysqli_fetch_assoc($result)) {

        $query2 = "SELECT * FROM trip_details WHERE trip_code = " . $row['trip_code'];

        if ($result2 = mysqli_query($conn, $query2)) {

            while ($row2 = mysqli_fetch_assoc($result2)) {
                $trip = array(
                    "originLat" => $row2['origin_lat'],
                    "originLng" => $row2['origin_lng'],
                    "destinationLat" => $row2['destiny_lat'],
                    "destinationLng" => $row2['destiny_lng'],
                    "seats" => $row['seats'],
                    "tripCode" => $row2['trip_code'],
                    "tripDate" => $row2['trip_date'],
                    "tripTime" => $row2['trip_time'],
                    "cost" => $row2['cost'],
                );

                array_push($trips, $trip);
            }
        }
    }

    $tripsFinishedJson = json_encode($trips);

}



    $conn->close();
?>
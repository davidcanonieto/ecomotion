<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    session_start();

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM ecomove.users WHERE id = '$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_array(MYSQLI_ASSOC);

        if (password_verify($password, $row['password'])) {

            $newPassword = password_hash($row['password'], PASSWORD_DEFAULT);

            $newCredit = $row['wallet'] + $recarga;

            
            $sql = "INSERT INTO trips (trip_code, id, trip_date, start_point, end_point, seats, cost) VALUES ('$email', '$hash', '$name', '$lastname', '$birthdate', '$photo')";


            $conn->query($sql);

           

        } else {
            
        }
    }

    $conn->close();


?>
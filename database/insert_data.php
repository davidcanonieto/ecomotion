<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecomove";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // $sql = "INSERT INTO admin (email, password) VALUES ('davidcano', 'ecomotion')";


    $sql = "INSERT INTO categories (cat_code, fuel) VALUES ('01', 'electric');";
    $sql .= "INSERT INTO categories (cat_code, fuel) VALUES ('02', 'hybrid');";
    $sql .= "INSERT INTO categories (cat_code, fuel) VALUES ('03', 'petrol');";
    $sql .= "INSERT INTO categories (cat_code, fuel) VALUES ('04', 'diesel');";

    if (mysqli_multi_query($conn, $sql)) {
        echo "Añadido";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
    mysqli_close($conn);


?>
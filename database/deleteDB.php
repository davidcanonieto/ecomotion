<?php
require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


    echo 'Connected successfully<br>';
    $sql = "DROP DATABASE ECOMOTION";

    if (mysqli_query($conn, $sql)) {
        header("location:../backOffice.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);


?>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password);

    if (!$conn) {
        echo 'Connected failure<br>';
    }
    echo 'Connected successfully<br>';
    $sql = "DROP DATABASE ECOMOVE";

    if (mysqli_query($conn, $sql)) {
        header("location:../backOffice.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);


?>

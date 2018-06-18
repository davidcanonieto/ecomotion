<?php
if (isset($_POST['recarga']) && isset($_POST['password'])) {

   require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



    session_start();


    echo $_SESSION['id'];
    echo $_SESSION['credit'];


    $tripCode = $_SESSION['tripCode'];
    $seats = $_SESSION['seats'];
    $recarga = $_POST['recarga'];
    $password = $_POST['password'];
    $id = $_SESSION['id'];

    $sql = "SELECT * FROM users WHERE id = '$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_array(MYSQLI_ASSOC);

        if (password_verify($password, $row['password'])) {

            $newPassword = password_hash($row['password'], PASSWORD_DEFAULT);

            $newCredit = $row['wallet'] + $recarga;

            $sql = "UPDATE users SET wallet = $newCredit WHERE id = '$id'";

            $conn->query($sql);

            header("location:../bookTrip.php?id=$tripCode&seats=$seats");

        } else {
            header("location:../bookTrip.php?id=$tripCode&seats=$seats&error=password");

        }
    } 

    $conn->close();
}

?>

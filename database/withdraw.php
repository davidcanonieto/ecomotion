<?php
if (isset($_POST['withdraw']) && isset($_POST['password'])) {
    require 'config.ini.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



    session_start();

    echo $_SESSION['id'];
    echo $_SESSION['credit'];

    $withdraw = $_POST['withdraw'];
    $password = $_POST['password'];
    $id = $_SESSION['id'];

    $sql = "SELECT * FROM users WHERE id = '$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_array(MYSQLI_ASSOC);


        $newCredit = $row['wallet'] - $withdraw;

        $sql = "UPDATE users SET wallet = $newCredit WHERE id = '$id'";

        $conn->query($sql);

        header("location:../message.php?message=withdraw");


    }
    else {
        header("location:../withdraw.php?success=false");
    }

    $conn->close();
}

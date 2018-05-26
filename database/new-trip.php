<?php
if (isset($_POST['recarga']) && isset($_POST['password'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    session_start();

    echo $_SESSION['id'];
    echo $_SESSION['credit'];

    $recarga = $_POST['recarga'];
    $password = $_POST['password'];
    $id = $_SESSION['id'];

    $sql = "SELECT * FROM ecomove.users WHERE id = '$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_array(MYSQLI_ASSOC);

        if (password_verify($password, $row['password'])) {

            $newPassword = password_hash($row['password'], PASSWORD_DEFAULT);

            $newCredit = $row['wallet'] + $recarga;

            $sql = "UPDATE ecomove.users SET wallet = $newCredit WHERE id = '$id'";

            $conn->query($sql);

            header("location:../topup.php");

        } else {
            header("location:../topup.php?success=false");
        }
    }

    $conn->close();
}

?>
<?php

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "david.cano@ecomotion.com" && $password == "ecomotionadmin") {
        header("location:../backOffice.php");
    } else {
        header("location:../adminLogin.php?success=false");
    }

?>

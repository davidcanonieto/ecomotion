<?php
    session_start();
    $_SESSION["olat"] = $_GET["olat"];
    $_SESSION["olng"] = $_GET["olng"];
    $_SESSION["dlat"] = $_GET["dlat"];
    $_SESSION["dlng"] = $_GET["dlng"];

    $_SESSION["seats"] = $_GET["seats"];
    $_SESSION["date"] = $_GET["date"];
    $_SESSION["time"] = $_GET["time"];

    header("location:../message.php?message=upload-trip");
?>
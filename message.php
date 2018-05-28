<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "pageincludes/bootstrap-head.php";?>
	<script src="./js/sidenav.js"></script>
	<link rel="stylesheet" href="./css/custom-sidenav.css">
</head>
<body>

	<!-- <?php include "pageincludes/nav.php";?> -->

	<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_SESSION['id'];

$sql = "SELECT * FROM ecomove.users WHERE id = '$id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_array(MYSQLI_ASSOC);

    $_SESSION['name'] = $row['name'];
    $_SESSION['profileImage'] = $row['foto'];
}

$conn->close();
?>


	<?php include "pageincludes/sidenav.php";?>


	<div id="main">
		<h1 class="text-center logo-title mt-1 mb-5">EcoMotion</h1>

        <?php
            if (isset($_GET["message"])) {
                if ($_GET["message"] == 'add-car') {
                    include "pageincludes/addCar.php";
                }
                if ($_GET["message"] == 'reservation') {
                    include "pageincludes/reservation.php";
                }
            }
        ?>

    <?php include "pageincludes/bootstrap-body.php";?>

</body>
</html>
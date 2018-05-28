<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "pageincludes/bootstrap-head.php";?>
	<script src="./js/sidenav.js"></script>
    <link rel="stylesheet" href="./css/custom-sidenav.css">
    <link rel="stylesheet" href="./css/maps.css">
</head>
<body>

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
                if ($_GET["message"] == 'upload-trip') {
                    include "pageincludes/uploadTrip.php";
                }

            }
        ?>
    </div>

    <?php include "pageincludes/bootstrap-body.php";?>

</body>
</html>
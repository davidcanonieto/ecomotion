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

                $message = $_GET["message"];

                switch($message) {
                    case 'add-car': 
                        include "pageincludes/addCar.php";
                        break;
                    case 'reservation': 
                        include "pageincludes/reservation.php";
                        break;
                    case 'upload-trip': 
                        include "pageincludes/uploadTrip.php";
                        break;
                    case 'error': 
                        include "pageincludes/error.php";
                        break;
                    case 'save-trip': 
                        include "pageincludes/trip-saved.php";
                        break;
                    case 'topup': 
                        include "pageincludes/topup.php";
                        break;
                    case 'withdraw': 
                        include "pageincludes/withdraw.php";
                        break;
                    case 'bookedTrip': 
                        include "pageincludes/bookedTrip.php";
                        break;
                    case 'noTrips': 
                        include "pageincludes/noTripsFound.php";
                        break;
                    default:
                        include "pageincludes/error.php";
                }
            }
            else {
                include "pageincludes/error.php";
            }
        ?>
    </div>

    <?php include "pageincludes/bootstrap-body.php";?>

</body>
</html>
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
    <div class="modal fade" id="closeSession" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">¿Ya te vas?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Te vamos a echar de menos :(
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeNav()">Cancelar</button>
					<a href="./database/close-session.php" class="btn btn-primary">Cerrar sesión</a>
				</div>
			</div>
		</div>
    </div>
    
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <header class="mdl-layout__header dark-primary-color">
            <div class="mdl-layout__header-row dark-primary-color">
                <div aria-expanded="false" role="button" tabindex="0" class="mdl-layout__drawer-button dark-primary-color text-white">
                    <i class="material-icons"></i>
                </div>
                <a href="./home.php" class="back-home-button">
					<i class="material-icons text-white">home</i>
				</a>
            </div>
        </header>
        <div class="demo-drawer mdl-layout__drawer default-primary-color">
            <header class=" default-primary-color pt-5">
                <div class=" default-primary-color">
                    <div 
                        class="profile-picture-background" 
                        style="background-image: url(./images/profilePictures/<?php echo $_SESSION['profileImage']?>)">
                    </div>
                </div>
                <p class="mt-4 text-center text-white font-weight-bold" default-primary-color>
                    <?php echo $_SESSION['name'] . " " . $_SESSION['lastname'] ?>
                </p>
            </header>
            <nav class="demo-navigation mdl-navigation bg-primary-color">
                <?php include "pageincludes/sidenav.php";?>
            </nav>
        </div>
        <main class="mdl-layout__content ">
            <div class="mdl-grid demo-content">
                <div class="mdl-color--white mdl-cell mdl-cell--12-col text-center ">
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
                </div>
            </div>
        </main>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">¿Todo correcto?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Pulsa Guardar Viaje si todos los datos del viaje son correctos.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Volver</button>
                    <button type="button" class="btn btn-primary" onclick="saveTripInDatabase()">Guardar viaje</button>
                </div>
            </div>
        </div>
    </div>

    <?php include "pageincludes/bootstrap-body.php";?>

</body>

</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "pageincludes/bootstrap-head.php";?>
    <script src="./js/show-trips-api.js"></script>
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
    
        <!-- Modal -->
    <div class="modal fade" id="newPicture" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                
                <div class="modal-body">
                    <form action="database/changePicture.php" method="post" autocomplete="on" name="register" enctype="multipart/form-data">

                        <img src="./images/appPictures/user.png" class="user-icon mt-3">
                        <div class="form-group text-center mt-4">
                            <label for="fileToUpload" class="btn btn-info">
                                <i class="fa fa-camera mr-1"> </i>Subir foto</label>
                            <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" class="hidden" required>
                        </div>

                        
                        <div class="text-center mt-3">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="cancelTrip" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">¿Cancelar viaje?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    La cancelación de viajes tiene una penalización del 5% del coste total del viaje.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="cancelTrip()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="finishTrip" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">¿Ya has llegado?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Esperamos que hayas tenido un viaje agradable. Gracias por usar EcoMotion :)
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="finishTrip()">Confirmar</button>
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
                    <div class="profile-picture-background" style="background-image: url(./images/profilePictures/<?php echo $_SESSION['profileImage']?>)">
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
                <div class="mdl-cell mdl-cell--12-col">
                    <h1 class="text-center logo-title mt-2 ">EcoMotion</h1>
                </div>
                <div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col text-center">
                    <?php include "pageincludes/userInfo.php";?>
                </div>

                <div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col text-center">
                    <?php
                        

                        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }


                        $id = $_SESSION['id'];

                        $sql = "SELECT * FROM possessions WHERE id = '$id'";

                        if ($result = mysqli_query($conn, $sql)) {

                            $rowcount = mysqli_num_rows($result);

                            if ($rowcount == 0) {
                                include "pageincludes/addCarButton.php";
                            } else {
                                $row = mysqli_fetch_assoc($result);
                                include "pageincludes/carInfo.php";
                            }
                        } else {
                            echo $conn->error;
                        }

                        $conn->close();
                    ?>
                </div>
            </div>
        </main>
    </div>

    <?php include "pageincludes/bootstrap-body.php";?>

</body>

</html>
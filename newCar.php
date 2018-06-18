<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "pageincludes/bootstrap-head.php";?>
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
				<div class="mdl-cell mdl-cell--12-col">
					<h1 class="text-center logo-title mt-2 ">EcoMotion</h1>
				</div>
				<div class="mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col">
                    <h3 class="text-center">Registrar nuevo coche</h3>
                    <div class="form-app">
                        <form action="database/insert_car.php" method="post" autocomplete="on" name="register" enctype="multipart/form-data">
                            <div class="md-form">
                                <input type="text" class="form-control" required="required" name="marca" id="marca">
                                <label for="marca">Marca</label>
                            </div>
                            <div class="md-form">
                                <input type="text" class="form-control" required="required" name="modelo" id="modelo">
                                <label for="modelo">Modelo</label>
                            </div>
                            <div class="md-form">
                                <label for="matricula">Matrícula:</label>
                                <input type="text" class="form-control" required="required" name="matricula" id="matricula">
                            </div>
                            <div class="md-form">
                                <label for="year">Año:</label>
                                <input type="number" class="form-control" min="1980" max="<?php echo date("Y");?>" required="required" name="year" id="year">
                            </div>
                            <div class="form-group">
                                <label for="plazas">Plazas</label>
                                <select class="form-control" name="plazas" id="plazas" required="required">
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="combustible">Combustible</label>
                                <select class="form-control" name="combustible" required="required" id="combustible">
                                    <option value="01">Eléctrico</option>
                                    <option value="02">Híbrido</option>
                                    <option value="03">Gasolina</option>
                                    <option value="04">Diesel</option>
                                </select>
                            </div>
                            <div class="form-group text-center mt-4">
                                <label for="fileToUpload" class="btn btn-primary">
                                    <i class="fa fa-camera mr-1"> </i>Subir foto</label>
                                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" class="hidden">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary mx-auto" id="registerButton">Registrarse</button>
                            </div>
                    
                        </form>
                    </div>
				</div>
			</div>
		</main>
	</div>



	<?php include "pageincludes/bootstrap-body.php";?>

</body>

</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "pageincludes/bootstrap-head.php";?>

    <?php
        require 'database/config.ini.php';

        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $id = $_SESSION['id'];

        $sql = "SELECT * FROM users WHERE id = '$id'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $row = $result->fetch_array(MYSQLI_ASSOC);

            $_SESSION['credit'] = $row['wallet'];
            $_SESSION['email'] = $row['email'];

        }

        $conn->close();
    ?>
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
                    <?php echo $_SESSION['name'] . " " . $_SESSION['lastname']?>
                </p>
            </header>
            <nav class="demo-navigation mdl-navigation bg-primary-color">
                <?php include("pageincludes/sidenav.php"); ?>
            </nav>
        </div>
        <main class="mdl-layout__content ">
            <div class="mdl-grid demo-content">
                <div class="mdl-cell mdl-cell--12-col">
                    <h1 class="text-center logo-title mt-2 ">EcoMotion</h1>
                </div>
                <div class=" mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--12-col text-center ">
                    <div id="main">
                        <img src="./images/appPictures/paypal.png" class="img-paypal">
                        <p class="text-center mb-0">Saldo actual:
                            <?php echo $_SESSION['credit'] ?> €</p>
                        <div class="login-form mt-3">
                            <form action="database/top-up.php" method="post">
                                <div class="text-center mb-5 btn-mobile">
                                    <div class="btn-group btn-mobile" role="group">
                                        <a class="btn btn-primary px-5 active" href="#">Recarga</a>
                                        <a class="btn btn-primary px-5" href="./withdraw.php">Retirar</a>
                                    </div>
                                </div>
                                <?php
                                    if (isset($_GET["success"]) && $_GET["success"] == 'false') {
                                        echo '<div class="alert alert-danger alert-dismissible">
                                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                                Contraseña erronea
                                                            </div>';
                                    }
                                ?>
                                <div class="form-group text-center">
                                    <label for="recarga" class="text-center">Recarga</label>
                                    <input type="number" step="any" min="0" max="100" class="form-control text-center" name="recarga" placeholder="10.00€" required>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <p class="text-center">
                                        <?php echo $_SESSION['email'] ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control text-center" name="password" placeholder="Contraseña" required>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary mx-auto d-block my-5">Recargar Saldo</button>
                            </form>
                            <p class="text-center mt-5">(*)Se realizará un cargo a la cuenta PayPal que tienes asociada a EcoMotion</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <?php include "pageincludes/bootstrap-body.php";?>

</body>

</html>
<!doctype html>
<html lang="en">
<head>
    <?php
        session_start();
        if (isset($_SESSION['id'])) {
            header("location:./home.php");
        }
    ?>
	<?php include("pageincludes/bootstrap-head.php"); ?>
</head>
<body class="background-color-index">
    
    <nav class="navbar navbar-expand-lg navbar-dark justify-content-between">
       <span class="navbar-brand">EcoMotion</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./index.php">Log In <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./signup.php">Crear Cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">¿Qué es EcoMotion?</a>
                </li>
        </div>    
    </nav>

        <!-- Card -->
    <div class="card login-form">

        <!-- Card body -->
        <div class="card-body">
            <form action="database/login.php" method="post">


                <img src="./images/appPictures/logo2.png" class="img-fluid img-login">

                <?php
                    if (isset($_GET["success"]) && $_GET["success"] == 'false') {
                        echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                Usuario/contraseña erroneos
                            </div>';
                    }
                    if (isset($_GET["signup"]) && $_GET["signup"] == 'false') {
                        echo '<div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                Usuario ya registrado
                            </div>';
                    }
                ?>

                <!-- Material input email -->
                <div class="md-form">
                    <input type="email" id="materialFormLoginEmailEx" class="form-control" name="email">
                    <label for="materialFormLoginEmailEx">Email</label>
                </div>

                <!-- Material input password -->
                <div class="md-form">
                    <input type="password" id="materialFormLoginPasswordEx" class="form-control" required="required" name="password">
                    <label for="materialFormLoginPasswordEx">Contraseña</label>
                </div>

                <p class="font-small blue-text d-flex justify-content-end"> <a href="#" class="blue-text ml-1">Recordar contraseña</a></p>

                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit">Entrar</button>
                </div>
                <div class="text-center mt-4">
                    <a href="./signup.php" class="btn btn-outline-primary waves-effect">Crear cuenta</a>
                </div>
            </form>

        </div>
        <!-- Card body -->

    </div>
    <!-- Card -->

    <?php include("pageincludes/footer.php"); ?>

    <?php include("pageincludes/bootstrap-body.php"); ?>

    
</body>

</html>
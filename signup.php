<!doctype html>
<html lang="en">

<head>
	<?php include("pageincludes/bootstrap-head.php"); ?>
	<script src="./js/password-checker.js"></script>
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
                <li class="nav-item ">
                    <a class="nav-link" href="./index.php">Log In</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./signup.php">Crear Cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">¿Qué es EcoMotion?</a>
                </li>
        </div>    
    </nav>
    

    <!-- Card -->
    <div class="card signup-form">
        <!-- Card body -->
        <div class="card-body">
            <form action="database/sign-up.php" method="post" autocomplete="on" name="register" enctype="multipart/form-data" class="mb-5">
                <img src="./images/appPictures/logo2.png" class="img-fluid img-signup mx-auto">
                <div class="row padding-form">
                    <div class="col-12 col-md-6 align-self-center padding-form">
                        <div class="md-form">
                            <input type="text" id="materialFormRegisterNameEx" class="form-control" required="required" name="fname">
                            <label for="materialFormRegisterNameEx">Nombre</label>
                        </div>

                        <div class="md-form">
                            <input type="text" id="materialFormRegisterLastnameEx" class="form-control" required="required" name="lname">
                            <label for="materialFormRegisterLastnameEx">Apellidos</label>
                        </div>

                        <!-- Material input email -->
                        <div class="md-form">
                            <input type="email" id="materialFormRegisterEmailEx" class="form-control" required="required" name="email">
                            <label for="materialFormRegisterEmailEx" data-error="wrong" data-success="right">Email</label>
                        </div>

                        <!-- Material input password -->
                        <div class="md-form">
                            <input type="password" id="materialFormRegisterPasswordEx" class="form-control" required="required" name="password1">
                            <label for="materialFormRegisterPasswordEx" data-error="wrong" data-success="right">Contraseña</label>
                        </div>

                        <!-- Material input password -->
                        <div class="md-form">
                            <input type="password" id="materialFormRegisterPassword1Ex" class="form-control" required="required" name="password2" onchange="checkPassword();">
                            <label for="materialFormRegisterPassword1Ex">Confirmar contraseña</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 align-self-center padding-form">
                        <label>Genero:</label>
                        <div class="form-check mb-4 ml-4">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Hombre
                            </label>
                        </div>
                        <div class="form-check mb-4 ml-4">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" >
                            <label class="form-check-label" for="exampleRadios2">
                                Mujer
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="date">Fecha de nacimiento:</label>
                            <input class="form-control" id="date" name="date" type="date"/>
                            <small id="passwordHelpBlockMD" class="form-text text-muted">
                                Debes ser mayor de 18 años.
                            </small>
                        </div>
                        <div class="form-group text-center mt-4">
                            <label for="fileToUpload" class="btn btn-primary"><i class="fa fa-camera mr-1"> </i>Subir foto</label>
                            <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" class="hidden">
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-primary" type="submit">Registrarme</button>
                </div>
                <hr>
                <div class="text-center mt-4">
                    <a href="./index.php" class="btn btn-outline-primary waves-effect">Ya tengo cuenta</a>
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
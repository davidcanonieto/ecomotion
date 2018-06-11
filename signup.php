<!doctype html>
<html lang="en">

<head>
	<?php include("pageincludes/bootstrap-head.php"); ?>
	<script src="./js/password-checker.js"></script>
</head>

<body>

    <div class="bg">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">EcoMotion</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Nueva Cuenta
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">¿Qué es EcoMotion?</a>
                    </li>
                </ul>
            </div>

        </nav>

        <div class="login-form mb-5">  
            <form action="database/sign-up.php" method="post" autocomplete="on" name="register" enctype="multipart/form-data" class="mb-5">
            <img src="http://daw1.hol.es/images/lizard2.png" class="img-fluid img-signup mx-auto">
                <h2 class="text-center login-title">EcoMotion</h2>
                <div class="form-group">
                    <label class="control-label">Datos personales:</label>
                    <input type="text" class="form-control" placeholder="Nombre" required="required" name="fname">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Apellidos" required="required" name="lname">
                </div>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email" required="required" name="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Contraseña" required="required" name="password1">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Repetir contraseña" required="required" name="password2" onchange="checkPassword();">
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label" for="date">Fecha de nacimiento:</label>
                    <input class="form-control" id="date" name="date" type="date"/>
                </div>
                <div class="form-group">
                    <label for="foto">Subir foto:</label>
                    <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary" id="registerButton" disabled="true">Registrarse</button>
                </div>
            </form>
        </div>

    </div>
    <?php include("pageincludes/footer.php"); ?>

    <?php include("pageincludes/bootstrap-body.php"); ?>
</body>

</html>
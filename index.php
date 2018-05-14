<!doctype html>
<html lang="en">

<head>
	<?php include("pageincludes/bootstrap-head.php"); ?>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">EcoMotion</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Entrar
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nueva Cuenta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">¿Qué es EcoMotion?</a>
                </li>
            </ul>
        </div>

    </nav>

    <div class="login-form">
        <img src="http://daw1.hol.es/images/lizard2.png" class="img-fluid img-login">
        <form action="database/login.php" method="post">
            <h2 class="text-center">EcoMotion</h2>
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
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Usuario" required="required" name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Contraseña" required="required" name="password">
            </div>
            <div class="row">
                <a href="#" class="mx-auto mb-3">Recordar contraseña?</a>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">Entrar</button>
            </div>
            <hr>
            <div class="form-group">
                <a href="./signup.php" class="btn btn-block btn-primary">Crear cuenta</a>
            </div>
        </form>
    </div>
    <?php include("pageincludes/footer.php"); ?>

    <?php include("pageincludes/bootstrap-body.php"); ?>
</body>

</html>
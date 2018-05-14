<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- <link rel="stylesheet" href="css/custom-styles.css"> -->
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
        <img src="http://daw1.hol.es/images/lizard2.png" class="img-fluid mb-5">
        <form action="login" method="post">
            <h2 class="text-center">EcoMotion</h2>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Usuario" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Contraseña" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">Entrar</button>
            </div>
            <div class="row">
                <a href="#" class="mx-auto">Recordar contraseña?</a>
            </div>
        </form>
    </div>

	<?php include("pageincludes/bootstrap-body.php"); ?>

</body>
</html>
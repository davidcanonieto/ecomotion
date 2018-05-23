<!doctype html>
<html lang="en">

<head>
	<?php include("pageincludes/bootstrap-head.php"); ?>
</head>

<body>



    <div class="admin-form">
        <form action="database/admin_login.php" method="post">
            <h2 class="text-center">Back Office</h2>
            <?php
                if (isset($_GET["success"]) && $_GET["success"] == 'false') {
                    echo '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            Usuario/contraseña erroneos
                        </div>';
                }
            ?>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Usuario" required="required" name="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Contraseña" required="required" name="password">
            </div>
            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">Entrar</button>
            </div>
        </form>
    </div>

    <?php include("pageincludes/bootstrap-body.php"); ?>
</body>

</html>
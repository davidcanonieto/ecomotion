<!doctype html>
<html lang="en">

<head>
    <?php include("pageincludes/bootstrap-head.php"); ?>
    <script src="./js/password-checker.js"></script>
</head>

<body>

    <div class="login-form">
        <img src="http://daw1.hol.es/images/lizard2.png" class="img-fluid img-signup mx-auto">
        <form action="database/insert_car.php" method="post" autocomplete="on" name="register" enctype="multipart/form-data">
            <h2 class="text-center">EcoMotion</h2>
            <div class="form-group">
                <label class="control-label">Datos del coche:</label>
                <input type="text" class="form-control" placeholder="Marca" required="required" name="marca">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Modelo" required="required" name="modelo">
            </div>
            <div class="form-group">
                <label for="plazas">Plazas:</label>
                <select class="form-control" name="plazas">
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                </select>
            </div>
            <div class="form-group">
                <label for="combustible">Combustible:</label>
                <select class="form-control" name="combustible">
                    <option value="01">Eléctrico</option>
                    <option value="02">Híbrido</option>
                    <option value="03">Gasolina</option>
                    <option value="04">Diesel</option>
                </select>
            </div>
            <div class="form-group">
                <label for="matricula">Matrícula:</label>
                <input type="text" class="form-control" placeholder="0000-XXX" required="required" name="matricula">
            </div>
            <div class="form-group">
                <label for="year">Año:</label>
                <input type="number" class="form-control" placeholder="2009" required="required" name="year">
            </div>
            <div class="form-group">
                <label for="foto">Subir foto:</label>
                <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary" id="registerButton">Registrarse</button>
            </div>
            
        </form>
    </div>
    <?php include("pageincludes/footer.php"); ?>

    <?php include("pageincludes/bootstrap-body.php"); ?>
</body>

</html>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecomove";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_SESSION['id'];

$sql = "SELECT * FROM ecomove.users WHERE id = '$id'";

$result = $conn->query($sql);

if ($result = $conn->query($sql)) {

    $row = $result->fetch_array(MYSQLI_ASSOC);

    $credit = $row['wallet'];
    $email = $row['email'];

}

$tripCode = $_GET['id'];
$seats = $_GET['seats'];
$_SESSION['tripCode'] = $tripCode;
$_SESSION['seats'] = $seats;

$sql = "SELECT * FROM trip_details WHERE trip_code = '$tripCode'";

if ($result = $conn->query($sql)) {

    $row = $result->fetch_array(MYSQLI_ASSOC);

    $olat = $row["origin_lat"];
    $olng = $row["origin_lng"];
    $dlat = $row["destiny_lat"];
    $dlng = $row["destiny_lng"];
    $time = $row["trip_time"];
    $date = $row["trip_date"];
    $id = $row["id"];
    $cost = $row["cost"];

    $sql = "SELECT * FROM cars WHERE license_plate = (SELECT license_plate FROM possessions WHERE id = '$id')";

    if ($result1 = $conn->query($sql)) {

        $row1 = $result1->fetch_array(MYSQLI_ASSOC);

        $maker = $row1['maker'];
        $model = $row1['model'];
        $picture = $row1['picture'];

        switch ($row1['cat_code']) {
            case 1:$cat = 'Eléctrico';
                break;
            case 2:$cat = 'Híbrido';
                break;
            case 3:$cat = 'Gasolina';
                break;
            case 4:$cat = 'Diesel';
        }

        $sql = "SELECT name, lastname FROM users WHERE id = '$id'";

        if ($result2 = $conn->query($sql)) {

            $row2 = $result2->fetch_array(MYSQLI_ASSOC);

            $name = $row2['name'];
            $lastname = $row2['lastname'];
        } else {
            echo $conn->error;
        }

    } else {
        echo $conn->error;
    }
} else {
    echo $conn->error;

}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "pageincludes/bootstrap-head.php";?>
    <script src="./js/sidenav.js"></script>
    <link rel="stylesheet" href="./css/custom-sidenav.css">
    <link rel="stylesheet" href="./css/maps.css">
    <script src="./js/maps-matrix-api.js"></script>
</head>

<body>

    <?php include "pageincludes/sidenav.php";?>

    <div id="main">
        <h1 class="text-center logo-title mt-1 mb-5">EcoMotion</h1>


        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4">Reservar viaje</h1>
                <p class="lead">
                    Esto son los detalles del viaje.
                </p>
                <div>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th scope="row">Origen:</th>
                                <td id="origin"></td>
                            </tr>
                            <tr>
                                <th scope="row">Destino:</th>
                                <td id="destination"></td>
                            </tr>
                            <tr>
                                <th scope="row">Fecha:</th>
                                <td id="date"></td>
                            </tr>
                            <tr>
                                <th scope="row">Asientos:</th>
                                <td id="seats"></td>
                            </tr>
                            <tr>
                                <th scope="row">Distancia:</th>
                                <td id="distance"></td>
                            </tr>
                            <tr>
                                <th scope="row">Tiempo:</th>
                                <td id="time"></td>
                            </tr>
                            <tr class="table-secondary">
                                <th scope="row">Precio:</th>
                                <td id="cost"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="output">

                </div>
                <div id="map"></div>
                <hr class="my-4">
                <p class="lead">
                    <button class="btn btn-secondary" role="button" onclick="goBack()">Cancelar</button>
                    <button class="btn btn-warning" role="button" data-toggle="modal" data-target="#infoPiloto">Ver piloto</button>
                    <!-- <button class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#topUp">Confirmar</button> -->
                    <button class="btn btn-primary" role="button" onclick="checkCredit(<?php echo $credit;?>)">Confirmar</button>
                </p>
            </div>
        </div>

        <!-- Confirmacion reserva -->
        <div class="modal fade" id="bookTrip" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">¿Todo correcto?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Reservaremos en número de plazas seleccionadas en este viaje.
                        <p class="small mt-2">Tu pago será temporalmente retenido hasta que realices el viaje. Si es el pasajero el que cancela el viaje tendrá una penalización del 5% del pago hasta 2 horas antes. Pasado este periodo perderás el total del pago. <p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="bookTrip(<?php echo $tripCode;?>)">Reservar viaje</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informacion del piloto -->
        <div class="modal fade" id="infoPiloto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            <span class="font-weight-bold">Piloto: </span>
                            <?php echo $name . " " . substr($lastname, 0, 1) ?>.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img class="img-modal-pilot" src="./images/carPictures/<?php echo $picture ?>">
                        <p>
                            <span class="font-weight-bold">Marca: </span>
                            <?php echo $maker ?>
                        </p>
                        <p>
                            <span class="font-weight-bold">Modelo: </span>
                            <?php echo $model ?>
                        </p>
                        <p>
                            <span class="font-weight-bold">Combustible: </span>
                            <?php echo $cat ?>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--  Recarga de saldo -->
        <div class="modal fade" id="topup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            <span class="font-weight-bold">No tienes suficiente dinero</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <img src="./images/appPictures/paypal.png" class="img-paypal-widget">
                        <p class="text-center mb-0">Saldo actual:
                            <?php echo $credit; ?> €</p>

                    </div>
                    <div class="login-form mt-3">
                        <form action="database/top-up-widget.php" method="post">
                            <div class="form-group text-center">
                                <label for="recarga" class="text-center">Recarga</label>
                                <input type="number" step="any" min="0" max="100" class="form-control text-center" name="recarga" placeholder="10.00€" required>
                            </div>
                            <hr>
                            <div class="form-group">
                                <p class="text-center">
                                    <?php echo $email; ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control text-center" name="password" placeholder="Contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Recargar Saldo</button>
                        </form>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        setParametersReservation(<?php echo "$olat, $olng, $dlat, $dlng, '$date', '$time', $seats, $cost" ;?>);
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqQiG0nfV43h4GFJQe2Fkh3VPkaoTjXNA&callback=initMapTrip">
    </script>

    </div>

    <?php include "pageincludes/bootstrap-body.php";?>

</body>

</html>
<?php

    $olat = $_SESSION["olat"];
    $olng = $_SESSION["olng"];
    $dlat = $_SESSION["dlat"];
    $dlng = $_SESSION["dlng"];
    $time = $_SESSION["time"];
    $date = $_SESSION["date"];
    $seats = $_SESSION["seats"];
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">¡Viaje subido!</h1>
        <p class="lead">
            Tu viaje se ha subido correctamente y ya está disponible para otros usuarios. <br>
            Estos son los detalles de tu viaje:
        </p>
        <div>
            <table class="table">
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
                     <tr>
                        <th scope="row">Precio/pasajero:</th>
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
            <a class="btn btn-secondary btn-lg" href="./home.php" role="button">Cancelar</a>
            <a class="btn btn-primary btn-lg" href="./home.php" role="button">Confirmar</a>
        </p>
    </div>
</div>


<script src="./js/maps-matrix-api.js"></script>
<script>
    setParameters(<?php echo "$olat, $olng, $dlat, $dlng, $seats, '$time', '$date'"?>);
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqQiG0nfV43h4GFJQe2Fkh3VPkaoTjXNA&callback=initMap">
</script>

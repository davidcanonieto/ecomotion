<?php

    $olat = $_SESSION["olat"];
    $olng = $_SESSION["olng"];
    $dlat = $_SESSION["dlat"];
    $dlng = $_SESSION["dlng"];
    $time = $_SESSION["time"];
    $date = $_SESSION["date"];
    $seats = $_SESSION["seats"];
?>
<script src="./js/maps-matrix-api.js"></script>



<div class="container">
    <div>
        <h1 class="display-4">Tu viaje</h1>
        <p class="lead">
            Esto son los detalles de tu viaje. Comprueba que todo está correcto antes de subirlo.
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
            <button class="btn btn-danger btn-lg" role="button" onclick="goBack()">Cancelar</button>
            <button class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#exampleModalCenter">Confirmar</button>
        </p>
    </div>
</div>





<script>
    setParameters(<?php echo "$olat, $olng, $dlat, $dlng, '$date', '$time', '$seats'"?>);
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqQiG0nfV43h4GFJQe2Fkh3VPkaoTjXNA&callback=initMap">
</script>

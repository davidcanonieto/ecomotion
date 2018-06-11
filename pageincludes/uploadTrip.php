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
    <div class="jumbotron">
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
            <button class="btn btn-secondary btn-lg" role="button" onclick="goBack()">Cancelar</button>
            <button class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#exampleModalCenter">Confirmar</button>
        </p>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">¿Todo correcto?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Pulsa Guardar Viaje si todos los datos del viaje son correctos.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="saveTripInDatabase()">Guardar viaje</button>
      </div>
    </div>
  </div>
</div>



<script>
    setParameters(<?php echo "$olat, $olng, $dlat, $dlng, '$date', '$time', '$seats'"?>);
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqQiG0nfV43h4GFJQe2Fkh3VPkaoTjXNA&callback=initMap">
</script>

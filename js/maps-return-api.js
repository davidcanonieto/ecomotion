var data;


function getData(data) {
    console.log(data);
    this.data = data;
}

function initMap() {

    console.log(data.length);

    if(data.length == 0) {
        window.location.href = `./message.php?message=noTrips`;
    }
    
    var bounds = new google.maps.LatLngBounds;
    var markersArray = [];

    var origins = [];
    var destinations = [];



    for (let i = 0; i < data.length; i++) {
        origin = { lat: parseFloat(data[i].originLat), lng: parseFloat(data[i].originLng)};
        destination = { lat: parseFloat(data[i].destinationLat), lng: parseFloat(data[i].destinationLng)};

        var service = new google.maps.DistanceMatrixService;
        service.getDistanceMatrix({
            origins: [origin],
            destinations: [destination],
            travelMode: 'DRIVING',
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: false,
            avoidTolls: true
        }, function (response, status) {
            if (status !== 'OK') {
                document.getElementById('trips').innerHTML = "No se ha encontrado ningún viaje.";
            } else {
                console.log(response);
                var dataToDisplay = "";
                dataToDisplay += '<div class="col-12 col-sm-6">';
                dataToDisplay += '<div class="card">';
                dataToDisplay += '<div class="card-body">';
                dataToDisplay += '<h5 class="card-title mb-4">' + response.rows[0].elements[0].duration.text +' - '+ data[i].cost + '€</h5>';
                dataToDisplay += '<p class="card-text">Origen: ' + response.originAddresses[0] +'</p>';
                dataToDisplay += '<p class="card-text">Destino: ' + response.destinationAddresses[0] +'</p>';                
                dataToDisplay += '<div class="text-center my-4"><button onclick="moreInfo(' + data[i].tripCode +', ' + data[i].seats + ')" class="btn btn-primary mx-auto">Seleccionar</button></div>';
                dataToDisplay += '</div></div></div>';
                document.getElementById('trips').innerHTML += dataToDisplay;
            }
        });
    }

}



function deleteMarkers(markersArray) {
    for (var i = 0; i < markersArray.length; i++) {
        markersArray[i].setMap(null);
    }
    markersArray = [];
}

function moreInfo(tripCode, seats){
    
    window.location.href = `./bookTrip.php?id=${tripCode}&seats=${seats}`;
}


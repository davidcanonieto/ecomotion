var openTrips;
var finishedTrips;

var tripCodeInUse;
var seatsInUse;


function getData(openTrips, finishedTrips) {
    //console.log(openTrips);
    this.openTrips = openTrips;
    this.finishedTrips = finishedTrips;
}

function initMap() {

    if (typeof openTrips == 'undefined') {
        openTrips = [];
    }


    if (openTrips.length == 0) {
        var dataToDisplay = `  
                <div class="card">
                    <div class="row">
                        <div class="col py-4">
                            <p>No tienes ningún viaje programado</p>
                            <a href="./findTrip.php" style="width:200px" class="btn btn-primary home-button mb-3 mx-auto d-block">Buscar Viajes</a>
                        </div>
                    </div> 
                </div>
                `;
        document.getElementById('accordion').innerHTML = dataToDisplay;
    } else {
        var bounds = new google.maps.LatLngBounds;
        var markersArray = [];

        var origins = [];
        var destinations = [];

        

        for (let i = 0; i < openTrips.length; i++) {
            origin = { lat: parseFloat(openTrips[i].originLat), lng: parseFloat(openTrips[i].originLng) };
            destination = { lat: parseFloat(openTrips[i].destinationLat), lng: parseFloat(openTrips[i].destinationLng) };

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
                    var dataToDisplay = `
                   <div class="card">
                            <div class="card" id="open${i}">
                                <div class="row mt-3 px-4">
                                    <div class="col col-12 col-sm-1 mt-3">
                                        <p class="align-middle text-left">${i + 1}.</p>
                                    </div>
                                    <div class="col col-12 col-sm-8">
                                        <p class="text-truncate text-left"><span class="font-weight-bold">Origen:</span> ${response.originAddresses[0]}</p>
                                        <p class="text-truncate text-left"><span class="font-weight-bold">Destino:</span> ${response.destinationAddresses[0]}</p>
                                    </div>
                                    <div class="col col-12 col-sm-3 pb-3">
                                        <a class="trips-buttons" data-toggle="collapse" data-target="#collapse${i}"><img src="./images/appPictures/info.png"></a>
                                        <a onclick="showCancelModal(${openTrips[i].tripCode})" class="trips-buttons"><img src="./images/appPictures/error.png"></a>
                                        <a onclick="showFinishModal(${openTrips[i].tripCode}, ${openTrips[i].seats})" class="trips-buttons"><img src="./images/appPictures/checked.png"></a>
                                    </div>
                                </div>
                                
                            </div>
                            <div id="collapse${i}" class="collapse" aria-labelledby="headingThree" data-parent="#accordion2">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Plazas</th>
                                                <th scope="col">Distancia</th>
                                                <th scope="col">Tiempo</th>
                                                <th scope="col">Coste</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">${openTrips[i].tripTime}, ${openTrips[i].tripDate}</th>
                                                <td>${openTrips[i].seats}</td>
                                                <td>${response.rows[0].elements[0].distance.text}</td>
                                                <td>${response.rows[0].elements[0].duration.text}</td>
                                                <td>${openTrips[i].cost} €</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div >
                
                `;
                    // var dataToDisplay = "";
                    // dataToDisplay += '<div class="card">';
                    // dataToDisplay += '<div class="card-body">';
                    // dataToDisplay += '<h5 class="card-title">' + response.rows[0].elements[0].duration.text +' - '+ data[i].cost + '€</h5>';
                    // dataToDisplay += '<p class="card-text">Origen: ' + response.originAddresses[0] +'</p>';
                    // dataToDisplay += '<p class="card-text">Destino: ' + response.destinationAddresses[0] +'</p>';                
                    // dataToDisplay += '<button onclick="moreInfo(' + data[i].tripCode +', ' + data[i].seats + ')" class="btn btn-primary">Seleccionar</button>';
                    // dataToDisplay += '</div></div>';
                    document.getElementById('accordion').innerHTML += dataToDisplay;
                }
            });
        }
    }


    if (typeof finishedTrips == 'undefined') {
        finishedTrips = [];
    }


    if (finishedTrips.length == 0) {
        var dataToDisplay = `  
                <div class="card py-5">
                    <div class="row my-5">
                        <div class="col">
                            No has realizado ningún viaje todavía
                        </div>
                    </div> 
                </div>
                `;
        document.getElementById('accordion2').innerHTML = dataToDisplay;
    } else {
        var bounds = new google.maps.LatLngBounds;
        var markersArray = [];

        var origins = [];
        var destinations = [];

        var numberOfTrips = finishedTrips.length;

        if (finishedTrips.length > 5) {
            numberOfTrips = 5;
        }

        for (let i = 0; i < numberOfTrips; i++) {
            origin = { lat: parseFloat(finishedTrips[i].originLat), lng: parseFloat(finishedTrips[i].originLng) };
            destination = { lat: parseFloat(finishedTrips[i].destinationLat), lng: parseFloat(finishedTrips[i].destinationLng) };

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
                    //console.log(response);
                    var dataToDisplay = `
                   <div class="card">
                            <div class="card" id="finish${i}">
                                <div class="row mt-3 px-4">
                                    <div class="col col-12 col-sm-1 mt-3">
                                        <p class="align-middle text-left">${i + 1}.</p>
                                    </div>
                                    <div class="col col-12 col-sm-8">
                                        <p class="text-truncate text-left"><span class="font-weight-bold">Origen:</span> ${response.originAddresses[0]}</p>
                                        <p class="text-truncate text-left"><span class="font-weight-bold">Destino:</span> ${response.destinationAddresses[0]}</p>
                                    </div>
                                    <div class="col col-12 col-sm-3 pb-3">
                                        <a class="trips-buttons" data-toggle="collapse" data-target="#ascollapse${i}"><img src="./images/appPictures/info.png"></a>
                                    </div>
                                </div>
                                
                            </div>
                            <div id="ascollapse${i}" class="collapse" aria-labelledby="headingThree" data-parent="#accordion2">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Plazas</th>
                                                <th scope="col">Distancia</th>
                                                <th scope="col">Tiempo</th>
                                                <th scope="col">Coste</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">${finishedTrips[i].tripTime}, ${finishedTrips[i].tripDate}</th>
                                                <td>${finishedTrips[i].seats}</td>
                                                <td>${response.rows[0].elements[0].distance.text}</td>
                                                <td>${response.rows[0].elements[0].duration.text}</td>
                                                <td>${finishedTrips[i].cost} €</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div >
                
                `;
                    // var dataToDisplay = "";
                    // dataToDisplay += '<div class="card">';
                    // dataToDisplay += '<div class="card-body">';
                    // dataToDisplay += '<h5 class="card-title">' + response.rows[0].elements[0].duration.text +' - '+ data[i].cost + '€</h5>';
                    // dataToDisplay += '<p class="card-text">Origen: ' + response.originAddresses[0] +'</p>';
                    // dataToDisplay += '<p class="card-text">Destino: ' + response.destinationAddresses[0] +'</p>';                
                    // dataToDisplay += '<button onclick="moreInfo(' + data[i].tripCode +', ' + data[i].seats + ')" class="btn btn-primary">Seleccionar</button>';
                    // dataToDisplay += '</div></div>';
                    document.getElementById('accordion2').innerHTML += dataToDisplay;
                }
            });
        }
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

function showCancelModal(tripCode) {
    tripCodeInUse = tripCode;
    $('#cancelTrip').modal('show');
}

function showFinishModal(tripCode, seats) {
    seatsInUse = seats;
    tripCodeInUse = tripCode;
    $('#finishTrip').modal('show');
}

function cancelTrip() {
    window.location.href = `./database/cancelTrip.php?tripCode=${tripCodeInUse}`;
}

function finishTrip() {
    window.location.href = `./database/finishTrip.php?tripCode=${tripCodeInUse}&seats=${seatsInUse}`;
}




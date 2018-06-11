var olat;
var olng;
var dlat;
var dlng;
var seats;
var date;
var time;
var cost;

function saveTripInDatabase() {
    window.location.href = `./database/new-trip.php?code=${cost}&params=asf45er45`;
}

function setParameters(olat, olng, dlat, dlng, date, time, seats) {
    this.olat = olat;
    this.olng = olng;
    this.dlat = dlat;
    this.dlng = dlng;
    this.date = date;
    this.time = time;
    this.seats = seats;
}

function setParametersReservation(olat, olng, dlat, dlng, date, time, seats, cost) {
    this.olat = olat;
    this.olng = olng;
    this.dlat = dlat;
    this.dlng = dlng;
    this.date = date;
    this.time = time;
    this.seats = seats;
    this.cost = cost;
}

function initMap() {
    var bounds = new google.maps.LatLngBounds;
    var markersArray = [];

    var origin = { lat: olat, lng: olng };
    var destination = { lat: dlat, lng: dlng };

    // console.log(origin1);
    // console.log(destinationA);
    
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10
    });
    var geocoder = new google.maps.Geocoder;

    var service = new google.maps.DistanceMatrixService;
    service.getDistanceMatrix({
        origins: [origin],
        destinations: [destination],
        travelMode: 'DRIVING',
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status !== 'OK') {
            alert('Error was: ' + status);
        } else {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            var outputDiv = document.getElementById('output');
            outputDiv.innerHTML = '';
            deleteMarkers(markersArray);

            var showGeocodedAddressOnMap = function (asDestination) {

                return function (results, status) {
                    if (status === 'OK') {
                        map.fitBounds(bounds.extend(results[0].geometry.location));
                        markersArray.push(new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        }));
                    } else {
                        alert('Geocode was not successful due to: ' + status);
                    }
                };
            };

            console.log(response);

            cost = response.rows[0].elements[0].duration.value * 0.005;
            cost = cost.toFixed(2);

            document.getElementById("origin").innerHTML = response.originAddresses;
            document.getElementById("destination").innerHTML = response.destinationAddresses;
            document.getElementById("date").innerHTML = date + ", " + time;
            document.getElementById("distance").innerHTML = response.rows[0].elements[0].distance.text;
            document.getElementById("time").innerHTML = response.rows[0].elements[0].duration.text;
            document.getElementById("seats").innerHTML = seats;
            document.getElementById("cost").innerHTML = cost + " €/pasajero";

            geocoder.geocode({ 'address': originList[0] },
                showGeocodedAddressOnMap(false));
            geocoder.geocode({ 'address': destinationList[0] },
                showGeocodedAddressOnMap(true));
            
            // for (var i = 0; i < originList.length; i++) {
            //     var results = response.rows[i].elements;
            //     geocoder.geocode({ 'address': originList[i] },
            //         showGeocodedAddressOnMap(false));
            //     for (var j = 0; j < results.length; j++) {
            //         geocoder.geocode({ 'address': destinationList[j] },
            //             showGeocodedAddressOnMap(true));
            //         outputDiv.innerHTML += originList[i] + ' to ' + destinationList[j] +
            //             ': ' + results[j].distance.text + ' in ' +
            //             results[j].duration.text + '<br>';
            //     }
            // }
        }
    });
}

function initMapTrip() {
    var bounds = new google.maps.LatLngBounds;
    var markersArray = [];

    var origin = { lat: olat, lng: olng };
    var destination = { lat: dlat, lng: dlng };

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10
    });
    var geocoder = new google.maps.Geocoder;

    var service = new google.maps.DistanceMatrixService;
    service.getDistanceMatrix({
        origins: [origin],
        destinations: [destination],
        travelMode: 'DRIVING',
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status !== 'OK') {
            alert('Error was: ' + status);
        } else {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            var outputDiv = document.getElementById('output');
            outputDiv.innerHTML = '';
            deleteMarkers(markersArray);

            var showGeocodedAddressOnMap = function (asDestination) {

                return function (results, status) {
                    if (status === 'OK') {
                        map.fitBounds(bounds.extend(results[0].geometry.location));
                        markersArray.push(new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        }));
                    } else {
                        alert('Geocode was not successful due to: ' + status);
                    }
                };
            };

            console.log(response);

            document.getElementById("origin").innerHTML = response.originAddresses;
            document.getElementById("destination").innerHTML = response.destinationAddresses;
            document.getElementById("date").innerHTML = date + ", " + time;
            document.getElementById("distance").innerHTML = response.rows[0].elements[0].distance.text;
            document.getElementById("time").innerHTML = response.rows[0].elements[0].duration.text;
            document.getElementById("seats").innerHTML = seats;
            if (seats > 1 ) {
                document.getElementById("cost").innerHTML = cost * seats + " € (" + cost + " €/pasajero)";
            } else {
                document.getElementById("cost").innerHTML = cost * seats + " €";
            }
           

            geocoder.geocode({ 'address': originList[0] },
                showGeocodedAddressOnMap(false));
            geocoder.geocode({ 'address': destinationList[0] },
                showGeocodedAddressOnMap(true));

        }
    });
}

function deleteMarkers(markersArray) {
    for (var i = 0; i < markersArray.length; i++) {
        markersArray[i].setMap(null);
    }
    markersArray = [];
}

function goBack() {
    window.history.back();
}

function checkCredit(credit){
    if(cost * seats <= credit){
        $('#bookTrip').modal('show');
    }
    else {
        $('#topup').modal('show');
    }
}

function bookTrip(tripCode) {
    window.location.href = `./database/bookTrip.php?seats=${seats}&trip_id=${tripCode}`;
}
var olat;
var olng;
var dlat;
var dlng;

function setParameters (olat, olng, dlat, dlng) {
    this.olat = olat;
    this.olng = olng;
    this.dlat = dlat;
    this.dlng = dlng;

    // console.log(olat);
    // console.log(olng);
    // console.log(dlat);
    // console.log(dlng);
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

            var results = response.rows[0].elements;

            // document.getElementById("").innerHTML = response;
            // document.getElementById("").innerHTML = response;
            // document.getElementById("").innerHTML = response;
            // document.getElementById("").innerHTML = response;
            // document.getElementById("").innerHTML = response;
            // document.getElementById("").innerHTML = response;
            // document.getElementById("").innerHTML = response;

            
            for (var i = 0; i < originList.length; i++) {
                var results = response.rows[i].elements;
                geocoder.geocode({ 'address': originList[i] },
                    showGeocodedAddressOnMap(false));
                for (var j = 0; j < results.length; j++) {
                    geocoder.geocode({ 'address': destinationList[j] },
                        showGeocodedAddressOnMap(true));
                    outputDiv.innerHTML += originList[i] + ' to ' + destinationList[j] +
                        ': ' + results[j].distance.text + ' in ' +
                        results[j].duration.text + '<br>';
                }
            }
        }
    });
}

function deleteMarkers(markersArray) {
    for (var i = 0; i < markersArray.length; i++) {
        markersArray[i].setMap(null);
    }
    markersArray = [];
}
var originlat;
var originlng;
var destinylat;
var destinylng;

function saveTrip(e) {

    e.preventDefault();

    var date = document.forms["newTripForm"]["date"].value;
    var time = document.forms["newTripForm"]["hour"].value;
    var seats = document.forms["newTripForm"]["seats"].value;

    window.location.href = `./database/prepareTrip.php?olat=${originlat}&olng=${originlng}&dlat=${destinylat}&dlng=${destinylng}&seats=${seats}&date=${date}&time=${time}`;

    console.log(`./database/new-trip.php?
        olat=${originlat}
        &olng=${originlng}
        &dlng=${destinylat}
        &dlng=${destinylng}
        &seats=${seats}
        &date=${date}
        &time=${time}
    `);
}

function showOrigin() {

    var location = document.getElementById('origin-input').value;

    axios.get('https://maps.googleapis.com/maps/api/geocode/json', {
        params: {
            address: location,
            key: 'AIzaSyCryU6l2HtKtzJtdmHEsiPkq0Y-s9KWSV8'
        }
    })
        .then(function (response) {
            // Log full response
            console.log(response);

            // Formatted Address
            var formattedAddress = response.data.results[0].formatted_address;

            //Latitude and Longitude
            originlat = response.data.results[0].geometry.location.lat;
            originlng = response.data.results[0].geometry.location.lng;

            console.log(formattedAddress);
            document.getElementById("origin-address").innerHTML = formattedAddress;
            console.log("Lat: " + originlat + ", lng: " + originlng);
        })
        .catch(function (error) {
            console.log(error);
        });
}

function showDestination() {

    var location = document.getElementById('destination-input').value;

    axios.get('https://maps.googleapis.com/maps/api/geocode/json', {
        params: {
            address: location,
            key: 'AIzaSyCryU6l2HtKtzJtdmHEsiPkq0Y-s9KWSV8'
        }
    })
        .then(function (response) {
            // Log full response
            console.log(response);

            // Formatted Address
            var formattedAddress = response.data.results[0].formatted_address;

            //Latitude and Longitude
            destinylat = response.data.results[0].geometry.location.lat;
            destinylng = response.data.results[0].geometry.location.lng;

            console.log(formattedAddress);
            document.getElementById("destination-address").innerHTML = formattedAddress;
            console.log("Lat: " + destinylat + ", lng: " + destinylng);
        })
        .catch(function (error) {
            console.log(error);
        });
}

// function geocode(e, lat, lng) {
//     // Prevent actual submit
//     e.preventDefault();

//     var location = document.getElementById('location-input').value;

//     axios.get('https://maps.googleapis.com/maps/api/geocode/json', {
//         params: {
//             address: location,
//             key: 'AIzaSyCryU6l2HtKtzJtdmHEsiPkq0Y-s9KWSV8'
//         }
//     })
//         .then(function (response) {
//             // Log full response
//             console.log(response);

//             // Formatted Address
//             var formattedAddress = response.data.results[0].formatted_address;

//             //Latitude and Longitude
//             lat = response.data.results[0].geometry.location.lat;
//             lng = response.data.results[0].geometry.location.lng;

//             console.log(formattedAddress);
//             console.log("Lat: " + lat + ", lng: " + lng);
//         })
//         .catch(function (error) {
//             console.log(error);
//         });
// }

function initMap() {
    var uluru = { lat: lat, lng: lng };
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}

// function destinationAddress() {
//     window.location = `./destination.php?lat=${lat}&lng=${lng}`;
// }

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        document.getElementById('geometry').innerHTML = "Geolocation is not supported by this browser.";
    }
}

// function showPosition(position) {
//     document.getElementById('geometry').innerHTML = "Latitude: " + position.coords.latitude +
//         "<br>Longitude: " + position.coords.longitude;
// }


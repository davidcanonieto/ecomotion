var lat;
var lng;


window.onload = function () { 
    var locationForm = document.getElementById('location-form');
    locationForm.addEventListener('submit', geocode);
}

function geocode(e) {
    // Prevent actual submit
    e.preventDefault();

    var location = document.getElementById('location-input').value;

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
            var formattedAddressOutput = `
          <ul class="list-group">
            <li class="list-group-item">${formattedAddress}</li>
          </ul>
        `;
            // Geometry
            lat = response.data.results[0].geometry.location.lat;
            lng = response.data.results[0].geometry.location.lng;
        //     var geometryOutput = `
        //   <ul class="list-group">
        //     <li class="list-group-item"><strong>Latitude</strong>: ${lat}</li>
        //     <li class="list-group-item"><strong>Longitude</strong>: ${lng}</li>
        //   </ul>
        // `;

            initMap();

            // Output to app
            document.getElementById('formatted-address').innerHTML = formattedAddressOutput;
            document.getElementById('geometry').innerHTML = geometryOutput;
        })
        .catch(function (error) {
            console.log(error);
        });
}

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

function destinationAddress() {
    window.location = `./destination.php?lat=${lat}&lng=${lng}`;
}
function initMap() {
    var input = document.getElementById('search-address');
    var autocomplete = new google.maps.places.Autocomplete(input);
};

function newMap() {
    var input = document.getElementById('search-address');
    var autocomplete = new google.maps.places.Autocomplete(input);
};

function displayMap() {
    var geocoder;
    var map;
    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input);
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var mapOptions = {
        zoom: 8,
        center: latlng
    }
    map = new google.maps.Map(document.getElementById('map'), mapOptions);
    var geocoder = new google.maps.Geocoder();
    var address = document.getElementById('address').value;
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == 'OK') {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
    console.log(address);
}
function initMap() {
    var myLatLng = {lat: 3.88764809, lng: 11.5033633};

    // Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        scrollwheel: false,
        zoom: 8
    });

    // Create a marker and set its position.
    var marker = new google.maps.Marker({
        map: map,
        position: myLatLng,
        title: "Société d'Ingénierie OGIVE!"
    });
}
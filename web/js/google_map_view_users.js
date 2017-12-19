var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 5,
    center: new google.maps.LatLng(48.963428219920424, 9.3803040771484),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    scaleControl: true
});

var infowindow = new google.maps.InfoWindow();

var marker, i;
for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
        map: map
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            infowindow.setContent(
                '<p><h1 class="map-user-info">' + locations[i]['name'] + '</h1></p>' +
                '<p class="map-user-info">' + locations[i]['address'] + '</p>'
            );
            infowindow.open(map, marker);
        }
    })(marker, i));
}
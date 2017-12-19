function initAutoComplete() {
    var input = document.getElementById('user-address');
    var searchBox = new google.maps.places.SearchBox(input);

    searchBox.addListener('places_changed', function () {
        var places = searchBox.getPlaces();
        if (places.length === 0) {
            return;
        }

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function (place) {
            var isAddessValidElem = $('[name="is-address-valid"]');
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                isAddessValidElem.val(0);
                return;
            }

            isAddessValidElem.val(1);
            $('[name="User[lat]"]').val(place.geometry.location.lat());
            $('[name="User[lng]"]').val(place.geometry.location.lng());

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
    });
}
$('[name="User[address]"]').on('change', function() {
    if ($(this).val().length === 0) {
        $('[name="is-address-valid"]').val(0);
    }
});
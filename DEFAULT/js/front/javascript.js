(function($) {
    $(function () {
        if ($('#gmaps').length != 0) {
            // Settings
            var geocoder = new google.maps.Geocoder();
            var address = 'Amsterdam';
            //var image = '/imgs/marker.png';

            geocoder.geocode({
                "address": address
            }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                }
            });

            var mapProp = {
                zoom: 13,
                disableDefaultUI: true,
                zoomControl: true,
                scrollwheel: false,
                draggable: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById("gmaps"), mapProp);
            var infowindow = new google.maps.InfoWindow(), marker, i;

            google.maps.event.addListener(map, 'zoom_changed', function () {
                var zoomLevel = map.getZoom();
                console.log('Zoom: ' + zoomLevel);
            });

            // Loop through all companies and add them to map
            var api_call = location.origin+"/api/companies";
            var category_id = $('#gmaps').data('category');

            if(category_id != '')
            {
                api_call = location.origin+"/api/categories?id="+category_id;
            }

            $.get(api_call, function (data) {
                $.each(data, function (key, value) {
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(value.lat, value.lng),
                        map: map,
                        animation: google.maps.Animation.DROP,
                        //icon: new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|"),
                        //icon: marker_places
                    });
                    infowindow.open(map, marker);
                });
            });

            // Suggestions for a new place
            var defaultBounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(''),
                new google.maps.LatLng()
            );

            var options = {
                //bounds: defaultBounds,
                //types: ['establishment']
            };

            var input = document.getElementById('searchform');

            // Create the autocomplete object.
            var autocomplete = new google.maps.places.Autocomplete(input, options);

            // Move map to searched query
            google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);

            function onPlaceChanged() {
                var marker;
                var place = autocomplete.getPlace();

                if (place.geometry) {
                    map.panTo(place.geometry.location);
                    map.setZoom(15);

                    marker = new google.maps.Marker({
                        position: place.geometry.location,
                        map: map,
                        title: 'Winkel naam'
                    });
                    search();
                } else {
                    document.getElementById('autocomplete').placeholder = 'Zoek';
                }
            }
        }
    });
})(jQuery);
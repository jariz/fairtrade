(function ($) {
    $(function () {
        var infowindows = [];

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
            //var infowindow = new google.maps.InfoWindow(), marker, i;

            google.maps.event.addListener(map, 'zoom_changed', function () {
                var zoomLevel = map.getZoom();
                //console.log('Zoom: ' + zoomLevel);
            });

            // prepare categories array
            var api_call = baseurl + '/api/categories';
            var categories = [];

            $.get(api_call, function (data){
                $.each(data, function (key, value){
                    categories[value.id] = value.color;
                });
            });

            // Loop through all companies and add them to map
            var api_call = baseurl + '/api/companies';
            var category_id = $('#gmaps').data('category');

            if (category_id != '') {
                api_call = baseurl + '/api/companiesCategory?id=' + category_id;
            }

            // Get all companies from api and add them to the map
            $.get(api_call, function (data) {
                $.each(data, function (key, value) {

                    // Add marker
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(value.lat, value.lng),
                        map: map,
                        animation: google.maps.Animation.DROP,
                        id: value.id,
                        icon: "http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|"+ categories[value.category].substring(1),
                    });

                    // Check if company has a logo
                    var thumb_nail = '';
                    if (value.logo) {
                        thumb_nail = '<img class="media-object" src="' + value.thumbnail_url + '" alt="...">';
                    }

                    // Add infowindow to marker
                    var infowindow = new google.maps.InfoWindow({
                        // content: '<h3></h3><a href="'+ baseurl+'/waartekoop/bedrijf/'+this.id +'" class="btn btn-warning">Meer informatie</a>',
                        content: '\
                            \<div class="media" style="width: 100%; line-height: normal; white-space: nowrap; overflow: auto; display: inline-block">\
                                <div class="pull-left" style="">\
                                ' + thumb_nail + '\
                                </div>\
                                <div class="media-body" >\
                                    <h2 class="media-heading">' + value.name + '</h2>\
                                    <p class="help-block">' + value.address + '</p>\
                                    <p><a href="' + baseurl + '/waartekoop/bedrijf/' + this.id + '" class="btn btn-primary">Bedrijf bekijken <i class="fa fa-arrow-right"></i></a></p>\
                                </div>\
                            </div>',
                    });

                    infowindows.push(infowindow);
                    hideInfoWindows(infowindows);

                    google.maps.event.addListener(marker, 'click', function () {
                        hideInfoWindows(infowindows);
                        // window.location.href = baseurl+'/waartekoop/bedrijf/'+this.id;
                        infowindow.open(map, marker);
                    });
                });
            });

            function hideInfoWindows(infowindows) {
                for (var i = 0; i < infowindows.length; i++) {
                    infowindows[i].close();
                }
            }

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
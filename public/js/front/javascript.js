$(function () 
{
    // Settings
    var geocoder = new google.maps.Geocoder();
    var address = 'Amsterdam';
    //var image = '/proj/travel/usa/imgs/marker.png';

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

    google.maps.event.addListener(map, 'zoom_changed', function() 
    {
        var zoomLevel = map.getZoom();
        console.log('Zoom: ' + zoomLevel);
    });

    // List of all companies
    var companies = [];

    var geo_location;

    $.each($('#all_companies tr td'), function() { 
        geo_location = $(this).data('geo-location');
        companies.push('Test', geo_location);
    });

    // Loop through all companies and add them to map
    for (i = 0; i < companies.length; i++)
    {
        console.log(companies);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(companies[1]),
            map: map,
            animation: google.maps.Animation.DROP,
            //icon: marker_places
        });
        infowindow.open(map, marker);


        /*geocoder.geocode({
            "address": companies[i][1]
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                //map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: map,
                    animation: google.maps.Animation.DROP,
                });
                infowindow.open(map, marker);
            } else {
                console.log("Er is iets fout gegaan: " + status);
            }
        });*/
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

    var input = document.getElementById('add_place_input');

    // Create the autocomplete object.
    var autocomplete = new google.maps.places.Autocomplete(input, options);
   
    // Move map to searched query
    google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);

    function onPlaceChanged() 
    {
        var place = autocomplete.getPlace();
        if (place.geometry) {
            map.panTo(place.geometry.location);
            map.setZoom(15);
            
            var marker = new google.maps.Marker({
                position: place.geometry.location,
                map: map,
                title: 'Winkel naam'
            });

            search();
        } else {
            document.getElementById('autocomplete').placeholder = 'Enter a city';
        }
    }
});
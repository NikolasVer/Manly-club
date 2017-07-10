window.onload = function () {


    var styles = [
        {
            "featureType": "all",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "saturation": 36
                },
                {
                    "color": "#000000"
                },
                {
                    "lightness": 40
                }
            ]
        },
        {
            "featureType": "all",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "color": "#000000"
                },
                {
                    "lightness": 16
                }
            ]
        },
        {
            "featureType": "all",
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 20
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 17
                },
                {
                    "weight": 1.2
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 20
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 21
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 17
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 29
                },
                {
                    "weight": 0.2
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 18
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 16
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 19
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#000000"
                },
                {
                    "lightness": 17
                }
            ]
        }
    ];


    var options = {
        mapTypeControlOptions: {
            mapTypeIds: ['Styled']
        },
        center: new google.maps.LatLng(50.0042,36.2366, 50.0037,36.2339),
        zoom: 15,
        disableDefaultUI: true,
        mapTypeId: 'Styled'
    };
    var div = document.getElementById('mapstyle');
    var map = new google.maps.Map(div, options);
    var styledMapType = new google.maps.StyledMapType(styles, { name: 'Styled' });
    map.mapTypes.set('Styled', styledMapType);


    var partners = JSON.parse($('#partners_json').text());
    $('#partners_json').remove();

    function addPoint(data) {
        var infowindow = new google.maps.InfoWindow({
            content:
            '<div class="gmap-marker">' +
                '<img src="/uploads/partners/' + data.gmap_img + '"  />' +
                '<div>' +
                    '<div class="gmap-marker-head">' +
                        '<div class="gm-mh-type">' + data.type + '</div>' +
                        '<div class="gm-mh-name">' + data.name + '</div>' +
                    '</div>' +
                    '<div class="gmap-marker-contacts">' +
                        '<div class="gmap-mc-phones">' + data.phones + '</div>' +
                        '<div class="gmap-mc-site">' + data.site + '</div>' +
                        '<div class="gmap-mc-address">' + data.address + '</div>' +
                    '</div>' +
                '</div>'
            + '</div>'
        });

        google.maps.event.addListener(infowindow, 'domready', function () {
            $('.gmap-marker').closest('.gm-style-iw').parent().addClass('gmap-custom-box');
        });

        var pos = data.gmap.split(',');
        var marker = new google.maps.Marker({
            position: {lat: parseFloat(pos[0]), lng: parseFloat(pos[1])},
            map: map,
            title: data.name
        });

        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    }

    for ( var i = 0; i < partners.length; i++ ) {
        addPoint(partners[i]);
    }


    //////other navigation controls
    $('#partners-slider').on('click', '[data-map-pos]', function() {
        var pos = $(this).attr('data-map-pos');
        pos = pos.split(',');
        map.panTo({lat: parseFloat(pos[0]), lng: parseFloat(pos[1])});
        map.setZoom(15);
    });

    //selects
    var select_country = $('#select_country');
    var select_city = $('#select_city');
    var places = JSON.parse($('#places_json').text());
    $('#places_json').remove();


    select_city.on('change.fs', function() {
        var pos = $(this).val().split(',');
        map.panTo({lat: parseFloat(pos[0]), lng: parseFloat(pos[1])});
        map.setZoom(13);
    });

    select_country.on('change.fs', function() {
        var cId = $(this).val();
        var cities = [];
        for(var i in places) {
            if (places[i].id == cId) {
                cities = places[i].cities;
                break;
            }
        }
        var htm = '';
        for ( var i in cities ) {
            htm += '<option value="' + cities[i].gmap + '">' + cities[i].name + '</option>';
        }
        select_city.html(htm);
        select_city.trigger('update.fs');
        select_city.trigger('change.fs');
    });

    var htm = '';
    for (var i in places) {
        htm += '<option value="' + places[i].id +  '">' + places[i].name + '</option>';
    }
    select_country.html(htm);
    select_country.trigger('update.fs');
    select_country.trigger('change.fs');


};
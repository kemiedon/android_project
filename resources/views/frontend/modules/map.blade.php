 <!-- // mv_map_start -->
    <!-- <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> -->
    <!-- </script>   -->

    <style>
            /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
            #map {
              height: 400px;
            }
            
          </style>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnD6yu9tqz6u_cGz1WasfFw4ys33YXaVg&callback=initMap"
          async defer></script>
          <script>
            var map;
            
            function initMap() {
              var myLatLng = {lat: 24.1368301, lng: 120.6836908};
      
              map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 18,
                styles: [
                  {
                      "featureType": "road.highway",
                      "elementType": "geometry",
                      "stylers": [
                        { "saturation": -100 },
                        { "lightness": -8 },
                        { "gamma": 1.18 }
                      ]
                  }, {
                      "featureType": "road.arterial",
                      "elementType": "geometry",
                      "stylers": [
                        { "saturation": -100 },
                        { "gamma": 1 },
                        { "lightness": -24 }
                      ]
                  }, {
                      "featureType": "poi",
                      "elementType": "geometry",
                      "stylers": [
                        { "saturation": -100 }
                      ]
                  }, {
                      "featureType": "administrative",
                      "stylers": [
                        { "saturation": -100 }
                      ]
                  }, {
                      "featureType": "transit",
                      "stylers": [
                        { "saturation": -100 }
                      ]
                  }, {
                      "featureType": "water",
                      "elementType": "geometry.fill",
                      "stylers": [
                        { "saturation": -100 }
                      ]
                  }, {
                      "featureType": "road",
                      "stylers": [
                        { "saturation": -100 }
                      ]
                  }, {
                      "featureType": "administrative",
                      "stylers": [
                        { "saturation": -100 }
                      ]
                  }, {
                      "featureType": "landscape",
                      "stylers": [
                        { "saturation": -100 }
                      ]
                  }, {
                      "featureType": "poi",
                      "stylers": [
                        { "saturation": -100 }
                      ]
                  }, {
                  }
                            ]
              });
              var image = 'images/marker.png';
              var beachMarker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: image
              });
            }
          </script>
          <div id="map" >&nbsp;</div>
          <!-- // mv_map_end -->
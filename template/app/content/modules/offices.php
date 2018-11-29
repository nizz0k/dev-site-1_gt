<div class="container">
        <div class="row justify-content-md-center text-center">
            <div class="col-lg-8 section-head">
                <h1>Our Offices</h1>
            </div>
        </div>


        <div class="row justify-content-md-center">

            <script>
            var  icon = {
                    path: "M0-20c-3.9,0-7,3.1-7,7C-7-7.7,0,0,0,0s7-7.7,7-13C7-16.9,3.9-20,0-20z M0-10.5c-1.4,0-2.5-1.1-2.5-2.5s1.1-2.5,2.5-2.5 s2.5,1.1,2.5,2.5S1.4-10.5,0-10.5z",
                    scale: 1.5,
                    strokeWeight: 0,
                    strokeColor: '#6C9923',
                    strokeOpacity: 1,
                    fillColor: "#6C9923",
                    fillOpacity: 1,

                    scaledSize: new google.maps.Size(22, 22),
                };

                var mapStyle = [{"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#e9e9e9"}, {"lightness": 17 } ] }, {"featureType": "landscape", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 20 } ] }, {"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"}, {"lightness": 17 } ] }, {"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#ffffff"}, {"lightness": 29 }, {"weight": 0.2 } ] }, {"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 18 } ] }, {"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 16 } ] }, {"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 21 } ] }, {"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#dedede"}, {"lightness": 21 } ] }, {"elementType": "labels.text.stroke", "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16 } ] }, {"elementType": "labels.text.fill", "stylers": [{"saturation": 36 }, {"color": "#333333"}, {"lightness": 40 } ] }, {"elementType": "labels.icon", "stylers": [{"visibility": "off"} ] }, {"featureType": "transit", "elementType": "geometry", "stylers": [{"color": "#f2f2f2"}, {"lightness": 19 } ] }, {"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#fefefe"}, {"lightness": 20 } ] }, {"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#fefefe"}, {"lightness": 17 }, {"weight": 1.2 } ] } ];
                
                // var mapStyle = [{"featureType": "landscape", "elementType": "labels", "stylers": [{"visibility": "off"} ] }, {"featureType": "transit", "elementType": "labels", "stylers": [{"visibility": "off"} ] }, {"featureType": "poi", "elementType": "labels", "stylers": [{"visibility": "off"} ] }, {"featureType": "water", "elementType": "labels", "stylers": [{"visibility": "off"} ] }, {"featureType": "road", "elementType": "labels.icon", "stylers": [{"visibility": "off"} ] }, {"stylers": [{"hue": "#00aaff"}, {"saturation": -100 }, {"gamma": 2.15 }, {"lightness": 12 } ] }, {"featureType": "road", "elementType": "labels.text.fill", "stylers": [{"visibility": "on"}, {"lightness": 24 } ] }, {"featureType": "road", "elementType": "geometry", "stylers": [{"lightness": 57 } ] } ];
            </script>


        </div>
    

            <div class="row">
                <div class="col-12">
                    <div class="office-wrapper" style="padding-bottom: 40px;">
                        <div id="map_office" class="map" style="height:400px;"></div>
                    </div>
                </div>
            </div>


        <div class="row justify-content-md-center">
            <?php
                $offices = get_field('offices','options');


                $map_counter = 0;

                $locations = array();
                

                foreach($offices as $office) {
                    
                    $map_counter++;
                    

                    $locations[] = '{lat: '.$office['location']['lat'].', lng: '.$office['location']['lng'].'}';


                    print '
                            <div class="col-md">
                                    <script>


                                        /*
                                        var pos_'.$map_counter.' = {lat: '.$office['location']['lat'].', lng: '.$office['location']['lng'].'};
                                        var map_office = new google.maps.Map(document.getElementById("map_office"), {
                                          center: pos_'.$map_counter.',
                                          zoom: 12,

                                           disableDefaultUI: false,

                                            zoomControl: true,
                                            mapTypeControl: false,
                                            scaleControl: false,
                                            streetViewControl: false,
                                            rotateControl: false,
                                            fullscreenControl: false,
                                            styles: mapStyle,
                                        });

                                        var marker_'.$map_counter.' = new google.maps.Marker({
                                          position: pos_'.$map_counter.',
                                          map: map_office,
                                          icon: icon
                                        });

                                        */


                                    </script>

                                    <h4>'.$office['title'].'</h4>
                                    <p>'.$office['address'].'</p>
                                
                            </div>
                    ';
                }


                print '<script>



                function initialize() {
                    var locations = ['.implode(",",$locations).'];
                    console.log(locations);



                    var map = new google.maps.Map(document.getElementById("map_office"), {
                            zoom: 2,
                            center: new google.maps.LatLng(19.500435, 10.100255),
                            disableDefaultUI: false,

                            zoomControl: true,
                            mapTypeControl: false,
                            scaleControl: false,
                            streetViewControl: false,
                            rotateControl: false,
                            fullscreenControl: false,
                            styles: mapStyle,
                        });

                        var infowindow = new google.maps.InfoWindow();

                    var marker, i;

                        for (i = 0; i < locations.length; i++) {  
                          marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i]["lat"], locations[i]["lng"]),
                            map: map,
                            icon: icon
                          });

                          /*google.maps.event.addListener(marker, "click", (function(marker, i) {
                            return function() {
                              infowindow.setContent(locations[i][0]);
                              infowindow.open(map, marker);
                            }
                          })(marker, i));
                          */
                        }
                    }

                    initialize();

                </script>';
            ?>
        </div>

    </div>
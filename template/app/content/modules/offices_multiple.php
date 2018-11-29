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


            <?php
                $offices = get_field('offices','options');


                $map_counter = 0;
                foreach($offices as $office) {
                    
                    $map_counter++;
                    print '
                            <div class="col-md">
                                <div class="office">
                                    <div id="map_'.$map_counter.'" class="map"></div>
                                    <script>

                                        var pos_'.$map_counter.' = {lat: '.$office['location']['lat'].', lng: '.$office['location']['lng'].'};
                                        var map_'.$map_counter.' = new google.maps.Map(document.getElementById("map_'.$map_counter.'"), {
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
                                          map: map_'.$map_counter.',
                                          icon: icon
                                        });



                                    </script>

                                    <h4>'.$office['title'].'</h4>
                                    <p>'.$office['address'].'</p>
                                </div>
                            </div>
                    ';
                }
            ?>
        </div>

    </div>
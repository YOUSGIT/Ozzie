<!DOCTYPE HTML>
<html>
<head>
   <?php require_once('inc/_head.php'); ?>
   
   <!-- 
            You need to include this script on any page that has a Google Map.
            When using Google Maps on your own site you MUST signup for your own API key at:
                https://developers.google.com/maps/documentation/javascript/tutorial#api_key
            After your sign up replace the key in the URL below or paste in the new script tag that Google provides.
        -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>

    <script type="text/javascript">
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 15,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(25.036484, 121.574874), // taipei

                // How you would like to style the map. 
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{ "featureType": "landscape", "stylers": [{ "visibility": "simplified" }, { "color": "#2b3f57" }, { "weight": 0.1 }] }, { "featureType": "administrative", "stylers": [{ "visibility": "on" }, { "hue": "#ff0000" }, { "weight": 0.4 }, { "color": "#ffffff" }] }, { "featureType": "road.highway", "elementType": "labels.text", "stylers": [{ "weight": 1.3 }, { "color": "#FFFFFF" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#f55f77" }, { "weight": 3 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#f55f77" }, { "weight": 1.1 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#f55f77" }, { "weight": 0.4 }] }, {}, { "featureType": "road.highway", "elementType": "labels", "stylers": [{ "weight": 0.8 }, { "color": "#ffffff" }, { "visibility": "on" }] }, { "featureType": "road.local", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.arterial", "elementType": "labels", "stylers": [{ "color": "#ffffff" }, { "weight": 0.7 }] }, { "featureType": "poi", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "stylers": [{ "color": "#6c5b7b" }] }, { "featureType": "water", "stylers": [{ "color": "#f3b191" }] }, { "featureType": "transit.line", "stylers": [{ "visibility": "on" }] }]
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(25.036484, 121.574874),
                map: map,
                title: 'Snazzy!'
            });
        }
    </script>
   
</head>

<body>

    <div id="container">

        <?php require_once('inc/_header.php'); ?>

        <div id="main">
            <div id="contact">
                <div class="title">Contact</div>
                <div class="text">
                    <div class="info_a">
                        <p>Ozzie Art Consultants Corp.</p>
                        <p>&nbsp;</p>
                    </div>
                    <div class="info_a">
                        <p>奧茲藝術顧問有限公司</p>
                        <p>&nbsp;</p>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="info_a">
                        <p>
                            25F., No.159, Songde Rd., Xinyi Dist.<br>
                            Taipei City 110, Taiwan
                        </p>
                        <p>台北市信義區松德路159號25樓</p>
                    </div>
                    <div class="info_a">
                        <p>
                            T.  02-2346-7122
                            <br>
                            F.  02-2346-7133
                        </p>
                        <p><a href="mailto:ozziesu.art@gmail.com">ozziesu.art@gmail.com</a></p>
                    </div>
                    <div class="info_a">
                        <p>
                            <img src="images/fb.svg">
                            <a href="#">Visit us on Facebook</a></p>
                        <p>
                            <img src="images/Weibo.svg">
                            <a href="#">Visit us on Weibo</a></p>
                    </div>
                    <div style="clear: both;"></div>
                    <!-- end .text-->
                </div>
                <div id="map"></div>

                <!-- end .about-->
            </div>
            </div>


            <?php require_once('inc/_footer.php'); ?>



        </div>

        

    </div>
    <?php require_once('inc/_foot.php'); ?>
    
</body>

</html>

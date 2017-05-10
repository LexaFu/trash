<?php
/**
 * Created by PhpStorm.
 * User: axel
 * Date: 28/03/2017
 * Time: 11:26
 */

include 'header.php';
?>
    <div class="map" id="map">
        <script>
            function initMap() {

                var pos;
                // Create a map object and specify the DOM element for display.
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: -34.397, lng: 150.644},
                    scrollwheel: false,
                    zoom: 15
                });
                var infoWindow = new google.maps.InfoWindow({map: map});

                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        ok.addEventListener("click", function (){
                            var marker = new google.maps.Marker({
                                position: pos,
                                map: map,
                                title: 'Hello World!'
                            });

                        });


                        infoWindow.setPosition(pos);
                        infoWindow.setContent('Location found.');
                        map.setCenter(pos);
                    }, function () {
                        handleLocationError(true, infoWindow, map.getCenter());
                    });
                } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                }

                var marker = new google.maps.Marker({
                    position: pos,
                    map: map,
                    title: 'Hello World!'
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDw5uQmcggSjIH3qc1jct_vaNZp-2cP15w&callback=initMap"
            async defer></script>

    </div>

<?php
include 'footer.php';






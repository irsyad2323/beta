<!DOCTYPE html>
<html>
<head>
    <title>Google Maps Search with Draggable Marker</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
        #search-form {
            margin-bottom: 10px;
        }
    </style>
    <script>
        let map;
        let geocoder;
        let marker;
        let autocomplete;

        function initMap() {
            // Create a new map
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -34.397, lng: 150.644 },
                zoom: 8
            });

            geocoder = new google.maps.Geocoder();

            // Create a draggable marker using the standard Marker class
            marker = new google.maps.Marker({
                map: map,
                position: { lat: -34.397, lng: 150.644 },
                draggable: true
            });

            // Add event listener for when marker is dragged
            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById('coordinates').textContent = `Coordinates: ${event.latLng.lat()}, ${event.latLng.lng()}`;
            });

            // Set up the autocomplete feature
            const input = document.getElementById('address');
            autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function() {
                const place = autocomplete.getPlace();
                if (place.geometry) {
                    map.setCenter(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                    document.getElementById('coordinates').textContent = `Coordinates: ${place.geometry.location.lat()}, ${place.geometry.location.lng()}`;
                } else {
                    alert('No details available for input: ' + input.value);
                }
            });
        }

        // Function to load Google Maps API script dynamically
        function loadGoogleMapsAPI() {
            const script = document.createElement('script');
            script.src = 'get_api_key.php?callback=initMap';
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);
        }

        window.onload = loadGoogleMapsAPI;
    </script>
</head>
<body>
    <form id="search-form">
        <input id="address" type="text" placeholder="Enter an address" required>
    </form>
    <div id="map"></div>
    <p id="coordinates">Coordinates: </p>
</body>
</html>

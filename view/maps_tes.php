<!DOCTYPE html>
<html>
<head>
    <title>Google Maps dengan AdvancedMarkerElement</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
        #search {
            margin-bottom: 10px;
        }
        .custom-marker {
            width: 32px;
            height: 32px;
            background-color: orange;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h3>My Google Maps Demo</h3>
<input type="text" id="search" placeholder="Cari nama ODP...">
<div id="map"></div>

<script>
    var map;
    var markers = [];
    var allLocations = [];

    function initMap() {
        var mapOptions = {
            zoom: 10,
            center: {lat: -6.175110, lng: 106.865039} // Pusat peta di Jakarta
        };
        map = new google.maps.Map(document.getElementById('map'), mapOptions);

        // Menggunakan AJAX untuk mengambil data lokasi dari PHP
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'maps_query.php', true);
        xhr.onload = function() {
            if (this.status == 200) {
                allLocations = JSON.parse(this.responseText);

                // Menambahkan marker untuk setiap lokasi
                addMarkers(allLocations);
            }
        };
        xhr.send();
    }

    function addMarkers(locations) {
        // Menghapus marker yang ada
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        // Menambahkan marker baru berdasarkan lokasi
        locations.forEach(function(location) {
            var markerContent = document.createElement('div');
            markerContent.className = 'custom-marker';
            markerContent.innerText = location.nama_odp.substring(0, 1); // Menampilkan huruf pertama dari nama ODP sebagai contoh

            var marker = new google.maps.marker.AdvancedMarkerElement({
                position: {lat: parseFloat(location.latitude), lng: parseFloat(location.longitude)},
                map: map,
                content: markerContent
            });

            markers.push(marker);
        });
    }

    // Fungsi untuk mencari nama ODP
    document.getElementById('search').addEventListener('keyup', function() {
        var searchInput = this.value.toLowerCase();
        var filteredLocations = allLocations.filter(function(location) {
            return location.nama_odp.toLowerCase().includes(searchInput);
        });

        addMarkers(filteredLocations);
    });
</script>

<!-- Masukkan Google Maps API Key di bawah ini -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCF0F_M6IBOlzYMqrHQXiSBbnvv8npHafs&callback=initMap"></script>

</body>
</html>

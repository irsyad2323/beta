<?php
// get_google_maps_api.php

// Ambil konfigurasi
$config = require('config.php');
$apiKey = $config['google_maps_api_key'];

// Ambil parameter dari query string
$callback = isset($_GET['callback']) ? $_GET['callback'] : 'initMap';

// Siapkan URL untuk script Google Maps API
$url = "https://maps.googleapis.com/maps/api/js?key=" . $apiKey . "&libraries=places&callback=" . $callback;

// Redirect ke URL Google Maps API
header("Location: " . $url);
?>

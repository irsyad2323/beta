<?php
session_start();
require_once 'controller.php';

header('Content-type: application/vnd.google-earth.kml+xml');
header('Content-Disposition: attachment; filename="Instalasi_ODP.kml"');

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<kml xmlns="http://www.opengis.net/kml/2.2">';
echo '<Document>';
echo '<name>Data Instalasi ODP</name>';

$query = "SELECT a.nama_odp, a.latitude, a.longitude, a.alamat_odp, a.kelurahan FROM tbl_odp a WHERE a.status_wo='Sudah Terpasang'";
$statement = $conn->prepare($query);
$statement->execute();

if ($statement->rowCount() > 0) {
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo '<Placemark>';
        echo '<name>' . htmlspecialchars($row['nama_odp']) . '</name>';
        echo '<description>' . htmlspecialchars($row['alamat_odp']) . ', Kelurahan: ' . htmlspecialchars($row['kelurahan']) . '</description>';
        echo '<Point>';
        echo '<coordinates>' . $row['longitude'] . ',' . $row['latitude'] . ',0</coordinates>';
        echo '</Point>';
        echo '</Placemark>';
    }
}

echo '</Document>';
echo '</kml>';
exit;

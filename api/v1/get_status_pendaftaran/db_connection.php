<?php
$pg_host = '103.163.139.36';
$pg_dbname = 'db_kapten';
$pg_user = 'vps_postgress';
$pg_password = '231215';

$conn = pg_connect("host=$pg_host dbname=$pg_dbname user=$pg_user password=$pg_password");

if (!$conn) {
    die(json_encode([
        "code" => 500,
        "status" => "error",
        "message" => "Koneksi ke database gagal"
    ]));
}
?>

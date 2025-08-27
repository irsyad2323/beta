<?php
require_once __DIR__ . '/../helpers/response.php';

$host = '103.163.139.36';
$dbname = 'db_kapten';
$user = 'vps_postgress';
$password = '231215';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    sendResponse('error', 500, "Database connection failed");
}

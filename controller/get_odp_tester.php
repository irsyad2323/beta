<?php
include 'controller.php'; // pastikan koneksi pakai PDO

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    try {
        $query = "SELECT id_odp, nama_odp, alamat_odp, latitude, longitude FROM tbl_odp WHERE id_odp = :id";
        $stmt = $conn->prepare($query); // $conn = PDO
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $odp = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($odp) {
            echo json_encode($odp);
        } else {
            echo json_encode(['error' => 'Data tidak ditemukan']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
?>

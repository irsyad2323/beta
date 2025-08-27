<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "SELECT id_odp, nama_odp, alamat_odp, latitude, longitude FROM tbl_odp WHERE id_odp = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $odp = $result->fetch_assoc();

    echo json_encode($odp);
}
?>

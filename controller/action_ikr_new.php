<?php
include('controller.php');
header('Content-Type: application/json');

// Validasi koneksi PDO
if (!$conn) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

$action = isset($_POST['action']) ? $_POST['action'] : null;

$letak_odpne = isset($_POST['letak_odpne']) ? $_POST['letak_odpne'] : null;
$alamat_odp  = isset($_POST['alamat_odp']) ? $_POST['alamat_odp'] : null;
$kd_layanan  = isset($_POST['kd_layanan']) ? $_POST['kd_layanan'] : null;
$kelurahan   = isset($_POST['kelurahan']) ? $_POST['kelurahan'] : null;
$lain_lain   = isset($_POST['lain_lain']) ? $_POST['lain_lain'] : null;
$latitude    = isset($_POST['latitude']) ? $_POST['latitude'] : null;
$longitude   = isset($_POST['longitude']) ? $_POST['longitude'] : null;

try {
    // Pastikan action tersedia
    if (!$action) {
        echo json_encode(['status' => 'error', 'message' => 'Aksi tidak ditemukan']);
        exit;
    }

    if ($action == "insert") {
        // Pastikan data yang dibutuhkan ada
        if (!$letak_odpne || !$alamat_odp || !$kd_layanan) {
            echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap untuk insert']);
            exit;
        }

        // Insert data
        $query = "INSERT INTO tbl_fal (
            letak_odp, alamat_fal, kd_layanan, kelurahan, lain_lain, latitude, longitude
        ) VALUES (
            :letak_odp, :alamat_fal, :kd_layanan, :kelurahan, :lain_lain, :latitude, :longitude
        )";

        $stmt = $conn->prepare($query);
        $stmt->execute([
            ':letak_odp'   => $letak_odpne,
            ':alamat_fal'  => $alamat_odp,
            ':kd_layanan' => $kd_layanan,
            ':kelurahan'  => $kelurahan,
            ':lain_lain'  => $lain_lain,
            ':latitude'   => $latitude,
            ':longitude'  => $longitude
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan']);

    } elseif ($action == "update") {
        // Pastikan ID dikirim untuk update
       

        // Periksa apakah ID ada di database
        $checkQuery = "SELECT id FROM tbl_fal WHERE id = :id";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->execute([':id' => $id]);


        // Update data
        $query = "UPDATE tbl_fal SET 
            letak_odp = :letak_odp,
            alamat_fal = :alamat_fal,
            kd_layanan = :kd_layanan,
            kelurahan = :kelurahan,
            lain_lain = :lain_lain,
            latitude = :latitude,
            longitude = :longitude
        WHERE id = :id";

        $stmt = $conn->prepare($query);
        $stmt->execute([
            ':letak_odp'   => $letak_odpne,
            ':alamat_fal'  => $alamat_odp,
            ':kd_layanan' => $kd_layanan,
            ':kelurahan'  => $kelurahan,
            ':lain_lain'  => $lain_lain,
            ':latitude'   => $latitude,
            ':longitude'  => $longitude,
            ':id'         => $id
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Data berhasil diperbarui']);

    } else {
        echo json_encode(['status' => 'error', 'message' => 'Aksi tidak dikenal']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}

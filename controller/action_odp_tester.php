<?php
include('controller.php');
header('Content-Type: application/json');

// Validasi koneksi PDO
if (!$conn) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

$action = $_POST['action'];

$nama_odp      = $_POST['nama_odp'];
$kd_layanan    = $_POST['kd_layanan'];
$alamat_odp    = $_POST['alamat_odp'];
$rt            = $_POST['rt'];
$rw            = $_POST['rw'];
$kelurahan     = $_POST['kelurahan'];
$pic_ikr       = $_POST['pic_ikr'];
$tlp_fal       = $_POST['tlp_fal'];
$status_string = $_POST['status'];
$pic           = strtok($status_string, '#');
$status        = substr($status_string, strpos($status_string, '#') + 1);

$status2_string = $_POST['status2'];
$pic2          = strtok($status2_string, '#');
$status2       = substr($status2_string, strpos($status2_string, '#') + 1);

$jenis_wo     = $_POST['jenis_wo'];
$tgl_fal      = $_POST['tgl_fal'];
$produk       = $_POST['produk'];
$modem        = $_POST['modem'];
$spltr        = $_POST['spltr'];
$spltr2       = $_POST['spltr2'];
$spltr3       = $_POST['spltr3'];
$kabel1       = $_POST['kabel1'];
$kabel2       = $_POST['kabel2'];
$kabel3       = $_POST['kabel3'];
$sp           = $_POST['sp'];
$sp2          = $_POST['sp2'];
$sp3          = $_POST['sp3'];
$paket_fal    = $_POST['paket_fal'];
$id_odp       = $_POST['id_odp'];
$password_fal = $_POST['password_fal'];
$lain_lain    = $_POST['lain_lain'];
$status_wo    = $_POST['status_wo'];
$foto_dpn_rmh = $_POST['foto_dpn_rmh'];
$latitude     = $_POST['latitude'];
$longitude    = $_POST['longitude'];

try {
    if ($action == "insert") {
        // Insert ke nama_tabel_odp
        $query1 = "INSERT INTO nama_tabel_odp (
            id_odp, nama_odp, alamat_odp, kd_layanan, kelurahan, lain_lain,
            kabel1, kabel2, kabel3, latitude, longitude
        ) VALUES (
            :id_odp, :nama_odp, :alamat_odp, :kd_layanan, :kelurahan, :lain_lain,
            :kabel1, :kabel2, :kabel3, :latitude, :longitude
        )";

        $stmt1 = $conn->prepare($query1);
        $stmt1->execute([
            ':id_odp'      => $id_odp,
            ':nama_odp'    => $nama_odp,
            ':alamat_odp'  => $alamat_odp,
            ':kd_layanan'  => $kd_layanan,
            ':kelurahan'   => $kelurahan,
            ':lain_lain'   => $lain_lain,
            ':kabel1'      => $kabel1,
            ':kabel2'      => $kabel2,
            ':kabel3'      => $kabel3,
            ':latitude'    => $latitude,
            ':longitude'   => $longitude
        ]);

        // Insert ke tbl_odp
        $query2 = "INSERT INTO tbl_odp (
            nama_odp, alamat_odp, id_odp, lain_lain, kd_layanan, pic_ikr, kelurahan,
            produk, pic, pic2, status, status2, ket, latitude, longitude, 
            tanggal_instalasi, spliter, spliter2, spliter3, kabel1, status_wo
        ) VALUES (
            :nama_odp, :alamat_odp, :id_odp, :lain_lain, :kd_layanan, :pic_ikr, :kelurahan,
            'Kapten Naratel', :pic, :pic2, :status, :status2, '', :latitude, :longitude,
            CURRENT_TIMESTAMP(), :spltr, :spltr2, :spltr3, :kabel1, :status_wo
        )";

        $stmt2 = $conn->prepare($query2);
        $stmt2->execute([
            ':nama_odp'   => $nama_odp,
            ':alamat_odp' => $alamat_odp,
            ':id_odp'     => $id_odp,
            ':lain_lain'  => $lain_lain,
            ':kd_layanan' => $kd_layanan,
            ':pic_ikr'    => $pic_ikr,
            ':kelurahan'  => $kelurahan,
            ':pic'        => $pic,
            ':pic2'       => $pic2,
            ':status'     => $status,
            ':status2'    => $status2,
            ':latitude'   => $latitude,
            ':longitude'  => $longitude,
            ':spltr'      => $spltr,
            ':spltr2'     => $spltr2,
            ':spltr3'     => $spltr3,
            ':kabel1'     => $kabel1,
            ':status_wo'  => $status_wo
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Data berhasil disimpan']);
    } elseif ($action == "edit") {
        $query = "UPDATE tbl_odp 
                  SET nama_odp = :nama_odp,
                      alamat_odp = :alamat_odp,
                      pic = :pic,
                      pic2 = :pic2,
                      status = :status,
                      status2 = :status2,
                      spliter = :spltr,
                      spliter2 = :spltr2,
                      spliter3 = :spltr3,
                      pic_ikr = :pic_ikr,
                      tanggal_instalasi = CURRENT_TIMESTAMP(),
                      lain_lain = :lain_lain,
                      status_wo = :status_wo,
                      latitude = :latitude,
                      longitude = :longitude
                  WHERE id_odp = :id_odp";

        $stmt = $conn->prepare($query);
        $stmt->execute([
            ':nama_odp'   => $nama_odp,
            ':alamat_odp' => $alamat_odp,
            ':pic'        => $pic,
            ':pic2'       => $pic2,
            ':status'     => $status,
            ':status2'    => $status2,
            ':spltr'      => $spltr,
            ':spltr2'     => $spltr2,
            ':spltr3'     => $spltr3,
            ':pic_ikr'    => $pic_ikr,
            ':lain_lain'  => $lain_lain,
            ':status_wo'  => $status_wo,
            ':latitude'   => $latitude,
            ':longitude'  => $longitude,
            ':id_odp'     => $id_odp
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Data berhasil diupdate']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Action tidak dikenal']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'PDO Error: ' . $e->getMessage()]);
}
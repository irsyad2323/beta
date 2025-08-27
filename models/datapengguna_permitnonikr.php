<?php
session_start();
$level_user = $_SESSION["level_user"];
$kota = $_SESSION["level_kantor"];

include('../controller/controller.php');

$login_username = $_SESSION["username"];
$filter_status = $_POST['filter_status'];

$query = "SELECT p.*, ps.permit_status_id, ps.keterangan, ps.pic, ps.status, ps.dokumentasi,ps.metode_followup, DATE_FORMAT(ps.created_at, '%d-%m-%Y %H:%i:%s') AS tgl, DATEDIFF(CURDATE(), ps.created_at) AS jumday 
          FROM tbl_permit p 
          JOIN tbl_permit_status ps ON p.key_fal = ps.key_fal 
          WHERE ps.status = '$filter_status'
          ORDER BY ps.created_at DESC";

// $query = "SELECT p.*, ps.permit_status_id, ps.keterangan, ps.pic, ps.status, ps.dokumentasi,ps.metode_followup, DATE_FORMAT(ps.created_at, '%d-%m-%Y %H:%i:%s') AS tgl, DATEDIFF(CURDATE(), ps.created_at) AS jumday 
//           FROM tbl_permit p 
//           JOIN tbl_permit_status ps ON p.key_fal = ps.key_fal 
//           WHERE ps.status = '$filter_status' AND ps.created_by = '$login_username'
//           ORDER BY tgl DESC";

$statement = $conn->prepare($query);
$statement->execute();

$data = $statement->fetchAll(PDO::FETCH_ASSOC);

$status_badges = [
    'closing' => 'success',
    'reject' => 'danger',
    'inisiasi_perkenalan' => 'primary',
    'negosiasi' => 'warning',
    're_visit_followup' => 'info'
];

foreach ($data as $index => $row) {
    $data[$index]['no'] = $index + 1;
    $data[$index]['action'] = '
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ACTION
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="../' . $row["dokumentasi"] . '" class="dropdown-item" target="_blank">Dokumentasi</a>
                <a href="../' . $row["file_hasil"] . '" class="dropdown-item" target="_blank">Berita Acara</a>
                <a key_fal="' . $row["key_fal"] . '" 
                   name="edit" 
                   permit_status_id="' . $row["permit_status_id"] . '"
                   nama="' . $row["nama"] . '"
                   alamat="' . $row["alamat"] . '"
                   rt="' . $row["rt"] . '"
                   rw="' . $row["rw"] . '"
                   kelurahan="' . $row["kelurahan"] . '"
                   tlp="' . $row["tlp"] . '"
                   jabatan="' . $row["jabatan"] . '"
                   kd_layanan="' . $row["kd_layanan"] . '" 
                   pic="' . $row["pic"] . '" 
                   status="' . $row["status"] . '" 
                   metode_followup="' . $row["metode_followup"] . '" 
                   keterangan="' . $row["keterangan"] . '"
                   class="dropdown-item editpermit">Upload Hasil</a>
            </div>
        </div>';

    $status = $row['status'];
    $data[$index]['type_status'] = isset($status_badges[$status])
        ? '<small class="badge badge-' . $status_badges[$status] . '">' . strtoupper($status) . '</small>'
        : $status;
}

echo json_encode(['data' => $data]);

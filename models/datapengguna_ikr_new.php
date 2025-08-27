<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../controller/controller.php');

if (!isset($_SESSION["level_user"])) {
    echo json_encode(["error" => "Session level_user tidak ditemukan"]);
    exit;
}

if (!isset($_SESSION["username"])) {
    echo json_encode(["error" => "Session username tidak ditemukan"]);
    exit;
}

$level_user = $_SESSION["level_user"];
$acces_user_log = $_SESSION["username"];

$start = isset($_POST['start']) ? (int)$_POST['start'] : 0; 
$length = isset($_POST['length']) ? (int)$_POST['length'] : 10;

// Ambil filter tanggal
$startDate = $_POST['startDate'] ?? null;
$endDate = $_POST['endDate'] ?? null;

// Ambil nilai pencarian
$searchValue = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';

// Mulai dengan filter dasar
$where = "status_wo='Sudah Terpasang'";

// Tambahkan filter berdasarkan tanggal jika ada
if ($startDate && $endDate) {
    $where .= " AND tanggal_instalasi BETWEEN '$startDate' AND '$endDate'";
}

// Tambahkan filter pencarian jika ada
if ($searchValue) {
    $where .= " AND (nama_fal LIKE '%$searchValue%' OR alamat_fal LIKE '%$searchValue%' OR pic_ikr LIKE '%$searchValue%')";
}

// Sesuaikan query berdasarkan level user
if ($level_user == "ikr") {
    $where .= " AND pic_ikr='" . $acces_user_log . "'";
} else if ($level_user == "ts") {
    $where .= " AND tanggal_instalasi = CURDATE()";
} else if (!in_array($level_user, ['Admin', 'kapten'])) {
    $where = "1=0"; // default kosong jika level tidak sesuai
}

// Query final
$query = "SELECT * FROM tbl_fal WHERE $where ORDER BY key_fal DESC LIMIT $start, $length";

// Eksekusi query
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$statement = $conn->prepare($query);
$statement->execute();
$data = $statement->fetchAll();

// Hitung total sesuai filter
$totalQuery = "SELECT COUNT(*) FROM tbl_fal WHERE $where";
$totalResult = $conn->query($totalQuery)->fetchColumn();

if ($statement->rowCount() > 0) {
    $i = 0;
    $no = 1;
    foreach ($data as $dataz) {
        $data[$i]['no'] = $no;

        $fotoBase64 = !empty($data[$i]["foto_dpn_rmh"]) ? 
            (strpos($data[$i]["foto_dpn_rmh"], 'data:image/jpeg;base64,') === false
                ? 'data:image/jpeg;base64,' . $data[$i]["foto_dpn_rmh"]
                : $data[$i]["foto_dpn_rmh"])
            : '';

        $action = '
        <div class="dropdown">
            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton' . $data[$i]["key_fal"] . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cogs"></i> Aksi
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton' . $data[$i]["key_fal"] . '">
                <a class="dropdown-item editpengguna" href="#" id="' . $data[$i]["key_fal"] . '">
                    <i class="fas fa-pen text-info mr-2"></i>Edit
                </a>';

        if ($level_user != "ikr") {
            $action .= '
                <a class="dropdown-item deletepengguna" href="#" id="' . $data[$i]["key_fal"] . '">
                    <i class="fas fa-trash-alt text-danger mr-2"></i>Delete
                </a>';

            if (!empty($data[$i]["foto_dpn_rmh"])) {
                $action .= '
                    <a class="dropdown-item" href="#" onclick="showFotoBase64(\'' . $fotoBase64 . '\')">
                        <i class="fas fa-image text-success mr-2"></i>Lihat Foto
                    </a>';
            }
        }

        $action .= '</div></div>';
        $data[$i]['action'] = $action;

        $i++;
        $no++;
    }

    echo json_encode([
        "draw" => isset($_POST['draw']) ? $_POST['draw'] : 1,
        "recordsTotal" => $totalResult,
        "recordsFiltered" => $totalResult,
        "data" => $data
    ]);
} else {
    echo json_encode(["data" => []]);
}
?>

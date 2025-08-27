<?php
session_start();
$level_user = $_SESSION["level_user"];



include('../controller/controller.php');

// $query = mysqli_query($conn, 'SELECT * FROM pengguna');
$acces_user_log = $_SESSION["username"];
if ($level_user == "ikr") {
    $query = "SELECT * FROM tbl_odp WHERE status_wo='Belum Terpasang' and pic_ikr='" . $acces_user_log . "' ORDER BY key_odp DESC ";
} else if ($level_user == "Admin") {
    $query = "SELECT * FROM tbl_odp WHERE ORDER BY key_odp DESC";
} else if ($level_user == "kapten") {
    $query = "SELECT * FROM tbl_odp ";
} else if ($level_user == "ts") {
    $query = "SELECT * FROM tbl_odp WHERE tanggal_instalasi = CURDATE() ORDER BY key_odp DESC ";
}
//$query = "SELECT * FROM tbl_odp ";

$statement = $conn->prepare($query);

$statement->execute();

$data = $statement->fetchAll();

//print_r($data);
// while ($row = mysqli_fetch_assoc($query)) {
// 	$data[] = $row;
// }
// $datay= SELECT JSON_ARRAY(array($data)) as 'data';


$i = 0;
$no = 1;
foreach ($data as $dataz) {
    $data[$i]['no'] = $no;

    // Mulai bikin isi action
    $fotoBase64 = !empty($data[$i]["photo"]) ? (strpos($data[$i]["photo"], 'data:image/jpeg;base64,') === false ? 'data:image/jpeg;base64,' . $data[$i]["photo"] : $data[$i]["photo"]) : '';

    $action = '
    <div class="dropdown">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton' . $data[$i]["id_odp"] . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-cogs"></i> Aksi
        </button>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton' . $data[$i]["id_odp"] . '">
            <a class="dropdown-item editpengguna" href="#" id="' . $data[$i]["id_odp"] . '">
                <i class="fas fa-pen text-info mr-2"></i>Edit
            </a>';

    if ($_SESSION["level_user"] != "ikr") {
        $action .= '
                    <a class="dropdown-item deletepengguna" href="#" id="' . $data[$i]["id_odp"] . '">
                        <i class="fas fa-trash-alt text-danger mr-2"></i>Delete
                    </a>';

        // Pastikan tidak ada 'data:image/jpeg;base64,' yang duplikat
        if (!empty($data[$i]["photo"])) {
            $fotoBase64 = $data[$i]["photo"]; // Base64 image without the prefix
            $action .= '
                    <a class="dropdown-item" href="#" onclick="showFotoBase64(\'' . $fotoBase64 . '\')">
                        <i class="fas fa-image text-success mr-2"></i>Lihat Foto
                    </a>';
        }
    }


    $action .= '
        </div>
    </div>';


    $data[$i]['action'] = $action;



    // Status badge
    if ($data[$i]['status_wo'] == 'Sudah Terpasang') {
        $data[$i]['type_status'] = '<small class="badge badge-success">' . strtoupper($data[$i]['status_wo']) . '</small>';
    } elseif ($data[$i]['status_wo'] == 'Belum Terpasang') {
        $data[$i]['type_status'] = '<small class="badge badge-danger">' . strtoupper($data[$i]['status_wo']) . '</small>';
    } else {
        $data[$i]['type_status'] = $data[$i]['status_wo'];
    }

    $i++;
    $no++;
}

$datax = array('data' => $data);


//print_r($datax);
echo json_encode($datax);

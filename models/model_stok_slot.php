<?php
session_start();
$level_user = $_SESSION["level_user"];
$kota = $_SESSION["level_kantor"];
include('../controller/controller.php');

// Tangkap input tanggal dari request
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : null;
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : null;

$query = "SELECT * FROM baris_kotak WHERE DATE(tanggal) = CURDATE();";

// Tambahkan kondisi filter tanggal jika tersedia
if ($start_date && $end_date) {
    $query = "SELECT * FROM baris_kotak WHERE tanggal BETWEEN :start_date AND :end_date";
}

$statement = $conn->prepare($query);

if ($start_date && $end_date) {
    $statement->bindParam(':start_date', $start_date);
    $statement->bindParam(':end_date', $end_date);
}

$statement->execute();
$data = $statement->fetchAll();
$i = 0;
$no = 1;

foreach ($data as $dataz) {
    $data[$i]['no'] = $no;

    if ($data[$i]['area'] == 'mlg') {
        $data[$i]['lyn_area'] = '<small class="badge badge-success">' . strtoupper($data[$i]['area']) . '</small>';
    } elseif ($data[$i]['area'] == 'pas') {
        $data[$i]['lyn_area'] = '<small class="badge badge-danger">' . strtoupper($data[$i]['area']) . '</small>';
    } else {
        $data[$i]['lyn_area'] = $data[$i]['area'];
    }

    if ($data[$i]['jumlah_hijau'] >= '0') {
        $data[$i]['tot_slot'] = '<small class="badge badge-success">' . strtoupper($data[$i]['jumlah_hijau']) . '</small>';
    } elseif ($data[$i]['jumlah_hijau'] <= '1') {
        $data[$i]['tot_slot'] = '<small class="badge badge-danger">' . strtoupper($data[$i]['jumlah_hijau']) . '</small>';
    }

    if ($data[$i]['baris_no'] == '1') {
        $data[$i]['slot'] = 'Slot 06:00:00 - 07:59:59';
    } elseif ($data[$i]['baris_no'] == '2') {
        $data[$i]['slot'] = 'Slot 08:00:00 - 09:59:59';
    } elseif ($data[$i]['baris_no'] == '3') {
        $data[$i]['slot'] = 'Slot 10:00:00 - 12:59:59';
    } elseif ($data[$i]['baris_no'] == '4') {
        $data[$i]['slot'] = 'Slot 13:00:00 - 14:59:59';
    } elseif ($data[$i]['baris_no'] == '5') {
        $data[$i]['slot'] = 'Slot 15:00:00 - 17:59:59';
    } elseif ($data[$i]['baris_no'] == '6') {
        $data[$i]['slot'] = 'Slot 18:00:00 - 19:59:59';
    } else {
        $data[$i]['slot'] = 'jadwal kosong';
    }

    $data[$i]['action'] = '<div class="btn-group">	 
		<button type="button" name="edit" id="' . $data[$i]["id"] . '" jumlah_hijau="' . $data[$i]["jumlah_hijau"] . '" tanggal="' . $data[$i]["tanggal"] . '" baris_no="' . $data[$i]["baris_no"] . '" slot="' . $data[$i]['slot'] . '" class="btn btn-info btn-sm mr-2 edt_jadwal">Edit</button>
	</div>';
$i++;
    $no++;
}

$datax = array('data' => $data);
echo json_encode($datax);

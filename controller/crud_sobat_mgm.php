<?php
include('../controller/controller_mysqli.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action == 'insert') {
        $nama_sobat = $_POST['nama_sobat'];
        $no_wa_sobat = $_POST['no_wa_sobat'];
        $metode_bayar = $_POST['metode_bayar'];
        $no_rekening = $_POST['no_rekening'];
        $an_rek = $_POST['an_rek'];
        $alamat = $_POST['alamat'];
        $tanggal = $_POST['tanggal'];

        $sql = "INSERT INTO tbl_sobat_mgm (nama_sobat, no_wa_sobat, metode_bayar, no_rekening, an_rek, alamat, tanggal) 
                VALUES ('$nama_sobat', '$no_wa_sobat', '$metode_bayar', '$no_rekening', '$an_rek', '$alamat', '$tanggal')";
        $result = $koneksi->query($sql);
        echo json_encode(['status' => $result]);
    }
	
	if ($action == 'fetch') {
        $id = $_POST['id'];
        $sql = "SELECT * FROM tbl_sobat_mgm WHERE id='$id'";
        $result = $koneksi->query($sql);
        $data = $result->fetch_assoc();
        echo json_encode($data);
    }

    if ($action == 'update') {
        $id = $_POST['id'];
        $nama_sobat = $_POST['nama_sobat'];
        $no_wa_sobat = $_POST['no_wa_sobat'];
        $metode_bayar = $_POST['metode_bayar'];
        $no_rekening = $_POST['no_rekening'];
        $an_rek = $_POST['an_rek'];
        $alamat = $_POST['alamat'];
        $tanggal = $_POST['tanggal'];

        $sql = "UPDATE tbl_sobat_mgm SET 
                nama_sobat='$nama_sobat', no_wa_sobat='$no_wa_sobat', metode_bayar='$metode_bayar', 
                no_rekening='$no_rekening', an_rek='$an_rek', alamat='$alamat', tanggal='$tanggal'
                WHERE id='$id'";
        $result = $koneksi->query($sql);
        echo json_encode(['status' => $result]);
    }

    if ($action == 'delete') {
        $id = $_POST['id'];
        $sql = "DELETE FROM tbl_sobat_mgm WHERE id='$id'";
        $result = $koneksi->query($sql);
        echo json_encode(['status' => $result]);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM tbl_sobat_mgm order by id desc";
    $result = $koneksi->query($sql);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}
  
  ?>	




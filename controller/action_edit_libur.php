<?php
include('controller_mysqli.php');

$key_fal2 = $_POST['key_fal2'];
$pic_ikr2 = $_POST['pic_ikr2'];
$kategori_pelanggan2 = $_POST['kategori_pelanggan2'];
$lain_lain2 = $_POST['lain_lain2'];
$username_fal2 = $_POST['username_fal2'];

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query pertama
$sql = "UPDATE tbl_disable_noconfirm 
        SET pic_ikr='$pic_ikr2', 
            kategori_pelanggan='$kategori_pelanggan2', 
            lain_lain='$lain_lain2', 
            status_log='l', 
            tgl_progres= CURRENT_DATE() 
        WHERE key_fal='$key_fal2'";

// Query kedua
$sql2 = "UPDATE tb_gundala SET status='off' WHERE kode_user ='$username_fal2'";

// Eksekusi query satu per satu
if (mysqli_query($koneksi, $sql) && mysqli_query($koneksi, $sql2)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>

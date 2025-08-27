<?php
session_start();
include('../controller/controller_mysqli.php');
$pic = $_SESSION["username"];
// Fungsi untuk membersihkan string
function clean($string) {
    $string = str_replace(' ', ' ', $string); // Mengganti semua spasi
    return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Menghapus karakter khusus
}

// Ambil data dari POST dan bersihkan
$nama_sinden1 = $_POST['nama_berhenti'];
$status_log_berhenti = $_POST['status_log_berhenti'];
$nama_berhenti = clean($nama_sinden1);  
$username_berhenti = mysqli_real_escape_string($koneksi, $_POST['username_berhenti']);
$kategori_pelanggan_berhenti = mysqli_real_escape_string($koneksi, $_POST['kategori_pelanggan_berhenti']);
$lain_lain_berhenti = mysqli_real_escape_string($koneksi, $_POST['lain_lain_berhenti']);

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL pertama untuk memperbarui kolom `kategori_pelanggan`
$sql1 = "UPDATE tbl_disable_noconfirm 
         SET kategori_pelanggan='$kategori_pelanggan_berhenti' 
         WHERE username_fal='$username_berhenti'";

// SQL kedua untuk memperbarui kolom `lain_lain`
$sql2 = "UPDATE tb_gundala 
         SET status_log='$status_log_berhenti', log_username_dcp = '".$pic."'
         WHERE kode_user='$username_berhenti'";

// Eksekusi SQL pertama
if (mysqli_query($koneksi, $sql1)) {
    echo "Kategori pelanggan updated successfully. ";
} else {
    echo "Error updating kategori pelanggan: " . mysqli_error($koneksi);
}

// Eksekusi SQL kedua
if (mysqli_query($koneksi, $sql2)) {
    echo "Lain-lain updated successfully.";
} else {
    echo "Error updating lain-lain: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>

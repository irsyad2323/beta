<?php
session_start();
include "../controller/controller_mysqli.php";

   $item=$_POST['item'];
   $devisi=$_POST['devisi'];
   $total=$_POST['total'];
   $harga=$_POST['harga'];
   $priode=$_POST['priode'];
   $keterangan=$_POST['keterangan'];
   $link=$_POST['link'];
   $anrekening=$_POST['anrekening'];
   $no_rek=$_POST['no_rek'];
   $metode=$_POST['metode'];
   $nomin = str_replace('.', '', $harga);
   
  
 /*  if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = mysqli_query($conn,"INSERT INTO tb_daf (tanggal2,tanggal,nama_lengkap,no_wa,alamat,rt,rw,provinsi,kabupaten,kecamatan,kelurahan,lokasi_sales) 
	   VALUES (CURRENT_TIMESTAMP(), CURRENT_DATE(), '$nama_user', '$telp_user', '$alamat_user', '$rt', '$rw', '$prov','$kab', '$kec', '$kel','$lokasi')");

if($sql > 1) {
        echo "Record updated successfully";
    } else {
  echo "Error updating record: " . mysqli_error($conn);
} */

// Create connection
//$koneksi = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO tbl_pengajuan (date, item, devisi, total, harga, priode, keterangan, link, user, layanan, anrekening, no_rek, metode) 
	   VALUES (CURRENT_TIMESTAMP(), '$item', '$devisi', '$total', '$nomin', '$priode', '$keterangan','$link','".$_SESSION["username"]."','".$_SESSION["level_kantor"]."', '$anrekening', '$no_rek', '$metode')";

if (mysqli_query($koneksi, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);
  
  ?>	




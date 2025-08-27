<?php
session_start();
$level_kantor = $_SESSION["kantor"];
$kota = $_SESSION["level_kantor"];
include('../controller/controller_mysqli.php');

/*   if (isset($_POST['username_sinden'])){
	  $nama_sinden = $_POST['nama_sinden'];
	  $alamat_sinden = $_POST['alamat_sinden'];
	  $tlp_sinden = $_POST['tlp_sinden'];
	  $paket_sinden = $_POST['paket_sinden'];
	  $tanggal_sinden = $_POST['tanggal_sinden'];
	  $username_sinden = $_POST['username_sinden'];
	  
	  $result = mysqli_query($koneksi,"UPDATE tbl_fal SET nama_fal='$nama_sinden', alamat_fal='$alamat_sinden', tgl_fal='$tanggal_sinden',tlp_fal='$tlp_sinden',paket_fal='$paket_sinden' WHERE username_fal='$username_sinden'");
	  if($result){
		  return 'data update'
	}
  } */
	$key_fal = $_POST['key_fal'];
	$id_tran_jrnl = $_POST['id_tran_jrnl'];
    $nama_sobat = $_POST['nama_sobat'];
    $verified_fls = $_POST['verified_fls'];
    $ket_fls = $_POST['ket_fls'];
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_fal set verified_fls='$verified_fls', ket_mgm='$ket_fls', id_tran_jrnl_mgm='$id_tran_jrnl' where nama_sobat='$nama_sobat' and verified_fls='n' ;";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	




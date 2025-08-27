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
    $nama_sobat = $_POST['nama_sobat'];
    $id_mgm = $_POST['id_mgm'];
    $ket_fls = $_POST['ket_fls'];
    $total = $_POST['total'];
    $nominal = $_POST['nominal'];
	$nomin = str_replace('.', '', $nominal);
	$hasil = ($nomin / $total);
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_fal set nominal_mgm='$hasil', verified_fls='n', id_mgm='$id_mgm', ket_mgm='$ket_fls', verif_nominal='y', admin_mar='".$_SESSION['username']."', adm_tgl_nominal=CURRENT_TIMESTAMP() where mgm='mgm' and verified_mgm='y' and verified_fls in ('','n') and nama_sobat='$nama_sobat';";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	




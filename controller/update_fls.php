<?php
session_start();
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
	$action=$_POST['action'];
   $id=$_POST['id'];    
   $verified=$_POST['verified'];
   $pembayaran=$_POST['pembayaran'];
   $id_transaksi=$_POST['id_transaksi'];
   $keterangan=$_POST['keterangan'];
   $verified_fls=$_POST['verified_fls'];
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_marketing SET verified_fls='$verified_fls', id_transaksi='$id_transaksi', pembayaran='$pembayaran', ket_fls='$keterangan', log_user='".$_SESSION['username']."', tgl_verif_fls=CURRENT_TIMESTAMP() WHERE id ='$id';";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	




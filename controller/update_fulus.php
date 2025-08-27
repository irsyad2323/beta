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
   
   $key_fal=$_POST['key_fal'];      
   
   $verified=$_POST['verified'];
   
   $angsuran1=$_POST['angsuran1'];
   
   $angsuran2=$_POST['angsuran2'];
   
   $paket_fal=$_POST['paket_fal'];
   
   $status_angsuran=$_POST['status_angsuran'];
   
   $pembayaran=$_POST['pembayaran'];
   
   $total_diskon=$_POST['total_diskon'];
   
   $verif1=$_POST['verif1'];
   
   $verif2=$_POST['verif2'];
   
   $keterangan=$_POST['keterangan'];
   $setoran=$_POST['setoran'];
   
    if( $paket_fal == '5'){
	$biaya_instalasi = '220000';
	$harga_paket = '120000';
	} elseif ( $paket_fal == '10'){
	$biaya_instalasi = '220000';
	$harga_paket = '175000';
	} elseif ( $paket_fal == '15'){
    $biaya_instalasi = '220000';
	$harga_paket = '235000';
    } elseif ( $paket_fal == '20'){
    $biaya_instalasi = '220000';
	$harga_paket = '325000';
    } elseif ( $paket_fal == '60'){
    $biaya_instalasi = '220000';
	$harga_paket = '1030000';
    }
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_fal SET verified='$verified', total_diskon='$total_diskon', angsuran1='$angsuran1', angsuran2='$angsuran2', status_angsuran='$status_angsuran', paket_fal='$paket_fal', hrg_ins='$biaya_instalasi', hrg_pkt='$harga_paket', verif1='$verif1', verif2='$verif2', pembayaran='$pembayaran', ket_fulus='$keterangan', stor='$setoran', log_user_verified='".$_SESSION['username']."', tgl_verified=CURRENT_TIMESTAMP() WHERE key_fal='$key_fal';";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
  ?>	




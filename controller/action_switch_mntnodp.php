<?php
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
  
   $pic_ikrswitch=$_POST['pic_ikrswitch'];
   $pic_ikr=$_POST['pic_ikr'];
   $key_fal_switch=$_POST['key_fal_switch'];     
   $username_log=$_POST['username_log'];     
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

 mysqli_autocommit($koneksi,FALSE);
 
 $query1 = mysqli_query($koneksi,"UPDATE tbl_maintenance_odp SET pic_ikr='$pic_ikr' WHERE key_fal='$key_fal_switch';");
 $query2 = mysqli_query($koneksi,"INSERT INTO tbl_log_switch_mntnodp (username, pic_ikr, pic_ikrswitch, date_time) values ('$username_log','$pic_ikr','$pic_ikrswitch',CURRENT_TIMESTAMP());");

		if((!$query1) or (!$query2)){								
					echo 'Error';
					mysqli_rollback($koneksi);							
		}else{
				if(!mysqli_commit($koneksi)) {				
					$result['error'] = 'error';
					$result['result'] = 0;
					mysqli_rollback($koneksi);
					
				}else{
					echo 'Success';	
				}
		}

mysqli_close($koneksi);
  
  ?>	




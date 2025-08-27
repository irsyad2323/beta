<?php
include('../controller/controller_mysqli.php');
session_start();


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
   $username_s=$_POST['username_s'];     
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

 mysqli_autocommit($koneksi,FALSE);
 
 $query1 = mysqli_query($koneksi,"UPDATE tbl_fal SET pic_ikr='$pic_ikr' WHERE username_fal='$username_s';");
 $query2 = mysqli_query($koneksi,"INSERT INTO tbl_log_switch (username, pic_ikr, pic_ikrswitch, date_time, user_admin) values ('$username_s','$pic_ikr','$pic_ikrswitch',CURRENT_TIMESTAMP(),'".$_SESSION["username"]."');");

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




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
   $username_s=$_POST['username_s'];     
   $jenis_wo=$_POST['jenis_wo'];     
   $key_fal=$_POST['key_fal_switch'];     
   $tgl_fal_switch=$_POST['tgl_fal_switch'];     
  
	//echo ($key_fal); die();
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

 mysqli_autocommit($koneksi,FALSE);
 //echo $jenis_wo; die();
 if($jenis_wo == 'INSTALASI'){
	//echo $key_fal; die();
	$query1 = mysqli_query($koneksi,"UPDATE tbl_fal SET pic_ikr='$pic_ikr', status_wo='Proses Pengerjaan', tgl_fal_datetime = '$tgl_fal_switch' WHERE key_fal='$key_fal';");
	$query2 = mysqli_query($koneksi,"INSERT INTO tbl_log_switch (username, pic_ikr, pic_ikrswitch, date_time) values ('$username_s','$pic_ikr','$pic_ikrswitch',CURRENT_TIMESTAMP());");
 }else if($jenis_wo == 'MAINTENANCE'){	
	$query1 = mysqli_query($koneksi,"UPDATE tbl_maintenance SET pic_ikr='$pic_ikr', status_wo='Proses Pengerjaan', tgl_date_time = '$tgl_fal_switch' WHERE key_fal='$key_fal';");
	$query2 = mysqli_query($koneksi,"INSERT INTO tbl_log_switch (username, pic_ikr, pic_ikrswitch, date_time) values ('$username_s','$pic_ikr','$pic_ikrswitch',CURRENT_TIMESTAMP());");
 }else if($jenis_wo == 'MAINTENANCE_ODP'){
	$query1 = mysqli_query($koneksi,"UPDATE tbl_maintenance_odp SET pic_ikr='$pic_ikr', status_wo='Proses Pengerjaan', tgl_sign = '$tgl_fal_switch' WHERE key_fal='$key_fal';");
	$query2 = mysqli_query($koneksi,"INSERT INTO tbl_log_switch (username, pic_ikr, pic_ikrswitch, date_time) values ('$username_s','$pic_ikr','$pic_ikrswitch',CURRENT_TIMESTAMP());"); 
 }else if($jenis_wo == 'INSTALASI_DISTRIBUSI'){
	$query1 = mysqli_query($koneksi,"UPDATE tbl_distribusi SET pic_ikr='$pic_ikr', status_wo='Proses Pengerjaan', tgl_sign = '$tgl_fal_switch' WHERE key_odp='$key_fal';");
	$query2 = mysqli_query($koneksi,"INSERT INTO tbl_log_switch (username, pic_ikr, pic_ikrswitch, date_time) values ('$username_s','$pic_ikr','$pic_ikrswitch',CURRENT_TIMESTAMP());"); 
 }else if($jenis_wo == 'INSTALASI_ODP'){
	$query1 = mysqli_query($koneksi,"UPDATE tbl_odp SET pic_ikr='$pic_ikr', status_wo='Proses Pengerjaan', tgl_sign = '$tgl_fal_switch' WHERE key_odp='$key_fal';");
	$query2 = mysqli_query($koneksi,"INSERT INTO tbl_log_switch (username, pic_ikr, pic_ikrswitch, date_time) values ('$username_s','$pic_ikr','$pic_ikrswitch',CURRENT_TIMESTAMP());"); 
 }else if($jenis_wo == 'MAINTENANCE_BACKBONE'){
	$query1 = mysqli_query($koneksi,"UPDATE tbl_backbone SET pic_ikr_backbone='$pic_ikr', status_wo='Proses Pengerjaan', tgl_sign = '$tgl_fal_switch' WHERE key_backbone='$key_fal';");
	$query2 = mysqli_query($koneksi,"INSERT INTO tbl_log_switch (username, pic_ikr, pic_ikrswitch, date_time) values ('$username_s','$pic_ikr','$pic_ikrswitch',CURRENT_TIMESTAMP());"); 
 }
 
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




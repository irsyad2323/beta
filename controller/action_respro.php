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
   $username_rescedule=$_POST['username_rescedule'];     
   $keterangan_res=$_POST['keterangan_res'];     
   $jenis_pekerjaan_res=$_POST['jenis_pekerjaan_res'];     
   $pic_ikr_res=$_POST['pic_ikr_res'];     
   $tgl_fal_res=$_POST['tgl_fal_res'];     
   $id_mntn_get=$_POST['id_mntn_get'];     
   //$tgl = date('Y-m-d h:i:s', strtotime($tgl_fal_res));
  
	//echo ($id_mntn_get); die();
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

 mysqli_autocommit($koneksi,FALSE);
 
 if($jenis_pekerjaan_res == 'INSTALASI'){
	$query1 = mysqli_query($koneksi,"UPDATE tbl_fal SET tgl_fal_datetime= '$tgl_fal_res', tgl_proses_teknis='0000-00-00 00:00:00',lain_lain='$keterangan_res',  pic_ikr='-',
	status_wo='Belum Terpasang' WHERE username_fal='$username_rescedule'");
 }else if($jenis_pekerjaan_res == 'MAINTENANCE'){ 
	$query1 = mysqli_query($koneksi,"UPDATE tbl_maintenance SET tgl_date_time= '$tgl_fal_res', tgl_proses_teknis='0000-00-00 00:00:00',lain_lain='$keterangan_res',  pic_ikr='-',
	status_wo='Belum Terpasang' WHERE key_fal='$id_mntn_get'");
 }else if($jenis_pekerjaan_res == 'INSTALASI_ODP'){ 
	$query1 = mysqli_query($koneksi,"UPDATE tbl_odp SET tgl_sign= '$tgl_fal_res', tgl_proses='0000-00-00 00:00:00',lain_lain='$keterangan_res',  pic_ikr='-',
	status_wo='Belum Terpasang' WHERE id_odp='$username_rescedule'");
 }
		if((!$query1)){								
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




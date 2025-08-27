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
	//$pilih_id=$_POST['pilih_id'];
  //$pilih = array($_POST['pilih_id']);
   $pilih_id=$_POST['all_id'];
   
  //echo ($pilih_id); return;

// Turn autocommit off
		mysqli_autocommit($koneksi,FALSE);
		
		$i = 1;
	foreach($pilih_id as $key => $values){
	// Insert some values
		//echo ($values); return;
		$query1 = mysqli_query($koneksi,"UPDATE tbl_marketing SET status_invoice = 'waiting' WHERE id = '".$values."'");

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
			$i++;
	}
  ?>	




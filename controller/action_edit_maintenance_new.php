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
   $key_falr=$_POST['key_falr'];
   $id_fdbackr=$_POST['id_fdbackr'];
   $status_mntn=$_POST['status_mntn'];
   $pic = strtok($status_mntn, '#');
    $status = substr($status_mntn, strpos($status_mntn, '#')+1);
   $status2_mntn=$_POST['status2_mntn'];
   $pic2 = strtok($status2_mntn, '#');
    $status2 = substr($status2_mntn, strpos($status2_mntn, '#')+1);
   $kategori_maintenance=$_POST['kategori_maintenance'];
   $modem_mntn=$_POST['modem_mntn'];
   $kabel1_mntn=$_POST['kabel1_mntn'];
   $kabel2_mntn=$_POST['kabel2_mntn'];
   $kabel3_mntn=$_POST['kabel3_mntn'];
   $lain_lain_mntn=$_POST['lain_lain_mntn'];
   $status_womntn=$_POST['status_womntn'];   
   $kd_layanan=$_POST['kd_layanan'];   
   $nama_fal_mntn=$_POST['nama_fal_mntn'];   
   $username_fal_mntn=$_POST['username_fal_mntn'];   
   $nama_fal=$_POST['nama_fal'];   
   //$date_now= date('d-M-Y');
   $slot_teknisi='00:00:00';
   $datetime=$_POST['tanggalsign_mntn'];
   //$tgl = date('Y-m-d', strtotime($tanggals));
   //$datetime = $tgl .' '. $slot_teknisi;
   $lokasi_kapten_mntn = $_POST ['lokasi_kapten_mntn'];   
    $latitude = strtok($lokasi_kapten_mntn, '#');
    $longitude = substr($lokasi_kapten_mntn, strpos($lokasi_kapten_mntn, '#')+1);
	
	if($status_womntn == "Sudah Terpasang") {
		$username_Maintenance = $username_fal_mntn; // Fix undefined variable
		if( $kd_layanan == 'mlg'){
		$token = '93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL';
		if(isset($conn_dash)) {
			$gass = mysqli_query($conn_dash,"UPDATE joni SET post_wo = 'n', konfirmasi_insentif = 'n' WHERE `name` = '$username_Maintenance'; ");
			$gass2 = mysqli_query($conn_dash,"UPDATE kantor SET post_wo = 'n', konfirmasi_insentif = 'n' WHERE `name` = '$username_Maintenance'; ");
		}
		}elseif( $kd_layanan == 'pas'){
		$token = 'nRtLakewmjAWhnxzVO2kjHavvAhL14Bgl7zScUijsDtMsPVce4dzAIdIn2tHYyge';
		if(isset($conn_dash)) {
			$gass = mysqli_query($conn_dash,"UPDATE pasuruan SET post_wo = 'n', konfirmasi_insentif = 'n' WHERE `name` = '$username_Maintenance'; ");
		}
		}elseif( $kd_layanan == 'batu'){
		$token = 'OKguQvywltMerXQkValMCeR29rzmo897aEAivh7yP0GbVbIy37jaJBfehSWpCYRM';
		if(isset($conn_dash)) {
			$gass = mysqli_query($conn_dash,"UPDATE batu SET post_wo = 'n', konfirmasi_insentif = 'n' WHERE `name` = '$username_Maintenance'; ");
		}
		}elseif( $kd_layanan == 'mlg1'){
		$token = 'GLba17FEXQE52RiiU1Yuo2LXT1rzf8YReNYJz2jsCp5H9q8x6XGu8xh7pQT7Sv7k';
		$mysqli = new mysqli("10.246.0.134","kocak","gaming","olt");
		$query  = "UPDATE jalantra SET post_wo = 'n', konfirmasi_insentif = 'n' WHERE konfirmasi_insentif = 'y' and name = '".$username_Maintenance."'";
		$mysqli->query($query);
		/* if (!$dash_con) {
			die("Koneksi gagal: " . mysqli_connect_error());
		}
		echo "Koneksi berhasil";
		die(); */
		/* if (mysqli_query($dash_con, $sql)) {
			  echo "New record created successfully";
			  die();
			} else {
			  echo "Error: " . $sql . "<br>" . mysqli_error($dash_con);
			  die();
			} */
		}
	}
	
	
	
// Turn autocommit off
		// Create connection
		//$koneksi = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		/* if (!$koneksi) {
		  die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE tbl_maintenance SET pic='$pic', pic2='$pic2', status='$status', status2='$status2',modem='$modem_mntn',kabel1='$kabel1_mntn',kabel2='$kabel2_mntn',kabel3='$kabel3_mntn',kategori_maintenance='$kategori_maintenance',status_wo='$status_womntn',kabel1='$kabel1_mntn',kabel2='$kabel2_mntn',kabel3='$kabel3_mntn',ket='$lokasi_kapten_mntn', latitude='$latitude',longitude='$longitude',lain_lain='$lain_lain_mntn', triger_fdback='Solved', tanggal_instalasi= CURRENT_TIMESTAMP(), tgl_ins_datetime= CURRENT_TIMESTAMP() WHERE key_fal='$key_falr';";

		if (mysqli_query($koneksi, $sql)) {
		  echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
		}

		mysqli_close($koneksi); */
	
	
	
// Turn autocommit off
		mysqli_autocommit($koneksi,FALSE);
		
		if($status_womntn == 'Sudah Terpasang'){
		// Insert some values
			$query1 = mysqli_query($koneksi,"UPDATE tbl_maintenance SET pic='$pic', pic2='$pic2', status='$status', status2='$status2',modem='$modem_mntn',kabel1='$kabel1_mntn',kabel2='$kabel2_mntn',kabel3='$kabel3_mntn',kategori_maintenance='$kategori_maintenance',status_wo='$status_womntn',kabel1='$kabel1_mntn',kabel2='$kabel2_mntn',kabel3='$kabel3_mntn',ket='$lokasi_kapten_mntn', latitude='$latitude',longitude='$longitude',lain_lain='$lain_lain_mntn', triger_fdback='Solved', tanggal_instalasi= CURRENT_TIMESTAMP(), tgl_ins_datetime= CURRENT_TIMESTAMP() WHERE key_fal='$key_falr';");
			$query2 = mysqli_query($koneksi,"UPDATE keluhan SET status = 'Solved', handle_kompline = '$pic', tanggal_handle = CURRENT_TIMESTAMP(), keterangan_solving = '$lain_lain_mntn', katmtn = '$kategori_maintenance' WHERE id = '$id_fdbackr';");
			if(!$query1){								
					/* echo 'Error';
					mysqli_rollback($koneksi); */	
					echo "101";			
		}elseif(!$query2){								
					/* echo 'Error';
					mysqli_rollback($koneksi); */	
					echo "101";					
		}else{
				if(!mysqli_commit($koneksi)) {				
					$result['error'] = 'error';
					$result['result'] = 0;
					mysqli_rollback($koneksi);
					
				}else{
					echo '1';
					if($status_womntn == "Sudah Terpasang") {
						$curl = curl_init();
						$token = "93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL";
						$data = [
							'phone' => '120363209770683259',
							'message' => '
						Kami Informasikan Bahwa : 

						Nama Teknisi 1:  '.$pic.'
						Nama Teknisi 2:  '.$pic2.'
						Jenis Pekerjaan :  MAINTENANCE
						Tanggal Pekerjaan : '.date("d-m-Y").'
						ID Pelanggan : '.$username_fal_mntn.'
						Nama Pelanggan : '.$nama_fal_mntn.'
						Status : Solved

						Bisa dicek melalui website https://wo.naraya.co.id/

						Salam 
						CS Kapten Naratel',
							'isGroup' => 'true' //its string not boolean
						];
						curl_setopt($curl, CURLOPT_HTTPHEADER,
							array(
								"Authorization: $token",
							)
						);
						curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
						curl_setopt($curl, CURLOPT_URL,  "https://eu.wablas.com/api/send-message");
						curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
						$result = curl_exec($curl);
						curl_close($curl);
						
						
					}
				}
		
		}
		}elseif($status_womntn == 'Rescedule'){
			$query1 = mysqli_query($koneksi,"UPDATE tbl_maintenance SET tgl_date_time = '$datetime', status_wo='Belum Terpasang', pic_ikr = '-' WHERE key_fal='$key_falr';");
			if(!$query1){								
					/* echo 'Error';
					mysqli_rollback($koneksi); */	
					echo "101";				
			}else{
				if(!mysqli_commit($koneksi)) {				
					$result['error'] = 'error';
					$result['result'] = 0;
					mysqli_rollback($koneksi);
					
				}else{
					echo '1';
				}
		
				}
		}elseif($status_womntn == 'Pending'){
			$query1 = mysqli_query($koneksi,"UPDATE tbl_maintenance SET tgl_date_time = '$datetime', status_wo='Pending',key_pending='y' WHERE key_fal='$key_falr';");
			if(!$query1){								
					/* echo 'Error';
					mysqli_rollback($koneksi); */	
					echo "101";					
			}else{
				if(!mysqli_commit($koneksi)) {				
					$result['error'] = 'error';
					$result['result'] = 0;
					mysqli_rollback($koneksi);
					
				}else{
					echo '1';
				}
		
				}
		}
		
		
  ?>	







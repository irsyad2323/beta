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
   $key_fal=$_POST['key_fal'];
   $nama_fal=$_POST['nama_fal'];
   $username_fal=$_POST['username_fal'];
   $pic_ikr=$_POST['pic_ikr'];
   $jenis_wo=$_POST['jenis_wo'];
   $lokasi=$_POST['lokasi'];
   $lok_hasil = "https://www.google.com/maps/search/?api=1&query=". $lokasi;
   
   
 if($jenis_wo == 'INSTALASI'){
				/* $query = mysqli_query($koneksi, "SELECT ((SELECT COUNT(a.username_fal) as total from tbl_maintenance_odp a WHERE a.pic_ikr LIKE '".$_SESSION["username"]."' and a.status_wo in ('Belum Terpasang','Proses Pengerjaan')) + 
				(SELECT COUNT(a.username_fal) as total from tbl_maintenance a WHERE a.pic_ikr LIKE '".$_SESSION["username"]."' and a.status_wo in ('Belum Terpasang','Proses Pengerjaan')) + 
				(SELECT COUNT(a.username_fal) as total from tbl_fal a WHERE a.pic_ikr LIKE '".$_SESSION["username"]."' and a.status_wo in ('Belum Terpasang','Proses Pengerjaan'))) as hasil;");
				//$hasil = mysqli_num_rows($query);
				$row = mysqli_fetch_assoc($query);
				$hasil = $row['hasil'];
				
				if($hasil == 1){
					echo '2';
				}else if($hasil == 0){ */

			// Turn autocommit off
					mysqli_autocommit($koneksi,FALSE);
					
					// Insert some values
					$query1 = mysqli_query($koneksi,"UPDATE tbl_fal SET status_wo = 'Proses Pengerjaan' , lokasi_proses = '$lok_hasil' , pic_ikr='".$_SESSION["username"]."' ,tgl_ambil= CURRENT_TIMESTAMP() WHERE key_fal='$key_fal';");

					
					if((!$query1)){								
								
								echo '3';
								mysqli_rollback($koneksi);							
					}else{
							if(!mysqli_commit($koneksi)) {				
								echo '4';
								mysqli_rollback($koneksi);
								
							}else{
								echo '1';
								/* $curl = curl_init();
						$token = "93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL";
						$data = [
							'phone' => '120363210179095768',
							'message' => '
						Kami Informasikan Bahwa : 

						Nama Teknisi :  '.$_SESSION["username"].'
						Jenis Pekerjaan :  IKR
						Tanggal Pekerjaan : '.date("d-m-Y").'
						ID Pelanggan : '.$username_fal.'
						Nama Pelanggan : '.$nama_fal.'
						Status : Proses

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
						curl_close($curl); */
					//print_r($result);
								}
					
					}
				//}
 } elseif ($jenis_wo == 'MAINTENANCE'){
	/*  $query = mysqli_query($koneksi, "SELECT ((SELECT COUNT(a.username_fal) as total from tbl_maintenance_odp a WHERE a.pic_ikr LIKE '".$_SESSION["username"]."' and a.status_wo in ('Belum Terpasang','Proses Pengerjaan')) + 
	(SELECT COUNT(a.username_fal) as total from tbl_maintenance a WHERE a.pic_ikr LIKE '".$_SESSION["username"]."' and a.status_wo in ('Belum Terpasang','Proses Pengerjaan')) + 
	(SELECT COUNT(a.username_fal) as total from tbl_fal a WHERE a.pic_ikr LIKE '".$_SESSION["username"]."' and a.status_wo in ('Belum Terpasang','Proses Pengerjaan'))) as hasil;");
	//$hasil = mysqli_num_rows($query);
	$row = mysqli_fetch_assoc($query);
	$hasil = $row['hasil'];
	
			if($hasil == 1){
				echo '2';
			}else if($hasil == 0){ */

		// Turn autocommit off
				mysqli_autocommit($koneksi,FALSE);
				
				// Insert some values
				$query1 = mysqli_query($koneksi,"UPDATE tbl_maintenance SET pic_ikr = '".$_SESSION["username"]."', status_wo = 'Proses Pengerjaan' , tgl_ambil= CURRENT_TIMESTAMP(), lokasi_proses='$lok_hasil' WHERE key_fal='$key_fal';");

				
				if((!$query1)){								
							
							echo '3';
							mysqli_rollback($koneksi);							
				}else{
						if(!mysqli_commit($koneksi)) {				
							echo '4';
							mysqli_rollback($koneksi);
							
						}else{
							echo '1';
							/* $curl = curl_init();
		$token = "93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL";
		$data = [
			'phone' => '120363209770683259',
			'message' => '
		Kami Informasikan Bahwa : 

		Nama Teknisi :  '.$_SESSION["username"].'
		Jenis Pekerjaan :  MAINTENANCE
		Tanggal Pekerjaan : '.date("d-m-Y").'
		ID Pelanggan : '.$username_fal.'
		Nama Pelanggan : '.$nama_fal.'
		Status : Proses

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
		curl_close($curl); */
		//print_r($result);
							}
				
				}
			//}
 }elseif($jenis_wo == 'MAINTENANCE_ODP'){
	
		// Turn autocommit off
		mysqli_autocommit($koneksi,FALSE);

		// Insert some values
		$query1 = mysqli_query($koneksi,"UPDATE tbl_maintenance_odp SET pic_ikr = '".$_SESSION["username"]."', status_wo = 'Proses Pengerjaan', tgl_proses= CURRENT_TIMESTAMP(), get_lokasi_proses= '$lok_hasil' WHERE key_fal='$key_fal';");


		if((!$query1)){	
			echo '3';
			mysqli_rollback($koneksi);							
		}else{
			if(!mysqli_commit($koneksi)) {				
				echo '4';
				//$result['result'] = 0;
				mysqli_rollback($koneksi);
			}else{
				echo '1';
				/* $curl = curl_init();
				$token = "93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL";
				$data = [
					'phone' => '120363209770683259',
					'message' => '
				Kami Informasikan Bahwa : 

				Nama Teknisi :  '.$_SESSION["username"].'
				Jenis Pekerjaan :  MAINTENANCE_ODP
				Tanggal Pekerjaan : '.date("d-m-Y").'
				ID Pelanggan : '.$username_fal.'
				Nama Pelanggan : '.$nama_fal.'
				Status : Proses

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
				curl_close($curl); */
				//print_r($result);
				}

		}
		   
 }elseif($jenis_wo == 'INSTALASI_ODP'){
	
		// Turn autocommit off
		mysqli_autocommit($koneksi,FALSE);

		// Insert some values
		$query1 = mysqli_query($koneksi,"UPDATE tbl_odp SET pic_ikr = '".$_SESSION["username"]."', status_wo = 'Proses Pengerjaan', tgl_proses= CURRENT_TIMESTAMP(), get_lokasi_proses= '$lok_hasil' WHERE key_odp='$key_fal';");


		if((!$query1)){	
			echo '3';
			mysqli_rollback($koneksi);							
		}else{
			if(!mysqli_commit($koneksi)) {				
				echo '4';
				//$result['result'] = 0;
				mysqli_rollback($koneksi);
			}else{
				echo '1';
				/* $curl = curl_init();
				$token = "93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL";
				$data = [
					'phone' => '120363209770683259',
					'message' => '
				Kami Informasikan Bahwa : 

				Nama Teknisi :  '.$_SESSION["username"].'
				Jenis Pekerjaan :  INSTALASI_ODP
				Tanggal Pekerjaan : '.date("d-m-Y").'
				ID Pelanggan : '.$username_fal.'
				Nama Pelanggan : '.$nama_fal.'
				Status : Proses

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
				curl_close($curl); */
				//print_r($result);
				}

		}
		   
 }elseif($jenis_wo == 'INSTALASI_DISTRIBUSI'){
	
		// Turn autocommit off
		mysqli_autocommit($koneksi,FALSE);

		// Insert some values
		$query1 = mysqli_query($koneksi,"UPDATE tbl_distribusi SET pic_ikr = '".$_SESSION["username"]."', status_wo = 'Proses Pengerjaan', tgl_proses= CURRENT_TIMESTAMP(), get_lokasi_proses= '$lok_hasil' WHERE key_odp='$key_fal';");


		if((!$query1)){	
			echo '3';
			mysqli_rollback($koneksi);							
		}else{
			if(!mysqli_commit($koneksi)) {				
				echo '4';
				//$result['result'] = 0;
				mysqli_rollback($koneksi);
			}else{
				echo '1';
				/* $curl = curl_init();
				$token = "93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL";
				$data = [
					'phone' => '120363209770683259',
					'message' => '
				Kami Informasikan Bahwa : 

				Nama Teknisi :  '.$_SESSION["username"].'
				Jenis Pekerjaan :  INSTALASI_DISTRIBUSI
				Tanggal Pekerjaan : '.date("d-m-Y").'
				ID Pelanggan : '.$username_fal.'
				Nama Pelanggan : '.$nama_fal.'
				Status : Proses

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
				curl_close($curl); */
				//print_r($result);
				}

		}
		   
 }elseif($jenis_wo == 'INSTALASI_BACKBONE'){
	
		// Turn autocommit off
		mysqli_autocommit($koneksi,FALSE);

		// Insert some values
		$query1 = mysqli_query($koneksi,"UPDATE tbl_backbone SET pic_ikr = '".$_SESSION["username"]."', status_wo = 'Proses Pengerjaan', tgl_proses= CURRENT_TIMESTAMP(), get_lokasi_proses= '$lok_hasil' WHERE key_backbone='$key_fal';");


		if((!$query1)){	
			echo '3';
			mysqli_rollback($koneksi);							
		}else{
			if(!mysqli_commit($koneksi)) {				
				echo '4';
				//$result['result'] = 0;
				mysqli_rollback($koneksi);
			}else{
				echo '1';
				/* $curl = curl_init();
				$token = "93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL";
				$data = [
					'phone' => '120363209770683259',
					'message' => '
				Kami Informasikan Bahwa : 

				Nama Teknisi :  '.$_SESSION["username"].'
				Jenis Pekerjaan :  MAINTENANCE_ODP
				Tanggal Pekerjaan : '.date("d-m-Y").'
				ID Pelanggan : '.$username_fal.'
				Nama Pelanggan : '.$nama_fal.'
				Status : Proses

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
				curl_close($curl); */
				//print_r($result);
				}

		}
		   
 }
   
   

  
  ?>	




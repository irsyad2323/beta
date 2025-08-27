<?php
include('../controller/controller_mysqli.php');
session_start();
$kota = $_SESSION['layanan_wo'];
//echo ($kota); die();
function sendMessage($telegram_id, $message, $secret_token) {    
    /*
    $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $post = [
     'chat_id' => $telegram_id,
     'parse_mode' => 'HTML', // aktifkan ini jika ingin menggunakan format type HTML, bisa juga diganti menjadi Markdown
     'text' => $message
    ];

    $url = $url . "&text=" . urlencode($message);    
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true          
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    //return(); */
    $method = "sendMessage";
    $url    = "https://api.telegram.org/bot" . $secret_token . "/". $method;
    $post = [
     'chat_id' => $telegram_id,
     'parse_mode' => 'HTML', // aktifkan ini jika ingin menggunakan format type HTML, bisa juga diganti menjadi Markdown
     'text' => $message
    ];

    $header = [
     "X-Requested-With: XMLHttpRequest",
     "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36" 
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    //curl_setopt($ch, CURLOPT_REFERER, $refer);
    //curl_setopt($ch, CURLOPT_VERBOSE, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post );   
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $datas = curl_exec($ch);
    $error = curl_error($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
}

   $keluhan_deskripsi=$_POST['keluhan_gamas'];

   $tanggal=$_POST['date_wo'];
   
   $kelurahan=$_POST['kelurahan_gamas'];

   $jenis_produk='Kapten Naratel';

   $kategori_kompline=$_POST['kategori_kompline'];

   $alamat=$_POST['alamat_gamas'];   

   $kd_kom=$_POST['kd_gamas']; 
   $odp_pilih=$_POST['odp_pilih']; 
   
   $nama_odp=$_POST['nama_gamas']; 
   $gangguan_olt=$_POST['gangguan_olt']; 
   $gangguan_server=$_POST['gangguan_server']; 
   $gangguan_upstream=$_POST['gangguan_upstream']; 
   
   $nama_kom=$_POST['nama_gamas']; 
   $kategori_gamas=$_POST['kategori_gamas']; 
   $tgl = date('Y-m-d H:i:s', strtotime($tanggal));
   $time = date('H:i:s', strtotime($tanggal));
   
   $kom = strtok($nama_kom, '-');
   
   //echo $kom; die();
   
	mysqli_autocommit($koneksi,FALSE);
   
   if($kategori_gamas == 'Gangguan_ODP'){
	   // Turn autocommit off
		
		// Insert some values
		$query1 = mysqli_query($koneksi,"INSERT INTO keluhan (keluhan_deskripsi, status, tanggal, jenis_produk ,kategori_kompline ,statushandle, alamat, kd_kom, id_user, nama_kom, handle_kompline) 
		  VALUES ('$keluhan_deskripsi', 'Visit', '$tgl', '$jenis_produk', '$kategori_kompline','n', '$alamat', '".$kota."','$odp_pilih[0]','$nama_odp','');");
		$query2 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance_odp (id_odp, nama_fal, alamat_fal, username_fal,tgl_sign, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, kategori_maintenance) 
										  VALUES ('$odp_pilih[0]','$nama_odp','$alamat',CURRENT_TIMESTAMP(),'$tgl','$keluhan_deskripsi','".$kota."','-','$kelurahan','MAINTENANCE_ODP','$jenis_produk','Maintenance ODP');");

		
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
					$telegram_id = -1001408044746;
					  $message = '📩 KELUHAN GAMAS 📩 

							<b>✔️ JENIS PRODUK</b>
							'.'💬 '.$nama_kom.'

							<b>✔️ JENIS PRODUK</b>
							'.'💬 '.$jenis_produk.'

							<b>✔️ Tanggal GAMAS</b>
							'.'💬 '.$tanggal.'

							<b>✔️ KATEGORI KOMPLAIN</b>
							'.'💬 '. $kategori_kompline.'

							<b>✔️ ALAMAT</b>
							'.'💬 '. $alamat.'

							<b>✔️ KELUHAN DESKRIPSI</b>
							'.'💬 '. $keluhan_deskripsi;

							$secret_token = '772161262:AAG4bqttU-OTkfsmdCZF_GbowP2ctO0bVfM';
							sendMessage($telegram_id, $message , $secret_token);
					}
		
		}
   }elseif($kategori_gamas == 'Gangguan_OLT'){
		
		$query1 = mysqli_query($koneksi,"INSERT INTO keluhan (keluhan_deskripsi, status, tanggal, jenis_produk ,kategori_kompline ,statushandle, alamat, kd_kom, id_user, nama_kom, handle_kompline) 
		  VALUES ('$keluhan_deskripsi', 'Visit', CURRENT_TIMESTAMP(), '$jenis_produk', '$kategori_kompline','n', '$alamat', '$kd_kom','$gangguan_olt','$nama_odp','');");
		
		if(!$query1){								
					
					echo 'Error';
					mysqli_rollback($koneksi);							
		}else{
				if(!mysqli_commit($koneksi)) {				
					$result['error'] = 'error';
					$result['result'] = 0;
					mysqli_rollback($koneksi);
					
				}else{
					echo 'Success';		
					$telegram_id = -1001408044746;
					  /* $message = '📩 KELUHAN GAMAS 📩 

							<b>✔️ JENIS PRODUK</b>
							'.'💬 '.$nama_kom.'

							<b>✔️ JENIS PRODUK</b>
							'.'💬 '.$jenis_produk.'

							<b>✔️ Tanggal GAMAS</b>
							'.'💬 '.$tanggal.'

							<b>✔️ KATEGORI KOMPLAIN</b>
							'.'💬 '. $kategori_kompline.'

							<b>✔️ ALAMAT</b>
							'.'💬 '. $alamat.'

							<b>✔️ KELUHAN DESKRIPSI</b>
							'.'💬 '. $keluhan_deskripsi;

							$secret_token = '772161262:AAG4bqttU-OTkfsmdCZF_GbowP2ctO0bVfM';
							sendMessage($telegram_id, $message , $secret_token); */
					}
		
		}
   }elseif($kategori_gamas == 'Gangguan Server'){
		
		$query1 = mysqli_query($koneksi,"INSERT INTO keluhan (keluhan_deskripsi, status, tanggal, jenis_produk ,kategori_kompline ,statushandle, alamat, kd_kom, id_user, nama_kom, handle_kompline) 
		  VALUES ('$keluhan_deskripsi', 'Visit', CURRENT_TIMESTAMP(), '$jenis_produk', '$kategori_kompline','n', '$alamat', '$kd_kom','$gangguan_server','$nama_odp','');");
		
		if(!$query1){								
					
					echo 'Error';
					mysqli_rollback($koneksi);							
		}else{
				if(!mysqli_commit($koneksi)) {				
					$result['error'] = 'error';
					$result['result'] = 0;
					mysqli_rollback($koneksi);
					
				}else{
					echo 'Success';		
					$telegram_id = -1001408044746;
					  /* $message = '📩 KELUHAN GAMAS 📩 

							<b>✔️ JENIS PRODUK</b>
							'.'💬 '.$nama_kom.'

							<b>✔️ JENIS PRODUK</b>
							'.'💬 '.$jenis_produk.'

							<b>✔️ Tanggal GAMAS</b>
							'.'💬 '.$tanggal.'

							<b>✔️ KATEGORI KOMPLAIN</b>
							'.'💬 '. $kategori_kompline.'

							<b>✔️ ALAMAT</b>
							'.'💬 '. $alamat.'

							<b>✔️ KELUHAN DESKRIPSI</b>
							'.'💬 '. $keluhan_deskripsi;

							$secret_token = '772161262:AAG4bqttU-OTkfsmdCZF_GbowP2ctO0bVfM';
							sendMessage($telegram_id, $message , $secret_token); */
					}
		
		}
   }elseif($kategori_gamas == 'Gangguan UPSTREAM'){
		
		$query1 = mysqli_query($koneksi,"INSERT INTO keluhan (keluhan_deskripsi, status, tanggal, jenis_produk ,kategori_kompline ,statushandle, alamat, kd_kom, id_user, nama_kom, handle_kompline) 
		  VALUES ('$keluhan_deskripsi', 'Visit', CURRENT_TIMESTAMP(), '$jenis_produk', '$kategori_kompline','n', '$alamat', '$kd_kom','$gangguan_upstream','$nama_odp','');");
		
		if(!$query1){								
					
					echo 'Error';
					mysqli_rollback($koneksi);							
		}else{
				if(!mysqli_commit($koneksi)) {				
					$result['error'] = 'error';
					$result['result'] = 0;
					mysqli_rollback($koneksi);
					
				}else{
					echo 'Success';		
					$telegram_id = -1001408044746;
					  /* $message = '📩 KELUHAN GAMAS 📩 

							<b>✔️ JENIS PRODUK</b>
							'.'💬 '.$nama_kom.'

							<b>✔️ JENIS PRODUK</b>
							'.'💬 '.$jenis_produk.'

							<b>✔️ Tanggal GAMAS</b>
							'.'💬 '.$tanggal.'

							<b>✔️ KATEGORI KOMPLAIN</b>
							'.'💬 '. $kategori_kompline.'

							<b>✔️ ALAMAT</b>
							'.'💬 '. $alamat.'

							<b>✔️ KELUHAN DESKRIPSI</b>
							'.'💬 '. $keluhan_deskripsi;

							$secret_token = '772161262:AAG4bqttU-OTkfsmdCZF_GbowP2ctO0bVfM';
							sendMessage($telegram_id, $message , $secret_token); */
					}
		
		}
   }
   
		
  

  
  ?>	




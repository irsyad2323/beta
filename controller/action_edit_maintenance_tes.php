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
   $key_fal=$_POST['key_fal'];
   $mntn=$_POST['mntn'];
   $pic_maintenace=$_POST['pic_maintenace'];
   $pic = strtok($pic_maintenace, '#');
    $status = substr($pic_maintenace, strpos($pic_maintenace, '#')+1);
	
   $pic_maintenace2=$_POST['pic_maintenace2'];
   $pic2 = strtok($pic_maintenace2, '#');
    $status2 = substr($pic_maintenace2, strpos($pic_maintenace2, '#')+1);
   $kategori_maintenance=$_POST['kategori_maintenance'];
   $modem=$_POST['modem'];
   $kabel1=$_POST['kabel1'];
   $kabel2=$_POST['kabel2'];
   $kabel3=$_POST['kabel3'];
   $lain_lain=$_POST['lain_lain'];
   $status_wo=$_POST['status_wo'];   
   $username_Maintenance=$_POST['username_Maintenance'];   
   $tlp_fal=$_POST['tlp_fal'];   
   $kd_layanan=$_POST['kd_layanan'];   
   $tanggal_kom=$_POST['tanggal_kom'];   
   $nama_fal=$_POST['nama_fal'];   
   $date_now= date('d-M-Y');
   $lokasi = $_POST ['lokasi'];   
    $latitude = strtok($lokasi, '#');
    $longitude = substr($lokasi, strpos($lokasi, '#')+1);
	
	if( $kd_layanan == 'mlg'){
	$token = '93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL';
	}elseif( $kd_layanan == 'pas'){
	$token = 'nRtLakewmjAWhnxzVO2kjHavvAhL14Bgl7zScUijsDtMsPVce4dzAIdIn2tHYyge';
	}elseif( $kd_layanan == 'batu'){
	$token = 'OKguQvywltMerXQkValMCeR29rzmo897aEAivh7yP0GbVbIy37jaJBfehSWpCYRM';
	}elseif( $kd_layanan == 'mlg1'){
	$token = 'GLba17FEXQE52RiiU1Yuo2LXT1rzf8YReNYJz2jsCp5H9q8x6XGu8xh7pQT7Sv7k';
	}
	
// Turn autocommit off
		mysqli_autocommit($koneksi,FALSE);
		
		// Insert some values
		$query1 = mysqli_query($koneksi,"UPDATE tbl_maintenance SET pic='$pic', pic2='$pic2', status='$status', status2='$status2',modem='$modem',kabel1='$kabel1',kabel2='$kabel2',kabel3='$kabel3',kategori_maintenance='$kategori_maintenance',status_wo='$status_wo',kabel1='$kabel1',kabel2='$kabel2',kabel3='$kabel3',ket='$lokasi', latitude='$latitude',longitude='$longitude',lain_lain='$lain_lain', triger_fdback='Solved', tanggal_instalasi= CURRENT_TIMESTAMP(), tgl_ins_datetime= CURRENT_TIMESTAMP() WHERE key_fal='$key_fal';");
		$query2 = mysqli_query($koneksi,"UPDATE keluhan SET status = 'Solved', handle_kompline = '$pic', tanggal_handle = CURRENT_TIMESTAMP(), keterangan_solving = '$lain_lain', katmtn = '$kategori_maintenance' WHERE id = '$mntn';");

		
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
					if($status_wo == "Sudah Terpasang") {
					$curl = curl_init();
//$token = "mHD2D84xlNdJQizmUv8tkoVFYX6IGMgl6NF6oJG2ibn0hdQL1VSDDYSHTguYgRBO";
//$token = "uvCDOH6WvVKuaazBYx3lwBVfMXDt5nOWw72mQ5oSfmxzSUAS8a4ALlxCcuuUJulc";
$token = $token;
$phone = $tlp_fal;
//$phone = '082228550709';
$pesan = '
Dear Sobat Kapten '.$nama_fal.'
ID Pelanggan '.$username_Maintenance.'

Sehubungan dengan informasi yang masuk ke sistem kami tanggal '.$tanggal_kom.' atas Kendala Layanan Internet 

Dapat kami informasikan bahwa proses perbaikan telah selesai dilakukan tanggal '.$date_now.' dan layanan internet sudah kembali normal

Silahkan dicoba kembali dan mohon konfimasi apakah layanan internet sudah dapat digunakan ?
Terimakasih 🙏🏻☺

Salam 
CS Kapten Naratel';

$data = [
								'phone' => $phone,
								'message' => $pesan,
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
echo "<pre>";
print_r($result);
					}
				}
		
		}
   

  
  ?>	




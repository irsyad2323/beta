<?php
include('../controller/controller_mysqli.php');

   $nama_fal1= $_POST['nama_fal'];
   function clean($string){
		$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
	}
	
   $nama_fal = clean($nama_fal1);  
   $username_fal=$_POST['username_fal'];
   if (isset($_POST['status']) && !empty($_POST['status'])) {
    $status = $_POST['status'];
	} else {
		echo "session_expirate"; // atau nilai default lainnya
	}
   
   $pic = strtok($status, '#');
   $status = substr($status, strpos($status, '#')+1);
   $status2=$_POST['status2'];
   $pic2 = strtok($status2, '#');
   $status2 = substr($status2, strpos($status2, '#')+1);
   $modem=$_POST['modem'];
   $stor=$_POST['stor'];
   $kabel1=$_POST['kabel1'];
   $kabel2=$_POST['kabel2'];
   $kabel3=$_POST['kabel3'];
   $pembayaran=$_POST['pembayaran'];
   $lain_lain=$_POST['lain_lain'];
   $letak_odp=$_POST['letak_odp'];
   $ket = $_POST ['lokasi_kapten'];
   $status_wo = $_POST ['status_wo'];
   $signature = $_POST ['signature'];
   $pic_ikr = $_POST ['pic_ikr'];
   $slot_teknisi='00:00:00';
   $tgl=$_POST['tanggalsign'];
   $input_number=$_POST['input_number'];
   $type_paket_read=$_POST['type_paket_read'];
   $lokasi_kapten = $_POST ['lokasi_kapten'];   
   $latitude = strtok($lokasi_kapten, '#');
   $longitude = substr($lokasi_kapten, strpos($lokasi_kapten, '#')+1);
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

	if($status_wo == 'Sudah Terpasang'){
					$sql = "UPDATE tbl_fal SET nama_fal='$nama_fal', pic='$pic', pic2='$pic2',
					status='$status', status2='$status2', modem='$modem',kabel1='$kabel1',kabel2='$kabel2',kabel3='$kabel3',
					tanggal_instalasi= CURRENT_TIMESTAMP(), tgl_ins_datetime= CURRENT_TIMESTAMP(),lain_lain='$lain_lain',  
					status_wo='$status_wo',ket='$ket', latitude='$latitude',longitude='$longitude',pembayaran='$pembayaran',
					verified='not_verified',letak_odp='$letak_odp',stor='$stor' WHERE username_fal='$username_fal'";
	}elseif($status_wo == 'Masalah Perijinan'){
					$sql = "UPDATE tbl_fal SET tgl_fal_datetime= DATE_ADD(NOW(), INTERVAL 7 DAY), tgl_proses_teknis='0000-00-00 00:00:00',lain_lain='$lain_lain',
					status_wo='Masalah Perijinan' WHERE username_fal='$username_fal'";
	}elseif($status_wo == 'Batal Pasang'){
					$sql = "UPDATE tbl_fal SET tgl_proses_teknis='0000-00-00 00:00:00',lain_lain='$lain_lain', 
					status_wo='Batal Pasang' WHERE username_fal='$username_fal'";
	}else if($status_wo == 'Rescedule'){
			$sql = "UPDATE tbl_fal SET rscd_stts= 'y',tgl_fal_datetime= '$tgl', tgl_proses_teknis='0000-00-00 00:00:00',lain_lain='$lain_lain',  pic_ikr='-',
			status_wo='Belum Terpasang' WHERE username_fal='$username_fal'";
	}elseif($status_wo == 'Pending'){
			$sql = "UPDATE tbl_fal SET tgl_fal_datetime= '$tgl', tgl_proses_teknis='0000-00-00 00:00:00',lain_lain='$lain_lain',status_wo='Pending',key_pending='y' WHERE username_fal='$username_fal'";
	}
	
	


if (mysqli_query($koneksi, $sql)) {
    echo "1";
	if($type_paket_read == 'combo'){
		$sql_input_number = "UPDATE tb_gundala SET no_combo='$input_number' WHERE kode_user='$username_fal'";
		if (mysqli_query($koneksi, $sql_input_number)) {
			//echo "1";
			} else {
				echo '101';
			}
		
		$sql_byu = "UPDATE tbl_upload_byu SET status='y' WHERE number='$input_number'";
		if (mysqli_query($koneksi, $sql_byu)) {
			//echo "1";
			} else {
				echo '101';
			}
	}
	
	} else {
	  echo '101';
	}  

mysqli_close($koneksi);
  
?>	




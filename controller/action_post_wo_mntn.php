<?php
include('../controller/controller_mysqli.php');
session_start();
$kota = $_SESSION["layanan_wo"];
$acces_user_log = $_SESSION["nama"];

/* $host       = "117.103.69.22";
$user       = "kocak";
$password   = "gaming";
$database   = "db_pendaftaran_kapten";
$koneksivps    = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
} */

$id=$_POST['id'];
$nama_kom=$_POST['nama_kom'];
$tlp_kom=$_POST['tlp_kom'];
$status=$_POST['status'];
$id_user=$_POST['id_user'];
$kd_kom=$_POST['kd_kom'];
$jenis_produk=$_POST['jenis_produk'];
$alamat=$_POST['alamat'];  
$kelurahan=$_POST['kelurahan'];  
$handle_kompline=$_POST['handle_kompline'];  
$kategori_solving=$_POST['kategori_solving'];
$keterangan_solving=$_POST['keterangan_solving'];
$tanggal_wo=$_POST['tanggal_wo'];
$date_end_mntn=$_POST['date_end_mntn'];

//$newDateTime = date('h:i:s', strtotime($tanggal_wo));
//echo ($newDateTime); die();
$ktg_ind_mslh=$_POST['ktg_ind_mslh'];
$jadwal=$_POST['jadwal'];
$tgl = date('Y-m-d H:i:s', strtotime($tanggal_wo));
$time = date('H:i:s', strtotime($tanggal_wo));

if( $kota == 'mlg'){
	$token = '93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL';
	}elseif( $kota == 'pas'){
	$token = 'nRtLakewmjAWhnxzVO2kjHavvAhL14Bgl7zScUijsDtMsPVce4dzAIdIn2tHYyge';
	}elseif( $kota == 'batu'){
	$token = 'OKguQvywltMerXQkValMCeR29rzmo897aEAivh7yP0GbVbIy37jaJBfehSWpCYRM';
	}elseif( $kota == 'mlg1'){
	$token = 'GLba17FEXQE52RiiU1Yuo2LXT1rzf8YReNYJz2jsCp5H9q8x6XGu8xh7pQT7Sv7k';
	}
	
	if($handle_kompline == "fio") {
		$no_blast = '089671467187';
		//$no_blast = '082228550709';
	}elseif($handle_kompline == "fauzi") {
		$no_blast = '083848024834';
	}elseif($handle_kompline == "rino") {
		$no_blast = '087881483767';
	}elseif($handle_kompline == "ricky") {
		$no_blast = '089683845842';
	}elseif($handle_kompline == "rafif") {
		$no_blast = '081553428726';
	}elseif($handle_kompline == "sonny") {
		$no_blast = '089523791209';
	}elseif($handle_kompline == "rozak") {
		$no_blast = '089627201994';
	}elseif($handle_kompline == "wawan") {
		$no_blast = '082257293851';
	}elseif($handle_kompline == "decky") {
		$no_blast = '082233541828';
	}elseif($handle_kompline == "saiin") {
		$no_blast = '081326594474';
	}elseif($handle_kompline == "siswanto") {
		$no_blast = '0895331297402';
	}elseif($handle_kompline == "amin") {
		$no_blast = '0895337237228';
	}elseif($handle_kompline == "heri") {
		$no_blast = '081235372888';
	}elseif($handle_kompline == "lukman") {
		$no_blast = '6282257876093';
	}elseif($handle_kompline == "wahyudi") {
		$no_blast = '6289699654803';
	}elseif($handle_kompline == "ahnaf") {
		$no_blast = '62858151324789';
	}elseif($handle_kompline == "majid") {
		$no_blast = '6281385766281';
	}elseif($handle_kompline == "bayu") {
		$no_blast = '6281359042213';
	}elseif($handle_kompline == "yusuf") {
		$no_blast = '6285733254225';
	}

		mysqli_autocommit($koneksi,FALSE);
		
		/* $wo_total_jam6 = mysqli_query($koneksi, "SELECT ((SELECT COUNT(*) as total_6 FROM tbl_fal WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_fal_datetime) = YEAR('".$tgl."') and MONTH(tgl_fal_datetime) = MONTH('".$tgl."') and DAY(tgl_fal_datetime) = DAY('".$tgl."') and TIME(tgl_fal_datetime) BETWEEN '06:00:00' AND '08:00:00') + (SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_date_time) = YEAR('".$tgl."') and MONTH(tgl_date_time) = MONTH('".$tgl."') and DAY(tgl_date_time) = DAY('".$tgl."') and TIME(tgl_date_time) BETWEEN '06:00:00' AND '08:00:00') + (SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_sign) = YEAR('".$tgl."') and MONTH(tgl_sign) = MONTH('".$tgl."') and DAY(tgl_sign) = DAY('".$tgl."') and TIME(tgl_sign) BETWEEN '06:00:00' AND '08:00:00')) as hasil");
		$row_wo_jm6 = mysqli_fetch_assoc($wo_total_jam6);
		$tot_wo_jm6 = $row_wo_jm6['hasil'];
		//echo ($tot_wo_jm6); die();
		
		$wo_total_jam8 = mysqli_query($koneksi, "SELECT ((SELECT COUNT(*) as total_8 FROM tbl_fal WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_fal_datetime) = YEAR('".$tgl."') and MONTH(tgl_fal_datetime) = MONTH('".$tgl."') and DAY(tgl_fal_datetime) = DAY('".$tgl."') and TIME(tgl_fal_datetime) BETWEEN '08:00:00' AND '10:00:00') + (SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_date_time) = YEAR('".$tgl."') and MONTH(tgl_date_time) = MONTH('".$tgl."') and DAY(tgl_date_time) = DAY('".$tgl."') and TIME(tgl_date_time) BETWEEN '08:00:00' AND '10:00:00') + (SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_sign) = YEAR('".$tgl."') and MONTH(tgl_sign) = MONTH('".$tgl."') and DAY(tgl_sign) = DAY('".$tgl."') and TIME(tgl_sign) BETWEEN '08:00:00' AND '10:00:00')) as hasil");
		$row_wo_jm8 = mysqli_fetch_assoc($wo_total_jam8);
		$tot_wo_jm8 = $row_wo_jm8['hasil'];
		//echo $tot_wo_jm8.$tgl; die();
		
		$wo_total_jam10 = mysqli_query($koneksi, "SELECT ((SELECT COUNT(*) as total_10 FROM tbl_fal WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_fal_datetime) = YEAR('".$tgl."') and MONTH(tgl_fal_datetime) = MONTH('".$tgl."') and DAY(tgl_fal_datetime) = DAY('".$tgl."') and TIME(tgl_fal_datetime) BETWEEN '10:00:00' AND '12:00:00') + (SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_date_time) = YEAR('".$tgl."') and MONTH(tgl_date_time) = MONTH('".$tgl."') and DAY(tgl_date_time) = DAY('".$tgl."') and TIME(tgl_date_time) BETWEEN '10:00:00' AND '12:00:00') + (SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_sign) = YEAR('".$tgl."') and MONTH(tgl_sign) = MONTH('".$tgl."') and DAY(tgl_sign) = DAY('".$tgl."') and TIME(tgl_sign) BETWEEN '10:00:00' AND '12:00:00')) as hasil");
		$row_wo_jm10 = mysqli_fetch_assoc($wo_total_jam10);
		$tot_wo_jm10 = $row_wo_jm10['hasil'];
		
		$wo_total_jam13 = mysqli_query($koneksi, "SELECT ((SELECT COUNT(*) as total_13 FROM tbl_fal WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_fal_datetime) = YEAR('".$tgl."') and MONTH(tgl_fal_datetime) = MONTH('".$tgl."') and DAY(tgl_fal_datetime) = DAY('".$tgl."') and TIME(tgl_fal_datetime) BETWEEN '13:00:00' AND '15:00:00') + (SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_date_time) = YEAR('".$tgl."') and MONTH(tgl_date_time) = MONTH('".$tgl."') and DAY(tgl_date_time) = DAY('".$tgl."') and TIME(tgl_date_time) BETWEEN '13:00:00' AND '15:00:00') + (SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_sign) = YEAR('".$tgl."') and MONTH(tgl_sign) = MONTH('".$tgl."') and DAY(tgl_sign) = DAY('".$tgl."') and TIME(tgl_sign) BETWEEN '13:00:00' AND '15:00:00')) as hasil");
		$row_wo_jm13 = mysqli_fetch_assoc($wo_total_jam13);
		$tot_wo_jm13 = $row_wo_jm13['hasil'];
		
		$wo_total_jam15 = mysqli_query($koneksi, "SELECT ((SELECT COUNT(*) as total_15 FROM tbl_fal WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_fal_datetime) = YEAR('".$tgl."') and MONTH(tgl_fal_datetime) = MONTH('".$tgl."') and DAY(tgl_fal_datetime) = DAY('".$tgl."') and TIME(tgl_fal_datetime) BETWEEN '15:00:00' AND '17:00:00') + (SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_date_time) = YEAR('".$tgl."') and MONTH(tgl_date_time) = MONTH('".$tgl."') and DAY(tgl_date_time) = DAY('".$tgl."') and TIME(tgl_date_time) BETWEEN '14:00:00' AND '15:00:00' AND '17:00:00') + (SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_sign) = YEAR('".$tgl."') and MONTH(tgl_sign) = MONTH('".$tgl."') and DAY(tgl_sign) = DAY('".$tgl."') and TIME(tgl_sign) BETWEEN '15:00:00' AND '17:00:00')) as hasil");
		$row_wo_jm15 = mysqli_fetch_assoc($wo_total_jam15);
		$tot_wo_jm15 = $row_wo_jm15['hasil'];
		
		$wo_total_jam18 = mysqli_query($koneksi, "SELECT ((SELECT COUNT(*) as total_18 FROM tbl_fal WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_fal_datetime) = YEAR('".$tgl."') and MONTH(tgl_fal_datetime) = MONTH('".$tgl."') and DAY(tgl_fal_datetime) = DAY('".$tgl."') and TIME(tgl_fal_datetime) BETWEEN '15:00:00' AND '17:00:00') + (SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_date_time) = YEAR('".$tgl."') and MONTH(tgl_date_time) = MONTH('".$tgl."') and DAY(tgl_date_time) = DAY('".$tgl."') and TIME(tgl_date_time) BETWEEN '14:00:00' AND '15:00:00' AND '17:00:00') + (SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE status_wo in ('Belum Terpasang','Proses Pengerjaan','Sudah Terpasang') and YEAR(tgl_sign) = YEAR('".$tgl."') and MONTH(tgl_sign) = MONTH('".$tgl."') and DAY(tgl_sign) = DAY('".$tgl."') and TIME(tgl_sign) BETWEEN '15:00:00' AND '17:00:00')) as hasil");
		$row_wo_jm18 = mysqli_fetch_assoc($wo_total_jam18);
		$tot_wo_jm18 = $row_wo_jm18['hasil'];
	
	if($time == '06:00:00'){
			///// filter jam 8 - 9 ///////////
			//echo ($tgl);
			//echo ($time); die();
			$pic_sql1 = mysqli_query($koneksi, "SELECT jumlah_hijau FROM baris_kotak WHERE baris_no ='1' and YEAR(tanggal) = YEAR('".$tgl."') and MONTH(tanggal) = MONTH('".$tgl."') and DAY(tanggal) = DAY('".$tgl."');");
			$row_pic1 = mysqli_fetch_assoc($pic_sql1);
			$hasil1 = $row_pic1['jumlah_hijau'];
			//echo ($hasil1); die();
			if($tot_wo_jm6 < $hasil1 ){
				// Insert some values
				$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, tgl_fal, tgl_date_time, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance) 
				VALUES ('".$acces_user_log."','$nama_kom','$alamat','$tlp_kom',CURRENT_DATE(),'$tgl','$id','$keterangan_solving','$kd_kom','-','$kelurahan','MAINTENANCE','$jenis_produk','$id_user');");
				$query2 = mysqli_query($koneksi,"UPDATE keluhan SET status='Visit',handle_kompline='$handle_kompline', kategori_solving ='$kategori_solving' ,keterangan_solving='$keterangan_solving',ktg_ind_mslh='$ktg_ind_mslh',stts_post='y' WHERE id='$id';");
				
			}else{
				echo "jam1"; die();
			}
	}elseif($time == '08:00:00'){
			///// filter jam 8 - 9 ///////////
			$pic_sql = mysqli_query($koneksi, "SELECT jumlah_hijau FROM baris_kotak WHERE baris_no ='2' and YEAR(tanggal) = YEAR('".$tgl."') and MONTH(tanggal) = MONTH('".$tgl."') and DAY(tanggal) = DAY('".$tgl."');");
			$row_pic = mysqli_fetch_assoc($pic_sql);
			$hasil = $row_pic['jumlah_hijau'];
			//echo ($hasil); die();
			if($tot_wo_jm8 < $hasil ){
				// Insert some values
				//echo "mantab"; die();
				$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, tgl_fal, tgl_date_time, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance) 
				VALUES ('".$acces_user_log."','$nama_kom','$alamat','$tlp_kom',CURRENT_DATE(),'$tgl','$id','$keterangan_solving','$kd_kom','-','$kelurahan','MAINTENANCE','$jenis_produk','$id_user');");
				$query2 = mysqli_query($koneksi,"UPDATE keluhan SET status='Visit',handle_kompline='$handle_kompline', kategori_solving ='$kategori_solving' ,keterangan_solving='$keterangan_solving',ktg_ind_mslh='$ktg_ind_mslh',stts_post='y' WHERE id='$id';");
			}else{
				echo "jam2"; die();
			}
	}elseif($time == '10:00:00'){
		///// filter jam 8 - 9 ///////////
		$pic_sql = mysqli_query($koneksi, "SELECT jumlah_hijau FROM baris_kotak WHERE baris_no ='3' and YEAR(tanggal) = YEAR('".$tgl."') and MONTH(tanggal) = MONTH('".$tgl."') and DAY(tanggal) = DAY('".$tgl."');");
		$row_pic = mysqli_fetch_assoc($pic_sql);
		$hasil = $row_pic['jumlah_hijau'];
		if($tot_wo_jm10 < $hasil ){
			// Insert some values
			//echo "mantab"; die();
			$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, tgl_fal, tgl_date_time, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance) 
				VALUES ('".$acces_user_log."','$nama_kom','$alamat','$tlp_kom',CURRENT_DATE(),'$tgl','$id','$keterangan_solving','$kd_kom','-','$kelurahan','MAINTENANCE','$jenis_produk','$id_user');");
				$query2 = mysqli_query($koneksi,"UPDATE keluhan SET status='Visit',handle_kompline='$handle_kompline', kategori_solving ='$kategori_solving' ,keterangan_solving='$keterangan_solving',ktg_ind_mslh='$ktg_ind_mslh',stts_post='y' WHERE id='$id';");
		}else{
			echo "jam3"; die();
		}
	}elseif($time == '13:00:00'){
		///// filter jam 8 - 9 ///////////
		$pic_sql = mysqli_query($koneksi, "SELECT jumlah_hijau FROM baris_kotak WHERE baris_no ='4' and YEAR(tanggal) = YEAR('".$tgl."') and MONTH(tanggal) = MONTH('".$tgl."') and DAY(tanggal) = DAY('".$tgl."');");
	$row_pic = mysqli_fetch_assoc($pic_sql);
	$hasil = $row_pic['jumlah_hijau'];
		if($tot_wo_jm13 < $hasil ){
			// Insert some values
			//echo "mantab"; die();
				$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, tgl_fal, tgl_date_time, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance) 
				VALUES ('".$acces_user_log."','$nama_kom','$alamat','$tlp_kom',CURRENT_DATE(),'$tgl','$id','$keterangan_solving','$kd_kom','-','$kelurahan','MAINTENANCE','$jenis_produk','$id_user');");
				$query2 = mysqli_query($koneksi,"UPDATE keluhan SET status='Visit',handle_kompline='$handle_kompline', kategori_solving ='$kategori_solving' ,keterangan_solving='$keterangan_solving',ktg_ind_mslh='$ktg_ind_mslh',stts_post='y' WHERE id='$id';");
		
		}else{
			echo "jam4"; die();
		}
	}elseif($time == '15:00:00'){
		///// filter jam 8 - 9 ///////////
		$pic_sql = mysqli_query($koneksi, "SELECT jumlah_hijau FROM baris_kotak WHERE baris_no ='5' and YEAR(tanggal) = YEAR('".$tgl."') and MONTH(tanggal) = MONTH('".$tgl."') and DAY(tanggal) = DAY('".$tgl."');");
		$row_pic = mysqli_fetch_assoc($pic_sql);
		$hasil = $row_pic['jumlah_hijau'];
		if($tot_wo_jm15 < $hasil ){
			// Insert some values
			//echo "mantab"; die();
			$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, tgl_fal, tgl_date_time, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance) 
				VALUES ('".$acces_user_log."','$nama_kom','$alamat','$tlp_kom',CURRENT_DATE(),'$tgl','$id','$keterangan_solving','$kd_kom','-','$kelurahan','MAINTENANCE','$jenis_produk','$id_user');");
				$query2 = mysqli_query($koneksi,"UPDATE keluhan SET status='Visit',handle_kompline='$handle_kompline', kategori_solving ='$kategori_solving' ,keterangan_solving='$keterangan_solving',ktg_ind_mslh='$ktg_ind_mslh',stts_post='y' WHERE id='$id';");
		}else{
			echo "jam5"; die();
		}
	}elseif($time == '18:00:00'){
		///// filter jam 8 - 9 ///////////
		$pic_sql = mysqli_query($koneksi, "SELECT jumlah_hijau FROM baris_kotak WHERE baris_no ='6' and YEAR(tanggal) = YEAR('".$tgl."') and MONTH(tanggal) = MONTH('".$tgl."') and DAY(tanggal) = DAY('".$tgl."');");
		$row_pic = mysqli_fetch_assoc($pic_sql);
		$hasil = $row_pic['jumlah_hijau'];
		if($tot_wo_jm18 < $hasil ){
			// Insert some values
			//echo "mantab"; die();
			$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, tgl_fal, tgl_date_time, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance) 
				VALUES ('".$acces_user_log."','$nama_kom','$alamat','$tlp_kom',CURRENT_DATE(),'$tgl','$id','$keterangan_solving','$kd_kom','-','$kelurahan','MAINTENANCE','$jenis_produk','$id_user');");
				$query2 = mysqli_query($koneksi,"UPDATE keluhan SET status='Visit',handle_kompline='$handle_kompline', kategori_solving ='$kategori_solving' ,keterangan_solving='$keterangan_solving',ktg_ind_mslh='$ktg_ind_mslh',stts_post='y' WHERE id='$id';");
		}else{
			echo "jam6"; die();
		}
	} */
	
	$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, tgl_fal, tgl_date_time, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance) 
				VALUES ('".$acces_user_log."','$nama_kom','$alamat','$tlp_kom',CURRENT_DATE(),'$tgl','$id','$keterangan_solving','$kd_kom','-','$kelurahan','MAINTENANCE','$jenis_produk','$id_user');");
	$query2 = mysqli_query($koneksi,"UPDATE keluhan SET status='Visit',handle_kompline='$handle_kompline', kategori_solving ='$kategori_solving' ,keterangan_solving='$keterangan_solving',ktg_ind_mslh='$ktg_ind_mslh',stts_post='y' WHERE id='$id';");

	if((!$query1) or (!$query2)){
		echo 'Error';
		//mysqli_rollback($koneksi);	
		//echo("Error description: " . mysqli_error($koneksi));
	}else{
			if(!mysqli_commit($koneksi)) {	
				echo 'Error2';
				$result['error'] = 'error';
				$result['result'] = 0;
				mysqli_rollback($koneksi);
			}else{
				echo '1';	
				$hp = $tlp_kom;
						$url = "https://apievo-01.naratel.net.id/message/sendText/Barente";
						$message = '
Kami informasikan bahwa teknisi kami akan melaksanakan MAINTENANCE : 

Tanggal Pekerjaan : '.$tgl.' - '.$date_end_mntn.'
ID Pelanggan : '.$id_user.'
Nama Pelanggan : '.$nama_kom.'
Alamat : '.$alamat.'

CS Kapten Naratel.
https://wa.me/6288212022222 

Salam 
CS Kapten Naratel';
						$curl = curl_init($url);
						$headers = array(
									"Content-Type: application/json",
									"apikey: B9E0FF852000-45E5-A5D2-EE3E91129B9B",
								);

						$data = array(
											"number" => $hp,
											"text" => $message,
										);


							$data_json = json_encode($data);
							
							curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
							curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
							curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
							$gas = curl_exec($curl);
							curl_close($curl);	
				}
	
	}

?>	




<?php
include('../controller/controller_mysqli.php');
session_start();
$kota = $_SESSION['depart'];
$acces_user_log = $_SESSION["nama"];

function clean($string){
		$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
	}
	 $nama_fal_s= $_POST['nama_mnt1'];
	$nama_fal = clean($nama_fal_s);
   $kd_layanan=$_POST['kd_layanan_mnt1'];
   $alamat_fal=$_POST['alamat_mnt1'];
   $kelurahan = $_POST['kelurahan_mnt1'];
   $tlp_fal=$_POST['tlp_mnt1'];   
   $jenis_pekerjaan=$_POST['jenis_pekerjaan_mnt1'];
   $username_Maintenance=$_POST['username_Maintenance_mnt1'];
   $lain_lain=$_POST['lain_lain_mnt1'];
   $produk=$_POST['produk_mnt1'];
   $date_wo=$_POST['date_wo'];
	$tgl = date('Y-m-d H:i:s', strtotime($date_wo));
	$time = date('H:i:s', strtotime($date_wo));

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
		$tot_wo_jm18 = $row_wo_jm18['hasil']; */
	
	/* if($time == '06:00:00'){
			///// filter jam 8 - 9 ///////////
			//echo ($tgl);
			//echo ($time); die();
			$pic_sql1 = mysqli_query($koneksi, "SELECT jumlah_hijau FROM baris_kotak WHERE baris_no ='1' and YEAR(tanggal) = YEAR('".$tgl."') and MONTH(tanggal) = MONTH('".$tgl."') and DAY(tanggal) = DAY('".$tgl."');");
			$row_pic1 = mysqli_fetch_assoc($pic_sql1);
			$hasil1 = $row_pic1['jumlah_hijau'];
			//echo ($hasil1); die();
			if($tot_wo_jm6 < $hasil1 ){
				// Insert some values
				$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance, tgl_date_time) 
				VALUES ('".$acces_user_log."', '$nama_fal','$alamat_fal','$tlp_fal',CURRENT_TIMESTAMP(),'$lain_lain','$kd_layanan','-','$kelurahan','MAINTENANCE','$produk','$username_Maintenance','$tgl');");				
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
				$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance, tgl_date_time) 
				VALUES ('".$acces_user_log."', '$nama_fal','$alamat_fal','$tlp_fal',CURRENT_TIMESTAMP(),'$lain_lain','$kd_layanan','-','$kelurahan','MAINTENANCE','$produk','$username_Maintenance','$tgl');");
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
			$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance, tgl_date_time) 
				VALUES ('".$acces_user_log."', '$nama_fal','$alamat_fal','$tlp_fal',CURRENT_TIMESTAMP(),'$lain_lain','$kd_layanan','-','$kelurahan','MAINTENANCE','$produk','$username_Maintenance','$tgl');");
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
			$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance, tgl_date_time) 
				VALUES ('".$acces_user_log."', '$nama_fal','$alamat_fal','$tlp_fal',CURRENT_TIMESTAMP(),'$lain_lain','$kd_layanan','-','$kelurahan','MAINTENANCE','$produk','$username_Maintenance','$tgl');");
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
			$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance, tgl_date_time) 
				VALUES ('".$acces_user_log."', '$nama_fal','$alamat_fal','$tlp_fal',CURRENT_TIMESTAMP(),'$lain_lain','$kd_layanan','-','$kelurahan','MAINTENANCE','$produk','$username_Maintenance','$tgl');");
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
			$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance, tgl_date_time) 
				VALUES ('".$acces_user_log."', '$nama_fal','$alamat_fal','$tlp_fal',CURRENT_TIMESTAMP(),'$lain_lain','$kd_layanan','-','$kelurahan','MAINTENANCE','$produk','$username_Maintenance','$tgl');");
		}else{
			echo "jam6"; die();
		}
	} */

	$query1 = mysqli_query($koneksi,"INSERT INTO tbl_maintenance (pic_sign,nama_fal, alamat_fal, tlp_fal, username_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, jenis_wo, produk, username_Maintenance, tgl_date_time) 
	VALUES ('".$acces_user_log."', '$nama_fal','$alamat_fal','$tlp_fal',CURRENT_TIMESTAMP(),'$lain_lain','$kd_layanan','-','$kelurahan','MAINTENANCE','$produk','$username_Maintenance','$tgl');");
	
	if(!$query1){
		//echo("Error description: " . mysqli_error($koneksi));
		echo 'Error';
		//mysqli_rollback($koneksi);	
	}else{
			if(!mysqli_commit($koneksi)) {	
				echo 'Error2';
				$result['error'] = 'error';
				$result['result'] = 0;
				mysqli_rollback($koneksi);
			}else{
				echo '1';	
				
				//die('aaa');
				
				///// notif teknisi /////
/* 				$query = mysqli_query ($koneksi, "SELECT nama_panggilan, no_telp FROM tbl_pegawai WHERE kantor_cabang='mlg' and jabatan='teknisi' and status_pegawai='aktiv';");

				$data = array();
				while ($r = mysqli_fetch_assoc($query)) {
				$data[] = $r;
				}
				$i = 0;

				foreach ($data as $key) {
						
				//$ppn = round(($key['nominal'] * 0.11),0); 		
				//$hp = '6282228550709';
				$hp = $key['no_telp'];
				$url = "https://evolution.naratel.net.id/message/sendText/Barente_Blasting";
				$message = 'Kami Informasikan Bahwa : 

				Jenis Pekerjaan :  IKR
				Tanggal Pekerjaan : '.$tgl_fal.'
				ID Pelanggan : '.$username_fal.'
				Nama Pelanggan : '.$nama_fal.'
				Alamat : '.$alamat_fal.'
				NO WA : '.$no_wa.'

				Bisa dicek melalui website https://wo.naraya.co.id/, Silahkan ambil pekerjaan (Siapa cepat dia dapat)

				Salam 
				CS Kapten Naratel';
				$curl = curl_init($url);
				$headers = array(
							"Content-Type: application/json",
							"apikey: kqo9v3xp06llje75gzcjnf",
						);

				$data = array(
									"number" => $hp,
									"options" => array(
										"delay" => 1200,
										"presence" => "composing",
										"linkPreview" => false
									),
									"textMessage" => array(
										"text" => $message,
										//"text" => "https://survey.kaptennaratel.com/survei-setelah-ikr/?admin=$user_gass&kode_user=$kode_users"
										)
								);


					$data_json = json_encode($data);
					
					curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
					curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
					$gas = curl_exec($curl);
					curl_close($curl);
					//echo "<pre>";
					//print_r($result);
					
					//mysqli_query($koneksi, "UPDATE tb_gundala SET status_log = 'n' where id_log = " . $key['id_log'] . ";");
					//mysqli_query($koneksi, "UPDATE tbl_user_recharges SET expiration = '".$key['akhir']."' where username = '".$key['kode_user']."';");
				}
 */				
				
/* $curl = curl_init();
$token = "93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL";
$data = [
'phone' => '120363210179095768',
'message' => '
Kami Informasikan Bahwa : 

Jenis Pekerjaan :  IKR
Tanggal Pekerjaan : '.$tgl_fal.'
ID Pelanggan : '.$username_fal.'
Nama Pelanggan : '.$nama_fal.'
Alamat : '.$alamat_fal.'
NO WA : '.$no_wa.'
Status : Not Solved

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
$gas = curl_exec($curl); */
//curl_close($curl);
//print_r($result);
				}
	
	}

?>	




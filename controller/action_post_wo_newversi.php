<?php
//die()
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
$nama_fal_s= $_POST['nama_fal'];
function clean($string){
	$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
	return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
}

$nama_fal = clean($nama_fal_s);
$key_fal=$_POST['key_fal'];
$kd_layanan=$_POST['kd_layanan'];
$alamat_fal=$_POST['alamat_fal'];
$rt=$_POST['rt'];
$rw=$_POST['rw'];
$kelurahan=$_POST['kelurahan'];
$kecamatan=$_POST['kecamatan'];
$kabupaten=$_POST['kabupaten'];
$provinsi=$_POST['provinsi'];
$pic_ikr='-'; 
$no_wa=$_POST['no_wa'];   
$no_wa2=$_POST['no_wa2'];   
$no_wa3=$_POST['no_wa3'];   
$no_wa4=$_POST['no_wa4'];   
$status=$_POST['status'];
$pic = strtok($status, '#');
$status = substr($status, strpos($status, '#')+1);

$status2=$_POST['status2'];
$pic2 = strtok($status2, '#');
$status2 = substr($status2, strpos($status2, '#')+1);
$jenis_wo=$_POST['jenis_wo'];
$end=$_POST['end'];
$tgl_fal=$_POST['tgl_fal_datetime_ikr'];
$tgl = date('Y-m-d H:i:s', strtotime($tgl_fal));
$tgl_notif = date('Y-m-d H:i:s', strtotime($tgl_fal));
$time = date('H:i:s', strtotime($tgl_fal));
//$tglss = date(('d-m-Y'),strtotime($tgl_fal));
$produk=$_POST['produk'];
$modem=$_POST['modem'];
$kabel1=$_POST['kabel1'];
$kabel2=$_POST['kabel2'];
$kabel3=$_POST['kabel3'];  
//$tgl_fal=date('Y-m-d', strtotime($_POST['tgl_fal']));
$paket_fal=$_POST['paket_fal']; 
$username_fal=$_POST['username_fal'];      
$kategori_maintenance=$_POST['kategori_maintenance'];
$keterangan_angsuran=$_POST['keterangan_angsuran'];
$password_fal=$_POST['password_fal'];
$lain_lain=$_POST['lain_lain'];
$pembayaran=$_POST['pembayaran'];
$status_wo=$_POST['status_wo'];
$foto_rumah=$_POST['foto_rumah'];
$foto_ktp=$_POST['foto_ktp'];
$lokasi=$_POST['lokasi'];
$perlakuan=$_POST['perlakuan'];
$total_diskon=$_POST['total_diskon'];
$verified=$_POST['verified'];
$total=$_POST['total'];
$letak_odp=$_POST['letak_odp'];
$status_lokasi=$_POST['status_lokasi'];
$tahu_layanan=$_POST['tahu_layanan'];
$alasan=$_POST['alasan'];
$metode_pembayaran=$_POST['metode_pembayaran'];
$nama_sobat=$_POST['nama_sobat'];
$no_rekening=$_POST['no_rekening'];
$mgm=$_POST['mgm'];
$kd_layanan=$_POST['layanan'];

if($mgm == 'reguler'){
	$query_kol = 'tb_daf';
}elseif($mgm == 'mgm'){
	$query_kol = 'tb_mgm';
}
//echo ($h); die();
$url = "https://apievo-01.naratel.net.id/message/sendText/Barente";
$message = 'Kami informasikan bahwa teknisi kami akan melaksanakan Instalasi : 

Tanggal Pekerjaan : '.$tgl_notif.' - '.$end.'
ID Pelanggan : '.$username_fal.'
Nama Pelanggan : '.$nama_fal.'
Alamat : '.$alamat_fal.'

CS Kapten Naratel.
https://wa.me/6288212022222';
//echo ($h); die();

if( $paket_fal == '5'){
$biaya_instalasi = '220000';
$harga_paket = '120000';
} elseif ( $paket_fal == '10'){
$biaya_instalasi = '220000';
$harga_paket = '175000';
} elseif ( $paket_fal == '15'){
$biaya_instalasi = '220000';
$harga_paket = '235000';
} elseif ( $paket_fal == '20'){
$biaya_instalasi = '220000';
$harga_paket = '325000';
} elseif ( $paket_fal == '30'){
$biaya_instalasi = '220000';
$harga_paket = '400000';
} elseif ( $paket_fal == '50'){
$biaya_instalasi = '220000';
$harga_paket = '525000';
} elseif ( $paket_fal == '60'){
$biaya_instalasi = '220000';
$harga_paket = '600000';
} elseif ( $paket_fal == '100'){
$biaya_instalasi = '220000';
$harga_paket = '900000';
} elseif ( $paket_fal == 'Edubiz-5-100'){
$biaya_instalasi = '220000';
$harga_paket = '438450';
} elseif ( $paket_fal == 'Edubiz-10-100'){
$biaya_instalasi = '220000';
$harga_paket = '499500';
} elseif ( $paket_fal == 'Edubiz-15-100'){
$biaya_instalasi = '220000';
$harga_paket = '566100';
} elseif ( $paket_fal == 'Edubiz-20-100'){
$biaya_instalasi = '220000';
$harga_paket = '600000';
} elseif ( $paket_fal == 'Edubiz-Halfday-100'){
$biaya_instalasi = '220000';
$harga_paket = '305250';
}

/* if( $paket_fal == '5'){
$biaya_instalasi = '10000';
$harga_paket = '120000';
$perlakuan = 'promo_hari_pahlawan';
} elseif ( $paket_fal == '10'){
$biaya_instalasi = '10000';
$harga_paket = '175000';
$perlakuan = 'promo_hari_pahlawan';
} elseif ( $paket_fal == '15'){
$biaya_instalasi = '10000';
$harga_paket = '235000';
$perlakuan = 'promo_hari_pahlawan';
} elseif ( $paket_fal == '20'){
$biaya_instalasi = '10000';
$harga_paket = '325000';
$perlakuan = 'promo_hari_pahlawan';
} elseif ( $paket_fal == '60'){
$biaya_instalasi = '10000';
$harga_paket = '1030000';
$perlakuan = 'promo_hari_pahlawan';
} */

/* if( $paket_fal == '5'){
$biaya_instalasi = '17000';
$harga_paket = '120000';
$perlakuan = 'Promo 17 Agustus';
} elseif ( $paket_fal == '10'){
$biaya_instalasi = '17000';
$harga_paket = '175000';
$perlakuan = 'Promo 17 Agustus';
} elseif ( $paket_fal == '15'){
$biaya_instalasi = '17000';
$harga_paket = '235000';
$perlakuan = 'Promo 17 Agustus';
} elseif ( $paket_fal == '20'){
$biaya_instalasi = '17000';
$harga_paket = '325000';
$perlakuan = 'Promo 17 Agustus';
} elseif ( $paket_fal == '60'){
$biaya_instalasi = '17000';
$harga_paket = '1030000';
$harga_paket = '1030000';
} */

if( $kd_layanan == 'mlg'){
$token = '93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL';
}elseif( $kd_layanan == 'pas'){
$token = 'nRtLakewmjAWhnxzVO2kjHavvAhL14Bgl7zScUijsDtMsPVce4dzAIdIn2tHYyge';
}elseif( $kd_layanan == 'batu'){
$token = 'OKguQvywltMerXQkValMCeR29rzmo897aEAivh7yP0GbVbIy37jaJBfehSWpCYRM';
}elseif( $kd_layanan == 'mlg1'){
$token = 'GLba17FEXQE52RiiU1Yuo2LXT1rzf8YReNYJz2jsCp5H9q8x6XGu8xh7pQT7Sv7k';
}

if($pic_ikr == "fio") {
	$no_blast = '089671467187';
	//$no_blast = '082228550709';
}elseif($pic_ikr == "fauzi") {
	$no_blast = '083848024834';
}elseif($pic_ikr == "rino") {
	$no_blast = '087881483767';
}elseif($pic_ikr == "ricky") {
	$no_blast = '089683845842';
}elseif($pic_ikr == "rafif") {
	$no_blast = '081553428726';
}elseif($pic_ikr == "sonny") {
	$no_blast = '089523791209';
}elseif($pic_ikr == "rozak") {
	$no_blast = '089627201994';
}elseif($pic_ikr == "wawan") {
	$no_blast = '082257293851';
}elseif($pic_ikr == "decky") {
	$no_blast = '082233541828';
}elseif($pic_ikr == "saiin") {
	$no_blast = '081326594474';
}elseif($pic_ikr == "siswanto") {
	$no_blast = '0895331297402';
}elseif($pic_ikr == "amin") {
	$no_blast = '0895337237228';
}elseif($pic_ikr == "heri") {
	$no_blast = '081235372888';
}elseif($pic_ikr == "lukman") {
	$no_blast = '082257876093';
}elseif($pic_ikr == "wahyudi") {
	$no_blast = '089699654803';
}elseif($pic_ikr == "ahnaf") {
	$no_blast = '0858151324789';
}elseif($pic_ikr == "majid") {
	$no_blast = '081385766281';
}elseif($pic_ikr == "bayu") {
	$no_blast = '081359042213';
}elseif($pic_ikr == "yusuf") {
	$no_blast = '085733254225';
}elseif($pic_ikr == "satria") {
	$no_blast = '085649064169';
}elseif($pic_ikr == "movic") {
	$no_blast = '082257048239';
}
		mysqli_autocommit($koneksi,FALSE);
		//mysqli_autocommit($koneksivps,FALSE);
		
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
				//echo "mantab"; die();
				$query1 = mysqli_query($koneksi,"INSERT INTO tbl_fal (nama_fal, alamat_fal, tlp_fal,tlp_fal2,tlp_fal3,tlp_fal4, paket_fal, tgl_fal ,tgl_fal_datetime, username_fal, password_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, kecamatan, kabupaten, provinsi, rt, rw, jenis_wo, foto_dpn_rmh, foto_ktp, lokasi, produk, pembayaran, perlakuan, total_diskon, angsuran1, verified, letak_odp, hrg_ins, hrg_pkt, status_lokasi, tahu_layanan, alasan, metode_pembayaran, no_rekening, nama_sobat, mgm, verified_mgm) 
	                            VALUES ('$nama_fal','$alamat_fal','$no_wa','$no_wa2','$no_wa3','$no_wa4','$paket_fal','$tgl_fal','$tgl','$username_fal','$password_fal','$lain_lain','$kd_layanan','$pic_ikr','$kelurahan','$kecamatan','$kabupaten','$provinsi','$rt','$rw','INSTALASI','mgm/Foto_Rumah/$foto_rumah','mgm/Foto_KTP/$foto_ktp','$lokasi','Kapten Naratel','$pembayaran','$perlakuan','$total','$keterangan_angsuran','not_verified','$letak_odp[0]','$biaya_instalasi','$harga_paket','$status_lokasi','$tahu_layanan','$alasan','$metode_pembayaran','$no_rekening','$nama_sobat','$mgm','n');");				
				$query2 = mysqli_query($koneksivps,"UPDATE $query_kol SET `status` = 'y' WHERE key_fal = '$key_fal';");
				
			}else{
				echo "Slot 1"; die();
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
				$query1 = mysqli_query($koneksi,"INSERT INTO tbl_fal (nama_fal, alamat_fal, tlp_fal,tlp_fal2,tlp_fal3,tlp_fal4, paket_fal, tgl_fal ,tgl_fal_datetime, username_fal, password_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, kecamatan, kabupaten, provinsi, rt, rw, jenis_wo, foto_dpn_rmh, foto_ktp, lokasi, produk, pembayaran, perlakuan, total_diskon, angsuran1, verified, letak_odp, hrg_ins, hrg_pkt, status_lokasi, tahu_layanan, alasan, metode_pembayaran, no_rekening, nama_sobat, mgm, verified_mgm) 
	                            VALUES ('$nama_fal','$alamat_fal','$no_wa','$no_wa2','$no_wa3','$no_wa4','$paket_fal','$tgl','$tgl','$username_fal','$password_fal','$lain_lain','$kd_layanan','$pic_ikr','$kelurahan','$kecamatan','$kabupaten','$provinsi','$rt','$rw','INSTALASI','mgm/Foto_Rumah/$foto_rumah','mgm/Foto_KTP/$foto_ktp','$lokasi','Kapten Naratel','$pembayaran','$perlakuan','$total','$keterangan_angsuran','not_verified','$letak_odp[0]','$biaya_instalasi','$harga_paket','$status_lokasi','$tahu_layanan','$alasan','$metode_pembayaran','$no_rekening','$nama_sobat','$mgm','n');");
				$query2 = mysqli_query($koneksivps,"UPDATE $query_kol SET `status` = 'y' WHERE key_fal = '$key_fal';");
			}else{
				echo "Slot 2"; die();
			}
	}elseif($time == '10:00:00'){
		///// filter jam 8 - 9 ///////////
		$pic_sql = mysqli_query($koneksi, "SELECT jumlah_hijau FROM baris_kotak WHERE baris_no ='3' and YEAR(tanggal) = YEAR('".$tgl."') and MONTH(tanggal) = MONTH('".$tgl."') and DAY(tanggal) = DAY('".$tgl."');");
		$row_pic = mysqli_fetch_assoc($pic_sql);
		$hasil = $row_pic['jumlah_hijau'];
		if($tot_wo_jm10 < $hasil ){
			// Insert some values
			//echo "mantab"; die();
			$query1 = mysqli_query($koneksi,"INSERT INTO tbl_fal (nama_fal, alamat_fal, tlp_fal,tlp_fal2,tlp_fal3,tlp_fal4, paket_fal, tgl_fal ,tgl_fal_datetime, username_fal, password_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, kecamatan, kabupaten, provinsi, rt, rw, jenis_wo, foto_dpn_rmh, foto_ktp, lokasi, produk, pembayaran, perlakuan, total_diskon, angsuran1, verified, letak_odp, hrg_ins, hrg_pkt, status_lokasi, tahu_layanan, alasan, metode_pembayaran, no_rekening, nama_sobat, mgm, verified_mgm) 
	                            VALUES ('$nama_fal','$alamat_fal','$no_wa','$no_wa2','$no_wa3','$no_wa4','$paket_fal','$tgl_fal','$tgl','$username_fal','$password_fal','$lain_lain','$kd_layanan','$pic_ikr','$kelurahan','$kecamatan','$kabupaten','$provinsi','$rt','$rw','INSTALASI','mgm/Foto_Rumah/$foto_rumah','mgm/Foto_KTP/$foto_ktp','$lokasi','Kapten Naratel','$pembayaran','$perlakuan','$total','$keterangan_angsuran','not_verified','$letak_odp[0]','$biaya_instalasi','$harga_paket','$status_lokasi','$tahu_layanan','$alasan','$metode_pembayaran','$no_rekening','$nama_sobat','$mgm','n');");
			$query2 = mysqli_query($koneksivps,"UPDATE $query_kol SET `status` = 'y' WHERE key_fal = '$key_fal';");
		}else{
			echo "Slot 3"; die();
		}
	}elseif($time == '13:00:00'){
		///// filter jam 8 - 9 ///////////
		$pic_sql = mysqli_query($koneksi, "SELECT jumlah_hijau FROM baris_kotak WHERE baris_no ='4' and YEAR(tanggal) = YEAR('".$tgl."') and MONTH(tanggal) = MONTH('".$tgl."') and DAY(tanggal) = DAY('".$tgl."');");
	$row_pic = mysqli_fetch_assoc($pic_sql);
	$hasil = $row_pic['jumlah_hijau'];
		if($tot_wo_jm13 < $hasil ){
			// Insert some values
			//echo "mantab"; die();
			$query1 = mysqli_query($koneksi,"INSERT INTO tbl_fal (nama_fal, alamat_fal, tlp_fal,tlp_fal2,tlp_fal3,tlp_fal4, paket_fal, tgl_fal ,tgl_fal_datetime, username_fal, password_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, kecamatan, kabupaten, provinsi, rt, rw, jenis_wo, foto_dpn_rmh, foto_ktp, lokasi, produk, pembayaran, perlakuan, total_diskon, angsuran1, verified, letak_odp, hrg_ins, hrg_pkt, status_lokasi, tahu_layanan, alasan, metode_pembayaran, no_rekening, nama_sobat, mgm, verified_mgm) 
	                            VALUES ('$nama_fal','$alamat_fal','$no_wa','$no_wa2','$no_wa3','$no_wa4','$paket_fal','$tgl_fal','$tgl','$username_fal','$password_fal','$lain_lain','$kd_layanan','$pic_ikr','$kelurahan','$kecamatan','$kabupaten','$provinsi','$rt','$rw','INSTALASI','mgm/Foto_Rumah/$foto_rumah','mgm/Foto_KTP/$foto_ktp','$lokasi','Kapten Naratel','$pembayaran','$perlakuan','$total','$keterangan_angsuran','not_verified','$letak_odp[0]','$biaya_instalasi','$harga_paket','$status_lokasi','$tahu_layanan','$alasan','$metode_pembayaran','$no_rekening','$nama_sobat','$mgm','n');");
			$query2 = mysqli_query($koneksivps,"UPDATE $query_kol SET `status` = 'y' WHERE key_fal = '$key_fal';");
		}else{
			echo "Slot 4"; die();
		}
	}elseif($time == '15:00:00'){
		///// filter jam 8 - 9 ///////////
		$pic_sql = mysqli_query($koneksi, "SELECT jumlah_hijau FROM baris_kotak WHERE baris_no ='5' and YEAR(tanggal) = YEAR('".$tgl."') and MONTH(tanggal) = MONTH('".$tgl."') and DAY(tanggal) = DAY('".$tgl."');");
		$row_pic = mysqli_fetch_assoc($pic_sql);
		$hasil = $row_pic['jumlah_hijau'];
		if($tot_wo_jm15 < $hasil ){
			// Insert some values
			//echo "mantab"; die();
			$query1 = mysqli_query($koneksi,"INSERT INTO tbl_fal (nama_fal, alamat_fal, tlp_fal,tlp_fal2,tlp_fal3,tlp_fal4, paket_fal, tgl_fal ,tgl_fal_datetime, username_fal, password_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, kecamatan, kabupaten, provinsi, rt, rw, jenis_wo, foto_dpn_rmh, foto_ktp, lokasi, produk, pembayaran, perlakuan, total_diskon, angsuran1, verified, letak_odp, hrg_ins, hrg_pkt, status_lokasi, tahu_layanan, alasan, metode_pembayaran, no_rekening, nama_sobat, mgm, verified_mgm) 
	                            VALUES ('$nama_fal','$alamat_fal','$no_wa','$no_wa2','$no_wa3','$no_wa4','$paket_fal','$tgl_fal','$tgl','$username_fal','$password_fal','$lain_lain','$kd_layanan','$pic_ikr','$kelurahan','$kecamatan','$kabupaten','$provinsi','$rt','$rw','INSTALASI','mgm/Foto_Rumah/$foto_rumah','mgm/Foto_KTP/$foto_ktp','$lokasi','Kapten Naratel','$pembayaran','$perlakuan','$total','$keterangan_angsuran','not_verified','$letak_odp[0]','$biaya_instalasi','$harga_paket','$status_lokasi','$tahu_layanan','$alasan','$metode_pembayaran','$no_rekening','$nama_sobat','$mgm','n');");
			$query2 = mysqli_query($koneksivps,"UPDATE $query_kol SET `status` = 'y' WHERE key_fal = '$key_fal';");
		}else{
			echo "Slot 5"; die();
		}
	}elseif($time == '18:00:00'){
		///// filter jam 8 - 9 ///////////
		$pic_sql = mysqli_query($koneksi, "SELECT jumlah_hijau FROM baris_kotak WHERE baris_no ='6' and YEAR(tanggal) = YEAR('".$tgl."') and MONTH(tanggal) = MONTH('".$tgl."') and DAY(tanggal) = DAY('".$tgl."');");
		$row_pic = mysqli_fetch_assoc($pic_sql);
		$hasil = $row_pic['jumlah_hijau'];
		if($tot_wo_jm18 < $hasil ){
			// Insert some values
			//echo "mantab"; die();
			$query1 = mysqli_query($koneksi,"INSERT INTO tbl_fal (nama_fal, alamat_fal, tlp_fal,tlp_fal2,tlp_fal3,tlp_fal4, paket_fal, tgl_fal ,tgl_fal_datetime, username_fal, password_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, kecamatan, kabupaten, provinsi, rt, rw, jenis_wo, foto_dpn_rmh, foto_ktp, lokasi, produk, pembayaran, perlakuan, total_diskon, angsuran1, verified, letak_odp, hrg_ins, hrg_pkt, status_lokasi, tahu_layanan, alasan, metode_pembayaran, no_rekening, nama_sobat, mgm, verified_mgm) 
	                            VALUES ('$nama_fal','$alamat_fal','$no_wa','$no_wa2','$no_wa3','$no_wa4','$paket_fal','$tgl_fal','$tgl','$username_fal','$password_fal','$lain_lain','$kd_layanan','$pic_ikr','$kelurahan','$kecamatan','$kabupaten','$provinsi','$rt','$rw','INSTALASI','mgm/Foto_Rumah/$foto_rumah','mgm/Foto_KTP/$foto_ktp','$lokasi','Kapten Naratel','$pembayaran','$perlakuan','$total','$keterangan_angsuran','not_verified','$letak_odp[0]','$biaya_instalasi','$harga_paket','$status_lokasi','$tahu_layanan','$alasan','$metode_pembayaran','$no_rekening','$nama_sobat','$mgm','n');");
			$query2 = mysqli_query($koneksivps,"UPDATE $query_kol SET `status` = 'y' WHERE key_fal = '$key_fal';");
		}else{
			echo "Slot 6"; die();
		}
	} */
	
		$query1 = mysqli_query($koneksi,"INSERT INTO tbl_fal (nama_fal, alamat_fal, tlp_fal,tlp_fal2,tlp_fal3,tlp_fal4, paket_fal, tgl_fal ,tgl_fal_datetime, username_fal, password_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, kecamatan, kabupaten, provinsi, rt, rw, jenis_wo, foto_dpn_rmh, foto_ktp, lokasi, produk, pembayaran, perlakuan, total_diskon, angsuran1, verified, letak_odp, hrg_ins, hrg_pkt, status_lokasi, tahu_layanan, alasan, metode_pembayaran, no_rekening, nama_sobat, mgm, verified_mgm) 
	                            VALUES ('$nama_fal','$alamat_fal','$no_wa','$no_wa2','$no_wa3','$no_wa4','$paket_fal','$tgl','$tgl','$username_fal','$password_fal','$lain_lain','$kd_layanan','$pic_ikr','$kelurahan','$kecamatan','$kabupaten','$provinsi','$rt','$rw','INSTALASI','Foto_Rumah/$foto_rumah','Foto_KTP/$foto_ktp','$lokasi','Kapten Naratel','$pembayaran','$perlakuan','$total','$keterangan_angsuran','not_verified','$letak_odp[0]','$biaya_instalasi','$harga_paket','$status_lokasi','$tahu_layanan','$alasan','$metode_pembayaran','$no_rekening','$nama_sobat','$mgm','n');");
	if($kd_layanan == 'mlg1'){
		$query2 = mysqli_query($koneksi,"UPDATE tb_daf SET `status` = 'y', stts_ver = 'y' WHERE key_fal = '$key_fal';");
	}elseif(($kd_layanan == 'mlg') or ($kd_layanan == 'pas') or ($kd_layanan == 'batu')){
		$query2 = mysqli_query($koneksi,"UPDATE tb_daf SET stts_ver = 'y', `status` = 'y' WHERE key_fal = '$key_fal';");
	}

	//echo ($kd_layanan); die;

	if((!$query1) or (!$query2)){
		echo '101';
		//echo 'Error';
		mysqli_rollback($koneksi);	
	}else{
			if(!mysqli_commit($koneksi)){	
				echo '101';
				$result['error'] = 'error';
				$result['result'] = 0;
				mysqli_rollback($koneksi);
			}else{
				echo '1';	
				$curl = curl_init($url);
				$headers = array(
					"Content-Type: application/json",
					"apikey: qpjgac731m017tys1qxghx",
				);

				$data = array(
								"number" => $no_wa,
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
				
				
				$curl = curl_init($url);
				$headers = array(
					"Content-Type: application/json",
					"apikey: z1zvylp3f83flov4odeht",
				);

				$data = array(
								"number" => '120363210179095768',
								"options" => array(
									"delay" => 1200,
									"presence" => "composing",
									"linkPreview" => false
								),
								"textMessage" => array(
									"text" => 'tes',
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
				}
	
	}

?>	




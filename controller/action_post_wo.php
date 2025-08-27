<?php
include('../controller/controller_mysqli.php');

$host       = "117.103.69.22";
$user       = "kocak";
$password   = "gaming";
$database   = "db_pendaftaran_kapten";
$koneksivps    = mysqli_connect($host, $user, $password, $database);

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
   $pic_ikr=$_POST['pic_ikr'];
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
   $tgl_fal=$_POST['tgl_fal'];
   $tgl = date('Y-m-d h:i:s', strtotime($tgl_fal));
   //echo ($tgl); die();
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
    } elseif ( $paket_fal == '60'){
    $biaya_instalasi = '220000';
	$harga_paket = '600000';
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
		$no_blast = '6287896342885';
	}elseif($pic_ikr == "bayu") {
		$no_blast = '081359042213';
	}elseif($pic_ikr == "yusuf") {
		$no_blast = '085733254225';
	}elseif($pic_ikr == "satria") {
		$no_blast = '085649064169';
	}elseif($pic_ikr == "movic") {
		$no_blast = '082257048239';
	}elseif($pic_ikr == "vian") {
		$no_blast = '62895620108508';
	}


// Turn autocommit off
		mysqli_autocommit($koneksi,FALSE);
		mysqli_autocommit($koneksivps,FALSE);
		
		// Insert some values
		$query1 = mysqli_query($koneksi,"INSERT INTO tbl_fal (nama_fal, alamat_fal, tlp_fal, tlp_fal2, tlp_fal3, tlp_fal4, paket_fal, tgl_fal, tgl_fal_datetime, username_fal, password_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, kecamatan, kabupaten, provinsi, rt, rw, jenis_wo, foto_dpn_rmh, foto_ktp, lokasi, produk, pembayaran, perlakuan, total_diskon, angsuran1, verified, letak_odp, hrg_ins, hrg_pkt, status_lokasi, tahu_layanan, alasan, metode_pembayaran, no_rekening, nama_sobat, mgm, verified_mgm, verif_nominal) 
		VALUES ('$nama_fal','$alamat_fal','$no_wa','$no_wa2','$no_wa3','$no_wa4','$paket_fal','$tgl_fal', '$tgl','$username_fal','$password_fal','$lain_lain','$kd_layanan','$pic_ikr','$kelurahan','$kecamatan','$kabupaten','$provinsi','$rt','$rw','INSTALASI','Foto_Rumah/$foto_rumah','Foto_KTP/$foto_ktp','$lokasi','Kapten Naratel','$pembayaran','$perlakuan','$total','$keterangan_angsuran','not_verified','$letak_odp[0]','$biaya_instalasi','$harga_paket','$status_lokasi','$tahu_layanan','$alasan','-','-','-','-','-','-');");
	   $query2 = mysqli_query($koneksivps,"UPDATE tb_daf SET `status` = 'y' WHERE key_fal = '$key_fal';");

		
		if((!$query1) or (!$query2)){		
					echo 'Error';
					mysqli_rollback($koneksi);							
					mysqli_rollback($koneksivps);							
		}else{
				if((!mysqli_commit($koneksi)) or (!mysqli_commit($koneksivps)) ) {				
					$result['error'] = 'error';
					$result['result'] = 0;
					mysqli_rollback($koneksi);
					mysqli_rollback($koneksivps);
				}else{
					echo 'Success';		
					$curl = curl_init();
					//$token = "mHD2D84xlNdJQizmUv8tkoVFYX6IGMgl6NF6oJG2ibn0hdQL1VSDDYSHTguYgRBO";
					//$token = "uvCDOH6WvVKuaazBYx3lwBVfMXDt5nOWw72mQ5oSfmxzSUAS8a4ALlxCcuuUJulc";
					$token = $token;
					$phone = $no_blast;
					//$phone = '082228550709';
					$pesan = '
Kami Informasikan Bahwa : 

Nama Teknisi :  '.$pic_ikr.'
Jenis Pekerjaan :  IKR
Tanggal Pekerjaan : '.$tgl_fal.'
ID Pelanggan : '.$username_fal.'
Nama Pelanggan : '.$nama_fal.'
Alamat : '.$alamat_fal.'
NO WA : '.$no_wa.'

Bisa dicek melalui website https://wo.naraya.co.id/

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
					
					$curl = curl_init();
$token = "93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL";
$data = [
    'phone' => '120363210179095768',
    'message' => '
Kami Informasikan Bahwa : 

Nama Teknisi :  '.$pic_ikr.'
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
$result = curl_exec($curl);
curl_close($curl);
print_r($result);
					}
		
		}
  
  ?>	




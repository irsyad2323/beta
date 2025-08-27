<?php
session_start();
$kota = $_SESSION['depart'];
$acces_user_log = $_SESSION["nama"];
//echo ($_SESSION["depart"]); die();
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
  $kd_layanan= $_POST['kd_layanan'];
  $jenis_pekerjaan_ins_odp= $_POST['jenis_pekerjaan_ins_odp'];
   $odp=$_POST['odp'];;
   //$nama_odp = $_POST['nama_odp'];
   //$alamat_odp=$_POST['alamat_odp'];
   $lain_lain_odp=$_POST['lain_lain_odp'];   
   //$kelurahan_odp=$_POST['kelurahan_odp'];   
   $date_wo=$_POST['date_wo'];   
   $tgl = date('Y-m-d H:i:s', strtotime($date_wo));
   $time = date('H:i:s', strtotime($date_wo));
   
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
		$no_blast = '6282257876093';
	}elseif($pic_ikr == "wahyudi") {
		$no_blast = '6289699654803';
	}elseif($pic_ikr == "ahnaf") {
		$no_blast = '62858151324789';
	}elseif($pic_ikr == "majid") {
		$no_blast = '6281385766281';
	}elseif($pic_ikr == "bayu") {
		$no_blast = '6281359042213';
	}elseif($pic_ikr == "yusuf") {
		$no_blast = '6285733254225';
	}
	
	mysqli_autocommit($koneksi,FALSE);	
	$query1 = mysqli_query($koneksi,"INSERT INTO tbl_odp (pic_sign, tgl_sign, id_odp, lain_lain, kd_layanan,  produk ) 
	VALUES ('".$acces_user_log."','$tgl','$odp','$lain_lain_odp','$kd_layanan', 'Kapten Naratel');");	
   
  
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

   

mysqli_close($koneksi);
  
  ?>	




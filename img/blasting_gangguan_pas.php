<?php
date_default_timezone_set('Asia/Jakarta');
$host="117.103.69.22";
$user="kocak";
$pass="gaming";	
$database="billkapten";	
$koneksi= mysqli_connect($host,$user,$pass,$database);
	
if (mysqli_connect_errno()) {
  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
}
//die('aaa');
//cek select date now is set 
$query_set_notice = mysqli_query($koneksi,"SELECT log_notice_pas.log_date FROM `log_notice_pas` WHERE log_notice_pas.log_date = DATE_FORMAT(NOW(),'2022-06-25');");
$row_notice = mysqli_num_rows($query_set_notice);

if($row_notice == 0){
	
		
	//$query_tgl_notice = mysqli_query($koneksi, "Select DATE_FORMAT(b.expiration,"%d") as tgl_notice;");
	//$result_tgl_notice = mysqli_fetch_assoc($query_tgl_notice);
	//$tgl_notice = $result_tgl_notice['tgl_notice'];
	
	
	//$query = mysqli_query ($koneksi, "SELECT tb_gundala.virtual_account, tb_gundala.id_log, tb_gundala.telp_user, tb_gundala.kode_user, tb_gundala.nama_user, tb_gundala.alamat_user, DATE_FORMAT(tb_gundala.extend_log,'%d-%M-%Y') as tgl_extend, tb_gundala.nominal, tb_gundala.paket FROM tb_gundala WHERE tb_gundala.extend_log LIKE '%%%%%%%-$tgl' AND tb_gundala.status_log ='y' AND tb_gundala.kd_layanan = 'mlg';");
	$query = mysqli_query ($koneksi, "SELECT a.virtual_account, a.kode_user, a.paket, a.telp_user, b.expiration, (b.expiration - INTERVAL 1 DAY ) AS awal FROM tb_gundala a
INNER JOIN tbl_user_recharges b
ON a.kode_user = b.username
WHERE kd_layanan='mlg' and status_log='y' limit 0,100;");

	$row = mysqli_num_rows($query);
	if($row > 0 ){
		$data = array();
		while ($r = mysqli_fetch_assoc($query)) {
			$data[] = $r;
		}	
		$i = 0;
		foreach ($data as $key) {
			
//$ppn = round(($key['nominal'] * 0.11),0); 		
//$hp = '6282228550709';
$hp = $key['telp_user'];
$token = "wvcXJid3iFzGGd9hT2S2byaKiLWc38p6JY4WX49PRGPvnVNKBK";
if(is_null($key['virtual_account'])){
$message = 
"Dear User Kapten Naratel,

Terima kasih telah menggunakan layanan Kapten Naratel.
Melalui pesan ini kami informasikan bahwa kami akan 
melaksanakan Urgent Maintenance dengan detail kegiatan 
sebagai berikut : 

Tanggal 	            	  : Sabtu, 25 Juni 2022
Waktu    	           	  :  00.00 WIB - 02.00 WIB
Estimasi Down 	  :  2 Jam
Agenda  	    	         : Migrasi Jalur Utama
Impact Link 	        : Layanan internet down  

*Silahkan menghubungi kami melalui whatsapp jika setelah 
perbaikan tersebut koneksi masih belum dapat digunakan.*

Demikian informasi yang dapat kami sampaikan, Terima kasih.



CS Kapten Naratel
";
}
			 
	//$hp = '085853418225';
	//$message = 'pesan';
	$fields = array(
	   'number' => $hp,
	   'message' => $message,
		'token' => $token,
	);
	$fields_string = http_build_query($fields);
	$curl = curl_init();
	curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://app.ruangwa.id/api/send_message',
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => $fields_string,
		
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
	  //echo$response;echo"<br>";
	  $json_response = json_decode($response, true);
	  $status_message = $json_response['status'];
	  echo$status_message;echo"<br>";
	  //return($status_message);
	}
		 
		 
		}
		sleep(10);

	}else{}
	//mysqli_query($koneksi,"REPLACE INTO log_notice (log_date) VALUES (DATE_FORMAT(NOW(),'%Y-%m-%d'));");
}else{
	
	echo 'a';
}
?>
<?php
session_start();
/*
key_id: key_id,
			kode_user: kode_user,
			paket: paket,
			mitra: kode_mitra,
			cust_name: nama_user
			*/
date_default_timezone_set('Asia/Jakarta');
include('../koneksi.php');

$kel = $_POST ['kel'];
$kab = $_POST ['kab'];
$kec = $_POST ['kec'];

//echo $kode_olt[0];
$query_olt = mysqli_query($koneksi, "SELECT * FROM tb_kelurahan WHERE kd_kec = ".$kec." and kd_kel = ".$kel." and kd_kabkota = ".$kab.";");
	$result_olt = mysqli_fetch_assoc($query_olt);
	
	$kd_kec = $result_olt['kd_kec'];
	$kd_kel = $result_olt['kd_kel'];
	$kd_kabkota = $result_olt['kd_kabkota'];
	$kd_prov = $result_olt['kd_prov'];
	$kd_layanan = $result_olt['kd_layanan'];
	
	$hasil['kd_kec'] = $kd_kec;
	$hasil['kd_kel'] = $kd_kel;
	$hasil['kd_kabkota'] = $kd_kabkota;
	$hasil['kd_prov'] = $kd_prov;
	$hasil['kd_layanan'] = $kd_layanan;
	
	//echo$nama_user;
	//echo$alamat_user;
echo json_encode($hasil);	

/* 



$key_id = $_POST['key_id'];
$kode_user = $_POST['kode_user'];
$user_approved = $_SESSION['username'];
if(isset($_POST['useracc'])){
	$useracc = $_POST['useracc'];
	$media = 'Telegram';
}else{
	$useracc = $user_approved;//$_POST['useracc'];
	$media = 'Web';
}

$paket = $_POST['paket'];
$mitra = $_POST['mitra'];
$custname = $_POST['cust_name'];
$idtelemit = $_POST['tg_mitra'];
//$id_tele = $_POST['tg_mitra']
//echo$key_id.'@'.$kode_user.'@'.$paket.'@'.$mitra.'@'.$mitra.'@'.$custname;
//die();
mysqli_query($koneksi,"update request_extend set request_extend.status_request = 'approve' where request_extend.key_id = '$key_id'");
//mysqli_query($koneksi,"delete from tb_kelas_siswa where nis ='$siswa_nis'");

if(mysqli_error($koneksi)){
	$result['error']=mysqli_error($koneksi);
	$result['result']=0;
}else{
	$result['error']='';
	$result['result']=1;
	// persiapkan curl
	$ch = curl_init(); 

	// set url 
	//curl_setopt($ch, CURLOPT_URL, "https://api.callmebot.com/whatsapp.php?phone=+6285853418225&text=bismillah$i&apikey=990675");
	//curl_setopt($ch, CURLOPT_URL, "https://script.google.com/macros/s/AKfycbywsONDWmye5GvATmRSY13eZH9GmKHnvpRfyv7Hyv9eUDuj8Rk/exec?pilihan=acc&cust='".$kode_user."'");
	curl_setopt($ch, CURLOPT_URL, "https://script.google.com/macros/s/AKfycbzSZvl-TeMR4qIRJYWvf-rCtg7iuOHJgYTNCpzfe1SHWJH63bw/exec?pilihan=acc&custid=".$kode_user."&useracc=".$useracc."&paket=".$paket."&custname=".$custname."&mitra=".$mitra."&media=".$media."&mitratele=".$idtelemit);
	//curl_setopt($ch, CURLOPT_URL, "https://script.google.com/macros/s/AKfycbzSZvl-TeMR4qIRJYWvf-rCtg7iuOHJgYTNCpzfe1SHWJH63bw/exec?pilihan=acc&custid=".$kode_user."&useracc=".$useracc."&mitratele=".$id_tele."&paket=".$paket."&custname=".$custname."&mitra=".$mitra."&media=".$media);
	// return the transfer as a string 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

	// $output contains the output string 
	$output = curl_exec($ch); 

	// tutup curl 
	curl_close($ch);

	$ch2 = curl_init(); 

	// set url 
	//curl_setopt($ch, CURLOPT_URL, "https://api.callmebot.com/whatsapp.php?phone=+6285853418225&text=bismillah$i&apikey=990675");
	//curl_setopt($ch, CURLOPT_URL, "https://script.google.com/macros/s/AKfycbywsONDWmye5GvATmRSY13eZH9GmKHnvpRfyv7Hyv9eUDuj8Rk/exec?pilihan=acc&cust='".$kode_user."'");
	curl_setopt($ch2, CURLOPT_URL, "https://script.google.com/macros/s/AKfycbywsONDWmye5GvATmRSY13eZH9GmKHnvpRfyv7Hyv9eUDuj8Rk/exec?pilihan=acc&custid=".$kode_user."&useracc=".$useracc."&paket=".$paket."&custname=".$custname."&mitra=".$mitra."&media=".$media."&mitratele=".$idtelemit);
	//curl_setopt($ch, CURLOPT_URL, "https://script.google.com/macros/s/AKfycbzSZvl-TeMR4qIRJYWvf-rCtg7iuOHJgYTNCpzfe1SHWJH63bw/exec?pilihan=acc&custid=".$kode_user."&useracc=".$useracc."&mitratele=".$id_tele."&paket=".$paket."&custname=".$custname."&mitra=".$mitra."&media=".$media);
	// return the transfer as a string 
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1); 

	// $output contains the output string 
	$output = curl_exec($ch2); 

	// tutup curl 
	curl_close($ch); 	
}
echo json_encode($result); */
?>
  
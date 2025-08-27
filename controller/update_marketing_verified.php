<?php


include('../controller/controller_mysqli.php');
session_start();
$level_kantor = $_SESSION["kantor"];
$kota = $_SESSION["level_kantor"];
$user = $_SESSION["username"];
$nama = $_SESSION["nama"];
//echo($nama); die();

$id_verified = $_POST['id_verified'];
$verified = $_POST['verified'];
$diskon = $_POST['diskon'];
$disk = str_replace('.', '', $diskon);
$jenis_pekerjaan = $_POST['jenis_pekerjaan'];
$jumlah = $_POST['jumlah'];
$tgl_solved = $_POST['tgl_solved'];
$layanan = $_POST['layanan'];
$ket_daerah = $_POST['ket_daerah'];
$nama = $_POST['nama'];
$level = $_POST['level'];

/* if($nama == "fio") {
	$no_wa = '089671467187';
}elseif($nama == "ricky") {
	$no_wa = '089683845842';
}elseif($nama == "sonny") {
	$no_wa = '089523791209';
}elseif($nama == "rozak") {
	$no_wa = '089627201994';
}elseif($nama == "wawan") {
	$no_wa = '082257293851';
}elseif($nama == "wawan") {
	$no_wa = '082257293851';
}elseif($nama == "saiin") {
	$no_wa = '081326594474';
}elseif($nama == "siswanto") {
	$no_wa = '0895331297402';
}elseif($nama == "amin") {
	$no_wa = '082228550709';
}elseif($nama == "amin") {
	$no_wa = '082228550709';
} */
if ($level == 'Vendor') {
	if ($kota == 'mlg') {
		$token = '93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL';
		$gass = '6282140014011';
		//$gass = '6282228550709';
	} elseif ($kota == 'pas') {
		$token = 'nRtLakewmjAWhnxzVO2kjHavvAhL14Bgl7zScUijsDtMsPVce4dzAIdIn2tHYyge';
		$gass = '6288212066666';
	} elseif ($kota == 'batu') {
		$token = 'OKguQvywltMerXQkValMCeR29rzmo897aEAivh7yP0GbVbIy37jaJBfehSWpCYRM';
		$gass = '628879918888';
	} elseif ($kota == 'mlg1') {
		$token = 'GLba17FEXQE52RiiU1Yuo2LXT1rzf8YReNYJz2jsCp5H9q8x6XGu8xh7pQT7Sv7k';
		$gass = '628871180000';
	}
} elseif ($level == 'Outsourcing') {
	if ($kota == 'mlg') {
		$token = '93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL';
		$gass = '6282140014011';
		//$gass = '6282228550709';
	} elseif ($kota == 'pas') {
		$token = 'nRtLakewmjAWhnxzVO2kjHavvAhL14Bgl7zScUijsDtMsPVce4dzAIdIn2tHYyge';
		$gass = '6288212066666';
	} elseif ($kota == 'batu') {
		$token = 'OKguQvywltMerXQkValMCeR29rzmo897aEAivh7yP0GbVbIy37jaJBfehSWpCYRM';
		$gass = '628879918888';
	} elseif ($kota == 'mlg1') {
		$token = 'GLba17FEXQE52RiiU1Yuo2LXT1rzf8YReNYJz2jsCp5H9q8x6XGu8xh7pQT7Sv7k';
		$gass = '628871180000';
	}
}

if (mysqli_query($koneksi, "UPDATE tbl_marketing set verified='$verified', diskon='$disk', user_marketing='$nama' where id='$id_verified';")) {
	echo 'Berhasil diupdate!';
	if ($verified == 'approve') {

		$token = '8151076847:AAGMbQNLZ5jMhD6FPQ72jp_Xl3egiKgxuGE'; // Contoh: 123456789:ABCdefGHIjklMNOpqrSTUvwxYZ
		$chat_id = '-4857709311'; // Bisa ID numerik atau username tanpa '@'

		$pesan = "
Kami Informasikan Bahwa: 

Nama Teknisi : $nama
Jenis Pekerjaan : $jenis_pekerjaan
Jumlah : $jumlah pcs
Tanggal Selesai Pekerjaan : $tgl_solved
Kelurahan : $layanan
Daerah Sebaran: 
$ket_daerah

Telah melakukan pekerjaan dengan keterangan di atas, harap dilakukan pembayaran.

Salam, 
CS Kapten Naratel
";

		$url = "https://api.telegram.org/bot$token/sendMessage";

		$data = [
			'chat_id' => $chat_id,
			'text' => $pesan,
			'parse_mode' => 'HTML' // Bisa juga 'Markdown'
		];

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($ch);
		curl_close($ch);

		// Cek status kirim
		$json_response = json_decode($response, true);
		return ($json_response['ok'] == true ? 'success' : 'failed');

	}
} else {
	echo "Error: " . $sql . "" . mysqli_error($koneksi);
}

mysqli_close($koneksi);

?>
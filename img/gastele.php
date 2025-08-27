<?php
$host = "117.103.69.22";
$user = "kocak";
$pass = "gaming";
$database = "app_dokumen";

$koneksi = mysqli_connect($host, $user, $pass, $database);

if (mysqli_connect_errno()) {
	trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR);
}
//$query = mysqli_query ($koneksi, "SELECT tb_gundala.virtual_account, tb_gundala.id_log, tb_gundala.telp_user, tb_gundala.kode_user, tb_gundala.nama_user, tb_gundala.alamat_user, DATE_FORMAT(tb_gundala.extend_log,'%d-%M-%Y') as tgl_extend, tb_gundala.nominal, tb_gundala.paket FROM tb_gundala WHERE tb_gundala.extend_log LIKE '%%%%%%%-$tgl' AND tb_gundala.status_log ='y' AND tb_gundala.kd_layanan = 'mlg';");
$query = mysqli_query($koneksi, "SELECT a.*, b.nama, c.nama as nama_user FROM docs a
LEFT JOIN kategori b
ON a.kategori_id = b.id
LEFT JOIN `user` c
ON a.user_id = c.id
WHERE a.kategori_id='9' and tanggal_berakhir=CURDATE();");


$row = mysqli_num_rows($query);
if ($row > 0) {
	$data = array();
	while ($r = mysqli_fetch_assoc($query)) {
		$data[] = $r;
	}
	$i = 0;
	foreach ($data as $key) {
		$botApiToken = '6540455691:AAEzGsguXWg72TzMQn77rikD-arutS89Zeo';
		$channelId = $key['id_telegram'];
		$text = '📩 DOKUMEN PERJANJIAN TES 📩 

		✔️ User
		'.'💬 '.$key['nama_user'].'

		✔️ Kategori
		'.'💬 '.$key['nama'].'
		
		✔️ Judul
		'.'💬 '.$key['judul'].'

		✔️ Deskripsi
		'.'💬 '.$key['deskripsi'].'

		✔️ Tanggal Input
		'.'💬 '.$key['tanggal'].'

		✔️ Tanggal Berakhir Perjanjian
		'.'💬 '.$key['tanggal_berakhir'].'';

		$query = http_build_query([
			'chat_id' => $channelId,
			'text' => $text,
		]);
		$url = "https://api.telegram.org/bot{$botApiToken}/sendMessage?{$query}";

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST => 'GET',
		));
		curl_exec($curl);
		curl_close($curl);
	}
}
                  
?>


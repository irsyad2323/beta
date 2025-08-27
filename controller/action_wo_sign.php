<?php
// Tampilkan semua error untuk debugging
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

include('controller_mysqli.php');

// Cek apakah permintaan menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data yang dikirimkan dari AJAX
    $username_fal = $_POST['username_fal'];
    $nama_fal = $_POST['nama_fal'];
    $kd_layanan = $_POST['kd_layanan'];
    $alamat_fal = $_POST['alamat_fal'];
    $date_wo = $_POST['date_wo'];
    $date_end = $_POST['date_end'];
    $telp_fal = $_POST['telp_fal'];
	
	$sql_profile = "SELECT g.* FROM tb_gundala g WHERE g.kode_user = '".$username_fal."';";
	$query_profile = mysqli_query($koneksi_daf, $sql_profile) or die("database error:". mysqli_error($koneksi_daf));
	$data_profile = mysqli_fetch_assoc($query_profile);
	
	if($data_profile['type_paket'] == 'auratech'){
	
	$url = "https://apievo-01.naratel.net.id/message/sendText/CS_Auratech";
	$apikey = "1vg2673gdtkc29gnp4e96s";
$message = 'Kami informasikan bahwa teknisi kami akan melaksanakan Instalasi : 

Tanggal Pekerjaan : '.$date_wo.' - '.$date_end.'
ID Pelanggan : '.$username_fal.'
Nama Pelanggan : '.$nama_fal.'
Alamat : '.$alamat_fal.'

CS Auratech.';

	}else{
		$url = "https://apievo-01.naratel.net.id/message/sendText/Barente";
		$apikey = "B9E0FF852000-45E5-A5D2-EE3E91129B9B";
$message = 'Kami informasikan bahwa teknisi kami akan melaksanakan Instalasi : 

Tanggal Pekerjaan : '.$date_wo.' - '.$date_end.'
ID Pelanggan : '.$username_fal.'
Nama Pelanggan : '.$nama_fal.'
Alamat : '.$alamat_fal.'

CS Kapten Naratel.';
	}
    // Melakukan update pada tabel tbl_fal dengan query langsung
    $sql = "UPDATE tbl_fal 
            SET tgl_fal_datetime = '$date_wo', status_wo = 'Belum Terpasang', pic_ikr = '-'
            WHERE username_fal = '$username_fal'";

    // Eksekusi query
    if (mysqli_query($koneksi_daf, $sql)) {
        // Jika berhasil
        echo json_encode(1); // Kirimkan respons sukses

        // Jadikan token API variabel
		//$url = "your_api_endpoint_here"; // Ganti dengan URL endpoint API

		$curl = curl_init($url);

		$headers = array(
			"Content-Type: application/json",
			"apikey: $apikey", // Gunakan variabel $apikey
		);

		$data = array(
			"number" => $telp_fal,
			"text" => $message,
		);

		$data_json = json_encode($data);

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		$gas = curl_exec($curl);
		curl_close($curl);


        // CURL kedua (opsional)
        $curl = curl_init($url);
        $data = array(
            "number" => '120363210179095768',
            "options" => array(
                "delay" => 1200,
                "presence" => "composing",
                "linkPreview" => false
            ),
            "textMessage" => array(
                "text" => 'tes',
            )
        );

        $data_json = json_encode($data);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $gas = curl_exec($curl);
        curl_close($curl);

    } else {
        // Jika gagal
        echo json_encode("Gagal mengupdate data: " . mysqli_error($koneksi_daf));
    }

    // Tutup koneksi
    mysqli_close($koneksi_daf);
} else {
    // Jika bukan POST request
    echo json_encode("Metode request tidak valid.");
}

?>

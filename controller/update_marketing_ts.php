<?php
	session_start();
	$level_kantor = $_SESSION["kantor"];
	$kota = $_SESSION["level_kantor"];
	
    include('../controller/controller_mysqli.php');
 
    $nama = $_POST['nama'];
    $jenis_pekerjaan = $_POST['jenis_pekerjaan'];
    $ket = $_POST['ket'];
    $jumlah = $_POST['jumlah'];
    $status = $_POST['status'];
    $id = $_POST['id'];
    $daerah = $_POST['daerah'];
    $respon_wa = $_POST['respon_wa'];
    $fal = $_POST['fal'];
    $get_lokasi = $_POST['get_lokasi'];
    $latitude = strtok($get_lokasi, '#');
    $longitude = substr($get_lokasi, strpos($get_lokasi, '#')+1);
	
	/* if($nama1 == "fio") {
		$no_wa = '089671467187';
	}elseif($nama1 == "ricky") {
		$no_wa = '089683845842';
	}elseif($nama1 == "sonny") {
		$no_wa = '089523791209';
	}elseif($nama1 == "rozak") {
		$no_wa = '089627201994';
	}elseif($nama1 == "wawan") {
		$no_wa = '082257293851';
	}elseif($nama1 == "wawan") {
		$no_wa = '082257293851';
	}elseif($nama1 == "saiin") {
		$no_wa = '081326594474';
	}elseif($nama1 == "siswanto") {
		$no_wa = '0895331297402';
	}elseif($nama1 == "amin") {
		$no_wa = '082228550709';
	} */
	
	if( $kota == 'mlg'){
	$token = 'ew0hc75aywnj2kfzch4fbr';
	$gass = '082175290661';
	}elseif( $kota == 'pas'){
	$token = 'ew0hc75aywnj2kfzch4fbr';
	$gass = '081245593850';
	}elseif( $kota == 'batu'){
	$token = 'ew0hc75aywnj2kfzch4fbr';
	$gass = '081330055877';
	}elseif( $kota == 'mlg1'){
	$token = 'ew0hc75aywnj2kfzch4fbr';
	$gass = '08871190000';
	}

    if(mysqli_query($koneksi, "UPDATE tbl_marketing set daerah='$daerah', lokasi='$get_lokasi', longitude='$longitude', latitude='$latitude', status='$status', tgl_solved=CURRENT_TIMESTAMP() where id='$id';"))
	{   
     echo 'Berhasil diupdate!';
	 if( $status == 'sudah'){
		 
	$url = "https://apievo-01.naratel.net.id/message/sendText/scraping_naratel";
	
	//token
	//$token = 'ew0hc75aywnj2kfzch4fbr';
	$text = '
Kami Informasikan Bahwa : 

Nama Teknisi :  '.$nama.'
Jenis Pekerjaan :  '.$jenis_pekerjaan.'
Jumlah :  '.$jumlah.' pcs
Daerah Sebaran : 
'.$ket.'

Telah melakukan pekerjaan dengan keteranga diatas, harap dilakukan approve.

Salam 
CS Kapten Naratel';
	
    // Data yang akan dikirim melalui POST request
    $data = array(
        "number" => $phone,
        "options" => array(
            "delay" => 1200,
            "presence" => "composing",
            "linkPreview" => false
        ),
        "textMessage" => array(
            "text" => $text
        )
    );

    // Headers untuk request
    $headers = array(
        "Content-Type: application/json",
        "apikey: $token"
    );

    // Inisialisasi cURL
    $curl = curl_init($url);

    // Encode data ke JSON
    $data_json = json_encode($data);

    // Set cURL options
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    // Eksekusi cURL dan ambil response
    $response = curl_exec($curl);

    // Ambil status HTTP code
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    // Tutup cURL
    curl_close($curl);
	}
    } else {
       echo "Error: " . $sql . "" . mysqli_error($koneksi);
    }
 
    mysqli_close($koneksi);
 
?>
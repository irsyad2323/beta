<?php
	session_start();
	$level_kantor = $_SESSION["kantor"];
	$kota = $_SESSION["level_kantor"];
	
    include('../controller/controller_mysqli.php');
 
    $jenis_pekerjaan = $_POST['jenis_pekerjaan'];
    $nama = $_POST['nama'];
    $sebar_brosur = $_POST['sebar_brosur'];
    //$tanggal = $_POST['tanggal'];
    $provinsi = $_POST['provinsi'];
    $kabupaten = $_POST['kabupaten'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
	$kelurahan = $_POST['kelurahan'];
	$kel1 = strtok($kelurahan, '|');
	$kec1 = strtok($kecamatan, '|');
    $level = $_POST['level'];
    $ket = $_POST['ket'];
    $layanan = $_POST['layanan'];
    $nominal = $_POST['nominal'];
	$nomin = str_replace('.', '', $nominal);
    $metode_bayar = $_POST['metode_bayar'];
    $ats_rek = $_POST['ats_rek'];
    $keterangan = $_POST['keterangan'];
    $no_rek = $_POST['no_rek'];
    $lokasi = $_POST['lokasi'];
    $expected_date = $_POST['expected_date'];
	$date_now= date('d-M-Y');
	/* $date_object = DateTime::createFromFormat('d-M-Y', $expected_date);
	$formatted_date = $date_object->format('Y-m-d'); */

	
    $nama1 = strtok($nama, '|');
    $level1 = substr($nama, strpos($nama, '|')+1);	
	
	if($nama1 == "fio") {
		$no_wa = '089671467187';
		//$no_wa = '082228550709';
	}elseif($nama1 == "ricky") {
		$no_wa = '089683845842';
	}elseif($nama1 == "rafif") {
		$no_wa = '081553428726';
	}elseif($nama1 == "sonny") {
		$no_wa = '089523791209';
	}elseif($nama1 == "rozak") {
		$no_wa = '089627201994';
	}elseif($nama1 == "wawan") {
		$no_wa = '082257293851';
	}elseif($nama1 == "decky") {
		$no_wa = '082233541828';
	}elseif($nama1 == "saiin") {
		$no_wa = '081326594474';
	}elseif($nama1 == "siswanto") {
		$no_wa = '0895331297402';
	}elseif($nama1 == "amin") {
		$no_wa = '0895337237228';
	}elseif($nama1 == "heri") {
		$no_wa = '081235372888';
	}elseif($nama1 == "lukman") {
		$no_wa = '6282257876093';
	}elseif($nama1 == "wahyudi") {
		$no_wa = '6289699654803';
	}elseif($nama1 == "ahnaf") {
		$no_wa = '62858151324789';
	}elseif($nama1 == "majid") {
		$no_wa = '6281385766281';
	}elseif($nama1 == "bayu") {
		$no_wa = '6281359042213';
	}elseif($nama1 == "yusuf") {
		$no_wa = '6285733254225';
	}elseif($nama1 == "herry") {
		$no_wa = '6281235372888';
	}elseif($nama1 == "yani") {
		$no_wa = '6282175290661';
	}
	
 
    if(mysqli_query($koneksi, "INSERT INTO tbl_marketing (level, nama, jenis_pekerjaan, jumlah, tgl_pekerjaan, tgl_submit, prov, kab, kec, kel, kelurahan, status, ket_daerah, layanan, nominal, metode_bayar, keterangan, no_rek, ats_rek, lokasi_sign) 
	VALUES('$level1', '$nama1','$jenis_pekerjaan','$sebar_brosur','$expected_date', CURRENT_TIMESTAMP(),'$provinsi','$kabupaten','$kec1','$kel1','$layanan','belum','$ket','$kota','$nomin','$metode_bayar','$keterangan','$no_rek','$ats_rek','$lokasi')")) 
	{
     echo 'Berhasil Ditambahkan!';
					$sql_api = "SELECT x.* FROM api_blast x WHERE x.unit = 'all' and x.status = 'umum' and x.type = 'sendText';";
			$query_api = mysqli_query($koneksi, $sql_api);// or trigger_error("Query Failed! SQL: $sql_profile - Error: ".mysqli_error($koneksi), E_USER_ERROR);
			$data_api = mysqli_fetch_assoc($query_api);

			$url = $data_api['url'] . "/message/sendText/" . $data_api['instance'];
			$token = $data_api['token'];
					$phone = $gass;
					$pesan = '
Kami Informasikan Bahwa : 

Nama Teknisi :  '.$nama.'
Jenis Pekerjaan :  '.$jenis_pekerjaan.'
Jumlah :  '.$sebar_brosur.' pcs
Tanggal Pekerjaan : '.$date_now.'
Kelurahan : '.$layanan.'
Daerah Sebaran : 
'.$ket.'

Bisa dicek melalui website https://wo.naraya.co.id/

Salam 
CS Kapten Naratel';
					$curl = curl_init($url);
					$headers = array(
							"Content-Type: application/json",
							"apikey: $token",
					);
					
					$data = array(
							"number" => $no_wa,
							"options" => array(
								"delay" => 1200,
								"presence" => "composing",
								"linkPreview" => false
							),
							"textMessage" => array(
												"text" => $pesan,							
											)
						);
					$data_json = json_encode($data);
					curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
					curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
					$result = curl_exec($curl);
					curl_close($curl);
					$json_response = json_decode($result, true);
					return($json_response['status']);
										
    } else {
       echo "Error: " . $sql . "" . mysqli_error($koneksi);
    }
 
    mysqli_close($koneksi);
 
?>
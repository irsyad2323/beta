<?php
date_default_timezone_set('Asia/Jakarta');
include('../controller/controller_mysqli.php');
if (mysqli_connect_errno()) {
  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
}

$id_user = $_POST['value'];
//echo $kode_olt[0];
$query_olt = mysqli_query($koneksi, "SELECT a.* FROM tbl_instalasi_tiang a WHERE a.id_tiang='$id_user[0]' ORDER BY a.key DESC LIMIT 0,1;");
	$result_olt = mysqli_fetch_assoc($query_olt);
	$id_tiang = $result_olt['id_tiang'];
	$nama_tiang = $result_olt['nama_tiang'];
	$alamat = $result_olt['alamat'];
	$jenis_tiang = $result_olt['jenis_tiang'];
	$kd_layanan = $result_olt['kd_layanan'];
	
	$hasil['id_tiang'] = $id_tiang;
	$hasil['nama_tiang'] = $nama_tiang;
	$hasil['alamat'] = $alamat;
	$hasil['jenis_tiang'] = $jenis_tiang;
	$hasil['kd_layanan'] = $kd_layanan;
	
	//echo$nama_user;
	//echo$alamat_user;
echo json_encode($hasil);	
	//print_r ($id_user);

//echo"$kode_olt$x";
?>
<?php
date_default_timezone_set('Asia/Jakarta');
include('../controller/controller_mysqli.php');
if (mysqli_connect_errno()) {
  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
}

$id_user = $_POST['value'];
//echo $kode_olt[0];
$query_olt = mysqli_query($koneksi, "SELECT a.* FROM tbl_distribusi a WHERE a.key_odp='$id_user[0]' ORDER BY a.key_odp DESC LIMIT 0,1;");
	$result_olt = mysqli_fetch_assoc($query_olt);
	$key_odp = $result_olt['key_odp'];
	$nama_odp = $result_olt['nama_odp'];
	$alamat_odp = $result_olt['alamat_odp'];
	$lain_lain = $result_olt['lain_lain'];
	$kd_layanan = $result_olt['kd_layanan'];
	
	$hasil['key_odp'] = $key_odp;
	$hasil['nama_odp'] = $nama_odp;
	$hasil['alamat_odp'] = $alamat_odp;
	$hasil['lain_lain'] = $lain_lain;
	$hasil['kd_layanan'] = $kd_layanan;
	
	//echo$nama_user;
	//echo$alamat_user;
echo json_encode($hasil);	
	//print_r ($id_user);

//echo"$kode_olt$x";
?>
<?php
date_default_timezone_set('Asia/Jakarta');
include('../controller/controller_mysqli.php');
if (mysqli_connect_errno()) {
  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
}

$id_user = $_POST['value'];
//echo $kode_olt[0];
$query_olt = mysqli_query($koneksi, "SELECT a.* FROM tbl_odp a 
WHERE a.id_odp='$id_user[0]' 
ORDER BY a.nama_odp DESC LIMIT 0,1;");
	$result_olt = mysqli_fetch_assoc($query_olt);
	$id_odp = $result_olt['id_odp'];
	$nama_odp = $result_olt['nama_odp'];
	$alamat_odp = $result_olt['alamat_odp'];	
	$kd_layanan = $result_olt['kd_layanan'];	
	$kelurahan = $result_olt['kelurahan'];
	
	$hasil['nama_odp'] = $nama_odp;	
	$hasil['id_odp'] = $id_odp;
	$hasil['alamat_odp'] = $alamat_odp;	
	$hasil['kd_layanan'] = $kd_layanan;
	$hasil['kelurahan'] = $kelurahan;
	
	//echo$nama_user;
	//echo$alamat_user;
echo json_encode($hasil);	
	//print_r ($id_user);

//echo"$kode_olt$x";
?>
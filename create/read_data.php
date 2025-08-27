<?php
date_default_timezone_set('Asia/Jakarta');
include('../controller/controller_mysqli.php');
if (mysqli_connect_errno()) {
  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
}

$id_user = $_POST['value'];
//echo $id_user;
$query_olt = mysqli_query($koneksi, "SELECT a.* FROM tb_gundala a
WHERE a.kode_user='$id_user' 
ORDER BY a.kode_user DESC LIMIT 0,1;");
	$result_olt = mysqli_fetch_assoc($query_olt);
	$type_paket = $result_olt['type_paket'];
	$pembayaran_ikr = $result_olt['pembayaran_ikr'];
	
	$hasil['type_paket'] = $type_paket;
	$hasil['pembayaran_ikr'] = $pembayaran_ikr;
	
	//echo$nama_user;
	//echo$alamat_user;
echo json_encode($hasil);	
	//print_r ($id_user);

//echo"$kode_olt$x";
?>
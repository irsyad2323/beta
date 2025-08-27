<?php
date_default_timezone_set('Asia/Jakarta');
include('../controller/controller_mysqli.php');
if (mysqli_connect_errno()) {
  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
}

$kelurahan = $_POST['value'];
//echo $kode_olt[0];
$query_olt = mysqli_query($koneksi, "SELECT a.* FROM data_kelurahan a
WHERE a.nama_kelurahan='$kelurahan[0]' 
ORDER BY a.nama_kelurahan DESC LIMIT 0,1;");
	$result_olt = mysqli_fetch_assoc($query_olt);
	$id_kel = $result_olt['id_kel'];	
	$id_kec = $result_olt['id_kec'];	
	
	$hasil['id_kel'] = $id_kel.'.'.$id_kec; 
	$hasil['id_kec'] = $id_kec;
	
	
	//echo$nama_user;
	//echo$alamat_user;
echo json_encode($hasil);	
	//print_r ($id_user);

//echo"$kode_olt$x";
?>
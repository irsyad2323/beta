<?php
date_default_timezone_set('Asia/Jakarta');
include('../controller/controller_mysqli.php');
if (mysqli_connect_errno()) {
  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
}

//$kode_olt = $_POST['value'];
$query_olt = mysqli_query($koneksi, "
SELECT a.id_tiang + 1 as id FROM tbl_instalasi_tiang a
ORDER BY a.id_tiang DESC LIMIT 0,1 ;");

	$result_olt = mysqli_fetch_assoc($query_olt);
	 
	//print_r ($id_user);

echo"$kode_olt$x";
?>
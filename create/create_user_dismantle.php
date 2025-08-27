<?php
date_default_timezone_set('Asia/Jakarta');
include('../controller/controller_mysqli.php');
if (mysqli_connect_errno()) {
  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
}

$kode_olt = $_POST['value'];
$query_olt = mysqli_query($koneksi, "SELECT a.*, r.expiration as off, datediff(CURDATE(), r.expiration	) as jumday FROM tb_gundala a , tbl_user_recharges r
WHERE a.kode_user='$kode_olt' 
ORDER BY a.kode_user DESC LIMIT 0,1;");
	$result_olt = mysqli_fetch_assoc($query_olt);
	$nama_user = $result_olt['nama_user'];
	$alamat_user = $result_olt['alamat_user'];
	$telp_user = $result_olt['telp_user'];
	$kd_layanan = $result_olt['kd_layanan'];
	$off = $result_olt['off'];
	$jumday = $result_olt['jumday'];
	
	$hasil['nama_user'] = $nama_user;
	$hasil['alamat_user'] = $alamat_user;
	$hasil['telp_user'] = $telp_user;
	$hasil['kd_layanan'] = $kd_layanan;
	$hasil['off'] = $off;
	$hasil['jumday'] = $jumday;
	//echo$nama_user;
	//echo$alamat_user;
echo json_encode($hasil);	
	//print_r ($id_user);

//echo"$kode_olt$x";
?>
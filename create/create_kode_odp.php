<?php
date_default_timezone_set('Asia/Jakarta');
include('../controller/controller_mysqli.php');
if (mysqli_connect_errno()) {
  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
}

$kode_olt = $_POST['value'];
$query_olt = mysqli_query($koneksi, "
SELECT RIGHT(a.id_odp, 4) + 1 as id FROM tbl_odp a
WHERE a.id_odp like '$kode_olt%%%' 
ORDER BY a.id_odp DESC LIMIT 0,1");
	$result_olt = mysqli_fetch_assoc($query_olt);
	$id_user = $result_olt['id'];
	//echo$id_user;
	if(strlen($id_user) < 4){
		$a = strlen((string)$id_user);
		if($a == 1){
			$x = '000'.$id_user;
		}else if($a == 2){
			$x = '00'.$id_user;
		}else if($a == 3){
			$x = '0'.$id_user;
		}else{
			$x = $id_user;
		}
	}else{
		$x = $id_user;
	} 
	//print_r ($id_user);

echo"$kode_olt$x";
?>
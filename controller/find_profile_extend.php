<?php
$host       = "117.103.69.22";
$user       = "kocak";
$password   = "gaming";
$database   = "billkapten";
$koneksi_daf  = mysqli_connect($host, $user, $password, $database);
//$sql_profile = "SELECT tb_gundala.* FROM tb_gundala g, request_extend r where g.kode_user = r.kode_user and r.";
/* if($kode_layanan == 'pas'){
	$sql_profile = "SELECT C.* FROM tb_gundala C
				LEFT JOIN (SELECT r.* FROM request_extend r WHERE r.status_request = 'waiting') AS A ON C.kode_user = A.kode_user 
				WHERE A.kode_user IS NULL AND C.kd_layanan = 'pas' AND C.status_log = 'y';";
}else{
	$sql_profile = "SELECT C.* FROM tb_gundala C
				LEFT JOIN (SELECT r.* FROM request_extend r WHERE r.status_request = 'waiting') AS A ON C.kode_user = A.kode_user 
				WHERE A.kode_user IS NULL AND C.kd_layanan = 'mlg' AND C.status_log = 'y';";

} */
/*				
$result_profile= mysqli_query($koneksi,$sql_profile);								
$json_profile = array();
while($row_profile = mysqli_fetch_assoc($result_profile)){
	$json_profile[] = $row_profile;
} */
	//echo ($_GET['searchTerm']); die();
    if(!isset($_GET['searchTerm'])){ 
        $json = [];
    }else{
        $search = $_GET['searchTerm'];
		//echo ($search); die();
			$sql_profile = "SELECT C.kode_user, C.telp_user, C.nama_user, LEFT(C.alamat_user , 10) as alamat_userx FROM tb_gundala C
							WHERE  C.nama_user LIKE '%".$search."%' or C.kode_user LIKE '%".$search."%' or
														C.alamat_user LIKE '%".$search."%' or
														C.telp_user LIKE '%".$search."%'
														LIMIT 10;";
			/* $sql_profile = "SELECT C.kode_user, C.nama_user, C.alamat_user FROM tb_gundala C
							LEFT JOIN (SELECT r.* FROM request_extend r 
									WHERE r.status_request = 'waiting') AS A ON C.kode_user = A.kode_user 
							WHERE A.kode_user IS NULL AND C.kd_layanan = 'pas' AND C.status_log != 'n' AND (C.nama_user LIKE '%".$search."%' or C.kode_user LIKE '%".$search."%' or
							C.alamat_user LIKE '%".$search."%')
							LIMIT 10;";
		
			$sql_profile = "SELECT C.kode_user, C.nama_user, C.alamat_user FROM tb_gundala C
							LEFT JOIN (SELECT r.* FROM request_extend r 
									WHERE r.status_request = 'waiting') AS A ON C.kode_user = A.kode_user 
							WHERE A.kode_user IS NULL AND C.kd_layanan = 'mlg' AND C.status_log != 'n' AND (C.nama_user LIKE '%".$search."%' or C.kode_user LIKE '%".$search."%' or
							C.alamat_user LIKE '%".$search."%')
							LIMIT 10;"; */

		
      /*   $sql = "SELECT posts.id, posts.title FROM posts 
                WHERE title LIKE '%".$search."%'
                LIMIT 10"; 
        $result = $mysqli->query($sql); */
		$result_profile= mysqli_query($koneksi_daf,$sql_profile);
        $json = [];
        //while($row = $result->fetch_assoc()){
		while($row = mysqli_fetch_assoc($result_profile)){
			//echo ($row['kode_user']);
            $json[] = ['id'=>$row['kode_user'], 'text'=>$row['kode_user'].'-'.$row['nama_user'].'-'.$row['alamat_userx'].'-'.$row['telp_user']];
        }
    }

    echo json_encode($json);
?>
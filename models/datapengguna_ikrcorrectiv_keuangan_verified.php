<?php
session_start();
$level_user = $_SESSION["level_user"];
$kota = $_SESSION["level_kantor"];


include('../controller/controller.php');

// $query = mysqli_query($conn, 'SELECT * FROM pengguna');
$acces_user_log = $_SESSION["username"];
if ($level_user == "ikr") {
	$query = "SELECT * FROM tbl_fal_correctiv WHERE jenis_wo='INSTALASI_CORRECTIV' and status_wo='Belum Terpasang' and pic_ikr='".$acces_user_log."' ORDER BY key_fal DESC ";
	} else if ($level_user == "Admin") {
	$query = "SELECT (b.harga - a.total_diskon) as total,a.*,b.harga 
FROM tbl_fal_correctiv a
INNER JOIN price_harga b
        ON a.paket_fal = b.paket
WHERE kd_layanan like '".$kota."' and status_wo='Sudah Terpasang' and jenis_wo='INSTALASI_CORRECTIV' 
ORDER BY key_fal DESC";
	} 
	else if ($level_user == "kapten") {
		$query = "SELECT (b.harga - a.total_diskon) as total,a.*,b.harga 
FROM tbl_fal_correctiv a
INNER JOIN price_harga b
        ON a.paket_fal = b.paket
WHERE kd_layanan like '".$kota."' and status_wo='Sudah Terpasang' and jenis_wo='INSTALASI_CORRECTIV' 
ORDER BY key_fal DESC";
	}
	else if ($level_user == "ts") {
		$query = "SELECT (b.harga - a.total_diskon) as total,a.*,b.harga 
FROM tbl_fal_correctiv a
INNER JOIN price_harga b
        ON a.paket_fal = b.paket
WHERE kd_layanan like '".$kota."' and status_wo='Sudah Terpasang' and jenis_wo='INSTALASI_CORRECTIV' 
ORDER BY key_fal DESC ";
	}
	else if ($level_user == "adminwo_fulus") {
		$query = "SELECT (a.total_modem * 200000) as total_mdm, (a.kabel1 * 6000) total_kbl, ( a.total_modem * 200000 + a.kabel1 * 6000) - a.total_diskon as total_last ,a.*
FROM tbl_fal_correctiv a
WHERE kd_layanan like '".$kota."' and status_wo='Sudah Terpasang' and jenis_wo='INSTALASI_CORRECTIV' and verified='verified' ";
	}
//$query = "SELECT * FROM tbl_fal ";

$statement = $conn->prepare($query);

$statement->execute();

$data = $statement->fetchAll();

//print_r($data);
// while ($row = mysqli_fetch_assoc($query)) {
// 	$data[] = $row;
// }
// $datay= SELECT JSON_ARRAY(array($data)) as 'data';

$i=0;
$no=1;
foreach($data as $dataz){

	$data[$i]['no']=$no;
	$data[$i]['action']='<div class="btn-group">	 
							<button type="button" name="edit" id="'.$data[$i]["username_fal"].'" class="btn btn-info btn-sm mr-2 editpengguna">Edit</button>
							
						</div>';
						
	if($data[$i]['status_wo'] == 'Sudah Terpasang'){
	$data[$i]['type_status'] = '<small class="badge badge-success">'. strtoupper($data[$i]['status_wo']).'</small>';
    }elseif($data[$i]['status_wo'] == 'Belum Terpasang'){
		$data[$i]['type_status'] = '<small class="badge badge-danger">'. strtoupper($data[$i]['status_wo']).'</small>';
	}else{
		$data[$i]['type_status'] = $data[$i]['status_wo'];
	}
	
	if($data[$i]['verified'] == 'verified'){
	$data[$i]['type_verified'] = '<small class="badge badge-success">'. strtoupper($data[$i]['verified']).'</small>';
    }elseif($data[$i]['verified'] == 'not_verified'){
		$data[$i]['type_verified'] = '<small class="badge badge-danger">'. strtoupper($data[$i]['verified']).'</small>';
	}else{
		$data[$i]['type_verified'] = $data[$i]['verified'];
	}
	
	if($data[$i]['status_angsuran'] == 'Sudah Lunas'){
	$data[$i]['status_angs'] = '<small class="badge badge-success">'. strtoupper($data[$i]['status_angsuran']).'</small>';
    }elseif($data[$i]['status_angsuran'] == 'Belum Lunas'){
		$data[$i]['status_angs'] = '<small class="badge badge-danger">'. strtoupper($data[$i]['status_angsuran']).'</small>';
	}else{
		$data[$i]['status_angs'] = $data[$i]['status_angsuran'];
	}
	
	
	//$data[$i]['total'] = '<small class="badge badge-success">'. strtoupper($data[$i]['total']).'</small>';
    
	
	$i++;
	$no++;
}



$datax = array('data' => $data);


//print_r($datax);
echo json_encode($datax);
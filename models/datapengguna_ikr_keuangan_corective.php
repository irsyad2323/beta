<?php
session_start();
$level_user = $_SESSION["level_user"];
$kota = $_SESSION["level_kantor"];


include('../controller/controller.php');

// $query = mysqli_query($conn, 'SELECT * FROM pengguna');
$acces_user_log = $_SESSION["username"];
if ($level_user == "adminwo_fulus") {
		$query = "SELECT (a.total_modem * 200000) as total_mdm, (a.kabel1 * 6000) total_kbl, ( a.total_modem * 200000 + a.kabel1 * 6000) - a.total_diskon as total_last ,a.*
FROM tbl_fal_correctiv a
WHERE kd_layanan like '".$kota."' and status_wo='Sudah Terpasang' and jenis_wo='INSTALASI_CORRECTIV' and verified='not_verified'";
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
							<button type="button" name="edit" 
							key_fal="'.$data[$i]["key_fal"].'"  
							username_fal="'.$data[$i]["username_fal"].'"  
							tanggal_instalasi="'.$data[$i]["tanggal_instalasi"].'"  
							paket_fal="'.$data[$i]["paket_fal"].'"  
							pic="'.$data[$i]["pic"].'"  
							pic2="'.$data[$i]["pic2"].'"  
							pembayaran="'.$data[$i]["pembayaran"].'"  
							perlakuan="'.$data[$i]["perlakuan"].'"  
							total_diskon="'.$data[$i]["total_diskon"].'"  
							angsuran1="'.$data[$i]["angsuran1"].'"  
							angsuran2="'.$data[$i]["angsuran2"].'"  
							verif1="'.$data[$i]["verif1"].'"  
							verif2="'.$data[$i]["verif2"].'"  
							total_last="'.$data[$i]["total_last"].'"  
							total_kbl="'.$data[$i]["total_kbl"].'"  
							total_mdm="'.$data[$i]["total_mdm"].'"  
							log_user_verified="'.$data[$i]["log_user_verified"].'"  
							tgl_verified="'.$data[$i]["tgl_verified"].'"  
							type_verified="'.$data[$i]["type_verified"].'"  
							status_angsuran="'.$data[$i]["status_angsuran"].'"  
							verified="'.$data[$i]["verified"].'"  
							class="btn btn-info btn-sm mr-2 edit_data">Edit</button>
							
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
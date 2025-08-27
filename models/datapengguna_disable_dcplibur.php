<?php
session_start();
$level_user = $_SESSION["level_user"];
$kota = $_SESSION["level_kantor"];


include('../controller/controller.php');

// $query = mysqli_query($conn, 'SELECT * FROM pengguna');
$acces_user_log = $_SESSION["username"];
if ($level_user == "ikr") {
	$query = "SELECT * FROM tbl_fal WHERE jenis_wo='INSTALASI' and status_wo='Belum Terpasang' and pic_ikr='".$acces_user_log."' ORDER BY key_fal DESC ";
	} else if ($level_user == "kapten") {
		$query = "SELECT * FROM tbl_disable_noconfirm WHERE kd_layanan like '".$kota."' and kategori_pelanggan in ('Libur', 'Libur + Modem Diambil') ORDER BY key_fal DESC";
	}
	else if ($level_user == "ts") {
		$query = "SELECT * FROM tbl_disable_noconfirm WHERE kd_layanan like '".$kota."' and kategori_pelanggan='Libur' ORDER BY key_fal DESC";
	}
	else if ($level_user == "psg_dcp") {
		$query = "SELECT * FROM tbl_disable_noconfirm WHERE kd_layanan like '".$kota."' and kategori_pelanggan='Libur' and pic_ikr='".$acces_user_log."' ORDER BY key_fal DESC ";
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
						
	$data[$i]['action_edit']='<div class="btn-group">	 
							<button type="button" name="edit" 
							key_fal="'.$data[$i]["key_fal"].'" name="edit" 
							key_fal="'.$data[$i]["key_fal"].'"
							nama_fal="'.$data[$i]["nama_fal"].'"
							alamat_fal="'.$data[$i]["alamat_fal"].'"
							tlp_fal="'.$data[$i]["tlp_fal"].'"
							username_fal="'.$data[$i]["username_fal"].'"							
							kd_layanan="'.$data[$i]["kd_layanan"].'"
							class="btn btn-info btn-sm mr-2 editbyrequest">Edit</button>						
													
						</div>';
						
	/* $data[$i]['action']='<div class="btn-group">	 
							<button type="button" name="edit" 
							username_fal="'.$data[$i]["username_fal"].'" name="edit" 
							lain_lain="'.$data[$i]["lain_lain"].'"
							kategori_pelanggan="'.$data[$i]["kategori_pelanggan"].'"
							class="btn btn-info btn-sm mr-2 editbyrequest">Edit</button>						
													
						</div>'; */
						
	//$data[$i]['status_pelanggan']='<span class="badge badge-success">'.$data[$i]["status_wo"].'</span>';
	
	if($data[$i]['status_wo'] == 'Sudah Terpasang'){
	$data[$i]['type_status'] = '<small class="badge badge-success">'. strtoupper($data[$i]['status_wo']).'</small>';
    }elseif($data[$i]['status_wo'] == 'Belum Terpasang'){
		$data[$i]['type_status'] = '<small class="badge badge-danger">'. strtoupper($data[$i]['status_wo']).'</small>';
	}else{
		$data[$i]['type_status'] = $data[$i]['status_wo'];
	}
						
	$i++;
	$no++;
}



$datax = array('data' => $data);


//print_r($datax);
echo json_encode($datax);
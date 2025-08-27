<?php
session_start();
$level_user = $_SESSION["level_user"];



include('../controller/controller.php');

// $query = mysqli_query($conn, 'SELECT * FROM pengguna');
$acces_user_log = $_SESSION["username"];
if ($level_user == "ikr") {
	$query = "SELECT * FROM tbl_odp WHERE produk='Kapten Naratel' and status_wo='Sudah Terpasang' ORDER BY key_fal DESC";
	} else if ($level_user == "Admin") {
	$query = "SELECT * FROM tbl_odp WHERE produk='Kapten Naratel' and status_wo='Sudah Terpasang' ORDER BY key_fal DESC";
	} 
	else if ($level_user == "kapten") {
		$query = "SELECT * FROM tbl_odp WHERE status_wo='Sudah Terpasang';";
	}
	else if ($level_user == "ts") {
		$query = "SELECT * FROM tbl_odp WHERE produk='Kapten Naratel' and status_wo='Sudah Terpasang' ORDER BY key_fal DESC";
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
	$data[$i]['maps']='<a href="https://www.google.com/maps/search/?api=1&query='.$data[$i]["latitude"].','.$data[$i]["longitude"].'" target="_blank" class="btn btn-sm btn-primary shadow-sm">

                                <i class="fas fa-download fa-sm text-white-50"></i> MAPS 

                            </a> 
							';
						
	//$data[$i]['maps2']='https://www.google.com/maps/search/?api=1&query='.$data[$i]["latitude"].','.$data[$i]["longitude"].'';
	//$data[$i]['maps']=$data[$i]['latitude'];
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
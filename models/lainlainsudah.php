<?php
session_start();
$level_user = $_SESSION["level_user"];
$kota = $_SESSION["level_kantor"];



include('../controller/controller.php');

// $query = mysqli_query($conn, 'SELECT * FROM pengguna');
$acces_user_log = $_SESSION["username"];

		$query = "SELECT * FROM tbl_lain_lain WHERE kd_layanan='".$kota."' and status_wo='sudah' ORDER BY key_fal DESC";
	
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
	$data[$i]['delete']='<div class="btn-group">	 
							
						 <button type="button" name="delete" id="'.$data[$i]["username_fal"].'" class="btn btn-danger btn-sm deletepengguna">delete</button>
						  
						</div>';
						
	if($data[$i]['status_wo'] == 'sudah'){
	$data[$i]['type_status'] = '<small class="badge badge-success">'. strtoupper($data[$i]['status_wo']).'</small>';
    }elseif($data[$i]['status_wo'] == 'belum'){
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
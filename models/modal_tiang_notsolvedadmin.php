<?php
session_start();
$level_user = $_SESSION["level_user"];
$kota = $_SESSION["level_kantor"];


include('../controller/controller.php');

// $query = mysqli_query($conn, 'SELECT * FROM pengguna');

$query = "SELECT CONCAT(a.provinsi,'.',a.kabkota,'.',a.kecamatan,'.',a.kelurahan,'.',a.id_tiang) as id , a.*, a.id_tiang FROM tbl_instalasi_tiang a WHERE a.kd_layanan='$kota' and a.status='Belum Dikerjakan'";

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
							<button type="button" name="edit" id_tiang="'.$data[$i]["id_tiang"].'" class="btn btn-info btn-sm mr-2 edittiang">Edit</button>
							
						</div>';
						
	$data[$i]['maps']='<a href="https://www.google.com/maps/search/?api=1&query='.$data[$i]["latitude"].','.$data[$i]["longitude"].'" target="_blank" class="btn btn-sm btn-primary shadow-sm">

                                <i class="fas fa-download fa-sm text-white-50"></i> MAPS 

                            </a>'; 
						
	//$data[$i]['status_pelanggan']='<span class="badge badge-success">'.$data[$i]["status_wo"].'</span>';
	
	if($data[$i]['status'] == 'Sudah Dikerjakan'){
	$data[$i]['type_status'] = '<small class="badge badge-success">Sudah Di Verifikasi</small>';
    }elseif($data[$i]['status'] == 'Belum Dikerjakan'){
		$data[$i]['type_status'] = '<small class="badge badge-danger">Belum Di Verifikasi</small>';
	}else{
		$data[$i]['type_status'] = $data[$i]['status'];
	}
						
	$i++;
	$no++;
}



$datax = array('data' => $data);


//print_r($datax);
echo json_encode($datax);
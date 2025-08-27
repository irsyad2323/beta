<?php
session_start();
$level_user = $_SESSION["level_user"];



include('../controller/controller.php');

// $query = mysqli_query($conn, 'SELECT * FROM pengguna');
$acces_user_log = $_SESSION["username"];
/* if ($level_user == "ikr") {
	$query = "SELECT * FROM tbl_fal WHERE status_wo='Belum Terpasang' and pic_ikr='".$acces_user_log."' ORDER BY key_fal DESC ";
	} else if ($level_user == "Admin") {
	$query = "SELECT * FROM tbl_fal ORDER BY key_fal DESC";
	} else if ($level_user == "ts") {
		$query = "SELECT * FROM tbl_fal WHERE tanggal_instalasi = CURDATE() ORDER BY key_fal DESC ";
	}*/
$query = "SELECT * FROM tbl_fal WHERE jenis_wo ='INSTALASI_ODP'";

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
	$i++;
	$no++;
}



$datax = array('data' => $data);


//print_r($datax);
echo json_encode($datax);
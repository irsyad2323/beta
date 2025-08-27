<?php
session_start();
$kota = $_SESSION["depart"];
include('../control/koneksi.php');

if(isset($_POST['mulai']) && isset($_POST['akhir'])){
	$awal = $_POST['mulai'];
	$akhir = $_POST['akhir'];
}else{
	// Tanggal awal bulan ini
    $awal = date("Y-m-d");
    // Tanggal hari ini
    $akhir = date("Y-m-d");
}
//echo ($awal.$akhir); die();

$sql_count = "SELECT 
    `pic_ikr`, 
    COUNT(`pic_ikr`) AS entry 
FROM 
    tbl_odp
WHERE 
    `pic_ikr` IS NOT NULL AND `pic_ikr` != '' and status_wo = 'Sudah Terpasang' and tanggal_instalasi BETWEEN '".$awal."' AND '".$akhir."'
GROUP BY 
    `pic_ikr` 
ORDER BY 
    entry DESC ; 
";

$query = mysqli_query($koneksi, $sql_count) or die("database error:". mysqli_error($conn));
$data = array();
while($r = mysqli_fetch_assoc($query)) {
	$data[] = $r;
}
$i=0;
$urutan = 1;
foreach ($data as $key) {	
	$data[$i]['urutan'] = $urutan; //$data[$i]['button'] = '<button type="button" user_id ="'.$data[$i]['id_log'].'" kode_user ="'.$data[$i]['kode_user'].'" class="btn btn-info btn-flat detail_profile" ><i class="fa fa-search"></i></button>';
	if($data[$i]['entry'] >= '100'){
		$data[$i]['alert_nya'] = '<span class="badge bg-red">'.$data[$i]['entry'].'</span>';
	}else{
		$data[$i]['alert_nya'] = '<span class="badge bg-yellow">'.$data[$i]['entry'].'</span>';
	}
	$i++;
	$urutan++;
}
$datax = array('data' => $data);
echo json_encode($datax);
?>

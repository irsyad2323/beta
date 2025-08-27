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
    pic_ikr as user,
    SUM(tot_ikr + tot_mntn + tot_mntn_odp + tot_ins_odp + tot_ins_dis) AS total
FROM (
    SELECT pic_ikr ,COUNT(*) AS tot_ikr, 0 AS tot_mntn, 0 as tot_mntn_odp, 0 as tot_ins_odp, 0 as tot_ins_dis
    FROM tbl_fal 
    WHERE status_wo = 'Sudah Terpasang' and tgl_ins_datetime BETWEEN '".$awal." 00:00:00' AND '".$akhir." 23:59:59' GROUP BY pic_ikr

    UNION ALL

    SELECT pic_ikr AS pic_ikr, 0 AS tot_ikr, COUNT(*) as tot_mntn, 0 as tot_mntn_odp, 0 as tot_ins_odp, 0 as tot_ins_dis
    FROM tbl_maintenance 
    WHERE status_wo = 'Sudah Terpasang' and tgl_ins_datetime BETWEEN '".$awal." 00:00:00' AND '".$akhir." 23:59:59' GROUP BY pic_ikr

    UNION ALL

    SELECT pic_ikr AS pic_ikr, 0 AS tot_ikr, 0 AS tot_mntn, COUNT(*) as tot_mntn_odp, 0 as tot_ins_odp, 0 as tot_ins_dis
    FROM tbl_maintenance_odp 
    WHERE status_wo = 'Sudah Terpasang' and tgl_solved BETWEEN '".$awal." 00:00:00' AND '".$akhir." 23:59:59' GROUP BY pic_ikr

    UNION ALL

    SELECT pic_ikr AS pic_ikr, 0 AS tot_ikr, 0 AS tot_mntn, 0 as tot_mntn_odp, COUNT(*) as tot_ins_odp, 0 as tot_ins_dis
    FROM tbl_odp 
    WHERE status_wo = 'Sudah Terpasang' and tanggal_instalasi BETWEEN '".$awal."' AND '".$akhir."' GROUP BY pic_ikr

    UNION ALL

    SELECT pic_ikr AS pic_ikr, 0 AS tot_ikr, 0 AS tot_mntn, 0 as tot_mntn_odp, 0 as tot_ins_odp, COUNT(*) as tot_ins_dis
    FROM tbl_distribusi 
    WHERE status_wo = 'Sudah Terpasang' and tanggal_instalasi BETWEEN '".$awal."' AND '".$akhir."' GROUP BY pic_ikr

) AS combined_logs where `pic_ikr` IS NOT NULL AND `pic_ikr` != '' AND `pic_ikr` != '-'
GROUP BY pic_ikr ORDER BY total DESC; 
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
	if($data[$i]['total'] >= '100'){
		$data[$i]['alert_nya'] = '<span class="badge bg-red">'.$data[$i]['total'].'</span>';
	}else{
		$data[$i]['alert_nya'] = '<span class="badge bg-yellow">'.$data[$i]['total'].'</span>';
	}
	$i++;
	$urutan++;
}
$datax = array('data' => $data);
echo json_encode($datax);
?>

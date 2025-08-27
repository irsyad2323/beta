<?php
$date_mulai = $_POST['formattedStartDate'];
$date_akhir = $_POST['formattedEndDate'];
//$date_mulai = Date('Y-m-d',strtotime($_POST['month_select'].'-01'));
$layanan = $_POST['kd_layanan'];
//echo ($layanan);
$start['start_tgl'] = $date_mulai;
$end['end_tgl'] = $date_akhir;
//$kd_layanan['layanan'] = $layanan;
$result = array_merge($start,$end);
echo json_encode($result);
?>
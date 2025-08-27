<?php
$date_akhir = date("Y-m-t", strtotime($_POST['month_select']));
$date_mulai = Date('Y-m-d',strtotime($_POST['month_select'].'-01'));
$start['start_tgl'] = $date_mulai;
$end['end_tgl'] = $date_akhir;
$result = array_merge($start,$end);
echo json_encode($result);
?>
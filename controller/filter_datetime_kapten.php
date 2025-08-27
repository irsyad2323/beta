<?php
$start['start_tgl'] = $_POST['start_tgl'];
$end['end_tgl'] = $_POST['end_tgl'];
$result = array_merge($start,$end);
echo json_encode($result);
?>
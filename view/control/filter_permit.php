<?php
$filter_status = $_POST['filter_status'];
$start['status'] = $filter_status;
$result = array_merge($start);
echo json_encode($result);
?>
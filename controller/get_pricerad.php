<?php
include "koneksi.php";
$core = $_POST['name_plan'];
//print_r($core);
function get_percentage($total, $number)
{
  if ( $total > 0 ) {
   return round(($number / 100) * $total, 0);
  } else {
    return 0;
  }
}
$result_data = array();
$query = "SELECT a.*, b.* FROM radusergroup a , radprice b WHERE a.groupname = b.groupname AND a.username = '".$core."' and b.status='y';;";
$exe = mysqli_query($koneksi,$query);
$result =  mysqli_fetch_assoc($exe);
//echo$query;
$result_data['price'] =  round((float)$result['price']) + get_percentage($result['price'],11);
$result_data['harga_non_ppn'] = $result['price'];
echo json_encode($result_data);
?>
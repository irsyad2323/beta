<?php
$curl = curl_init();
$token = "93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL";
$page = "";
$limit = "10";
$message_id = "";
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        "Authorization: $token",
    )
);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL,  "https://eu.wablas.com/api/report-realtime?page=$page&message_id=$message_id&limit=$limit");
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

$result = curl_exec($curl);
curl_close($curl);
//echo "<pre>";
//print_r($result);
/* $i=0;
$urutan = 1;
foreach ($result as $key) {
	$i++;
	$urutan++;
} */
//$datax = array('data' => $result);
$datax = json_decode($result, true);
echo json_encode($datax);


?>

<table>
    <?php
	$i=0;
	$urutan = 1;
    foreach( $datax['data'] as $row )
    {	$i++;
	    $urutan++;
		$date = $row['date'];
		echo $date;
        ?>
        <tr>
            <td><?php echo $urutan; ?></td>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['from']; ?></td>
            <td><?php echo $row['to']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td>a<?php echo date_format($date,"Y-m-d H:i:s") ?></td>
			
            
        </tr>
        <?php
    }
    ?>
</table>
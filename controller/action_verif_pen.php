<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
	$mgm = $_POST['mgm'];
	$status = 'y';
	if($mgm == 'reguler'){
		$query_kol = 'tb_daf';
	}elseif($mgm == 'mgm'){
		$query_kol = 'tb_mgm';
	}
    $key_fal = $_POST['key_fal'];
    $userid_app = $_POST['userid_app'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];

    //echo $userid_app;
    include('controller_mysqli.php');

    if ($conn_new->connect_error) {
        die("Connection failed: " . $conn_new->connect_error);
    }

    // Query untuk mengupdate data
    $stmt = $conn_new->prepare("UPDATE $query_kol SET stts_ver = ? WHERE key_fal = ?");
    $stmt->bind_param("si", $status, $key_fal);
    $response = ['success' => false];

    if ($stmt->execute()) {
        $response['success'] = true;
        
        // Send notification API
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.prod.sparkpay.id/v1/notifications/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                //'image'=> new CURLFILE('/C:/Users/Nur Aria Hibnastiar/Downloads/logo_1043dbcdca0be6f8.png'),
                'user_id' => $userid_app,
                'categori_id' => '1',
                'channel_id' => '3',
                'template_id' => '11',
                'data' => '{
    "customer_name" : "' . $nama_lengkap . '",
    "customer_alamat" : "' . $alamat . '"
}',
                'in_app' => 'true',
                'data_deeplink' => '{
  "conversation_id": "1"
}'
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer aria@theoutliers27'
            ),
        ));
        
        $api_response = curl_exec($curl);
        curl_close($curl);
       // print_r($api_response);
        $response['api_response'] = json_decode($api_response, true);
    }

    $stmt->close();
    $conn_new->close();

    echo json_encode($response);
}
?>



<?php
//$ppn = round(($key['nominal'] * 0.11),0); 		
$hp = '6282228550709';
//$hp = $key['telp_user'];
$url = "https://evolution.naratel.net.id/message/sendMedia/Naratel_Billing";
$curl = curl_init($url);

$headers = array(
				"Content-Type: application/json",
				"apikey: lr6sla6ippubxpmsvpcna",
			);

$data = array(
						"number" => $hp,
						"options" => array(
							"delay" => 1200,
							"presence" => "composing"
						),
						"mediaMessage" => array(
								"mediatype" => "image",
								"fileName" => "evolution-api.jpg",
								"caption" => "This is an example image document file sent by Evolution-API via URL.",
								"media" => "https://wo.naraya.co.id/img/soni.jpg"
							)
					);


		$data_json = json_encode($data);
		
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($curl);
		curl_close($curl);
		echo "<pre>";
		print_r($result);
?>
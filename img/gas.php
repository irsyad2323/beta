<?php
$curl = curl_init();
//$token = "mHD2D84xlNdJQizmUv8tkoVFYX6IGMgl6NF6oJG2ibn0hdQL1VSDDYSHTguYgRBO";
$token = "MVmxDwqUhhxwAYXIXF6EKGxXavlGe2NgRMzgTHSGohsaVTF1UacpR1IW4gPAnXfb";
//$phone = '082228550709';
$pesan = 'tester';

$data = [
								'phone' => $phone,
								'message' => $pesan,
								'url_link' => 'https://wablas.com',
								];
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        "Authorization: $token",
    )
);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_URL,  "https://eu.wablas.com/api/send-message");
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($curl);
curl_close($curl);
echo "<pre>";
print_r($result);
 
/* $curl = curl_init();
//$token = "AvmINviH4gsQl1hycrH2ZzmMZtsNrlp1cL0mIY8SotK1fGlXZr7x8SMe6Gvu6g4E";
$data = [
	'phone' => '082228550709',
    'title' => 'Dear Sobat Kapten,',
    'template_type' => 'text',
    'message' => 'Dear Sobat Kapten,

Mohon bantuannya untuk mengisi link survei https://bit.ly/kaptennaratel. Partisipasi Sobat Kapten sangat membantu kami dalam meningkatkan kualitas layanan internet. Terima kasih🙏


Salam,
Unit Jaminan Mutu Kapten',
    'url_display' => 'wablas.com',
    'url_link' => 'https://wablas.com',
    'contact_display' => 'contact us',
    'contact_diplay' => '6281218xxxxxx',
    'reply1' => 'reply 1',
    'reply2' => 'reply 2',
    'reply3' => 'reply 3',
];

$curl = curl_init();
$token = "uvCDOH6WvVKuaazBYx3lwBVfMXDt5nOWw72mQ5oSfmxzSUAS8a4ALlxCcuuUJulc";
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        "Authorization: $token",
    )
);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curl, CURLOPT_URL,  "https://eu.wablas.com/api/send-template-from-local");
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$result = curl_exec($curl);
curl_close($curl);
echo "<pre>";
print_r($result);  */
/* 
$phone = '082228550709';
$pesan = 'PROMO SPESIAL 78th KEMERDEKAAN🇮🇩🇮🇩

PROMO MERDEKA!!! 🇮🇩

Halloo sobat KAPTEN NARATEL ....

Spesial untuk yang daftar di tanggal 17 Agustus 2023  ada diskon biaya instalasi. dari Rp *200rb> * cukup bayar  👉🏼*17 rb  * 
saja lohh..

Tunggu apalagi?⁣⁣
Yuk, langsung daftar dan nikmati paket-paket internet sesuai kebutuhanmu!⁣⁣

▪️Biaya pasang awal ( biaya langganan + biaya instalasi ) :

- 5 Mbps: 120.000 + 17.000 = 137.000

- 10 Mbps = 175.000+ 17.000 = 192.000

- 15 Mbps = 235.000 + 17.000 = 252.000

- 20 Mbps = 325.000 + 17.000 = 342.000

NOTE : 
✅ HARGA DIATAS SUDAH TERMASUK PPN! 
✅ HARGA FLAT
✅ *gak pake SYARAT & KETENTUAN2  an *

Promo terbatas hanya untuk besok tanggal 17 Agustus 2023 ya ...

Ndang sat set langganan sekarang juga!✨

Info lebih lanjut hubungi WA :0882 1202 2222';

$fields_updown_mlg = array(
				   'number' => $phone,
				   'message' => $pesan,           
					);
					$fields_string = http_build_query($fields_updown_mlg);
					$curl_mlg_updown = curl_init();
					curl_setopt_array($curl_mlg_updown, array(
						CURLOPT_PORT => "1978",
						CURLOPT_URL => "http://117.103.68.230:1978/send_message",
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => "",
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 30,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => "POST",
						CURLOPT_POSTFIELDS => $fields_string,
						CURLOPT_HTTPHEADER => array(
							"cache-control: no-cache",
							"content-type: application/x-www-form-urlencoded",
							"postman-token: 5077e65c-6c01-2872-aa59-d7791f194bef"
						),
					));
					
					$response = curl_exec($curl_mlg_updown);
					$err = curl_error($curl_mlg_updown);
					curl_close($curl_mlg_updown);
					if ($err) {
						//echo "cURL Error #:" . $err;
					} else {} */
		
/* $curl = curl_init();
$token = "OKguQvywltMerXQkValMCeR29rzmo897aEAivh7yP0GbVbIy37jaJBfehSWpCYRM ";
$payload = [
    "data" => [
        [
            'phone' => '082228550709',
            'message'=> [
                'title' => [
                    'type' => 'text',
                    'content' => 'Dear Sobat Kapten,
					',
                ],
                'buttons' => [
                    'url' => [
                        'display' => 'https://bit.ly/kaptennaratel',
                        'link' => 'https://bit.ly/kaptennaratel',
                    ],
                ],
                'content' => '
				
				Mohon bantuannya untuk mengisi link survei yang ada di tombol bawah. Partisipasi Sobat Kapten sangat membantu kami dalam meningkatkan kualitas layanan internet. Terima kasih🙏
				
				',
                'footer' => 'Salam,
*Unit Jaminan Mutu Kapten*',
            ],
        ]
    ]
];
curl_setopt($curl, CURLOPT_HTTPHEADER,
    array(
        "Authorization: $token",
        "Content-Type: application/json"
    )
);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload) );
curl_setopt($curl, CURLOPT_URL,  "https://eu.wablas.com/api/v2/send-template");
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

$result = curl_exec($curl);
curl_close($curl);
echo "<pre>";
print_r($result); */

?>



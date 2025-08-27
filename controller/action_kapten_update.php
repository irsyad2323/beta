<?php
include('../controller/controller_mysqli.php');

/*   if (isset($_POST['username_sinden'])){
	  $nama_sinden = $_POST['nama_sinden'];
	  $alamat_sinden = $_POST['alamat_sinden'];
	  $tlp_sinden = $_POST['tlp_sinden'];
	  $paket_sinden = $_POST['paket_sinden'];
	  $tanggal_sinden = $_POST['tanggal_sinden'];
	  $username_sinden = $_POST['username_sinden'];
	  
	  $result = mysqli_query($koneksi,"UPDATE tbl_fal SET nama_fal='$nama_sinden', alamat_fal='$alamat_sinden', tgl_fal='$tanggal_sinden',tlp_fal='$tlp_sinden',paket_fal='$paket_sinden' WHERE username_fal='$username_sinden'");
	  if($result){
		  return 'data update'
	}
  } */
  $nama_fal1= $_POST['nama_fal'];
   function clean($string){
		$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
	}
	
   $nama_fal = clean($nama_fal1);  
   $username_fal=$_POST['username_fal'];
   $status=$_POST['status'];
	$pic = strtok($status, '#');
	$status = substr($status, strpos($status, '#')+1);
   $status2=$_POST['status2'];
	$pic2 = strtok($status2, '#');
	$status2 = substr($status2, strpos($status2, '#')+1);
   $modem=$_POST['modem'];
   $kabel1=$_POST['kabel1'];
   $kabel2=$_POST['kabel2'];
   $kabel3=$_POST['kabel3'];
   $pembayaran=$_POST['pembayaran'];
   $lain_lain=$_POST['lain_lain'];
   $letak_odp=$_POST['letak_odp'];
   $ket = $_POST ['lokasi_kapten'];
   $status_wo = $_POST ['status_wo'];
   $signature = $_POST ['signature'];
   $lokasi_kapten = $_POST ['lokasi_kapten'];   
    $latitude = strtok($lokasi_kapten, '#');
    $longitude = substr($lokasi_kapten, strpos($lokasi_kapten, '#')+1);
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE tbl_fal SET nama_fal='$nama_fal', pic='$pic', pic2='$pic2',status='$status', status2='$status2', modem='$modem',kabel1='$kabel1',kabel2='$kabel2',kabel3='$kabel3',
       tanggal_instalasi= CURRENT_TIMESTAMP(), tgl_ins_datetime= CURRENT_TIMESTAMP(),lain_lain='$lain_lain',  status_wo='$status_wo',ket='$ket', latitude='$latitude',longitude='$longitude',pembayaran='$pembayaran',verified='not_verified',letak_odp='$letak_odp[0]' WHERE username_fal='$username_fal'";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
  
  $curl = curl_init();
$token = "93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL";
$data = [
    'phone' => '120363210179095768',
    'message' => '
Kami Informasikan Bahwa : 

Nama Teknisi :  '.$pic.'
Nama Teknisi 2 :  '.$pic2.'
Jenis Pekerjaan :  IKR
Tanggal Pekerjaan : '.date("d-m-Y").'
ID Pelanggan : '.$username_fal.'
Nama Pelanggan : '.$nama_fal.'
Status : Solved

Bisa dicek melalui website https://wo.naraya.co.id/

Salam 
CS Kapten Naratel',
    'isGroup' => 'true' //its string not boolean
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
print_r($result);
} else {
  echo "Error updating record: " . mysqli_error($koneksi);
}

   

mysqli_close($koneksi);
  
?>	




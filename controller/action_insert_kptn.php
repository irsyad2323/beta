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
  $nama_fal_s= $_POST['nama_fal'];
   function clean($string){
		$string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
	}
	
   $nama_fal = clean($nama_fal_s);
   $kd_layanan=$_POST['kd_layanan'];
   $alamat_fal=$_POST['alamat_fal'];
   $rt=$_POST['rt'];
   $rw=$_POST['rw'];
   $kelurahan = $_POST['kelurahan'];
	$kelurahan2 = strtok($kelurahan, '|');
    $kelurahan3 = substr($kelurahan, strpos($kelurahan, '|')+1);
   $kecamatan=$_POST['kecamatan'];
   $kabupaten=$_POST['kabupaten'];
   $provinsi=$_POST['provinsi'];
   $pic_ikr=$_POST['pic_ikr'];
   $tlp_fal=$_POST['tlp_fal'];   
   $status=$_POST['status'];
   $pic = strtok($status, '#');
    $status = substr($status, strpos($status, '#')+1);

    $status2=$_POST['status2'];
   $pic2 = strtok($status2, '#');
    $status2 = substr($status2, strpos($status2, '#')+1);
   $jenis_wo=$_POST['jenis_wo'];
   $tgl_fal=$_POST['tgl_fal'];
   $produk=$_POST['produk'];
   $modem=$_POST['modem'];
   $kabel1=$_POST['kabel1'];
   $kabel2=$_POST['kabel2'];
   $kabel3=$_POST['kabel3'];  
   //$tgl_fal=date('Y-m-d', strtotime($_POST['tgl_fal']));
   $paket_fal=$_POST['paket_fal']; 
   $username_fal=$_POST['username_fal'];      
   $kategori_maintenance=$_POST['kategori_maintenance'];
   $keterangan_angsuran=$_POST['keterangan_angsuran'];
   $password_fal=$_POST['password_fal'];
   $lain_lain=$_POST['lain_lain'];
   $pembayaran=$_POST['pembayaran'];
   $status_wo=$_POST['status_wo'];
   $foto_dpn_rmh=$_POST['foto_dpn_rmh'];
   $perlakuan=$_POST['perlakuan'];
   $total_diskon=$_POST['total_diskon'];
   $verified=$_POST['verified'];
   $total=$_POST['total'];
   $letak_odp=$_POST['letak_odp'];
   
  
  if (!$koneksi) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO tbl_fal (nama_fal, alamat_fal, tlp_fal, paket_fal, tgl_fal, username_fal, password_fal, lain_lain, kd_layanan, pic_ikr, kelurahan, kecamatan, kabupaten, provinsi, rt, rw, jenis_wo, foto_dpn_rmh, produk, pembayaran, perlakuan, total_diskon, angsuran1, verified, letak_odp) 
	   VALUES ('$nama_fal','$alamat_fal','$tlp_fal','$paket_fal','$tgl_fal','$username_fal','$password_fal','$lain_lain','$kd_layanan','$pic_ikr','$kelurahan2','$kecamatan','$kabupaten','$provinsi[0]','$rt','$rw','INSTALASI','$foto_dpn_rmh','Kapten Naratel','$pembayaran','$perlakuan','$total','$keterangan_angsuran','not_verified','$letak_odp[0]')";


if (mysqli_query($koneksi, $sql)) {
  echo "Record updated successfully";
  $curl = curl_init();
$token = "93XWKl9OGzGuWOftO0ZgOoVOFNEnvjCMz9qI1xZZ6soficXpDjrH3ll1X6obmVIL";
$data = [
    'phone' => '120363209770683259',
    'message' => '
Kami Informasikan Bahwa : 

Nama Teknisi :  '.$pic_ikr.'
Jenis Pekerjaan :  MAINTENANCE
Tanggal Pekerjaan : '.date("d-m-Y").'
ID Pelanggan : '.$username_fal.'
Nama Pelanggan : '.$nama_fal.'
Alamat : '.$alamat_fal.'
NO WA : '.$tlp_fal.'
Status : Visit

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




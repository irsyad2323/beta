<?php



include('controller.php');

$query = "SELECT * FROM tbl_fal WHERE username_fal='".$_POST["id"]."'";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$nama='';
$pic_ikr='';
$alamat='';
$username_Maintenance='';
$telepon='';
$pic='';  
$rt='';
$rw='';  
$kelurahan='';     
$status='';
$status2='';
$tgl_fal='';
$jenis_wo='';
$Spliter='';
$Spliter2='';
$Spliter3='';
$key_fal='';
$produk='';
$modem='';
$kabel1='';
$kabel2='';
$kabel3='';
$paket='';
$tgl='';
$id='';
$pass='';
$lain_lain='';
$status_wo='';
$jenis_wo='';
$kd_layanan='';
$ket='';
foreach($result as $row)
{
    $nama=$row['nama_fal'];
    $pic_ikr=$row['pic_ikr'];
   $alamat=$row['alamat_fal'];
   $Spliter=$row['Spliter'];
   $Spliter2=$row['Spliter2'];
   $Spliter3=$row['Spliter3'];
   $Spliter3=$row['key_fal'];
   $rt=$row['rt'];
   $rw=$row['rw'];
   $kelurahan=$row['kelurahan'];
   $telepon=$row['tlp_fal'];
   $paket=$row['paket_fal'];
   $tgl_fal=$row['tgl_fal'];
   $pic=$row['pic'];
   $status=$row['status']; 
   $jenis_wo=$row['jenis_wo'];
   $produk=$row['produk']; 
   $modem=$row['modem']; 
   $kabel1=$row['kabel1']; 
   $kabel2=$row['kabel2']; 
   $kabel3=$row['kabel3']; 
   $status2=$row['status2']; 
   $id=$row['username_fal'];
   $username_Maintenance=$row['username_Maintenance'];
   $pass=$row['password_fal'];
   $lain_lain=$row['lain_lain'];
   $status_wo=$row['status_wo'];
   $jenis_wo=$row['jenis_wo'];
   $kd_layanan=$row['kd_layanan'];
   $ket=$row['ket'];

}
$output = array(
    'nama_fal'    =>  $nama,
    'pic_ikr'    =>  $pic_ikr,
     'alamat_fal'     =>  $alamat,
     'key_fal'     =>  $key_fal,
     'rt'     =>  $rt,
      'rw'      =>  $rw,
       'kelurahan'     =>  $kelurahan,
       'username_Maintenance'     =>  $username_Maintenance,      
       'Spliter'     =>  $Spliter, 
       'Spliter2'     =>  $Spliter2, 
       'Spliter3'     =>  $Spliter3,   
    'tlp_fal' =>  $telepon,
    'paket_fal'       =>  $paket,
    'tgl_fal'=> $tgl_fal, 
    'pic'=> $pic,
    'status'=> $status, 
    'status2'=> $status2,
    'jenis_wo'=> $jenis_wo,
    'produk'=> $produk,     
    'modem'=> $modem,        
    'kabel1'=> $kabel1,   
    'kabel2'=> $kabel2,   
    'kabel3'=> $kabel3,   
    'username_fal'      =>  $id,
    'password_fal'        =>  $pass,
    'lain_lain'        =>  $lain_lain,
    'status_wo'        =>  $status_wo,
    'jenis_wo'        =>  $jenis_wo,
    'kd_layanan'        =>  $kd_layanan,
    'ket'     =>  $ket,
);
echo json_encode($output);

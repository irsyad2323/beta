<?php



include('controller.php');

$query = "SELECT * FROM tbl_gamas WHERE id='".$_POST["id"]."'";

$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$nama_gangguan='';
$alamat_gangguan='';
$jenis_gamas='';
$keterangan_gangguan='';
$pic_gamas='';
$id='';

foreach($result as $row)
{
    $nama_gangguan=$row['nama_gangguan'];
    $alamat_gangguan=$row['alamat_gangguan'];
   $jenis_gamas=$row['jenis_gamas'];
   $keterangan_gangguan=$row['keterangan_gangguan'];
   $pic_gamas=$row['pic_gamas'];    
   $id=$row['id'];
   

}
$output = array(
    'nama_gangguan'    =>  $nama_gangguan,
    'alamat_gangguan'    =>  $alamat_gangguan,
     'jenis_gamas'     =>  $jenis_gamas,
     'keterangan_gangguan'     =>  $keterangan_gangguan,
     'pic_gamas'     =>  $pic_gamas,       
    'id'      =>  $id,
    
);
echo json_encode($output);

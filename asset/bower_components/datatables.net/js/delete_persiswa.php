<?php
include_once("koneksi.php");
$id_kelas = $_POST['id_kelas'];
mysqli_query($koneksi,"delete from tb_kelas where id_kelas ='$id_kelas'");
$sql = "SELECT b.siswa_nis FROM tb_kelas_siswa a, tb_siswa b WHERE a.nis = b.siswa_nis AND a.id_kelas = '".$id_kelas."'ORDER BY a.nis ASC;";
$query = mysqli_query($koneksi, $sql) or die("database error:". mysqli_error($koneksi));
$data = array();
while($r = mysqli_fetch_assoc($query)) {
	$data[] = $r;
}
foreach ($data as $key => $value) {
	mysqli_query($koneksi,"delete from tb_siswa where tb_siswa.siswa_nis = '".$value['siswa_nis']."'");
}
mysqli_query($koneksi,"delete from tb_kelas_siswa where id_kelas ='$id_kelas'");

if(mysqli_error($koneksi)){
	$result['error']=mysqli_error($conn);
	$result['result']=0;
}else{
	$result['error']='';
	$result['result']=1;
}
echo json_encode($result);
?>
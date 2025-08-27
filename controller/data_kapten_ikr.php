<?php
include "../controller/controller_mysqli.php";
if((isset($_POST['mulai'])) and ((isset($_POST['akhir'])))){
	$date_mulai = $_POST['mulai'];
	$date_akhir = $_POST['akhir'];
}else{
	date_default_timezone_set('Asia/Jakarta');
	$mulai = date('Y-m-d');
	$akhir = date('Y-m-d');
	$date_mulai = $mulai;
	$date_akhir = $akhir;
}
//echo$date_mulai.'#'.$date_akhir;die();

$query = mysqli_query($koneksi,"SELECT * FROM keluhan 
							 WHERE status = 'Solved' and date(tanggal_handle)
							 BETWEEN date('$date_mulai') AND date('$date_akhir');");
$data = array();
while($r = mysqli_fetch_assoc($query)) {
	$data[] = $r;
}
$i=0;
$urutan = 1;
foreach ($data as $key) {
	//$data[$i]['kampret'] = str_replace('m-pppoe-m3v', '-Mbps', $data[$i]['namebp']);
	$data[$i]['targets'] = '<label><input type="checkbox" value ="'.$data[$i]['id'].'" name = "nik" class="minimal"></label>';
	//$data[$i]['update'] = $data[$i]['di_tagih'];
	$data[$i]['action']='<div class="btn-group">	 
							<button type="button" name="edit" 
							id="'.$data[$i]["id"].'" name="edit" 
							id_user="'.$data[$i]["id_user"].'"
							nama_kom="'.$data[$i]["nama_kom"].'"
							tlp_kom="'.$data[$i]["tlp_kom"].'"
							alamat="'.$data[$i]["alamat"].'"							
							keluhan_deskripsi="'.$data[$i]["keluhan_deskripsi"].'"
							kategori_kompline="'.$data[$i]["kategori_kompline"].'"
							handle_kompline="'.$data[$i]["handle_kompline"].'"
							keterangan_solving="'.$data[$i]["keterangan_solving"].'"
							kategori_solving="'.$data[$i]["kategori_solving"].'"
							class="btn btn-info btn-sm mr-2 editdatahandle">Edit</button>						
													
						</div>';
	//$data[$i]['hasil'] = ($data[$i]['price'] * $data[$i]['Total_Month']);
	$data[$i]['urutan'] = $urutan;
	$i++;
	$urutan++;
}
$datax = array('data' => $data);
echo json_encode($datax);
?>
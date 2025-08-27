<?php
session_start();
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

$query = mysqli_query($koneksi," select * from tbl_pengajuan where layanan in ('".$_SESSION["level_kantor"]."') and devisi in ('".$_SESSION["devisi_user"]."') and layanan like 'mlg' ORDER BY date DESC ;");
$data = array();
while($r = mysqli_fetch_assoc($query)) {
	$data[] = $r;
}
$i=0;
$urutan = 1;
foreach ($data as $key) {
	//$data[$i]['kampret'] = str_replace('m-pppoe-m3v', '-Mbps', $data[$i]['namebp']);
	//$data[$i]['targets'] = '<label><input type="checkbox" value ="'.$data[$i]['id'].'" name = "nik" class="minimal"></label>';
	//$data[$i]['update'] = $data[$i]['di_tagih'];
	
	if($data[$i]['status'] == 'belum'){
	$data[$i]['type_status'] = '<small class="badge badge-warning">'. strtoupper($data[$i]['status']).'</small>';
    }elseif($data[$i]['status'] == 'sudah'){
	$data[$i]['type_status'] = '<small class="badge badge-success">'. strtoupper($data[$i]['status']).'</small>';
    }else{
		$data[$i]['type_status'] = $data[$i]['status'];
	}
	
	if($data[$i]['aproved'] == 'n'){
	$data[$i]['type_aproved'] = '<small class="badge badge-warning">Not Approved</small>';
    }elseif($data[$i]['aproved'] == 'y'){
	$data[$i]['type_aproved'] = '<small class="badge badge-success">Approved</small>';
    }else{
		$data[$i]['type_status'] = $data[$i]['status'];
	}
	
	if($data[$i]['status_hasil'] == 'n'){
	$data[$i]['type_hasil'] = '<small class="badge badge-warning">Not Solved</small>';
    }elseif($data[$i]['status_hasil'] == 'y'){
	$data[$i]['type_hasil'] = '<small class="badge badge-success">Solved</small>';
    }else{
		$data[$i]['type_hasil'] = $data[$i]['status_hasil'];
	}
	
	$data[$i]['action']='<!-- div class="btn-group">	 
							<button type="button" name="edit"
							key_fal="'.$data[$i]["key_fal"].'" name="edit" 
							nama_user1="'.$data[$i]["nama_lengkap"].'"
							key_fal="'.$data[$i]["key_fal"].'"
							class="btn btn-info btn-sm mr-2 editfal">Edit</button -->
							
							<div class="dropdown">
							  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								ACTION
							  </button>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a href="../'.$data[$i]["bukti_transfer"].'" class="dropdown-item" target="_blank">Bukti Transfer</a>
								<a href="../'.$data[$i]["file_hasil"].'" class="dropdown-item" target="_blank">Laporan Hasil</a>
								<a key_fal="'.$data[$i]["key_fal"].'" name="edit" class="dropdown-item upload_bukti">Upload Hasil</a>
							  </div>
							</div>
													
						</div>';
	//$data[$i]['hasil'] = ($data[$i]['price'] * $data[$i]['Total_Month']);
	$data[$i]['urutan'] = $urutan;
	$i++;
	$urutan++;
}
$datax = array('data' => $data);
echo json_encode($datax);
?>
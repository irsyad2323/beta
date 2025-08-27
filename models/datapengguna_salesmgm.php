<?php
session_start();
$level_user = $_SESSION["level_user"];
$kota = $_SESSION["level_kantor"];


include('../controller/controller.php');
if((isset($_POST['mulai'])) and ((isset($_POST['akhir'])))){
	$date_akhir = date("Y-m-t", strtotime($_POST['akhir']));
	$date_mulai = Date('Y-m-d',strtotime($_POST['mulai'].'-01'));// date("Y-m-d", strtotime($_POST['month_select']));
}else{
	date_default_timezone_set('Asia/Jakarta');
	$mulai = date('Y').'-'.date('m').'-01';
	$akhir = date('Y-m-t');
	$date_mulai = $mulai;
	$date_akhir = $akhir;
}

		$query = "SELECT a.key_fal,a.adm_tgl_nominal, a.username_fal, a.verified_fls, a.verified_mgm, a.nominal_mgm ,b.nama_sobat, b.no_rekening, b.metode_bayar , b.no_wa_sobat, b.an_rek, b.alamat
FROM tbl_fal a 
JOIN tbl_sobat_mgm b
ON a.nama_sobat COLLATE utf8mb4_unicode_ci = b.nama_sobat COLLATE utf8mb4_unicode_ci
WHERE kd_layanan like '".$kota."' and verif_nominal='y' and status_wo='Sudah Terpasang' and mgm = 'mgm' and verified_mgm = 'y' and date(tgl_fal) BETWEEN date('$date_mulai') AND date('$date_akhir') GROUP BY a.key_fal ;";
	
//$query = "SELECT * FROM tbl_fal ";

$statement = $conn->prepare($query);

$statement->execute();

$data = $statement->fetchAll();

//print_r($data);
// while ($row = mysqli_fetch_assoc($query)) {
// 	$data[] = $row;
// }
// $datay= SELECT JSON_ARRAY(array($data)) as 'data';

$i=0;
$no=1;
foreach($data as $dataz){

	$data[$i]['no']=$no;
	$data[$i]['action']='<div class="btn-group">	 
							<button type="button" name="edit" 
							key_fal="'.$data[$i]["key_fal"].'"  
							username_fal="'.$data[$i]["username_fal"].'"  
							tanggal_instalasi="'.$data[$i]["tanggal_instalasi"].'"  
							paket_fal="'.$data[$i]["paket_fal"].'"  
							pic="'.$data[$i]["pic"].'"  
							pic2="'.$data[$i]["pic2"].'"  
							pembayaran="'.$data[$i]["pembayaran"].'"  
							perlakuan="'.$data[$i]["perlakuan"].'"  
							total_diskon="'.$data[$i]["total_diskon"].'"  
							angsuran1="'.$data[$i]["angsuran1"].'"  
							angsuran2="'.$data[$i]["angsuran2"].'"  
							verif1="'.$data[$i]["verif1"].'"  
							verif2="'.$data[$i]["verif2"].'"  
							total="'.$data[$i]["total"].'"  
							log_user_verified="'.$data[$i]["log_user_verified"].'"  
							tgl_verified="'.$data[$i]["tgl_verified"].'"  
							type_verified="'.$data[$i]["type_verified"].'"  
							status_angsuran="'.$data[$i]["status_angsuran"].'"  
							verified="'.$data[$i]["verified"].'"  
							class="btn btn-info btn-sm mr-2 edit_data">Edit</button>
							
						</div>';
	
	if($data[$i]['verified_fls'] == 'n'){
		$data[$i]['verified_flse'] = '<small class="badge badge-danger">Proses Approved</small>';
	}elseif( $row['verified_fls'] == 'y'){
		$data[$i]['verified_flse'] = '<small class="badge badge-success">Approved</small>';
	}
											
	if( $data[$i]['verified_mgm'] == 'y'){
		$data[$i]['stts_mgm'] = '<small class="badge badge-success">Approved</small>';
	}
	
	$data[$i]['hasil'] = ($data[$i]['nominal_mgm'] * $data[$i]['total']);
	
	
	//$data[$i]['total'] = '<small class="badge badge-success">'. strtoupper($data[$i]['total']).'</small>';
    
	
	$i++;
	$no++;
}



$datax = array('data' => $data);


//print_r($datax);
echo json_encode($datax);
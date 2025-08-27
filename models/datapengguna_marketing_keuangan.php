<?php
session_start();
$level_user = $_SESSION["level_user"];
$kota = $_SESSION["level_kantor"];


include('../controller/controller.php');

// $query = mysqli_query($conn, 'SELECT * FROM pengguna');
$acces_user_log = $_SESSION["username"];
if ($level_user == "adminwo_fulus") {
		$query = "SELECT b.nama_provinsi, c.nama_kabkota, d.nama_kec, e.nama_kel ,a.*, DATE_FORMAT(a.tgl_pekerjaan,'%d-%m-%Y') as waktu, DATE_FORMAT(a.tgl_solved,'%d-%m-%Y') as solvedtgl FROM tbl_marketing a
																		LEFT JOIN tb_provinsi b
																		on a.prov = b.kd_provinsi
																		LEFT JOIN tb_kabkota c
																		on a.kab = c.kd_kabkota
																		LEFT JOIN tb_kecamatan d
																		on a.kec = d.kd_kec
																		LEFT JOIN tb_kelurahan e
																		on a.kel =  e.kd_kel
																		WHERE a.status='Sudah' and a.kab = d.kd_kabkota AND d.kd_kec = e.kd_kec and c.kd_kabkota = e.kd_kabkota and a.layanan like '".$kota."' GROUP BY a.id DESC;";
	}
//$query = "SELECT * FROM tbl_fal ";

$statement = $conn->prepare($query);

$statement->execute();

$data = $statement->fetchAll();

//print_r($data);
// while ($data[$i] = mysqli_fetch_assoc($query)) {
// 	$data[] = $data[$i];
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
						
	if($data[$i]['status'] == 'sudah'){
	$data[$i]['type_status'] = '<small class="badge badge-success">'. strtoupper($data[$i]['status']).'</small>';
    }elseif($data[$i]['status'] == 'belum'){
		$data[$i]['type_status'] = '<small class="badge badge-danger">'. strtoupper($data[$i]['status']).'</small>';
	}else{
		$data[$i]['type_status'] = $data[$i]['status'];
	}
	
	if($data[$i]['verified'] == 'verified'){
	$data[$i]['type_verified'] = '<small class="badge badge-success">'. strtoupper($data[$i]['verified']).'</small>';
    }elseif($data[$i]['verified'] == 'not_verified'){
		$data[$i]['type_verified'] = '<small class="badge badge-danger">'. strtoupper($data[$i]['verified']).'</small>';
	}else{
		$data[$i]['type_verified'] = $data[$i]['verified'];
	}
	
	if($data[$i]['status_angsuran'] == 'Sudah Lunas'){
	$data[$i]['status_angs'] = '<small class="badge badge-success">'. strtoupper($data[$i]['status_angsuran']).'</small>';
    }elseif($data[$i]['status_angsuran'] == 'Belum Lunas'){
		$data[$i]['status_angs'] = '<small class="badge badge-danger">'. strtoupper($data[$i]['status_angsuran']).'</small>';
	}else{
		$data[$i]['status_angs'] = $data[$i]['status_angsuran'];
	}
	
	if($data[$i]['jenis_pekerjaan'] == 'sebar_brosur'){
												if($data[$i]['level'] == 'Karyawan'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($data[$i]['jumlah'] * 0);
													$data[$i]['hasil'] = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($data[$i]['hasil']).'</small>';
												}elseif($data[$i]['level'] == 'Outsourcing'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 300);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($data[$i]['level'] == 'PKL'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($data[$i]['level'] == 'Vendor'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 300);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}elseif($data[$i]['jenis_pekerjaan'] == 'pasang_banner'){
												if($data[$i]['level'] == 'Karyawan'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($data[$i]['level'] == 'Outsourcing'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 5000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($data[$i]['level'] == 'PKL'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($data[$i]['level'] == 'Vendor'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 5000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}elseif($data[$i]['jenis_pekerjaan'] == 'pasang_spanduk'){
												if($data[$i]['level'] == 'Karyawan'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($data[$i]['level'] == 'Outsourcing'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 50000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($data[$i]['level'] == 'PKL'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($data[$i]['level'] == 'Vendor'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 50000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}elseif($data[$i]['jenis_pekerjaan'] == 'open_booth'){
												if($data[$i]['level'] == 'Karyawan'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($data[$i]['level'] == 'Outsourcing'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 70000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($data[$i]['level'] == 'PKL'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($data[$i]['level'] == 'Vendor'){
													$jumlah2  =$data[$i]['jumlah'];
													$total = ($jumlah2 * 70000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$data[$i]['ttl'] = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}
	
	
	//$data[$i]['total'] = '<small class="badge badge-success">'. strtoupper($data[$i]['total']).'</small>';
    
	
	$i++;
	$no++;
}



$datax = array('data' => $data);


//print_r($datax);
echo json_encode($datax);
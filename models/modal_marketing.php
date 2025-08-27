<?php
session_start();
$level_user = $_SESSION["level_user"];
$kota = $_SESSION["level_kantor"];


include('../controller/controller.php');

// $query = mysqli_query($conn, 'SELECT * FROM pengguna');

$query = "SELECT b.nama_provinsi, c.nama_kabkota, d.nama_kec, e.nama_kel ,a.*, DATE_FORMAT(a.tgl_pekerjaan,'%d-%m-%Y') as waktu, DATE_FORMAT(a.tgl_solved,'%d-%m-%Y') as solvedtgl FROM tbl_marketing a
																		LEFT JOIN tb_provinsi b
																		on a.prov = b.kd_provinsi
																		LEFT JOIN tb_kabkota c
																		on a.kab = c.kd_kabkota
																		LEFT JOIN tb_kecamatan d
																		on a.kec = d.kd_kec
																		LEFT JOIN tb_kelurahan e
																		on a.kel =  e.kd_kel
																		WHERE a.verified_fls='not-verified' and a.level in ('Vendor','Outsourcing') and a.status='Sudah' and a.kab = d.kd_kabkota AND d.kd_kec = e.kd_kec and c.kd_kabkota = e.kd_kabkota and a.layanan like '".$kota."' GROUP BY a.id DESC;";

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
	$data[$i]["totalakhir"]= $data[$i]["nominal"] - $data[$i]["diskon"];
	$data[$i]["total"] = "Rp " . number_format($data[$i]["totalakhir"],2,',','.');
	$data[$i]["nmnl"] = "Rp " . number_format($data[$i]["nominal"],2,',','.');
	
	$data[$i]['no']=$no;
	$data[$i]['targets'] = '<label><input type="checkbox" value ="'.$data[$i]['id'].'" name = "id" class="minimal"></label>';
	$data[$i]['action']='<div class="btn-group">	 
							<button type="button" name="edit" data-id="'.$data[$i]["id"].'"
                                              id="'.$data[$i]["id"].'"
                                              nama="'.$data[$i]["nama"].'"
                                              jenis_pekerjaan="'.$data[$i]["jenis_pekerjaan"].'"
                                              nominal="'.$data[$i]["nmnl"].'"
                                              verified="'.$data[$i]["verified"].'"
                                              total="'.$data[$i]["jumlah"].'"
                                              diskon="'.$data[$i]["diskon"].'"
                                              totalakhir="'.$data[$i]["total"].'"
                                              tgl_solved="'.$data[$i]["tgl_solved"].'"
                                              verified_fls="'.$data[$i]["verified_fls"].'" 
                                              no_rek="'.$data[$i]["no_rek"].'" 
                                              ats_rek="'.$data[$i]["ats_rek"].'" 
                                              metode_bayar="'.$data[$i]["metode_bayar"].'" 
											  class="btn btn-info btn-sm mr-2 editverifiedmar">Edit</button>
						</div>';
						
	$data[$i]['maps']='<a href="https://www.google.com/maps/search/?api=1&query='.$data[$i]["latitude"].','.$data[$i]["longitude"].'" target="_blank" class="btn btn-sm btn-primary shadow-sm">

                                <i class="fas fa-download fa-sm text-white-50"></i> MAPS 

                            </a>'; 
						
	//$data[$i]['status_pelanggan']='<span class="badge badge-success">'.$data[$i]["status_wo"].'</span>';
	
	if($data[$i]['status'] == 'sudah'){
											$data[$i]['type_status'] = '<small class="badge badge-success">'. strtoupper($data[$i]['status']).'</small>';
											}elseif($data[$i]['status'] == 'belum'){
												$data[$i]['type_status'] = '<small class="badge badge-danger">'. strtoupper($data[$i]['status']).'</small>';
											}else{
												$data[$i]['type_status'] = $data[$i]['status'];
											} 
											
										if($data[$i]['verified'] == 'approve'){
											$data[$i]['type_verified'] = '<small class="badge badge-success">'. strtoupper($data[$i]['verified']).'</small>';
											}elseif($data[$i]['verified'] == 'not-approve'){
												$data[$i]['type_verified'] = '<small class="badge badge-danger">'. strtoupper($data[$i]['verified']).'</small>';
											}else{
												$data[$i]['type_verified'] = $data[$i]['verified'];
											} 

										if($data[$i]['verified_fls'] == 'verified'){
											$data[$i]['type_aprof'] = '<small class="badge badge-success">'. strtoupper($data[$i]['verified_fls']).'</small>';
											}elseif($data[$i]['verified_fls'] == 'not_verified'){
												$data[$i]['type_aprof'] = '<small class="badge badge-danger">'. strtoupper($data[$i]['verified_fls']).'</small>';
											}else{
												$data[$i]['type_aprof'] = $data[$i]['verified_fls'];
											} 
											
										if($row['jenis_pekerjaan'] == 'pasang_spanduk'){
												$row['jns_pkrjan'] = '<small class="badge badge-dark">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'sebar_brosur'){
												$row['jns_pkrjan'] = '<small class="badge badge-light text-dark">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'pasang_banner'){
												$row['jns_pkrjan'] = '<small class="badge badge-info">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'open_booth'){
												$row['jns_pkrjan'] = '<small class="badge badge-success">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'banner_60x160'){
												$row['jns_pkrjan'] = '<small class="badge badge-secondary">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'banner_80x200'){
												$row['jns_pkrjan'] = '<small class="badge badge-secondary">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'banner_200x300'){
												$row['jns_pkrjan'] = '<small class="badge badge-secondary">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'pasang_banner_wifi_gratis'){
												$row['jns_pkrjan'] = '<small class="badge badge-primary">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'pembelian_bambu'){
												$row['jns_pkrjan'] = '<small class="badge badge-primary">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}else{
												$row['type_status'] = $data[$i]['status'];
											}
											
											$format  =$data[$i]['nominal'];
											$hasil = "Rp " . number_format($format,2,',','.');
											$data[$i]['ttl'] = '<small class="badge badge-info">'. strtoupper($hasil).'</small>';
											
											$format_disk  =$data[$i]['diskon'];
											$hasil_disk = "Rp " . number_format($format_disk,2,',','.');
											$data[$i]['ttl_disk'] = '<small class="badge badge-danger">'. strtoupper($hasil_disk).'</small>';
											
											$ttl_al = ($format - $format_disk); 
											$ttl_all = "Rp " . number_format($ttl_al,2,',','.');
											$data[$i]['ttl_alll'] = '<small class="badge badge-success">'. strtoupper($ttl_all).'</small>';
						
	$i++;
	$no++;
}



$datax = array('data' => $data);


//print_r($datax);
echo json_encode($datax);
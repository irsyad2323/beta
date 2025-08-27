<?php
session_start();
$acces_user_log = $_SESSION["username"];
$kota = $_SESSION["level_kantor"];


include('../controller/controller.php');

// $query = mysqli_query($conn, 'SELECT * FROM pengguna');

$query = "SELECT key_fal, tgl_ins_datetime, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, total, perlakuan, id_fdback, lokasi, foto_dpn_rmh, foto_ktp, alamat_fal, paket_fal, lain_lain, password_fal, pic_ikr, log_reimburse
FROM (
    SELECT 
        a.key_fal,  
        a.tgl_ins_datetime, 
        a.username_fal, 
        a.nama_fal, 
        a.jenis_wo, 
        a.tlp_fal, 
        a.kd_layanan, 
        ((a.hrg_ins + a.hrg_pkt) - a.total_diskon) AS total, 
        a.perlakuan, 
        0 AS id_fdback, 
        a.lokasi, 
        a.foto_dpn_rmh, 
        a.foto_ktp, 
        a.alamat_fal, 
        a.paket_fal, 
        a.lain_lain, 
        a.password_fal, 
        a.pic_ikr ,
        CAST(a.log_reimburse AS CHAR CHARACTER SET utf8) COLLATE utf8_general_ci AS log_reimburse
    FROM tbl_fal a 
    WHERE a.pic_ikr = '".$acces_user_log."' AND a.status_wo IN ('Sudah Terpasang')

    UNION ALL

    SELECT 
        b.key_fal, 
        b.tgl_ins_datetime, 
        b.username_Maintenance AS username_fal, 
        b.nama_fal, 
        b.jenis_wo, 
        b.tlp_fal, 
        b.kd_layanan, 
        0 AS total, 
        0 AS perlakuan, 
        b.username_fal AS id_fdback, 
        z.lokasi AS lokasi, 
        z.foto_dpn_rmh AS foto_dpn_rmh, 
        z.foto_ktp AS foto_ktp, 
        b.alamat_fal,				
        z.paket_fal AS paket_fal,
        b.lain_lain AS lain_lain,
        '-' AS password_fal, 
        b.pic_ikr,
        CAST(b.log_reimburse AS CHAR CHARACTER SET utf8) COLLATE utf8_general_ci AS log_reimburse
    FROM tbl_maintenance b 
		LEFT JOIN tbl_fal z
		ON b.username_Maintenance = z.username_fal
    WHERE b.pic_ikr = '".$acces_user_log."' AND b.status_wo IN ('Sudah Terpasang')

    UNION ALL

    SELECT 
        c.key_fal, 
        c.tgl_solved AS tgl_ins_datetime, 
        c.id_odp AS username_fal, 
        c.nama_fal, 
        c.jenis_wo, 
        0 AS tlp_fal, 
        c.kd_layanan, 
        0 AS total, 
        0 AS perlakuan, 
        0 AS id_fdback, 
        0 AS lokasi, 
        0 AS foto_dpn_rmh, 
        0 AS foto_ktp,  
        c.alamat_fal,				
        '-' AS paket_fal,  
        c.lain_lain AS lain_lain,
        '-' AS password_fal, 
        c.pic_ikr ,
        CAST(c.log_reimburse AS CHAR CHARACTER SET utf8) COLLATE utf8_general_ci AS log_reimburse
    FROM tbl_maintenance_odp c 
    WHERE c.pic_ikr = '".$acces_user_log."' AND c.status_wo IN ('Sudah Terpasang')

    UNION ALL

    SELECT 
        c.key_odp AS key_fal, 
        c.tgl_solved AS tgl_ins_datetime, 
        c.id_odp AS username_fal, 
        c.nama_odp AS nama_fal, 
        'INSTALASI_ODP' AS jenis_wo, 
        0 AS tlp_fal, 
        c.kd_layanan, 
        0 AS total, 
        0 AS perlakuan, 
        0 AS id_fdback, 
        0 AS lokasi, 
        0 AS foto_dpn_rmh, 
        0 AS foto_ktp,
				c.alamat_odp as alamat_fal,				
        '-' AS paket_fal,
		c.lain_lain AS lain_lain,
        '-' AS password_fal, 
        c.pic_ikr,
        CAST(c.log_reimburse AS CHAR CHARACTER SET utf8) COLLATE utf8_general_ci AS log_reimburse
    FROM tbl_odp c 
    WHERE c.pic_ikr = '".$acces_user_log."' AND c.status_wo IN ('Sudah Terpasang')

    UNION ALL

    SELECT 
        c.key_odp AS key_fal, 
        c.tgl_solved AS tgl_ins_datetime, 
        '-' AS username_fal, 
        c.nama_odp AS nama_fal, 
        'INSTALASI_DISTRIBUSI' AS jenis_wo, 
        0 AS tlp_fal, 
        c.kd_layanan, 
        0 AS total, 
        0 AS perlakuan, 
        0 AS id_fdback, 
        0 AS lokasi, 
        0 AS foto_dpn_rmh, 
        0 AS foto_ktp, 
        c.alamat_odp AS alamat_fal,				
        '-' AS paket_fal,
		c.lain_lain AS lain_lain,
        '-' AS password_fal, 
        c.pic_ikr,
        CAST(c.log_reimburse AS CHAR CHARACTER SET utf8) COLLATE utf8_general_ci AS log_reimburse
    FROM tbl_distribusi c 
    WHERE c.pic_ikr = '".$acces_user_log."' AND c.status_wo IN ('Sudah Terpasang')

    UNION ALL

    SELECT 
        c.key_backbone AS key_fal, 
        c.tgl_solved AS tgl_ins_datetime, 
        '-' AS username_fal, 
        c.nama_backbone AS nama_fal, 
        'MAINTENANCE_BACKBONE' AS jenis_wo, 
        0 AS tlp_fal, 
        c.kd_layanan_backbone AS kd_layanan, 
        0 AS total, 
        0 AS perlakuan, 
        0 AS id_fdback, 
        0 AS lokasi, 
        0 AS foto_dpn_rmh, 
        0 AS foto_ktp,
			  c.alamat_fal_backbone AS alamat_fal	,				
        '-' AS paket_fal,
		c.lain_lain_backbone AS lain_lain,
        '-' AS password_fal	, 
        c.pic_ikr_backbone as pic_ikr,
        CAST(c.log_reimburse AS CHAR CHARACTER SET utf8) COLLATE utf8_general_ci AS log_reimburse
    FROM tbl_backbone c 
    WHERE c.pic_ikr_backbone = '".$acces_user_log."' AND c.status_wo IN ('Sudah Terpasang')
) AS combined_logs 
WHERE log_reimburse = 'n' and DATE(tgl_ins_datetime) = CURDATE()
ORDER BY tgl_ins_datetime DESC;";

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
	$data[$i]['targets'] = '<label><input type="checkbox" value ="'.$data[$i]['key_fal'].'" 
	jenis_wo ="'.$data[$i]['jenis_wo'].'" 
	pic_ikr ="'.$data[$i]['pic_ikr'].'" 
	tgl_ins_datetime ="'.$data[$i]['tgl_ins_datetime'].'" 
	kd_layanan ="'.$data[$i]['kd_layanan'].'" 
	name = "key_fal" class="minimal"></label>';
						
	 if ($data[$i]["jenis_wo"] == 'INSTALASI'){
			  $data[$i]["jenis_hasil"] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
	  }elseif ($data[$i]["jenis_wo"] == 'MAINTENANCE'){
		  $data[$i]["jenis_hasil"] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
	  }elseif ($data[$i]["jenis_wo"] == 'MAINTENANCE_ODP'){
		  $data[$i]["jenis_hasil"] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
	  }elseif ($data[$i]["jenis_wo"] == 'INSTALASI_ODP'){
		  $data[$i]["jenis_hasil"] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
	  }elseif ($data[$i]["jenis_wo"] == 'INSTALASI_DISTRIBUSI'){
		  $data[$i]["jenis_hasil"] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
	  }elseif ($data[$i]["jenis_wo"] == 'MAINTENANCE_BACKBONE'){
		  $data[$i]["jenis_hasil"] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
	  }
							  
	if ($data[$i]["kd_layanan"] == 'mlg'){
		  $data[$i]["jenis_unit"] = '<small class="badge badge-warning">Naratel</small>';
	  }elseif ($data[$i]["kd_layanan"] == 'pas'){
		  $data[$i]["jenis_unit"] = '<small class="badge badge-danger">SBM</small>';
	  }elseif ($data[$i]["kd_layanan"] == 'batu'){
		  $data[$i]["jenis_unit"] = '<small class="badge badge-dark">Jalibar</small>';
	  }elseif ($data[$i]["kd_layanan"] == 'mlg1'){
		  $data[$i]["jenis_unit"] = '<small class="badge badge-primary">Jalantra</small>';
	  }
						  
	$i++;
	$no++;
}



$datax = array('data' => $data);


//print_r($datax);
echo json_encode($datax);
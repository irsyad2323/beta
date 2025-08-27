<?php
session_start();
if (!isset($_SESSION["logingundala"])) {
    exit;
}

include('controller/controller_mysqli.php');
$table = mysqli_query($koneksi, "
SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
FROM (
SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain FROM tbl_fal a 
WHERE a.status_wo in ('Proses Pengerjaan')
union all
SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain FROM tbl_maintenance b 
WHERE b.status_wo in ('Proses Pengerjaan')
union all
SELECT b.key_odp as key_fal , 0 as paket_fal, b.tgl_sign as tgl_fal_datetime, b.tgl_proses as tgl_proses_teknis ,b.id_odp as username_fal ,b.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_odp as alamat_fal, b.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
FROM tbl_odp b WHERE b.status_wo in ('Proses Pengerjaan')	
union all
SELECT b.key_backbone as key_fal , 0 as paket_fal, b.tgl_sign as tgl_fal_datetime, b.tgl_proses as tgl_proses_teknis ,'-' as username_fal ,b.nama_backbone as nama_fal, 'MAINTENANCE_BACKBONE' as jenis_wo, '-' as tlp_fal, b.kd_layanan_backbone as kd_layanan, b.pic_ikr_backbone as pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal_backbone as alamat_fal, '-' as kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain_backbone as lain_lain 
FROM tbl_backbone b WHERE b.status_wo in ('Proses Pengerjaan')	
union all
SELECT b.key_odp as key_fal , 0 as paket_fal, b.tgl_sign as tgl_fal_datetime, b.tgl_proses as tgl_proses_teknis ,'-' as username_fal ,b.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_odp as alamat_fal, b.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
FROM tbl_distribusi b WHERE b.status_wo in ('Proses Pengerjaan')
union all
SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1 , 0 as password_fal, c.lain_lain FROM tbl_maintenance_odp c 
WHERE c.status_wo in ('Proses Pengerjaan')) AS combined_logs ORDER BY tgl_fal_datetime DESC");

$no = 1;
while ($row = mysqli_fetch_assoc($table)) {
    if ($row['jenis_wo'] == 'INSTALASI') {
        $row['jenis_hasil'] = '<small class="badge badge-info">' . strtoupper($row['jenis_wo']) . '</small>';
    } elseif ($row['jenis_wo'] == 'MAINTENANCE') {
        $row['jenis_hasil'] = '<small class="badge badge-warning">' . strtoupper($row['jenis_wo']) . '</small>';
    } elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP') {
        $row['jenis_hasil'] = '<small class="badge badge-danger">' . strtoupper($row['jenis_wo']) . '</small>';
    }
    
    if ($row['kd_layanan'] == 'mlg') {
        $row['jenis_unit'] = '<small class="badge badge-warning">Naratel</small>';
    } elseif ($row['kd_layanan'] == 'pas') {
        $row['jenis_unit'] = '<small class="badge badge-danger">SBM</small>';
    } elseif ($row['kd_layanan'] == 'batu') {
        $row['jenis_unit'] = '<small class="badge badge-dark">Jalibar</small>';
    } elseif ($row['kd_layanan'] == 'mlg1') {
        $row['jenis_unit'] = '<small class="badge badge-primary">Jalantra</small>';
    }
    
    echo '<tr id="' . $row['key_fal'] . '">';
    echo '<td>' . $no . '</td>';
    echo '<td>' . $row['jenis_hasil'] . '</td>';
    echo '<td>' . $row['username_fal'] . '</td>';
    echo '<td>' . $row['tgl_fal_datetime'] . '</td>';
    echo '<td>' . $row['nama_fal'] . '</td>';
    echo '<td>' . $row['tlp_fal'] . '</td>';
    echo '<td>' . $row['jenis_unit'] . '</td>';
    echo '<td>' . $row['pic_ikr'] . '</td>';
    echo '<td><button class="btn btn-sm btn-info">Action</button></td>';
    echo '</tr>';
    $no++;
}
?>
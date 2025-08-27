<?php
session_start();
include('../controller/controller_mysqli.php');

$acces_user_log = $_SESSION["username"];

$table = mysqli_query($koneksi, "
SELECT key_fal, tgl_fal_datetime, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, modem, kabel1, kabel2, kabel3, pic_ikr
FROM (
SELECT a.key_fal , a.tgl_fal_datetime ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.modem, a.kabel1, a.kabel2, a.kabel3, a.pic_ikr FROM tbl_fal a 
WHERE a.status_wo in ('Sudah Terpasang') and DATE(a.tgl_fal_datetime) = DATE(now())
union all
SELECT b.key_fal , b.tgl_date_time as tgl_fal_datetime ,b.username_Maintenance as username_fal ,b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.modem, b.kabel1, b.kabel2, b.kabel3, b.pic_ikr FROM tbl_maintenance b 
WHERE b.status_wo in ('Sudah Terpasang') and DATE(b.tgl_date_time) = DATE(now())
union all
SELECT c.key_fal , c.tgl_sign as tgl_fal_datetime ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 0 as tlp_fal, c.kd_layanan, c.modem, c.kabel1,c.kabel2,c.kabel3, c.pic_ikr FROM tbl_maintenance_odp c 
WHERE c.status_wo in ('Sudah Terpasang') and DATE(c.tgl_sign) = DATE(now())
union all
SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_ODP' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem, '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_odp c 
WHERE c.status_wo in ('Sudah Terpasang') and DATE(c.tgl_sign) = DATE(now())
union all
SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_DISTRIBUSI' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_distribusi c 
WHERE c.status_wo in ('Sudah Terpasang') and DATE(c.tgl_sign) = DATE(now())
union all
SELECT c.key_backbone , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_backbone, 'INSTALASI_BACKBONE' as jenis_wo, 0 as tlp_fal, c.kd_layanan_backbone, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr_backbone FROM tbl_backbone c 
WHERE c.status_wo in ('Sudah Terpasang') and DATE(c.tgl_sign) = DATE(now())
) AS combined_logs ORDER BY tgl_fal_datetime DESC;");

$data = [];
$no = 1;
while ($row = mysqli_fetch_assoc($table)) {
    if ($row['jenis_wo'] == 'INSTALASI') {
        $row['jenis_hasil'] = '<small class="badge badge-info">' . strtoupper($row['jenis_wo']) . '</small>';
    } elseif ($row['jenis_wo'] == 'MAINTENANCE') {
        $row['jenis_hasil'] = '<small class="badge badge-warning">' . strtoupper($row['jenis_wo']) . '</small>';
    } elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP') {
        $row['jenis_hasil'] = '<small class="badge badge-danger">' . strtoupper($row['jenis_wo']) . '</small>';
    }

    $data[] = [
        $no,
        $row['username_fal'],
        $row['tgl_fal_datetime'],
        $row['nama_fal'],
        $row['jenis_hasil'],
        $row['modem'],
        $row['kabel1'],
        $row['kabel2'],
        $row['kabel3'],
        $row['pic_ikr']
    ];
    $no++;
}

echo json_encode(['data' => $data]);
?>
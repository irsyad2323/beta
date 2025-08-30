<?php
session_start();
include('../controller/controller_mysqli.php');

$time_slot = $_POST['time_slot'] ?? '06:00:00-07:59:59';
$tanggal_hari_ini = $_POST['tanggal'] ?? date('Y-m-d');

list($start_time, $end_time) = explode('-', $time_slot);

$query = "
SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
FROM (
SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain FROM tbl_fal a 
WHERE a.status_wo in ('Proses Pengerjaan') and TIME(a.tgl_fal_datetime) 
BETWEEN '$start_time' and '$end_time' and DATE(a.tgl_fal_datetime) = DATE('$tanggal_hari_ini') and a.kd_layanan in ('mlg','batu','mlg1','pas')
union all
SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain FROM tbl_maintenance b 
WHERE b.status_wo in ('Proses Pengerjaan') and TIME(b.tgl_date_time) 
BETWEEN '$start_time' and '$end_time' and DATE(b.tgl_date_time) = DATE('$tanggal_hari_ini') and b.kd_layanan in ('mlg','batu','mlg1','pas')
union all
SELECT b.key_odp as key_fal , 0 as paket_fal, b.tgl_sign as tgl_fal_datetime, b.tgl_proses as tgl_proses_teknis ,b.id_odp as username_fal ,b.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_odp as alamat_fal, b.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
FROM tbl_odp b WHERE b.status_wo in ('Proses Pengerjaan') and TIME(b.tgl_sign) 
BETWEEN '$start_time' and '$end_time' and DATE(b.tgl_sign) = DATE('$tanggal_hari_ini') and b.kd_layanan in ('mlg','batu','mlg1','pas')
union all
SELECT b.key_backbone as key_fal , 0 as paket_fal, b.tgl_sign as tgl_fal_datetime, b.tgl_proses as tgl_proses_teknis ,'-' as username_fal ,b.nama_backbone as nama_fal, 'MAINTENANCE_BACKBONE' as jenis_wo, '-' as tlp_fal, b.kd_layanan_backbone as kd_layanan, b.pic_ikr_backbone as pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal_backbone as alamat_fal, '-' as kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain_backbone as lain_lain 
FROM tbl_backbone b WHERE b.status_wo in ('Proses Pengerjaan') and TIME(b.tgl_sign) 
BETWEEN '$start_time' and '$end_time' and DATE(b.tgl_sign) = DATE('$tanggal_hari_ini') and b.kd_layanan_backbone in ('mlg','batu','mlg1','pas')
union all
SELECT b.key_odp as key_fal , 0 as paket_fal, b.tgl_sign as tgl_fal_datetime, b.tgl_proses as tgl_proses_teknis ,'-' as username_fal ,b.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_odp as alamat_fal, b.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
FROM tbl_distribusi b WHERE b.status_wo in ('Proses Pengerjaan') and TIME(b.tgl_sign) 
BETWEEN '$start_time' and '$end_time' and DATE(b.tgl_sign) = DATE('$tanggal_hari_ini') and b.kd_layanan in ('mlg','batu','mlg1','pas')
union all
SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1 , 0 as password_fal, c.lain_lain FROM tbl_maintenance_odp c 
WHERE c.status_wo in ('Proses Pengerjaan') and TIME(c.tgl_sign) 
BETWEEN '$start_time' and '$end_time' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini') and c.kd_layanan in ('mlg','batu','mlg1','pas')
) AS combined_logs ORDER BY tgl_fal_datetime DESC";

$table = mysqli_query($koneksi, $query);

// Debug info
if (!$table) {
    echo '<div class="alert alert-danger">Query Error: ' . mysqli_error($koneksi) . '</div>';
    echo '<div class="alert alert-info">Query: ' . $query . '</div>';
    exit;
}

$row_count = mysqli_num_rows($table);
?>

<div class="alert alert-info">Proses Pengerjaan - Time Slot: <?= $time_slot ?>, Tanggal: <?= $tanggal_hari_ini ?>, Total: <?= $row_count ?> records</div>

<div class="table-responsive">
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>NO</th>
                <th>Jenis WO</th>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Telpon</th>
                <th>Layanan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($table)) { 
                // Badge logic
                $jenis_badge = $row['jenis_wo'] == 'INSTALASI' ? 'badge-info' : 'badge-warning';
                $unit_badge = [
                    'mlg' => 'badge-warning">Naratel</small>',
                    'pas' => 'badge-danger">SBM</small>', 
                    'batu' => 'badge-dark">Jalibar</small>',
                    'mlg1' => 'badge-primary">Jalantra</small>'
                ][$row['kd_layanan']] ?? 'badge-secondary">Unknown</small>';
                
                $tanggal_badge = $row['tgl_fal_datetime'] < date('Y-m-d') ? 'badge-danger' : 'badge-primary';
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><small class="badge <?= $jenis_badge ?>"><?= strtoupper($row['jenis_wo']) ?></small></td>
                <td><?= $row['username_fal'] ?></td>
                <td><small class="badge <?= $tanggal_badge ?>"><?= $row['tgl_fal_datetime'] ?></small></td>
                <td><?= $row['nama_fal'] ?></td>
                <td><?= $row['tlp_fal'] ?></td>
                <td><small class="badge <?= $unit_badge ?></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown">
                            ACTION
                        </button>
                        <div class="dropdown-menu">
                            <?php if ($row['jenis_wo'] == 'INSTALASI') { ?>
                                <a href="https://pendaftaran.kaptennaratel.com/Foto_Rumah/<?= $row['foto_dpn_rmh'] ?>" target="_blank" class="dropdown-item">Foto Rumah</a>
                                <a href="<?= $row['lokasi'] ?>" target="_blank" class="dropdown-item">Lokasi</a>
                                <a class="dropdown-item action_edit_list" data-id="<?= $row['username_fal'] ?>" 
                                   data-nama="<?= $row['nama_fal'] ?>" data-alamat="<?= $row['alamat_fal'] ?>">Edit</a>
                            <?php } ?>
                            <a class="dropdown-item respro" data-id="<?= $row['username_fal'] ?>" data-key="<?= $row['key_fal'] ?>">Reschedule</a>
                            <a class="dropdown-item switchpic" data-id="<?= $row['username_fal'] ?>" data-key="<?= $row['key_fal'] ?>">Switch PIC</a>
                            <a class="dropdown-item deletepengguna" data-id="<?= $row['key_fal'] ?>">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php 
                $no++;
            } 
            ?>
        </tbody>
    </table>
</div>
<?php
session_start();
include('../controller/controller_mysqli.php');

$time_slot = $_POST['time_slot'] ?? '06:00:00-07:59:59';
$tanggal_hari_ini = $_POST['tanggal'] ?? date('Y-m-d');

// Debug POST data
echo '<div class="alert alert-warning">DEBUG POST: time_slot=' . $time_slot . ', tanggal=' . $tanggal_hari_ini . '</div>';

list($start_time, $end_time) = explode('-', $time_slot);

// Debug parsed time
echo '<div class="alert alert-info">DEBUG TIME: start=' . $start_time . ', end=' . $end_time . '</div>';

$query = "
SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
FROM (
    SELECT a.key_fal, a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis, a.username_fal, a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain 
    FROM tbl_fal a 
    WHERE a.status_wo = 'Belum Terpasang' 
    AND TIME(a.tgl_fal_datetime) BETWEEN '$start_time' AND '$end_time' 
    AND DATE(a.tgl_fal_datetime) = DATE('$tanggal_hari_ini') 
    AND a.kd_layanan IN ('mlg','batu','mlg1','pas')
    
    UNION ALL
    
    SELECT b.key_fal, 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis, b.username_Maintenance as username_fal, b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr, b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal, b.lain_lain 
    FROM tbl_maintenance b 
    WHERE b.status_wo = 'Belum Terpasang' 
    AND TIME(b.tgl_date_time) BETWEEN '$start_time' AND '$end_time' 
    AND DATE(b.tgl_date_time) = DATE('$tanggal_hari_ini') 
    AND b.kd_layanan IN ('mlg','batu','mlg1','pas')
    
    UNION ALL
    
    SELECT c.key_odp as key_fal, 0 as paket_fal, c.tgl_sign as tgl_fal_datetime, c.tgl_proses as tgl_proses_teknis, c.id_odp as username_fal, c.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, c.alamat_odp as alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal, c.lain_lain 
    FROM tbl_odp c 
    WHERE c.status_wo = 'Belum Terpasang' 
    AND TIME(c.tgl_sign) BETWEEN '$start_time' AND '$end_time' 
    AND DATE(c.tgl_sign) = DATE('$tanggal_hari_ini') 
    AND c.kd_layanan IN ('mlg','batu','mlg1','pas')
    
    UNION ALL
    
    SELECT d.key_backbone as key_fal, 0 as paket_fal, d.tgl_sign as tgl_fal_datetime, d.tgl_proses as tgl_proses_teknis, '-' as username_fal, d.nama_backbone as nama_fal, 'MAINTENANCE_BACKBONE' as jenis_wo, '-' as tlp_fal, d.kd_layanan_backbone as kd_layanan, d.pic_ikr_backbone as pic_ikr, d.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, d.alamat_fal_backbone as alamat_fal, '-' as kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal, d.lain_lain_backbone as lain_lain 
    FROM tbl_backbone d 
    WHERE d.status_wo = 'Belum Terpasang' 
    AND TIME(d.tgl_sign) BETWEEN '$start_time' AND '$end_time' 
    AND DATE(d.tgl_sign) = DATE('$tanggal_hari_ini') 
    AND d.kd_layanan_backbone IN ('mlg','batu','mlg1','pas')
    
    UNION ALL
    
    SELECT e.key_odp as key_fal, 0 as paket_fal, e.tgl_sign as tgl_fal_datetime, e.tgl_proses as tgl_proses_teknis, '-' as username_fal, e.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, e.kd_layanan, e.pic_ikr, e.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, e.alamat_odp as alamat_fal, e.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal, e.lain_lain 
    FROM tbl_distribusi e 
    WHERE e.status_wo = 'Belum Terpasang' 
    AND TIME(e.tgl_sign) BETWEEN '$start_time' AND '$end_time' 
    AND DATE(e.tgl_sign) = DATE('$tanggal_hari_ini') 
    AND e.kd_layanan IN ('mlg','batu','mlg1','pas')
    
    UNION ALL
    
    SELECT f.key_fal, 0 as paket_fal, f.tgl_sign as tgl_fal_datetime, f.tgl_proses as tgl_proses_teknis, f.id_odp as username_fal, f.nama_fal, f.jenis_wo, 0 as tlp_fal, f.kd_layanan, f.pic_ikr, f.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, f.alamat_fal, f.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal, f.lain_lain 
    FROM tbl_maintenance_odp f 
    WHERE f.status_wo = 'Belum Terpasang' 
    AND TIME(f.tgl_sign) BETWEEN '$start_time' AND '$end_time' 
    AND DATE(f.tgl_sign) = DATE('$tanggal_hari_ini') 
    AND f.kd_layanan IN ('mlg','batu','mlg1','pas')
) AS combined_logs 
ORDER BY tgl_fal_datetime DESC";

$table = mysqli_query($koneksi, $query);

// Debug info
if (!$table) {
    echo '<div class="alert alert-danger">Query Error: ' . mysqli_error($koneksi) . '</div>';
    exit;
}

$row_count = mysqli_num_rows($table);
?>

<div class="alert alert-info">Time Slot: <?= $time_slot ?>, Tanggal: <?= $tanggal_hari_ini ?>, Total: <?= $row_count ?> records</div>

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
                    'mlg' => 'badge-warning">Naratel',
                    'pas' => 'badge-danger">SBM', 
                    'batu' => 'badge-dark">Jalibar',
                    'mlg1' => 'badge-primary">Jalantra'
                ][$row['kd_layanan']] ?? 'badge-secondary">Unknown';
                
                $tanggal_badge = $row['tgl_fal_datetime'] < date('Y-m-d') ? 'badge-danger' : 'badge-primary';
            ?>
            <tr>
                <td><?= $no ?></td>
                <td><small class="badge <?= $jenis_badge ?>"><?= strtoupper($row['jenis_wo']) ?></small></td>
                <td><?= $row['username_fal'] ?></td>
                <td><small class="badge <?= $tanggal_badge ?>"><?= $row['tgl_fal_datetime'] ?></small></td>
                <td><?= $row['nama_fal'] ?></td>
                <td><?= $row['tlp_fal'] ?></td>
                <td><small class="badge <?= $unit_badge ?></small></td>
                <td>
                    <div class="dropdown">
								  <button class="btn btn-info dropdown-toggle" type="button" data-id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									ACTION
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a name="edit" data-id="<?php echo $row['username_fal'];?>"
									username_fal="<?php echo $row['username_fal'];?>"
									jenis_wo="<?php echo $row['jenis_wo'];?>"
									key_fal="<?php echo $row['key_fal'];?>"
									class="dropdown-item editproses" >Ambil</a>
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
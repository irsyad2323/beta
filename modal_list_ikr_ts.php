

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">LIST WO</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="tabel_pros" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>NO</th>
						<th>ID</th>
						<th>Paket</th>
						<th>Tanggal</th>
						<th>Nama</th>
						<th>Jenis WO</th>
						<th>Telpon</th>
						<th>Layanan</th>
						<th>Alamat</th>
						<th>Ket</th>
						<th>Password</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>NO</th>
						<th>ID</th>
						<th>Paket</th>
						<th>Tanggal</th>
						<th>Nama</th>
						<th>Jenis WO</th>
						<th>Telpon</th>
						<th>Layanan</th>
						<th>Alamat</th>
						<th>Ket</th>
						<th>Password</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php
					include('controller/controller_mysqli.php');
					$acces_user_log = $_SESSION["username"];
					$table = mysqli_query($koneksi, "SELECT key_fal, tgl_fal_datetime, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, total, perlakuan, id_fdback, lokasi, foto_dpn_rmh, foto_ktp, alamat_fal, paket_fal, lain_lain, password_fal, working
FROM (
    SELECT 
        a.key_fal, 
        a.tgl_fal_datetime, 
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
        a.working 
    FROM tbl_fal a 
    WHERE a.pic_ikr = '" . $acces_user_log . "' AND a.status_wo IN ('Proses Pengerjaan')

    UNION ALL

    SELECT 
        b.key_fal, 
        b.tgl_date_time AS tgl_fal_datetime, 
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
        b.working
    FROM tbl_maintenance b 
		LEFT JOIN tbl_fal z
		ON b.username_Maintenance = z.username_fal
    WHERE b.pic_ikr = '" . $acces_user_log . "' AND b.status_wo IN ('Proses Pengerjaan')

    UNION ALL

    SELECT 
        c.key_fal, 
        c.tgl_sign AS tgl_fal_datetime, 
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
        c.working  COLLATE utf8mb4_general_ci AS working
    FROM tbl_maintenance_odp c 
    WHERE c.pic_ikr = '" . $acces_user_log . "' AND c.status_wo IN ('Proses Pengerjaan')

    UNION ALL

    SELECT 
        c.key_odp AS key_fal, 
        c.tgl_sign AS tgl_fal_datetime, 
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
        c.working  COLLATE utf8mb4_general_ci AS working
    FROM tbl_odp c 
    WHERE c.pic_ikr = '" . $acces_user_log . "' AND c.status_wo IN ('Proses Pengerjaan')

    UNION ALL

    SELECT 
        c.key_odp AS key_fal, 
        c.tgl_sign AS tgl_fal_datetime, 
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
        c.working  COLLATE utf8mb4_general_ci AS working
    FROM tbl_distribusi c 
    WHERE c.pic_ikr = '" . $acces_user_log . "' AND c.status_wo IN ('Proses Pengerjaan')

    UNION ALL

    SELECT 
        c.key_backbone AS key_fal, 
        c.tgl_sign AS tgl_fal_datetime, 
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
        '-' AS password_fal, 
        c.working  COLLATE utf8mb4_general_ci AS working
    FROM tbl_backbone c 
    WHERE c.pic_ikr_backbone = '" . $acces_user_log . "' AND c.status_wo IN ('Proses Pengerjaan')
) AS combined_logs 
ORDER BY tgl_fal_datetime DESC;


");
					while ($row = mysqli_fetch_assoc($table)) {
						if ($row['jenis_wo'] == 'INSTALASI') {
							$row['jenis_hasil'] = '<small class="badge badge-info">' . strtoupper($row['jenis_wo']) . '</small>';
						} elseif ($row['jenis_wo'] == 'MAINTENANCE') {
							$row['jenis_hasil'] = '<small class="badge badge-danger">' . strtoupper($row['jenis_wo']) . '</small>';
						} elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP') {
							$row['jenis_hasil'] = '<small class="badge badge-danger">' . strtoupper($row['jenis_wo']) . '</small>';
						} elseif ($row['jenis_wo'] == 'INSTALASI_ODP') {
							$row['jenis_hasil'] = '<small class="badge badge-warning">' . strtoupper($row['jenis_wo']) . '</small>';
						} elseif ($row['jenis_wo'] == 'INSTALASI_DISTRIBUSI') {
							$row['jenis_hasil'] = '<small class="badge badge-warning">' . strtoupper($row['jenis_wo']) . '</small>';
						} elseif ($row['jenis_wo'] == 'MAINTENANCE_BACKBONE') {
							$row['jenis_hasil'] = '<small class="badge badge-warning">' . strtoupper($row['jenis_wo']) . '</small>';
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

						$i = 0;
						$no = 1;
					?>
						<tr id=<?php echo $row['key_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="nama_fal"> <?php echo $row['username_fal']; ?></td>
							<td data-target="paket_fal"> <?php echo $row['paket_fal']; ?></td>
							<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime']; ?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal']; ?></td>
							<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil']; ?></td>
							<td data-target="tlp_fal"> <?php echo $row['tlp_fal']; ?></td>
							<td data-target="jenis_unit"> <?php echo $row['jenis_unit']; ?></td>
							<td data-target="alamat_fal"> <?php echo $row['alamat_fal']; ?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain']; ?></td>
							<td data-target="password_fal"> <?php echo $row['password_fal']; ?></td>
							<td>
								<?php if ($row['working'] == "0") { ?>
									<a type="button" name="edit" data-id="<?php echo $row['username_fal']; ?>"
										key_fal="<?php echo $row['key_fal']; ?>"
										username_fal="<?php echo $row['username_fal']; ?>"
										username_Maintenance="<?php echo $row['username_Maintenance']; ?>"
										nama_fal="<?php echo $row['nama_fal']; ?>"
										tlp_fal="<?php echo $row['tlp_fal']; ?>"
										jenis_wo="<?php echo $row['jenis_wo']; ?>"
										class="btn btn-warning start_time_proses">Start Pekerjaan</a>
		</div>
	<?php	} elseif ($row['working'] == "1") { ?>
		<div class="dropdown">
			<button class="btn btn-info dropdown-toggle" type="button" data-id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				ACTION
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a href="https://pendaftaran.kaptennaratel.com/Foto_KTP/<?php echo $row['foto_ktp']; ?>" target="_blank" class="dropdown-item">
					Foto KTP</a>
				<a href="https://pendaftaran.kaptennaratel.com/Foto_Rumah/<?php echo $row['foto_dpn_rmh']; ?>" target="_blank" class="dropdown-item">
					Foto Rumah</a>
				<a href="https://pendaftaran.kaptennaratel.com/Foto_KK/<?php echo $row['foto_kk']; ?>" target="_blank" class="dropdown-item">
					Foto KK</a>
				<?php if ($row['jenis_wo'] !== 'INSTALASI_DISTRIBUSI' && $row['jenis_wo'] !== 'MAINTENANCE_BACKBONE') : ?>
					<a href="<?php echo $row['lokasi']; ?>" target="_blank" class="dropdown-item">
						Maps</a>
				<?php endif; ?>

				<button type="button" name="edit" data-id="<?php echo $row['username_fal']; ?>"
					key_fal="<?php echo $row['key_fal']; ?>"
					username_fal="<?php echo $row['username_fal']; ?>"
					username_Maintenance="<?php echo $row['username_Maintenance']; ?>"
					nama_fal="<?php echo $row['nama_fal']; ?>"
					tlp_fal="<?php echo $row['tlp_fal']; ?>"
					jenis_wo="<?php echo $row['jenis_wo']; ?>"
					perlakuan="<?php echo $row['perlakuan']; ?>"
					total="<?php echo $row['total']; ?>"
					kd_layanan="<?php echo $row['kd_layanan']; ?>"
					id_fdback="<?php echo $row['id_fdback']; ?>"
					lain_lain="<?php echo $row['lain_lain']; ?>"
					tgl_fal_datetime="<?php echo $row['tgl_fal_datetime']; ?>"
					class="dropdown-item editkapten">Hasil</button>

			</div>
		</div>
	<?php	} ?>
	</td>
	</tr>
<?php
					}
?>

	</div>
	</td>
	</tr>
	</tbody>
	</table>
</div>

<?php
if ($_SESSION["username"] == "kiki") {
?>
	<!-- Modal -->
	<div class="modal fade" id="modalReimburse" tabindex="-1" role="dialog" aria-labelledby="modalReimburseLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<form id="formReimburse" method="POST" action="controller/action_reimburse_set.php">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Form Reimburse</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">

						<!-- JSON Previe -->
						<div class="form-group">
							<label>Data Terpilih (JSON)</label>
							<textarea class="form-control" name="data_json" id="data_json" rows="4" readonly></textarea>
						</div>

						<!-- Loop dri JS, tampilkan semua ID/Jenis WO/PIC -->
						<div id="inputContainer"></div>

						<div class="form-group">
							<label>Nominal Konsumsi</label>
							<input type="number" name="nominal_konsumsi" class="form-control" value="10000" readonly>
						</div>

						<div class="form-group">
							<label>Nominal BBM Default 15rb 2 hari sekali</label>
							<input type="number" name="nominal_bbm" id="nominal_bbm" class="form-control" value="15000" required readonly>
							<small id="bbmWarning" class="text-danger d-none">Nominal BBM hanya bisa diisi setiap 2 hari sekali.</small>
						</div>

						<input type="hidden" id="last_bbm_date" value="<?= $last_bbm_date ?>"> <!-- contoh: 2025-04-12 -->

						<div class="form-group">
							<label>Detail Pekerjaan</label>
							<textarea name="detail_pekerjaan" class="form-control" rows="3" required></textarea>
						</div>

					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-success">Save</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					</div>
				</div>
			</form>
		</div>
	</div>


	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Laporan Reimburse</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="tabel_sudah" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th></th>
							<th>No</th>
							<th>Nama</th>
							<th>Tanggal</th>
							<th>Jenis Pekerjaan</th>
							<th>Pic</th>
							<th>Unit</th>
							<th>Alamat</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody id="table">

					</tbody>
				</table>
				<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<button type="submit" id="set" name="set" class="btn btn-success margin pull-right">Proses WO</button>
				</div>
			</div>
		</div>
	</div>

<?php
}
?>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">LIST SOlVED PENDING</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="tabel_pen" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>NO</th>
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>
						<th>Jenis WO</th>
						<th>Telpon</th>
						<th>Layanan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>NO</th>
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>
						<th>Jenis WO</th>
						<th>Telpon</th>
						<th>Layanan</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<tbody>
					<?php
					include('controller/controller_mysqli.php');
					$acces_user_log = $_SESSION["username"];
					$table = mysqli_query($koneksi, "SELECT key_fal, tgl_fal_datetime, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, total, perlakuan, id_fdback
														FROM (
														SELECT a.key_fal , a.tgl_fal_datetime ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, ((a.hrg_ins + a.hrg_pkt) - a.total_diskon) as total, a.perlakuan, 0 as id_fdback FROM tbl_fal a 
														WHERE a.pic_ikr='" . $acces_user_log . "' and a.status_wo in ('Pending')
														union all
														SELECT b.key_fal , b.tgl_date_time as tgl_fal_datetime ,b.username_Maintenance as username_fal ,b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, 0 as total, 0 as perlakuan, b.username_fal as id_fdback FROM tbl_maintenance b 
														WHERE b.pic_ikr='" . $acces_user_log . "' and b.status_wo in ('Pending')
														union all
														SELECT c.key_fal , c.tgl_sign as tgl_fal_datetime ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 0 as tlp_fal, c.kd_layanan, 0 as total, 0 as perlakuan, 0 as id_fdback FROM tbl_maintenance_odp c 
														WHERE c.pic_ikr='" . $acces_user_log . "' and c.status_wo in ('Pending')
														union all
														SELECT c.key_odp as key_fal , c.tgl_sign as tgl_fal_datetime ,c.id_odp as username_fal ,c.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, 0 as tlp_fal, c.kd_layanan, 0 as total, 0 as perlakuan, 0 as id_fdback FROM tbl_odp c 
														WHERE c.pic_ikr='" . $acces_user_log . "' and c.status_wo in ('Pending')
														union all
														SELECT c.key_odp as key_fal , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, 0 as tlp_fal, c.kd_layanan, 0 as total, 0 as perlakuan, 0 as id_fdback FROM tbl_distribusi c 
														WHERE c.pic_ikr='" . $acces_user_log . "' and c.status_wo in ('Pending')
														union all
														SELECT c.key_backbone as key_fal , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_backbone as nama_fal, 'INSTALASI_BACKBONE' as jenis_wo, 0 as tlp_fal, c.kd_layanan_backbone as kd_layanan, 0 as total, 0 as perlakuan, 0 as id_fdback FROM tbl_backbone c 
														WHERE c.pic_ikr_backbone ='" . $acces_user_log . "' and c.status_wo in ('Pending')
) AS combined_logs ORDER BY tgl_fal_datetime DESC");
					while ($row = mysqli_fetch_assoc($table)) {
						if ($row['jenis_wo'] == 'INSTALASI') {
							$row['jenis_hasil'] = '<small class="badge badge-info">' . strtoupper($row['jenis_wo']) . '</small>';
						} elseif ($row['jenis_wo'] == 'MAINTENANCE') {
							$row['jenis_hasil'] = '<small class="badge badge-danger">' . strtoupper($row['jenis_wo']) . '</small>';
						} elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP') {
							$row['jenis_hasil'] = '<small class="badge badge-danger">' . strtoupper($row['jenis_wo']) . '</small>';
						} elseif ($row['jenis_wo'] == 'INSTALASI_ODP') {
							$row['jenis_hasil'] = '<small class="badge badge-warning">' . strtoupper($row['jenis_wo']) . '</small>';
						} elseif ($row['jenis_wo'] == 'INSTALASI_DISTRIBUSI') {
							$row['jenis_hasil'] = '<small class="badge badge-warning">' . strtoupper($row['jenis_wo']) . '</small>';
						} elseif ($row['jenis_wo'] == 'INSTALASI_BACKBONE') {
							$row['jenis_hasil'] = '<small class="badge badge-warning">' . strtoupper($row['jenis_wo']) . '</small>';
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

						$i = 0;
						$no = 1;
					?>
						<tr id=<?php echo $row['key_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="nama_fal"> <?php echo $row['username_fal']; ?></td>
							<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime']; ?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal']; ?></td>
							<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil']; ?></td>
							<td data-target="tlp_fal"> <?php echo $row['tlp_fal']; ?></td>
							<td data-target="jenis_unit"> <?php echo $row['jenis_unit']; ?></td>
							<td>
								<div class="btn-group">
									<button type="button" name="edit" data-id="<?php echo $row['username_fal']; ?>"
										key_fal="<?php echo $row['key_fal']; ?>"
										username_fal="<?php echo $row['username_fal']; ?>"
										username_Maintenance="<?php echo $row['username_Maintenance']; ?>"
										nama_fal="<?php echo $row['nama_fal']; ?>"
										tlp_fal="<?php echo $row['tlp_fal']; ?>"
										jenis_wo="<?php echo $row['jenis_wo']; ?>"
										perlakuan="<?php echo $row['perlakuan']; ?>"
										total="<?php echo $row['total']; ?>"
										kd_layanan="<?php echo $row['kd_layanan']; ?>"
										id_fdback="<?php echo $row['id_fdback']; ?>"
										lain_lain="<?php echo $row['lain_lain']; ?>"
										tgl_fal_datetime="<?php echo $row['tgl_fal_datetime']; ?>"
										class="btn btn-warning btn-sm mr-2 editkapten">Hasil</button>
								</div>
							</td>
						</tr>
					<?php
					}
					?>

		</div>
		</td>
		</tr>
		</tbody>
		</table>
	</div>
</div>
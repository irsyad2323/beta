
<!-- Bootstrap core JavaScript-->
<div class="modal fade" id="modal_1"  role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                 <div class="modal-body">
					<form role="form" method="post" id="formdatapengguna">
					<input class="form-control" type="text" id="date_wo_ts" name="date_wo_ts">
						 <div class="container-fluid">
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">List Slot 1</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_slot1" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>ID</th>
									<th>Tanggal</th>
									<th>Nama</th>
									<th>Jenis WO</th>
									<th>Layanan</th>
									<th>Status</th>
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
									<th>Layanan</th>
									<th>Status</th>
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('controller/controller_mysqli.php');
						  $acces_user_log = $_SESSION["username"];
							$wo_total = mysqli_query($koneksi, "SELECT ((SELECT COUNT(*)  FROM tbl_distribusi WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_backbone WHERE pic_ikr_backbone = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_odp WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_fal WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_maintenance WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_maintenance_odp WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))) as total;");
							$row_tot = mysqli_fetch_assoc($wo_total);
							$total_allin = $row_tot['total'];
							
							if($total_allin == 0 ){
								//echo '2';
							if($kota == 'mlg' or $kota == 'batu' or $kota == 'mlg1'){
								$table = mysqli_query($koneksi,"
								SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
								FROM (

								SELECT a.key_backbone as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_backbone as nama_fal, 'INSTALASI_BACKBONE' as jenis_wo, '-' as tlp_fal, a.kd_layanan_backbone as kd_layanan, a.pic_ikr_backbone as pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_fal_backbone as alamat_fal, '-' as kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain_backbone as lain_lain
								FROM tbl_backbone a 
								WHERE a.kd_layanan_backbone in ('mlg1','mlg','batu') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '06:00:00' and '07:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_distribusi a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '06:00:00' and '07:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,a.id_odp as username_fal 
								,a.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, 
								'-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan, '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_odp a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '06:00:00' and '07:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain 
								FROM tbl_fal a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_fal_datetime) 
								BETWEEN '06:00:00' and '07:59:59' and DATE(a.tgl_fal_datetime) = DATE(NOW())

								union all

								SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,
								b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 
								0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
								FROM tbl_maintenance b 
								WHERE b.kd_layanan in ('mlg1','mlg','batu') and  b.status_wo in ('Belum Terpasang') AND TIME(b.tgl_date_time) 
								BETWEEN '06:00:00' and '07:59:59' and DATE(b.tgl_date_time) = DATE(NOW())

								union all

								SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 
								0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 
								0 as angsuran1 , 0 as password_fal, c.lain_lain 
								FROM tbl_maintenance_odp c 
								WHERE c.kd_layanan in ('mlg1','mlg','batu') and  c.status_wo in ('Belum Terpasang') AND TIME(c.tgl_sign) 
								BETWEEN '06:00:00' and '07:59:59' and DATE(c.tgl_sign) = DATE(NOW())

								) AS combined_logs ORDER BY tgl_fal_datetime DESC");
								
							}elseif($kota == 'pas'){
									
								$table = mysqli_query($koneksi,"
								SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
								FROM (

								SELECT a.key_backbone as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_backbone as nama_fal, 'INSTALASI_BACKBONE' as jenis_wo, '-' as tlp_fal, a.kd_layanan_backbone as kd_layanan, a.pic_ikr_backbone as pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_fal_backbone as alamat_fal, '-' as kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain_backbone as lain_lain
								FROM tbl_backbone a 
								WHERE a.kd_layanan_backbone in ('pas','pas1') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '06:00:00' and '07:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_distribusi a 
								WHERE a.kd_layanan in ('pas','pas1') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '06:00:00' and '07:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,a.id_odp as username_fal 
								,a.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, 
								'-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan, '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_odp a 
								WHERE a.kd_layanan in ('pas','pas1') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '06:00:00' and '07:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain 
								FROM tbl_fal a 
								WHERE a.kd_layanan in ('pas','pas1') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_fal_datetime) 
								BETWEEN '06:00:00' and '07:59:59' and DATE(a.tgl_fal_datetime) = DATE(NOW())

								union all

								SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,
								b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 
								0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
								FROM tbl_maintenance b 
								WHERE b.kd_layanan in ('pas','pas1') and  b.status_wo in ('Belum Terpasang') AND TIME(b.tgl_date_time) 
								BETWEEN '06:00:00' and '07:59:59' and DATE(b.tgl_date_time) = DATE(NOW())

								union all

								SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 
								0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 
								0 as angsuran1 , 0 as password_fal, c.lain_lain 
								FROM tbl_maintenance_odp c 
								WHERE c.kd_layanan in ('pas','pas1') and  c.status_wo in ('Belum Terpasang') AND TIME(c.tgl_sign) 
								BETWEEN '06:00:00' and '07:59:59' and DATE(c.tgl_sign) = DATE(NOW())

								) AS combined_logs ORDER BY tgl_fal_datetime DESC");
							}
							}else{}
							$no=1;
						  while ($row = mysqli_fetch_assoc($table)){ 						  
						  if ($row['jenis_wo'] == 'INSTALASI'){
							  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
							  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'INSTALASI_ODP'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }						  
						  if ($row['kd_layanan'] == 'mlg'){
							  $row['jenis_unit'] = '<small class="badge badge-warning">Naratel</small>';
						  }elseif ($row['kd_layanan'] == 'pas'){
							  $row['jenis_unit'] = '<small class="badge badge-danger">SBM</small>';
						  }elseif ($row['kd_layanan'] == 'batu'){
							  $row['jenis_unit'] = '<small class="badge badge-dark">Jalibar</small>';
						  }elseif ($row['kd_layanan'] == 'mlg1'){
							  $row['jenis_unit'] = '<small class="badge badge-primary">Jalantra</small>';
						  }					  
						  if ($row['status_wo'] == 'Belum Terpasang'){
							  $row['status_wo_h'] = '<small class="badge badge-danger">'. strtoupper($row['status_wo']).'</small>';
						  }elseif ($row['status_wo'] == 'Proses Pengerjaan'){
							  $row['status_wo_h'] = '<small class="badge badge-warning">'. strtoupper($row['status_wo']).'</small>';
						  }				  
						  $i=0;						  
						  ?>
						  <tr id=<?php echo $row['key_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
							<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
							<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
							<td data-target="jenis_unit"> <?php echo $row['jenis_unit'];?></td>
							<td data-target="status_wo_h"> <?php echo $row['status_wo_h'];?></td>
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
							</div>
						  </div>

						</div>
                    
              </div>
			  </br>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>
<!-- Bootstrap core JavaScript-->

<!-- Bootstrap core JavaScript-->
<div class="modal fade" id="modal_2"  role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                 <div class="modal-body">
					<form role="form" method="post" id="formdatapengguna">
					<input class="form-control" type="hidden" id="date_wo_ts" name="date_wo_ts">
						 <div class="container-fluid">
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">List Slot 2</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_slot2" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>ID</th>
									<th>Tanggal</th>
									<th>Nama</th>
									<th>Jenis WO</th>
									<th>Layanan</th>
									<th>Status</th>
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
									<th>Layanan</th>
									<th>Status</th>
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('controller/controller_mysqli.php');
						  $acces_user_log = $_SESSION["username"];
							$wo_total = mysqli_query($koneksi, "SELECT ((SELECT COUNT(*)  FROM tbl_distribusi WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_backbone WHERE pic_ikr_backbone = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_odp WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_fal WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_maintenance WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_maintenance_odp WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))) as total;");
							$row_tot = mysqli_fetch_assoc($wo_total);
							$total_allin = $row_tot['total'];
							
							if($total_allin == 0 ){
								//echo '2';
								if($kota == 'mlg' or $kota == 'batu' or $kota == 'mlg1'){
								$table = mysqli_query($koneksi,"
								SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
								FROM (

								SELECT a.key_backbone as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_backbone as nama_fal, 'INSTALASI_BACKBONE' as jenis_wo, '-' as tlp_fal, a.kd_layanan_backbone as kd_layanan, a.pic_ikr_backbone as pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_fal_backbone as alamat_fal, '-' as kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain_backbone as lain_lain
								FROM tbl_backbone a 
								WHERE a.kd_layanan_backbone in ('mlg1','mlg','batu') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '08:00:00' and '09:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_distribusi a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '08:00:00' and '09:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,a.id_odp as username_fal 
								,a.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, 
								'-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan, '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_odp a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '08:00:00' and '09:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain 
								FROM tbl_fal a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_fal_datetime) 
								BETWEEN '08:00:00' and '09:59:59' and DATE(a.tgl_fal_datetime) = DATE(NOW())

								union all

								SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,
								b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 
								0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
								FROM tbl_maintenance b 
								WHERE b.kd_layanan in ('mlg1','mlg','batu') and  b.status_wo in ('Belum Terpasang') AND TIME(b.tgl_date_time) 
								BETWEEN '08:00:00' and '09:59:59' and DATE(b.tgl_date_time) = DATE(NOW())

								union all

								SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 
								0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 
								0 as angsuran1 , 0 as password_fal, c.lain_lain 
								FROM tbl_maintenance_odp c 
								WHERE c.kd_layanan in ('mlg1','mlg','batu') and  c.status_wo in ('Belum Terpasang') AND TIME(c.tgl_sign) 
								BETWEEN '08:00:00' and '09:59:59' and DATE(c.tgl_sign) = DATE(NOW())

								) AS combined_logs ORDER BY tgl_fal_datetime DESC");
								}elseif($kota == 'pas'){
								$table = mysqli_query($koneksi,"
								SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
								FROM (

								SELECT a.key_backbone as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_backbone as nama_fal, 'INSTALASI_BACKBONE' as jenis_wo, '-' as tlp_fal, a.kd_layanan_backbone as kd_layanan, a.pic_ikr_backbone as pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_fal_backbone as alamat_fal, '-' as kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain_backbone as lain_lain
								FROM tbl_backbone a 
								WHERE a.kd_layanan_backbone in ('pas','pas1') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '08:00:00' and '09:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_distribusi a 
								WHERE a.kd_layanan in ('pas','pas1') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '08:00:00' and '09:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,a.id_odp as username_fal 
								,a.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, 
								'-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan, '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_odp a 
								WHERE a.kd_layanan in ('pas','pas1') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '08:00:00' and '09:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain 
								FROM tbl_fal a 
								WHERE a.kd_layanan in ('pas','pas1') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_fal_datetime) 
								BETWEEN '08:00:00' and '09:59:59' and DATE(a.tgl_fal_datetime) = DATE(NOW())

								union all

								SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,
								b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 
								0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
								FROM tbl_maintenance b 
								WHERE b.kd_layanan in ('pas','pas1') and  b.status_wo in ('Belum Terpasang') AND TIME(b.tgl_date_time) 
								BETWEEN '08:00:00' and '09:59:59' and DATE(b.tgl_date_time) = DATE(NOW())

								union all

								SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 
								0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 
								0 as angsuran1 , 0 as password_fal, c.lain_lain 
								FROM tbl_maintenance_odp c 
								WHERE c.kd_layanan in ('pas','pas1') and  c.status_wo in ('Belum Terpasang') AND TIME(c.tgl_sign) 
								BETWEEN '08:00:00' and '09:59:59' and DATE(c.tgl_sign) = DATE(NOW())

								) AS combined_logs ORDER BY tgl_fal_datetime DESC");	
								}
								
								
							}else{}
							$no=1;
						  while ($row = mysqli_fetch_assoc($table)){ 						  
						  if ($row['jenis_wo'] == 'INSTALASI'){
							  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
							  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'INSTALASI_ODP'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }	elseif ($row['jenis_wo'] == 'INSTALASI_DISTRIBUSI'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }							  
						  if ($row['kd_layanan'] == 'mlg'){
							  $row['jenis_unit'] = '<small class="badge badge-warning">Naratel</small>';
						  }elseif ($row['kd_layanan'] == 'pas'){
							  $row['jenis_unit'] = '<small class="badge badge-danger">SBM</small>';
						  }elseif ($row['kd_layanan'] == 'batu'){
							  $row['jenis_unit'] = '<small class="badge badge-dark">Jalibar</small>';
						  }elseif ($row['kd_layanan'] == 'mlg1'){
							  $row['jenis_unit'] = '<small class="badge badge-primary">Jalantra</small>';
						  }					  
						  if ($row['status_wo'] == 'Belum Terpasang'){
							  $row['status_wo_h'] = '<small class="badge badge-danger">'. strtoupper($row['status_wo']).'</small>';
						  }elseif ($row['status_wo'] == 'Proses Pengerjaan'){
							  $row['status_wo_h'] = '<small class="badge badge-warning">'. strtoupper($row['status_wo']).'</small>';
						  }				  
						  $i=0;						  
						  ?>
						  <tr id=<?php echo $row['key_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
							<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
							<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
							<td data-target="jenis_unit"> <?php echo $row['jenis_unit'];?></td>
							<td data-target="status_wo_h"> <?php echo $row['status_wo_h'];?></td>
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
							</div>
						  </div>

						</div>
                    
              </div>
			  </br>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>
<!-- Bootstrap core JavaScript-->

<!-- Bootstrap core JavaScript-->
<div class="modal fade" id="modal_3"  role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                 <div class="modal-body">
					<form role="form" method="post" id="formdatapengguna">
					<input class="form-control" type="hidden" id="date_wo_ts" name="date_wo_ts">
						 <div class="container-fluid">
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">List Slot 3</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_slot3" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>ID</th>
									<th>Tanggal</th>
									<th>Nama</th>
									<th>Jenis WO</th>
									<th>Layanan</th>
									<th>Status</th>
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
									<th>Layanan</th>
									<th>Status</th>
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('controller/controller_mysqli.php');
						  $acces_user_log = $_SESSION["username"];
							$wo_total = mysqli_query($koneksi, "SELECT ((SELECT COUNT(*)  FROM tbl_distribusi WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_backbone WHERE pic_ikr_backbone = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_odp WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_fal WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_maintenance WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_maintenance_odp WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))) as total;");
							$row_tot = mysqli_fetch_assoc($wo_total);
							$total_allin = $row_tot['total'];
							
							if($total_allin == 0 ){
								//echo '2';
								if($kota == 'mlg' or $kota == 'batu' or $kota == 'mlg1'){
								$table = mysqli_query($koneksi,"
								SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
								FROM (

								SELECT a.key_backbone as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_backbone as nama_fal, 'INSTALASI_BACKBONE' as jenis_wo, '-' as tlp_fal, a.kd_layanan_backbone as kd_layanan, a.pic_ikr_backbone as pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_fal_backbone as alamat_fal, '-' as kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain_backbone as lain_lain
								FROM tbl_backbone a 
								WHERE a.kd_layanan_backbone in ('mlg1','mlg','batu') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '10:00:00' and '12:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_distribusi a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '10:00:00' and '12:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,a.id_odp as username_fal 
								,a.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, 
								'-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan, '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_odp a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '10:00:00' and '12:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain 
								FROM tbl_fal a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_fal_datetime) 
								BETWEEN '10:00:00' and '12:59:59' and DATE(a.tgl_fal_datetime) = DATE(NOW())

								union all

								SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,
								b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 
								0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
								FROM tbl_maintenance b 
								WHERE b.kd_layanan in ('mlg1','mlg','batu') and  b.status_wo in ('Belum Terpasang') AND TIME(b.tgl_date_time) 
								BETWEEN '10:00:00' and '12:59:59' and DATE(b.tgl_date_time) = DATE(NOW())

								union all

								SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 
								0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 
								0 as angsuran1 , 0 as password_fal, c.lain_lain 
								FROM tbl_maintenance_odp c 
								WHERE c.kd_layanan in ('mlg1','mlg','batu') and  c.status_wo in ('Belum Terpasang') AND TIME(c.tgl_sign) 
								BETWEEN '10:00:00' and '12:59:59' and DATE(c.tgl_sign) = DATE(NOW())

								) AS combined_logs ORDER BY tgl_fal_datetime DESC");
								
								}elseif($kota == 'pas'){
								$table = mysqli_query($koneksi,"
								SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
								FROM (

								SELECT a.key_backbone as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_backbone as nama_fal, 'INSTALASI_BACKBONE' as jenis_wo, '-' as tlp_fal, a.kd_layanan_backbone as kd_layanan, a.pic_ikr_backbone as pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_fal_backbone as alamat_fal, '-' as kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain_backbone as lain_lain
								FROM tbl_backbone a 
								WHERE a.kd_layanan_backbone in ('pas','pas1') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '10:00:00' and '12:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_distribusi a 
								WHERE a.kd_layanan in ('pas','pas1') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '10:00:00' and '12:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,a.id_odp as username_fal 
								,a.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, 
								'-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan, '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_odp a 
								WHERE a.kd_layanan in ('pas','pas1') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '10:00:00' and '12:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain 
								FROM tbl_fal a 
								WHERE a.kd_layanan in ('pas','pas1') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_fal_datetime) 
								BETWEEN '10:00:00' and '12:59:59' and DATE(a.tgl_fal_datetime) = DATE(NOW())

								union all

								SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,
								b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 
								0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
								FROM tbl_maintenance b 
								WHERE b.kd_layanan in ('pas','pas1') and  b.status_wo in ('Belum Terpasang') AND TIME(b.tgl_date_time) 
								BETWEEN '10:00:00' and '12:59:59' and DATE(b.tgl_date_time) = DATE(NOW())

								union all

								SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 
								0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 
								0 as angsuran1 , 0 as password_fal, c.lain_lain 
								FROM tbl_maintenance_odp c 
								WHERE c.kd_layanan in ('pas','pas1') and  c.status_wo in ('Belum Terpasang') AND TIME(c.tgl_sign) 
								BETWEEN '10:00:00' and '12:59:59' and DATE(c.tgl_sign) = DATE(NOW())

								) AS combined_logs ORDER BY tgl_fal_datetime DESC");
								}
							}else{}
							$no=1;
						  while ($row = mysqli_fetch_assoc($table)){ 						  
						 if ($row['jenis_wo'] == 'INSTALASI'){
							  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
							  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'INSTALASI_ODP'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }	elseif ($row['jenis_wo'] == 'INSTALASI_DISTRIBUSI'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }							  
						  if ($row['kd_layanan'] == 'mlg'){
							  $row['jenis_unit'] = '<small class="badge badge-warning">Naratel</small>';
						  }elseif ($row['kd_layanan'] == 'pas'){
							  $row['jenis_unit'] = '<small class="badge badge-danger">SBM</small>';
						  }elseif ($row['kd_layanan'] == 'batu'){
							  $row['jenis_unit'] = '<small class="badge badge-dark">Jalibar</small>';
						  }elseif ($row['kd_layanan'] == 'mlg1'){
							  $row['jenis_unit'] = '<small class="badge badge-primary">Jalantra</small>';
						  }					  
						  if ($row['status_wo'] == 'Belum Terpasang'){
							  $row['status_wo_h'] = '<small class="badge badge-danger">'. strtoupper($row['status_wo']).'</small>';
						  }elseif ($row['status_wo'] == 'Proses Pengerjaan'){
							  $row['status_wo_h'] = '<small class="badge badge-warning">'. strtoupper($row['status_wo']).'</small>';
						  }				  
						  $i=0;						  
						  ?>
						  <tr id=<?php echo $row['key_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
							<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
							<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
							<td data-target="jenis_unit"> <?php echo $row['jenis_unit'];?></td>
							<td data-target="status_wo_h"> <?php echo $row['status_wo_h'];?></td>
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
							</div>
						  </div>

						</div>
                    
              </div>
			  </br>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>
<!-- Bootstrap core JavaScript-->

<!-- Bootstrap core JavaScript-->
<div class="modal fade" id="modal_4"  role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                 <div class="modal-body">
					<form role="form" method="post" id="formdatapengguna">
					<input class="form-control" type="hidden" id="date_wo_ts" name="date_wo_ts">
						 <div class="container-fluid">
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">List Slot 4</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_slot4" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>ID</th>
									<th>Tanggal</th>
									<th>Nama</th>
									<th>Jenis WO</th>
									<th>Layanan</th>
									<th>Status</th>
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
									<th>Layanan</th>
									<th>Status</th>
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('controller/controller_mysqli.php');
						  $acces_user_log = $_SESSION["username"];
							$wo_total = mysqli_query($koneksi, "SELECT ((SELECT COUNT(*)  FROM tbl_distribusi WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_backbone WHERE pic_ikr_backbone = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_odp WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_fal WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_maintenance WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_maintenance_odp WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))) as total;");
							$row_tot = mysqli_fetch_assoc($wo_total);
							$total_allin = $row_tot['total'];
							
							if($total_allin == 0 ){
								//echo '2';
								if($kota == 'mlg' or $kota == 'batu' or $kota == 'mlg1'){
								$table = mysqli_query($koneksi,"
								SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
								FROM (

								SELECT a.key_backbone as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_backbone as nama_fal, 'INSTALASI_BACKBONE' as jenis_wo, '-' as tlp_fal, a.kd_layanan_backbone as kd_layanan, a.pic_ikr_backbone as pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_fal_backbone as alamat_fal, '-' as kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain_backbone as lain_lain
								FROM tbl_backbone a 
								WHERE a.kd_layanan_backbone in ('mlg1','mlg','batu') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '13:00:00' and '14:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_distribusi a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '13:00:00' and '14:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,a.id_odp as username_fal 
								,a.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, 
								'-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan, '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_odp a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '13:00:00' and '14:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain 
								FROM tbl_fal a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_fal_datetime) 
								BETWEEN '13:00:00' and '14:59:59' and DATE(a.tgl_fal_datetime) = DATE(NOW())

								union all

								SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,
								b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 
								0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
								FROM tbl_maintenance b 
								WHERE b.kd_layanan in ('mlg1','mlg','batu') and  b.status_wo in ('Belum Terpasang') AND TIME(b.tgl_date_time) 
								BETWEEN '13:00:00' and '14:59:59' and DATE(b.tgl_date_time) = DATE(NOW())

								union all

								SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 
								0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 
								0 as angsuran1 , 0 as password_fal, c.lain_lain 
								FROM tbl_maintenance_odp c 
								WHERE c.kd_layanan in ('mlg1','mlg','batu') and  c.status_wo in ('Belum Terpasang') AND TIME(c.tgl_sign) 
								BETWEEN '13:00:00' and '14:59:59' and DATE(c.tgl_sign) = DATE(NOW())

								) AS combined_logs ORDER BY tgl_fal_datetime DESC");
								}elseif($kota == 'pas'){
								$table = mysqli_query($koneksi,"
								SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
								FROM (

								SELECT a.key_backbone as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_backbone as nama_fal, 'INSTALASI_BACKBONE' as jenis_wo, '-' as tlp_fal, a.kd_layanan_backbone as kd_layanan, a.pic_ikr_backbone as pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_fal_backbone as alamat_fal, '-' as kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain_backbone as lain_lain
								FROM tbl_backbone a 
								WHERE a.kd_layanan_backbone in ('pas','pas1') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '13:00:00' and '14:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_distribusi a 
								WHERE a.kd_layanan in ('pas','pas1') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '13:00:00' and '14:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,a.id_odp as username_fal 
								,a.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, 
								'-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan, '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_odp a 
								WHERE a.kd_layanan in ('pas','pas1') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '13:00:00' and '14:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain 
								FROM tbl_fal a 
								WHERE a.kd_layanan in ('pas','pas1') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_fal_datetime) 
								BETWEEN '13:00:00' and '14:59:59' and DATE(a.tgl_fal_datetime) = DATE(NOW())

								union all

								SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,
								b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 
								0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
								FROM tbl_maintenance b 
								WHERE b.kd_layanan in ('pas','pas1') and  b.status_wo in ('Belum Terpasang') AND TIME(b.tgl_date_time) 
								BETWEEN '13:00:00' and '14:59:59' and DATE(b.tgl_date_time) = DATE(NOW())

								union all

								SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 
								0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 
								0 as angsuran1 , 0 as password_fal, c.lain_lain 
								FROM tbl_maintenance_odp c 
								WHERE c.kd_layanan in ('pas','pas1') and  c.status_wo in ('Belum Terpasang') AND TIME(c.tgl_sign) 
								BETWEEN '13:00:00' and '14:59:59' and DATE(c.tgl_sign) = DATE(NOW())

								) AS combined_logs ORDER BY tgl_fal_datetime DESC");
								}
							}else{}
							$no=1;
						  while ($row = mysqli_fetch_assoc($table)){ 						  
						  if ($row['jenis_wo'] == 'INSTALASI'){
							  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
							  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'INSTALASI_ODP'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }		elseif ($row['jenis_wo'] == 'INSTALASI_DISTRIBUSI'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }							  
						  if ($row['kd_layanan'] == 'mlg'){
							  $row['jenis_unit'] = '<small class="badge badge-warning">Naratel</small>';
						  }elseif ($row['kd_layanan'] == 'pas'){
							  $row['jenis_unit'] = '<small class="badge badge-danger">SBM</small>';
						  }elseif ($row['kd_layanan'] == 'batu'){
							  $row['jenis_unit'] = '<small class="badge badge-dark">Jalibar</small>';
						  }elseif ($row['kd_layanan'] == 'mlg1'){
							  $row['jenis_unit'] = '<small class="badge badge-primary">Jalantra</small>';
						  }					  
						  if ($row['status_wo'] == 'Belum Terpasang'){
							  $row['status_wo_h'] = '<small class="badge badge-danger">'. strtoupper($row['status_wo']).'</small>';
						  }elseif ($row['status_wo'] == 'Proses Pengerjaan'){
							  $row['status_wo_h'] = '<small class="badge badge-warning">'. strtoupper($row['status_wo']).'</small>';
						  }				  
						  $i=0;						  
						  ?>
						  <tr id=<?php echo $row['key_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
							<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
							<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
							<td data-target="jenis_unit"> <?php echo $row['jenis_unit'];?></td>
							<td data-target="status_wo_h"> <?php echo $row['status_wo_h'];?></td>
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
							</div>
						  </div>

						</div>
                    
              </div>
			  </br>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>
<!-- Bootstrap core JavaScript-->

<!-- Bootstrap core JavaScript-->
<div class="modal fade" id="modal_5"  role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                 <div class="modal-body">
					<form role="form" method="post" id="formdatapengguna">
					<input class="form-control" type="hidden" id="date_wo_ts" name="date_wo_ts">
						 <div class="container-fluid">
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">List Slot 5</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_slot5" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>ID</th>
									<th>Tanggal</th>
									<th>Nama</th>
									<th>Jenis WO</th>
									<th>Layanan</th>
									<th>Status</th>
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
									<th>Layanan</th>
									<th>Status</th>
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('controller/controller_mysqli.php');
						  $acces_user_log = $_SESSION["username"];
							$wo_total = mysqli_query($koneksi, "SELECT ((SELECT COUNT(*)  FROM tbl_distribusi WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_backbone WHERE pic_ikr_backbone = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_odp WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_fal WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_maintenance WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_maintenance_odp WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))) as total;");
							$row_tot = mysqli_fetch_assoc($wo_total);
							$total_allin = $row_tot['total'];
							
							if($total_allin == 0 ){
								//echo '2';
								if($kota == 'mlg' or $kota == 'batu' or $kota == 'mlg1'){
								$table = mysqli_query($koneksi,"
								SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
								FROM (

								SELECT a.key_backbone as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_backbone as nama_fal, 'INSTALASI_BACKBONE' as jenis_wo, '-' as tlp_fal, a.kd_layanan_backbone as kd_layanan, a.pic_ikr_backbone as pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_fal_backbone as alamat_fal, '-' as kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain_backbone as lain_lain
								FROM tbl_backbone a 
								WHERE a.kd_layanan_backbone in ('mlg1','mlg','batu') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '15:00:00' and '17:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_distribusi a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '15:00:00' and '17:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,a.id_odp as username_fal 
								,a.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, 
								'-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan, '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_odp a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '15:00:00' and '17:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain 
								FROM tbl_fal a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_fal_datetime) 
								BETWEEN '15:00:00' and '17:59:59' and DATE(a.tgl_fal_datetime) = DATE(NOW())

								union all

								SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,
								b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 
								0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
								FROM tbl_maintenance b 
								WHERE b.kd_layanan in ('mlg1','mlg','batu') and  b.status_wo in ('Belum Terpasang') AND TIME(b.tgl_date_time) 
								BETWEEN '15:00:00' and '17:59:59' and DATE(b.tgl_date_time) = DATE(NOW())

								union all

								SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 
								0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 
								0 as angsuran1 , 0 as password_fal, c.lain_lain 
								FROM tbl_maintenance_odp c 
								WHERE c.kd_layanan in ('mlg1','mlg','batu') and  c.status_wo in ('Belum Terpasang') AND TIME(c.tgl_sign) 
								BETWEEN '15:00:00' and '17:59:59' and DATE(c.tgl_sign) = DATE(NOW())

								) AS combined_logs ORDER BY tgl_fal_datetime DESC");
								}elseif($kota == 'pas'){
								$table = mysqli_query($koneksi,"
								SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
								FROM (

								SELECT a.key_backbone as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_backbone as nama_fal, 'INSTALASI_BACKBONE' as jenis_wo, '-' as tlp_fal, a.kd_layanan_backbone as kd_layanan, a.pic_ikr_backbone as pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_fal_backbone as alamat_fal, '-' as kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain_backbone as lain_lain
								FROM tbl_backbone a 
								WHERE a.kd_layanan_backbone in ('pas','pas1') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '15:00:00' and '17:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_distribusi a 
								WHERE a.kd_layanan in ('pas','pas1') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '15:00:00' and '17:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,a.id_odp as username_fal 
								,a.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, 
								'-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan, '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_odp a 
								WHERE a.kd_layanan in ('pas','pas1') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '15:00:00' and '17:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain 
								FROM tbl_fal a 
								WHERE a.kd_layanan in ('pas','pas1') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_fal_datetime) 
								BETWEEN '15:00:00' and '17:59:59' and DATE(a.tgl_fal_datetime) = DATE(NOW())

								union all

								SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,
								b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 
								0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
								FROM tbl_maintenance b 
								WHERE b.kd_layanan in ('pas','pas1') and  b.status_wo in ('Belum Terpasang') AND TIME(b.tgl_date_time) 
								BETWEEN '15:00:00' and '17:59:59' and DATE(b.tgl_date_time) = DATE(NOW())

								union all

								SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 
								0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 
								0 as angsuran1 , 0 as password_fal, c.lain_lain 
								FROM tbl_maintenance_odp c 
								WHERE c.kd_layanan in ('pas','pas1') and  c.status_wo in ('Belum Terpasang') AND TIME(c.tgl_sign) 
								BETWEEN '15:00:00' and '17:59:59' and DATE(c.tgl_sign) = DATE(NOW())

								) AS combined_logs ORDER BY tgl_fal_datetime DESC");
								}
							}else{}
							$no=1;
						  while ($row = mysqli_fetch_assoc($table)){ 						  
						  if ($row['jenis_wo'] == 'INSTALASI'){
							  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
							  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'INSTALASI_ODP'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'INSTALASI_DISTRIBUSI'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }							  
						  if ($row['kd_layanan'] == 'mlg'){
							  $row['jenis_unit'] = '<small class="badge badge-warning">Naratel</small>';
						  }elseif ($row['kd_layanan'] == 'pas'){
							  $row['jenis_unit'] = '<small class="badge badge-danger">SBM</small>';
						  }elseif ($row['kd_layanan'] == 'batu'){
							  $row['jenis_unit'] = '<small class="badge badge-dark">Jalibar</small>';
						  }elseif ($row['kd_layanan'] == 'mlg1'){
							  $row['jenis_unit'] = '<small class="badge badge-primary">Jalantra</small>';
						  }					  
						  if ($row['status_wo'] == 'Belum Terpasang'){
							  $row['status_wo_h'] = '<small class="badge badge-danger">'. strtoupper($row['status_wo']).'</small>';
						  }elseif ($row['status_wo'] == 'Proses Pengerjaan'){
							  $row['status_wo_h'] = '<small class="badge badge-warning">'. strtoupper($row['status_wo']).'</small>';
						  }				  
						  $i=0;						  
						  ?>
						  <tr id=<?php echo $row['key_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
							<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
							<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
							<td data-target="jenis_unit"> <?php echo $row['jenis_unit'];?></td>
							<td data-target="status_wo_h"> <?php echo $row['status_wo_h'];?></td>
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
							</div>
						  </div>

						</div>
                    
              </div>
			  </br>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>
<!-- Bootstrap core JavaScript-->

<!-- Bootstrap core JavaScript-->
<div class="modal fade" id="modal_6"  role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                 <div class="modal-body">
					<form role="form" method="post" id="formdatapengguna">
					<input class="form-control" type="hidden" id="date_wo_ts" name="date_wo_ts">
						 <div class="container-fluid">
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">List Slot 6</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_slot6" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>ID</th>
									<th>Tanggal</th>
									<th>Nama</th>
									<th>Jenis WO</th>
									<th>Layanan</th>
									<th>Status</th>
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
									<th>Layanan</th>
									<th>Status</th>
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
							include('controller/controller_mysqli.php');
							$acces_user_log = $_SESSION["username"];
							
							$wo_total = mysqli_query($koneksi, "SELECT ((SELECT COUNT(*)  FROM tbl_distribusi WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_backbone WHERE pic_ikr_backbone = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_odp WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_fal WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_maintenance WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))+
															(SELECT COUNT(*)  FROM tbl_maintenance_odp WHERE pic_ikr = '".$acces_user_log."' and status_wo in ('Proses Pengerjaan'))) as total;");
							$row_tot = mysqli_fetch_assoc($wo_total);
							$total_allin = $row_tot['total'];
							
							if($total_allin == 0 ){
							
								//echo '2';
								if($kota == 'mlg' or $kota == 'batu' or $kota == 'mlg1'){
								$table = mysqli_query($koneksi,"
								SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
								FROM (

								SELECT a.key_backbone as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_backbone as nama_fal, 'INSTALASI_BACKBONE' as jenis_wo, '-' as tlp_fal, a.kd_layanan_backbone as kd_layanan, a.pic_ikr_backbone as pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_fal_backbone as alamat_fal, '-' as kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain_backbone as lain_lain
								FROM tbl_backbone a 
								WHERE a.kd_layanan_backbone in ('mlg1','mlg','batu') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '18:00:00' and '19:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_distribusi a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '18:00:00' and '19:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,a.id_odp as username_fal 
								,a.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, 
								'-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan, '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_odp a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '18:00:00' and '19:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain 
								FROM tbl_fal a 
								WHERE a.kd_layanan in ('mlg1','mlg','batu') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_fal_datetime) 
								BETWEEN '18:00:00' and '19:59:59' and DATE(a.tgl_fal_datetime) = DATE(NOW())

								union all

								SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,
								b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 
								0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
								FROM tbl_maintenance b 
								WHERE b.kd_layanan in ('mlg1','mlg','batu') and  b.status_wo in ('Belum Terpasang') AND TIME(b.tgl_date_time) 
								BETWEEN '18:00:00' and '19:59:59' and DATE(b.tgl_date_time) = DATE(NOW())

								union all

								SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 
								0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 
								0 as angsuran1 , 0 as password_fal, c.lain_lain 
								FROM tbl_maintenance_odp c 
								WHERE c.kd_layanan in ('mlg1','mlg','batu') and  c.status_wo in ('Belum Terpasang') AND TIME(c.tgl_sign) 
								BETWEEN '18:00:00' and '19:59:59' and DATE(c.tgl_sign) = DATE(NOW())

								) AS combined_logs ORDER BY tgl_fal_datetime DESC");
								}elseif($kota == 'pas'){
								$table = mysqli_query($koneksi,"
								SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
								FROM (

								SELECT a.key_backbone as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_backbone as nama_fal, 'INSTALASI_BACKBONE' as jenis_wo, '-' as tlp_fal, a.kd_layanan_backbone as kd_layanan, a.pic_ikr_backbone as pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_fal_backbone as alamat_fal, '-' as kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain_backbone as lain_lain
								FROM tbl_backbone a 
								WHERE a.kd_layanan_backbone in ('pas','pas1') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '18:00:00' and '19:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,'-' 
								as username_fal ,a.nama_odp as nama_fal, 'INSTALASI_DISTRIBUSI' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, '-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan,
								 '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_distribusi a 
								WHERE a.kd_layanan in ('pas','pas1') and a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '18:00:00' and '19:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_odp as key_fal , '-' as paket_fal, a.tgl_sign as tgl_fal_datetime, a.tgl_proses as tgl_proses_teknis ,a.id_odp as username_fal 
								,a.nama_odp as nama_fal, 'INSTALASI_ODP' as jenis_wo, '-' as tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, '-' AS foto_dpn_rmh, '-' as foto_ktp, 
								'-' AS lokasi, a.alamat_odp as alamat_fal, a.kelurahan, '-' as perlakuan, '-' as total_diskon, '-' as angsuran1, '-' as password_fal, a.lain_lain 
								FROM tbl_odp a 
								WHERE a.kd_layanan in ('pas','pas1') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_sign) 
								BETWEEN '18:00:00' and '19:59:59' and DATE(a.tgl_sign) = DATE(NOW())

								union all

								SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, 
								a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain 
								FROM tbl_fal a 
								WHERE a.kd_layanan in ('pas','pas1') and  a.status_wo in ('Belum Terpasang') AND TIME(a.tgl_fal_datetime) 
								BETWEEN '18:00:00' and '19:59:59' and DATE(a.tgl_fal_datetime) = DATE(NOW())

								union all

								SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,
								b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 
								0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain 
								FROM tbl_maintenance b 
								WHERE b.kd_layanan in ('pas','pas1') and  b.status_wo in ('Belum Terpasang') AND TIME(b.tgl_date_time) 
								BETWEEN '18:00:00' and '19:59:59' and DATE(b.tgl_date_time) = DATE(NOW())

								union all

								SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 
								0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 
								0 as angsuran1 , 0 as password_fal, c.lain_lain 
								FROM tbl_maintenance_odp c 
								WHERE c.kd_layanan in ('pas','pas1') and  c.status_wo in ('Belum Terpasang') AND TIME(c.tgl_sign) 
								BETWEEN '18:00:00' and '19:59:59' and DATE(c.tgl_sign) = DATE(NOW())

								) AS combined_logs ORDER BY tgl_fal_datetime DESC");
								}
							}else{}
							$no=1;
						  while ($row = mysqli_fetch_assoc($table)){ 						  
						  if ($row['jenis_wo'] == 'INSTALASI'){
							  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
							  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'INSTALASI_ODP'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }	elseif ($row['jenis_wo'] == 'INSTALASI_DISTRIBUSI'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }							  
						  if ($row['kd_layanan'] == 'mlg'){
							  $row['jenis_unit'] = '<small class="badge badge-warning">Naratel</small>';
						  }elseif ($row['kd_layanan'] == 'pas'){
							  $row['jenis_unit'] = '<small class="badge badge-danger">SBM</small>';
						  }elseif ($row['kd_layanan'] == 'batu'){
							  $row['jenis_unit'] = '<small class="badge badge-dark">Jalibar</small>';
						  }elseif ($row['kd_layanan'] == 'mlg1'){
							  $row['jenis_unit'] = '<small class="badge badge-primary">Jalantra</small>';
						  }					  
						  if ($row['status_wo'] == 'Belum Terpasang'){
							  $row['status_wo_h'] = '<small class="badge badge-danger">'. strtoupper($row['status_wo']).'</small>';
						  }elseif ($row['status_wo'] == 'Proses Pengerjaan'){
							  $row['status_wo_h'] = '<small class="badge badge-warning">'. strtoupper($row['status_wo']).'</small>';
						  }				  
						  $i=0;						  
						  ?>
						  <tr id=<?php echo $row['key_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
							<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
							<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
							<td data-target="jenis_unit"> <?php echo $row['jenis_unit'];?></td>
							<td data-target="status_wo_h"> <?php echo $row['status_wo_h'];?></td>
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
							</div>
						  </div>

						</div>
                    
              </div>
			  </br>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>
<!-- Bootstrap core JavaScript-->
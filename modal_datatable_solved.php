<div class="modal fade" id="modal_solv1"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
					<form role="form" method="post" data-id="formdatapengguna">
					<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">List Working Solved</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table table-bordered" id="tabel_ikr" width="100%" cellspacing="0">
					  <thead>
						<tr>
						<th>NO</th>						
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>						
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>kabel1</th>
						<th>kabel2</th>
						<th>kabel3</th>
						<th>pic</th>
					  </thead>
					  <tfoot>
						<tr>
						<th>NO</th>						
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>						
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>kabel1</th>
						<th>kabel2</th>
						<th>kabel3</th>
						<th>pic</th>
						</tr>
					  </tfoot>
					  <tbody> 
						<?php 
			  include('controller/controller_mysqli.php');
			  $acces_user_log = $_SESSION["username"];
			  $tanggal_hari_ini = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
					//echo '2';
					$table = mysqli_query($koneksi,"SELECT key_fal, tgl_fal_datetime, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, modem, kabel1, kabel2, kabel3, pic_ikr
					FROM (
					SELECT a.key_fal , a.tgl_fal_datetime ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.modem, a.kabel1, a.kabel2, a.kabel3, a.pic_ikr FROM tbl_fal a 
					WHERE a.status_wo in ('Sudah Terpasang') and TIME(a.tgl_fal_datetime) 
					BETWEEN '06:00:00' and '07:59:59' and DATE(a.tgl_fal_datetime) = DATE('$tanggal_hari_ini')
					union all
					SELECT b.key_fal , b.tgl_date_time as tgl_fal_datetime ,b.username_Maintenance as username_fal ,b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.modem, b.kabel1, b.kabel2, b.kabel3, b.pic_ikr FROM tbl_maintenance b 
					WHERE b.status_wo in ('Sudah Terpasang') and TIME(b.tgl_date_time) 
					BETWEEN '06:00:00' and '07:59:59' and DATE(b.tgl_date_time) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_fal , c.tgl_sign as tgl_fal_datetime ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 0 as tlp_fal, c.kd_layanan, c.modem, c.kabel1,c.kabel2,c.kabel3, c.pic_ikr FROM tbl_maintenance_odp c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '06:00:00' and '07:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_ODP' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem, '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_odp c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '06:00:00' and '07:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_DISTRIBUSI' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_distribusi c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '06:00:00' and '07:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_backbone , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_backbone, 'INSTALASI_BACKBONE' as jenis_wo, 0 as tlp_fal, c.kd_layanan_backbone, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr_backbone FROM tbl_backbone c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '06:00:00' and '07:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					) AS combined_logs ORDER BY tgl_fal_datetime DESC;");					
				
				$no=1;
			  while ($row = mysqli_fetch_assoc($table)){ 
			  
			  if ($row['jenis_wo'] == 'INSTALASI'){
				  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
				  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
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
			  
			  $i=0;
			  ?>
			  <tr id=<?php echo $row['key_fal']; ?>">
				<td> <?php echo $no; ?></td>
				<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
				<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
				<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
				<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
				<td data-target="modem"> <?php echo $row['modem'];?></td>
				<td data-target="kabel1"> <?php echo $row['kabel1'];?></td>
				<td data-target="kabel2"> <?php echo $row['kabel2'];?></td>
				<td data-target="kabel3"> <?php echo $row['kabel3'];?></td>
				<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
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
			  </br>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>
	
	<div class="modal fade" id="modal_solv2"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
					<form role="form" method="post" data-id="formdatapengguna">
					<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">List Working Solved</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table table-bordered" id="tabel_ikr" width="100%" cellspacing="0">
					  <thead>
						<tr>
						<th>NO</th>						
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>						
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>kabel1</th>
						<th>kabel2</th>
						<th>kabel3</th>
						<th>pic</th>
					  </thead>
					  <tfoot>
						<tr>
						<th>NO</th>						
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>						
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>kabel1</th>
						<th>kabel2</th>
						<th>kabel3</th>
						<th>pic</th>
						</tr>
					  </tfoot>
					  <tbody> 
						<?php 
			  include('controller/controller_mysqli.php');
			  $acces_user_log = $_SESSION["username"];				
			  $tanggal_hari_ini = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');			  
					//echo ($tanggal_hari_ini);
					
					$table = mysqli_query($koneksi,"SELECT key_fal, tgl_fal_datetime, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, modem, kabel1, kabel2, kabel3, pic_ikr
					FROM (
					SELECT a.key_fal , a.tgl_fal_datetime ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.modem, a.kabel1, a.kabel2, a.kabel3, a.pic_ikr FROM tbl_fal a 
					WHERE a.status_wo in ('Sudah Terpasang') and TIME(a.tgl_fal_datetime) 
					BETWEEN '08:00:00' and '09:59:59' and DATE(a.tgl_fal_datetime) = DATE('$tanggal_hari_ini')
					union all
					SELECT b.key_fal , b.tgl_date_time as tgl_fal_datetime ,b.username_Maintenance as username_fal ,b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.modem, b.kabel1, b.kabel2, b.kabel3, b.pic_ikr FROM tbl_maintenance b 
					WHERE b.status_wo in ('Sudah Terpasang') and TIME(b.tgl_date_time) 
					BETWEEN '08:00:00' and '09:59:59' and DATE(b.tgl_date_time) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_fal , c.tgl_sign as tgl_fal_datetime ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 0 as tlp_fal, c.kd_layanan, c.modem, c.kabel1,c.kabel2,c.kabel3, c.pic_ikr FROM tbl_maintenance_odp c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '08:00:00' and '09:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_ODP' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem, '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_odp c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '08:00:00' and '09:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_DISTRIBUSI' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_distribusi c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '08:00:00' and '09:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_backbone , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_backbone, 'INSTALASI_BACKBONE' as jenis_wo, 0 as tlp_fal, c.kd_layanan_backbone, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr_backbone FROM tbl_backbone c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '08:00:00' and '09:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					) AS combined_logs ORDER BY tgl_fal_datetime DESC;");
					
				
				$no=1;
			  while ($row = mysqli_fetch_assoc($table)){ 
			  
			  if ($row['jenis_wo'] == 'INSTALASI'){
				  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
				  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
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
			  
			  $i=0;
			  ?>
			  <tr id=<?php echo $row['key_fal']; ?>">
				<td> <?php echo $no; ?></td>
				<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
				<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
				<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
				<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
				<td data-target="modem"> <?php echo $row['modem'];?></td>
				<td data-target="kabel1"> <?php echo $row['kabel1'];?></td>
				<td data-target="kabel2"> <?php echo $row['kabel2'];?></td>
				<td data-target="kabel3"> <?php echo $row['kabel3'];?></td>
				<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
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
			  </br>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>
	
	<div class="modal fade" id="modal_solv3"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
					<form role="form" method="post" data-id="formdatapengguna">
					<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">List Working Solved</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table table-bordered" id="tabel_ikr" width="100%" cellspacing="0">
					  <thead>
						<tr>
						<th>NO</th>						
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>						
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>kabel1</th>
						<th>kabel2</th>
						<th>kabel3</th>
						<th>pic</th>
					  </thead>
					  <tfoot>
						<tr>
						<th>NO</th>						
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>						
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>kabel1</th>
						<th>kabel2</th>
						<th>kabel3</th>
						<th>pic</th>
						</tr>
					  </tfoot>
					  <tbody> 
						<?php 
				  include('controller/controller_mysqli.php');
				  $acces_user_log = $_SESSION["username"];
				$tanggal_hari_ini = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');	
					//echo '2';					
					$table = mysqli_query($koneksi,"SELECT key_fal, tgl_fal_datetime, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, modem, kabel1, kabel2, kabel3, pic_ikr
					FROM (
					SELECT a.key_fal , a.tgl_fal_datetime ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.modem, a.kabel1, a.kabel2, a.kabel3, a.pic_ikr FROM tbl_fal a 
					WHERE a.status_wo in ('Sudah Terpasang') and TIME(a.tgl_fal_datetime) 
					BETWEEN '10:00:00' and '12:59:59' and DATE(a.tgl_fal_datetime) = DATE('$tanggal_hari_ini')
					union all
					SELECT b.key_fal , b.tgl_date_time as tgl_fal_datetime ,b.username_Maintenance as username_fal ,b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.modem, b.kabel1, b.kabel2, b.kabel3, b.pic_ikr FROM tbl_maintenance b 
					WHERE b.status_wo in ('Sudah Terpasang') and TIME(b.tgl_date_time) 
					BETWEEN '10:00:00' and '12:59:59' and DATE(b.tgl_date_time) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_fal , c.tgl_sign as tgl_fal_datetime ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 0 as tlp_fal, c.kd_layanan, c.modem, c.kabel1,c.kabel2,c.kabel3, c.pic_ikr FROM tbl_maintenance_odp c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '10:00:00' and '12:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_ODP' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem, '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_odp c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '10:00:00' and '12:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_DISTRIBUSI' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_distribusi c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '10:00:00' and '12:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_backbone , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_backbone, 'INSTALASI_BACKBONE' as jenis_wo, 0 as tlp_fal, c.kd_layanan_backbone, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr_backbone FROM tbl_backbone c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '10:00:00' and '12:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					) AS combined_logs ORDER BY tgl_fal_datetime DESC;");				
				
				$no=1;
			  while ($row = mysqli_fetch_assoc($table)){ 
			  
			  if ($row['jenis_wo'] == 'INSTALASI'){
				  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
				  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
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
			  
			  $i=0;
			  ?>
			  <tr id=<?php echo $row['key_fal']; ?>">
				<td> <?php echo $no; ?></td>
				<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
				<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
				<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
				<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
				<td data-target="modem"> <?php echo $row['modem'];?></td>
				<td data-target="kabel1"> <?php echo $row['kabel1'];?></td>
				<td data-target="kabel2"> <?php echo $row['kabel2'];?></td>
				<td data-target="kabel3"> <?php echo $row['kabel3'];?></td>
				<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
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
			  </br>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>
	
	<div class="modal fade" id="modal_solv4"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
					<form role="form" method="post" data-id="formdatapengguna">
					<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">List Working Solved</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table table-bordered" id="tabel_ikr" width="100%" cellspacing="0">
					  <thead>
						<tr>
						<th>NO</th>						
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>						
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>kabel1</th>
						<th>kabel2</th>
						<th>kabel3</th>
						<th>pic</th>
					  </thead>
					  <tfoot>
						<tr>
						<th>NO</th>						
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>						
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>kabel1</th>
						<th>kabel2</th>
						<th>kabel3</th>
						<th>pic</th>
						</tr>
					  </tfoot>
					  <tbody> 
						<?php 
			  include('controller/controller_mysqli.php');
			  $acces_user_log = $_SESSION["username"];
			  $tanggal_hari_ini = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
					//echo '2';
					$table = mysqli_query($koneksi,"SELECT key_fal, tgl_fal_datetime, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, modem, kabel1, kabel2, kabel3, pic_ikr
					FROM (
					SELECT a.key_fal , a.tgl_fal_datetime ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.modem, a.kabel1, a.kabel2, a.kabel3, a.pic_ikr FROM tbl_fal a 
					WHERE a.status_wo in ('Sudah Terpasang') and TIME(a.tgl_fal_datetime) 
					BETWEEN '13:00:00' and '14:59:59' and DATE(a.tgl_fal_datetime) = DATE('$tanggal_hari_ini')
					union all
					SELECT b.key_fal , b.tgl_date_time as tgl_fal_datetime ,b.username_Maintenance as username_fal ,b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.modem, b.kabel1, b.kabel2, b.kabel3, b.pic_ikr FROM tbl_maintenance b 
					WHERE b.status_wo in ('Sudah Terpasang') and TIME(b.tgl_date_time) 
					BETWEEN '13:00:00' and '14:59:59' and DATE(b.tgl_date_time) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_fal , c.tgl_sign as tgl_fal_datetime ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 0 as tlp_fal, c.kd_layanan, c.modem, c.kabel1,c.kabel2,c.kabel3, c.pic_ikr FROM tbl_maintenance_odp c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '13:00:00' and '14:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_ODP' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem, '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_odp c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '13:00:00' and '14:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_DISTRIBUSI' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_distribusi c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '13:00:00' and '14:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_backbone , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_backbone, 'INSTALASI_BACKBONE' as jenis_wo, 0 as tlp_fal, c.kd_layanan_backbone, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr_backbone FROM tbl_backbone c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '13:00:00' and '14:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					) AS combined_logs ORDER BY tgl_fal_datetime DESC;");
				
				$no=1;
			  while ($row = mysqli_fetch_assoc($table)){ 
			  
			  if ($row['jenis_wo'] == 'INSTALASI'){
				  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
				  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
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
			  
			  $i=0;
			  ?>
			  <tr id=<?php echo $row['key_fal']; ?>">
				<td> <?php echo $no; ?></td>
				<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
				<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
				<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
				<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
				<td data-target="modem"> <?php echo $row['modem'];?></td>
				<td data-target="kabel1"> <?php echo $row['kabel1'];?></td>
				<td data-target="kabel2"> <?php echo $row['kabel2'];?></td>
				<td data-target="kabel3"> <?php echo $row['kabel3'];?></td>
				<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
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
			  </br>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>
	
	<div class="modal fade" id="modal_solv5"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
					<form role="form" method="post" data-id="formdatapengguna">
					<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">List Working Solved</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table table-bordered" id="tabel_ikr" width="100%" cellspacing="0">
					  <thead>
						<tr>
						<th>NO</th>						
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>						
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>kabel1</th>
						<th>kabel2</th>
						<th>kabel3</th>
						<th>pic</th>
					  </thead>
					  <tfoot>
						<tr>
						<th>NO</th>						
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>						
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>kabel1</th>
						<th>kabel2</th>
						<th>kabel3</th>
						<th>pic</th>
						</tr>
					  </tfoot>
					  <tbody> 
						<?php 
			  include('controller/controller_mysqli.php');
			  $acces_user_log = $_SESSION["username"];
			  $tanggal_hari_ini = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
				//echo '2';

					$table = mysqli_query($koneksi,"SELECT key_fal, tgl_fal_datetime, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, modem, kabel1, kabel2, kabel3, pic_ikr
					FROM (
					SELECT a.key_fal , a.tgl_fal_datetime ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.modem, a.kabel1, a.kabel2, a.kabel3, a.pic_ikr FROM tbl_fal a 
					WHERE a.status_wo in ('Sudah Terpasang') and TIME(a.tgl_fal_datetime) 
					BETWEEN '15:00:00' and '17:59:59' and DATE(a.tgl_fal_datetime) = DATE('$tanggal_hari_ini')
					union all
					SELECT b.key_fal , b.tgl_date_time as tgl_fal_datetime ,b.username_Maintenance as username_fal ,b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.modem, b.kabel1, b.kabel2, b.kabel3, b.pic_ikr FROM tbl_maintenance b 
					WHERE b.status_wo in ('Sudah Terpasang') and TIME(b.tgl_date_time) 
					BETWEEN '15:00:00' and '17:59:59' and DATE(b.tgl_date_time) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_fal , c.tgl_sign as tgl_fal_datetime ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 0 as tlp_fal, c.kd_layanan, c.modem, c.kabel1,c.kabel2,c.kabel3, c.pic_ikr FROM tbl_maintenance_odp c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '15:00:00' and '17:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_ODP' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem, '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_odp c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '15:00:00' and '17:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_DISTRIBUSI' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_distribusi c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '15:00:00' and '17:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_backbone , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_backbone, 'INSTALASI_BACKBONE' as jenis_wo, 0 as tlp_fal, c.kd_layanan_backbone, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr_backbone FROM tbl_backbone c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '15:00:00' and '17:59:59' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					) AS combined_logs ORDER BY tgl_fal_datetime DESC;");
				
				$no=1;
			  while ($row = mysqli_fetch_assoc($table)){ 
			  
			  if ($row['jenis_wo'] == 'INSTALASI'){
				  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
				  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
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
			  
			  $i=0;
			  ?>
			  <tr id=<?php echo $row['key_fal']; ?>">
				<td> <?php echo $no; ?></td>
				<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
				<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
				<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
				<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
				<td data-target="modem"> <?php echo $row['modem'];?></td>
				<td data-target="kabel1"> <?php echo $row['kabel1'];?></td>
				<td data-target="kabel2"> <?php echo $row['kabel2'];?></td>
				<td data-target="kabel3"> <?php echo $row['kabel3'];?></td>
				<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
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
			  </br>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>
	
	<div class="modal fade" id="modal_solv6"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
					<form role="form" method="post" data-id="formdatapengguna">
					<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">List Working Solved</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table table-bordered" id="tabel_ikr" width="100%" cellspacing="0">
					  <thead>
						<tr>
						<th>NO</th>						
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>						
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>kabel1</th>
						<th>kabel2</th>
						<th>kabel3</th>
						<th>pic</th>
					  </thead>
					  <tfoot>
						<tr>
						<th>NO</th>						
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>						
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>kabel1</th>
						<th>kabel2</th>
						<th>kabel3</th>
						<th>pic</th>
						</tr>
					  </tfoot>
					  <tbody> 
						<?php 
			  include('controller/controller_mysqli.php');
			  $acces_user_log = $_SESSION["username"];
			  $tanggal_hari_ini = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
					
					$table = mysqli_query($koneksi,"SELECT key_fal, tgl_fal_datetime, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, modem, kabel1, kabel2, kabel3, pic_ikr
					FROM (
					SELECT a.key_fal , a.tgl_fal_datetime ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.modem, a.kabel1, a.kabel2, a.kabel3, a.pic_ikr FROM tbl_fal a 
					WHERE a.status_wo in ('Sudah Terpasang') and TIME(a.tgl_fal_datetime) 
					BETWEEN '18:00:00' and '20:00:00' and DATE(a.tgl_fal_datetime) = DATE('$tanggal_hari_ini')
					union all
					SELECT b.key_fal , b.tgl_date_time as tgl_fal_datetime ,b.username_Maintenance as username_fal ,b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.modem, b.kabel1, b.kabel2, b.kabel3, b.pic_ikr FROM tbl_maintenance b 
					WHERE b.status_wo in ('Sudah Terpasang') and TIME(b.tgl_date_time) 
					BETWEEN '18:00:00' and '20:00:00' and DATE(b.tgl_date_time) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_fal , c.tgl_sign as tgl_fal_datetime ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 0 as tlp_fal, c.kd_layanan, c.modem, c.kabel1,c.kabel2,c.kabel3, c.pic_ikr FROM tbl_maintenance_odp c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '18:00:00' and '20:00:00' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_ODP' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem, '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_odp c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '18:00:00' and '20:00:00' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_odp , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_odp, 'INSTALASI_DISTRIBUSI' as jenis_wo, 0 as tlp_fal, c.kd_layanan, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr FROM tbl_distribusi c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '18:00:00' and '20:00:00' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					union all
					SELECT c.key_backbone , c.tgl_sign as tgl_fal_datetime ,'-' as username_fal ,c.nama_backbone, 'INSTALASI_BACKBONE' as jenis_wo, 0 as tlp_fal, c.kd_layanan_backbone, '-' as modem,  '-' as kabel1, '-' as kabel2, '-' as kabel3, c.pic_ikr_backbone FROM tbl_backbone c 
					WHERE c.status_wo in ('Sudah Terpasang') and TIME(c.tgl_sign) 
					BETWEEN '18:00:00' and '20:00:00' and DATE(c.tgl_sign) = DATE('$tanggal_hari_ini')
					) AS combined_logs ORDER BY tgl_fal_datetime DESC;");
				
				$no=1;
			 while ($row = mysqli_fetch_assoc($table)){ 
			  
			  if ($row['jenis_wo'] == 'INSTALASI'){
				  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
				  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
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
			  
			  $i=0;
			  ?>
			  <tr id=<?php echo $row['key_fal']; ?>">
				<td> <?php echo $no; ?></td>
				<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
				<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
				<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
				<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
				<td data-target="modem"> <?php echo $row['modem'];?></td>
				<td data-target="kabel1"> <?php echo $row['kabel1'];?></td>
				<td data-target="kabel2"> <?php echo $row['kabel2'];?></td>
				<td data-target="kabel3"> <?php echo $row['kabel3'];?></td>
				<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
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
			  </br>
			  
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>
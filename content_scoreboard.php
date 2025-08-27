<div class="row">
<div class="col-xl-8 col-md-6 mb-4">
<div class="card border-left-primary shadow h-100 py-2">
<div class="card-header py-3">
  <h6 class="m-0 font-weight-bold text-primary">SCORE BOT WORKING ORDER</h6>
</div>
	<div class="card-body">
		<div class="row no-gutters align-items-center">
			
			<div class="col mr-2">
				<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
					Teknisi Aktif
				</div>
				<div class="h5 mb-0 font-weight-bold text-gray-800">
					<?php
						include('controller/controller_mysqli.php');

						if (mysqli_connect_errno()) {
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						if(( $kota == 'mlg') or ($kota == 'batu') or ($kota == 'mlg1')){
							$sql = "SELECT jumlah_hijau FROM baris_kotak 
								WHERE area in ('mlg','batu','mlg1') and baris_no = '1' 
								AND YEAR(tanggal) = YEAR(NOW()) 
								AND MONTH(tanggal) = MONTH(NOW()) 
								AND DAY(tanggal) = DAY(NOW());";
						} elseif ( $kota == 'pas'){
							$sql = "SELECT jumlah_hijau FROM baris_kotak 
								WHERE area = 'pas' and baris_no = '1' 
								AND YEAR(tanggal) = YEAR(NOW()) 
								AND MONTH(tanggal) = MONTH(NOW()) 
								AND DAY(tanggal) = DAY(NOW());";
						}

						if ($result = mysqli_query($koneksi, $sql)) {
							$row = mysqli_fetch_array($result);
							echo $row[0];
							mysqli_free_result($result);
						} else {
							echo "Error: " . mysqli_error($koneksi);
						}

						mysqli_close($koneksi);
					?>
				</div>
			</div>

			
			<div class="col mr-2">
				<div class="text-xs font-weight-bold text-info text-uppercase mb-1">ENTRY  
				</div>
				<div class="row no-gutters align-items-center">
					<div class="col-auto">
						<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
					include('controller/controller_mysqli.php');
					if (mysqli_connect_errno())
					  {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					  }							  
					if( $kota == 'mlg'){
							$sql="SELECT ((SELECT COUNT(*) as total_9 FROM keluhan WHERE kd_kom in ('mlg','mlg1','batu') and `status` in ('Visit') and YEAR(tanggal) = YEAR(NOW()) and MONTH(tanggal) = MONTH(NOW()) and DAY(tanggal) = DAY(NOW())) + 
								(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE kd_layanan in ('mlg','mlg1','batu') and status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
								(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE kd_layanan in ('mlg','mlg1','batu') and status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
								(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE kd_layanan_backbone in ('mlg','mlg1','batu') and status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
								(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE kd_layanan in ('mlg','mlg1','batu') and status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))) as hasil;";
								
							$sql_daf="SELECT ((SELECT COUNT(*) as total_9 FROM tb_daf WHERE layanan in ('mlg','mlg1','batu') and status = 'n' and YEAR(tanggal) = YEAR(NOW()) and MONTH(tanggal) = MONTH(NOW()) and DAY(tanggal) = DAY(NOW())) + 
									(SELECT COUNT(*) as total_9 FROM tb_mgm WHERE layanan in ('mlg','mlg1','batu') and status = 'n' and YEAR(tanggal) = YEAR(NOW()) and MONTH(tanggal) = MONTH(NOW()) and DAY(tanggal) = DAY(NOW()))) as hasil;";
						} elseif ( $kota == 'pas'){
							$sql="SELECT ((SELECT COUNT(*) as total_9 FROM keluhan WHERE kd_kom	 in ('pas') and `status` in ('Visit') and YEAR(tanggal) = YEAR(NOW()) and MONTH(tanggal) = MONTH(NOW()) and DAY(tanggal) = DAY(NOW())) + 
								(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE kd_layanan in ('pas') and status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
								(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE kd_layanan in ('pas') and status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
								(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE kd_layanan_backbone in ('pas') and status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
								(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE kd_layanan in ('pas') and status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))) as hasil;";
								
							$sql_daf="SELECT ((SELECT COUNT(*) as total_9 FROM tb_daf WHERE layanan in ('pas') and status = 'n' and YEAR(tanggal) = YEAR(NOW()) and MONTH(tanggal) = MONTH(NOW()) and DAY(tanggal) = DAY(NOW())) + 
							(SELECT COUNT(*) as total_9 FROM tb_mgm WHERE layanan in ('pas') and status = 'n' and YEAR(tanggal) = YEAR(NOW()) and MONTH(tanggal) = MONTH(NOW()) and DAY(tanggal) = DAY(NOW()))) as hasil;";
						}

					
					$result = mysqli_query($koneksi, $sql);
					if ($result) {
						$row = mysqli_fetch_array($result);
						$hasil_1 = isset($row['hasil']) ? (int)$row['hasil'] : 0;
					} else {
						echo "Error query SQL: " . mysqli_error($koneksi);
						$hasil_1 = 0;
					}

					$result_daf = mysqli_query($koneksi_daf, $sql_daf);
					if ($result_daf) {
						$row_daf = mysqli_fetch_array($result_daf);
						$hasil_2 = isset($row_daf['hasil']) ? (int)$row_daf['hasil'] : 0;
					} else {
						echo "Error query SQL_DAF: " . mysqli_error($koneksi_daf);
						$hasil_2 = 0;
					}

					// Hitung hasil akhir
					$hasile = $hasil_1 + $hasil_2;
					echo $hasile;

					// Tutup koneksi
					mysqli_close($koneksi);
					mysqli_close($koneksi_daf);


					?></div>
					</div>
					
				</div>
			</div>
			
			<div class="col mr-2">
				<div class="text-xs font-weight-bold text-info text-uppercase mb-1">POST WO 
				</div>
				<div class="row no-gutters align-items-center">
					<div class="col-auto">
						<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
					include('controller/controller_mysqli.php');
					if (mysqli_connect_errno())

					  {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					  }

					$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE kd_layanan in ('mlg','mlg1','batu') and status_wo in ('Belum Terpasang') and YEAR(tgl_fal_datetime) = YEAR( NOW()) and MONTH(tgl_fal_datetime) = MONTH(NOW()) and DAY(tgl_fal_datetime) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE kd_layanan in ('mlg','mlg1','batu') and status_wo in ('Belum Terpasang') and YEAR(tgl_date_time) = YEAR(NOW()) and MONTH(tgl_date_time) = MONTH(NOW()) and DAY(tgl_date_time) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE kd_layanan in ('mlg','mlg1','batu') and status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE kd_layanan in ('mlg','mlg1','batu') and status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE kd_layanan_backbone in ('mlg','mlg1','batu') and  status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE kd_layanan in ('mlg','mlg1','batu') and  status_wo in ('Belum Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))) as hasil;";

					$result=mysqli_query($koneksi,$sql);

					$row=mysqli_fetch_array($result);

					echo "$row[0]";

					mysqli_close($koneksi);

					?></div>
					</div>
					
				</div>
			</div>
			
			 <div class="col mr-2">
				<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Process 
				</div>
				<div class="row no-gutters align-items-center">
					<div class="col-auto">
						<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

					include('controller/controller_mysqli.php');

					if (mysqli_connect_errno())

					  {

					  echo "Failed to connect to MySQL: " . mysqli_connect_error();

					  }

					$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Proses Pengerjaan') and YEAR(tgl_fal_datetime) = YEAR( NOW()) and MONTH(tgl_fal_datetime) = MONTH(NOW()) and DAY(tgl_fal_datetime) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Proses Pengerjaan') and YEAR(tgl_date_time) = YEAR(NOW()) and MONTH(tgl_date_time) = MONTH(NOW()) and DAY(tgl_date_time) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Proses Pengerjaan') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Proses Pengerjaan') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE kd_layanan_backbone in ('mlg','mlg1','batu') and   status_wo in ('Proses Pengerjaan') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Proses Pengerjaan') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))) as hasil;";

					$result=mysqli_query($koneksi,$sql);

					$row=mysqli_fetch_array($result);

					echo "$row[0]";

					mysqli_close($koneksi);

					?></div>
					</div>
					
				</div>
			</div>
			
			<div class="col mr-2">
				<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Solved
				</div>
				<div class="row no-gutters align-items-center">
					<div class="col-auto">
						<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

					include('controller/controller_mysqli.php');

					if (mysqli_connect_errno())

					  {

					  echo "Failed to connect to MySQL: " . mysqli_connect_error();

					  }

					$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Sudah Terpasang') and YEAR(tgl_fal_datetime) = YEAR( NOW()) and MONTH(tgl_fal_datetime) = MONTH(NOW()) and DAY(tgl_fal_datetime) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Sudah Terpasang') and YEAR(tgl_date_time) = YEAR(NOW()) and MONTH(tgl_date_time) = MONTH(NOW()) and DAY(tgl_date_time) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Sudah Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Sudah Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE kd_layanan_backbone in ('mlg','mlg1','batu') and   status_wo in ('Sudah Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Sudah Terpasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))) as hasil;";

					$result=mysqli_query($koneksi,$sql);

					$row=mysqli_fetch_array($result);

					echo "$row[0]";

					mysqli_close($koneksi);

					?></div>
					</div>
					
				</div>
			</div>
			
			<div class="col mr-2">
				<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pending
				</div>
				<div class="row no-gutters align-items-center">
					<div class="col-auto">
						<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

					include('controller/controller_mysqli.php');

					if (mysqli_connect_errno())

					  {

					  echo "Failed to connect to MySQL: " . mysqli_connect_error();

					  }

					$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Pending') and YEAR(tgl_fal) = YEAR( NOW()) and MONTH(tgl_fal) = MONTH(NOW()) and DAY(tgl_fal) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Pending') and YEAR(tgl_fal) = YEAR(NOW()) and MONTH(tgl_fal) = MONTH(NOW()) and DAY(tgl_fal) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE status_wo in ('Pending') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Pending') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE kd_layanan_backbone in ('mlg','mlg1','batu') and   status_wo in ('Pending') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Pending') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))) as hasil;";

					$result=mysqli_query($koneksi,$sql);

					$row=mysqli_fetch_array($result);

					echo "$row[0]";

					mysqli_close($koneksi);

					?></div>
					</div>
					
				</div>
			</div>
			
			<div class="col mr-2">
				<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Rescedule
				</div>
				<div class="row no-gutters align-items-center">
					<div class="col-auto">
						<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

					include('controller/controller_mysqli.php');

					if (mysqli_connect_errno())

					  {

					  echo "Failed to connect to MySQL: " . mysqli_connect_error();

					  }

					$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE rscd_stts = 'y' and status_wo in ('Belum Terpasang') and YEAR(tgl_fal) = YEAR( NOW()) and MONTH(tgl_fal) = MONTH(NOW()) and DAY(tgl_fal) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE rscd_stts = 'y' and status_wo in ('Belum Terpasang') and YEAR(tgl_fal) = YEAR(NOW()) and MONTH(tgl_fal) = MONTH(NOW()) and DAY(tgl_fal) = DAY(NOW()))) as hasil;";

					$result=mysqli_query($koneksi,$sql);

					$row=mysqli_fetch_array($result);

					echo "$row[0]";

					mysqli_close($koneksi);

					?></div>
					</div>
					
				</div>
			</div>
			
			<div class="col mr-2">
				<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Batal
				</div>
				<div class="row no-gutters align-items-center">
					<div class="col-auto">
						<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

					include('controller/controller_mysqli.php');

					if (mysqli_connect_errno())

					  {

					  echo "Failed to connect to MySQL: " . mysqli_connect_error();

					  }

					$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Batal Pasang') and YEAR(tgl_fal_datetime) = YEAR( NOW()) and MONTH(tgl_fal_datetime) = MONTH(NOW()) and DAY(tgl_fal_datetime) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Batal Pasang') and YEAR(tgl_date_time) = YEAR(NOW()) and MONTH(tgl_date_time) = MONTH(NOW()) and DAY(tgl_date_time) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Batal Pasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Batal Pasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE kd_layanan_backbone in ('mlg','mlg1','batu') and   status_wo in ('Batal Pasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE kd_layanan in ('mlg','mlg1','batu') and   status_wo in ('Batal Pasang') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))) as hasil;";

					$result=mysqli_query($koneksi,$sql);

					$row=mysqli_fetch_array($result);

					echo "$row[0]";

					mysqli_close($koneksi);

					?></div>
					</div>
					
				</div>
			</div>
			
			 <div class="col mr-2">
				<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
					All WO</div>
				<div class="h5 mb-0 font-weight-bold text-gray-800"><div class="row no-gutters align-items-center">
					<div class="col-auto">
						<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php

					include('controller/controller_mysqli.php');

					if (mysqli_connect_errno())

					  {

					  echo "Failed to connect to MySQL: " . mysqli_connect_error();

					  }
					  
					if($kota == 'mlg' or $kota == 'batu' or $kota == 'mlg1'){
						$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE kd_layanan in ('mlg','batu','mlg1') and YEAR(tgl_fal_datetime) = YEAR( NOW()) and MONTH(tgl_fal_datetime) = MONTH(NOW()) and DAY(tgl_fal_datetime) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE kd_layanan in ('mlg','batu','mlg1') and YEAR(tgl_date_time) = YEAR(NOW()) and MONTH(tgl_date_time) = MONTH(NOW()) and DAY(tgl_date_time) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE kd_layanan in ('mlg','batu','mlg1') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))+
						(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE kd_layanan in ('mlg','batu','mlg1') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))+
						(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE kd_layanan in ('mlg','batu','mlg1') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))+
						(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE kd_layanan_backbone in ('mlg','batu','mlg1') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))
) as hasil;";
					}elseif($kota == 'pas'){
						$sql="SELECT ((SELECT COUNT(*) as total_9 FROM tbl_fal WHERE kd_layanan in ('pas') and YEAR(tgl_fal_datetime) = YEAR( NOW()) and MONTH(tgl_fal_datetime) = MONTH(NOW()) and DAY(tgl_fal_datetime) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance WHERE kd_layanan in ('pas') and YEAR(tgl_date_time) = YEAR(NOW()) and MONTH(tgl_date_time) = MONTH(NOW()) and DAY(tgl_date_time) = DAY(NOW())) + 
						(SELECT COUNT(*) as total_9 FROM tbl_maintenance_odp WHERE kd_layanan in ('pas') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))+
						(SELECT COUNT(*) as total_9 FROM tbl_odp WHERE kd_layanan in ('pas') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))+
						(SELECT COUNT(*) as total_9 FROM tbl_distribusi WHERE kd_layanan in ('pas') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))+
						(SELECT COUNT(*) as total_9 FROM tbl_backbone WHERE kd_layanan_backbone in ('pas') and YEAR(tgl_sign) = YEAR(NOW()) and MONTH(tgl_sign) = MONTH(NOW()) and DAY(tgl_sign) = DAY(NOW()))
) as hasil;";
					}
					$result=mysqli_query($koneksi,$sql);

					$row=mysqli_fetch_array($result);

					echo "$row[0]";

					mysqli_close($koneksi);

					?></div>
					</div>
					
				</div></div>
			</div>
		</div>
	</div>
</div>
</div>
			</div>
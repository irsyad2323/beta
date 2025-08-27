<!-- Begin Page Content -->
						<div class="container-fluid">

						  <!-- Page Heading 
						  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
						  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
							-->
						  <!-- DataTales Example -->
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data Pendaftaran</h6>
							</div>
							<div class="modal-footer">
								<div class="dropdown">
								  <button class="btn btn-info dropdown-toggle" type="button" data-id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									ACTION INSERT
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<button type="button" name="edit" class="dropdown-item insertinsodp">Insert Instalasi ODP</button>
									<button type="button" name="edit" class="dropdown-item insertinsdis">Insert Instalasi Distribusi</button>						<button type="button" name="edit" class="dropdown-item insertinscor">Insert Correctiv</button>	
								</div>
								</div>
							  </div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna_pas" width="100%" cellspacing="0">
								  <thead>
									<tr>
									  <th>Key</th>
									  <th>TANGGAL FAL</th>
									  <th>MGM</th>
									  <th>LAYANAN</th>
									  <th>NAMA</th>
									  <th>NO WA</th>
									  <th>PAKET</th>
									  <th>ACTION</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									  <th>Key</th>
									  <th>TANGGAL FAL</th>
									  <th>MGM</th>
									  <th>LAYANAN</th>
									  <th>NAMA</th>
									  <th>NO WA</th>	
									  <th>PAKET</th>
									  <th>ACTION</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
										  include('controller/controller_daf.php');
										  $acces_user_log = $_SESSION["username"];
										  $table = mysqli_query($koneksi,"SELECT key_fal,rt,rw,provinsi,kabupaten,kecamatan,kelurahan, status_lokasi,nama_sobat,metode_pembayaran,no_rekening,an_rek,wa_sobat,mgm,paket_kapten,nama_lengkap,alamat,no_wa,no_wa2,no_wa3,no_wa4,patokan,foto_ktp,foto_rumah, tahu_layanan,
											alasan,lokasi, layanan, nama_provinsi, nama_kabkota, nama_kec, nama_kec, nama_kel, tanggal FROM
											(SELECT a.key_fal,a.rt,a.rw,a.provinsi,a.kabupaten,a.kecamatan,a.kelurahan, a.status_lokasi,'-' as nama_sobat, '-' as metode_pembayaran, '-' as no_rekening, '-' as an_rek, '-' as wa_sobat, 'reguler' as mgm, a.paket_kapten ,a.nama_lengkap, a.alamat, a.no_wa, a.no_wa2, a.no_wa3, a.no_wa4, a.patokan, a.foto_ktp, a.foto_rumah, a.tahu_layanan,
											a.alasan, a.lokasi, a.layanan ,b.nama_provinsi, c.nama_kabkota, d.nama_kec, e.nama_kel, a.tanggal FROM 
											tb_daf a
											LEFT JOIN tb_provinsi b on a.provinsi = b.kd_provinsi
											LEFT JOIN tb_kabkota c on a.kabupaten = c.kd_kabkota
											LEFT JOIN tb_kecamatan d on a.kecamatan = d.kd_kec
											LEFT JOIN tb_kelurahan e on a.kelurahan =  e.kd_kel
											WHERE a.status='n' and a.kabupaten = d.kd_kabkota AND d.kd_kec = e.kd_kec 
											and c.kd_kabkota = e.kd_kabkota and a.layanan = 'pas' GROUP BY a.key_fal DESC 

											union all

											SELECT a.key_fal, a.rt,a.rw,a.provinsi,a.kabupaten,a.kecamatan,a.kelurahan, a.status_lokasi, a.nama_sobat, a.metode_pembayaran, a.no_rekening, a.an_rek, a.wa_sobat, 'mgm' as mgm, a.paket_kapten ,a.nama_lengkap, a.alamat, a.no_wa, a.no_wa2, a.no_wa3, a.no_wa4, a.patokan, a.foto_ktp, a.foto_rumah, a.tahu_layanan,
											a.alasan, a.lokasi, a.layanan ,b.nama_provinsi, c.nama_kabkota, d.nama_kec, e.nama_kel, a.tanggal FROM 
											tb_mgm a
											LEFT JOIN tb_provinsi b on a.provinsi = b.kd_provinsi
											LEFT JOIN tb_kabkota c on a.kabupaten = c.kd_kabkota
											LEFT JOIN tb_kecamatan d on a.kecamatan = d.kd_kec
											LEFT JOIN tb_kelurahan e on a.kelurahan =  e.kd_kel
											WHERE a.status='n' and a.kabupaten = d.kd_kabkota AND d.kd_kec = e.kd_kec 
											and c.kd_kabkota = e.kd_kabkota and a.layanan = 'pas' GROUP BY a.key_fal DESC 
											) AS combined_logs GROUP BY alamat ORDER BY tanggal DESC;");
											$i=1;
										  while ($row = mysqli_fetch_assoc($table)){ 
										  
												if ($row['layanan'] == 'mlg'){
														  $row['jenis_unit'] = '<small class="badge badge-warning">Naratel</small>';
													  }elseif ($row['layanan'] == 'pas'){
														  $row['jenis_unit'] = '<small class="badge badge-danger">SBM</small>';
													  }elseif ($row['layanan'] == 'batu'){
														  $row['jenis_unit'] = '<small class="badge badge-dark">Jalibar</small>';
													  }elseif ($row['layanan'] == 'mlg1'){
														  $row['jenis_unit'] = '<small class="badge badge-primary">Jalantra</small>';
													  }
													  
												if ($row['mgm'] == 'reguler'){
														  $row['mgm_stt'] = '<small class="badge badge-dark">Reguler</small>';
													  }elseif ($row['mgm'] == 'mgm'){
														  $row['mgm_stt'] = '<small class="badge badge-danger">MGM</small>';
													  }
										  
										  $no=1;
										  
										  ?>
										  <tr id=<?php echo $row['key_fal']; ?>">
											<td data-target="i"> <?php echo $i;?></td>
											<td data-target="tanggal"> <?php echo $row['tanggal'];?></td>
											<td data-target="mgm_stt"> <?php echo $row['mgm_stt'];?></td>
											<td data-target="jenis_unit"> <?php echo $row['jenis_unit'];?></td>
											<td data-target="nama_lengkap"> <?php echo $row['nama_lengkap'];?></td>
											<td data-target="no_wa"> <?php echo $row['no_wa'];?></td>
											<td data-target="paket_kapten"> <?php echo $row['paket_kapten'];?></td>
											<td>
												<div class="dropdown">
												  <button class="btn btn-info dropdown-toggle" type="button" data-id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													ACTION
												  </button>
												  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a href="https://pendaftaran.kaptennaratel.com/Foto_KTP/<?php echo $row['foto_ktp'];?>" target="_blank" class="dropdown-item">
														Foto KTP</a>
												    <a href="https://pendaftaran.kaptennaratel.com/Foto_Rumah/<?php echo $row['foto_rumah'];?>" target="_blank" class="dropdown-item">
														Foto Rumah</a>
												    <a href="<?php echo $row['lokasi'];?>" target="_blank" class="dropdown-item">
														Maps</a>
												    <button type="button" name="edit" data-id="<?php echo $row['key_fal'];?>"
														nama_lengkap="<?php echo $row['nama_lengkap'];?>"							
														no_wa="<?php echo $row['no_wa'];?>"							
														no_wa2="<?php echo $row['no_wa2'];?>"							
														no_wa3="<?php echo $row['no_wa3'];?>"							
														no_wa4="<?php echo $row['no_wa4'];?>"							
														key_fal="<?php echo $row['key_fal'];?>"
														alamat="<?php echo $row['alamat'];?>"
														rt1="<?php echo $row['rt'];?>"
														rw="<?php echo $row['rw'];?>"
														provinsi="<?php echo $row['provinsi'];?>"
														kabupaten="<?php echo $row['kabupaten'];?>"
														kecamatan="<?php echo $row['kecamatan'];?>"
														kelurahan="<?php echo $row['kelurahan'];?>"
														foto_rumah="<?php echo $row['foto_rumah'];?>"
														foto_ktp="<?php echo $row['foto_ktp'];?>"
														paket_kapten="<?php echo $row['paket_kapten'];?>"
														lokasi="<?php echo $row['lokasi'];?>"
														status_lokasi="<?php echo $row['status_lokasi'];?>"
														tahu_layanan="<?php echo $row['tahu_layanan'];?>"
														alasan="<?php echo $row['alasan'];?>"
														nama_sobat="<?php echo $row['nama_sobat'];?>"
														no_rekening="<?php echo $row['no_rekening'];?>"
														metode_pembayaran="<?php echo $row['metode_pembayaran'];?>"
														nama_kel="<?php echo $row['nama_kel'];?>"
														mgm="<?php echo $row['mgm'];?>"
														layanan="<?php echo $row['layanan'];?>"
														class="dropdown-item editpendaftaran">Post WO</button>
																<button type="button" name="edit" data-id="<?php echo $row['key_fal'];?>"
														key_fal="<?php echo $row['key_fal'];?>"							
														class="dropdown-item deletepengguna">Delete</button>
														<!-- a name="edit" data-id="<?php echo $row['key_fal'];?>"
														key_fal="<?php echo $row['key_fal'];?>"
														status_wo="<?php echo $row['status_wo'];?>"
														lain_lain="<?php echo $row['lain_lain'];?>"
														class="dropdown-item perijinan">Solved</a -->
														
												  </div>
												</div>
											</td>
										  </tr>
										  <?php	
										  $i++;
										  }
										  ?>
								  </tbody>
								</table>
							  </div>
							</div>
						  </div>

						</div>
					
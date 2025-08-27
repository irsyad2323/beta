						<!-- /.container-fluid -->						
						<div class="container-fluid">

						  <!-- Page Heading 
						  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
						  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
							-->
						  <!-- DataTales Example -->
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data List Sudah Bayar</h6>
							</div>
							<div class="modal-footer">
								<div class="dropdown">
								  <button class="btn btn-info dropdown-toggle" type="button" data-id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									ACTION INSERT
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<button type="button" name="edit" class="dropdown-item insertinsodp">Insert Instalasi ODP</button>
									<button type="button" name="edit" class="dropdown-item insertinsdis">Insert Instalasi Distribusi</button>														
									<button type="button" name="edit" class="dropdown-item insertinscor">Insert Correctiv</button>														
								  </div>
								</div>
							  </div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_penggunae" width="100%" cellspacing="0">
								  <thead>
									<tr>
									  <th>Key</th>
									  <th>TANGGAL FAL</th>						  
									  <th>Jenis Pembayaran</th>
									  <th>USERNAME</th>
									  <th>LAYANAN</th>
									  <th>NAMA</th>
									  <th>NO WA</th>
									  <th>PAKET</th>
									  <th>Status</th>		
									  <th>ACTION</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									  <th>Key</th>
									  <th>TANGGAL FAL</th>						  
									  <th>Jenis Pembayaran</th>
									  <th>USERNAME</th>
									  <th>LAYANAN</th>
									  <th>NAMA</th>
									  <th>NO WA</th>	
									  <th>PAKET</th>
									  <th>Status</th>			
									  <th>ACTION</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
										  include('controller/controller_daf.php');
										  $acces_user_log = $_SESSION["username"];
										  $table = mysqli_query($koneksi_daf,"SELECT * FROM tbl_fal WHERE status_wo in ('sudah_bayar','bayar_belakang') ");
											$i=1;
										  while ($row = mysqli_fetch_assoc($table)){ 
										  
												if ($row['kd_layanan'] == 'mlg'){
														  $row['jenis_unit'] = '<small class="badge badge-warning">Naratel</small>';
													  }elseif ($row['kd_layanan'] == 'pas'){
														  $row['jenis_unit'] = '<small class="badge badge-danger">SBM</small>';
													  }elseif ($row['kd_layanan'] == 'pas1'){
														  $row['jenis_unit'] = '<small class="badge badge-danger">Balakosa</small>';
													  }elseif ($row['kd_layanan'] == 'batu'){
														  $row['jenis_unit'] = '<small class="badge badge-dark">Jalibar</small>';
													  }elseif ($row['kd_layanan'] == 'mlg1'){
														  $row['jenis_unit'] = '<small class="badge badge-primary">Jalantra</small>';
													  }
													  
												if ($row['mgm'] == 'reguler'){
														  $row['mgm_stt'] = '<small class="badge badge-dark">Reguler</small>';
													  }elseif ($row['mgm'] == 'mgm'){
														  $row['mgm_stt'] = '<small class="badge badge-danger">MGM</small>';
													  }
												
												if ($row['status_wo'] == 'bayar_belakang'){
														  $row['status_woe'] = '<small class="badge badge-dark">Pasca Bayar (bayar dibelakang)</small>';
													  }elseif ($row['status_wo'] == 'sudah_bayar'){
														  $row['status_woe'] = '<small class="badge badge-danger">Prabayar (bayar didepan)</small>';
													  }
												
												if ($row['payment_jenis'] == 'mitra_bayar'){
														  $row['payment_jenise'] = '<small class="badge badge-dark">Lewat Mitra Bayar</small>';
													  }elseif ($row['payment_jenis'] == 'cod'){
														  $row['payment_jenise'] = '<small class="badge badge-danger">COD</small>';
													  }										  
										  $no=1;
										  
										  ?>
										  <tr id=<?php echo $row['key_fal']; ?>">
											<td data-target="i"> <?php echo $i;?></td>
											<td data-target="tgl_fal"> <?php echo $row['tgl_fal'];?></td>
											<td data-target="payment_jenise"> <?php echo $row['payment_jenise'];?></td>
											<td data-target="username_fal"> <?php echo $row['username_fal'];?></td>
											<td data-target="jenis_unit"> <?php echo $row['jenis_unit'];?></td>
											<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
											<td data-target="tlp_fal"> <?php echo $row['tlp_fal'];?></td>
											<td data-target="paket_fal"> <?php echo $row['paket_fal'];?></td>
											<td data-target="status_woe"> <?php echo $row['status_woe'];?></td>
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
														nama_lengkap="<?php echo $row['username_fal'];?>"	
														nama_fal="<?php echo $row['nama_fal'];?>"	
														alamat_fal="<?php echo $row['alamat_fal'];?>"	
														kd_layanan="<?php echo $row['kd_layanan'];?>"	
														telp_fal="<?php echo $row['tlp_fal'];?>"	
														username_fal="<?php echo $row['username_fal'];?>"	
														class="dropdown-item set_wo">Set WO</button>
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
						<!-- /.container-fluid -->
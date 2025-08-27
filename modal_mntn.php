<!-- Begin Page Content -->
						<div class="container-fluid">

						  <!-- Page Heading 
						  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
						  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
							-->
						  <!-- DataTales Example -->
						  
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data Visit</h6>
							</div>
							<div class="modal-footer">
								<div class="dropdown">
								  <button class="btn btn-info dropdown-toggle" type="button" data-id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									ACTION INSERT
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<button type="button" name="edit" class="dropdown-item insertmntn">Insert Maintenance</button>
									<button type="button" name="edit" class="dropdown-item insertmntnodp">Insert Maintenance ODP</button>														
									<button type="button" name="edit" class="dropdown-item insert_gamas">Insert Gangguan Massal</button>														
									<button type="button" name="edit" class="dropdown-item insertmntbckbone">Insert Maintenance Backbone</button>														
								  </div>
								</div>
							  </div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_visit" width="100%" cellspacing="0">
								  <thead>
									<tr>
										<th>No</th>
										<th>TANGGAL</th>
										<th>ID USER</th>              
										<th>NAMA</th>                  
										<th>KET NMC</th>
										<th>DESKRIPSI</th>
										<th>STATUS</th>
										<th>Handle</th>
										<th>ACTION</th>	
									</tr>
								  </thead>
								  <tfoot>
									<tr>
										<th>No</th>
										<th>TANGGAL</th>
										<th>ID USER</th>              
										<th>NAMA</th>                  
										<th>KET NMC</th>
										<th>DESKRIPSI</th>
										<th>STATUS</th>
										<th>Handle</th>
										<th>ACTION</th>	
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
										  include('controller/controller_mysqli.php');
										  $acces_user_log = $_SESSION["username"];
										  
										$table = mysqli_query($koneksi,"SELECT * FROM keluhan WHERE status = 'Visit' and kd_kom in ('mlg','mlg1','batu','pas','pas1') and stts_post = 'n' ORDER BY id DESC");
										
										  
										  
										  $i=1;
										  while ($row = mysqli_fetch_assoc($table)){ 
										  
												if ($row['layanan'] == 'mlg'){
														  $row['jenis_unit'] = '<small class="badge badge-warning">Naratel</small>';
													  }elseif ($row['layanan'] == 'pas'){
														  $row['jenis_unit'] = '<small class="badge badge-danger">SBM</small>';
													  }elseif ($row['layanan'] == 'pas1'){
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
													  
												if($row['status'] == 'Visit'){
														$row['type_status'] = '<small class="badge badge-dark">'. strtoupper($row['status']).'</small>';
													}else{
														$row['type_status'] = $row['status'];
													}
										  
										  $no=1;
										  
										  ?>
										  <tr id=<?php echo $row['id']; ?>">
											<td data-target="i"> <?php echo $i;?></td>
											<td data-target="tanggal"> <?php echo $row['tanggal'];?></td>
											<td data-target="id_user"> <?php echo $row['id_user'];?></td>
											<td data-target="nama_kom"> <?php echo $row['nama_kom'];?></td>
											<td data-target="keterangan_solving"> <?php echo $row['keterangan_solving'];?></td>
											<td data-target="keluhan_deskripsi"> <?php echo $row['keluhan_deskripsi'];?></td>
											<td data-target="type_status"> <?php echo $row['type_status'];?></td>
											<td data-target="handle_kompline"> <?php echo $row['handle_kompline'];?></td>
											<td>
												<div class="dropdown">
												  <button class="btn btn-info dropdown-toggle" type="button" data-id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													ACTION
												  </button>
												  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												    <button type="button" name="edit" data-id="<?php echo $row['id'];?>"							
														id_user="<?php echo $row['id_user'];?>"							
														alamat="<?php echo $row['alamat'];?>"							
														keluhan_deskripsi="<?php echo $row['keluhan_deskripsi'];?>"							
														kategori_kompline="<?php echo $row['kategori_kompline'];?>"							
														handle_kompline="<?php echo $row['handle_kompline'];?>"
														keterangan_solving="<?php echo $row['keterangan_solving'];?>"
														kategori_solving="<?php echo $row['kategori_solving'];?>"
														class="dropdown-item editdatavisit">Edit</button>
												    <button type="button" name="edit" data-id="<?php echo $row['id'];?>"
														id="<?php echo $row['id'];?>"							
														id_user="<?php echo $row['id_user'];?>"							
														nama_kom="<?php echo $row['nama_kom'];?>"							
														tlp_kom="<?php echo $row['tlp_kom'];?>"							
														alamat="<?php echo $row['alamat'];?>"							
														kelurahan="<?php echo $row['kelurahan'];?>"							
														jenis_produk="<?php echo $row['jenis_produk'];?>"
														kd_kom="<?php echo $row['kd_kom'];?>"
														keluhan_deskripsi="<?php echo $row['keluhan_deskripsi'];?>"
														kategori_kompline="<?php echo $row['kategori_kompline'];?>"
														handle_kompline="<?php echo $row['handle_kompline'];?>"
														keterangan_solving="<?php echo $row['keterangan_solving'];?>"
														kategori_solving="<?php echo $row['kategori_solving'];?>"
														class="dropdown-item postwo">Post WO</button>
													<button type="button" name="edit" data-id="<?php echo $row['key_fal'];?>"
														key_fal="<?php echo $row['key_fal'];?>"							
														class="dropdown-item deletepengguna">Delete</button>
														
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
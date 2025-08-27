<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>WO Admin - IKR</title>

    <!-- Custom fonts for this template-->

    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="../css/select2.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="../asset/vendor/datatables/dataTables.bootstrap4.min.css">
    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/css/bootstrap-datepicker.min.css">
</head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
     <?php include '../sidebar.php'; ?>

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



                    <!-- Sidebar Toggle (Topbar) -->

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">

                        <i class="fa fa-bars"></i>

                    </button>



            



                    <!-- Topbar Navbar -->

                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->

                        <li class="nav-item dropdown no-arrow">

                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"

                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username'];?></span>

                                <img class="img-profile rounded-circle"

                                    src="../img/undraw_profile.svg">

                            </a>
							

                            <!-- Dropdown - User Information -->

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"

                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="#">

                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>

                                    Profile

                                </a>

                                <a class="dropdown-item" href="#">

                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>

                                    Settings

                                </a>

                                <a class="dropdown-item" href="#">

                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>

                                    Activity Log

                                </a>

                                <div class="dropdown-divider"></div> >

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">

                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                                    Logout

                                </a>

                            </div>

                        </li>



                    </ul>



                </nav>

                <!-- End of Topbar -->
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Marketing</h1>
            <!--<p class="mb-4">
              DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.
            </p>-->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                
                  <!-- button -->
                  
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_brosur" data-whatever="@who">Form Sebar Brosur</button>
               <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_banner" data-whatever="@who">Form Pasang Banner</button>
			   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_tambah" data-whatever="@who">Form Pasang Spanduk</button>
                 
			    <!-- modal -->
				<div class="modal fade" id="modal_brosur" tabindex="-1" role="dialog" aria-labelledby="modal_brosur" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                         <h5 class="modal-title" id="modal_brosur">Form Sebar Brosur</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>

                            <p>Nama</br>
                                <select name="nama" id='nama' class="form-control">
                                    <option value=''></option>
                                    <option value='rafif'>Rafif</option>
                                    <option value='rino'>Rino</option>
                                    <option value='fio'>Fio</option>
                                    <option value='sonny'>Sonny</option>
                                    <option value='amin'>Amin</option>
                                    <option value='bayu'>Bayu</option>
                                    <option value='yusuf'>Yusuf</option>
                                    <option value='lukman'>Lukman</option>
                                    <option value='ricky'>Ricky</option>
                                    <option value='wahyu'>Wahyu</option>
                                    <option value='suari'>Suari</option>
                                    <option value='siswanto'>Siswanto</option>
                                    <option value='salin'>Salin</option>
                                    <option value='rozak'>Rozak</option>
                                </select>
                            </p>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Total Sebar Brosur</label>
                                <input type="number" class="form-control" name="sebar_brosur" id='sebar_brosur' placeholder="" />
                            </div> 

                            	<div class="form-group">
                                <label for="rang">Provinsi</label>                
                     <select class="form-control" id="provinsi" name="provinsi" style="width: 100%;">
							<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tb_provinsi WHERE `status`='aktif';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												//echo '<option value="'.$data_user['kd_provinsi'].'">'.$data_user['kd_provinsi'].'</option>';
												echo '<option value="'.$data_user['kd_provinsi'].'">'.$data_user['nama_provinsi'].'</option>';
											  } 
											?>   </option> 					
						
						</select> 
                            </div> 
						
						<div class="form-group">
								<label>Kabupaten / Kota</label>
								<select class="form-control" id="kabupaten" name="kabupaten" style="width: 100%;">                 
								  		 
								</select>
							  </div>
							  
						<div class="form-group">
								<label>Kecamatan</label>
								<select class="form-control" id="kecamatan" name="kecamatan" style="width: 100%;">                 
								  <option value=''>kecamatan not available</option>					 
								</select>
							  </div>
							  
						<div class="form-group">
								<label>Kelurahan</label>
								<select class="form-control" id="kelurahan" name="kelurahan" style="width: 100%;">                 
								  <option value=''>kelurahan not available</option>					 
								</select>
							  </div>
                            
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary insert_brosur">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
				  <!-- end modal --> 
				  
			    <!-- modal -->
				<div class="modal fade" id="modal_banner" tabindex="-1" role="dialog" aria-labelledby="modal_banner" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                         <h5 class="modal-title" id="modal_banner">Form Sebar Brosur</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>

                            <p>Nama</br>
                                <select name="nama" id='nama' class="form-control">
                                    <option value=''></option>
                                    <option value='rafif'>Rafif</option>
                                    <option value='rino'>Rino</option>
                                    <option value='fio'>Fio</option>
                                    <option value='sonny'>Sonny</option>
                                    <option value='amin'>Amin</option>
                                    <option value='bayu'>Bayu</option>
                                    <option value='yusuf'>Yusuf</option>
                                    <option value='lukman'>Lukman</option>
                                    <option value='ricky'>Ricky</option>
                                    <option value='wahyu'>Wahyu</option>
                                    <option value='suari'>Suari</option>
                                    <option value='siswanto'>Siswanto</option>
                                    <option value='salin'>Salin</option>
                                    <option value='rozak'>Rozak</option>
                                </select>
                            </p>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Total Sebar Brosur</label>
                                <input type="number" class="form-control" name="sebar_brosur" id='sebar_brosur' placeholder="Total Brosur" />
                            </div> 
							
							<div class="form-group">
                                <label for="recipient-name" class="col-form-label">Daerah Sebar Brosur</label>
                                <input type="teks" class="form-control" name="daerah" id='daerah' placeholder="Daerah Sebar Brosur 1" /></br>
                                <input type="teks" class="form-control" name="daerah2" id='daerah2' placeholder="Daerah Sebar Brosur 2" /></br>
                                <input type="teks" class="form-control" name="daerah3" id='daerah3' placeholder="Daerah Sebar Brosur 3" /></br>
                                <input type="teks" class="form-control" name="daerah4" id='daerah4' placeholder="Daerah Sebar Brosur 4" /></br>
                                <input type="teks" class="form-control" name="daerah5" id='daerah5' placeholder="Daerah Sebar Brosur 5" />
                            </div>

                            	<div class="form-group">
                                <label for="rang">Provinsi</label>                
                     <select class="form-control" id="provinsi" name="provinsi" style="width: 100%;">
							<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tb_provinsi WHERE `status`='aktif';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												//echo '<option value="'.$data_user['kd_provinsi'].'">'.$data_user['kd_provinsi'].'</option>';
												echo '<option value="'.$data_user['kd_provinsi'].'">'.$data_user['nama_provinsi'].'</option>';
											  } 
											?>   </option> 					
						
						</select> 
                            </div> 
						
						<div class="form-group">
								<label>Kabupaten / Kota</label>
								<select class="form-control" id="kabupaten" name="kabupaten" style="width: 100%;">                 
								  		 
								</select>
							  </div>
							  
						<div class="form-group">
								<label>Kecamatan</label>
								<select class="form-control" id="kecamatan" name="kecamatan" style="width: 100%;">                 
								  <option value=''>kecamatan not available</option>					 
								</select>
							  </div>
							  
						<div class="form-group">
								<label>Kelurahan</label>
								<select class="form-control" id="kelurahan" name="kelurahan" style="width: 100%;">                 
								  <option value=''>kelurahan not available</option>					 
								</select>
							  </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Respon WA</label>
                                <input type="teks" class="form-control" name="respon_wa" id='respon_wa' placeholder="Your answer"/>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">FAL</label>
                                <input type="text" class="form-control" name="fal" id='fal' placeholder="Your answer"/>
                            </div>
							
							 <div class="form-row">
								  </br>
										<h4>Harap isi Lokasi di bawah ini</h4>
										</br>
								  <div class="form-group col-md-6" >
												<button class="btn btn-danger pull-right" type="button" onclick="showPosition();">Show Position</button>
													<span type="hidden" id="get_sinden" name="get_sinden" value="">
											</div>	
												<input class="form-control" type="text" id="get_lokasi" name="get_lokasi" autocomplete="off" placeholder="Tekan Tombool Show Position">   
									</div>
                            
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" id="submit" class="btn btn-primary insert">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
				  <!-- end modal --> 

                  <div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="modal_update" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                         <h5 class="modal-title" id="modal_update"> Update Sebaran Brosur</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>

                            <p>Nama</br>
                                <select name="nama2" id='nama2' class="form-control">
                                    <option value=''></option>
                                    <option value='rafif'>Rafif</option>
                                    <option value='rino'>Rino</option>
                                    <option value='fio'>Fio</option>
                                    <option value='sonny'>Sonny</option>
                                    <option value='amin'>Amin</option>
                                    <option value='bayu'>Bayu</option>
                                    <option value='yusuf'>Yusuf</option>
                                    <option value='lukman'>Lukman</option>
                                    <option value='ricky'>Ricky</option>
                                    <option value='wahyu'>Wahyu</option>
                                    <option value='suari'>Suari</option>
                                    <option value='siswanto'>Siswanto</option>
                                    <option value='salin'>Salin</option>
                                    <option value='rozak'>Rozak</option>
                                </select>
                            </p>
                            
                            <p>Jenis Pekerjaan</br>
                                <select name="jenis_pekerjaan2" id='jenis_pekerjaan2' class="form-control">
                                <option value=''></option>
                                <option value='sebar_brosur'>Sebar Brosur</option>
                                <option value='pasang_banner'>Pasang Banner</option>
                                <option value='pasang_spanduk'>Pasang Spanduk</option>
                            </select>
                            </p>

                            <div class="form-group">
                                
                                <input type="hidden" class="form-control" name="id" id='id'/>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Tanggal Pekerjaan</label></br>
                                <input type="date" class="form-control" name="tgl_pekerjaan2" id='tgl_pekerjaan2'/>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Daerah Sebar Brosur</label>
                                <input type="teks" class="form-control" name="daerah12" id='daerah12' placeholder="Your answer" />
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Daerah Sebar Brosur 2</label>
                                <input type="teks" class="form-control" name="daerah22" id='daerah22' placeholder="Your answer"/>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Daerah Sebar Brosur 3</label>
                                <input type="teks" class="form-control" name="daerah33" id='daerah33' placeholder="Your answer"/>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Daerah Sebar Brosur 4</label>
                                <input type="teks" class="form-control" name="daerah44" id='daerah44' placeholder="Your answer"/>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Daerah Sebar Brosur 5</label>
                                <input type="teks" class="form-control" name="daerah55" id='daerah55' placeholder="Your answer"/>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kelurahan</label>
                                <input type="teks" class="form-control" name="kelurahan2" id='kelurahan2' placeholder="Your answer"/>
                            </div>

                            <p>Kota</br>
                                <select name= "kota2" id='kota2' class="form-control">
                                <option value=''></option>
                                <option value='malang'>Malang</option>
                                <option value='pasuruan'>Pasuruan</option>
                                </select>
                            </p>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Jumlah brosur yang disebar / banner yang di pasang (manual)</br> Isi dengan angka saja misal : (100)</label>
                                <input type="teks" class="form-control" name="jumlah_brosur2" id='jumlah_brosur2' placeholder="Your answer" />
                            </div>

                              <label class="form-label" for="customFile">Foto Pekerjaan</label>
                              <input type="file" class="form-control" id="customFile" />
                              
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Respon WA</label>
                                <input type="teks" class="form-control" name="respon_wa2" id='respon_wa2' placeholder="Your answer"/>
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">FAL</label>
                                <input type="text" class="form-control" name="fal2" id='fal2' placeholder="Your answer"/>
                            </div>
                            
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary editdata">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </br><hr>
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data</h6>
                </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Jenis Pekerjaan</th>
                        <th>Tanggal Pekerjaan</th>
                        <th>Status</th>
                        <th>Daerah 1</th>
                        <th>Daerah 2</th>
                        <th>Daerah 3</th>
                        <th>Daerah 4</th>
                        <th>Daerah 5</th>
                        <th>Kelurahan</th>
                        <th>Kota</th>
                        <th>Jumlah Brosur</th>
                        <th>Respon WA</th>
                        <th>FAL</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="table">
                    <?php 
					  include('../controller/controller_mysqli.php');
					  // $acces_user_log = $_SESSION["username"];
					  $table = mysqli_query($koneksi,"SELECT * FROM tbl_marketing;");
                      if ($table === FALSE) {
                        die(mysqli_error($koneksi));
                      }
                     /* $data = mysqli_fetch_assoc($table);
                      return $data; */
                      while ($row = mysqli_fetch_assoc($table)){ 
										  $i=0;
										  $no=1;
										 
										   if($row['status'] == 'sudah'){
											$row['type_status'] = '<small class="badge badge-success">'. strtoupper($row['status']).'</small>';
											}elseif($row['status'] == 'belum'){
												$row['type_status'] = '<small class="badge badge-danger">'. strtoupper($row['status']).'</small>';
											}else{
												$row['type_status'] = $data[$i]['status'];
											}
											
										  ?>
										  <tr id="<?php echo $row['id']; ?>">
											<td data-target="id"> <?php echo $row['id'];?></td>
                                            <td data-target="nama"> <?php echo $row['nama'];?></td>
                                            <td data-target="jenis_pekerjaan"> <?php echo $row['jenis_pekerjaan'];?></td>
                                            <td data-target="tgl_pekerjaan"> <?php echo $row['tgl_pekerjaan'];?></td>
                                            <td data-target="type_status"> <?php echo $row['type_status'];?></td>
                                            <td data-target="daerah"> <?php echo $row['daerah'];?></td>
                                            <td data-target="daerah2"> <?php echo $row['daerah2'];?></td>
                                            <td data-target="daerah3"> <?php echo $row['daerah3'];?></td>
                                            <td data-target="daerah4"> <?php echo $row['daerah4'];?></td>
                                            <td data-target="daerah5"> <?php echo $row['daerah5'];?></td>
                                            <td data-target="kelurahan"> <?php echo $row['kelurahan'];?></td>
                                            <td data-target="kota"> <?php echo $row['kota'];?></td>
                                            <td data-target="jumlah_brosur"> <?php echo $row['jumlah_brosur'];?></td>
                                            <td data-target="respon_wa"> <?php echo $row['respon_wa'];?></td>
                                            <td data-target="fal"> <?php echo $row  ['fal'];?></td>
                                            
                                            <td> <div class="btn-group">	 
                                              <button type="button" name="edit" data-id="<?php echo $row['id'];?>"
                                              id="<?php echo $row['id'];?>"
                                              nama="<?php echo $row['nama'];?>"
                                              jenis_pekerjaan="<?php echo $row['jenis_pekerjaan'];?>"
                                              tgl_pekerjaan="<?php echo $row['tgl_pekerjaan'];?>"
                                              daerah="<?php echo $row['daerah'];?>"
                                              daerah2="<?php echo $row['daerah2'];?>"
                                              daerah3="<?php echo $row['daerah3'];?>"
                                              daerah4="<?php echo $row['daerah4'];?>"
                                              daerah5="<?php echo $row['daerah5'];?>"
                                              kelurahan="<?php echo $row['kelurahan'];?>"
                                              kota="<?php echo $row['kota'];?>"
                                              jumlah_brosur="<?php echo $row['jumlah_brosur'];?>"
                                              respon_wa="<?php echo $row['respon_wa'];?>"
                                              fal="<?php echo $row['fal'];?>"
                                              class="btn btn-info btn-sm mr-2 edit">Edit</button>

                                              <button type="button" name="delete" data-id="<?php echo $row['id'];?>"
                                              id="<?php echo $row['id'];?>"			
                                              class="btn btn-danger btn-sm mr-2 hapusdata">Delete</button>
                                              
                                            </div></td>
										
											
											
										</div></td>
										  </tr>
										  <?php	
										  }
										  ?>
                    </tbody>
                  </table>
                </div>
                
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2020</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../asset/vendor/jquery/jquery.min.js"></script>
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../asset/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="../asset/vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="../asset/js/demo/chart-area-demo.js"></script>
    <script src="../asset/js/demo/chart-pie-demo.js"></script>
    <script src="../asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/bs-custom-file-input.js"></script>
    <!-- datepicker bootstrap -->
	<script src="../js/sweetalert2.all.min.js"></script>
    <script src="../asset/js/bootstrap-datepicker.min.js"></script>
    <script src="../asset/locales/bootstrap-datepicker.id.min.js"></script>
	<script src="../js/select2.min.js"></script>
	<script>
    var result;
    function showPosition() {   

        // Store the element where the page displays the result

        result = document.getElementById("get_sinden");
        lokasi = document.getElementById("get_lokasi");
	
        

        // If geolocation is available, try to get the visitor's position

        if(navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

            result.innerHTML = "ERROR Harap Hubungi (IRSYAD)";

        } else {

            alert("Sorry, your browser does not support HTML5 geolocation.");

        }

    };

    

    // Define callback function for   attempt

    function successCallback(position) {

        result.innerHTML = position.coords.latitude + "#" + position.coords.longitude;
        lokasi.value = position.coords.latitude + "#" + position.coords.longitude;
    }

    

    // Define callback function for failed attempt

    function errorCallback(error) {

        if(error.code == 1) {

            result.innerHTML = "Harap login melalui Grub Telegram (Grup WO) atau hubungi (IRSYAD)";

        } else if(error.code == 2) {

            result.innerHTML = "The network is down or the positioning service can't be reached.";

        } else if(error.code == 3) {

            result.innerHTML = "The attempt timed out before it could get the location data.";

        } else {

            result.innerHTML = "Geolocation failed due to unknown error.";

        }

    }

</script>
	<script>
	$('#provinsi').on('change', function(){
		//var a = $('.js-example-basic-multiple').val();
		var prov = $(this).val();
		alert(prov);
		if(prov){
			$.ajax({
				type:'POST',
				url : "../create/list_kabupaten.php",
				data:'prov_id='+prov,
					success:function(html){
						//alert(html);
						$('#kabupaten').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
			}); 
		}else{
			$('#kabupaten').html('<option value="">Select Provinsi dulu</option>');
			//$('#city').html('<option value="">Select state first</option>'); 
		}
    });		
	
		//add kec
	$('#kabupaten').on('change', function(){
		var kab = $(this).val();
		alert(kab);
		if(kab){
			$.ajax({
				type:'POST',
				url : "../create/list_kecamatan.php",
				data:'kab_id='+kab,
					success:function(html){
						$('#kecamatan').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
			}); 
		}else{
			$('#kecamatan').html('<option value="">Select kecamatan dulu</option>');
			//$('#city').html('<option value="">Select state first</option>'); 
		}
	});
	
	//add kel
	$('#kecamatan').on('change', function(){
		var kec = $(this).val();
		//alert(kab);
		if(kec){
			$.ajax({
				type:'POST',
				url : "../create/list_kelurahan.php",
				data:'kec_id='+kec,
					success:function(html){
						$('#kelurahan').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
			}); 
		}else{
			$('#kelurahan').html('<option value="">Select kelurahan dulu</option>');
			//$('#city').html('<option value="">Select state first</option>'); 
		}
	});
	
// In your Javascript (external .js resource or <script> tag)
/* $(document).ready(function() {
    $('.js-example-basic-single').select2();
}); */
	</script>

    <script> 
    
    //UPDATE
    $(document).ready(function() {
						  
              //get data value sinden
    $(document).on('click', '.edit', function(){

        
        var id = $(this).attr('id');
        var nama2 = $(this).attr('nama');
        var jenis_pekerjaan2 = $(this).attr('jenis_pekerjaan');
        var tgl_pekerjaan2 = $(this).attr('tgl_pekerjaan');
        var daerah12 = $(this).attr('daerah');
        var daerah22 = $(this).attr('daerah2');
        var daerah33 = $(this).attr('daerah3');
        var daerah44 = $(this).attr('daerah4');
        var daerah55 = $(this).attr('daerah5');
        var kelurahan2 = $(this).attr('kelurahan');
        var kota2 = $(this).attr('kota');
        var jumlah_brosur2 = $(this).attr('jumlah_brosur');
        var respon_wa2 = $(this).attr('respon_wa');
        var fal2 = $(this).attr('fal');
        
        //alert(nama2);
        
        
        $('#modal_update').modal('show');
        $('#id').val(id);
        $('#nama2').val(nama2);
        $('#jenis_pekerjaan2').val(jenis_pekerjaan2);
        $('#tgl_pekerjaan2').val(tgl_pekerjaan2);
        $('#daerah12').val(daerah12);
        $('#daerah22').val(daerah22);
        $('#daerah33').val(daerah33);
        $('#daerah44').val(daerah44);
        $('#daerah55').val(daerah55);
        $('#kelurahan2').val(kelurahan2);
        $('#kota2').val(kota2);
        $('#jumlah_brosur2').val(jumlah_brosur2);
        $('#respon_wa2').val(respon_wa2);
        $('#fal2').val(fal2);
      });
    });

    $(".editdata").click(function() {

          var id = $("#id").val();
          var nama2 = $("#nama2").val();
          var jenis_pekerjaan2 = $("#jenis_pekerjaan2").val();
          var tgl_pekerjaan2 = $("#tgl_pekerjaan2").val();
          var daerah12 = $("#daerah12").val();
          var daerah22 = $("#daerah22").val();
          var daerah33 = $("#daerah33").val();
          var daerah44 = $("#daerah44").val();
          var daerah55 = $("#daerah55").val();
          var kelurahan2 = $("#kelurahan2").val();
          var kota2 = $("#kota2").val();
          var jumlah_brosur2 = $("#jumlah_brosur2").val();
          var respon_wa2 = $("#respon_wa2").val();
          var fal2 = $("#fal2").val();
          
          //alert (nama2); return;
          $.ajax({
            type: "POST",
            url: "update.php",
            data: {
                id: id,
                nama2: nama2,
                jenis_pekerjaan: jenis_pekerjaan2,
                tgl_pekerjaan: tgl_pekerjaan2,
                daerah: daerah12,
                daerah2: daerah22,
                daerah3: daerah33,
                daerah4: daerah44,
                daerah5: daerah55,
                kelurahan: kelurahan2,
                kota: kota2,
                jumlah_brosur: jumlah_brosur2,
                respon_wa: respon_wa2,
                fal: fal2
                
            },
            cache: false,
            success: function(data) {
                alert(data);
                window.location.reload();
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });
    });

      // INSERT 			
		$(document).on('click', '.insert_brosur', function(){

          var nama = $("#nama").val();
          var sebar_brosur = $("#sebar_brosur").val();
          //var tanggal = $("#tgl_pekerjaan").val();
          var provinsi = $("#provinsi").val();
          var kabupaten = $("#kabupaten").val();
          var kecamatan = $("#kecamatan").val();
          var kelurahan = $("#kelurahan").val();
			
        if(nama==''||sebar_brosur==''||provinsi=='') {
            alert("Please fill all fields.");
            return false;
        }
       
        $.ajax({
            type: "POST",
            url: "../controller/insert_marketing.php",
            data: {
                nama: nama,
                sebar_brosur: sebar_brosur,
                //tanggal: tanggal,
                provinsi: provinsi,
                kabupaten: kabupaten,
                kecamatan: kecamatan,
                kelurahan: kelurahan,
            },
            cache: false,
            success : function(data) {
					//alert(data);
					Swal.fire(
						  'Good job!',
						  'You clicked the button!',
						  'success'
						).then(function(success){
							//if (data == 'succes') {
								//alert('a');
						window.location.reload(true);
							//}
					})
					}
        });
          
      

    });

      // INSERT 			
		$(document).on('click', '.insert_spanduk', function(){
 
        $("#submit").click(function() {

          var nama = $("#nama").val();
          var jobs = $("#jenis_pekerjaan").val();
          //var tanggal = $("#tgl_pekerjaan").val();
          var daerah = $("#daerah").val();
          var daerah2 = $("#daerah2").val();
          var daerah3 = $("#daerah3").val();
          var daerah4 = $("#daerah4").val();
          var daerah5 = $("#daerah5").val();
          var kelurahan = $("#kelurahan").val();
          var kota = $("#kota").val();
          var jumlah_brosur = $("#jumlah_brosur").val();
          var respon_wa = $("#respon_wa").val();
          var fal = $("#fal").val();
			
        if(nama==''||jobs==''||tanggal=='') {
            alert("Please fill all fields.");
            return false;
        }
       
        $.ajax({
            type: "POST",
            url: "../controller/insert_marketing.php",
            data: {
                nama: nama,
                jobs: jobs,
                //tanggal: tanggal,
                daerah: daerah,
                daerah2: daerah2,
                daerah3: daerah3,
                daerah4: daerah4,
                daerah5: daerah5,
                kelurahan: kelurahan,
                kota: kota,
                jumlah_brosur: jumlah_brosur,
                respon_wa: respon_wa,
                fal: fal,
            },
            cache: false,
            success : function(data) {
					//alert(data);
					Swal.fire(
						  'Good job!',
						  'You clicked the button!',
						  'success'
						).then(function(success){
							//if (data == 'succes') {
								//alert('a');
						window.location.reload(true);
							//}
					})
					}
        });
          
      });
      

    });

    //DELETE
    $(document).ready(function() {
        // Handle click event for the delete button
        $('.hapusdata').click(function() {
            var id = $(this).data('id');
            // Show a confirmation dialog
            if (confirm('Yakin Ingin menghapus data ini?')) {
                // Perform AJAX request to delete the data
                $.ajax({
                    type: "POST",
                    url: "delete.php" + id, // Replace with the actual delete route
                    data: {
                        "id": "{{ id() }}"
                    },
                    success: function(response) {
                        // Handle the success response if needed
                        // For example, you can show a success message or reload the page
                        alert('Data berhasil dihapus');
                        window.location.reload();
                    },
                    error: function(xhr) {
                        // Handle the error response if needed
                        alert('Gagal menghapus data');
                    }
                });
            }
        });
    });
    
    </script>
  </body>
</html>
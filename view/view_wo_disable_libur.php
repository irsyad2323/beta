<?php

session_start();



if(!isset($_SESSION["logingundala"])){

    header("location:login.php");

    exit;

}



?>

<!DOCTYPE html>

<html lang="en">



<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>SB Admin 2 - IKR</title>



    <!-- Custom fonts for this template-->

    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	 <link href="../css/select2.min.css" rel="stylesheet" />
    <link

        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"

        rel="stylesheet">

    

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

                                <!-- <a class="dropdown-item" href="#">

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

                                <div class="dropdown-divider"></div> -->

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">

                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                                    Logout

                                </a>

                            </div>

                        </li>



                    </ul>



                </nav>

                <!-- End of Topbar -->



                <!-- Begin Page Content -->

                <div class="container-fluid">



                  
					
					<div class="d-sm-flex align-items-center justify-content-between mb-4">

                        
                        <?php 

                            if ( $_SESSION["level_user"] != "Admin" && $_SESSION["level_user"] != "kapten" && $_SESSION["level_user"] != "ts"  ){ 

                        ?>

                        	<div class="my-2"></div>
                                    <a href="index.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">HOME</span>
                                    </a>


                    <?php } ?>

                    </div>

                        <?php 

                            if ( $_SESSION["level_user"] != "ikr" && $_SESSION["level_user"] != "Admin" ){ 

                        ?>

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <button class="btn btn-success add-data">TAMBAH +</button>

                    </div> <?php } ?>			
				







                    <!-- Content Row -->

                    <?php 

                        if ($_SESSION["level_user"] != "ts"){

                       ?>





                          <div class="table-responsive">

                        <table id="tabel_pengguna" class="table table-bordered table-striped">

                        

                          <thead>

                      

                          <tr>

                            

                            <th>NO</th>
							
                            <th>ID USER</th>

                            <th>Nama</th>

                            <th>Alamat</th>

                            <th>NO Telepon</th>

                            <th>Keterangan</th>

                            <th>Pic</th>

                            <th>Kategori Pelanggan</th>
							
							<th>Tanggal Progres</th>
							
							<th>Tanggal OFF</th>
							
							<th>Jumlah OFF</th>      

							<th>Status Pelanggan</th> 

                            <th>ACTION</th>

                    

                          

                          </tr>

                          </thead>

                          <tbody></tbody>

          

                        </table>

                      </div>



                       <?php     

                        } else {



                        ?>

                        

                          <div class="table-responsive">

                        <table id="tabel_pengguna_ts" class="table table-bordered table-striped">

                        

                          <thead>

                      

                          <tr>

                            <th>NO</th>

                            <th>Nama</th>

                            <th>Alamat</th>

                            <th>Username</th>

                            <th>Modem</th>

                            <th>Kabel 1</th>

                            <th>Kabel 2</th>                            

                            <th>Kabel 3</th>

                            <th>Produk</th>

                            <th>pic</th>

                            <th>pic2</th>

                            <th>status</th>

                            <th>status2</th>

                          </tr>

                          </thead>

                          <tbody></tbody>

          

                        </table>

                      </div>

                        <?php    

                        }

                    ?>

                </div>

                <!-- /.container-fluid -->



            </div>

            <!-- End of Main Content -->



            <!-- Footer -->

            <footer class="sticky-footer bg-white">

                <div class="container my-auto">

                    <div class="copyright text-center my-auto">

                        <span>Copyright &copy; Your Website 2021</span>

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

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

        aria-hidden="true">

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

                    <a class="btn btn-danger" href="../controller/logout.php">Logout</a>

                </div>

            </div>

        </div>

    </div>

	 <div class="modal fade" id="modaledit"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Edit Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
                    <form role="form" method="post" id="formdatapengguna">
					
					<!-- FORM ISIAN DATA ADMIN -->
					
				
						
							<div class="form-row">
								<input class="form-control" type="text" id="key_fal2" name="key_fal2" autocomplete="off" readonly>
							</div>
						<br/>
						<div class="form-row">
								<label for="rang">ID User</label>
								<input class="form-control" type="text" id="username_fal2" name="username_fal2" autocomplete="off" readonly>
							</div>
						<br/>
                            <div class="form-row">
                                <label for="fname">Nama</label>
                                <input class="form-control" type="text" id="nama_fal2" name="nama_fal2" placeholder="nama..." readonly>
                            </div>
						<br/>				
                                                 
                            <div class="form-row">
								<label for="lname">Alamat</label>
								<input class="form-control" type="text" id="alamat_fal2" name="alamat_fal2" placeholder="alamat..." autocomplete="off" readonly>
							</div>
						<br/>
							
                            <div class="form-row">
                                <label for="rang">No Telp</label>
                               <input class="form-control" type="number" id="tlp_fal2" name="tlp_fal2" placeholder="rt..." autocomplete="off" readonly>
                            </div>
						<br/>
							
                            <div class="form-row">
                                <label for="rang">Kategori Disable</label>                
                    <select class="form-control" type="text" id="kategori_pelanggan2" name="kategori_pelanggan2" autocomplete="off" >                    
                    <option></option>
					<option>Libur + Modem Diambil</option>   
                    </select>
                            </div>
						<br/>
						
                            <div class="form-row">
                               <label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="lain_lain2" name="lain_lain2" placeholder="keterangan" autocomplete="off">
                            </div>
						<br/>	
						
                            <div class="form-row">
                                <label for="rang">Pic IKR</label>                
                    <select class="form-control" type="text" id="pic_ikr2" name="pic_ikr2" autocomplete="off" >
                    <option> <?php
											  $conn = mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
											  $sql_user = mysqli_query($conn, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='PKL';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].' </option>';
											  } 
											?>   </option>
                    </select>
                            </div>
						<br/>	
							
              
						           				
						<hr>
                            <button type="button" class="btn btn-success  pull-right actioneditlibur">Edit</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>

					<!-- END ISIAN DATA ADMIN -->
						
					
                      </div>
					  
            </div>

        </div>

    </div>


     <div class="modal fade" id="modaltambahdata"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
                    <form role="form" method="post" id="formdatapengguna">
					
					<!-- FORM ISIAN DATA ADMIN -->
					
					<?php 
                        if ($_SESSION["level_user"] != "ikr" && $_SESSION["level_user"] != "psg_dcp"){
                       ?>
					
						 <div class="form-row">                           
							
							<div class="form-group col-md-2">
                                <label for="rang">ID USER</label>                
                     <select class='js-example-basic-multiple' id="kode_user" name="kode_user" multiple="multiple" style='width: 150px;' >
					    <option> <?php
											  $conn = mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
											  $sql_user = mysqli_query($conn, "SELECT * FROM tb_gundala WHERE status_log='y';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['kode_user'].'">'.$data_user['kode_user'].' </option>';
											  } 
											?>   </option>					
						
						</select> &nbsp
                            </div> 

						<!--div class="form-group col-md-2">
                                <label for="rang">ID USER</label>                
                     <select class='form-control' id="username_fal" name="username_fal" >
					    <option> <?php
											  $conn = mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
											  $sql_user = mysqli_query($conn, "SELECT * FROM tb_gundala WHERE status_log='y' and kd_layanan='mlg';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['kode_user'].'">'.$data_user['kode_user'].' </option>';
											  } 
											?>   </option>					
						
						</select> &nbsp
                            </div--> 
					
							
						<div class="form-group col-md-4">
                                <label for="fname">Nama</label>
                                <input class="form-control" type="text" id="nama_fal" name="nama_fal" autocomplete="off"  disabled>
                            </div>
					
						<div class="form-group col-md-6">
                            <label for="lname">Alamat</label>
                            <input class="form-control" type="text" id="alamat_fal" name="alamat" placeholder="alamat..." autocomplete="off" disabled>
                        </div>              
							
                           
                            <div class="form-group col-md-2">
                                <label for="halaman">NO. Telepon</label>
                                <input class="form-control" type="number" id="tlp_fal" name="tlp_fal" placeholder="telepon.." autocomplete="off" disabled>
                            </div>  

						 <div class="form-group col-md-2">
                                <label for="halaman">ID USER</label>
                                <input class="form-control" type="text" id="username_fal" name="username_fal" placeholder="telepon.." autocomplete="off" disabled>
                            </div>
                             
                            
                            <div class="form-group col-md-2">
                                <label for="rang">kantor Cabang</label>                        
                    <input class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" disabled>                                  
                    </select>
                            </div> 
                            <div class="form-group col-md-2">
                                <label for="rang">Pic IKR</label>                
                    <select class="form-control" type="text" id="pic_ikr" name="pic_ikr" autocomplete="off" >
                    <option> <?php
											  $conn = mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
											  $sql_user = mysqli_query($conn, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='PKL';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].' </option>';
											  } 
											?>   </option>
                    </select>
                            </div>  

					<div class="form-group col-md-4">
                    <label for="rang">Kategori Disable</label>                
                    <select class="form-control" type="text" id="kategori_pelanggan" name="kategori_pelanggan" autocomplete="off" >                    
                    <option>By Request</option>
					<option>Modem Diambil</option>       
                    </select>
                  </div>

                   <div class="form-group col-md-6">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
                        </div>
               
					
				
			
					

                    </div>

                    

                         			
						<hr>
                            <button type="submit" class="btn btn-success  pull-right submitdata" name="action" id="action" value="insert">
								<i class="fa fa-check fa-fw" name="submit" ></i>SAVE</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
					<?php 
                        }
                       ?>
					
					<?php 
                        if ($_SESSION["level_user"] != "ikr" && $_SESSION["level_user"] != "kapten" && $_SESSION["level_user"] != "ts"){
                       ?>
							
					<div class="form-row">                           
							
							<div class="form-group col-md-2">
                                <label for="rang">ID USER</label>                
                     <select class='js-example-basic-multiple' id="kode_user" name="kode_user" multiple="multiple" style='width: 150px;' >
					    <option> <?php
											  $conn = mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
											  $sql_user = mysqli_query($conn, "SELECT * FROM tb_gundala WHERE status_log='y' and kd_layanan='mlg';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['kode_user'].'">'.$data_user['kode_user'].' </option>';
											  } 
											?>   </option>					
						
						</select> &nbsp
                            </div> 

						<!--div class="form-group col-md-2">
                                <label for="rang">ID USER</label>                
                     <select class='form-control' id="username_fal" name="username_fal" >
					    <option> <?php
											  $conn = mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
											  $sql_user = mysqli_query($conn, "SELECT * FROM tb_gundala WHERE status_log='y' and kd_layanan='mlg';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['kode_user'].'">'.$data_user['kode_user'].' </option>';
											  } 
											?>   </option>					
						
						</select> &nbsp
                            </div--> 
					
							
						<div class="form-group col-md-4">
                                <label for="fname">Nama</label>
                                <input class="form-control" type="text" id="nama_fal" name="nama_fal" autocomplete="off"  disabled>
                            </div>
					
						<div class="form-group col-md-6">
                            <label for="lname">Alamat</label>
                            <input class="form-control" type="text" id="alamat_fal" name="alamat" placeholder="alamat..." autocomplete="off" disabled>
                        </div>              
							
                           
                            <div class="form-group col-md-2">
                                <label for="halaman">NO. Telepon</label>
                                <input class="form-control" type="number" id="tlp_fal" name="tlp_fal" placeholder="telepon.." autocomplete="off" disabled>
                            </div>  

						 <div class="form-group col-md-2">
                                <label for="halaman">ID USER</label>
                                <input class="form-control" type="text" id="username_fal" name="username_fal" placeholder="telepon.." autocomplete="off" disabled>
                            </div>
                             
                            
                            <div class="form-group col-md-2">
                                <label for="rang">kantor Cabang</label>                        
                    <input class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" disabled>                                  
                    </select>
                            </div> 
                            <div class="form-group col-md-2">
                                <label for="rang">Pic IKR</label>                
                    <select class="form-control" type="text" id="pic_ikr" name="pic_ikr" autocomplete="off" >
                    <option> <?php
											  $conn = mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
											  $sql_user = mysqli_query($conn, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='PKL';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].' </option>';
											  } 
											?>   </option>
                    </select>
                            </div>  

					<div class="form-group col-md-4">
                    <label for="rang">Kategori Disable</label>                
                    <select class="form-control" type="text" id="kategori_pelanggan" name="kategori_pelanggan" autocomplete="off" >                    
                    <option></option>
                    <option>By Request</option>
					<option>Modem Diambil</option>
					<option>Orang tidak ada + modem tidak ada</option>
                    <option>orang ada + janji bayar</option>
                    <option>orang tidak ada + modem ada</option>
                                  
                    </select>
                  </div>

                   <div class="form-group col-md-6">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
                        </div>
                    </div>		
						<hr>
                            <button type="submit" class="btn btn-success  pull-right submitdata" name="action" id="action" value="insert">
								<i class="fa fa-check fa-fw" name="submit" ></i>SAVE</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                            
                        </form>

							<?php
						}
					?>
					
					<!-- END ISIAN DATA ADMIN -->
					
            </div>

        </div>

    </div>
    </div>
	
		



    <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <form action="controller/import.php" method="post" enctype="multipart/form-data">

                    <div class="input-group">

                        <div class="custom-file">

                            <input type="file" name="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">

                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>

                        </div>

                    </div>

               



            

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button name="upload" type="submit" class="btn btn-success">Import</button>

            </div>

            </form>

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



    <script src="../asset/js/bootstrap-datepicker.min.js"></script>

    <script src="../asset/locales/bootstrap-datepicker.id.min.js"></script>

	<script>
	function test() {
    if (document.getElementById('perlakuan').value == 'Diskon Biaya Instalasi') {
        document.getElementById('total_diskon').style.display = 'block';
		document.getElementById('keterangan_angsuran').style.display = 'none';
		document.getElementById('free').style.display = 'none';
		document.getElementById('pindah_alamat').style.display = 'none';
    } else if (document.getElementById('perlakuan').value == 'Angsuran Biaya Instalasi'){
        document.getElementById('total_diskon').style.display = 'none';
		document.getElementById('keterangan_angsuran').style.display = 'block';
		document.getElementById('free').style.display = 'none';
		document.getElementById('pindah_alamat').style.display = 'none';
    } else if (document.getElementById('perlakuan').value == 'Free Biaya Instalasi & Free Biaya Bulanan'){
        document.getElementById('total_diskon').style.display = 'none';
		document.getElementById('keterangan_angsuran').style.display = 'none';
		document.getElementById('free').style.display = 'block';
		document.getElementById('pindah_alamat').style.display = 'none';
    } else if (document.getElementById('perlakuan').value == 'Pindah Alamat'){
        document.getElementById('total_diskon').style.display = 'none';
		document.getElementById('keterangan_angsuran').style.display = 'none';
		document.getElementById('free').style.display = 'none';
		document.getElementById('pindah_alamat').style.display = 'block';
    } else {
		document.getElementById('total_diskon').style.display = 'none';
		document.getElementById('keterangan_angsuran').style.display = 'none';
		document.getElementById('free').style.display = 'none';
		document.getElementById('pindah_alamat').style.display = 'none';
	}
}

	</script>
	
	<script src="../js/select2.min.js"></script>
	<script>
	$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
		maximumSelectionLength: 1
	});
});
	$('#kode_user').select2().on('change', function(){
		//var a = $('.js-example-basic-multiple').val();
		var a = $('#kode_user').val();
alert (a);
    $.ajax({
        url: "../create/create_user_dismantle_byrequest.php",
        data: { "value": $("#kode_user").val() },
		//data: { "value": a },
        //dataType:"html",
        type: "post",
        success: function(data){
			//alert(data);
		var hasil = JSON.parse(data);
		   $('#username_fal').val(hasil.kode_user);
           $('#nama_fal').val(hasil.nama_user);
		   $('#alamat_fal').val(hasil.alamat_user);
		   $('#tlp_fal').val(hasil.telp_user);
		   $('#kd_layanan').val(hasil.kd_layanan);
		   $('#off_tgl').val(hasil.off);
		   $('#off_total').val(hasil.jumday);
        }
    });		
	});
// In your Javascript (external .js resource or <script> tag)
/* $(document).ready(function() {
    $('.js-example-basic-single').select2();
}); */
	</script>
	<script src="../js/sweetalert2.all.min.js"></script>
    <script>

         $(document).ready(function() {
			 //get data value kapten
					$(document).on('click', '.editbyrequest', function(){
							//alert($(this).data('id'));
							var key_fal = $(this).attr('key_fal');
							var username_fal = $(this).attr('username_fal');
							var nama_fal = $(this).attr('nama_fal');
							var alamat_fal = $(this).attr('alamat_fal');
							var tlp_fal = $(this).attr('tlp_fal');
							var kd_layanan = $(this).attr('kd_layanan');
							
							$('#modaledit').modal('show');
							$('#key_fal2').val(key_fal);				
							$('#username_fal2').val(username_fal);				
							$('#nama_fal2').val(nama_fal);				
							$('#alamat_fal2').val(alamat_fal);				
							$('#tlp_fal2').val(tlp_fal);				
							$('#kd_layanan2').val(kd_layanan);						
					});
					
					// Edit 			
		$(document).on('click', '.actioneditlibur', function(){
			
            var key_fal2 = $("#key_fal2").val();			
            var pic_ikr2 = $("#pic_ikr2").val();		
            var kategori_pelanggan2 = $("#kategori_pelanggan2").val();
            var lain_lain2 = $("#lain_lain2").val();
            var username_fal2 = $("#username_fal2").val();
    
			
			//alert(key_fal2); return;
			
			if(kategori_pelanggan2 == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kategori Pelanggan Belum Terisi!',
				  
				})  
				return
			}
			
			if(lain_lain2 == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Keterangan Belum Terisi!',
				  
				})  
				return
			}
			
			if(username_fal2 == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Keterangan Belum Terisi!',
				  
				})  
				return
			}
			
	
			 
			 
			 //alert(get_distribusi); return;
			 
			 var value = { 
						  key_fal2:key_fal2, 
						  pic_ikr2:pic_ikr2, 					 
						  kategori_pelanggan2:kategori_pelanggan2,
						  lain_lain2:lain_lain2,
						  username_fal2:username_fal2,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_edit_libur.php",
                    data: value,
                    success : function(data) {
					alert(data);
					Swal.fire(
						  'Good job!',
						  'You clicked the button!',
						  'success'
						).then(function(success){
							//if (data == 'succes') {
								//alert('a');
						var table = $('#list_data').DataTable(); 
								table.ajax.reload( null, false );
								$("#modaledit").modal("hide");	
							//}
					})
					}
                }); 
			 
			});
			});
         $(document).ready(function() {

            bsCustomFileInput.init()

            

            var table = $('#tabel_pengguna').DataTable({

                "responsive": true,
                "processing": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                }, 
                "ajax": {
                    "url":"../models/datapengguna_disable_dcplibur.php",
                    "type":"POST",
                },				

                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                "columns": [
                    { mData: 'no'},					
					{ mData: 'username_fal'} ,
                    { mData: 'nama_fal'},
                    { mData: 'alamat_fal'} ,
                    { mData: 'tlp_fal'} , 
                    { mData: 'lain_lain'} ,
                    { mData: 'pic_ikr'} ,            
					{ mData: 'kategori_pelanggan'} ,					
					{ mData: 'tgl_progres'} ,					
					{ mData: 'off_tgl'} ,					
					{ mData: 'off_total'} ,					
					{ mData: 'status_log'} ,
                    { mData: 'action_edit'},                   

                ],

            });



             var table = $('#tabel_pengguna_ts').DataTable({

                "responsive": true,

                "processing": true,

                "language": {

                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

                }, 

                "ajax": {

                    "url":"../models/datapengguna_ts.php",

                    "type":"POST",

                },

                "paging": true,

                "lengthChange": true,

                "searching": true,

                "ordering": true,

                "info": true,

                "autoWidth": true,

                "responsive": true,

                "columns": [

                    { mData: 'no'},

                    { mData: 'nama_fal'} ,

                    { mData: 'alamat_fal'} ,

                    { mData: 'username_fal'},

                    { mData: 'modem'} ,

                    { mData: 'kabel1'} ,

                    { mData: 'kabel2'} ,

                    { mData: 'kabel3'} ,                   

                    { mData: 'produk'} ,                    

                    { mData: 'pic'} ,

                    { mData: 'pic2'} ,

                    { mData: 'status'},

                    { mData: 'status2'},

                ],

            });
			


            $( "#tanggal_user" ).datepicker({

                autoclose:true,

                todayHighlight:true,

                format:'dd-mm-yyyy',

                language: 'id'

            });



            $(document).on('click', '.add-data', function(){

                $('#modaltambahdata').modal('show');

                $("#formdatapengguna").trigger("reset");

                $("#username_fal").attr("disabled",false);

                $('.modal-user').text("Tambah Data");

                $('#action').val('insert');

                $('#actionform').text("Tambah");

            });

            

            $(".submitdata").click(function(){

            // alert("submit data");     
            var action= $("#action").val();
            var nama_fal = $("#nama_fal").val();
            var pic_ikr = $("#pic_ikr").val();
            var kd_layanan = $("#kd_layanan").val();

            var alamat_fal = $("#alamat_fal").val();

            var rt = $("#rt").val();

            var rw = $("#rw").val();

            var kelurahan = $("#kelurahan").val();

            var tlp_fal = $("#tlp_fal").val();

            var tgl_fal = $("#tgl_fal").val();

            var pic = $("#pic").val();

            var status = $("#status").val();

            var status2 = $("#status2").val();

            var jenis_wo = $("#jenis_wo").val();

            var produk = $("#produk").val();

            var off_tgl = $("#off_tgl").val();

            var off_total = $("#off_total").val();

            var kabel2 = $("#kabel2").val();

            var kabel3 = $("#kabel3").val();

            var paket_fal = $("#paket_fal").val();

            var tgl_fal = $("#tgl_fal").val();            

            var username_fal = $("#username_fal").val();
			
			var kategori_pelanggan = $("#kategori_pelanggan").val();

            var password_fal = $("#password_fal").val();

            var lain_lain = $("#lain_lain").val();

            var status_wo = $("#status_wo").val();

            var ket_user = $("#lain_lain").val();
			
			var pembayaran = $("#pembayaran").val();

            var k = $("#b").text();
			
			var status_log = $("#status_log").val();
			
			var free = $("#free").val();
			
			var pindah_alamat = $("#pindah_alamat").val();
			
			var total_diskon = $("#total_diskon").val();
			
			var keterangan_angsuran = $("#keterangan_angsuran").val();
			
			var verified = $("#verified").val();
			
			var letak_odp = $("#letak_odp").val();
			
			var total = (free + total_diskon + pindah_alamat);
			
			
			
			if(nama_fal == '' || username_fal == '' ){
				alert("DATA ANDA TIDAK LENGKAP"); 
				return
			}


            //alert(nama_fal); die();



            var value = { action:action, 
						  nama_fal:nama_fal, 
						  kd_layanan:kd_layanan, 
						  pic_ikr:pic_ikr,
						  alamat_fal:alamat_fal,
						  rt:rt,
						  rw:rw,
						  kelurahan:kelurahan,
						  tlp_fal:tlp_fal,
						  pic:pic , 
						  status:status, 
						  kategori_pelanggan:kategori_pelanggan,
						  status2:status2, 
						  jenis_wo:jenis_wo,
						  produk:produk,
						  status_log:status_log,
						  total_diskon:total_diskon,
						  keterangan_angsuran:keterangan_angsuran,
						  off_tgl:off_tgl,
						  free:free,
						  pindah_alamat:pindah_alamat,
						  off_total:off_total,
						  kabel2:kabel2,
						  kabel3:kabel3,
						  pembayaran:pembayaran,
						  paket_fal:paket_fal,
						  tgl_fal:tgl_fal,
						  username_fal:username_fal,
						  verified:verified,
						  total:total,
						  letak_odp:letak_odp,
						  password_fal:password_fal, status_wo:status_wo,lain_lain:lain_lain, ket:k }; 



                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_disable_100hari.php",

                    data: value,

                    success: function(data) {	
						alert(nama_fal);
                        $('#tabel_pengguna').DataTable().ajax.reload();
						

                    }

                });  

            });



            $(document).on('click', '.editpengguna', function(){

                var id = $(this).attr("id");

                $.ajax({

                    url:"../controller/get_data_disable_100hari.php",

                    method:"POST",

                    data:{id:id},

                    dataType:"JSON",

                    success:function(data)

                    {

                        $('#modaltambahdata').modal('show');

                        $("#username_fal").attr("disabled",true);

                        $('.modal-user').text("Edit Data");

                        $('#action').val('edit');

                        $('#actionform').text("Edit");

                        $("#nama_fal").val(data.nama_fal);

                        $("#pic_ikr").val(data.pic_ikr);

                        $("#kd_layanan").val(data.kd_layanan);

                        $("#alamat_fal").val(data.alamat_fal);

                        $("#lain_lain").val(data.lain_lain);

                        $("#rw").val(data.rw);

                        $("#kelurahan").val(data.kelurahan);

                        $("#tlp_fal").val(data.tlp_fal);

                        $("#tgl_fal").val(data.tgl_fal);

                        $("#pic").val(data.pic);

                        $("#status").val(data.status);

                        $("#jenis_wo").val(data.jenis_wo);

                        $("#produk").val(data.produk);

                        $("#modem").val(data.modem);

                        $("#kabel1").val(data.kabel1);

                        $("#kabel2").val(data.kabel2);

                        $("#kabel3").val(data.kabel3);

                        $("#status2").val(data.status2);

                        $("#paket_fal").val(data.paket_fal);                      

                        $("#status_wo").val(data.status_wo);

                        $("#username_fal").val(data.username_fal);

                        $("#off_tgl").val(data.off_tgl);

                        $("#off_total").val(data.off_total);
						
						$("#pembayaran").val(data.pembayaran);

                        $("#latitude").val(data.latitude);

                        $("#longitude").val(data.longitude);  

						$("#kategori_pelanggan").val(data.kategori_pelanggan);
						
						$("#status_log").val(data.status_log);
						
						$("#total_diskon").val(data.total_diskon);
						
						$("#keterangan_angsuran").val(data.keterangan_angsuran);
						
						$("#verified").val(data.verified);

                    }

                });

            });



            $(document).on('click', '.deletepengguna', function(){

                var id = $(this).attr("id");

                if(confirm('Hapus id '+id+'?'))

                {

                    $.ajax({

                        url:"../controller/delete.php",

                        method:"POST",

                        data:{id:id},

                        success:function(data)

                        {

                            $('#tabel_pengguna').DataTable().ajax.reload();

                            

                        }

                    })

                }

            });

        });

    </script>

     <script>

    // Set up global variable

    var result;

    

    function showPosition() {   

        // Store the element where the page displays the result

        result = document.getElementById("b");
        lokasi = document.getElementById("ba");
        

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

  $('#pic').change(function() {

    $('.select-default-hidden').hide();

    $('.select-default-shown').show();

      //var a = $(this).val();

      //alert (a);

    $('.select-' + $(this).val() + '-shown').show();

    $('.select-' + $(this).val() + '-hidden').hide();

}).change();

</script>

<script> 
/* $(function() {
    $('#KI').hide();
	$('#KJ').hide();
	$('#KN').hide();
    $('#OLT').change(function(){
		var a = $('#OLT').val();
		//alert(a);
       if(a == 'KI'){
            $('#KI').show(); 
			$('#KJ').hide();
			$('#KN').hide();
        else{
			$('#KI').hide();
			$('#KJ').hide();
			$('#KN').hide();
		}
    });
});
 */
/* $('#username_fal').change(function(){ 
 var a = $('#username_fal').val();
//alert (a);
    $.ajax({
        url: "../create_user_dismantle_byrequest.php",
        data: { "value": $("#username_fal").val() },
        //dataType:"html",
        type: "post",
        success: function(data){
			//alert(data);
		var hasil = JSON.parse(data);
           $('#nama_fal').val(hasil.nama_user);
		   $('#alamat_fal').val(hasil.alamat_user);
		   $('#tlp_fal').val(hasil.telp_user);
		   $('#kd_layanan').val(hasil.kd_layanan);
		   $('#off_tgl').val(hasil.off);
		   $('#off_total').val(hasil.jumday);
        }
    });
}); */
</script>



</body>



</html>
</html>
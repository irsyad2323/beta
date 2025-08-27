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



                    <!-- Page Heading -->

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <h1 class="h3 mb-0 text-gray-800">Instalasi Kapten <?php //echo $_SESSION["level_user"]; ?></h1>

                        <?php 

                            if ( $_SESSION["level_user"] != "Admin" && $_SESSION["level_user"] != "ikr"  && $_SESSION["level_user"] != "psg_dcp" ){ 

                        ?>

                        <div>                          



                            <a href="controller/export.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">

                                <i class="fas fa-download fa-sm text-white-50"></i> Generate Export 

                            </a>        

                        </div>

                    <?php } ?>

                    </div>
					
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
				




                        <?php 

                            if ( $_SESSION["level_user"] != "ikr"  && $_SESSION["level_user"] != "psg_dcp"){ 

                        ?>

                        <div class="row">



                        <!-- Earnings (Monthly) Card Example -->

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-left-primary shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">

                                                IKR RAFIF</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php

												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='rafif' and status_wo='Belum Terpasang' and jenis_wo='INSTALASI' ;";

												$result=mysqli_query($conn,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($conn);

												?>
											</div>

                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                         <!-- Earnings (Monthly) Card Example -->

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-left-primary shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">

                                                IKR WAWAN</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php

												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='wawan' and status_wo='Belum Terpasang'  and jenis_wo='INSTALASI' ;";

												$result=mysqli_query($conn,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($conn);

												?>
											</div>

                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                          <!-- Earnings (Monthly) Card Example -->

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-left-primary shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">

                                                IKR FAUZI</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php

												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='fauzi' and status_wo='Belum Terpasang'  and jenis_wo='INSTALASI' ;";

												$result=mysqli_query($conn,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($conn);

												?>
											</div>

                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <!-- Earnings (Monthly) Card Example -->

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-left-primary shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">

                                                IKR FIO</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php

												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='fio' and status_wo='Belum Terpasang'  and jenis_wo='INSTALASI' ;";

												$result=mysqli_query($conn,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($conn);

												?>
											</div>

                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                       <!-- Earnings (Monthly) Card Example -->

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-left-primary shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">

                                                IKR RINO</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php

												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='rino' and status_wo='Belum Terpasang' and jenis_wo='INSTALASI';";

												$result=mysqli_query($conn,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($conn);

												?>
											</div>

                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                          <!-- Earnings (Monthly) Card Example -->

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-left-primary shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">

                                                IKR Bayu PASURUAN</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php

												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='bayu' and status_wo='Belum Terpasang' and jenis_wo='INSTALASI';";

												$result=mysqli_query($conn,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($conn);

												?>
											</div>

                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <!-- Earnings (Monthly) Card Example -->

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-left-primary shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">

                                                IKR Ricky PASURUAN</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php

												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE pic_ikr='ricky' and status_wo='Belum Terpasang' and jenis_wo='INSTALASI';";

												$result=mysqli_query($conn,$sql);

												$row=mysqli_fetch_array($result);

												echo "$row[0]";

												mysqli_close($conn);

												?>
											</div>

                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>





                        <?php } ?>







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
                        if ($_SESSION["level_user"] != "ikr"){
                       ?>
					
						 <div class="form-row">                           
							
							<div class="form-group col-md-2">
                                <label for="rang">ID USER</label>                
                     <select class='form-control' id="username_fal" name="username_fal" >
					    <option> <?php
											  $conn = mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
											  $sql_user = mysqli_query($conn, "SELECT g.kode_user, g.nama_user, g.telp_user, CONCAT(g.paket,'', g.satuan) as paketan, DATE_FORMAT(r.expiration,'%d %b %y')as off, datediff(CURDATE(), r.expiration	) as jumday 
FROM tb_gundala g , tbl_user_recharges r
WHERE g.kode_user = r.username and datediff(CURDATE(), r.expiration) > 100 AND g.status_log = 'y' AND r.`status` = 'off' and g.kd_layanan = 'mlg' ORDER BY jumday DESC;");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['kode_user'].'">'.$data_user['kode_user'].' </option>';
											  } 
											?>   </option>					
						
						</select> &nbsp
                            </div> 
							
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
                            <label for="rang">OFF Tanggal</label>
                            <input class="form-control" type="text" id="off_tgl" name="off_tgl" placeholder="password" autocomplete="off" disabled>
                        </div>  

						<div class="form-group col-md-2">
                            <label for="rang">OFF Total</label>
                            <input class="form-control" type="text" id="off_total" name="off_total" placeholder="password" autocomplete="off" disabled>
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
                    <option>Lanjut</option>
                    <option>Berhenti</option>
                    <option>Libur</option>
                                  
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

// In your Javascript (external .js resource or <script> tag)
/* $(document).ready(function() {
    $('.js-example-basic-single').select2();
}); */
	</script>

    <script>

         $(document).ready(function() {

            bsCustomFileInput.init()

            

            var table = $('#tabel_pengguna').DataTable({

                "responsive": true,

                "processing": true,

                "language": {

                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

                }, 

                "ajax": {

                    "url":"../models/datapengguna_disable_lanjut.php",

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

                    { mData: 'action'},                    

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
			
			var perlakuan = $("#perlakuan").val();
			
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
						  perlakuan:perlakuan,
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
						
						$("#perlakuan").val(data.perlakuan);
						
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
$('#username_fal').change(function(){ 
 var a = $('#username_fal').val();
//alert (a);
    $.ajax({
        url: "../create_user_dismantle.php",
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
});
</script>



</body>



</html>
</html>
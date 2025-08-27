<?php
session_start();
$level_user = $_SESSION["level_user"];
$acces_user_log = $_SESSION["username"];
$level_kantor = $_SESSION["kantor"];

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

    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link

        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"

        rel="stylesheet">

    

    <link rel="stylesheet" href="asset/vendor/datatables/dataTables.bootstrap4.min.css">



    <!-- Custom styles for this template-->

    <link href="asset/css/sb-admin-2.css" rel="stylesheet">



  

    <link rel="stylesheet" href="asset/css/bootstrap-datepicker.min.css">



</head>



<body id="page-top">



    <!-- Page Wrapper -->

    <div id="wrapper">

	<?php include 'sidebar.php'; ?>
	
	

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

                                    src="img/undraw_profile.svg">

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

				  <?php 

                            if ( $_SESSION["level_user"] != "ikr" && $_SESSION["level_user"] != "Admin" && $_SESSION["level_user"] != "adminwo_fulus" && $_SESSION["level_user"] != "psg_dcp"){ 

                        ?>

              

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">EXPORT</h1>

                    <div class="row">
					
					<div class="col-lg-6">

                            <!-- Circle Buttons -->

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">EXPORT PENDAFTARAN</h6>
                                </div>
                                <div class="card-body">
									<div class="my-2"></div>
                                    <a href="controller/export_pendaftaran.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">PENDAFTARAN</span>
                                    </a>
									
									<div class="my-2"></div>
									<a href="controller/export_pendaftaran_mgm.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">PENDAFTARAN MGM</span>
                                    </a>                        
								</div>

                        </div>
							
							
						<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">EXPORT INSTALASI</h6>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="my-2"></div>
                                    <a href="controller/export_instalasi_odp.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">INSTALASI ODP</span>
                                    </a>
                                    <a href="controller/export_instalasi_odp_kml.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">INSTALASI ODP KML</span>
                                    </a>
									
									<div class="my-2"></div>                                    
									<a href="controller/export_tiang.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">INSTALASI TIANG </span>
                                    </a>
									
									<div class="my-2"></div>                                    
									<a href="controller/export_distribusi.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">INSTALASI KABEL DISTRIBUSI </span>
                                    </a>
									
									 <div class="my-2"></div>
                                    <a href="controller/export_kapten.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">KAPTEN NARATEL</span>
                                    </a> 

									<div class="my-2"></div>
                                    <a href="controller/export_kapten_correctiv.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">INSTALASI CORRECTIV</span>
                                    </a>  
									
									<div class="my-2"></div>
                                    <a href="controller/export_sinden.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">SINDEN</span>
                                    </a>  
									
									<div class="my-2"></div>
                                    <a href="controller/export_omah_wifi.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">OMAH WIFI</span>
                                    </a>

									<div class="my-2"></div>
                                    <a href="controller/export_broadband.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">BROADBAND</span>
                                    </a>
									
									<div class="my-2"></div>
                                    <a href="controller/export_dedicated.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-b50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">DEDICATED</span>
                                    </a>
								
									                                    
                            </div>

                        </div>
                            


                        </div>

					<div class="col-lg-6">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">EXPORT EXCEL MARKETING</h6>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="my-2"></div>
                                    <a href="controller/export_marketing.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">WO Marketing</span>
                                    </a>
									
									<div class="my-2"></div>
                                    <a href="controller/export_mgm.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">WO MGM</span>
                                    </a>
									
									                                    
                            </div>

                        </div>

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">EXPORT EXCEL MAINTENANCE</h6>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="my-2"></div>
                                    <a href="controller/export_maintenace.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">MAINTENANCE</span>
                                    </a>
									
									<div class="my-2"></div>
									<a href="controller/export_maintenace_odp.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">MAINTENANCE ODP </span>
                                    </a>
									
									<div class="my-2"></div>
									<a href="controller/export_maintenacebckbn.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">MAINTENANCE BACKBONE </span>
                                    </a>
									
									                                    
                            </div>

                        </div>

                    </div>
					
				    <div class="col-lg-6">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">EXPORT EXCEL DISMANTLE</h6>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="my-2"></div>
                                    <a href="controller/export_dismantle.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">DISMNATLE KAPTEN</span>
                                    </a>
									
									<div class="my-2"></div>
									<a href="controller/export_dismantle_nonkapten.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">NON KAPTEN</span>
                                    </a>
									
                                    
                            </div>

                        </div>

                    </div>
					
					<div class="col-lg-6">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">EXPORT EXCEL REPORT NMC</h6>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="my-2"></div>
                                    <a href="controller/export_nmc.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">REPORT NMC</span>
                                    </a>
									
									<div class="my-2"></div>
                                    <a href="controller/export_lain_lain.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">REPORT LAIN - LAIN</span>
                                    </a>
									
                                    
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

			<?php 
                            }
                        ?>
						
						<!-- End of Topbar -->

				  <?php 

                            if ( $_SESSION["level_user"] != "ikr" && $_SESSION["level_user"] != "ts" && $_SESSION["level_user"] != "kapten" && $_SESSION["level_user"] != "psg_dcp"){ 

                        ?>

                <!-- Begin Page Content -->

                <div class="container-fluid">


                        <div class="row">



                        <!-- Earnings (Monthly) Card Example -->

                        <div class="col-xl-3 col-md-6 mb-4">

                            <div class="card border-left-primary shadow h-100 py-2">

                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">

                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">

                                                IKR</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php

												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE jenis_wo='INSTALASI' ;";

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
									
									<div class="my-2"></div>
                                    <a href="ikr_kapten.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">IKR</span>
                                    </a>

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

                                                MAINTENANCE</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php

												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE jenis_wo='MAINTENANCE' ;";

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
									
									<div class="my-2"></div>
                                    <a href="maintenance.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">MAINTEANCE</span>
                                    </a>

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

                                                DISMANTLE</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php

												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE jenis_wo='DISMANTLE' ;";

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
									
									<div class="my-2"></div>
                                    <a href="dismantle.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">DISMANTLE</span>
                                    </a>

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

                                                SURVEY</div>

                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php

												$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");

												if (mysqli_connect_errno())

												  {

												  echo "Failed to connect to MySQL: " . mysqli_connect_error();

												  }

												$sql="SELECT COUNT(username_fal) FROM tbl_fal WHERE jenis_wo='SURVEY' ;";

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
									
									<div class="my-2"></div>
                                    <a href="survey.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">SURVEY</span>
                                    </a>

                                </div>

                            </div>

                        </div>
						
						

						
						
						<div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               

                 

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        
                    </ul>

                
                <!-- End of Topbar -->

                
            <!-- End of Main Content -->

			<?php 
                            }
                        ?>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>







            </div>

            <!-- End of Main Content -->



           

            <!-- End of Footer -->



        </div>

        <!-- End of Content Wrapper -->



    </div>

    <!-- End of Page Wrapper -->



    <!-- Scroll to Top Button-->

    <a class="scroll-to-top rounded" href="#page-top">

        <i class="fas fa-angle-up"></i>

    </a>



    



    



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

                    <a class="btn btn-danger" href="controller/logout.php">Logout</a>

                </div>

            </div>

        </div>

    </div>
    <!-- Bootstrap core JavaScript-->

    <script src="asset/vendor/jquery/jquery.min.js"></script>

    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



    <!-- Core plugin JavaScript-->

    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>



    <!-- Custom scripts for all pages-->

    <script src="asset/js/sb-admin-2.min.js"></script>



    <!-- Page level plugins -->

    <script src="asset/vendor/chart.js/Chart.min.js"></script>


    <!-- Page level custom scripts -->

    <script src="asset/js/demo/chart-area-demo.js"></script>

    <script src="asset/js/demo/chart-pie-demo.js"></script>

    <script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>

    <script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

    <!-- datepicker bootstrap -->



    <script src="asset/js/bootstrap-datepicker.min.js"></script>

    <script src="asset/locales/bootstrap-datepicker.id.min.js"></script>
	
	<script src="asset/dist/js/menu.js"></script



   

</body>



</html>
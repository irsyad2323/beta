<?php

session_start();
$level_kantor = $_SESSION["kantor"];


if(!isset($_SESSION["logingundala"])){

    header("location:login.php");

    exit;

}


$kota = $_SESSION["level_kantor"];
?>

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



                <!-- Begin Page Content -->

                <div class="container-fluid">



                    <!-- Page Heading -->

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <h1 class="h3 mb-0 text-gray-800">FAL PENDAFTARAN <?php //echo $_SESSION["level_user"]; ?></h1>

                     

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

                        <button class="btn btn-success insertkptn">TAMBAH +</button>

                    </div>

					
					<?php } ?>			
				




                        <?php 

                            if ( $_SESSION["level_user"] != "ikr"){ 

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
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna" width="100%" cellspacing="0">
								  <thead>
									<tr>
									  <th>Key</th>
									  <th>TANGGAL FAL</th>
									  <th>NAMA</th>
									  <th>NO WA</th>
									  <th>ALAMAT</th>							
									  <th>Provinsi</th>
									  <th>Kabupaten</th>
									  <th>Kecamatan</th>
									  <th>Kelurahan</th>
									  <th>RW</th>
									  <th>RT</th>
									  <th>PAKET</th>
									  <th>STATUS LOKASI</th>
									  <th>TAHU LAYANAN</th>
									  <th>ACTION</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									  <th>Key</th>
									  <th>TANGGAL FAL</th>
									  <th>NAMA</th>
									  <th>NO WA</th>
									  <th>ALAMAT</th>							
									  <th>Provinsi</th>
									  <th>Kabupaten</th>
									  <th>Kecamatan</th>
									  <th>Kelurahan</th>
									  <th>RW</th>
									  <th>RT</th>
									  <th>PAKET</th>
									  <th>STATUS LOKASI</th>
									  <th>TAHU LAYANAN</th>
									  <th>ACTION</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
										  include('../controller/controller_daf.php');
										  $acces_user_log = $_SESSION["username"];
										  $table = mysqli_query($koneksi,"SELECT b.nama_provinsi, c.nama_kabkota, d.nama_kec, e.nama_kel ,a.*, DATE_FORMAT(a.tanggal,'%d-%m-%Y') as tgl FROM tb_daf a
																		LEFT JOIN tb_provinsi b
																		on a.provinsi = b.kd_provinsi
																		LEFT JOIN tb_kabkota c
																		on a.kabupaten = c.kd_kabkota
																		LEFT JOIN tb_kecamatan d
																		on a.kecamatan = d.kd_kec
																		LEFT JOIN tb_kelurahan e
																		on a.kelurahan =  e.kd_kel
																		WHERE a.status='n' and a.kabupaten = d.kd_kabkota AND d.kd_kec = e.kd_kec and c.kd_kabkota = e.kd_kabkota and a.layanan like '".$kota."' GROUP BY a.key_fal DESC ;");
											$i=1;
										  while ($row = mysqli_fetch_assoc($table)){ 
										  
										  $no=1;
										  
										  ?>
										  <tr id=<?php echo $row['key_fal']; ?>">
											<td data-target="i"> <?php echo $i;?></td>
											<td data-target="tgl"> <?php echo $row['tgl'];?></td>
											<td data-target="nama_lengkap"> <?php echo $row['nama_lengkap'];?></td>
											<td data-target="no_wa"> <?php echo $row['no_wa'];?></td>
											<td data-target="alamat"> <?php echo $row['alamat'];?></td>
											<td data-target="nama_provinsi"> <?php echo $row['nama_provinsi'];?></td>
											<td data-target="nama_kabkota"> <?php echo $row['nama_kabkota'];?></td>
											<td data-target="nama_kec"> <?php echo $row['nama_kec'];?></td>
											<td data-target="nama_kel"> <?php echo $row['nama_kel'];?></td>
											<td data-target="rw"> <?php echo $row['rw'];?></td>
											<td data-target="rt"> <?php echo $row['rt'];?></td>
											<td data-target="paket_kapten"> <?php echo $row['paket_kapten'];?></td>
											<td data-target="status_lokasi"> <?php echo $row['status_lokasi'];?></td>
											<td data-target="tahu_layanan"> <?php echo $row['tahu_layanan'];?></td>
											<td>
												<div class="dropdown">
												  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
						<!-- /.container-fluid -->
						
						<!-- Begin Page Content -->
						<div class="container-fluid">

						  <!-- Page Heading 
						  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
						  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
							-->
						  <!-- DataTales Example -->
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data Instalasi Di WO</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_solved" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>NAMA</th>
									<th>ALAMAT</th>
									<th>NO TELP</th>
									<th>PAKET</th>
									<th>TANGGAL FAL</th>
									<th>IDUSER</th>                        
									<th>PASSWORD</th>
									<th>KD LAYANAN</th>
									<th>PIC IKR</th>
									<th>STATUS</th>									
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>NO</th>
									<th>NAMA</th>
									<th>ALAMAT</th>
									<th>NO TELP</th>
									<th>PAKET</th>
									<th>TANGGAL FAL</th>
									<th>IDUSER</th>                        
									<th>PASSWORD</th>
									<th>KD LAYANAN</th>
									<th>PIC IKR</th>
									<th>STATUS</th>	
									</tr>
								  </tfoot>
								  <tbody>
									
								  </tbody>
								</table>
							  </div>
							</div>
						  </div>

						</div>
						<!-- /.container-fluid -->


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
	
	<div class="modal fade" id="modaltambahdata"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

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
                                <label for="rang">OLT</label>                
                     <select class='form-control' id="OLT" name="OLT" >
					    <option></option>
						<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg1" ){  ?>						
						<option value="KT">OLT JONI</option>
						<option value="KI">OLT IMA</option>
						<option value="KN">OLT KANTOR</option>
						<option value="EDKN">Edubiz Kantor</option>
						<option value="EDKJ">Edubiz Joni</option>
						<option value="EDKI">Edubiz Ima</option>
						<?php } ?>
						<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg" ){  ?>	
						<option value="JT">OLT JALANTRA</option>
						<option value="EDJT">Edubiz Jalantra</option>
						<?php } ?>
						<?php if ( $_SESSION["level_kantor"] != "mlg" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg1" ){  ?>	
						<option value="KP">OLT PASURUAN</option>
						<option value="EDKM">Edubiz Pasuruan</option>
						<?php } ?>
						<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "mlg" && $_SESSION["level_kantor"] != "mlg1" ){  ?>	
						<option value="KD">OLT BATU</option>
						<option value="EDKD">Edubiz Batu</option>
						<?php } ?>
						</select> &nbsp
                            </div> 
						<br/>
						
							<div class="form-row">
								<label for="rang">ID User</label>
								<input class="form-control" type="text" id="username_fal" name="username_fal" autocomplete="off"  >
							</div>
						<br/>
                            <div class="form-row">
                                <label for="fname">Nama</label>
                                <input class="form-control" type="text" id="nama_fal" name="nama_fal" placeholder="nama..." >
                            </div>
						<br/>				
					
                            <div class="form-row">
                                <label for="halaman">NO. Telepon</label>
                                <input class="form-control" type="number" id="no_wa" name="no_wa" placeholder="telepon.." autocomplete="off" >
                            </div>  
						<br/>
							
							<div class="form-row">
								<label for="rang">Password</label>
								<input class="form-control" type="text" id="password_fal" name="password_fal" placeholder="password" autocomplete="off" >
							</div>   
						<br/>
							
                            <div class="form-row">
                                <label for="rang">Paket</label>                
									<select class="form-control" type="text" id="paket_fal" name="paket_fal" autocomplete="off" >
									<option>-</option>
									<option>5</option>
									<option>10</option>
									<option>15</option>
									<option>20</option>
									<option>30</option>                     
									<option>50</option>                     
									<option>60</option>                     
									<option>100</option>                     
									<option>Edubiz-5-100</option>                    
									<option>Edubiz-10-100</option>                    
									<option>Edubiz-15-100</option>                    
									<option>Edubiz-20-100</option>                    
									<option>Edubiz-Halfday-100</option> 								
									</select>
                            </div>
						<br/>
						
                            <div class="form-row">
                                <label for="rang">kantor Cabang</label>                
								<select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" required>
								<option><?php echo $kota ?></option>
								<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg" ){  ?>
								<option>mlg</option>					
								<option>pas</option>
								<option>batu</option>
								<?php } ?>
								</select>
                            </div> 
						<br/>
                                                 
                            <div class="form-row">
								<label for="lname">Alamat</label>
								<input class="form-control" type="text" id="alamat_fal" name="alamat" placeholder="alamat..." autocomplete="off" >
							</div>
						<br/>
							
                            <div class="form-row">
                               <input class="form-control" type="hidden" id="rt" name="rt" placeholder="rt..." autocomplete="off" >
                            </div> 
							
							<div class="form-row">
                               <input class="form-control" type="hidden" id="key_fal" name="key_fal" placeholder="rt..." autocomplete="off" >
                            </div>
						
							
                            <div class="form-row">
                               <input class="form-control" type="hidden" id="rw" name="rw" placeholder="rw..." autocomplete="off" >
                            </div>
						
							
                            <div class="form-row">
                               <input class="form-control" type="hidden" id="kelurahan" name="kelurahan" placeholder="kelurahan..." autocomplete="off" >
                            </div>
					
						
                            <div class="form-row">
                               <input class="form-control" type="hidden" id="kecamatan" name="kecamatan" placeholder="kelurahan..." autocomplete="off" >
                            </div>
						
                            <div class="form-row">
                               <input class="form-control" type="hidden" id="kabupaten" name="kabupaten" placeholder="kelurahan..." autocomplete="off" >
                            </div>
						
                            <div class="form-row">                               
                               <input class="form-control" type="hidden" id="provinsi" name="provinsi" placeholder="kelurahan..." autocomplete="off" >
                            </div>
						
							<div class="form-row">                               
                               <input class="form-control" type="hidden" id="lokasi" name="lokasi" placeholder="kelurahan..." autocomplete="off" >
                            </div>
						
							<div class="form-row">                               
                               <input class="form-control" type="hidden" id="status_lokasi" name="status_lokasi" placeholder="kelurahan..." autocomplete="off" >
                            </div>
						
							<div class="form-row">                               
                               <input class="form-control" type="hidden" id="tahu_layanan" name="tahu_layanan" placeholder="kelurahan..." autocomplete="off" >
                            </div>
						
							<div class="form-row">                               
                               <input class="form-control" type="hidden" id="alasan" name="alasan" placeholder="kelurahan..." autocomplete="off" >
                            </div>
							
							<div class="form-row">                               
                                  <input class="form-control" type="hidden" id="foto_rumah" name="foto_rumah" placeholder="kelurahan..." autocomplete="off" >
                             
                            </div>
						
							<div class="form-row">                                                              
                               <input class="form-control" type="hidden" id="foto_ktp" name="foto_ktp" placeholder="kelurahan..." autocomplete="off" >
                            </div>
						
							<div class="form-row">                                                              
                               <input class="form-control" type="hidden" id="no_wa2" name="no_wa2" autocomplete="off" >
                              
                            </div>
						
							<div class="form-row">                                                              
                               <input class="form-control" type="hidden" id="no_wa3" name="no_wa3" autocomplete="off" >
                               
                              
                            </div>
						
							<div class="form-row">                                                              
                              <input class="form-control" type="hidden" id="no_wa4" name="no_wa4" autocomplete="off" >
                               
                              
                            </div>
                        
              		
							<div class="form-row">
								<label>Tanggal POST WO</label>
								<input type="datetime-local" name="tgl_fal" id="tgl_fal" class="form-control" ="true" >
								<p class="text-danger" id="err_tanggal_masuk"></p>
							</div>
						<br/>
						
						<div class="form-row">
                                <label for="rang">Jadwal</label>                
								 <select class='form-control' id="jadwal" name="jadwal" onclick='test()'>
									<option></option>
									<option value="waktu_1"> Jam 1 (06:00 - 08:00)</option>
									<option value="waktu_2"> Jam 2 (08:00 - 10:00)</option>
									<option value="waktu_3"> Jam 3 (10:00 - 12:00)</option>
									<option value="waktu_4"> Jam 4 (13:00 - 15:00)</option>
									<option value="waktu_5"> Jam 4 (15:00 - 17:00)</option>
									<option value="waktu_6"> Jam 4 (18:00 - 20:00)</option>
									</select> &nbsp
                            </div> 
						<br/>

							<div class="form-row">
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
							</div>
						<br/>
						
						<div class="form-row">
                                <label for="rang">Perlakuan Khusus</label>                
								 <select class='form-control' id="perlakuan" name="perlakuan" onclick='test()'>
									<option></option>
									<option value="Diskon Biaya Instalasi">Diskon Biaya Instalasi</option>
									<option value="Angsuran Biaya Instalasi">Angsuran Biaya Instalasi</option>						
									<option value="Free Biaya Instalasi & Free Biaya Bulanan">Free Biaya Instalasi & Free Biaya Bulanan</option>
									<option value="Pindah Alamat">Pindah Alamat</option>
									<option value="Pindah Alamat">Promo 17 Agustus</option>
									</select> &nbsp
                            </div> 
						<br/>
					
							<div class="form-row">
						
							</div>
							
						<div class="form-row">
							<label for="rang"></label> 
                            <input class="form-control" type="number" id="total_diskon" name="total_diskon" placeholder="total diskon" style="display: none" >
							
							<select class="form-control" type="number" id="free" name="free" autocomplete="off" style="display: none" >
							<option></option>
							<option>340000</option>
							<option>395000</option>
							<option>455000</option> 
							<option>545000</option> 					
							</select>

							<input class="form-control" type="number" id="keterangan_angsuran" name="keterangan_angsuran" placeholder="angsuran pertama" style="display: none" >
							<input class="form-control" type="number" id="pindah_alamat" name="pindah_alamat" placeholder="tarif pindah alamat" style="display: none" >
                        </div>
					<br/>
                  
							
						
			

                   				
						<hr>
                            <button type="button" class="btn btn-success  pull-right action_post_kap">Insert</button>
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
					
					<?php 
                        if ($_SESSION["level_user"] != "ikr"){
                       ?>
							
							
                            <div class="form-row">
                                <label for="rang">Pekerjaan</label>                
									<select class="form-control" type="text" id="jenis_pekerjaan" name="jenis_pekerjaan" autocomplete="off" >
									<option></option>
									<option>jobdesk</option>
									<option>wo</option>									                   
									</select>
                            </div>
						<br/>
						
							<div class="form-row">
								<label for="rang">ID User</label>
								<input class="form-control" type="text" id="username_fal2" name="username_fal2" autocomplete="off" disabled>
							</div>
						<br/>
                            <div class="form-row">
                                <label for="fname">Nama</label>
                                <input class="form-control" type="text" id="nama_fal2" name="nama_fal2" placeholder="nama..." >
                            </div>
						<br/>				
					
                            <div class="form-row">
                                <label for="halaman">NO. Telepon</label>
                                <input class="form-control" type="number" id="tlp_fal2" name="tlp_fal2" placeholder="telepon.." autocomplete="off" >
                            </div>  
						<br/>
							
							<div class="form-row">
								<label for="rang">Password</label>
								<input class="form-control" type="text" id="password_fal2" name="password_fal2" placeholder="password" autocomplete="off" >
							</div>   
						<br/>
						
                            <div class="form-row">
                                <label for="rang">Paket</label>                
									<select class="form-control" type="text" id="paket_fal2" name="paket_fal2" autocomplete="off" >
									<option>-</option>
									<option>5</option>
									<option>10</option>
									<option>15</option>
									<option>20</option>
									<option>30</option>                     
									</select>
                            </div>
						<br/>
						
                            <div class="form-row">
                                <label for="rang">kantor Cabang</label>                
								<select class="form-control" type="text" id="kd_layanan2" name="kd_layanan2" autocomplete="off" required>
								<option><?php echo $kota ?></option>
								<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg" ){  ?>
								<option>mlg</option>					
								<option>pas</option>
								<option>batu</option>
								<?php } ?>
								</select>
                            </div> 
						<br/>
						
                            <div class="form-row">
                                <label for="rang">Pic IKR</label>                
									<select class="form-control" type="text" id="pic_ikr2" name="pic_ikr2" autocomplete="off" >
									<option>-</option>
								   <option>rafif</option>
									<option>wawan</option>
									<option>fauzi</option>
									<option>kiki</option>                    
									<option>ricky</option>
									<option>lukman</option>
									<option>fio</option>
									<option>rino</option>
									<option>bayu</option>                    
									<option>yusufpas</option>
									<option>yuni</option>
									<option>roy</option>
									<option>sonny</option>
									<option>novan</option>
									<option>roni</option>
									<option>ahnaf</option>
									<option>ryezal</option>
									<option>movic</option>
									</select>
                            </div> 
						<br/>
                                                 
                            <div class="form-row">
								<label for="lname">Alamat</label>
								<input class="form-control" type="text" id="alamat_fal2" name="alamat_fal2" placeholder="alamat..." autocomplete="off" >
							</div>
						<br/>
							
                            <div class="form-row">
                                <label for="rang">RT</label>
                               <input class="form-control" type="text" id="rt2" name="rt2" placeholder="rt..." autocomplete="off" >
                            </div>
						<br/>
							
                            <div class="form-row">
                                <label for="rang">RW</label>
                               <input class="form-control" type="text" id="rw2" name="rw2" placeholder="rw..." autocomplete="off" >
                            </div>
						<br/>	
							
                            <div class="form-row">
                                <label for="rang">Kelurahan</label>
                               <input class="form-control" type="text" id="kelurahan2" name="kelurahan2" placeholder="kelurahan..." autocomplete="off" >
                            </div>
						<br/>
                        
              		
							<div class="form-row">
								<label>Tanggal FAL</label>
								<input type="date" name="tgl_fal2" id="tgl_fal2" class="form-control" ="true" >
								<p class="text-danger" id="err_tanggal_masuk"></p>
							</div>
						<br/>

							<div class="form-row">
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="lain_lain2" name="lain_lain2" placeholder="keterangan" autocomplete="off">
							</div>
						<br/>                  
							
						<div class="form-row">
                                <label for="rang">Perlakuan Khusus</label>                
								 <select class='form-control' id="perlakuan2" name="perlakuan2" onclick='test()'>
									<option></option>
									<option value="Diskon Biaya Instalasi">Diskon Biaya Instalasi</option>
									<option value="Angsuran Biaya Instalasi">Angsuran Biaya Instalasi</option>						
									<option value="Free Biaya Instalasi & Free Biaya Bulanan">Free Biaya Instalasi & Free Biaya Bulanan</option>
									<option value="Pindah Alamat">Pindah Alamat</option>
									</select> &nbsp
                            </div> 
						<br/>
					
							<div class="form-row">
						
							</div>
							
						<div class="form-row">
							<label for="rang">Perlakuan Khusus</label> 
                            <input class="form-control" type="number" id="total_diskon2" name="total_diskon2" placeholder="total diskon" >
						</div>
					<br/>	
						
						<div class="form-row">
							<label for="rang">Free</label> 
							<select class="form-control" type="number" id="free2" name="free2" autocomplete="off">
							<option></option>
							<option>340000</option>
							<option>395000</option>
							<option>455000</option> 
							<option>545000</option> 					
							</select>
						</div>
					<br/>
						
						<div class="form-row">
							<label for="rang">Angsuran Pertama</label> 
							<input class="form-control" type="number" id="keterangan_angsuran2" name="keterangan_angsuran2" placeholder="angsuran pertama">
						</div>
					<br/>
						<div class="form-row">
							<label for="rang">Pindah Alamat</label> 
							<input class="form-control" type="number" id="pindah_alamat2" name="pindah_alamat2" placeholder="tarif pindah alamat">
                        </div>
					<br/>
			

                   				
						<hr>
                            <button type="button" class="btn btn-success  pull-right actionpost">edit</button>
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

                <form action="../controller/import.php" method="post" enctype="multipart/form-data">

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


 

    <script src="../asset/vendor/datatables/jquery.dataTables.min.js"></script>

    <script src="../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="../js/bs-custom-file-input.js"></script>

    <!-- datepicker bootstrap -->

	<script src="../js/sweetalert2.all.min.js"></script>

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

                

                "paging": true,

                "lengthChange": true,

                "searching": true,

                "ordering": false,

                "info": true,

                "autoWidth": true,

                "responsive": true,

                

            });
			
			var table = $('#tabel_solved').DataTable({

                "responsive": true,

                "processing": true,

                "language": {

                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

                }, 

                "ajax": {

                    "url":"../models/datapengguna_fal_pendaftaran.php",

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

                    { mData: 'tlp_fal'},

                    { mData: 'paket_fal'} ,

                    { mData: 'tgl_fal'} ,

                    { mData: 'username_fal'} ,

                    { mData: 'password_fal'} ,                   

                    { mData: 'kd_layanan'} ,                    

                    { mData: 'pic_ikr'} ,

                    { mData: 'type_status'} ,

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



       
			
			$(document).on('click', '.insertkptn', function(){
             
				$('#modaltambahdata').modal('show');
				
				
            });
			
			// INSERT 			
		$(document).on('click', '.action_post_kap', function(){
			
            var key_fal = $("#key_fal").val();
            var nama_fal = $("#nama_fal").val();
            //var pic_ikr = $("#pic_ikr").val();
            var kd_layanan = $("#kd_layanan").val();
            var alamat_fal = $("#alamat_fal").val();
            var rt = $("#rt").val();
            var rw = $("#rw").val();
            var kelurahan = $("#kelurahan").val();
            var provinsi = $("#provinsi").val();
            var kabupaten = $("#kabupaten").val();
            var kecamatan = $("#kecamatan").val();
            var lokasi = $("#lokasi").val();
            var foto_rumah = $("#foto_rumah").val();
            var foto_ktp = $("#foto_ktp").val();
            var no_wa = $("#no_wa").val();
            var no_wa2 = $("#no_wa2").val();
            var no_wa3 = $("#no_wa3").val();
            var no_wa4 = $("#no_wa4").val();
            var tgl_fal = $("#tgl_fal").val();			
			var paket_fal = $("#paket_fal").val();
            var pic = $("#pic").val();
            var status = $("#status").val();
            var status2 = $("#status2").val();
            var jenis_wo = $("#jenis_wo").val();
            var produk = $("#produk").val();          
            var username_fal = $("#username_fal").val();
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
			var status_lokasi = $("#status_lokasi").val();			
			var tahu_layanan = $("#tahu_layanan").val();			
			var alasan = $("#alasan").val();			
			var jadwal = $("#jadwal").val();			
			var total = (free + total_diskon + pindah_alamat);
			
			//alert(no_wa); return;
			 
			if(nama_fal == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Nama Belum Terisi!',				  
				}) 
				return
			} 
			 
			if(alamat_fal == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Alamat Belum Terisi!',				  
				}) 
				return
			}
			
			if(username_fal == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'ID User Belum Terisi!',
				  
				})  
				return
			}
			
			if(password_fal == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Password Belum Terisi!',
				  
				})  
				return
			}
			
			
			if(paket_fal == '-' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Paket Belum Terisi!',
				  
				})  
				return
			}
			
			if(tgl_fal == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Tgl Fal Belum Terisi!',
				  
				})  
				return
			}
			
			if(jadwal == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Jadwal Belum Terpilih!',
				  
				})  
				return
			}
			 
			 
			 //alert(get_distribusi); return;
			 
			 var value = { 
						  key_fal:key_fal, 
						  nama_fal:nama_fal, 
						  kd_layanan:kd_layanan, 
						  //pic_ikr:pic_ikr,
						  alamat_fal:alamat_fal,
						  rt:rt,
						  rw:rw,
						  kelurahan:kelurahan,
						  kabupaten:kabupaten,
						  kecamatan:kecamatan,
						  provinsi:provinsi,
						  no_wa:no_wa,
						  no_wa2:no_wa2,
						  no_wa3:no_wa3,
						  no_wa4:no_wa4,
						  pic:pic , 
						  status:status, 						  
						  status2:status2, 
						  jenis_wo:jenis_wo,
						  produk:produk,
						  lokasi:lokasi,
						  foto_rumah:foto_rumah,
						  foto_ktp:foto_ktp,
						  perlakuan:perlakuan,
						  total_diskon:total_diskon,
						  total:total,
						  keterangan_angsuran:keterangan_angsuran,	
						  free:free,
						  pindah_alamat:pindah_alamat,				  
						  paket_fal:paket_fal,
						  tgl_fal:tgl_fal,
						  username_fal:username_fal,		
						  status_lokasi:status_lokasi,	
						  tahu_layanan:tahu_layanan,	
						  alasan:alasan,					
						  jadwal:jadwal,					
						  password_fal:password_fal, status_wo:status_wo,lain_lain:lain_lain,
						 }; 

								$.ajax({
								type: "POST",
								async: false,
								url: "../controller/action_post_wo_newversi.php",
								data: value,
								success : function(data) {
								//alert(data);
								var a = data;
								//console.log(a); return;
								if(a == 1){
									Swal.fire(
										  'Good job!',
										  'Sukses Sign Work Order',
										  'success'
										).then(function(success){
										  window.location.reload(true);
										})
								}else if(a == 'jam1'){
									Swal.fire(
										  'Error!',
										  'Slot Jam 6 - 8 penuh!!',
										  'error'
									).then(function(success){
										return;
									})
								}else if(a == 'jam2'){
									Swal.fire(
										  'Error!',
										  'Slot Jam 8 - 10 penuh!!',
										  'error'
									).then(function(success){
										return;
									})
								}else if(a == 'jam3'){
									Swal.fire(
										  'Error!',
										  'Slot Jam 10 - 12 penuh!!',
										  'error'
									).then(function(success){
										return;
									})
								}else if(a == 'jam4'){
									Swal.fire(
										  'Error!',
										  'Slot Jam 13 - 15 penuh!!',
										  'error'
									).then(function(success){
										return;
									})
								}else if(a == 'jam5'){
									Swal.fire(
										  'Error!',
										  'Slot Jam 15 - 17 penuh!!',
										  'error'
									).then(function(success){
										return;
									})
								}else if(a == 'jam6'){
									Swal.fire(
										  'Error!',
										  'Slot Jam 18 - 20 penuh!!',
										  'error'
									).then(function(success){
										return;
									})
								}else if(a == 'Error'){
									Swal.fire(
										  'Error!',
										  'Error Query bro!!',
										  'error'
									).then(function(success){
										return;
									})
								}
								}
							}); 
				
			 
			});
		
			//get data value kapten
		$(document).on('click', '.editpendaftaran', function(){
                //alert($(this).data('id'));
				var key_fal = $(this).attr('key_fal');				
				var nama_lengkap = $(this).attr('nama_lengkap');				
				var no_wa = $(this).attr('no_wa');				
				var no_wa2 = $(this).attr('no_wa2');				
				var no_wa3 = $(this).attr('no_wa3');				
				var no_wa4 = $(this).attr('no_wa4');				
				var alamat = $(this).attr('alamat');				
				var rt1 = $(this).attr('rt1');				
				var rw = $(this).attr('rw');				
				var provinsi = $(this).attr('provinsi');				
				var kabupaten = $(this).attr('kabupaten');				
				var kecamatan = $(this).attr('kecamatan');				
				var kelurahan = $(this).attr('kelurahan');				
				var foto_rumah = $(this).attr('foto_rumah');				
				var foto_ktp = $(this).attr('foto_ktp');				
				var paket_kapten = $(this).attr('paket_kapten');				
				var lokasi = $(this).attr('lokasi');				
				var status_lokasi = $(this).attr('status_lokasi');				
				var tahu_layanan = $(this).attr('tahu_layanan');				
				var alasan = $(this).attr('alasan');				
				//.alert($(this).data('key'));
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (nama_lengkap); return;
				
				$('#modaltambahdata').modal('show');									
				$('#key_fal').val(key_fal);
				$('#nama_fal').val(nama_lengkap);
				$('#no_wa').val(no_wa);
				$('#no_wa2').val(no_wa2);
				$('#no_wa3').val(no_wa3);
				$('#no_wa4').val(no_wa4);
				$('#paket_fal').val(paket_kapten);
				$('#alamat_fal').val(alamat);				
				$('#rt').val(rt1);
				$('#rw').val(rw);				
				$('#kelurahan').val(kelurahan);				
				$('#kecamatan').val(kecamatan);				
				$('#kabupaten').val(kabupaten);				
				$('#provinsi').val(provinsi);
				$('#foto_rumah').val(foto_rumah);				
				$('#foto_ktp').val(foto_ktp);				
				$('#lokasi').val(lokasi);				
				$('#status_lokasi').val(status_lokasi);				
				$('#tahu_layanan').val(tahu_layanan);				
				$('#alasan').val(alasan);				
            });
			
		// Edit 			
		$(document).on('click', '.actionpost', function(){
			
            var jenis_pekerjaan = $("#jenis_pekerjaan").val();			
            var nama_fal2 = $("#nama_fal2").val();
            var pic_ikr2 = $("#pic_ikr2").val();
            var kd_layanan2 = $("#kd_layanan2").val();
            var alamat_fal2 = $("#alamat_fal2").val();
            var rt2 = $("#rt2").val();
            var rw2 = $("#rw2").val();
            var kelurahan2 = $("#kelurahan2").val();
            var tlp_fal2 = $("#tlp_fal2").val();
            var tgl_fal2 = $("#tgl_fal2").val();			
			var paket_fal2 = $("#paket_fal2").val();
            var jenis_wo2 = $("#jenis_wo2").val();
            var produk2 = $("#produk2").val();       
            var tgl_fal2 = $("#tgl_fal2").val();          
            var username_fal2 = $("#username_fal2").val();
            var password_fal2 = $("#password_fal2").val();
            var lain_lain2 = $("#lain_lain2").val();
            var status_wo2 = $("#status_wo2").val();
            var ket_user2 = $("#lain_lain2").val();			
			var pembayaran2 = $("#pembayaran2").val();          
			var perlakuan2 = $("#perlakuan2").val();			
			var free2 = $("#free2").val();			
			var pindah_alamat2 = $("#pindah_alamat2").val();			
			var total_diskon2 = $("#total_diskon2").val();			
			var keterangan_angsuran2 = $("#keterangan_angsuran2").val();			
			var verified2 = $("#verified2").val();			
			var letak_odp2 = $("#letak_odp2").val();			
			var total2 = (free + total_diskon + pindah_alamat);
			
			//alert(nama_fal2); return;
			 
			if(nama_fal2 == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Nama Belum Terisi!',				  
				}) 
				return
			} 
			 
			if(alamat_fal2 == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Alamat ODP Belum Terisi!',				  
				}) 
				return
			}
			
			if(username_fal2 == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'ID User Belum Terisi!',
				  
				})  
				return
			}
			
			if(password_fal2 == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Password Belum Terisi!',
				  
				})  
				return
			}
			
			if(tlp_fal2 == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'No Telfon Belum Terisi!',
				  
				})  
				return
			}
			
			if(paket_fal2 == '-' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Paket Belum Terisi!',
				  
				})  
				return
			}
			
			if(rt2 == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'RT Belum Terisi!',
				  
				})  
				return
			}
			
			if(rw2 == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'RW Belum Terisi!',
				  
				})  
				return
			}
			
			if(kelurahan2 == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kelurahan Belum Terisi!',
				  
				})  
				return
			}
			
			if(tgl_fal2 == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Tgl Fal Belum Terisi!',
				  
				})  
				return
			}
			 
			 
			 //alert(get_distribusi); return;
			 
			 var value = { 
						  jenis_pekerjaan:jenis_pekerjaan, 
						  nama_fal:nama_fal2, 
						  kd_layanan:kd_layanan2, 
						  pic_ikr:pic_ikr2,
						  alamat_fal:alamat_fal2,
						  rt:rt2,
						  rw:rw2,
						  kelurahan:kelurahan2,
						  tlp_fal:tlp_fal2,						
						  jenis_wo:jenis_wo2,
						  produk:produk2,
						  perlakuan:perlakuan2,
						  total_diskon:total_diskon2,
						  keterangan_angsuran:keterangan_angsuran2,						 
						  free:free2,
						  pindah_alamat:pindah_alamat2,						  
						  pembayaran:pembayaran2,
						  paket_fal:paket_fal2,
						  tgl_fal:tgl_fal2,
						  username_fal:username_fal2,
						  verified:verified2,
						  total:total2,
						  letak_odp:letak_odp2,
						  password_fal:password_fal2, status_wo:status_wo2,lain_lain:lain_lain2,
						 }; 

                

				 $.ajax({
						type: "POST",
						async: false,
						url: "../controller/action_edit_pendaftaran.php",
						data: value,
						success : function(data){
									$.ajax({
									type: "POST",
									async: false,
									url: "../controller/action_editadmin_kptn.php",
									data: value,
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
						}
					});
			 
			});
			
			



            $(document).on('click', '.deletepengguna', function(){

                var key_fal = $(this).attr("key_fal");
				
				//alert (username_fal); return;

                if(confirm('Hapus id '+key_fal+'?'))

                {

                    $.ajax({

                        url:"../controller/delete_pendaftaran.php",

                        method:"POST",

                        data:{key_fal:key_fal},

                        success:function(data){
							alert(data);
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
$('#OLT').change(function(){ 
 var a = $('#OLT').val();
//alert (a);
    $.ajax({
        url: "../create/create_kode_user.php",
        data: { "value": $("#OLT").val() },
        //dataType:"html",
        type: "post",
        success: function(data){
			//alert(data);
           $('#username_fal').val(data);
        }
    });
});
</script>

</body>

</html>
</html>
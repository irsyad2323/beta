 	<?php

session_start();



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
	
	<style>
		#sig-canvas {
		  border: 2px dotted #CCCCCC;
		  border-radius: 15px;
		  cursor: crosshair;
		}
		</style>



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

	<?php include '../sidebar_tes.php'; ?>
	
	

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

                        <h1 class="h3 mb-0 text-gray-800">Coverage <?php //echo $_SESSION["username"]; ?> <?php //echo $_SESSION["level_kantor"]; ?></h1>

                        <?php 

                            if ( $_SESSION["level_user"] != "Admin" && $_SESSION["level_user"] != "ikr" ){ 

                        ?>

                        <div>                          



                            <a href="../controller/export.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">

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
                                    <a href="../index.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">HOME</span>
                                    </a>


                    <?php } ?>

                    </div>

                        <div class="row">

                    <!-- Content Row -->

                    <?php 

                        if ($_SESSION["level_user"] != "ts"){

                       ?>
					   
					   
					 <div class="container-fluid">

             
                    <div class="row">
					
						<div class="col-lg-6">
             <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data Kabupaten</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna_dedicated" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>ID</th>
									<th>NAMA KAB/KOTA</th>
									<th>KD KAB/KOTA</th>
									<th>STATUS</th>
									<th>ACTION</th>									
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>ID</th>
									<th>NAMA KAB/KOTA</th>
									<th>KD KAB/KOTA</th>
									<th>STATUS</th>
									<th>ACTION</th>	
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT a.*, b.* FROM tb_kabkota b
															LEFT JOIN tb_provinsi a
															on a.kd_provinsi = b.kd_provinsi ORDER BY b.`status` ASC ;");
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  $no=1;
						  if($row['status'] == 'y'){
							$row['type_status'] = '<small class="badge badge-success">AKTIV</small>';
						}elseif($row['status'] == 'n'){
							$row['type_status'] = '<small class="badge badge-danger">NON AKTIV</small>';
						}else{
							$row['type_status'] = $row['status'];
						}
						  
						  ?>
						  <tr id=<?php echo $row['id']; ?>">							
							<td> <?php echo $row['id'];?></td>
							<td> <?php echo $row['nama_kabkota'];?></td>
							<td> <?php echo $row['nama_provinsi'];?></td>
							<td> <?php echo $row['type_status'];?></td>							
							<!-- td data-target="password_fal"> <?php echo $row['password_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td data-target="jenis_wo"> <?php echo $row['jenis_wo'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
							<td data-target="perlakuan"> <?php echo $row['perlakuan'];?></td>
							<td data-target="total_diskon"> <?php echo $row['total_diskon'];?></td>
							<td data-target="keterangan_angsuran"> <?php echo $row['keterangan_angsuran'];?></td>
							<td data-target="status_wo"> <?php echo $row['status_wo'];?></td -->
							<td> <div class="btn-group">	 
							<button type="button" name="edit" data-id="<?php echo $row['id'];?>"
							id="<?php echo $row['id'];?>"							
							status="<?php echo $row['status'];?>"
							class="btn btn-info btn-sm mr-2 editkab">Edit</button>
							
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
			
			<div class="col-lg-6">
              <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data Kecamatan</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna_broadband" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>ID</th>
									<th>NAMA KEC</th>
									<th>KD KEC</th>
									<th>STATUS</th>
									<th>ACTION</th>									
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>ID</th>
									<th>NAMA KEC</th>
									<th>KD KEC</th>
									<th>STATUS</th>
									<th>ACTION</th>	
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('../controller/controller_daf.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT d.*, b.* FROM tb_kecamatan b
															LEFT JOIN tb_kabkota d
															on d.kd_kabkota = b.kd_kabkota ORDER BY b.`status` ASC");
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  $no=1;
						  if($row['status'] == 'y'){
							$row['type_status'] = '<small class="badge badge-success">AKTIV</small>';
						}elseif($row['status'] == 'n'){
							$row['type_status'] = '<small class="badge badge-danger">NON AKTIV</small>';
						}else{
							$row['type_status'] = $row['status'];
						}
						  
						  ?>
						  <tr id=<?php echo $row['id']; ?>">							
							<td> <?php echo $row['id'];?></td>
							<td> <?php echo $row['nama_kec'];?></td>
							<td> <?php echo $row['nama_kabkota'];?></td>
							<td> <?php echo $row['type_status'];?></td>							
							<!-- td data-target="password_fal"> <?php echo $row['password_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td data-target="jenis_wo"> <?php echo $row['jenis_wo'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
							<td data-target="perlakuan"> <?php echo $row['perlakuan'];?></td>
							<td data-target="total_diskon"> <?php echo $row['total_diskon'];?></td>
							<td data-target="keterangan_angsuran"> <?php echo $row['keterangan_angsuran'];?></td>
							<td data-target="status_wo"> <?php echo $row['status_wo'];?></td -->
							<td> <div class="btn-group">	 
							<button type="button" name="edit" data-id="<?php echo $row['id'];?>"
							id="<?php echo $row['id'];?>"							
							nama_kabkota="<?php echo $row['nama_kabkota'];?>"
							class="btn btn-info btn-sm mr-2 editkec">Edit</button>
							
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
			
			
			<div class="col-lg-8">
              	 <!-- DataTales Example -->
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data Kelurahan</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna_sinden" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>ID</th>
									<th>NAMA KEL</th>
									<th>NAMA KAB/KOTA</th>
									<th>NAMA KEC</th>
									<th>STATUS</th>
									<th>CABANG</th>
									<th>ACTION</th>									
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>ID</th>
									<th>NAMA KEL</th>
									<th>NAMA KAB/KOTA</th>
									<th>NAMA KEC</th>
									<th>STATUS</th>
									<th>CABANG</th>
									<th>ACTION</th>	
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('../controller/controller_daf.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT b.*, a.nama_kec, d.nama_kabkota FROM tb_kelurahan b
					LEFT JOIN tb_kecamatan a
					on a.kd_kec = b.kd_kec
					LEFT JOIN tb_kabkota d
					on d.kd_kabkota = b.kd_kabkota WHERE b.kd_kec = a.kd_kec and a.kd_kabkota = d.kd_kabkota ORDER BY b.`status` ASC;");
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  $no=1;
						  if($row['status'] == 'y'){
							$row['type_status'] = '<small class="badge badge-success">AKTIV</small>';
						}elseif($row['status'] == 'n'){
							$row['type_status'] = '<small class="badge badge-danger">NON AKTIV</small>';
						}else{
							$row['type_status'] = $row['status'];
						}
						
						
						if($row['kd_layanan'] == 'mlg'){
							$row['cabang'] = '<small class="badge badge-success">NARATEL</small>';
						}elseif($row['kd_layanan'] == 'pas'){
							$row['cabang'] = '<small class="badge badge-success">SBM</small>';
						}elseif($row['kd_layanan'] == 'pas1'){
							$row['cabang'] = '<small class="badge badge-success">SBM</small>';
						}elseif($row['kd_layanan'] == 'batu'){
							$row['cabang'] = '<small class="badge badge-success">BATU</small>';
						}elseif($row['kd_layanan'] == 'mlg1'){
							$row['cabang'] = '<small class="badge badge-success">JALANTRA</small>';
						}else{
							$row['cabang'] = $row['kd_layanan'];
						}
						  
						  ?>
						  <tr id=<?php echo $row['id']; ?>">							
							<td> <?php echo $row['id'];?></td>
							<td> <?php echo $row['nama_kel'];?></td>
							<td> <?php echo $row['nama_kabkota'];?></td>
							<td> <?php echo $row['nama_kec'];?></td>
							<td> <?php echo $row['type_status'];?></td>							
							<td> <?php echo $row['cabang'];?></td>							
							<!-- td data-target="password_fal"> <?php echo $row['password_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td data-target="jenis_wo"> <?php echo $row['jenis_wo'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
							<td data-target="perlakuan"> <?php echo $row['perlakuan'];?></td>
							<td data-target="total_diskon"> <?php echo $row['total_diskon'];?></td>
							<td data-target="keterangan_angsuran"> <?php echo $row['keterangan_angsuran'];?></td>
							<td data-target="status_wo"> <?php echo $row['status_wo'];?></td -->
							<td> <div class="btn-group">	 
							<button type="button" name="edit" data-id="<?php echo $row['id'];?>"
							id="<?php echo $row['id'];?>"							
							nama_kabkota="<?php echo $row['nama_kabkota'];?>"
							kd_layanan="<?php echo $row['kd_layanan'];?>"
							class="btn btn-info btn-sm mr-2 editkel">Edit</button>
							
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
			
					
			
			</div>
			</div>
						
					  						


                        <?php    

                        }

                    ?>




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
                    
						
					<!-- ISIAN DATA TEKNISI -->
					
					<?php 
                        if ($_SESSION["level_user"] != "ts" && $_SESSION["level_user"] != "admin" && $_SESSION["level_user"] != "kapten"){
                       ?>
					<form role="form" method="post" id="formdatapengguna">
						 <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="fname">Nama</label>
                                <input class="form-control" type="text" id="nama_fal" name="nama_fal" placeholder="nama..." disabled>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="rang">ID User</label>
                            <input class="form-control" type="text" id="username_fal" name="username_fal" placeholder="id..." autocomplete="off"  disabled>
                        </div>                          

                    </div>
					
					<div class="form-row">
					
					<div class="form-group col-md-4">
                            <label for="lname">Perlakuan Khusus</label>
                            <input class="form-control" type="text" id="perlakuan" name="perlakuan" autocomplete="off" disabled>
                        </div>

					<div class="form-group col-md-2">
                            <label for="lname">Total Diskon</label>
                            <input class="form-control" type="text" id="total_diskon" name="total_diskon" autocomplete="off" disabled>
                        </div> 
						
					<div class="form-group col-md-2">
                            <label for="lname">Keterangan Angsuran</label>
                            <input class="form-control" type="text" id="keterangan_angsuran" name="keterangan_angsuran" autocomplete="off" disabled>
                        </div> 
					
					</div>

                    </br>
                    <h4>Isian Data Teknisi</h4>
                    </br>
                   
                    <div class="form-row" >
                        <div class="form-group col-md-2">
                    <label for="rang">Teknisi 1</label>                
                    <select class="form-control" type="text" id="status" name="status" autocomplete="off" required>
                    <option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option> 
					<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option>  
                    </select>
                  </div>

                         <div class="form-group col-md-2">
                    <label for="rang">Teknisi 2</label>                
                    <select class="form-control" type="text" id="status2" name="status2" autocomplete="off">
                    <option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option> 
					<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option>                                               
                    </select>
                  </div>                         
                        
                    <div class="form-row>
						  <label for="odp">Letak ODP</label> <br/>
						<select class="js-example-basic-multiple" id="letak_odp" name="letak_odp" multiple="multiple" style='width: 350px;' required>
						  <option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_odp where kd_layanan='".$kota."'");
											  
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												//echo '<option value"'.$data_user['nama_odp'].'">'.$data_user['nama_odp'].' </option>';
												echo '<option value="'.$data_user['id_odp'].'">'.$data_user['nama_odp'].'</option>';
											  } 
											?>   </option> 
						</select>
					</div>
                                             
                        <div class="form-group col-md-4">
                    <label for="rang">Modem</label>                
                    <select class="form-control" type="text" id="modem" name="modem" autocomplete="off" required>
                    <option>-</option>
                    <option>XPON</option>
                    <option>ZTE F609 versi 1</option>
                    <option>ZTE F609 versi 2</option>
                    <option>ZTE F609 versi 3</option>
                    <option>ZTE F663</option>
                    <option>HUAWEI H5</option>
                    <option>HUAWEI H5H</option>                                                                                                      
                    </select>
                  </div>
				 
                        <div class="form-group col-md-2">
                    <label for="rang">Panjang Kabel 1</label>                
                    <select class="form-control" type="text" id="kabel1" name="kabel1" autocomplete="off" required>
                    <option>-</option>
                    <option>80 M</option>
                    <option>100 M</option>
                    <option>150 M</option>                    
                    </select>
                  </div>
                        <div class="form-group col-md-2">
                    <label for="rang">Panjang Kabel 2</label>                
                    <select class="form-control" type="text" id="kabel2" name="kabel2" autocomplete="off">
                    <option>-</option>
                    <option>80 M</option>
                    <option>100 M</option>
                    <option>150 M</option>                    
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="rang">Panjang Kabel 3</label>                
                    <select class="form-control" type="text" id="kabel3" name="kabel3" autocomplete="off">
                    <option>-</option>
                    <option>80 M</option>
                    <option>100 M</option>
                    <option>150 M</option>                    
                    </select>
                  </div> 
				
				 <div class="form-group col-md-4">
                    <label for="rang">Jenis Pembayaran</label>                
                    <select class="form-control" type="text" id="pembayaran" name="pembayaran" autocomplete="off" required>
                    <option>-</option>
                    <option>Tunai</option>
                    <option>Transfer</option>				
                    </select>
                  </div>
				  
				<div class="form-group col-md-6">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
                        </div>
				
              </div>
			  <div class=form-row">
			  </br>
                    <h4>Harap isi Lokasi di bawah ini</h4>
                    </br>
			  <div class="form-group col-md-6" >
                            <button class="btn btn-danger pull-right" type="button" onclick="showPosition();">Show Position</button>
                                <span type="text" id="get_sinden" name="get_sinden" value="">
                                  
                        </div>	
                        <div class="form-group col-md-6" >
							<label for="rang">Tekan Tombool Show Position</label>  
                            <input class="form-control" type="text" id="lokasi_kapten" name="lokasi_kapten" autocomplete="off" required>   
                        </div>
				</div>
			  
			 
			  
                <div class="form-row">
               <div class="form-group col-md-6">
                    <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_wo" name="status_wo" autocomplete="off">
                    <option>Belum Terpasang</option>
                    <option>Sudah Terpasang</option>              
                                                                                     
                    </select>
                  </div>                     
                           
                        
                        </div>

                         			
						<hr>
                            <button type="button" class="btn btn-success  pull-right savekapten">Update</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>

						<?php
						}
					?>
					
					<!-- END ISIAN DATA TEKNISI -->
					
		
                      </div>
					  					  
            </div>

        </div>

    </div>
	
	<!-- form selain kapten -->
	
	 <div class="modal fade" id="modalupdatekab"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">


                 <div class="modal-body">
                    <form role="form" method="post" id="form_edit_sinden">
					
                   
                    <div class="form-row">
					<div class="form-group col-md-2">
                            <label for="rang">ID</label>
                            <input class="form-control" type="text" id="id" name="id" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-4">
                    <label for="rang">STATUS</label>                
                    <select class="form-control" type="text" id="status" name="status" autocomplete="off" required>
                    <option value='y'>Aktiv</option>
                    <option value='n'>Non Aktiv</option>                                                                                                                         
                    </select>
                  </div>
                        </div>
				
						<hr>
                            <button type="button" class="btn btn-success  pull-right savekab">Update</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>
			
					<!-- END ISIAN DATA ADMIN -->
						
		
                      </div>
					  					  
            </div>

        </div>

    </div>
	
	<!-- form selain kapten -->
	
	 <div class="modal fade" id="modalupdatekec"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">


                 <div class="modal-body">
                    <form role="form" method="post" id="form_edit_sinden">
					
                   
                    <div class="form-row">
					<div class="form-group col-md-2">
                            <label for="rang">ID</label>
                            <input class="form-control" type="text" id="id2" name="id2" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-4">
                    <label for="rang">STATUS</label>                
                    <select class="form-control" type="text" id="status2" name="status2" autocomplete="off" required>
                    <option value='y'>Aktiv</option>
                    <option value='n'>Non Aktiv</option>                                                                                                                         
                    </select>
                  </div>
                        </div>
				
						<hr>
                            <button type="button" class="btn btn-success  pull-right savekec">Update</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>
			
					<!-- END ISIAN DATA ADMIN -->
						
		
                      </div>
					  					  
            </div>

        </div>

    </div>
	
	<!-- form selain kapten -->
	
	 <div class="modal fade" id="modalupdatekel"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">


                 <div class="modal-body">
                    <form role="form" method="post" id="form_edit_sinden">
					
                   
                    <div class="form-row">
					<div class="form-group col-md-2">
                            <label for="rang">ID</label>
                            <input class="form-control" type="text" id="id3" name="id3" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-4">
                    <label for="rang">STATUS</label>                
                    <select class="form-control" type="text" id="status3" name="status3" autocomplete="off" required>
                    <option value='y'>Aktiv</option>
                    <option value='n'>Non Aktiv</option>                                                                                                                         
                    </select>
                  </div>
				  
				  <div class="form-group col-md-4">
                    <label for="rang">CABANG</label>                
                    <select class="form-control" type="text" id="cabang3" name="cabang3" autocomplete="off" required>
                    <option value='mlg'>Naratel</option>
                    <option value='pas1'>SBM</option>                                                                                                                         
                    <option value='batu'>Jalibar</option>                                                                                                                         
                    <option value='mlg1'>Jalantra</option>                                                                                                                         
                    </select>
                  </div>
                        </div>
				
						<hr>
                            <button type="button" class="btn btn-success  pull-right savekel">Update</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>
			
					<!-- END ISIAN DATA ADMIN -->
						
		
                      </div>
					  					  
            </div>

        </div>

    </div>
	
	<!-- form coporate -->
	
	 <div class="modal fade" id="modalupdatecorporate"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">


                 <div class="modal-body">
                    <form role="form" method="post" id="form_edit_corporate">
					
                   
                    <div class="form-row">
					<div class="form-group col-md-2">
                            <label for="rang">ID User</label>
                            <input class="form-control" type="text" id="username_corporate2" name="username_corporate2" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-2">
                            <label for="rang">Nama User</label>
                            <input class="form-control" type="text" id="nama_corporate2" name="nama_corporate2" autocomplete="off"  disabled>
                        </div>
					
					<div class="form-group col-md-2">
                    <label for="rang">Teknisi 1</label>                
                    <select class="form-control" type="text" id="status_corp" name="status_corp" autocomplete="off" required>
                    <option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option> 
					<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option>  
                    </select>
                  </div>

                         <div class="form-group col-md-2">
                    <label for="rang">Teknisi 2</label>                
                    <select class="form-control" type="text" id="status_corp2" name="status_corp2" autocomplete="off">
                    <option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option> 
					<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option>                                               
                    </select>
                  </div>       

                  <!-- div class="form-group col-md-2">
                    <label for="rang">Kategori Maintenance</label>                
                    <select class="form-control" type="text" id="kategori_maintenance" name="kategori_maintenance" autocomplete="off" required>
                    <option>-</option>
                    <option>Splicing</option>
                    <option>Ganti Modem</option>
                    <option>Setting Modem</option>
                    <option>Tarik Kabel</option> 
                    <option>Maintenance ODP</option>                    
                    </select>
                  </div -->   
				

									
					<!-- div class="form-group col-md-2">
					 <label for="rang">Kategori MAINTENANCE</label>
						<select class='form-control' id="kategori_maintenance" name="kategori_maintenance">							
							<option value="Splicing">Splicing</option>
							<option value="Banding Kabel">Banding Kabel</option>
							<option value="Ganti Modem">Ganti Modem</option>
							<option value="Setting Modem">Setting Modem</option>
							<option value="Tarik Kabel">Tarik Kabel</option>
							<option value="Maintenance ODP">Maintenance ODP</option>
						</select>
					</div -->
					
					<div class="form-group col-md-4">
                    <label for="rang">Modem</label>                
                    <select class="form-control" type="text" id="modem_corporate" name="modem_corporate" autocomplete="off" required>
                    <option>-</option>
                    <option>ZTE F609 versi 1</option>
                    <option>ZTE F609 versi 2</option>
                    <option>ZTE F609 versi 3</option>
                    <option>ZTE F663</option>
                    <option>HUAWEI H5</option>
                    <option>HUAWEI H5H</option>                                                                                                      
                    </select>
                  </div>
				  
				  <div class="form-group col-md-2">
					 <label for="lname">Jumlah Modem</label>
                     <select class="form-control" type="text" id="total_modem" name="total_modem" autocomplete="off" required>
                    <option></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>                                                                                                      
                    </select>
                  </div>
				  
				  <div class="form-group col-md-4">
                    <label for="rang">Jenis Pembayaran</label>                
                    <select class="form-control" type="text" id="pembayaran_corporate" name="pembayaran_corporate" autocomplete="off" required>
                    <option>-</option>
                    <option>Tunai</option>
                    <option>Transfer</option>				
                    </select>
                  </div>
				 
                        <div class="form-group col-md-2">
                    <label for="lname">Panjang Kabel</label>
                    <input class="form-control" type="number" id="kabel_corporate" name="kabel_corporate" placeholder='Meter' autocomplete="off" required>                    
						</div>
							
						<!--div class="form-group col-md-4">
							<label for="rang">Pilih Modem</label> 
                        <select class="form-control" type="text" id="modem" name="modem" autocomplete="off" style="display: none">
                    <option>-</option>
                    <option>ZTE F609 versi 1</option>
                    <option>ZTE F609 versi 2</option>
                    <option>ZTE F609 versi 3</option>
                    <option>ZTE F663</option>
                    <option>HUAWEI H5</option>
                    <option>HUAWEI H5H</option>                                                                                                      
                    </select>
					
						<select class="form-control" type="text" id="kabel1" name="kabel1" autocomplete="off" style="display: none">
                    <option>-</option>
                    <option>80 M</option>
                    <option>100 M</option>
                    <option>150 M</option>                    
                    </select>
                        </div-->            
          </div>
		  
                  
                <div class="form-row">
					</br>
                    <h4>Harap isi Lokasi di bawah ini</h4>
                    </br>
			  <div class="form-group col-md-6" >
                            <button class="btn btn-danger pull-right" type="button" onclick="showPosition();">Show Position</button>
                                <span type="text" id="get_lokasi" name="get_lokasi" value="">
                                  
                        </div>	
                        <div class="form-group col-md-6" >
							<label for="rang">Tekan Tombool Show Position</label>  
                            <input class="form-control" type="text" id="get_corporate" name="get_corporate" autocomplete="off" required>   
                        </div>
				</div>
			  
			 
			  
                <div class="form-row">
               <div class="form-group col-md-6">
                    <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_corporate" name="status_corporate" autocomplete="off">
                    <option>Belum Terpasang</option>
                    <option>Sudah Terpasang</option>              
                                                                                     
                    </select>
                  </div>                     
                           
                        <hr>
                        </div>
                            <button type="button" class="btn btn-success  pull-right save_corporate">Update</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>
			
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


    <!-- Page level custom scripts -->

    <script src="../asset/js/demo/chart-area-demo.js"></script>

    <script src="../asset/js/demo/chart-pie-demo.js"></script>

    <script src="../asset/vendor/datatables/jquery.dataTables.min.js"></script>

    <script src="../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="../js/bs-custom-file-input.js"></script>
	
	<script src="../js/sweetalert2.all.min.js"></script>

    <!-- datepicker bootstrap -->



    <script src="../asset/js/bootstrap-datepicker.min.js"></script>

    <script src="../asset/locales/bootstrap-datepicker.id.min.js"></script>
	<script> 
	(function() {
  window.requestAnimFrame = (function(callback) {
    return window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      window.oRequestAnimationFrame ||
      window.msRequestAnimaitonFrame ||
      function(callback) {
        window.setTimeout(callback, 1000 / 60);
      };
  })();

  var canvas = document.getElementById("sig-canvas");
  var ctx = canvas.getContext("2d");
  ctx.strokeStyle = "#222222";
  ctx.lineWidth = 4;

  var drawing = false;
  var mousePos = {
    x: 0,
    y: 0
  };
  var lastPos = mousePos;

  canvas.addEventListener("mousedown", function(e) {
    drawing = true;
    lastPos = getMousePos(canvas, e);
  }, false);

  canvas.addEventListener("mouseup", function(e) {
    drawing = false;
  }, false);

  canvas.addEventListener("mousemove", function(e) {
    mousePos = getMousePos(canvas, e);
  }, false);

  // Add touch event support for mobile
  canvas.addEventListener("touchstart", function(e) {

  }, false);

  canvas.addEventListener("touchmove", function(e) {
    var touch = e.touches[0];
    var me = new MouseEvent("mousemove", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchstart", function(e) {
    mousePos = getTouchPos(canvas, e);
    var touch = e.touches[0];
    var me = new MouseEvent("mousedown", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchend", function(e) {
    var me = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(me);
  }, false);

  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top
    }
  }

  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: touchEvent.touches[0].clientX - rect.left,
      y: touchEvent.touches[0].clientY - rect.top
    }
  }

  function renderCanvas() {
    if (drawing) {
      ctx.moveTo(lastPos.x, lastPos.y);
      ctx.lineTo(mousePos.x, mousePos.y);
      ctx.stroke();
      lastPos = mousePos;
    }
  }

  // Prevent scrolling when touching the canvas
  document.body.addEventListener("touchstart", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchend", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchmove", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);

  (function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();

  function clearCanvas() {
    canvas.width = canvas.width;
  }

  // Set up the UI
  var sigText = document.getElementById("sig-dataUrl");
  var sigImage = document.getElementById("sig-image");
  var clearBtn = document.getElementById("sig-clearBtn");
  var submitBtn = document.getElementById("sig-submitBtn");
  clearBtn.addEventListener("click", function(e) {
    clearCanvas();
    sigText.innerHTML = "Data URL for your signature will go here!";
    sigImage.setAttribute("src", "");
  }, false);
  submitBtn.addEventListener("click", function(e) {
    var dataUrl = canvas.toDataURL();
    sigText.innerHTML = dataUrl;
    sigImage.setAttribute("src", dataUrl);
  }, false);

})();
	</script>
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
			
			var table = $('#tabel_pengguna_solved').DataTable({

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
			
			var table = $('#tabel_pengguna_pararel').DataTable({

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
			
			var table = $('#tabel_pengguna_sinden').DataTable({

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
			
			var table = $('#tabel_pengguna_omahwifi').DataTable({

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
			
			var table = $('#tabel_pengguna_dedicated').DataTable({

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
			
			var table = $('#tabel_pengguna_broadband').DataTable({

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

            var modem = $("#modem").val();

            var kabel1 = $("#kabel1").val();

            var kabel2 = $("#kabel2").val();

            var kabel3 = $("#kabel3").val();

            var paket_fal = $("#paket_fal").val();

            var tgl_fal = $("#tgl_fal").val();            

            var username_fal = $("#username_fal").val();
			
			var kategori_maintenance = $("#kategori_maintenance").val();

            var password_fal = $("#password_fal").val();

            var lain_lain = $("#lain_lain").val();

            var status_wo = $("#status_wo").val();

            var ket_user = $("#lain_lain").val();
			
			var pembayaran = $("#pembayaran").val();

            var lokasi_kapten = $("#lokasi_kapten").val();
			
			var perlakuan = $("#perlakuan").val();
			
			var free = $("#free").val();
			
			var pindah_alamat = $("#pindah_alamat").val();
			
			var total_diskon = $("#total_diskon").val();
			
			var keterangan_angsuran = $("#keterangan_angsuran").val();
			
			var verified = $("#verified").val();
			
			var letak_odp = $("#letak_odp").val();
			
			var total = (free + total_diskon + pindah_alamat);
			
			//alert(lokasi_kapten); return;
			
			if(nama_fal == '' || username_fal == '' || password_fal == '' || alamat_fal == '' || rt == '' || rw == '' || kelurahan == '' || tlp_fal == null ){
				alert("DATA ANDA TIDAK LENGKAP"); 
				return
			}


            //alert(letak_odp); die();



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
						  kategori_maintenance:kategori_maintenance,
						  status2:status2, 
						  jenis_wo:jenis_wo,
						  produk:produk,
						  perlakuan:perlakuan,
						  total_diskon:total_diskon,
						  keterangan_angsuran:keterangan_angsuran,
						  modem:modem,
						  free:free,
						  pindah_alamat:pindah_alamat,
						  kabel1:kabel1,
						  kabel2:kabel2,
						  kabel3:kabel3,
						  pembayaran:pembayaran,
						  paket_fal:paket_fal,
						  tgl_fal:tgl_fal,
						  username_fal:username_fal,
						  verified:verified,
						  total:total,
						  letak_odp:letak_odp,
						  password_fal:password_fal, status_wo:status_wo,lain_lain:lain_lain, ket:lokasi_kapten }; 



                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_kapten.php",

                    data: value,

                    success: function(data) {	
						//alert(data);
                        $('#tabel_pengguna').DataTable().ajax.reload();
						

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

		/*  $(document).on('click', '.update', function(){

                $('#modalupdatesinden').modal('show');	

                $("#form_edit_sinden").trigger("reset");

                $("#username_fal").attr("disabled",false);


            }); */
			
		//get data value kapten
		$(document).on('click', '.printkapten', function(){
                //alert($(this).data('id'));				
				var username_fal = $(this).attr('username_fal');
				var nama_fal = $(this).attr('nama_fal');
				var tanggal_instalasi = $(this).attr('tanggal_instalasi');
				var paket_fal = $(this).attr('paket_fal');
				var total = $(this).attr('total');
				var total_diskon = $(this).attr('total_diskon');
				
				var value = { 
						   username_fal:username_fal,
						   nama_fal:nama_fal,
						   tanggal_instalasi:tanggal_instalasi,
						   paket_fal:paket_fal,
						   paket_fal:paket_fal,
						   total:total,
						   total_diskon:total_diskon,
						 }; 
			
				$.post({
					type: "POST",
					url: "print.php",
					data: value,
				}).done(function(data) {
					printWindow = window.open('');
					printWindow.document.write(data);
					printWindow.print();
				});
				
					
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (alamat_fal);
				
				/* $('#modaltambahdata').modal('show');
				$('#nama_fal').val(nama_fal);				
				$('#username_fal').val(username_fal);
				$('#perlakuan').val(perlakuan);
				$('#total_diskon').val(total_diskon);
				$('#keterangan_angsuran').val(keterangan_angsuran); */
				
            });
			
		//get data value sinden
		$(document).on('click', '.editkapten', function(){
                //alert($(this).data('id'));
				var id = $(this).attr('id');
				var username_fal = $(this).attr('username_fal');
				var nama_fal = $(this).attr('nama_fal');
				var perlakuan = $(this).attr('perlakuan');
				var total_diskon = $(this).attr('total_diskon');
				var keterangan_angsuran = $(this).attr('keterangan_angsuran');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (alamat_fal);
				
				$('#modaltambahdata').modal('show');
				$('#nama_fal').val(nama_fal);				
				$('#username_fal').val(username_fal);
				$('#perlakuan').val(perlakuan);
				$('#total_diskon').val(total_diskon);
				$('#keterangan_angsuran').val(keterangan_angsuran);
				
            });
		
		//get data value sinden
		$(document).on('click', '.editsinden', function(){
                //alert($(this).data('id'));
				var id = $(this).attr('id');
				var username_fal = $(this).attr('username_fal');
				var nama_fal = $(this).attr('nama_fal');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (alamat_fal);
				
				$('#modalupdatesinden').modal('show');
				$('#nama_sinden').val(nama_fal);				
				$('#username_sinden').val(username_fal);
				
            });
			
		//get data value sinden
		$(document).on('click', '.editomahwifi', function(){
                //alert($(this).data('id'));
				var id = $(this).attr('id');
				var username_fal = $(this).attr('username_fal');
				var nama_fal = $(this).attr('nama_fal');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (alamat_fal);
				
				$('#modalupdatesinden').modal('show');
				$('#nama_sinden').val(nama_fal);				
				$('#username_sinden').val(username_fal);
				
            });
			
		//get data value sinden
		$(document).on('click', '.editdedicated', function(){
                //alert($(this).data('id'));
				var id = $(this).attr('id');
				var username_fal = $(this).attr('username_fal');
				var nama_fal = $(this).attr('nama_fal');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (alamat_fal);
				
				$('#modalupdatesinden').modal('show');
				$('#nama_sinden').val(nama_fal);				
				$('#username_sinden').val(username_fal);
				
            });
			
			//get data value sinden
		$(document).on('click', '.editkab', function(){
                //alert($(this).data('id'));
				var id = $(this).attr('id');
				var nama_kabkota = $(this).attr('nama_kabkota');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (alamat_fal);
				
				$('#modalupdatekab').modal('show');
				$('#id').val(id);			
				
				
            });
			
			//get data value sinden
		$(document).on('click', '.editkec', function(){
                //alert($(this).data('id'));
				var id2 = $(this).attr('id');
				var nama_kec2 = $(this).attr('nama_kec');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (alamat_fal);
				
				$('#modalupdatekec').modal('show');
				$('#id2').val(id2);			
				
				
            });	
			
			//get data value sinden
		$(document).on('click', '.editkel', function(){
                //alert($(this).data('id'));
				var id3 = $(this).attr('id');
				var nama_kec3 = $(this).attr('nama_kec');
				var cabang3 = $(this).attr('kd_layanan');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (alamat_fal);
				
				$('#modalupdatekel').modal('show');
				$('#id3').val(id3);			
				$('#cabang3').val(cabang3);			
				
				
            });
			
		//get data value sinden
		$(document).on('click', '.editcorporate', function(){
                //alert($(this).data('id'));
				var id = $(this).attr('id');
				var username_fal2 = $(this).attr('username_fal2');
				var nama_fal2 = $(this).attr('nama_fal2');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				alert (nama_fal2);
				
				$('#modalupdatecorporate').modal('show');
				$('#nama_corporate2').val(nama_fal2);				
				$('#username_corporate2').val(username_fal2);
				
            });
			
			
			
			// create 			
		$(document).on('click', '.savekapten', function(){
			//var nama_fal = $("#nama_fal").val();
			 var nama_fal = $('#nama_fal').val();
			 var username_fal = $('#username_fal').val();
			 var status = $('#status').val();
			 var status2 = $('#status2').val();
			 var modem = $('#modem').val();
			 var kabel1 = $('#kabel1').val();
			 var kabel2 = $('#kabel2').val();
			 var kabel3 = $('#kabel3').val();
			 var letak_odp = $('#letak_odp').val();
			 var pembayaran = $('#pembayaran').val();
			 var lokasi_kapten = $('#lokasi_kapten').val();
			 var status_wo = $('#status_wo').val();
			 var lain_lain = $('#lain_lain').val();
			 
			if(modem == '-' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Modem Belum Terisi!',				  
				}) 
				return
			}
			
			if(kabel1 == '-' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kabel Belum Terisi!',
				  
				})  
				return
			}
			
			if(status == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'PIC Belum Terisi!',
				  
				})  
				return
			}
			
			if(letak_odp == ''){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Letak ODP Belum Terisi!',
				  
				}) 
				return
			}
			
			if(lokasi_kapten == ''){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Lokasi Belum Terisi!',
				  
				}) 
				return
			}
			 
			 
			 //alert(get_lokasi); return;
			 
			 var value = { nama_fal:nama_fal,
						   username_fal:username_fal,
						   status:status, 
						   status2:status2, 
						   modem:modem,
						   kabel1:kabel1,
						   kabel2:kabel2,
						   kabel3:kabel3,
						   letak_odp:letak_odp,
						   pembayaran:pembayaran,
						   lokasi_kapten:lokasi_kapten,
						   status_wo:status_wo,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_kapten_update.php",
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
			 
			});
		
			// create 			
		$(document).on('click', '.savekab', function(){			
			 var id = $('#id').val();
			 var status = $('#status').val();	 
				 
			 
			 //alert(status); return;
			 
			 var value = { id:id,
						   status:status,						   
						 };               
				
				$.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_update_kab.php",
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
			 
			});
			
			// create 			
		$(document).on('click', '.savekec', function(){			
			 var id2 = $('#id2').val();
			 var status2 = $('#status2').val();	 
				 
			 
			 //alert(status); return;
			 
			 var value = { id:id2,
						   status:status2,						   
						 };               
				
				$.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_update_kec.php",
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
			 
			});
			
			// create 			
		$(document).on('click', '.savekel', function(){			
			 var id3 = $('#id3').val();
			 var status3 = $('#status3').val();	 
			 var cabang3 = $('#cabang3').val();	 
				 
			 
			 //alert(status); return;
			 
			 var value = { id:id3,
						   status:status3,						   
						   cabang:cabang3,						   
						 };               
				
				$.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_update_kel.php",
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
			 
			});
			
			// create 			
		$(document).on('click', '.save_corporate', function(){
			//var nama_fal = $("#nama_fal").val();
			 var nama_corporate2 = $('#nama_corporate2').val();
			 var username_corporate2 = $('#username_corporate2').val();
			 var pic_corporate = $('#pic_corporate').val();
			 var pic_corporate2 = $('#pic_corporate2').val();
			 var modem_corporate = $('#modem_corporate').val();
			 var total_modem = $('#total_modem').val();
			 var pembayaran_corporate = $('#pembayaran_corporate').val();
			 var kabel_corporate = $('#kabel_corporate').val();
			 var get_corporate = $('#get_corporate').val();
			 var status_corporate = $('#status_corporate').val();
			 var status_corp = $('#status_corp').val();
			 var status_corp2 = $('#status_corp2').val();
			 
			if(modem_corporate == '-' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Modem Belum Terisi!',	
				}) 
				return
			}
			
			if(kabel_corporate == '-' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kabel Belum Terisi!',
				}) 
				return
			}
			
			if(status_corp == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'PIC Belum Terisi!',	
				}) 
				return
			}	
			
			if(status_corporate == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Status Belum Terisi!',	
				}) 
				return
			}			
					
			if(get_corporate == ''){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Lokasi Belum Terisi!',	
				}) 
				return
			}
			 
			 //alert(get_lokasi); return;
			 
			 var value = { nama_corporate:nama_corporate2,
						   username_corporate:username_corporate2,
						   pic_corporate:status_corp, 
						   pic_corporate2:status_corp2, 
						   modem_corporate:modem_corporate,
						   total_modem:total_modem,
						   pembayaran_corporate:pembayaran_corporate,
						   kabel_corporate:kabel_corporate,
						   get_corporate:get_corporate,
						   status_corporate:status_corporate,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_corporate_update.php",
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
			 
			});
			
		
		});

    </script>
	
	<script>

    // Set up global variable

    var result;

    

    function showPosition() {   

        // Store the element where the page displays the result

        result = document.getElementById("get_sinden");
        lokasi = document.getElementById("get_lokasi");
		lokasikapten = document.getElementById("lokasi_kapten");
		lokasi_corp = document.getElementById("get_corporate");
        

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
		lokasikapten.value = position.coords.latitude + "#" + position.coords.longitude;
		lokasi_corp.value = position.coords.latitude + "#" + position.coords.longitude;
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
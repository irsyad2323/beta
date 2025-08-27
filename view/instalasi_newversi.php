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

                        <h1 class="h3 mb-0 text-gray-800">Instalasi <?php echo $_SESSION["username"]; ?> <?php echo $_SESSION["level_kantor"]; ?></h1>

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

                        <?php 

                            if ( $_SESSION["level_user"] != "ikr" && $_SESSION["level_user"] != "Admin" ){ 

                        ?>

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <button class="btn btn-success add-data">TAMBAH +</button>

                    </div> <?php } ?>		

                   <div class="row">
						
					    <!-- Begin Page Content -->
						<div class="container-fluid">

						  <!-- Page Heading 
						  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
						  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
							-->
						  <!-- DataTales Example -->
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Hasil Proses Pekerjaan</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pros" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>ID</th>
									<th>Tanggal</th>
									<th>Nama</th>
									<th>Jenis WO</th>
									<th>Telpon</th>
									<th>Layanan</th>
									<th>Action</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>NO</th>
									<th>ID</th>
									<th>Tanggal</th>
									<th>Nama</th>
									<th>Jenis WO</th>
									<th>Telpon</th>
									<th>Layanan</th>
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
					<?php 
						include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						$table = mysqli_query($koneksi,"SELECT key_fal, tgl_fal_datetime, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, total, perlakuan, id_fdback
														FROM (
														SELECT a.key_fal , a.tgl_fal_datetime ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, ((a.hrg_ins + a.hrg_pkt) - a.total_diskon) as total, a.perlakuan, 0 as id_fdback FROM tbl_fal a 
														WHERE pic_ikr='".$acces_user_log."' and a.status_wo in ('Proses Pengerjaan')
														union all
														SELECT b.key_fal , b.tgl_date_time as tgl_fal_datetime ,b.username_Maintenance as username_fal ,b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, 0 as total, 0 as perlakuan, b.username_fal as id_fdback FROM tbl_maintenance b 
														WHERE pic_ikr='".$acces_user_log."' and b.status_wo in ('Proses Pengerjaan')
														union all
														SELECT c.key_fal , c.tgl_sign as tgl_fal_datetime ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 0 as tlp_fal, c.kd_layanan, 0 as total, 0 as perlakuan, 0 as id_fdback FROM tbl_maintenance_odp c 
														WHERE pic_ikr='".$acces_user_log."' and c.status_wo in ('Proses Pengerjaan')) AS combined_logs ORDER BY tgl_fal_datetime DESC");
						  while ($row = mysqli_fetch_assoc($table)){ 
						if ($row['jenis_wo'] == 'INSTALASI'){
								  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
							  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
						  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
							  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
						  }
							  
						if ($row['kd_layanan'] == 'mlg'){
							  $row['jenis_unit'] = '<small class="badge badge-warning">Naratel</small>';
						  }elseif ($row['kd_layanan'] == 'pas'){
							  $row['jenis_unit'] = '<small class="badge badge-danger">SBM</small>';
						  }elseif ($row['kd_layanan'] == 'batu'){
							  $row['jenis_unit'] = '<small class="badge badge-dark">Jalibar</small>';
						  }elseif ($row['kd_layanan'] == 'mlg1'){
							  $row['jenis_unit'] = '<small class="badge badge-primary">Jalantra</small>';
						  }
						  
						  $i=0;
						  $no=1;
						  ?>	
							<tr id=<?php echo $row['key_fal']; ?>">
								<td> <?php echo $no; ?></td>
								<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
								<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
								<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
								<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
								<td data-target="tlp_fal"> <?php echo $row['tlp_fal'];?></td>
								<td data-target="jenis_unit"> <?php echo $row['jenis_unit'];?></td>
							<td> 
							<div class="btn-group">	 
								<button type="button" name="edit" data-id="<?php echo $row['username_fal'];?>"
								key_fal="<?php echo $row['key_fal'];?>"							
								username_fal="<?php echo $row['username_fal'];?>"							
								username_Maintenance="<?php echo $row['username_Maintenance'];?>"							
								nama_fal="<?php echo $row['nama_fal'];?>"
								tlp_fal="<?php echo $row['tlp_fal'];?>"
								jenis_wo="<?php echo $row['jenis_wo'];?>"
								perlakuan="<?php echo $row['perlakuan'];?>"
								total="<?php echo $row['total'];?>"
								kd_layanan="<?php echo $row['kd_layanan'];?>"
								id_fdback="<?php echo $row['id_fdback'];?>"
								lain_lain="<?php echo $row['lain_lain'];?>"
								tgl_fal_datetime="<?php echo $row['tgl_fal_datetime'];?>"
								class="btn btn-warning btn-sm mr-2 editkapten">Hasil</button>
							</div></td>
							  </tr>
							  <?php	
						  }
						  ?>	
								
							</div></td>
							  </tr>
								</tbody>
								</table>
							  </div>
							</div>
						  </div>

						</div>


                        <!-- Begin Page Content -->
						<div class="container-fluid">

						  <!-- Page Heading 
						  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
						  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
							-->
						  <!-- DataTales Example -->
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data Instalasi Kapten Sudah Terpasang</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna_solved" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Paket</th>
									<th>Tanggal Instalasi</th>
									<th>ID-USER</th>                      
									<th>Teknisi</th>
									<th>Status WO</th>
									<th>ACTION</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>NO</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Paket</th>
									<th>Tanggal Instalasi</th>
									<th>ID-USER</th>                      
									<th>Teknisi</th>
									<th>Status WO</th>
									<th>ACTION</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
											  include('../controller/controller_mysqli.php');
											$acces_user_log = $_SESSION["username"];
											  $table = mysqli_query($koneksi,"SELECT (b.harga - a.total_diskon) as total,a.*,b.harga, CONCAT(angsuran1,'   ',verif1) angsuran_fix1, CONCAT(angsuran2,'   ',verif2) angsuran_fix2
					FROM tbl_fal a
					INNER JOIN price_harga b
							ON a.paket_fal = b.paket
					WHERE status_wo='Sudah Terpasang' and produk='Kapten Naratel' and pic_ikr='".$acces_user_log."' and jenis_wo='INSTALASI' and tanggal_instalasi = CURDATE() and verified='not_verified'
					ORDER BY key_fal DESC");
											  while ($row = mysqli_fetch_assoc($table)){ 
											  $i=0;
											  $no=1;
											  ?>
											  <tr id=<?php echo $row['username_fal']; ?>">
												<td> <?php echo $no; ?></td>
												<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
												<td data-target="alamat_fal"> <?php echo $row['alamat_fal'];?></td>
												<td data-target="paket_fal"> <?php echo $row['paket_fal'];?></td>
												<td data-target="tanggal_instalasi"> <?php echo $row['tanggal_instalasi'];?></td>
												<td data-target="username_fal"> <?php echo $row['username_fal'];?></td>							
												<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>							
												<td data-target="status_wo"> <?php echo $row['status_wo'];?></td>
												<td> <div class="btn-group"> 
												
												<button type="button" name="edit" data-id="<?php echo $row['username_fal'];?>"
												nama_fal="<?php echo $row['nama_fal'];?>"							
												username_fal="<?php echo $row['username_fal'];?>"
												tanggal_instalasi="<?php echo $row['tanggal_instalasi'];?>"
												total="<?php echo $row['total'];?>"
												paket_fal="<?php echo $row['paket_fal'];?>"
												total_diskon="<?php echo $row['total_diskon'];?>"
												class="btn btn-info btn-sm mr-2 printkapten">Print</button>
												
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
						
						<!-- Begin Page Content -->
						<div class="container-fluid">

						  <!-- Page Heading 
						  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
						  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
							-->
						  <!-- DataTales Example -->
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data Instalasi Pararel Modem</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna_pararel" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>NO Telepon</th>
									<th>Paket</th>
									<th>Tanggal Instalasi</th>
									<th>ID-USER</th>                        
									<th>Action</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>NO</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>NO Telepon</th>
									<th>Paket</th>
									<th>Tanggal Instalasi</th>
									<th>ID-USER</th>                        
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT * FROM tbl_fal_correctiv 
WHERE status_wo='Belum Terpasang' and jenis_wo='INSTALASI_CORRECTIV' and pic_ikr='".$acces_user_log."' 
ORDER BY key_fal DESC");
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  $no=1;
						  ?>
						  <tr id=<?php echo $row['username_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
							<td data-target="alamat_fal"> <?php echo $row['alamat_fal'];?></td>
							<td data-target="tlp_fal"> <?php echo $row['tlp_fal'];?></td>
							<td data-target="paket_fal"> <?php echo $row['paket_fal'];?></td>
							<td data-target="tanggal_instalasi"> <?php echo $row['tanggal_instalasi'];?></td>
							<td data-target="username_fal"> <?php echo $row['username_fal'];?></td>
							<!-- td data-target="password_fal"> <?php echo $row['password_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td data-target="jenis_wo"> <?php echo $row['jenis_wo'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
							<td data-target="perlakuan"> <?php echo $row['perlakuan'];?></td>
							<td data-target="total_diskon"> <?php echo $row['total_diskon'];?></td>
							<td data-target="keterangan_angsuran"> <?php echo $row['keterangan_angsuran'];?></td>
							<td data-target="status_wo"> <?php echo $row['status_wo'];?></td -->
							<td> <div class="btn-group">	 
							<button type="button" name="edit" data-id="<?php echo $row['username_fal'];?>"
							nama_fal2="<?php echo $row['nama_fal'];?>"							
							username_fal2="<?php echo $row['username_fal'];?>"
							class="btn btn-info btn-sm mr-2 editcorporate">Edit</button>
							
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

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
					<form role="form" method="post" id="formdatapengguna">
						
					<div class="form-group">
							<label for="fname">Nama</label>
							<input class="form-control" type="text" id="nama_fal" name="nama_fal" placeholder="nama..." disabled>
					</div>
						
					<div class="form-group">
						<label for="rang">ID User</label>
						<input class="form-control" type="text" id="username_fal" name="username_fal" placeholder="id..." autocomplete="off"  disabled>
					</div>          
					
					<div class="form-group">
                            <label for="lname">Perlakuan Khusus</label>
                            <input class="form-control" type="text" id="perlakuan" name="perlakuan" autocomplete="off" disabled>
                        </div>

					<div class="form-group">
                            <label for="lname">Total Bayar</label>
                            <input class="form-control" type="text" id="total" name="total" autocomplete="off" disabled>
                        </div>
					

                    </br>
                    <h4>Isian Data Teknisi</h4>
                    </br>
				  
				<div class="form-group">
                   <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_wo" name="status_wo" autocomplete="off">
                    <option></option>
                    <option value="Pending">Pending</option>
                    <option value="Rescedule">Rescedule</option>
                    <option value="Batal Pasang">Batal Pasang</option>
                    <option value="Masalah Perijinan">Masalah Perijinan</option>
                    <option value="Sudah Terpasang" >Sudah Terpasang</option>                                                                              
                    </select>
                   </div>
				   
				   <div id="resceduleid">
				   <div class="form-group">
							<label for="fname">Tanggal Rescedule</label>
							<input class="form-control" type="datetime-local" id="tanggalsign" name="tanggalsign" placeholder="nama...">
					</div>
				   </div>
				   
                   <div id="solved">
                        <div class="form-group">
                    <label for="rang" >Teknisi 1</label>                
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

					<div class="form-group">
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
                        
                    <div class="form-group>
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
                                             
                    <div class="form-group">
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
				 
                        <div class="form-group">
                    <label for="rang">Panjang Kabel 1</label>                
                    <select class="form-control" type="text" id="kabel1" name="kabel1" autocomplete="off" required>
                    <option>-</option>
                    <option>80 M</option>
                    <option>100 M</option>
                    <option>150 M</option>                    
                    </select>
                  </div>
                        <div class="form-group">
                    <label for="rang">Panjang Kabel 2</label>                
                    <select class="form-control" type="text" id="kabel2" name="kabel2" autocomplete="off">
                    <option>-</option>
                    <option>80 M</option>
                    <option>100 M</option>
                    <option>150 M</option>                    
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="rang">Panjang Kabel 3</label>                
                    <select class="form-control" type="text" id="kabel3" name="kabel3" autocomplete="off">
                    <option>-</option>
                    <option>80 M</option>
                    <option>100 M</option>
                    <option>150 M</option>                    
                    </select>
                  </div> 
				
				 <div class="form-group">
                    <label for="rang">Jenis Pembayaran</label>                
                    <select class="form-control" type="text" id="pembayaran" name="pembayaran" autocomplete="off" required>
                    <option>-</option>
                    <option>Tunai</option>
                    <option>Transfer</option>				
                    </select>
                  </div>
				   
				    <input class="form-control" type="text" id="lokasi_kapten" name="lokasi_kapten" autocomplete="off" readonly> 
				</div>
				
				  
				<div class="form-group">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
                        </div>
              </div>
			  </br>
			  
			  <div class="modal-footer">
				 
              <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
			  <button type="button" class="btn btn-success  pull-right savekapten">Save</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
    </div>
	
	<div class="modal fade" id="modalmntn"  role="dialog" tabindex="-1">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Tambah Data</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
					<form role="form" method="post" id="formdatapengguna">
						
					<div class="form-group">
                     <input class="form-control" type="hidden" id="key_falr" name="key_falr">
                     <input class="form-control" type="hidden" id="kd_layanan" name="kd_layanan">
                     <input class="form-control" type="hidden" id="id_fdbackr" name="id_fdbackr">
                     <input class="form-control" type="hidden" id="nama_fal_mntn" name="nama_fal_mntn">
                     <input class="form-control" type="hidden" id="username_fal_mntn" name="username_fal_mntn">
                    </div>
					

                    </br>
                    <h4>Isian Data Teknisi</h4>
                    </br>
					
				<div class="form-group">
                   <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_womntn" name="status_womntn" autocomplete="off">
                    <option></option>
                    <option value="Pending">Pending</option>
                    <option value="Rescedule">Rescedule</option>
                    <option value="Sudah Terpasang" >Sudah Terpasang</option>                                                                              
                    </select>
                   </div>
				   
				   <div id="resceduleid_mntn">
				   <div class="form-group">
							<label for="fname">Tanggal Rescedule</label>
							<input class="form-control" type="datetime-local" id="tanggalsign" name="tanggalsign" placeholder="nama...">
					</div>
				   </div>
				   
                   <div id="solved_mntn">
                        <div class="form-group">
                    <label for="rang" >Teknisi 1</label>                
                    <select class="form-control" type="text" id="status_mntn" name="status_mntn" autocomplete="off" required>
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

					<div class="form-group">
                    <label for="rang">Teknisi 2</label>                
                    <select class="form-control" type="text" id="status2_mntn" name="status2_mntn" autocomplete="off">
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
                        
                    <div class="form-group">
                    <label for="rang">Kategori Maintenance</label>                
                     <select class='form-control' id="kategori_maintenance" name="kategori_maintenance" required>
					    <option></option>
						<option value="Splicing">Splicing</option>
						<option value="Banding Kabel">Banding Kabel</option>
						<option value="Ganti Modem">Ganti Modem</option>
						<option value="Setting Modem">Setting Modem</option>
						<option value="Tarik Kabel">Tarik Kabel</option>
						
						</select> &nbsp
                            </div> 
					<div id="modem_id">
					<div class="form-group" autocomplete="off">
					  <label for="modem">Modem</label>
					  <select class="form-control" id="modem_mntn" name="modem_mntn">
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
					</div>
					
					<div id="kabel_id">
					<div class="form-group" autocomplete="off">
					 <label for="kabel1_mntn">Kabel</label>
						<select class='form-control' id="kabel1_mntn" name="kabel1_mntn">							
							<option>-</option>
							<option>80 M</option>
							<option>100 M</option>
							<option>150 M</option>							
						</select>
					</div>
					
					<div class="form-group" autocomplete="off">
					 <label for="kabel2_mntn">Kabel 2</label>
						<select class='form-control' id="kabel2_mntn" name="kabel2_mntn">							
							<option>-</option>
							<option>80 M</option>
							<option>100 M</option>
							<option>150 M</option>							
						</select>
					</div>
					
					<div class="form-group" autocomplete="off">
					 <label for="kabel3_mntn">Kabel 3</label>
						<select class='form-control' id="kabel3_mntn" name="kabel3_mntn">							
							<option>-</option>
							<option>80 M</option>
							<option>100 M</option>
							<option>150 M</option>							
						</select>
					</div>
					</div>
				   
				    <input class="form-control" type="text" id="lokasi_kapten_mntn" name="lokasi_kapten_mntn" autocomplete="off" readonly> 
				</div>
				
				  
				<div class="form-group">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain_mntn" name="lain_lain_mntn" placeholder="keterangan" autocomplete="off">
                        </div>
              </div>
			  </br>
			  
			  <div class="modal-footer">
				 
              <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
			  <button type="button" class="btn btn-success  pull-right save_mntn">Save</button>
			  </div>
                    
                  </div>                     
             </div>
            </form>
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

    <script src="../asset/vendor/datatables/jquery.dataTables.min.js"></script>

    <script src="../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="../js/bs-custom-file-input.js"></script>
	
	<script src="../js/sweetalert2.all.min.js"></script>

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
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
			
			var table = $('#tabel_pros').DataTable({

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
			
		//get data value pros
		$(document).on('click', '.editpros', function(){
                //alert($(this).data('id'));
				var id = $(this).attr('id');
				var username_fal = $(this).attr('username_fal');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (id);
				
				$('#modalpros').modal('show');				
				$('#username_fal2').val(username_fal);
				
            });
			
		//get data value kptn
		$(document).on('click', '.editkapten', function(){
                //alert($(this).data('id'));
				var key_fal = $(this).attr('key_fal');
				var username_fal = $(this).attr('username_fal');
				var nama_fal = $(this).attr('nama_fal');
				var perlakuan = $(this).attr('perlakuan');
				var total = $(this).attr('total');
				var keterangan_angsuran = $(this).attr('keterangan_angsuran');
				var jenis_wo = $(this).attr('jenis_wo');
				var kd_layanan = $(this).attr('kd_layanan');
				var tlp_fal = $(this).attr('tlp_fal');
				var id_fdback = $(this).attr('id_fdback');
				var lain_lain = $(this).attr('lain_lain');
				var tgl_fal_datetime = $(this).attr('tgl_fal_datetime');
				
				$('#key_falr').val(key_fal);
				$('#id_fdbackr').val(id_fdback);
				$('#username_fal').val(username_fal);
				$('#nama_fal').val(nama_fal);
				$('#perlakuan').val(perlakuan);
				$('#total').val(total);
				$('#keterangan_angsuran').val(keterangan_angsuran);
				$('#tanggalsign').val(tgl_fal_datetime);
				
				$('#nama_fal_mntn').val(nama_fal);				
				$('#username_fal_mntn').val(username_fal);
				$('#kd_layanan').val(kd_layanan);
				$('#tlp_fal').val(tlp_fal);
				$('#lain_lain').val(lain_lain);
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (key_fal); return;
				//alert (jenis_wo); return;
				if(jenis_wo == 'INSTALASI'){
					$('#modaltambahdata').modal('show');
					
				}else if(jenis_wo == 'MAINTENANCE'){
					//alert (id_fdback); return;
					$('#modalmntn').modal('show');
					//alert (key_fal); return;
				}else if(jenis_wo == 'MAINTENANCE_ODP'){
					$('#modalodp').modal('show');
				}
				
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
		$(document).on('click', '.editbroadband', function(){
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
		$(document).on('click', '.action_edit_list', function(){
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
			 var tanggalsign = $('#tanggalsign').val();
			 
			 if(status_wo == ''){
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Pilih Status Pekerjaan Dulu Bro!!',
					  
					}) 
					return;
				}
			 
			 if(status_wo == 'Sudah Terpasang'){
				if(modem == '-' ){
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Modem Belum Terisi!',				  
					}) 
					return;
				}else if(kabel1 == '-' ){
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Kabel Belum Terisi!',
					  
					})  
					return;
				}else if(status == '' ){
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'PIC Belum Terisi!',
					  
					})  
					return;
				}else if(letak_odp == ''){
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Letak ODP Belum Terisi!',
					  
					}) 
					return;
				}else if(lokasi_kapten == ''){
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Lokasi Belum Terisi!',
					  
					}) 
					return;
				}else if(lokasi_kapten == 'error_lokasi'){
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Lokasi tidak diizinkan!!!',
					  
					}) 
					return;
				}else if(lokasi_kapten == 'error_browser'){
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Brwoser tidak suport lokasi!!!',
					}) 
					return;
				}
			 }else if(status_wo == 'Rescedule'){
				 if(tanggalsign == ''){
					Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Pilih tanggal rescedule yang diinformasikan pelanggan!!!',
					}) 
					return; 
				 }
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
						   tanggalsign:tanggalsign,
						   lain_lain:lain_lain,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_kapten_update_newversi.php",
                    data: value,
                    success : function(data) {
					//alert(data);
					Swal.fire(
						  'Good job!',
						  data,
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
		$(document).on('click', '.save_mntn', function(){
			//var nama_fal = $("#nama_fal").val();			 
			 var key_falr = $('#key_falr').val();
			 var id_fdbackr = $('#id_fdbackr').val();
			 var status_mntn = $('#status_mntn').val();
			 var status2_mntn = $('#status2_mntn').val();
			 var kategori_maintenance = $("#kategori_maintenance").val();
			 var modem_mntn = $("#modem_mntn").val();
             var kabel1_mntn = $("#kabel1_mntn").val();
             var kabel2_mntn = $("#kabel2_mntn").val();
             var kabel3_mntn = $("#kabel3_mntn").val();
             var lain_lain_mntn = $("#lain_lain_mntn").val();
			 var status_womntn = $('#status_womntn').val();
			 var lokasi_kapten_mntn = $('#lokasi_kapten_mntn').val();			
			 var username_fal_mntn = $('#username_fal_mntn').val();			
			 var kd_layanan = $('#kd_layanan').val();		
			 var nama_fal_mntn = $('#nama_fal_mntn').val();		
			 //var nama_fal_mntn = $('#nama_fal_mntn').val();		
			
			//alert(username_Maintenance); return;
			if(status_mntn == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'PIC Maintenance isi en bro!',				  
				}) 
				return
			}
			
			if(kategori_maintenance == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kategori Maintenance isi en bro!',				  
				}) 
				return
			}
			
			if(lokasi_kapten_mntn == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Lokasi isi en bro!',				  
				}) 
				return
			}
			 //alert(kategori_maintenance); return;
			 
			 var value = { key_falr:key_falr,
						   id_fdbackr:id_fdbackr,
						   status_mntn:status_mntn,
						   status2_mntn:status2_mntn, 
						   kategori_maintenance:kategori_maintenance,
						   modem_mntn:modem_mntn,						   
						   kabel1_mntn:kabel1_mntn,
						   kabel2_mntn:kabel2_mntn,
						   kabel3_mntn:kabel3_mntn,
						   lain_lain_mntn:lain_lain_mntn,
						   status_womntn:status_womntn,
						   lokasi_kapten_mntn:lokasi_kapten_mntn,
						   kd_layanan:kd_layanan,
						   nama_fal_mntn:nama_fal_mntn,
						   username_fal_mntn:username_fal_mntn,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_edit_maintenance_new.php",
                    data: value,
                    success : function(data) {
					//alert(data);
					Swal.fire(
						  'Good job!',
						  data,
						  'success'
						).then(function(success){
							//if (data == 'succes') {
								//alert('a');
								/* $.ajax({
									url: 'https://bandwidth.naratel.net.id/moniolt/control/get_solved_wo.php',
									type: 'POST',
									data: value,
									success : function(data) {
										alert(data);
										
									}
								}); */
							//}
							window.location.reload(true);
					})
					}

                }); 
			 
			});
		
			// create 			
		$(document).on('click', '.saveupdate9', function(){
			//var nama_fal = $("#nama_fal").val();
			 var nama_sinden = $('#nama_sinden').val();
			 var username_sinden = $('#username_sinden').val();
			 var pic_sinden = $('#pic_sinden').val();
			 var pic_sinden2 = $('#pic_sinden2').val();
			 var modem_sinden = $('#modem_sinden').val();
			 var kabel_sinden = $('#kabel_sinden').val();
			 var get_lokasi = $('#get_lokasi').val();
			 var status_sinden = $('#status_sinden').val();
			 
			if(modem_sinden == '-' ){
				alert("Modem Belum Terisi"); 
				return
			}
			
			if(kabel_sinden == '-' ){
				alert("Kabel Belum Terisi"); 
				return
			}
			
			if(status_sinden == '' ){
				alert("PIC Belum Terisi"); 
				return
			}			
					
			if(get_lokasi == ''){
				alert("Lokasi Belum Terisi"); 
				return
			}
			 
			 
			 //alert(get_lokasi); return;
			 
			 var value = { nama_sinden:nama_sinden,
						   username_sinden:username_sinden,
						   pic_sinden:pic_sinden, 
						   pic_sinden2:pic_sinden2, 
						   modem_sinden:modem_sinden,
						   kabel_sinden:kabel_sinden,
						   get_lokasi:get_lokasi,
						   status_sinden:status_sinden,
						 };               
				
				$.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_sinden_update.php",
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
	showPosition();
    function showPosition() {   

        // Store the element where the page displays the result

        result = document.getElementById("get_sinden");
		lokasikapten = document.getElementById("lokasi_kapten");
		lokasi_corp = document.getElementById("lokasi_kapten_mntn");
        

        // If geolocation is available, try to get the visitor's position

        if(navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

        } else {

			result.innerHTML = "error_browser";

        }

    };

    

    // Define callback function for   attempt

    function successCallback(position) {
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

$(function() {
	$('#solved').hide();
	$('#resceduleid').hide();
    $('#status_wo').change(function(){
		var a = $('#status_wo').val();
		//alert(a);
       if(a == 'Sudah Terpasang'){
            $('#solved').show();
			$('#resceduleid').hide();			
        }else if(a == 'Rescedule'){
            $('#solved').hide();
            $('#resceduleid').show();
        }else{
			$('#solved').hide();
			$('#resceduleid').hide();
		}
    });
});

$(function() {
	$('#solved_mntn').hide();
	$('#resceduleid_mntn').hide();
    $('#status_womntn').change(function(){
		var a = $('#status_womntn').val();
		//alert(a);
       if(a == 'Sudah Terpasang'){
            $('#solved_mntn').show();
			$('#resceduleid_mntn').hide();			
        }else if(a == 'Rescedule'){
            $('#solved_mntn').hide();
            $('#resceduleid_mntn').show();
        }else{
			$('#solved_mntn').hide();
			$('#resceduleid_mntn').hide();
		}
    });
});

$(function() {
    $('#modem_id').hide();
	$('#kabel_id').hide();
    $('#kategori_maintenance').change(function(){
		var a = $('#kategori_maintenance').val();
		//alert(a);
       if(a == 'Ganti Modem'){
            $('#modem_id').show(); 
			$('#kabel_id').hide();
        }else if(a == 'Tarik Kabel'){
            $('#modem_id').hide();
			$('#kabel_id').show();
        }else{
			$('#modem_id').hide();
			$('#kabel_id').hide();
		}
    });
});
</script>
</script>



</body>



</html>
</html>
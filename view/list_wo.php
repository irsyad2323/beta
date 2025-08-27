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



                <!-- Begin Page Content -->

                <div class="container-fluid">



                    <!-- Page Heading -->

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <h1 class="h3 mb-0 text-gray-800">Instalasi Kapten <?php //echo $_SESSION["level_user"]; ?></h1>

                     

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

                    <!-- div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <button class="btn btn-success insertkptn">TAMBAH +</button>

                    </div -->

					
					<?php } ?>			
				




                        <?php 

                            if ( $_SESSION["level_user"] != "ikr"){ 

                        ?>

                        <div class="row">

						<!-- Earnings (Monthly) Card Example -->
						<?php include '../cart/wo_mlg.php'; ?>		

                        <?php } ?>







                    <!-- Content Row -->

                    <?php 

                        if ($_SESSION["level_user"] != "ts"){

                       ?>
					   
					   <div class="container-fluid">

			  <!-- Page Heading 
			  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
			  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
				-->
			  <!-- DataTales Example -->
			  <div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">List Working Order</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table table-bordered" id="tabel_ikr" width="100%" cellspacing="0">
					  <thead>
						<tr>
						<th>NO</th>
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>
						<th>Jenis WO</th>
						<th>Telpon</th>
						<th>Layanan</th>
						<th>PIC</th>
						<th>Keterangan</th>
						<th>Status</th>
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
						<th>PIC</th>
						<th>Keterangan</th>
						<th>Status</th>
						<th>Action</th>
						</tr>
					  </tfoot>
					  <tbody> 
						<?php 
			  include('../controller/controller_mysqli.php');
			  $acces_user_log = $_SESSION["username"];
				
					//echo '2';
					$table = mysqli_query($koneksi,"
					SELECT key_fal, paket_fal, tgl_fal_datetime, tgl_proses_teknis, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, pic_ikr, status_wo, foto_dpn_rmh, foto_ktp, lokasi, alamat_fal, kelurahan, perlakuan, total_diskon, angsuran1, password_fal, lain_lain
					FROM (
					SELECT a.key_fal , a.paket_fal, a.tgl_fal_datetime, a.tgl_proses_teknis ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.pic_ikr, a.status_wo, a.foto_dpn_rmh, a.foto_ktp, a.lokasi, a.alamat_fal, a.kelurahan, a.perlakuan, a.total_diskon, a.angsuran1, a.password_fal, a.lain_lain FROM tbl_fal a 
					WHERE a.status_wo in ('Belum Terpasang','Proses Pengerjaan')
					union all
					SELECT b.key_fal , 0 as paket_fal, b.tgl_date_time as tgl_fal_datetime, b.tgl_proses_teknis as tgl_proses_teknis ,b.username_Maintenance as username_fal ,b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.pic_ikr , b.status_wo, 0 as foto_dpn_rmh, 0 as foto_ktp, 0 as lokasi, b.alamat_fal, b.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1, 0 as password_fal , b.lain_lain FROM tbl_maintenance b 
					WHERE b.status_wo in ('Belum Terpasang','Proses Pengerjaan')
					union all
					SELECT c.key_fal , 0 as paket_fal, c.tgl_sign as tgl_fal_datetime , c.tgl_proses as tgl_proses_teknis ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 0 as tlp_fal, c.kd_layanan, c.pic_ikr, c.status_wo, 0 as foto_dpn_rmh , 0 as foto_ktp, 0 as lokasi, c.alamat_fal, c.kelurahan, 0 as perlakuan, 0 as total_diskon, 0 as angsuran1 , 0 as password_fal, c.lain_lain FROM tbl_maintenance_odp c 
					WHERE c.status_wo in ('Belum Terpasang','Proses Pengerjaan')) AS combined_logs ORDER BY tgl_fal_datetime DESC");
				
				$no=1;
			  while ($row = mysqli_fetch_assoc($table)){ 
			  
			  if ($row['jenis_wo'] == 'INSTALASI'){
				  $row['jenis_hasil'] = '<small class="badge badge-info">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE'){
				  $row['jenis_hasil'] = '<small class="badge badge-warning">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'MAINTENANCE_ODP'){
				  $row['jenis_hasil'] = '<small class="badge badge-danger">'. strtoupper($row['jenis_wo']).'</small>';
			  }elseif ($row['jenis_wo'] == 'INSTALASI_ODP'){
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
			  
			  if ($row['status_wo'] == 'Belum Terpasang'){
				  $row['status_wo_h'] = '<small class="badge badge-danger">'. strtoupper($row['status_wo']).'</small>';
			  }elseif ($row['status_wo'] == 'Proses Pengerjaan'){
				  $row['status_wo_h'] = '<small class="badge badge-warning">'. strtoupper($row['status_wo']).'</small>';
			  }
			  
			  $i=0;
			  
			  ?>
			  <tr id=<?php echo $row['key_fal']; ?>">
				<td> <?php echo $no; ?></td>
				<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
				<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
				<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
				<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
				<td data-target="tlp_fal"> <?php echo $row['tlp_fal'];?></td>
				<td data-target="jenis_unit"> <?php echo $row['jenis_unit'];?></td>
				<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
				<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
				<td data-target="status_wo_h"> <?php echo $row['status_wo_h'];?></td>
				<td>
					<div class="dropdown">
					  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						ACTION
					  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<?php if ($row['jenis_wo'] == 'INSTALASI'){ ?>
						<a href="https://pendaftaran.kaptennaratel.com/<?php echo $row['foto_dpn_rmh'];?>" target="_blank" class="dropdown-item">
						Foto Rumah</a>
						<a href="<?php echo $row['lokasi'];?>" target="_blank" class="dropdown-item">
						Lokasi</a>
						<a name="edit" data-id="<?php echo $row['username_fal'];?>"
						username_fal="<?php echo $row['username_fal'];?>"
						jenis_pekerjaan="<?php echo $row['jenis_pekerjaan'];?>"
						nama_fal="<?php echo $row['nama_fal'];?>"
						alamat_fal="<?php echo $row['alamat_fal'];?>"
						tlp_fal="<?php echo $row['tlp_fal'];?>"
						password_fal="<?php echo $row['password_fal'];?>"
						paket_fal="<?php echo $row['paket_fal'];?>"
						kd_layanan="<?php echo $row['kd_layanan'];?>"
						pic_ikr="<?php echo $row['pic_ikr'];?>"
						alamat="<?php echo $row['alamat_fal'];?>"
						rt="<?php echo $row['rt'];?>"
						rw="<?php echo $row['rw'];?>"
						kelurahan="<?php echo $row['kelurahan'];?>"
						tgl_fal_datetime="<?php echo $row['tgl_fal_datetime'];?>"
						lain_lain="<?php echo $row['lain_lain'];?>"
						total_diskon="<?php echo $row['total_diskon'];?>"
						free="<?php echo $row['free'];?>"
						pindah_alamat="<?php echo $row['pindah_alamat'];?>"
						keterangan_angsuran="<?php echo $row['keterangan_angsuran'];?>" 
						perlakuan2="<?php echo $row['perlakuan'];?>" 
						class="dropdown-item editkptn" >Edit</a>
						<a name="edit" data-id="<?php echo $row['key_fal'];?>"
						key_fal="<?php echo $row['key_fal'];?>"
						status_wo="<?php echo $row['status_wo'];?>"
						lain_lain="<?php echo $row['lain_lain'];?>"
						class="dropdown-item perijinan">Kendala</a>
						
						<?php } else if($row['jenis_wo'] == 'MAINTENANCE'){ ?>
						<a name="edit" data-id="<?php echo $row['username_fal'];?>"
						username_fal="<?php echo $row['username_fal'];?>"
						key_fal="<?php echo $row['key_fal'];?>"
						lain_lain="<?php echo $row['lain_lain'];?>"
						class="dropdown-item editmntn" >Edit</a>
						<?php } ?>
						
						<a name="edit" data-id="<?php echo $row['username_fal'];?>"
						username_fal="<?php echo $row['username_fal'];?>"
						pic_ikr="<?php echo $row['pic_ikr'];?>"
						jenis_wo="<?php echo $row['jenis_wo'];?>"
						tgl_fal_datetime="<?php echo $row['tgl_fal_datetime'];?>"
						lain_lain="<?php echo $row['lain_lain'];?>"
						class="dropdown-item respro">Reschedule</a>
						<a name="edit" data-id="<?php echo $row['username_fal'];?>"
						key_fal="<?php echo $row['key_fal'];?>"
						username_fal="<?php echo $row['username_fal'];?>"
						pic_ikr="<?php echo $row['pic_ikr'];?>"
						jenis_wo="<?php echo $row['jenis_wo'];?>"
						class="dropdown-item switchpic" >Switch PIC</a>
						<a class="dropdown-item" href="#">Delete</a>
					  </div>
					</div>
				</td>
			  </tr>
			  <?php
			  $no++;
			  }
			  ?>
					  </tbody>
					</table>
				  </div>
				</div>
			  </div>

			</div>
						<!-- /.container-fluid -->
						
						<div class="container-fluid">

			  <!-- Page Heading 
			  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
			  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
				-->
			  <!-- DataTales Example -->
			  <div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">List Solved</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
					<table class="table table-bordered" id="tabel_done" width="100%" cellspacing="0">
					  <thead>
						<tr>
						<th>NO</th>
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>Kabel 1</th>
						<th>Kabel 2</th>
						<th>Kabel 3</th>
						</tr>
					  </thead>
					  <tfoot>
						<tr>
						<th>NO</th>
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama</th>
						<th>Jenis WO</th>
						<th>Modem</th>
						<th>Kabel 1</th>
						<th>Kabel 2</th>
						<th>Kabel 3</th>
						</tr>
					  </tfoot>
					  <tbody> 
						<?php 
			  include('../controller/controller_mysqli.php');
			  $acces_user_log = $_SESSION["username"];
				
					//echo '2';
					$table = mysqli_query($koneksi,"
					SELECT key_fal, tgl_fal_datetime, username_fal, nama_fal, jenis_wo, tlp_fal, kd_layanan, modem, kabel1, kabel2, kabel3
					FROM (
					SELECT a.key_fal , a.tgl_fal_datetime ,a.username_fal ,a.nama_fal, a.jenis_wo, a.tlp_fal, a.kd_layanan, a.modem, a.kabel1, a.kabel2, a.kabel3 FROM tbl_fal a 
					WHERE a.status_wo in ('Sudah Terpasang') and a.tanggal_instalasi = DATE(now())
					union all
					SELECT b.key_fal , b.tgl_date_time as tgl_fal_datetime ,b.username_Maintenance as username_fal ,b.nama_fal, b.jenis_wo, b.tlp_fal, b.kd_layanan, b.modem, b.kabel1, b.kabel2, b.kabel3 FROM tbl_maintenance b 
					WHERE b.status_wo in ('Sudah Terpasang') and b.tanggal_instalasi = DATE(now())
					union all
					SELECT c.key_fal , c.tgl_sign as tgl_fal_datetime ,c.id_odp as username_fal ,c.nama_fal, c.jenis_wo, 0 as tlp_fal, c.kd_layanan, c.modem, c.kabel1,c.kabel2,c.kabel3 FROM tbl_maintenance_odp c 
					WHERE c.status_wo in ('Sudah Terpasang') and c.tanggal_instalasi = DATE(now())) AS combined_logs ORDER BY tgl_fal_datetime DESC");
				
				 $no=1;
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
			  ?>
			  <tr id=<?php echo $row['key_fal']; ?>">
				<td> <?php echo $no; ?></td>
				<td data-target="nama_fal"> <?php echo $row['username_fal'];?></td>
				<td data-target="tgl_fal_datetime"> <?php echo $row['tgl_fal_datetime'];?></td>
				<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
				<td data-target="jenis_hasil"> <?php echo $row['jenis_hasil'];?></td>
				<td data-target="modem"> <?php echo $row['modem'];?></td>
				<td data-target="kabel1"> <?php echo $row['kabel1'];?></td>
				<td data-target="kabel2"> <?php echo $row['kabel2'];?></td>
				<td data-target="kabel3"> <?php echo $row['kabel3'];?></td>
			  </tr>
			  <?php	
			   $no++;
			  }
			  ?>
					  </tbody>
					</table>
				  </div>
				</div>
			  </div>

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
						<?php } ?>
						<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg" ){  ?>	
						<option value="JT">OLT JALANTRA</option>
						<?php } ?>
						<?php if ( $_SESSION["level_kantor"] != "mlg" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg1" ){  ?>	
						<option value="KM">OLT PASURUAN</option>
						<?php } ?>
						<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "mlg" && $_SESSION["level_kantor"] != "mlg1" ){  ?>	
						<option value="KD">OLT BATU</option>
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
                                <input class="form-control" type="number" id="tlp_fal" name="tlp_fal" placeholder="telepon.." autocomplete="off" >
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
									<option>60</option>                     
									</select>
                            </div>
						<br/>
						
                            <div class="form-row">
                                <label for="rang">kantor Cabang</label>                
								<select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" required>
								<option><?php echo $kota ?></option>
								<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg" && $_SESSION["level_kantor"] != "mlg1" ){  ?>
								<option value="mlg">mlg</option>					
								<option value="mlg1">Jalantra</option>					
								<option value="pas">pas</option>
								<option value="batu">batu</option>
								<?php } ?>
								</select>
                            </div> 
						<br/>
						
                            <div class="form-row">
                                <label for="rang">Pic IKR</label>                
									<select class="form-control" type="text" id="pic_ikr" name="pic_ikr" autocomplete="off" >
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
						<br/>
                                                 
                            <div class="form-row">
								<label for="lname">Alamat</label>
								<input class="form-control" type="text" id="alamat_fal" name="alamat" placeholder="alamat..." autocomplete="off" >
							</div>
						<br/>
							
                            <div class="form-row">
                                <label for="rang">RT</label>
                               <input class="form-control" type="text" id="rt" name="rt" placeholder="rt..." autocomplete="off" >
                            </div>
						<br/>
							
                            <div class="form-row">
                                <label for="rang">RW</label>
                               <input class="form-control" type="text" id="rw" name="rw" placeholder="rw..." autocomplete="off" >
                            </div>
						<br/>	
							
                            <div class="form-row">
                                <label for="rang">Kelurahan</label>
                               <input class="form-control" type="text" id="kelurahan" name="kelurahan" placeholder="kelurahan..." autocomplete="off" >
                            </div>
						<br/>                    
              		
							<div class="form-row">
								<label>Tanggal FAL</label>
								<input type="datetime-local" name="tgl_fal" id="tgl_fal" class="form-control" ="true" >
								<p class="text-danger" id="err_tanggal_masuk"></p>
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
                            <button type="button" class="btn btn-success  pull-right actionkapten">Insert</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
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
									<option>60</option>                     
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
								<label for="lname">Alamat</label>
								<input class="form-control" type="text" id="alamat_fal2" name="alamat_fal2" placeholder="alamat..." autocomplete="off" >
							</div>
						<br/>
              		
							<div class="form-row">
								<label>Tanggal FAL</label>
								<input type="datetime-local" name="tgl_fal2" id="tgl_fal2" class="form-control" ="true" >
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
							<input class="form-control" type="number" id="keterangan_angsuran2" name="keterangan_angsuran2" >
						</div>
					<br/>
						<div class="form-row">
							<label for="rang">Pindah Alamat</label> 
							<input class="form-control" type="number" id="pindah_alamat2" name="pindah_alamat2">
                        </div>
					<br/>
			

                   				
						<hr>
                            <button type="button" class="btn btn-success  pull-right actioneditkapten">edit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </form>

							<?php
						}
					?>
					
					<!-- END ISIAN DATA ADMIN -->
						
					
                      </div>
					  
            </div>

        </div>

    </div>	
	
	<div class="modal fade" id="modalmntn"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

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
								<label for="rang">ID</label>
								<input class="form-control" type="text" id="key_fal_mntn" name="key_fal_mntn" autocomplete="off" disabled>
							</div>
						<br/> 		
						
							<div class="form-row">
								<label for="rang">ID User</label>
								<input class="form-control" type="text" id="username_fal_mntn" name="username_fal_mntn" autocomplete="off" disabled>
							</div>
						<br/> 

							<div class="form-row">
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="lain_lain_mntn" name="lain_lain_mntn" placeholder="keterangan" autocomplete="off">
							</div>
						<br/>    
					
								
						<hr>
                            <button type="button" class="btn btn-success  pull-right action_mntn">edit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </form>

							<?php
						}
					?>
					
					<!-- END ISIAN DATA ADMIN -->
						
					
                      </div>
					  
            </div>

        </div>

    </div>
	
	<div class="modal fade" id="modalrespro"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Rescedule</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
                    <form role="form" method="post" id="formdatapengguna">
					
					<!-- FORM ISIAN DATA ADMIN -->
					
					<?php 
                        if ($_SESSION["level_user"] != "ikr"){
                       ?>
							<input class="form-control" type="text" id="pic_ikr_res" name="pic_ikr_res" autocomplete="off" readonly>
							<input class="form-control" type="text" id="jenis_pekerjaan_res" name="jenis_pekerjaan_res" autocomplete="off" readonly>
							<div class="form-row">
								<label for="rang">ID User</label>
								<input class="form-control" type="text" id="username_rescedule" name="username_rescedule" autocomplete="off" readonly>
							</div>
						<br/>
						<div class="form-row">
								<label>Tanggal FAL</label>
								<input type="datetime-local" name="tgl_fal_res" id="tgl_fal_res" class="form-control" >
							</div>
						<br/>
							<div class="form-row">
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="keterangan_res" name="keterangan_res" autocomplete="off">
							</div>
						<br/>
                   				
						<hr>
                            <button type="button" class="btn btn-success  pull-right actionrespro">edit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </form>

							<?php
						}
					?>
					
					<!-- END ISIAN DATA ADMIN -->
						
					
                      </div>
					  
            </div>

        </div>

    </div>
	
	<div class="modal fade" id="modalswitch"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Switch PIC</h4>

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
								<label for="rang">ID User</label>
								<input class="form-control" type="text" id="username_s" name="username_s" autocomplete="off" disabled>
							</div>
						<br/>
							<input class="form-control" type="text" id="pic_ikrswitch" name="pic_ikrswitch" autocomplete="off" disabled>
							<input class="form-control" type="text" id="jenis_wo" name="jenis_wo" autocomplete="off" disabled>
							<input class="form-control" type="text" id="key_fal" name="key_fal" autocomplete="off" disabled>
                            <div class="form-row">
                                <label for="rang">Pic IKR</label>                
									<select class="form-control" type="text" id="pic_ikrs" name="pic_ikrs" autocomplete="off" >
									<option value="-">-</option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value="'.$data_user['user'].'">'.$data_user['nama_panggilan'].'</option>';
											  } 
											?>   </option> 
					<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value="'.$data_user['user'].'">'.$data_user['nama_panggilan'].'</option>';
											  } 
											?>   </option>  
									</select>
                            </div> 
						<br/>
                   				
						<hr>
                            <button type="button" class="btn btn-success  pull-right actionswitch">edit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                        </form>

							<?php
						}
					?>
					
					<!-- END ISIAN DATA ADMIN -->
						
					
                      </div>
					  
            </div>

        </div>

    </div>
	
	<div class="modal fade" id="modal_perijinan"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h4 class="modal-user">Kendala</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span></button>

                    

                </div>

                 <div class="modal-body">
                    <form role="form" method="post" id="formdatapengguna">
					
					<!-- FORM ISIAN DATA ADMIN -->
					
					<?php 
                        if ($_SESSION["level_user"] != "ikr"){
                       ?>
						<input class="form-control" type="hidden" id="key_fal" name="key_fal" autocomplete="off">
						<div class="form-row">
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="lain_lain_perijinan" name="lain_lain_perijinan" placeholder="keterangan" autocomplete="off">
							</div>
						<br/>  

						<div class="form-row">
                                <label for="rang">PIC</label>                
									<select class="form-control" type="text" id="pic_kendala" name="pic_kendala" autocomplete="off" >
									<option></option>
									<option value="ivan_permit">ivan_permit</option>                   
									<option value="yani">Bu Yani Sales</option>                   
									</select>
                            </div>
						<br/> 

						<div class="form-row">
                                <label for="rang">Status Pelanggan</label>                
									<select class="form-control" type="text" id="status_wo" name="status_wo" autocomplete="off" >
									<option></option>
									<option value="Masalah Perijinan">Masalah Perijinan</option>                   
									<option value="Pending">Pending</option>                   
									</select>
                            </div>
						<br/>
						
						<div class="form-row">
								<select class="form-control" type="text" name="pending" id="pending" autocomplete="off" >
									<option>Kategori Pending</option>
									<option value="uang">Uang</option>                   
									<option value="unscedule_panding">Unscedule Pending</option>                   
									</select>
							</div>
						<br/>  
                                                 
                   				
						<hr>
                            <button type="button" class="btn btn-success  pull-right actionperijinan">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
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

            
			var table = $('#tabel_ikr').DataTable({

                "responsive": true,

                "processing": true,

                "language": {

                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

                }, 

                

                "paging": true,

                "lengthChange": true,

                "searching": true,

                "ordering": true,

                "info": true,

                "autoWidth": true,

                "responsive": true,

                

            });
			
			var table = $('#tabel_done').DataTable({

                "responsive": true,

                "processing": true,

                "language": {

                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

                }, 

                "paging": true,

                "lengthChange": true,

                "searching": true,

                "ordering": true,

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



       
			
			$(document).on('click', '.insertkptn', function(){
             
				$('#modaltambahdata').modal('show');
				
				
            });
			
			// INSERT 			
		$(document).on('click', '.actionkapten', function(){
			
            var nama_fal = $("#nama_fal").val();

            var pic_ikr = $("#pic_ikr").val();

            var kd_layanan = $("#kd_layanan").val();

            var alamat_fal = $("#alamat_fal").val();

            var rt = $("#rt").val();

            var rw = $("#rw").val();

            var kelurahan = $("#kelurahan").val();

            var tlp_fal = $("#tlp_fal").val();

            var tgl_fal = $("#tgl_fal").val();
			
			var paket_fal = $("#paket_fal").val();

            var pic = $("#pic").val();

            var status = $("#status").val();

            var status2 = $("#status2").val();

            var jenis_wo = $("#jenis_wo").val();

            var produk = $("#produk").val();         

            var tgl_fal = $("#tgl_fal").val();            

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
			
			var total = (free + total_diskon + pindah_alamat);
			
			//alert(paket_fal); return;
			 
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
				  text: 'Alamat ODP Belum Terisi!',				  
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
			
			if(tlp_fal == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'No Telfon Belum Terisi!',
				  
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
			
			if(rt == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'RT Belum Terisi!',
				  
				})  
				return
			}
			
			if(rw == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'RW Belum Terisi!',
				  
				})  
				return
			}
			
			if(kelurahan == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kelurahan Belum Terisi!',
				  
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
			 
			 
			 //alert(get_distribusi); return;
			 
			 var value = { 
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
						  status2:status2, 
						  jenis_wo:jenis_wo,
						  produk:produk,
						  perlakuan:perlakuan,
						  total_diskon:total_diskon,
						  keterangan_angsuran:keterangan_angsuran,						 
						  free:free,
						  pindah_alamat:pindah_alamat,						  
						  pembayaran:pembayaran,
						  paket_fal:paket_fal,
						  tgl_fal:tgl_fal,
						  username_fal:username_fal,
						  verified:verified,
						  total:total,
						  letak_odp:letak_odp,
						  password_fal:password_fal, status_wo:status_wo,lain_lain:lain_lain, ket:k,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_insert_kptn.php",
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
		
			//get data value kapten
		$(document).on('click', '.editkptn', function(){
                //alert($(this).data('id'));
				var jenis_pekerjaan = $(this).attr('jenis_pekerjaan');
				var username_fal = $(this).attr('username_fal');
				var nama_fal = $(this).attr('nama_fal');
				var password_fal = $(this).attr('password_fal');
				var paket_fal = $(this).attr('paket_fal');
				var kd_layanan = $(this).attr('kd_layanan');
				var tlp_fal = $(this).attr('tlp_fal');
				var pic_ikr = $(this).attr('pic_ikr');
				var alamat_fal = $(this).attr('alamat_fal');
				var rt = $(this).attr('rt');
				var rw = $(this).attr('rw');
				var kelurahan = $(this).attr('kelurahan');
				var tgl_fal_datetime = $(this).attr('tgl_fal_datetime');
				var lain_lain = $(this).attr('lain_lain');
				var total_diskon = $(this).attr('total_diskon');
				var free = $(this).attr('free');
				var pindah_alamat = $(this).attr('pindah_alamat');
				var keterangan_angsuran = $(this).attr('keterangan_angsuran');
				var perlakuan2 = $(this).attr('perlakuan2');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (key_odp); 
				
				$('#modaledit').modal('show');
				$('#perlakuan2').val(perlakuan2);				
				$('#username_fal2').val(username_fal);				
				$('#jenis_pekerjaan').val(jenis_pekerjaan);				
				$('#nama_fal2').val(nama_fal);
				$('#password_fal2').val(password_fal);
				$('#tlp_fal2').val(tlp_fal);
				$('#paket_fal2').val(paket_fal);
				$('#kd_layanan2').val(kd_layanan);				
				$('#pic_ikr2').val(pic_ikr);
				$('#alamat_fal2').val(alamat_fal);				
				$('#rt2').val(rt);
				$('#rw2').val(rw);				
				$('#kelurahan2').val(kelurahan);
				$('#tgl_fal2').val(tgl_fal_datetime);				
				$('#lain_lain2').val(lain_lain);
				$('#total_diskon2').val(total_diskon);				
				$('#free2').val(free);
				$('#pindah_alamat2').val(pindah_alamat);
				$('#keterangan_angsuran2').val(keterangan_angsuran);
				
            });
			
		//get data value kapten
		$(document).on('click', '.editmntn', function(){
                //alert($(this).data('id'));
				var jenis_pekerjaan = $(this).attr('jenis_pekerjaan');
				var key_fal = $(this).attr('key_fal');
				var username_fal = $(this).attr('username_fal');
				var lain_lain = $(this).attr('lain_lain');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (key_odp); 
				$('#modalmntn').modal('show');
				$('#key_fal_mntn').val(key_fal);				
				$('#jenis_pekerjaan_mntn').val(jenis_pekerjaan);				
				$('#lain_lain_mntn').val(lain_lain);
				$('#username_fal_mntn').val(username_fal);
				
				
            });
			
			//get data value kapten
		$(document).on('click', '.switchpic', function(){
                //alert($(this).data('id'));
				var jenis_pekerjaan = $(this).attr('jenis_pekerjaan');
				var username_fal = $(this).attr('username_fal');
				var pic_ikr = $(this).attr('pic_ikr');
				var jenis_wo = $(this).attr('jenis_wo');
				var key_fal = $(this).attr('key_fal');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (key_odp); 
				
				$('#modalswitch').modal('show');
				$('#username_s').val(username_fal);					
				$('#pic_ikrswitch').val(pic_ikr);
				$('#jenis_wo').val(jenis_wo);
				$('#key_fal').val(key_fal);
				
            });
			
			//get data value kapten
		$(document).on('click', '.respro', function(){
                //alert($(this).data('id'));
				var jenis_wo = $(this).attr('jenis_wo');
				var username_fal = $(this).attr('username_fal');
				var pic_ikr = $(this).attr('pic_ikr');
				var tgl_fal_datetime = $(this).attr('tgl_fal_datetime');
				var lain_lain = $(this).attr('lain_lain');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (key_odp); 
				
				$('#modalrespro').modal('show');
				$('#username_rescedule').val(username_fal);		
				$('#pic_ikr_res').val(pic_ikr);		
				$('#jenis_pekerjaan_res').val(jenis_wo);		
				$('#tgl_fal_res').val(tgl_fal_datetime);		
				$('#keterangan_res').val(lain_lain);		
				
            });
			
			//get data value kapten
		$(document).on('click', '.perijinan', function(){
                //alert($(this).data('id'));
				var key_fal = $(this).attr('key_fal');
				var status_wo = $(this).attr('status_wo');
				var lain_lain = $(this).attr('lain_lain');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (key_odp); 
				
				$('#modal_perijinan').modal('show');
				$('#key_fal').val(key_fal);				
				$('#status_wo').val(status_wo);				
				$('#lain_lain_perijinan').val(lain_lain);	
				
            });
			
		// Edit 			
		$(document).on('click', '.actioneditkapten', function(){
			
            var jenis_pekerjaan = $("#jenis_pekerjaan").val();
			
            var nama_fal2 = $("#nama_fal2").val();

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
			
			var total2 = (free2 + total_diskon2 + pindah_alamat2);
			
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
						  total:total2,
						  password_fal:password_fal2, status_wo:status_wo2,lain_lain:lain_lain2,
						 }; 

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
			 
			});
			
			// Edit 			
		$(document).on('click', '.action_mntn', function(){
			
            var key_fal2 = $("#key_fal_mntn").val();

            var keterangan = $("#lain_lain_mntn").val();
			 
			 
			// alert(key_fal2); return;
			 
			 var value = { 
						  key_fal2:key_fal2, 
						  keterangan:keterangan, 
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_editmnt.php",
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
		
		// Edit 			
		$(document).on('click', '.actioneditkapten', function(){       

            var username_fal2 = $("#username_fal2").val();	
            var password_fal2 = $("#password_fal2").val();
            var lain_lain2 = $("#lain_lain2").val();
			
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
						  total:total2,
						  password_fal:password_fal2, status_wo:status_wo2,lain_lain:lain_lain2,
						 }; 

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
			 
			});
			
			// Edit 			
		$(document).on('click', '.actionswitch', function(){
            
			var pic_ikrs = $("#pic_ikrs").val(); 
			var pic_ikrswitch = $("#pic_ikrswitch").val(); 
            var username_s = $("#username_s").val();	
            var jenis_wo = $("#jenis_wo").val();	
            var key_fal = $("#key_fal").val();	
			 
			 //alert(username_s); return;
			 
			 var value = { 
						  pic_ikr:pic_ikrs,
						  pic_ikrswitch:pic_ikrswitch,
						  username_s:username_s,
						  jenis_wo:jenis_wo,
						  key_fal:key_fal,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_switch_new.php",
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
			
			// Edit 			
		$(document).on('click', '.actionrespro', function(){
            
            var username_rescedule = $("#username_rescedule").val();	
            var keterangan_res = $("#keterangan_res").val();	
            var jenis_pekerjaan_res = $("#jenis_pekerjaan_res").val();	
            var pic_ikr_res = $("#pic_ikr_res").val();	
            var tgl_fal_res = $("#tgl_fal_res").val();	
			 
			// alert(jenis_pekerjaan_res); return;
			 
			 var value = { 
						  username_rescedule:username_rescedule,
						  keterangan_res:keterangan_res,
						  jenis_pekerjaan_res:jenis_pekerjaan_res,
						  pic_ikr_res:pic_ikr_res,
						  tgl_fal_res:tgl_fal_res,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_respro.php",
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
			
			// Edit 			
		$(document).on('click', '.actionperijinan', function(){
			//alert ('work');
			
            var key_fal = $("#key_fal").val();
            var lain_lain_perijinan = $("#lain_lain_perijinan").val();
            var status_wo = $("#status_wo").val();
            var pending = $("#pending").val();
            var pic_kendala = $("#pic_kendala").val();
			
			//alert(pending); return;
			 
			if(lain_lain_perijinan == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Keterangan Belum Terisi!',				  
				}) 
				return
			} 
			 
			if(status_wo == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Alamat ODP Belum Terisi!',				  
				}) 
				return
			} 
			 
			if(pic_kendala == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Pic Kendala Pending Belum Terisi!',				  
				}) 
				return
			}
			 
			 //alert(get_distribusi); return;
			 
			 var value = { 
						  lain_lain_perijinan:lain_lain_perijinan,
						  status_wo:status_wo,
						  key_fal:key_fal,
						  pending:pending,
						  pic_kendala:pic_kendala,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_mslh_perijinan.php",
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
			
			// INSERT 			
		$(document).on('click', '.actionkapten', function(){
			
            var nama_fal = $("#nama_fal").val();

            var pic_ikr = $("#pic_ikr").val();

            var kd_layanan = $("#kd_layanan").val();

            var alamat_fal = $("#alamat_fal").val();

            var rt = $("#rt").val();

            var rw = $("#rw").val();

            var kelurahan = $("#kelurahan").val();

            var tlp_fal = $("#tlp_fal").val();

            var tgl_fal = $("#tgl_fal").val();
			
			var paket_fal = $("#paket_fal").val();

            var pic = $("#pic").val();

            var status = $("#status").val();

            var status2 = $("#status2").val();

            var jenis_wo = $("#jenis_wo").val();

            var produk = $("#produk").val();         

            var tgl_fal = $("#tgl_fal").val();            

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
			
			var total = (free + total_diskon + pindah_alamat);
			
			//alert(paket_fal); return;
			 
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
				  text: 'Alamat ODP Belum Terisi!',				  
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
			
			if(tlp_fal == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'No Telfon Belum Terisi!',
				  
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
			
			if(rt == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'RT Belum Terisi!',
				  
				})  
				return
			}
			
			if(rw == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'RW Belum Terisi!',
				  
				})  
				return
			}
			
			if(kelurahan == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kelurahan Belum Terisi!',
				  
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
			 
			 
			 //alert(get_distribusi); return;
			 
			 var value = { 
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
						  status2:status2, 
						  jenis_wo:jenis_wo,
						  produk:produk,
						  perlakuan:perlakuan,
						  total_diskon:total_diskon,
						  keterangan_angsuran:keterangan_angsuran,						 
						  free:free,
						  pindah_alamat:pindah_alamat,						  
						  pembayaran:pembayaran,
						  paket_fal:paket_fal,
						  tgl_fal:tgl_fal,
						  username_fal:username_fal,
						  verified:verified,
						  total:total,
						  letak_odp:letak_odp,
						  password_fal:password_fal, status_wo:status_wo,lain_lain:lain_lain, ket:k,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_insert_kptn.php",
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



            $(document).on('click', '.deletepengguna', function(){

                var username_fal = $(this).attr("username_fal");
				
				//alert (username_fal); return;

                if(confirm('Hapus id '+username_fal+'?'))

                {

                    $.ajax({

                        url:"../controller/delete.php",

                        method:"POST",

                        data:{username_fal:username_fal},

                        success:function(data){
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

$(function() {
    $('#pending').hide();
    $('#status_wo').change(function(){
		var a = $('#status_wo').val();
		//alert(a);
       if(a == 'Pending'){
            $('#pending').show(); 
        }else{
			$('#pending').hide();
		}
    });
});
</script>

</body>

</html>
</html>
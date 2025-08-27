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

<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
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
	<h1 class="h3 mb-0 text-gray-800">Maintenance Admin <?php //echo $_SESSION["level_user"]; ?></h1>              
</div>				
<div class="d-sm-flex align-items-center justify-content-between mb-4">                      
<?php if ( $_SESSION["level_user"] != "Admin" && $_SESSION["level_user"] != "kapten" && $_SESSION["level_user"] != "ts"  ){ ?>
		<div class="my-2"></div>
				<a href="index.php" class="btn btn-success btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-check"></i>
					</span>
					<span class="text">HOME</span>
				</a>
<?php } ?>
</div>

<?php if ( $_SESSION["level_user"] != "ikr" && $_SESSION["level_user"] != "Admin" ){ ?>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<button class="btn btn-success insertmntn">TAMBAH +</button>
	</div>
<?php } ?>			
<?php if ( $_SESSION["level_user"] != "ikr"){ ?>

<div class="row">

		<!-- Earnings (Monthly) Card Example -->
<?php include '../cart/wo_mlg.php'; ?>		

<?php } ?>
	<!-- Content Row -->
	   
	   <!-- Begin Page Content -->
		<div class="container-fluid">

		  <!-- Page Heading 
		  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
		  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
			-->
		  <!-- DataTales Example -->
		  <div class="card shadow mb-4">
			<div class="card-header py-3">
			  <h6 class="m-0 font-weight-bold text-primary">Data Maintenance Belum Terpasang</h6>
			</div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-bordered" id="tabel_pengguna" width="100%" cellspacing="0">
				  <thead>
					<tr>
					  <th>Key</th>
					  <th>Tanggal</th>
					  <th>ID USER</th>
					  <th>NAMA</th>
					  <th>ALAMAT</th>
					  <th>NO TELP</th>							
					  <th>TANGGAL</th>
					  <th>PIC</th>
					  <th>STATUS</th>
					  <th>ACTION</th>
					</tr>
				  </thead>
				  <tfoot>
					<tr>
					   <th>Key</th>
					  <th>Tanggal</th>
					  <th>ID USER</th>
					  <th>NAMA</th>
					  <th>ALAMAT</th>
					  <th>NO TELP</th>							
					  <th>TANGGAL</th>
					  <th>PIC</th>
					  <th>STATUS</th>
					  <th>ACTION</th>
					</tr>
				  </tfoot>
				  <tbody> 
					<?php 
						  include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT * FROM tbl_maintenance WHERE jenis_wo='MAINTENANCE' and status_wo in ('Belum Terpasang','Proses Pengerjaan') and kd_layanan like '".$kota."' ORDER BY key_fal DESC");
						  $no=1;
						  
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  
						  
							  if($row['status_wo'] == 'Sudah Terpasang'){
							$row['type_status'] = '<small class="badge badge-success">'. strtoupper($row['status_wo']).'</small>';
							}elseif($row['status_wo'] == 'Proses Pengerjaan'){
								$row['type_status'] = '<small class="badge badge-warning">'. strtoupper($row['status_wo']).'</small>';
							}elseif($row['status_wo'] == 'Belum Terpasang'){
								$row['type_status'] = '<small class="badge badge-danger">'. strtoupper($row['status_wo']).'</small>';
							}else{
								$row['type_status'] = $data[$i]['status_wo'];
							}
							
							 $date_ins = $row['tgl_fal'];
							 $date_now = date("Y-m-d");
							/*   if ($date_ins > $date_now ) {
									$row['hasil_danger'] = '<small class="badge badge-success">'. strtoupper($row['tgl_fal']).'</small>';
								}else{
									$row['hasil_danger'] = '<small class="badge badge-danger">'. strtoupper($row['tgl_fal']).'</small>';
								} */
								
								if(strtotime($date_ins) < strtotime('-1 day')){
									$row['hasil_danger'] = '<small class="badge badge-danger">'. strtoupper($row['tgl_fal']).'</small>';
								}else{
									$row['hasil_danger'] = '<small class="badge badge-success">'. strtoupper($row['tgl_fal']).'</small>';
								}
						  ?>
						  <tr id=<?php echo $no; ?>">
							<td data-target="key_fal"> <?php echo $no;?></td>
							<td data-target="tgl_date_time"> <?php echo $row['tgl_date_time'];?></td>
							<td data-target="username_Maintenance"> <?php echo $row['username_Maintenance'];?></td>
							<td data-target="nama_fal"> <?php echo $row['nama_fal'];?></td>
							<td data-target="alamat_fal"> <?php echo $row['alamat_fal'];?></td>
							<td data-target="tlp_fal"> <?php echo $row['tlp_fal'];?></td>
							<td data-target="hasil_danger"> <?php echo $row['hasil_danger'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
							<td data-target="type_status"> <?php echo $row['type_status'];?></td>
							
							<td>
								<div class="dropdown">
								  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									ACTION
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a href="https://pendaftaran.kaptennaratel.com/<?php echo $row['foto_dpn_rmh'];?>" target="_blank" class="dropdown-item">
								 Foto Rumah</a>
									<a name="edit" data-id="<?php echo $row['key_fal'];?>"
										key_fal="<?php echo $row['key_fal'];?>"
										username_Maintenance="<?php echo $row['username_Maintenance'];?>"
										pic_ikr="<?php echo $row['pic_ikr'];?>"
										lain_lain="<?php echo $row['lain_lain'];?>"
										class="dropdown-item editmntn" >Edit</a>
										<a name="edit" data-id="<?php echo $row['key_fal'];?>"
										key_fal="<?php echo $row['key_fal'];?>"
										pic_ikr="<?php echo $row['pic_ikr'];?>"
										username_Maintenance="<?php echo $row['username_Maintenance'];?>"
										class="dropdown-item switcmntn" >Switch PIC</a>
										<a name="edit" data-id="<?php echo $row['username_fal'];?>"
										username_fal="<?php echo $row['username_fal'];?>"
										pic_ikr="<?php echo $row['pic_ikr'];?>"
										class="dropdown-item respro">Reschedule Proses</a>
										<a name="edit" data-id="<?php echo $row['key_fal'];?>"
										key_fal="<?php echo $row['key_fal'];?>"
										class="dropdown-item deletepengguna">Delete</a>
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
	   
	   <!-- Begin Page Content -->
		<div class="container-fluid">

		  <!-- Page Heading 
		  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
		  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
			-->
		  <!-- DataTales Example -->
		  <div class="card shadow mb-4">
			<div class="card-header py-3">
			  <h6 class="m-0 font-weight-bold text-primary">Data Solved</h6>
			</div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-bordered" id="tabel_solved_mntn" width="100%" cellspacing="0">
				  <thead>
					<tr>
					<th>NO</th>
					<th>Username</th>
					<th>Modem</th>
					<th>Kabel 1</th>
					<th>Kabel 2</th>                        
					<th>Kabel 3</th>
					<th>Produk</th>
					<th>pic</th>
					<th>pic2</th>
					</tr>
				  </thead>
				  <tfoot>
					<tr>
					<th>NO</th>
					<th>Username</th>
					<th>Modem</th>
					<th>Kabel 1</th>
					<th>Kabel 2</th>                        
					<th>Kabel 3</th>
					<th>Produk</th>
					<th>pic</th>
					<th>pic2</th>
					</tr>
				  </tfoot>
				  <tbody> 
					<?php 
						  include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT * FROM tbl_maintenance WHERE tanggal_instalasi = CURDATE() AND status_wo='Sudah Terpasang' and kd_layanan like '".$kota."' ORDER BY key_fal DESC");
						  $no=1;
						  
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  
						  
							  if($row['status_wo'] == 'Sudah Terpasang'){
							$row['type_status'] = '<small class="badge badge-success">'. strtoupper($row['status_wo']).'</small>';
							}elseif($row['status_wo'] == 'Proses Pengerjaan'){
								$row['type_status'] = '<small class="badge badge-warning">'. strtoupper($row['status_wo']).'</small>';
							}elseif($row['status_wo'] == 'Belum Terpasang'){
								$row['type_status'] = '<small class="badge badge-danger">'. strtoupper($row['status_wo']).'</small>';
							}else{
								$row['type_status'] = $data[$i]['status_wo'];
							}
							
							 $date_ins = $row['tgl_fal'];
							 $date_now = date("Y-m-d");
							/*   if ($date_ins > $date_now ) {
									$row['hasil_danger'] = '<small class="badge badge-success">'. strtoupper($row['tgl_fal']).'</small>';
								}else{
									$row['hasil_danger'] = '<small class="badge badge-danger">'. strtoupper($row['tgl_fal']).'</small>';
								} */
								
								if(strtotime($date_ins) < strtotime('-1 day')){
									$row['hasil_danger'] = '<small class="badge badge-danger">'. strtoupper($row['tgl_fal']).'</small>';
								}else{
									$row['hasil_danger'] = '<small class="badge badge-success">'. strtoupper($row['tgl_fal']).'</small>';
								}
						  ?>
						  <tr id=<?php echo $no; ?>">
							<td data-target="key_fal"> <?php echo $no;?></td>
							<td data-target="username_Maintenance"> <?php echo $row['username_Maintenance'];?></td>
							<td data-target="modem"> <?php echo $row['modem'];?></td>
							<td data-target="kabel1"> <?php echo $row['kabel1'];?></td>
							<td data-target="kabel2"> <?php echo $row['kabel2'];?></td>
							<td data-target="kabel3"> <?php echo $row['kabel3'];?></td>
							<td data-target="produk"> <?php echo $row['produk'];?></td>
							<td data-target="pic"> <?php echo $row['pic'];?></td>
							<td data-target="pic2"> <?php echo $row['pic2'];?></td>
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
	
	<div class="modal fade" id="modaltambahdatamnt"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

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
								<label for="fname">Username</label>
                                <input class="form-control" type="text" id="username_Maintenance" name="username_Maintenance" placeholder="nama..." autocomplete="off">
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
									<option>-</option>
									<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg1" /* && $_SESSION["level_kantor"] != "mlg" */ ){  ?>
								    <option>rafif</option>
									<option>fauzi</option>
									<option>kiki</option>
									<option>fio</option>
									<option>rino</option>
									<option>sonny</option>
									<option>dapin</option>
									<option>vian</option>
									<?php } ?>
									<?php if ( $_SESSION["level_kantor"] != "pas" /* && $_SESSION["level_kantor"] != "batu" */ && $_SESSION["level_kantor"] != "mlg" && $_SESSION["level_kantor"] != "mlg1" ){  ?>
									<option>decky</option>
									<option>wawan</option>
									<option>roni</option>
									<?php } ?>
									<?php if ( /* $_SESSION["level_kantor"] != "pas" && */ $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg" && $_SESSION["level_kantor"] != "mlg1" ){  ?>
									<option>ricky</option>
									<option>lukman</option>
									<option>bayu</option>                    
									<option>yusufpas</option>
									<option>roni</option>
									<option>satria</option>
									<option>adam</option>
									<option>wahyudi</option>
									<option>majid</option>
									<option>ahnaf</option>
									 <option>movic</option>
									<option>gibran</option>
									<option>ryezal</option>
									<option>ubed</option>
									<?php } ?>
									<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg" ){  ?>
									<option>rozak</option>
									<option>yuni</option>
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
                                <label for="rang">Kelurahan</label>
                               <input class="form-control" type="text" id="kelurahan" name="kelurahan" placeholder="kelurahan..." autocomplete="off" >
                            </div>
						<br/>
                        
              		
							<div class="form-row">
								<label for="rang">Nama Produk</label>                
                    <select class="form-control" type="text" id="produk" name="produk" autocomplete="off">
                    <option>-</option>
                    <option>Kapten Naratel</option>                                                                                
                    </select>
							</div>
						<br/>

							<div class="form-row">
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
							</div>
						<br/>
      				
						<hr>
                            <button type="button" class="btn btn-success  pull-right actionmntn">Insert</button>
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
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="keterangan" name="keterangan" placeholder="keterangan" autocomplete="off">
							</div>
						<br/>  

						<div class="form-row">
								<input class="form-control" type="hidden" id="key_fal2" name="key_fal2" placeholder="keterangan" autocomplete="off">
							</div>
						<br/>     
			

                   				
						<hr>
                            <button type="button" class="btn btn-success  pull-right actioneditmntn">edit</button>
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

	<div class="modal fade" id="modalswitchmntn"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

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
					   
							<input class="form-control" type="hidden" id="key_fal_switch" name="key_fal_switch" autocomplete="off" readonly>
							<input class="form-control" type="hidden" id="username_log" name="username_log" autocomplete="off" readonly>
						<br/>
							<input class="form-control" type="hidden" id="pic_switch_mntn" name="pic_switch_mntn" autocomplete="off" readonly>
                            <div class="form-row">
                                <label for="rang">Pic IKR</label>                
									<select class="form-control" type="text" id="pic_ikrs" name="pic_ikrs" autocomplete="off" >
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Karyawan'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value="'.$data_user['user'].'">'.$data_user['nama_panggilan'].'</option>';
											  } 
											?>   </option> 
					<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsourcing'");
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
                            <button type="button" class="btn btn-success  pull-right actionswitchmntn">edit</button>
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

    <!-- datepicker bootstrap -->

	<script src="../js/sweetalert2.all.min.js"></script>

    <script src="../asset/js/bootstrap-datepicker.min.js"></script>

    <script src="../asset/locales/bootstrap-datepicker.id.min.js"></script>
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
		   $('#username_Maintenance').val(hasil.kode_user);
           $('#nama_fal').val(hasil.nama_user);
		   $('#alamat_fal').val(hasil.alamat_user);
		   $('#tlp_fal').val(hasil.telp_user);
		   $('#kd_layanan').val(hasil.kd_layanan);		   
		   $('#kelurahan').val(hasil.kelurahan);
        }
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
			
			var table = $('#tabel_solved_mntn').DataTable({

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
           
       
			
			$(document).on('click', '.insertmntn', function(){
             
				$('#modaltambahdatamnt').modal('show');
				
				
            });
			
			// INSERT 			
		$(document).on('click', '.actionmntn', function(){
			
            var jenis_pekerjaan = $("#jenis_pekerjaan").val();
			
            var username_Maintenance = $("#username_Maintenance").val();

            var nama_fal = $("#nama_fal").val();

            var tlp_fal = $("#tlp_fal").val();

            var alamat_fal = $("#alamat_fal").val();

            var kd_layanan = $("#kd_layanan").val();

            var pic_ikr = $("#pic_ikr").val();

            var kelurahan = $("#kelurahan").val();

            var lain_lain = $("#lain_lain").val();
			
            var produk = $("#produk").val();
			
			//alert(paket_fal); return;
			 
	/* 		if(jenis_pekerjaan == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Jenis Pekerjaan Belum Terisi!',				  
				}) 
				return
			} 
			 
			if(username_Maintenance == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Username Belum Terisi!',				  
				}) 
				return
			} */
		
			 
			 
			 //alert(get_distribusi); return;
			 
			 var value = { 
						  jenis_pekerjaan:jenis_pekerjaan, 
						  username_Maintenance:username_Maintenance, 
						  nama_fal:nama_fal, 
						  tlp_fal:tlp_fal, 
						  alamat_fal:alamat_fal, 
						  kd_layanan:kd_layanan, 
						  pic_ikr:pic_ikr, 
						  kelurahan:kelurahan, 
						  lain_lain:lain_lain, 
						  produk:produk, 
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_insert_disbyu.php",
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
		
			//get data value kapten
		$(document).on('click', '.switcmntn', function(){
                //alert($(this).data('id'));
				var key_fal = $(this).attr('key_fal');
				var pic_ikr = $(this).attr('pic_ikr');
				var username_Maintenance = $(this).attr('username_Maintenance');
				var keterangan = $(this).attr('lain_lain');
				
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (key_odp); 
				
				$('#modalswitchmntn').modal('show');
				$('#key_fal_switch').val(key_fal);				
				$('#pic_switch_mntn').val(pic_ikr);				
				$('#keterangan').val(keterangan);				
				$('#username_log').val(username_Maintenance);				
				
				
            });
			
		// Edit 			
		$(document).on('click', '.actionswitchmntn', function(){
            
			var pic_ikrs = $("#pic_ikrs").val(); 
			var pic_switch_mntn = $("#pic_switch_mntn").val(); 
            var key_fal_switch = $("#key_fal_switch").val();	
            var username_log = $("#username_log").val();	
			 
			 //alert(username_s); return;
			 
			 var value = { 
						  pic_ikr:pic_ikrs,
						  pic_ikrswitch:pic_switch_mntn,
						  key_fal_switch:key_fal_switch,
						  username_log:username_log,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_switch_mntn.php",
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
		$(document).on('click', '.editmntn', function(){
                //alert($(this).data('id'));
				var key_fal = $(this).attr('key_fal');
				var username_Maintenance = $(this).attr('username_Maintenance');
				var pic_ikr = $(this).attr('pic_ikr');
				var keterangan = $(this).attr('lain_lain');
				
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (key_odp); 
				
				$('#modaledit').modal('show');
				$('#key_fal2').val(key_fal);				
				$('#pic_ikr2').val(pic_ikr);				
				$('#keterangan').val(keterangan);				
				
				
            });
			
		// Edit 			
		$(document).on('click', '.actioneditmntn', function(){
			
            var key_fal2 = $("#key_fal2").val();
			
            var pic_ikr2 = $("#pic_ikr2").val();

            var keterangan = $("#keterangan").val();
			 
			 
			 //alert(get_distribusi); return;
			 
			 var value = { 
						  key_fal2:key_fal2, 
						  pic_ikr2:pic_ikr2, 
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

                var key_fal = $(this).attr("key_fal");
				
				//alert (username_fal); return;

                if(confirm('Hapus id '+key_fal+'?'))

                {

                    $.ajax({

                        url:"../controller/delete_mntn.php",

                        method:"POST",

                        data:{key_fal:key_fal},

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
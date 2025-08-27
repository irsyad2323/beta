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

    <title>SB Admin 2 - Gangguan Massal</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Gangguan Massal</h1>
                        <?php 
                            if ( $_SESSION["level_user"] != "ikr" && $_SESSION["level_user"] != "Admin" ){ 
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
                        
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <button class="btn btn-success insertkptn">TAMBAH +</button>

                    </div>



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
							  <h6 class="m-0 font-weight-bold text-primary">Data GAMAS</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>Key</th>
							
									<th>Tanggal</th>

									<th>ID User</th>

									<th>NAMA</th>

									<th>KETERANGAN</th>
									
									<th>STATUS</th>

									<th>HANDLE</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>Key</th>
							
									<th>Tanggal</th>

									<th>ID User</th>

									<th>NAMA</th>

									<th>KETERANGAN</th>
									
									<th>STATUS</th>

									<th>HANDLE</th>
									</tr>
								  </tfoot>
								  <tbody>
						  <?php 
						  include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT * FROM keluhan
						  WHERE kd_kom='".$kota."' and status='Visit' and kategori_kompline  ('Gangguan Server','Gangguan UPSTREAM','Gangguan_ODP','Gangguan_PortOLT') ORDER BY id DESC");
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  $no=1;
						  
						  ?>
						  <tr id=<?php echo $row['id']; ?>">
							<td data-target="id"> <?php echo $row['id'];?></td>
							<td data-target="tanggal"> <?php echo $row['tanggal'];?></td>
							<td data-target="id_user"> <?php echo $row['id_user'];?></td>
							<td data-target="nama_kom"> <?php echo $row['nama_kom'];?></td>
							<td data-target="keluhan_deskripsi"> <?php echo $row['keluhan_deskripsi'];?></td>
							<td data-target="status"> <?php echo $row['status'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['handle_kompline'];?></td>
							
							<!-- td> <div class="btn-group">	 
							<button type="button" name="edit" data-id="<?php echo $row['id'];?>"
							id="<?php echo $row['id'];?>"
							tanggal="<?php echo $row['tanggal'];?>"
							id_user="<?php echo $row['id_user'];?>"
							nama_kom="<?php echo $row['nama_kom'];?>"
							keluhan_deskripsi="<?php echo $row['keluhan_deskripsi'];?>"
							status="<?php echo $row['status'];?>"	
							handle_kompline="<?php echo $row['handle_kompline'];?>"		
							class="btn btn-info btn-sm mr-2 editkptn">Edit</button>
							
						</div></td -->
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
                            <th>Pic ODP</th>
                            <th>Spliter</th>
                            <th>Spliter 2</th>
                            <th>Spliter 3</th>                            
                            <th>Keterangan</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Teknisi</th>
                            <th>Teknisi 2</th>
                            <th>Status WO</th>
                            <th>Action</th>
                    
                          
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
						 
			<div class="form-row">				  

				  <div class="form-group col-md-4">
                     <label for="rang">Kategori Maintenance</label>                
						<select class='form-control' id="kategori_kompline" name="kategori_kompline" required>
					    <option></option>
						<option value="Gangguan_ODP">Gangguan_ODP</option>
						<option value="Gangguan_PortOLT">Gangguan_PortOLT</option>
						<option value="Gangguan_OLT">Gangguan_OLT</option>
						<option value="Gangguan Server">Gangguan Server</option>
						<option value="Gangguan UPSTREAM">Gangguan UPSTREAM</option>						
						</select>
                   </div> 
					
					<!-- div class="form-group col-md-2">
					 <label for="rang">Kategori MAINTENANCE</label>
						<select class='form-control' id="kategori_maintenance" name="kategori_maintenance">							
							<option>Gangguan_ODP</option>
                    <option>Gangguan_PortOLT</option>
					<option>Gangguan_OLT</option>
					<option>Gangguan Server</option>
					<option>Gangguan Server</option>   
						</select>
					</div -->
					<div class="form-row">
					<div class="form-group" id="odp_select">
						<label for="odp"></label><br/>
						<select class="js-example-basic-multiple" id="odp_pilih" name="odp_pilih" multiple="multiple" style='width: 350px;''>
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
					<div class="form-group" id="port_select">
						<label for="odp"></label><br/>
						<select class="js-example-basic-multiple" id="gangguan_port" name="gangguan_port" multiple="multiple" style='width: 350px;''>
						  <option> <?php
											  $conn = mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
											  $sql_user = mysqli_query($conn, "SELECT * FROM tbl_odp");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_odp'].'">'.$data_user['nama_odp'].' </option>';
											  } 
											?>   </option> 
						</select>
					</div>
					<div class="form-group col-md-2" autocomplete="off">
					 <label for="gangguan_olt"></label>
						<select class='form-control' id="gangguan_olt" name="gangguan_olt" style='width: 350px;'>							
							<option>-</option>
							<option>OLT IMA</option>
							<option>OLT JONI</option>
							<option>OLT KANTOR</option>
							<option>OLT PASURUAN</option>
							<option>OLT ALL KAPTEN</option>
						</select>
					</div>
					<div class="form-group col-md-2" autocomplete="off">
					 <label for="gangguan_olt"></label>
										
						<input class="form-control" type="text" id="gangguan_server" name="gangguan_server"  autocomplete="off" style='width: 350px;'>
						<input class="form-control" type="text" id="gangguan_upstream" name="gangguan_upstream" autocomplete="off" style='width: 350px;'>
					</div>
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
											 
						<div class="form-group col-md-2">
                                <label for="rang">Jenis Produk</label>                
                    <select class="form-control" type="text" id="jenis_produk" name="jenis_produk" autocomplete="off" required>
					<option>-</option>
					<option>Kapten Naratel</option>
					<option>Sinden</option>
					<option>Omah Wifi</option>
					<option>Broadband</option>
					<option>Dedicated</option>
                    </select>
                            </div> 
                                                   
                        <div class="form-group col-md-2">
                                <label for="rang">Layanan</label>                
                    <select class="form-control" type="text" id="kd_kom" name="kd_kom" autocomplete="off" required>
					        <option><?php echo $kota ?></option>                                     
                    </select>
                            </div>
						
                        <div class="form-group col-md-6">
                            <label for="lname">Nama</label>
                            <input class="form-control" type="text" id="nama_odp" name="nama_odp" placeholder="Nama..." autocomplete="off" required>
                        </div> 
						
						<div class="form-group col-md-6">
                            <label for="lname">Alamat</label>
                            <input class="form-control" type="text" id="alamat" name="alamat" placeholder="alamat..." autocomplete="off" required>
                        </div> 

						<div class="form-group col-md-6">
                            <label for="lname">Kelurahan</label>
                            <input class="form-control" type="text" id="kelurahan" name="kelurahan" placeholder="Kelurahan..." autocomplete="off" required>
                        </div>  
						
						<div class="form-group col-md-6">
                             <label for="rang">Pic IKR</label>                
									<select class="form-control" type="text" id="pic_ikr" name="pic_ikr" autocomplete="off" >
									<option>-</option>
									<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg1" /* && $_SESSION["level_kantor"] != "mlg" */ ){  ?>
								    <option>rafif</option>
									<option>fauzi</option>
									<option>kiki</option>
									<option>fio</option>
									<option>rino</option>
									<option>yuni</option>
									<option>sonny</option>
									<?php } ?>
									<?php if ( $_SESSION["level_kantor"] != "pas" /* && $_SESSION["level_kantor"] != "batu" */ && $_SESSION["level_kantor"] != "mlg" && $_SESSION["level_kantor"] != "mlg1" ){  ?>
									<option>wawan</option>
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
									<?php } ?>
									<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg" ){  ?>
									<option>rozak</option>
									
									<?php } ?>
									</select>
                        </div>
			
						<div class="form-group col-md-6">
                            <label for="lname">Tanggal</label>
                            <input class="form-control" type="date" id="tanggal" name="tanggal" autocomplete="off" required>
                        </div> 
                            
                            <!-- div class="form-group col-md-2">
                                <label for="rang">kantor Cabang</label>                
                    <select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" required>
					<option></option>
                    <option>mlg</option>
                    <option>pas</option>                                   
                    </select>
                            </div --> 

                                      
                      <div class="form-group col-md-8">
                            <label for="rang">Keterangan Gangguan</label>
                            <input class="form-control" type="text" id="keluhan_deskripsi" name="keluhan_deskripsi" placeholder="keterangan" autocomplete="off">
                        </div>

                        </div>

                   
              			
						<hr>
                            <button type="button" class="btn btn-success  pull-right actionkapten">Insert</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form> 
					</div>
            </div>
        </div>
    </div>
	
	<div class="modal fade" id="modaledit"  role="dialog" tabindex="-1">
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
						 
			<div class="form-row">				  

				  <div class="form-group col-md-4">
                     <label for="rang">Kategori Maintenance</label>                
						<select class='form-control' id="kategori_kompline2" name="kategori_kompline2" required>
					    <option></option>
						<option value="Gangguan_ODP">Gangguan_ODP</option>
						<option value="Gangguan_PortOLT">Gangguan_PortOLT</option>
						<option value="Gangguan_OLT">Gangguan_OLT</option>
						<option value="Gangguan Server">Gangguan Server</option>
						<option value="Gangguan UPSTREAM">Gangguan UPSTREAM</option>						
						</select>
                   </div> 
					
					<!-- div class="form-group col-md-2">
					 <label for="rang">Kategori MAINTENANCE</label>
						<select class='form-control' id="kategori_maintenance" name="kategori_maintenance">							
							<option>Gangguan_ODP</option>
                    <option>Gangguan_PortOLT</option>
					<option>Gangguan_OLT</option>
					<option>Gangguan Server</option>
					<option>Gangguan Server</option>   
						</select>
					</div -->
					<div class="form-row">
					<div class="form-group" id="odp_select">
						<label for="odp"></label><br/>
						<select class="js-example-basic-multiple" id="odp_pilih2" name="odp_pilih2" multiple="multiple" style='width: 350px;''>
						  <option> <?php
											  $conn = mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
											  $sql_user = mysqli_query($conn, "SELECT * FROM tbl_odp");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_odp'].'">'.$data_user['nama_odp'].' </option>';
											  } 
											?>   </option> 
						</select>
					</div>
					<div class="form-group" id="port_select">
						<label for="odp"></label><br/>
						<select class="js-example-basic-multiple" id="gangguan_port2" name="gangguan_port2" multiple="multiple" style='width: 350px;''>
						  <option> <?php
											  $conn = mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
											  $sql_user = mysqli_query($conn, "SELECT * FROM tbl_odp");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_odp'].'">'.$data_user['nama_odp'].' </option>';
											  } 
											?>   </option> 
						</select>
					</div>
					<div class="form-group col-md-2" autocomplete="off">
					 <label for="gangguan_olt"></label>
						<select class='form-control' id="gangguan_olt2" name="gangguan_olt2" style='width: 350px;'>							
							<option>-</option>
							<option>OLT IMA</option>
							<option>OLT JONI</option>
							<option>OLT KANTOR</option>
							<option>OLT PASURUAN</option>
							<option>OLT ALL KAPTEN</option>
						</select>
					</div>
					<div class="form-group col-md-2" autocomplete="off">
					 <label for="gangguan_olt"></label>
										
						<input class="form-control" type="text" id="gangguan_server2" name="gangguan_server2"  autocomplete="off" style='width: 350px;'>
						<input class="form-control" type="text" id="gangguan_upstream2" name="gangguan_upstream2" autocomplete="off" style='width: 350px;'>
					</div>
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
                                                   
                              
                            <div class="form-group col-md-6">
                            <label for="lname">Alamat</label>
                            <input class="form-control" type="text" id="alamat_gangguan2" name="alamat_gangguan2" placeholder="alamat..." autocomplete="off" required>
                        </div>      

						<div class="form-group col-md-6">
                            <label for="lname">id</label>
                            <input class="form-control" type="text" id="id2" name="id2" placeholder="alamat..." autocomplete="off">
                        </div>
						
						<div class="form-group col-md-6">
                            <label for="lname">Tanggal</label>
                            <input class="form-control" type="date" id="tanggal2" name="tanggal2" autocomplete="off" required>
                        </div> 
                            
                            <!-- div class="form-group col-md-2">
                                <label for="rang">kantor Cabang</label>                
                    <select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" required>
					<option></option>
                    <option>mlg</option>
                    <option>pas</option>                                   
                    </select>
                            </div --> 

                            <div class="form-group col-md-2">
                                <label for="rang">Pic</label>                
                    <select class="form-control" type="text" id="pic_gamas2" name="pic_gamas2" autocomplete="off" required>
					<option>-</option>
					<option>kiki</option>
					<option>roy</option>
					<option>rafif</option>
                    <option>wawan</option>
                    <option>fauzi</option>
                    <option>kiki</option>                    
                    <option>ricky</option>
                    <option>lukman</option>
                    <option>fio</option>
                    <option>rino</option>
                    <option>bayu</option>
                    <option>wahyudi</option>
                    <option>yusufpas</option>
					<option>yuni</option>                                             
                    </select>
                            </div>     
                      
                                        
                      <div class="form-group col-md-8">
                            <label for="rang">Keterangan Gangguan</label>
                            <input class="form-control" type="text" id="keterangan_gangguan2" name="keterangan_gangguan2" placeholder="keterangan" autocomplete="off">
                        </div>


                    
                   
		
                        </div>

                   
              			
						<hr>
                            <button type="button" class="btn btn-success  pull-right actioneditkapten">Insert</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form> 
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
	<script src="../asset/js/sweetalert2.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	

   


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
	$('#odp_pilih').select2().on('change', function(){
		//var a = $('.js-example-basic-multiple').val();
		var a = $('#odp_pilih').val();
alert (a);
    $.ajax({
        url: "../create/create_user_odp.php",
        data: { "value": $("#odp_pilih").val() },
		//data: { "value": a },
        //dataType:"html",
        type: "post",
        success: function(data){
			//alert(data);
		var hasil = JSON.parse(data);
		   $('#id_odp').val(hasil.id_odp);
           $('#nama_odp').val(hasil.nama_odp);
		   $('#alamat').val(hasil.alamat_odp);
		   $('#kelurahan').val(hasil.kelurahan);
		   $('#jenis_produk').val(hasil.produk);
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

            

            $( "#tanggal_user" ).datepicker({
                autoclose:true,
                todayHighlight:true,
                format:'dd-mm-yyyy',
                language: 'id'
            });

            $(document).on('click', '.add-data', function(){
                $('#modaltambahdata').modal('show');
                $("#formdatapengguna").trigger("reset");
                $("#id").attr("disabled",false);
                $('.modal-user').text("Tambah Data");
                $('#action').val('insert');
                $('#actionform').text("Tambah");
            });
            
            $(".submitdata").click(function(){
            // alert("submit data");
           

            var action= $("#action").val();
			var gangguan_olt = $("#gangguan_olt").val(); 
			var gangguan_port = $("#gangguan_port").val(); 
			var gangguan_server = $("#gangguan_server").val(); 
			var gangguan_upstream = $("#gangguan_upstream").val();
			var odp_pilih = $("#odp_pilih").val();
            var nama_kom = (odp_pilih + gangguan_upstream + gangguan_port + gangguan_olt + gangguan_server);
            var tanggal_gangguan = $("#tanggal_gangguan").val();
            var alamat_gangguan = $("#alamat_gangguan").val();
            var kategori_kompline = $("#kategori_kompline").val();
            var keterangan_gangguan = $("#keterangan_gangguan").val();
            var pic_gamas = $("#pic_gamas").val();                      
            var id = $("#id").val();
			var tanggal = $("#tanggal").val();
            
			/*
			if(nama_fal == '' || alamat == null || pic_ikr == '' || kd_layanan == '' ){
				alert("DATA ANDA TIDAK LENGKAP"); 
				return
			} */

            //alert (nama_gangguan); die();

            var value = { action:action, 
						  nama_gangguan:nama_gangguan,
						  tanggal:tanggal,
						  alamat_gangguan:alamat_gangguan,
						  kategori_kompline:kategori_kompline,
						  tanggal_gangguan:tanggal_gangguan,
						  keterangan_gangguan:keterangan_gangguan,
						  pic_gamas:pic_gamas,
						  id:id,}; 

                $.ajax({
                    type: "POST",
					async: false,
                    url: "../controller/action_gamas.php",
                    data: value,
                    success: function(data) {						
                        $('#tabel_pengguna').DataTable().ajax.reload();
                    }
                });  
            });
			
			$(document).on('click', '.insertkptn', function(){
             
				$('#modaltambahdata').modal('show');
				
				
            });
			
			// INSERT 			
		$(document).on('click', '.actionkapten', function(){
			
            var action= $("#action").val();
			var gangguan_olt = $("#gangguan_olt").val(); 
			var gangguan_port = $("#gangguan_port").val(); 
			var gangguan_server = $("#gangguan_server").val(); 
			var gangguan_upstream = $("#gangguan_upstream").val();
			var pic_ikr = $("#pic_ikr").val();
			var odp_pilih = $("#odp_pilih").val();
			var nama_odp = $("#nama_odp").val();
            var nama_kom = (odp_pilih + gangguan_upstream + gangguan_port + gangguan_olt + gangguan_server);           
            var alamat = $("#alamat").val();
            var kelurahan = $("#kelurahan").val();
            var kategori_kompline = $("#kategori_kompline").val();
            var keluhan_deskripsi = $("#keluhan_deskripsi").val();           
			var tanggal = $("#tanggal").val();
			var kd_kom = $("#kd_kom").val();
			var jenis_produk = $("#jenis_produk").val();
			
			//alert (nama_kom); return;
			 
			if(kategori_kompline == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kategori Gangguan Belum Terisi!',				  
				}) 
				return
			} 
			 
			if(alamat == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Alamat Belum Terisi!',				  
				}) 
				return
			}

			if(jenis_produk == '-' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Produk Belum Terisi!',				  
				}) 
				return
			}
			 
			 
			 //alert(get_distribusi); return;
			 
			 var value = {  
						  nama_odp:nama_odp,
						  kelurahan:kelurahan,
						  nama_kom:nama_kom,
						  pic_ikr:pic_ikr,
						  tanggal:tanggal,
						  alamat:alamat,
						  kategori_kompline:kategori_kompline,
						  keluhan_deskripsi:keluhan_deskripsi,
						  kd_kom:kd_kom,						 
						  jenis_produk:jenis_produk,
						  }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_insert_gamas.php",
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
		$(document).on('click', '.editkptn', function(){
                //alert($(this).data('id'));
				var id_user = $(this).attr('id_user');
				var nama_kom = $(this).attr('nama_kom');
				var keluhan_deskripsi = $(this).attr('keluhan_deskripsi');
				var status = $(this).attr('status');
				var handle_kompline = $(this).attr('handle_kompline');
				var tanggal = $(this).attr('tanggal');				
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (key_odp); 
				
				$('#modaledit').modal('show');
				$('#id_user').val(id_user);				
				$('#nama_kom').val(nama_kom);
				$('#keluhan_deskripsi').val(keluhan_deskripsi);
				$('#status').val(status);
				$('#handle_kompline').val(handle_kompline);
				$('#tanggal').val(tanggal);
			
            });
			
			// Edit 			
		$(document).on('click', '.actioneditkapten', function(){
			
            var action= $("#action").val();
			var gangguan_olt = $("#gangguan_olt").val(); 
			var gangguan_port = $("#gangguan_port").val(); 
			var gangguan_server = $("#gangguan_server").val(); 
			var gangguan_upstream = $("#gangguan_upstream").val();
			var odp_pilih = $("#odp_pilih").val();
            var nama_gangguan = (odp_pilih + gangguan_upstream + gangguan_port + gangguan_olt + gangguan_server);
            var tanggal_gangguan = $("#tanggal_gangguan").val();
            var alamat_gangguan = $("#alamat_gangguan").val();
            var kategori_kompline = $("#kategori_kompline").val();
            var keterangan_gangguan = $("#keterangan_gangguan").val();
            var pic_gamas = $("#pic_gamas").val();                      
            var id = $("#id").val();
			var tanggal = $("#tanggal").val();
			 
			if(nama_gangguan == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Nama Belum Terisi!',				  
				}) 
				return
			} 
			 
			
			 
			 //alert(get_distribusi); return;
			 
			 var value = { 
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

            $(document).on('click', '.editpengguna', function(){
                var id = $(this).attr("id");
                $.ajax({
                    url:"../controller/get_data_gamas.php",
                    method:"POST",
                    data:{id:id},
                    dataType:"JSON",
                    success:function(data)
                    {
                        $('#modaltambahdata').modal('show');
                        $("#id").attr("disabled",true);
                        $('.modal-user').text("Edit Data");
                        $('#action').val('edit');
                        $('#actionform').text("Edit");


                        $("#nama_gangguan").val(data.nama_gangguan);
						$("#tanggal").val(data.nama_gangguan);
                        $("#alamat_gangguan").val(data.alamat_gangguan);
                        $("#kategori_kompline").val(data.kategori_kompline);
                        $("#keterangan_gangguan").val(data.keterangan_gangguan);
                        $("#pic_gamas").val(data.pic_gamas);
                        $("#id").val(data.id);
                        
    
                        
                    }
                });
            });

            $(document).on('click', '.deletepengguna', function(){
                var id = $(this).attr("id");
                if(confirm('Hapus id '+id+'?'))
                {
                    $.ajax({
                        url:"../controller/delete_gamas.php",
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
	$(function() {
    $('#odp_select').hide();
	$('#gangguan_olt').hide();
	$('#port_select').hide();
	$('#gangguan_server').hide();
	$('#gangguan_upstream').hide();		
    $('#kategori_kompline').change(function(){
		var a = $('#kategori_kompline').val();
		//alert(a);
       if(a == 'Gangguan_ODP'){
            $('#odp_select').show(); 
			$('#gangguan_olt').hide();
			$('#port_select').hide();
			$('#gangguan_server').hide();
			$('#gangguan_upstream').hide();
        }else if(a == 'Gangguan_OLT'){
            $('#port_select').hide();
			$('#gangguan_server').hide();
			$('#gangguan_upstream').hide();
			$('#odp_select').hide();
			$('#gangguan_olt').show();			
        }else if(a == 'Gangguan_PortOLT'){
            $('#gangguan_olt').hide();
			$('#gangguan_server').hide();
			$('#gangguan_upstream').hide();
			$('#odp_select').hide();
			$('#port_select').show();			
        }else if(a == 'Gangguan Server'){
            $('#gangguan_olt').hide();
			$('#port_select').hide();
			$('#gangguan_upstream').hide();
			$('#odp_select').hide();
			$('#gangguan_server').show();			
        }else if(a == 'Gangguan UPSTREAM'){
            $('#gangguan_olt').hide();
			$('#port_select').hide();
			$('#gangguan_server').hide();
			$('#odp_select').hide();
			$('#gangguan_upstream').show();			
        }else{
			$('#odp_select').hide();
			$('#gangguan_olt').hide();
			$('#port_select').hide();
			$('#gangguan_server').hide();
			$('#gangguan_upstream').hide();			
		}
    });
});
</script>
	</script>

</body>

</html>
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
                        <h1 class="h3 mb-0 text-gray-800">Distribusi ODP</h1>
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
                                    <a href="../index.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">HOME</span>
                                    </a>


                    <?php } ?>

                    </div>
                        
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <button class="btn btn-success insertdistribusi">TAMBAH +</button>
                    </div> 



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
							  <h6 class="m-0 font-weight-bold text-primary">Data Instalasi Distribusi Belum Terpasang</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
							
									<th>Layanan</th>

									<th>Nama ODP</th>

									<th>Alamat ODP</th>

									<th>Tanggal Instalasi</th>                  

									<th>Teknisi 1</th>
									
									<th>Teknisi 2</th>

									<th>Status WO</th>

									<th>ACTION</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>NO</th>
							
									<th>Layanan</th>

									<th>Nama ODP</th>

									<th>Alamat ODP</th>

									<th>Tanggal Instalasi</th>                  

									<th>Teknisi 1</th>
									
									<th>Teknisi 2</th>

									<th>Status WO</th>

									<th>ACTION</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT * FROM tbl_distribusi 
							WHERE status_wo='Belum Terpasang' and pic_ikr='".$acces_user_log."' 
							ORDER BY key_odp DESC");
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  $no=1;
						  
						  ?>
						  <tr id=<?php echo $row['key_odp']; ?>">
							<td data-target="key_odp"> <?php echo $row['key_odp'];?></td>
							<td data-target="kd_layanan"> <?php echo $row['kd_layanan'];?></td>
							<td data-target="nama_odp"> <?php echo $row['nama_odp'];?></td>
							<td data-target="alamat_odp"> <?php echo $row['alamat_odp'];?></td>
							<td data-target="tanggal_instalasi"> <?php echo $row['tanggal_instalasi'];?></td>
							<td data-target="pic"> <?php echo $row['pic'];?></td>
							<td data-target="pic2"> <?php echo $row['pic2'];?></td>
							<td data-target="pic2"> <?php echo $row['status_wo'];?></td>
							
							<td> <div class="btn-group">	 
							<button type="button" name="edit" data-id="<?php echo $row['username_fal'];?>"
							key_odp="<?php echo $row['key_odp'];?>"							
							nama_odp="<?php echo $row['nama_odp'];?>"
							class="btn btn-info btn-sm mr-2 editdistribusi">Edit</button>
							
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


					  </br>
					  
					  <!-- Begin Page Content -->
						<div class="container-fluid">

						  <!-- Page Heading 
						  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
						  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
							-->
						  <!-- DataTales Example -->
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Instalasi Distribusi</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna_solved" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>ODP Induk</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Pic ODP</th>
									<th>Kabel</th>
									<th>jenis Kabel</th>                           
									<th>Keterangan</th>
									<th>Teknisi</th>
									<th>Teknisi 2</th>
									<th>Status WO</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>NO</th>
									<th>ODP Induk</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Pic ODP</th>
									<th>Kabel</th>
									<th>jenis Kabel</th>                           
									<th>Keterangan</th>
									<th>Teknisi</th>
									<th>Teknisi 2</th>
									<th>Status WO</th>
									</tr>
								  </tfoot>
								  <tbody>
									
								  </tbody>
								</table>
							  </div>
							</div>
						  </div>

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
	
	<!-- form coporate -->
	
	 <div class="modal fade" id="modalupdatecorporate"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">


                 <div class="modal-body">
                    <form role="form" method="post" id="form_edit_corporate">
					
                   
                    <div class="form-row">
					<div class="form-group col-md-2">
                            <label for="rang">Key ODP</label>
                            <input class="form-control" type="text" id="key_odp" name="key_odp" autocomplete="off"  disabled>
                        </div>
						
					<div class="form-group col-md-2">
                            <label for="rang">Nama User</label>
                            <input class="form-control" type="text" id="nama_odp" name="nama_odp" autocomplete="off"  disabled>
                        </div>
					
					<div class="form-group col-md-2">
                    <label for="rang">Teknisi 1</label>                
                    <select class="form-control" type="text" id="status_distribusi" name="status_distribusi" autocomplete="off" required>
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
                    <select class="form-control" type="text" id="status_distribusi2" name="status_distribusi2" autocomplete="off">
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
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsorcing'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option>                                               
                    </select>
                  </div>       

                  <div class="form-group col-md-4">
                    <label for="rang">Kabel</label>                
                    <input class="form-control" type="number" id="kabel_distribusi" name="kabel_distribusi" placeholder='Meter' autocomplete="off" required>  
                  </div>
				  
					<div class="form-group col-md-4">
                    <label for="rang">Jenis Kabel</label>                
                    <select class="form-control" type="text" id="jenis_kabel_distribusi" name="jenis_kabel_distribusi" autocomplete="off">
                    <option>-</option>
					<option>1 Core</option>
                    <option>4 Core</option>
                    <option>6 Core</option>
                    <option>12 Core</option>
					<option>24 Core</option>
					<option>96 Core</option>
					
                    </select>
                  </div>
				  
				  <div class="form-group col-md-8">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="keterangan_distribusi" name="keterangan_distribusi" placeholder="keterangan" autocomplete="off">
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
                                <span type="text" id="b" name="b" value="">
                                  
                        </div>	
                        <div class="form-group col-md-6" >
							<label for="rang">Tekan Tombool Show Position</label>  
                            <input class="form-control" type="text" id="get_distribusi" name="get_distribusi" autocomplete="off" required>   
                        </div>
				</div>
			  
			 
			  
                <div class="form-row">
               <div class="form-group col-md-6">
                    <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_wo_distribusi" name="status_wo_distribusi" autocomplete="off">
                    <option>Belum Terpasang</option>
                    <option>Sudah Terpasang</option>              
                                                                                     
                    </select>
                  </div>                     
                           
                        <hr>
                        </div>
                            <button type="button" class="btn btn-success  pull-right editdst">Update</button>
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
                <!-- div class="modal-body">
                    <form role="form" method="post" id="formdatapengguna">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="fname">Nama ODP</label>
                                <input class="form-control" type="text" id="nama_odp" name="nama_odp" placeholder="nama..." autocomplete="off" required>
                            </div>                          
                              
                            <div class="form-group col-md-6">
                            <label for="lname">Alamat</label>
                            <input class="form-control" type="text" id="alamat_odp" name="alamat" placeholder="alamat..." autocomplete="off" required>
                        </div>                          
                            
                            <div class="form-group col-md-2">
                                <label for="rang">kantor Cabang</label>                
                    <select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" required>
					<option></option>
                    <option>mlg</option>
                    <option>pas</option>                                   
                    </select>
                            </div> 

                            <div class="form-group col-md-2">
                                <label for="rang">Pic</label>                
                    <select class="form-control" type="text" id="pic_ikr" name="pic_ikr" autocomplete="off" required>
					<option></option>
					<option>yuni</option>
                    <option>rafif</option>
                    <option>wawan</option>
                    <option>fauzi</option>
                    <option>kiki</option>                    
                    <option>ricky</option>
                    <option>lukman</option>
                    <option>fio</option>
                    <option>rino</option>
                    <option>bayu</option>
                    <option>wahyu</option>
                    <option>yusuf</option>                                                      
                    </select>
                            </div> 
                                                  
                                                 
                           
                            <div class="form-group col-md-2">
                                <label for="rang">Kelurahan</label>
                               <input class="form-control" type="text" id="kelurahan" name="kelurahan" placeholder="kelurahan..." autocomplete="off">
                            </div>                                      
                        
                                        
                      <div class="form-group col-md-8">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
                        </div>

                    <div class="form-row">
                         <div class="form-group col-md-2" style="display: none;">
                                <label for="fname">tgl List ODP</label>
                                <input class="form-control" type="text" id="id_odp" name="id_odp" placeholder="tidak usah di isi" autocomplete="off" disabled>
                            </div>

                    
                   <div class="form-group col-md-4">
                    <label for="rang">Teknisi 1</label>                
                    <select class="form-control" type="text" id="status" name="status" autocomplete="off" required>
                    <option>-#-</option>
                    <option>Deddy#Karyawan</option>
                    <option>Yuni#Karyawan</option>
                    <option>Kiki#Karyawan</option>
                    <option>Decky#Karyawan</option>
                    <option>Wawan#Karyawan</option>
                    <option>Roy#Karyawan</option>                    
                    <option>Ricky#Karyawan</option>
                    <option>Rafif#Karyawan</option>
                    <option>Fauzi#Karyawan</option>
                    <option>Lukman#Karyawan</option>
                    <option>Rino#Outsourcing</option>
                    <option>Fio#Outsourcing</option>
                    <option>Sonny#Outsourcing</option>
                    <option>Novan#Outsourcing</option>
                    <option>Faisal#Outsourcing</option>
                    <option>Wahyu#Outsourcing</option>
                    <option>Bayu#Outsourcing</option>
                    <option>Ucup#Outsourcing</option>                                                   
                    </select>
                  </div>

                         <div class="form-group col-md-4">
                    <label for="rang">Teknisi 2</label>                
                    <select class="form-control" type="text" id="status2" name="status2" autocomplete="off">
                    <option>-#-</option>
                    <option>Deddy#Karyawan</option>
                    <option>Yuni#Karyawan</option>
                    <option>Kiki#Karyawan</option>
                    <option>Decky#Karyawan</option>
                    <option>Wawan#Karyawan</option>
                    <option>Roy#Karyawan</option>                    
                    <option>Ricky#Karyawan</option>
                    <option>Rafif#Karyawan</option>
                    <option>Fauzi#Karyawan</option>
                    <option>Lukman#Karyawan</option>
                    <option>Rino#Outsourcing</option>
                    <option>Fio#Outsourcing</option>
                    <option>Sonny#Outsourcing</option>
                    <option>Novan#Outsourcing</option>
                    <option>Faisal#Outsourcing</option>
                    <option>Wahyu#Outsourcing</option>
                    <option>Bayu#Outsourcing</option>
                    <option>Ucup#Outsourcing</option>                                                 
                    </select>
                  </div>                         
                        
                       
                                             
                      
                        <div class="form-group col-md-4">
                    <label for="rang">Spliter 1</label>                
                    <select class="form-control" type="text" id="kabel1" name="kabel1" autocomplete="off" required>
                    <option>-</option>
                    <option>1/4</option>
                    <option>1/8</option>
                    <option>1/16</option>                    
                    </select>
                  </div>
                        <div class="form-group col-md-4">
                    <label for="rang">Spliter 2</label>                
                    <select class="form-control" type="text" id="kabel2" name="kabel2" autocomplete="off">
                    <option>-</option>
                    <option>1/4</option>
                    <option>1/8</option>
                    <option>1/16</option>                    
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="rang">Spliter 3</label>                
                    <select class="form-control" type="text" id="kabel3" name="kabel3" autocomplete="off">
                    <option>-</option>
                    <option>1/4</option>
                    <option>1/8</option>
                    <option>1/16</option>                    
                    </select>
                  </div>       
                   

                            
                           
                        
                        </div>

                        <div class="form-row">
			  </br>
                    <h4>Harap isi Lokasi di bawah ini</h4>
                    </br>

					
			  <div class="form-group col-md-6" >
                            <button class="btn btn-danger pull-right" type="button" onclick="showPosition();">Show Position</button>
                                <span type="text" id="b" name="b" value="">
                                  
                        </div>	
                        <div class="form-group col-md-6" >
							<label for="rang">Tekan Tombool Show Position</label>  
                            <input class="form-control" type="text" id="ba" name="ba" autocomplete="off" required>   
                        </div>
				</div>
				
				<div class="form-group col-md-6">
                    <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_wo" name="status_wo" autocomplete="off">
                    <option>Belum Terpasang</option>
                    <option>Sudah Terpasang</option>              
                                                                                     
                    </select>
                  </div>     
                    
                </div>
                  <hr>
                            <button type="submit" class="btn btn-success  pull-right submitdata" name="action" id="action" value="insert">
								<i class="fa fa-check fa-fw" name="submit" ></i>SAVE</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                 
                        </form>  
            </div -->
			
			<div class="modal-body">
                    <form role="form" method="post" id="formdatapengguna">
					
					<!-- FORM ISIAN DATA ADMIN -->
					
						 <div class="form-row">
							
							<div class="form-row>
						  <label for="odp">ODP Induk</label> <br/>
						<select class="js-example-basic-multiple" id="odp_induk" name="odp_induk" multiple="multiple" style='width: 350px;' required>
						  <option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_odp where kd_layanan='".$kota."'");
											  
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value="'.$data_user['id_odp'].'">'.$data_user['nama_odp'].'</option>';
											  } 
											?>   </option> 
							<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg" ){  ?>
							<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_odp ");
											  
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value="'.$data_user['id_odp'].'">'.$data_user['nama_odp'].'</option>';
											  } 
											?>   </option> 
							<?php } ?>
						</select>
					</div>
						 
                            <div class="form-group col-md-4">
                                <label for="fname">Nama ODP</label>
                                <input class="form-control" type="text" id="nama_odp_insert" name="nama_odp_insert" placeholder="nama..." autocomplete="off" required>
                            </div>                          
                              
                            <div class="form-group col-md-6">
                            <label for="lname">Alamat</label>
                            <input class="form-control" type="text" id="alamat_odp" name="alamat_odp" placeholder="alamat..." autocomplete="off" required>
                        </div>                          
                            
                            <div class="form-group col-md-2">
                                <label for="rang">kantor Cabang</label>                
                    <select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" required>
					<option><?php echo $kota ?></option>
					<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg" ){  ?>
					<option>mlg</option>					
					<option>pas</option>
					<option>batu</option>
					<option>mlg2</option>
					<?php } ?>	
					<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu"){  ?>
					<option>mlg2</option>
					<?php } ?>					
                    </select>
                            </div> 

                            <div class="form-row">
                                <label for="rang">Pic IKR</label>                
									<select class="form-control" type="text" id="pic_ikr" name="pic_ikr" autocomplete="off" >
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
                                                  
                                                 
                           
                            <div class="form-group col-md-2">
                                <label for="rang">Kelurahan</label>
                               <input class="form-control" type="text" id="kelurahan" name="kelurahan" placeholder="kelurahan..." autocomplete="off">
                            </div>                                      
                        
                                        
                      <div class="form-group col-md-8">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
                        </div>

                    <div class="form-row">
                         <div class="form-group col-md-2" style="display: none;">
                                <label for="fname">tgl List ODP</label>
                                <input class="form-control" type="text" id="id_odp" name="id_odp" placeholder="tidak usah di isi" autocomplete="off" disabled>
                            </div>

                    
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
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsorcing'");
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
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and jabatan='teknisi' and status_karyawan='Outsorcing'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'#'.$data_user['status_karyawan'].'</option>';
											  } 
											?>   </option>                                               
                    </select>
                  </div>                        
                        
                       

                        <div class="form-group col-md-4">
                    <label for="rang">Kabel</label>                
                    <input class="form-control" type="number" id="kabel1" name="kabel1" placeholder='Meter' autocomplete="off" required>  
                  </div>
				  
					<div class="form-group col-md-4">
                    <label for="rang">Jenis Kabel</label>                
                    <select class="form-control" type="text" id="jenis_kabel" name="jenis_kabel" autocomplete="off">
                    <option>-</option>
					<option>1 Core</option>
                    <option>4 Core</option>
                    <option>6 Core</option>
                    <option>12 Core</option>
					<option>24 Core</option>
					<option>96 Core</option>
					
                    </select>
                  </div>
                             
                   

                            
                           
                        
                        </div>

                   </div>
			  <div class=form-row">
			  </br>
                    <h4>Harap isi Lokasi di bawah ini</h4>
                    </br>
			  <div class="form-group col-md-6" >
                            <button class="btn btn-danger pull-right" type="button" onclick="showPosition();">Show Position</button>
                                <span type="text" id="b" name="b" value="">
                                  
                        </div>	
                        <div class="form-group col-md-6" >
							<label for="rang">Tekan Tombool Show Position</label>  
                            <input class="form-control" type="text" id="insrt_lokasi" name="insrt_lokasi" autocomplete="off" required>   
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
                            <button type="button" class="btn btn-success  pull-right insertdst">Insert</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>

					
					
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
	<script src="../js/sweetalert2.all.min.js"></script>

   


    <!-- datepicker bootstrap -->

    <script src="../asset/js/bootstrap-datepicker.min.js"></script>
    <script src="../asset/locales/bootstrap-datepicker.id.min.js"></script>

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
                "ordering": true,
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
                "ajax": {
                    "url":"../models/datapengguna_distribusi_solved.php",
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
					{ mData: 'odp_induk'},
                    { mData: 'nama_odp'},
                    { mData: 'alamat_odp'} ,
                    { mData: 'pic_ikr'} ,
					{ mData: 'kabel1'} ,                 
                    { mData: 'jenis_kabel'} ,                  
                    { mData: 'lain_lain'} ,
                    { mData: 'pic'} ,
                    { mData: 'pic2'} ,
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
                    "url":"../models/datapengguna_odp.php",
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
                    { mData: 'nama_odp'},
                    { mData: 'alamat_odp'} ,
                    { mData: 'pic_ikr'} ,                   
                    { mData: 'spliter'} ,                   
                    { mData: 'spliter2'} ,
                    { mData: 'spliter3'} ,
                    { mData: 'lain_lain'} ,
                    { mData: 'jenis_wo'} ,
                    { mData: 'pic'} ,
                    { mData: 'pic2'} ,
                    { mData: 'status_wo'} ,
                    { mData: 'action'} , 
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
                $("#id_odp").attr("disabled",false);
                $('.modal-user').text("Tambah Data");
                $('#action').val('insert');
                $('#actionform').text("Tambah");
            });
            
            $(".submitdata").click(function(){
            // alert("submit data");
           

            var action= $("#action").val();
            var nama_odp = $("#nama_odp").val();
            var pic_ikr = $("#pic_ikr").val();
            var kd_layanan = $("#kd_layanan").val();
            var alamat_odp = $("#alamat_odp").val();
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
			var odp_induk = $("#odp_induk").val();
            var spltr2 = $("#spltr2").val();
            var spltr3 = $("#spltr3").val();
            var kabel1 = $("#kabel1").val();
            var jenis_kabel = $("#jenis_kabel").val();
            var kabel3 = $("#kabel3").val();
            var paket_fal = $("#paket_fal").val();
            var tgl_fal = $("#tgl_fal").val();            
            var id_odp = $("#id_odp").val();
            var password_fal = $("#password_fal").val();
            var lain_lain = $("#lain_lain").val();
            var status_wo = $("#status_wo").val();
            var ket_user = $("#lain_lain").val();
            var k = $("#b").text();
            var sp = $("#sp").text();
            var sp2 = $("#sp2").text();
            var sp3 = $("#sp3").text();
			
			//alert (pic_ikr); return;
			/*
			
			if(nama_odp == '' || alamat == null || pic_ikr == '' || kd_layanan == '' ){
				alert("DATA ANDA TIDAK LENGKAP"); 
				return
			}*/

            //alert ($spliter);

            var value = { action:action, nama_odp:nama_odp, kd_layanan:kd_layanan, pic_ikr:pic_ikr,alamat_odp:alamat_odp, rt:rt,rw:rw,kelurahan:kelurahan,tlp_fal:tlp_fal, pic:pic , status:status, status2:status2, jenis_wo:jenis_wo,produk:produk,modem:modem,odp_induk:odp_induk,spltr2:spltr2,spltr3:spltr3,kabel1:kabel1,jenis_kabel:jenis_kabel,kabel3:kabel3,paket_fal:paket_fal, tgl_fal:tgl_fal, id_odp:id_odp, password_fal:password_fal, status_wo:status_wo,lain_lain:lain_lain, ket:k, sp:sp,sp2:sp2,sp3:sp3, }; 

                $.ajax({
                    type: "POST",
					async: false,
                    url: "../controller/action_distribusi.php",
                    data: value,
                    success: function(data) {
                        $('#tabel_pengguna').DataTable().ajax.reload();
                    }
                });  
            });

            $(document).on('click', '.editpengguna', function(){
                var id = $(this).attr("id");
                $.ajax({
                    url:"../controller/get_data_distribusi.php",
                    method:"POST",
                    data:{id:id},
                    dataType:"JSON",
                    success:function(data)
                    {
                        $('#modaltambahdata').modal('show');
                        $("#id_odp").attr("disabled",true);
                        $('.modal-user').text("Edit Data");
                        $('#action').val('edit');
                        $('#actionform').text("Edit");


                        $("#nama_odp").val(data.nama_odp);
                        $("#pic_ikr").val(data.pic_ikr);
                        $("#kd_layanan").val(data.kd_layanan);
                        $("#alamat_odp").val(data.alamat_odp);
                        $("#rt").val(data.rt);
                        $("#rw").val(data.rw);
                        $("#kelurahan").val(data.kelurahan);
                        $("#tlp_fal").val(data.tlp_fal);
                        $("#tgl_fal").val(data.tgl_fal);
                        $("#pic").val(data.pic);
                        $("#status").val(data.status);
                        $("#jenis_wo").val(data.jenis_wo);
                        $("#produk").val(data.produk);
                        $("#modem").val(data.modem);
                        $("#odp_induk").val(data.odp_induk);
                        $("#spltr2").val(data.spltr2);
                        $("#spltr3").val(data.spltr3);
						$("#kabel1").val(data.kabel1);
                        $("#jenis_kabel").val(data.jenis_kabel);
                        $("#kabel3").val(data.kabel3);
                        $("#status2").val(data.status2);
                        $("#paket_fal").val(data.paket_fal);                      
                        $("#status_wo").val(data.status_wo);
                        $("#id_odp").val(data.id_odp);
                        $("#password_fal").val(data.password_fal);
                        $("#lain_lain").val(data.lain_lain);
                        $("#latitude").val(data.latitude);
                        $("#longitude").val(data.longitude);                    
                        $("#sp").val(data.sp);
                        $("#sp2").val(data.sp2);
                        $("#sp3").val(data.sp3);  
    
                        
                    }
                });
            });
			
			//get data value sinden
		$(document).on('click', '.editdistribusi', function(){
                //alert($(this).data('id'));
				var id = $(this).attr('id');
				var key_odp = $(this).attr('key_odp');
				var nama_odp = $(this).attr('nama_odp');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (key_odp); 
				
				$('#modalupdatecorporate').modal('show');
				$('#nama_odp').val(nama_odp);				
				$('#key_odp').val(key_odp);
				
            });
			
			//get data value sinden
		$(document).on('click', '.insertdistribusi', function(){
             
				$('#modaltambahdata').modal('show');
				
				
            });
			
			// INSERT 			
		$(document).on('click', '.insertdst', function(){
			
            var nama_odp_insert = $("#nama_odp_insert").val();
            var pic_ikr = $("#pic_ikr").val();
            var kd_layanan = $("#kd_layanan").val();
            var alamat_odp = $("#alamat_odp").val();            
            var kelurahan = $("#kelurahan").val();     
            var status = $("#status").val();
            var status2 = $("#status2").val();   
			var odp_induk = $("#odp_induk").val();
            var kabel1 = $("#kabel1").val();
            var jenis_kabel = $("#jenis_kabel").val();
            var lain_lain = $("#lain_lain").val();
            var status_wo = $("#status_wo").val();
            var ket_user = $("#lain_lain").val();
            var get_lokasi = $("#b").text();
			
			//alert(pic_ikr); return;
			 
			if(nama_odp_insert == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'ODP Distribusi Belum Terisi!',				  
				}) 
				return
			} 
			 
			if(nama_odp == '-' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Nama ODP Belum Terisi!',				  
				}) 
				return
			}
			
			if(pic_ikr == '	' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'PIC IKR Belum Terisi!',
				  
				})  
				return
			}
			
			if(status == '	' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'PIC Belum Terisi!',
				  
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
			
			if(kabel1 == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kabel Belum Terisi!',
				  
				})  
				return
			}
			
			if(jenis_kabel == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Jenis Kabel Belum Terisi!',
				  
				})  
				return
			}
			
			if(get_lokasi == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Lokasi Belum Terisi!',
				  
				})  
				return
			}
			 
			 
			 //alert(get_distribusi); return;
			 
			 var value = { nama_odp:nama_odp_insert,
						   pic_ikr:pic_ikr,
						   kd_layanan:kd_layanan, 
						   alamat_odp:alamat_odp, 
						   kelurahan:kelurahan,
						   status:status,
						   status2:status2,
						   odp_induk:odp_induk,
						   kabel1:kabel1,
						   jenis_kabel:jenis_kabel,
						   status_wo:status_wo,
						   lain_lain:lain_lain,
						   get_lokasi:get_lokasi,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_insert_distribusi.php",
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
			
			// EDIT 			
		$(document).on('click', '.editdst', function(){
			//var nama_fal = $("#nama_fal").val();
			 var nama_odp = $('#nama_odp').val();
			 var key_odp = $('#key_odp').val();
			 var status_distribusi = $('#status_distribusi').val();
			 var status_distribusi2 = $('#status_distribusi2').val();
			 var jenis_kabel_distribusi = $('#jenis_kabel_distribusi').val();
			 var kabel_distribusi = $('#kabel_distribusi').val();
			 var get_distribusi = $('#get_distribusi').val();
			 var keterangan_distribusi = $('#keterangan_distribusi').val();
			 var status_wo_distribusi = $('#status_wo_distribusi').val();
			 
			 //alert(status_distribusi); return;
			 
			if(status_distribusi == '-' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'PIC Belum Terisi!',				  
				}) 
				return
			}
			
			if(kabel_distribusi == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kabel Belum Terisi!',
				  
				})  
				return
			}
			
			if(jenis_kabel_distribusi == '-' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Jenis Kabel Belum Terisi!',
				  
				})  
				return
			}
			
			if(get_distribusi == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Lokasi Belum Terisi!',
				  
				})  
				return
			}
			 
			 
			 //alert(get_distribusi); return;
			 
			 var value = { nama_odp:nama_odp,
						   key_odp:key_odp,
						   status_distribusi:status_distribusi, 
						   status_distribusi2:status_distribusi2, 
						   jenis_kabel_distribusi:jenis_kabel_distribusi,
						   kabel_distribusi:kabel_distribusi,
						   get_distribusi:get_distribusi,
						   keterangan_distribusi:keterangan_distribusi,
						   status_wo_distribusi:status_wo_distribusi,						 
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_edit_distribusi.php",
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

    // Set up global variable

    var result;

    

    function showPosition() {   

        // Store the element where the page displays the result

        result = document.getElementById("b");
        lokasi = document.getElementById("insrt_lokasi");
		get_distribusi = document.getElementById("get_distribusi");
        

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
		get_distribusi.value = position.coords.latitude + "#" + position.coords.longitude;
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
        url: "../create_kode_odp.php",
        data: { "value": $("#OLT").val() },
        //dataType:"html",
        type: "post",
        success: function(data){
			//alert(data);
           $('#id_odp').val(data);
        }
    });
});
</script>
</body>

</html>
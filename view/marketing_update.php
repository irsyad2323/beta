<?php

session_start();
$level_user = $_SESSION["level_user"];
$acces_user_log = $_SESSION["username"];
$level_kantor = $_SESSION["kantor"];
$kota = $_SESSION["level_kantor"];
$masuk = $_SESSION["ket_status"];


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

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalstatus">

                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>

                                    Status Pegawai

                                </a>

                                <div class="dropdown-divider"></div> 

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">

                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>

                                    Logout

                                </a>

                            </div>

                        </li>



                    </ul>



                </nav>
				
			
                <!-- End of Topbar -->
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
			<div class="row">
						<!-- Earnings (Monthly) Card Example -->
						<?php include '../cart/wo_mlg.php'; ?>		
			</div>

            <!-- Page Heading -->
            <!--<p class="mb-4">
              DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.
            </p>-->
			
	
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                
                  <!-- button -->
               <?php if ( $_SESSION["level_user"] == "kapten" ){ ?>
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_brosur" data-whatever="@who">WO Tools Marketing</button>
			   <?php } ?>
			    <!-- modal -->
				<div class="modal fade" id="modal_brosur" tabindex="-1" role="dialog" aria-labelledby="modal_brosur" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                         <h5 class="modal-title" id="modal_brosur">Form</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
						  
							<p>Jenis Pekerjaan</br>
                                <select name="jenis_pekerjaan" id='jenis_pekerjaan' class="form-control">
                                    <option value=''></option>
                                    <option value='sebar_brosur'>Sebar Brosur</option>
                                    <option value='pasang_banner'>Pasang Banner</option>
                                    <option value='pasang_spanduk'>Pasang Spanduk</option>
                                    <option value='open_booth'>Open Booth</option>
                                    <option value='Pasang Banner wifi gratis'>Pasang Banner wifi gratis</option>
                                    <option value='Banner 60x160'>Banner 60x160</option>
								</select>
                            </p>
							  
							 <div class="form-group">
							<p>NAMA PIC WO</br>
                                <select name="nama" id='nama' class="form-control">
									
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='Karyawan' and jabatan='teknisi' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'"> '.$data_user['user'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='Outsourcing' and jabatan='teknisi' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['user'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
									?>   </option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='PKL' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['user'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_vendor WHERE status_pegawai='aktiv' and status_karyawan='Vendor' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
								
									
								
                                </select>
                            </p>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Kuantitas</label>
                                <input type="number" class="form-control" name="sebar_brosur" id='sebar_brosur' placeholder="" />
                            </div> 

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nilai Pekerjan (Nominal) &nbsp&nbsp<small class="badge badge-danger">NEW</small></label>
                                <input type="text" class="form-control" name="nominal" id='nominal' placeholder="" />
                            </div> 
							
							<p>Metode Pembayaran <small class="badge badge-danger">NEW</small></br>
                                <select name="metode_bayar" id='metode_bayar' class="form-control">
                                    <option value=''></option>
									  <option value="Transfer_Bank_BCA">Transfer Bank BCA</option>
									  <option value="Transfer_Bank_BRI">Transfer Bank BRI</option>
									  <option value="Transfer_Bank_MANDIRI">Transfer Bank MANDIRI</option>
									  <option value="Transfer_Bank_CMB_NIAGA">Transfer Bank CMB NIAGA</option>
									  <option value="Transfer_Bank">Transfer Bank</option>
									  <option value="Cash">Cash diambil di kantor</option>
								</select>
                            </p>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">No Rekening &nbsp&nbsp<small class="badge badge-danger">NEW</small></label>
                                <input type="number" class="form-control" name="no_rek" id='no_rek' placeholder="" />
                            </div> 
							
							<div class="form-group">
                                <label for="recipient-name" class="col-form-label">atas nama rekening &nbsp&nbsp<small class="badge badge-danger">NEW</small></label>
                                <input type="text" class="form-control" name="ats_rek" id='ats_rek' placeholder="" />
                            </div>  
							
							<div class="form-group">
                                <label for="recipient-name" class="col-form-label">Keterangan Pembayaran &nbsp&nbsp<small class="badge badge-danger">NEW</small></label>
                                <input type="text" class="form-control" name="keterangan" id='keterangan' placeholder="" />
                            </div> 

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Daerah Sebaran</label>
                                <textarea class="form-control" name="ket" id='ket' placeholder=""></textarea>
                            </div> 

                            	<div class="form-group">
                                <label for="rang">Provinsi</label>                
                     <select class="form-control" id="provinsi" name="provinsi" style="width: 100%;">
							<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tb_provinsi WHERE `status`='aktif';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												//echo '<option value="'.$data_user['kd_provinsi'].'">'.$data_user['kd_provinsi'].'</option>';
												echo '<option value="'.$data_user['kd_provinsi'].'">'.$data_user['nama_provinsi'].'</option>';
											  } 
											?>   </option> 					
						
						</select> 
                            </div> 
						
						<div class="form-group">
								<label>Kabupaten / Kota</label>
								<select class="form-control" id="kabupaten" name="kabupaten" style="width: 100%;">                 
								  		 
								</select>
							  </div>
							  
						<div class="form-group">
								<label>Kecamatan</label>
								<select class="form-control" id="kecamatan" name="kecamatan" style="width: 100%;">                 
								  <option value=''>kecamatan not available</option>					 
								</select>
							  </div>
							  
						<div class="form-group">
								<label>Kelurahan</label>
								<select class="form-control" id="kelurahan" name="kelurahan" style="width: 100%;">                 
								  <option value=''>kelurahan not available</option>					 
								</select>
							  </div>
							  
						<div class="form-group" style="display: none;">
								<select class="form-control" id="layanan" name="layanan" style="width: 100%;">                 
								  <option value=''>kelurahan not available</option>					 
								</select>
							  </div>
                            
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary insert_markt">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
				  <!-- end modal --> 
				  </br><hr>
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data</h6>
                </div>
				
				<!-- modal -->
				<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="modal_update" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                         <h5 class="modal-title" id="modal_update">Form Sebar Brosur</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
							<div class="form-group">
                            <p>Jenis Sebaran</br>
                                <select name="jenis_pekerjaan2" id='jenis_pekerjaan2' class="form-control">
                                    <option value=''></option>
                                    <option value='sebar_brosur'>Sebar Brosur</option>
                                    <option value='pasang_banner'>Pasang Banner</option>
                                    <option value='pasang_spanduk'>Pasang Spanduk</option>
                                    <option value='open_booth'>Open Booth</option>
                                    <option value='Pasang Banner wifi gratis'>Pasang Banner wifi gratis</option>
                                    <option value='Banner 60x160'>Banner 60x160</option>
								</select>
                            </p>
							  
							 
							<p>Nama</br>
                                <select name="nama2" id='nama2' class="form-control">
                                    <?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg1" /* && $_SESSION["level_kantor"] != "mlg" */ ){  ?>
								    
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='Karyawan' and jabatan='teknisi' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='Outsourcing' and jabatan='teknisi' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
									?>   </option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='PKL' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_vendor WHERE status_pegawai='aktiv' and status_karyawan='Vendor' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<?php } ?>
									<?php if ( $_SESSION["level_kantor"] != "pas" /* && $_SESSION["level_kantor"] != "batu" */ && $_SESSION["level_kantor"] != "mlg" && $_SESSION["level_kantor"] != "mlg1" ){  ?>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='Karyawan' and jabatan='Karyawan' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='Outsourcing' and jabatan='Karyawan' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='PKL' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<?php } ?>
									<?php if ( /* $_SESSION["level_kantor"] != "pas" && */ $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg" && $_SESSION["level_kantor"] != "mlg1" ){  ?>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='Karyawan' and jabatan='Karyawan' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='Outsourcing' and jabatan='Karyawan' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='PKL' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<?php } ?>
									<?php if ( $_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg" ){  ?>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='Karyawan' and jabatan='Karyawan' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='Outsourcing' and jabatan='Karyawan' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE status_pegawai='aktiv' and status_karyawan='PKL' and kantor_cabang = '".$kota."';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['user'].'|'.$data_user['status_karyawan'].'">'.$data_user['nama_panggilan'].'|'.$data_user['status_karyawan'].' </option>';
											  } 
											?>   </option>
									<?php } ?>
                                </select>
                            </p>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Total Sebar Brosur</label>
                                <input type="number" class="form-control" name="jumlah_brosur2" id='jumlah_brosur2' placeholder="" />
                            </div>  

                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" id='id' placeholder="" />
                            </div>      
                            
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary update_markt">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
				  <!-- end modal --> 
				  </br><hr>
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data</h6>
                </div>
				
				
				<!-- modal -->
				<div class="modal fade" id="modal_verified" tabindex="-1" role="dialog" aria-labelledby="modal_update" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                         <h5 class="modal-title" id="modal_update">Form Sebar Brosur</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form>
							<div class="form-group">
                            <p>Verified</br>
                                <select name="verified" id='verified' class="form-control">
                                    <option value=''></option>
                                    <option value='approve'>approve</option>
                                    <option value='not-approve'>Not-approve</option>
								</select>
                            </p>
							
							<div class="form-group">
                                <label for="recipient-name" class="col-form-label">Total Diskon</label>
                                <input type="text" class="form-control" name="diskon" id='diskon' placeholder="" />
                            </div>  
							
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_verified" id='id_verified' placeholder="" />
                            </div>   
							
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="jenis_pekerjaan1" id='jenis_pekerjaan1' placeholder="" />
                            </div>   
							
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="jumlah1" id='jumlah1' placeholder="" />
                            </div>   
							
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="tgl_solved1" id='tgl_solved1' placeholder="" />
                            </div>   
							
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="layanan1" id='layanan1' placeholder="" />
                            </div>    
							
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="ket_daerah1" id='ket_daerah1' placeholder="" />
                            </div>    
							
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="nama1" id='nama1' placeholder="" />
                            </div>   
							
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="level1" id='level1' placeholder="" />
                            </div>      
                            
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary verifiedsave">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
				  <!-- end modal --> 
				  </br><hr>
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Data</h6>
                </div>
				
				<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data WO Belum Terpasang</h6>
							</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="tabel_pengguna" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Jenis Pekerjaan</th>
                        <th>Tanggal Submit</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kota</th>
                        <th>Jumlah Brosur</th>
						<th>Status</th>
						<th>Keterangan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="table">
                    <?php 
					  include('../controller/controller_mysqli.php');
					  // $acces_user_log = $_SESSION["username"];
					  $table = mysqli_query($koneksi,"SELECT b.nama_provinsi, c.nama_kabkota, d.nama_kec, e.nama_kel ,a.*, DATE_FORMAT(a.tgl_pekerjaan,'%d-%m-%Y') as waktu FROM tbl_marketing a
																		LEFT JOIN tb_provinsi b
																		on a.prov = b.kd_provinsi
																		LEFT JOIN tb_kabkota c
																		on a.kab = c.kd_kabkota
																		LEFT JOIN tb_kecamatan d
																		on a.kec = d.kd_kec
																		LEFT JOIN tb_kelurahan e
																		on a.kel =  e.kd_kel
																		WHERE a.status='belum' and a.kab = d.kd_kabkota AND d.kd_kec = e.kd_kec and c.kd_kabkota = e.kd_kabkota and a.layanan like '".$kota."' GROUP BY a.id DESC;");
                      if ($table === FALSE) {
                        die(mysqli_error($koneksi));
                      }
                     /* $data = mysqli_fetch_assoc($table);
                      return $data; */
					  $i=1;
                      while ($row = mysqli_fetch_assoc($table)){ 
										  
										  
										 
										if($row['status'] == 'sudah'){
											$row['type_status'] = '<small class="badge badge-success">'. strtoupper($row['status']).'</small>';
											}elseif($row['status'] == 'belum'){
												$row['type_status'] = '<small class="badge badge-danger">'. strtoupper($row['status']).'</small>';
											}else{
												$row['type_status'] = $data[$i]['status'];
											} 
											
										if($row['jenis_pekerjaan'] == 'pasang_spanduk'){
											$row['jns_pkrjan'] = '<small class="badge badge-dark">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'sebar_brosur'){
												$row['jns_pkrjan'] = '<small class="badge badge-light text-dark">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'pasang_banner'){
												$row['jns_pkrjan'] = '<small class="badge badge-info">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'open_booth'){
												$row['jns_pkrjan'] = '<small class="badge badge-success">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'banner_60x160'){
												$row['jns_pkrjan'] = '<small class="badge badge-secondary">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'pasang_banner_wifi_gratis'){
												$row['jns_pkrjan'] = '<small class="badge badge-primary">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}else{
												$row['type_status'] = $data[$i]['status'];
											}  
											
											/* if($row['jenis_pekerjaan'] == 'sebar_brosur'){
												if($row['level'] == 'Karyawan'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}if($row['level'] == 'Outsourcing'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'pkl'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 300);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'vendor'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 300);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}elseif($row['jenis_pekerjaan'] == 'pasang_banner'){
												if($row['level'] == 'Karyawan'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}if($row['level'] == 'Outsourcing'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'pkl'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 5000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'vendor'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 5000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}elseif($row['jenis_pekerjaan'] == 'pasang_spanduk'){
												if($row['level'] == 'Karyawan'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}if($row['level'] == 'Outsourcing'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'pkl'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 50000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'vendor'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 50000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}elseif($row['jenis_pekerjaan'] == 'Pasang Banner wifi gratis'){
												if($row['level'] == 'Karyawan'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}if($row['level'] == 'Outsourcing'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'pkl'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 20000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'vendor'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 20000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}elseif($row['jenis_pekerjaan'] == 'Banner 60x160'){
												if($row['level'] == 'Karyawan'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}if($row['level'] == 'Outsourcing'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'pkl'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 50000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'vendor'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 50000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											} */
											
											
										  ?>
										  <tr id="<?php echo $row['id']; ?>">
											<td data-target="urutan"> <?php echo $i;?></td>
											<td data-target="nama"> <?php echo $row['nama'];?></td>
                                            <td data-target="level"> <?php echo $row['level'];?></td>
                                            <td data-target="jns_pkrjan"> <?php echo $row['jns_pkrjan'];?></td>
                                            <td data-target="waktu"> <?php echo $row['waktu'];?></td>
                                            <td data-target="nama_kel"> <?php echo $row['nama_kel'];?></td>
                                            <td data-target="nama_kec"> <?php echo $row['nama_kec'];?></td>
                                            <td data-target="nama_kabkota"> <?php echo $row['nama_kabkota'];?></td>
                                            <td data-target="jumlah"> <?php echo $row['jumlah'];?></td>
                                            <td data-target="type_status"> <?php echo $row['type_status'];?></td>
                                            <td data-target="ket_daerah"> <?php echo $row['ket_daerah'];?></td>
											
                                           
                                            
                                            <td> <div class="btn-group">	 
                                              <button type="button" name="edit" data-id="<?php echo $row['id'];?>"
                                              id="<?php echo $row['id'];?>"
                                              nama="<?php echo $row['nama'];?>"
                                              jenis_pekerjaan="<?php echo $row['jenis_pekerjaan'];?>"
                                              jumlah="<?php echo $row['jumlah'];?>"
                                              class="btn btn-info btn-sm mr-2 edit">Save</button>

                                              <button type="button" name="delete" data-id="<?php echo $row['id'];?>"
                                              id="<?php echo $row['id'];?>"			
                                              class="btn btn-danger btn-sm mr-2 hapusdata">Delete</button>
                                              
                                            </div></td>

										</div></td>
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
		  <?php if($_SESSION["marketing"] == 'y'){ ?>
		  	<!-- Begin Page Content -->
						<div class="container-fluid">
						  <div class="card shadow mb-4">
							 <div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data WO Sudah Terpasang</h6>
							</div>
			  <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="tabel_sudah" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Jenis Pekerjaan</th>
                        <th>Tanggal Submit</th>
                        <th>Kelurahan</th>
                        <th>Kecamatan</th>
                        <th>Kota</th>
                        <th>Jumlah Brosur</th>
                        <th>Nominal</th>
                        <th>Diskon</th>
						<th>Metode Pembayaran</th>
						<th>No Rekening</th>
						<th>Keterangan</th>
						<th>Status</th>
						<th>Daerah Sebaran</th>
						<th>Tanggal Solved</th>
						<th>Aproval</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="table">
                    <?php 
					  include('../controller/controller_mysqli.php');
					  // $acces_user_log = $_SESSION["username"];
					  $table = mysqli_query($koneksi,"SELECT b.nama_provinsi, c.nama_kabkota, d.nama_kec, e.nama_kel ,a.*, DATE_FORMAT(a.tgl_pekerjaan,'%d-%m-%Y') as waktu, DATE_FORMAT(a.tgl_solved,'%d-%m-%Y') as solvedtgl FROM tbl_marketing a
																		LEFT JOIN tb_provinsi b
																		on a.prov = b.kd_provinsi
																		LEFT JOIN tb_kabkota c
																		on a.kab = c.kd_kabkota
																		LEFT JOIN tb_kecamatan d
																		on a.kec = d.kd_kec
																		LEFT JOIN tb_kelurahan e
																		on a.kel =  e.kd_kel
																		WHERE a.status='Sudah' and a.kab = d.kd_kabkota AND d.kd_kec = e.kd_kec and c.kd_kabkota = e.kd_kabkota and a.layanan like '".$kota."' GROUP BY a.id DESC;");
                      if ($table === FALSE) {
                        die(mysqli_error($koneksi));
                      }
                     /* $data = mysqli_fetch_assoc($table);
                      return $data; */
					  $i=1;
                      while ($row = mysqli_fetch_assoc($table)){ 
										  
										  
										 
										if($row['status'] == 'sudah'){
											$row['type_status'] = '<small class="badge badge-success">'. strtoupper($row['status']).'</small>';
											}elseif($row['status'] == 'belum'){
												$row['type_status'] = '<small class="badge badge-danger">'. strtoupper($row['status']).'</small>';
											}else{
												$row['type_status'] = $data[$i]['status'];
											} 
											
										if($row['verified'] == 'approve'){
											$row['type_verified'] = '<small class="badge badge-success">'. strtoupper($row['verified']).'</small>';
											}elseif($row['verified'] == 'not-approve'){
												$row['type_verified'] = '<small class="badge badge-danger">'. strtoupper($row['verified']).'</small>';
											}else{
												$row['type_verified'] = $data[$i]['verified'];
											} 
											
										if($row['jenis_pekerjaan'] == 'pasang_spanduk'){
											$row['jns_pkrjan'] = '<small class="badge badge-dark">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'sebar_brosur'){
												$row['jns_pkrjan'] = '<small class="badge badge-light text-dark">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'pasang_banner'){
												$row['jns_pkrjan'] = '<small class="badge badge-info">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'open_booth'){
												$row['jns_pkrjan'] = '<small class="badge badge-success">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'banner_60x160'){
												$row['jns_pkrjan'] = '<small class="badge badge-secondary">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}elseif($row['jenis_pekerjaan'] == 'pasang_banner_wifi_gratis'){
												$row['jns_pkrjan'] = '<small class="badge badge-primary">'. strtoupper($row['jenis_pekerjaan']).'</small>';
											}else{
												$row['type_status'] = $data[$i]['status'];
											}  
											
											/* if($row['jenis_pekerjaan'] == 'sebar_brosur'){
												if($row['level'] == 'Karyawan'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'Outsourcing'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 300);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'PKL'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'Vendor'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 300);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}elseif($row['jenis_pekerjaan'] == 'pasang_banner'){
												if($row['level'] == 'Karyawan'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'Outsourcing'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 5000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'PKL'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'Vendor'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 5000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}elseif($row['jenis_pekerjaan'] == 'pasang_spanduk'){
												if($row['level'] == 'Karyawan'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'Outsourcing'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 50000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'PKL'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'Vendor'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 50000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											}elseif($row['jenis_pekerjaan'] == 'open_booth'){
												if($row['level'] == 'Karyawan'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'Outsourcing'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 70000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'PKL'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 0);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}elseif($row['level'] == 'Vendor'){
													$jumlah2  =$row['jumlah'];
													$total = ($jumlah2 * 70000);
													$hasil = "Rp " . number_format($total,2,',','.');
													$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
												}
											} */
											
											$format  =$row['nominal'];
											$hasil = "Rp " . number_format($format,2,',','.');
											$ttl = '<small class="badge badge-success">'. strtoupper($hasil).'</small>';
											
											$format_disk  =$row['diskon'];
											$hasil_disk = "Rp " . number_format($format_disk,2,',','.');
											$ttl_disk = '<small class="badge badge-success">'. strtoupper($hasil_disk).'</small>';
											
											
										  ?>
										  <tr id="<?php echo $row['id']; ?>">
											<td data-target="urutan"> <?php echo $i;?></td>
											<td data-target="nama"> <?php echo $row['nama'];?></td>
                                            <td data-target="level"> <?php echo $row['level'];?></td>
                                            <td data-target="jns_pkrjan"> <?php echo $row['jns_pkrjan'];?></td>
                                            <td data-target="waktu"> <?php echo $row['waktu'];?></td>
                                            <td data-target="nama_kel"> <?php echo $row['nama_kel'];?></td>
                                            <td data-target="nama_kec"> <?php echo $row['nama_kec'];?></td>
                                            <td data-target="nama_kabkota"> <?php echo $row['nama_kabkota'];?></td>
                                            <td data-target="jumlah"> <?php echo $row['jumlah'];?></td>
                                            <td data-target="ttl"> <?php echo $ttl;?></td>
											<td data-target="ttl_disk"> <?php echo $ttl_disk;?></td>
											<td data-target="metode_bayar"> <?php echo $row['metode_bayar'];?></td>
											<td data-target="no_rek"> <?php echo $row['no_rek'];?></td>
											<td data-target="keterangan"> <?php echo $row['keterangan'];?></td>
                                            <td data-target="type_status"> <?php echo $row['type_status'];?></td>
                                            <td data-target="ket_daerah"> <?php echo $row['ket_daerah'];?></td>
                                            <td data-target="solvedtgl"> <?php echo $row['solvedtgl'];?></td>
                                            <td data-target="type_verified"> <?php echo $row['type_verified'];?></td>
											
                                           
                                            
                                            <td> <div class="btn-group">	 
                                              <button type="button" name="edit" data-id="<?php echo $row['id'];?>"
                                              id="<?php echo $row['id'];?>"
                                              nama="<?php echo $row['nama'];?>"
                                              jenis_pekerjaan="<?php echo $row['jenis_pekerjaan'];?>"
                                              jumlah="<?php echo $row['jumlah'];?>"
                                              verified="<?php echo $row['verified'];?>"
                                              tgl_solved="<?php echo $row['tgl_solved'];?>"
                                              layanan="<?php echo $row['layanan'];?>"
                                              ket_daerah="<?php echo $row['ket_daerah'];?>"
                                              level="<?php echo $row['level'];?>"
                                              class="btn btn-info btn-sm mr-2 editverified">Edit</button>

                                              <!-- button type="button" name="delete" data-id="<?php echo $row['id'];?>"
                                              id="<?php echo $row['id'];?>"			
                                              class="btn btn-danger btn-sm mr-2 hapusdata">Delete</button -->
                                              
                                            </div></td>

										</div></td>
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
		  <?php } ?>
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2020</span>
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
	
	<!-- Logout Modal-->

    <div class="modal fade" id="modalstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

        aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Status Pegawai?</h5>

                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">×</span>

                    </button>

                </div>
				
					<div class="modal-body">
                          <form>
							
							<div class="row">
								<label>Status</label>
								<select class="form-control" type="text" name="status_pkr" id="status_pkr">
									<option value=""></option>
									<option value="libur">Libur</option>
									<option value="Masuk">Masuk</option>
								</select>
							</div>
                            
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" id="submit" class="btn btn-primary update_status">Save</button>
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
			
			var table = $('#tabel_sudah').DataTable({

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
            });
	</script>
	<script>
    var result;
    function showPosition() {   

        // Store the element where the page displays the result

        result = document.getElementById("get_sinden");
        lokasi = document.getElementById("get_lokasi");
	
        

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
	
	$('#provinsi').on('change', function(){
		//var a = $('.js-example-basic-multiple').val();
		var prov = $(this).val();
		alert(prov);
		if(prov){
			$.ajax({
				type:'POST',
				url : "control/show_kabupaten.php",
				data:'prov_id='+prov,
					success:function(html){
						//alert(html);
						$('#kabupaten').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
			}); 
		}else{
			$('#provinsi').html('<option value="">Select Provinsi dulu</option>');
			//$('#city').html('<option value="">Select state first</option>'); 
		}
    });		
	
		//add kec
	$('#kabupaten').on('change', function(){
		var kab = $(this).val();
		//alert(kab);
		if(kab){
			$.ajax({
				type:'POST',
				url : "control/show_kecamatan.php",
				data:'kab_id='+kab,
					success:function(html){
						$('#kecamatan').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
			}); 
		}else{
			$('#kecamatan').html('<option value="">Select kecamatan dulu</option>');
			//$('#city').html('<option value="">Select state first</option>'); 
		}
	});
	
	//add kel
	$('#kecamatan').on('change', function(){
		var kec = $(this).val();
		//alert(kec);
		if(kec){
			$.ajax({
				type:'POST',
				url : "control/show_kelurahan.php",
				data:'kec_id='+kec,
					success:function(html){
						$('#kelurahan').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
			}); 
		}else{
			$('#kelurahan').html('<option value="">Select kelurahan dulu</option>');
			//$('#city').html('<option value="">Select state first</option>'); 
		}
	});
	
	//add kel
	$('#kelurahan').on('change', function(){
		var kelurahan = $(this).val();
		//alert (kelurahan); return;
		 var result = kelurahan.split("|");
		 var result2 = kelurahan.split("|");
		 var result3 = kelurahan.split("|");
			kab = result[result.length - 2];
			kec = result2[result2.length - 1];
			kel = result3[result3.length - 3];
			
			 var value = {  
						  kab:kab,
						  kec:kec,
						  kel:kel,
						  }; 
		
		//alert(kel); return;
		
		if(kelurahan){
			$.ajax({
				type:'POST',
				url : "control/show_layanan.php",
				data: value,
					success:function(html){
						//alert (html); return;
						$('#layanan').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
			}); 
		}else{
//$('#kelurahan').html('<option value="">Select kelurahan dulu</option>');
			//$('#city').html('<option value="">Select state first</option>'); 
		}
	});
	
// In your Javascript (external .js resource or <script> tag)
/* $(document).ready(function() {
    $('.js-example-basic-single').select2();
}); */
	</script>

    <script> 
    
    //UPDATE
    $(document).ready(function() {
						  
    //get data value sinden
    $(document).on('click', '.edit', function(){

        
    var id = $(this).attr('id');
    var nama2 = $(this).attr('nama');
    var jenis_pekerjaan2 = $(this).attr('jenis_pekerjaan');
    var jumlah_brosur2 = $(this).attr('jumlah');
        
        //alert(nama2);
        
        
        $('#modal_update').modal('show');
        $('#id').val(id);
        $('#nama2').val(nama2);
        $('#jenis_pekerjaan2').val(jenis_pekerjaan2);
        $('#jumlah_brosur2').val(jumlah_brosur2);
      });              
	  
	//get data value sinden
    $(document).on('click', '.editverified', function(){

        
        var id = $(this).attr('id');
        var verified = $(this).attr('verified');
        var jenis_pekerjaan = $(this).attr('jenis_pekerjaan');
        var jumlah = $(this).attr('jumlah');
        var tgl_solved = $(this).attr('tgl_solved');
        var layanan = $(this).attr('layanan');
        var ket_daerah = $(this).attr('ket_daerah');
        var nama = $(this).attr('nama');
        var level = $(this).attr('level');
              
        //alert(verified);
        
        $('#modal_verified').modal('show');
        $('#id_verified').val(id);
        $('#verified').val(verified);
        $('#jenis_pekerjaan1').val(jenis_pekerjaan);
        $('#jumlah1').val(jumlah);
        $('#tgl_solved1').val(tgl_solved);
        $('#layanan1').val(layanan);
        $('#ket_daerah1').val(ket_daerah);
        $('#nama1').val(nama);
        $('#level1').val(level);
        
      });
    });

    $(".update_markt").click(function() {

          var id = $("#id").val();
          var nama2 = $("#nama2").val();
          var jenis_pekerjaan2 = $("#jenis_pekerjaan2").val();
          var jumlah_brosur2 = $("#jumlah_brosur2").val();
          
          //alert (nama2); return;
          $.ajax({
            type: "POST",
            url: "../controller/update_marketing.php",
            data: {
                id: id,
                nama: nama2,
                jenis_pekerjaan: jenis_pekerjaan2,
                jumlah_brosur: jumlah_brosur2,
                
            },
            cache: false,
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
	
	$(".verifiedsave").click(function() {

          var nama = $("#nama1").val();
          var id_verified = $("#id_verified").val();
          var verified = $("#verified").val();
          var diskon = $("#diskon").val();
          var jenis_pekerjaan = $("#jenis_pekerjaan1").val();
          var jumlah = $("#jumlah1").val();
          var tgl_solved = $("#tgl_solved1").val();
          var layanan = $("#layanan1").val();
          var ket_daerah = $("#ket_daerah1").val();
          var level = $("#level1").val();
          
          
          //alert (level); return;
          $.ajax({
            type: "POST",
            url: "../controller/update_marketing_verified.php",
            data: {
                id_verified: id_verified,
                verified: verified,                
                diskon: diskon,                
                jenis_pekerjaan: jenis_pekerjaan,                
                jumlah: jumlah,                
                tgl_solved: tgl_solved,                
                layanan: layanan,                
                ket_daerah: ket_daerah,                
                nama: nama,                
                level: level,                
            },
            cache: false,
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
		$(document).on('click', '.insert_markt', function(){

          var jenis_pekerjaan = $("#jenis_pekerjaan").val();
          var nama = $("#nama").val();
          var sebar_brosur = $("#sebar_brosur").val();
          //var tanggal = $("#tgl_pekerjaan").val();
          var provinsi = $("#provinsi").val();
          var kabupaten = $("#kabupaten").val();
          var kecamatan = $("#kecamatan").val();
          var kelurahan = $("#kelurahan").val();
          var level = $("#level").val();
          var ket = $("#ket").val();
          var layanan = $("#layanan").val();
          var nominal = $("#nominal").val();
          var metode_bayar = $("#metode_bayar").val();
          var keterangan = $("#keterangan").val();
          var no_rek = $("#no_rek").val();
          var ats_rek = $("#ats_rek").val();
		
		//alert(nominal); return;
			
        if(nama==''||sebar_brosur==''||provinsi==''||kabupaten==''||kecamatan==''||kelurahan=='') {
            alert("Please fill all fields.");
            return false;
        }
       
        $.ajax({
            type: "POST",
            url: "../controller/insert_marketing.php",
            data: {
                jenis_pekerjaan: jenis_pekerjaan,
                nama: nama,
                sebar_brosur: sebar_brosur,
                //tanggal: tanggal,
                provinsi: provinsi,
                kabupaten: kabupaten,
                kecamatan: kecamatan,
                kelurahan: kelurahan,
                level: level,
                ket: ket,
                layanan: layanan,
                nominal: nominal,
                metode_bayar: metode_bayar,
                keterangan: keterangan,
                no_rek: no_rek,
                ats_rek: ats_rek,
            },
            cache: false,
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
		$(document).on('click', '.insert_spanduk', function(){
 
        $("#submit").click(function() {

          var nama = $("#nama").val();
          var jobs = $("#jenis_pekerjaan").val();
          //var tanggal = $("#tgl_pekerjaan").val();
          var daerah = $("#daerah").val();
          var daerah2 = $("#daerah2").val();
          var daerah3 = $("#daerah3").val();
          var daerah4 = $("#daerah4").val();
          var daerah5 = $("#daerah5").val();
          var kelurahan = $("#kelurahan").val();
          var kota = $("#kota").val();
          var jumlah_brosur = $("#jumlah_brosur").val();
          var respon_wa = $("#respon_wa").val();
          var fal = $("#fal").val();
		  
		  alert(nama); return;
			
		  
		  
        if(nama==''||jobs==''||tanggal=='') {
            alert("Please fill all fields.");
            return false;
        }
       
        $.ajax({
            type: "POST",
            url: "../controller/insert_marketing.php",
            data: {
                nama: nama,
                jobs: jobs,
                //tanggal: tanggal,
                daerah: daerah,
                daerah2: daerah2,
                daerah3: daerah3,
                daerah4: daerah4,
                daerah5: daerah5,
                kelurahan: kelurahan,
                kota: kota,
                jumlah_brosur: jumlah_brosur,
                respon_wa: respon_wa,
                fal: fal,
            },
            cache: false,
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

    $(document).on('click', '.hapusdata', function(){

                var id = $(this).attr("id");
				
				//alert (id); return;

                if(confirm('Hapus id '+id+'?'))
                {
                    $.ajax({
                        url:"../controller/delete_marketing.php",
                        method:"POST",
                        data:{id:id},
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
    
	 /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('nominal');
    var tanpa_rupiah_diskon = document.getElementById('diskon');
    tanpa_rupiah.addEventListener('keyup', function(e)
    {
        tanpa_rupiah.value = formatRupiah(this.value);
        tanpa_rupiah_diskon.value = formatRupiah(this.value);
    });
    
    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    
    </script>
  </body>
</html>
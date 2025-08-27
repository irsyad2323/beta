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
	
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="../asset/plugins/iCheck/all.css">


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



                <!-- Begin Page Content -->

                <div class="container-fluid">



                    <!-- Page Heading -->

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">

                        <h1 class="h3 mb-0 text-gray-800">Instalasi Tiang <?php //echo $_SESSION["level_user"]; ?></h1>

                     

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
							  <h6 class="m-0 font-weight-bold text-primary">Data Instalasi Belum Terpasang</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
									<div class="d-sm-flex align-items-center justify-content-between mb-4">
										<button class="btn btn-success insertkptn">Tambah Data Tiang</button>
									</div>
								<table class="table table-bordered" id="tabel_pengguna" width="100%" cellspacing="0">
								  <thead>
									<tr>
									  <th>NO</th>
									  <th>KEY</th>
									  <th>ID TIANG</th>
									  <th>NAMA TIANG</th>
									  <th>ALAMAT</th>							
									  <th>KETERANGAN</th>
									  <th>PIC</th>
									  <th>STATUS</th>
									  <th>MAPS</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									  <th>NO</th>
									  <th>KEY</th>
									  <th>ID TIANG</th>
									  <th>NAMA TIANG</th>
									  <th>ALAMAT</th>							
									  <th>KETERANGAN</th>
									  <th>PIC</th>
									  <th>STATUS</th>
									  <th>MAPS</th>
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
						
						<!-- Begin Page Content -->
						<div class="container-fluid">

						  <!-- Page Heading 
						  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
						  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
							-->
						  <!-- DataTales Example -->
						  <div class="card shadow mb-4">
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary">Data Sudah Terpasang</h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_solved" width="100%" cellspacing="0">
								  <thead>
									<tr>
									  <th></th>
									  <th>NO</th>
									  <th>KEY</th>
									  <th>ID TIANG</th>
									  <th>NAMA TIANG</th>
									  <th>ALAMAT</th>							
									  <th>KETERANGAN</th>
									  <th>PIC</th>
									  <th>STATUS</th>
									  <th>MAPS</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									  <th></th>
									  <th>NO</th>
									  <th>KEY</th>
									  <th>ID TIANG</th>
									  <th>NAMA TIANG</th>
									  <th>ALAMAT</th>							
									  <th>KETERANGAN</th>
									  <th>PIC</th>
									  <th>STATUS</th>
									  <th>MAPS</th>
									</tr>
								  </tfoot>
								  <tbody> 
								
								  </tbody>									
								</table>
								
								<div class="d-sm-flex align-items-center justify-content-between mb-4">
									<button type="submit" id="set" name="set" class="btn btn-success margin pull-right">Cetak Tagihan</button>
								</div>
								
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
                                <label for="rang">ID TIANG</label>                
									<select class="form-control" type="text" id="id_tiang" name="id_tiang" autocomplete="off" >
									 <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT a.id_tiang + 1 as id FROM tbl_instalasi_tiang a ORDER BY a.id_tiang DESC LIMIT 0,1");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												//echo '<option value="'.$data_user['kd_provinsi'].'">'.$data_user['kd_provinsi'].'</option>';
												echo '<option value="'.$data_user['id'].'">'.$data_user['id'].'</option>';
											  } 
											?>   
									                      
									</select>
                            </div>
						<br/>
						
							
                            <div class="form-row">
                                <label for="fname">Nama</label>
                                <input class="form-control" type="text" id="nama_tiang" name="nama_tiang" placeholder="nama..." >
                            </div>
						<br/>				
					

                            <div class="form-row">
                                <label for="rang">kantor Cabang</label>                
								<select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" required>								
								<option></option>					
								<option value='mlg'>NARATEL</option>					
								<option value='pas'>SBM</option>
								<option value='batu'>JALIBAR</option>
								<option value='mlg1'>JALANTRA</option>								
								</select>
                            </div> 
						<br/>
						
                            <div class="form-row">
                                <label for="rang">PIC Vendor</label>                
									<select class="form-control" type="text" id="pic_vendor" name="pic_vendor" autocomplete="off" >
									 <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tb_vendor WHERE status_aktif='y';");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												//echo '<option value="'.$data_user['kd_provinsi'].'">'.$data_user['kd_provinsi'].'</option>';
												echo '<option value="'.$data_user['user_key'].'">'.$data_user['user_key'].'</option>';
											  } 
											?>   
									                      
									</select>
                            </div>
						<br/>
                                                 
                            <div class="form-row">
								<label for="lname">Alamat</label>
								<input class="form-control" type="text" id="alamat" name="alamat" placeholder="alamat..." autocomplete="off" >
							</div>
						<br/>				
                     
							<div class="form-group col-md-2">
                                <label for="rang">Provinsi</label>                
                     <select class='js-example-basic-multiple' id="provinsi" name="provinsi" multiple="multiple" style='width: 400px;' >
							<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tb_provinsi where status='aktif'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												//echo '<option value="'.$data_user['kd_provinsi'].'">'.$data_user['kd_provinsi'].'</option>';
												echo '<option value="'.$data_user['kd_provinsi'].'">'.$data_user['nama_provinsi'].'</option>';
											  } 
											?>   </option> 					
						
						</select> &nbsp
                            </div> 
						
						
						<div class="form-group">
								<label>Kabupaten / Kota</label>
								<select class="form-control" id="kabupaten" name="kabupaten" style="width: 100%;">                 
								<option value=''>Kabupaten not available</option>  		 
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
                        
						  <div class="form-row">
                                <label for="rang">RT</label>
                               <input class="form-control" type="number" id="rt" name="rt" placeholder="rt..." autocomplete="off" >
                            </div>
						<br/>
							
                            <div class="form-row">
                                <label for="rang">RW</label>
                               <input class="form-control" type="number" id="rw" name="rw" placeholder="rw..." autocomplete="off" >
                            </div>
						<br/>              						

							<div class="form-row">
								<label for="rang">Keterangan</label>
								<input class="form-control" type="text" id="keterangan" name="keterangan" placeholder="keterangan" autocomplete="off">
							</div>
						<br/>
					
						 <div class="form-row">
					</br>
                    <h4>Harap isi Lokasi di bawah ini</h4>
                    </br>
			  <div class="form-group col-md-6" >
                            <button class="btn btn-danger pull-right" type="button" onclick="showPosition();">Show Position</button>
                                <span type="text" id="b" name="b" value="">
                                  
                        </div>	
				</div>
				
				<div class="form-row">
				
							<label for="rang">Tekan Tombool Show Position</label>  
                            <input class="form-control" type="text" id="ba" name="ba" autocomplete="off" required>   
                        
				</div>
			  
				</br>                          
                        <hr>
                        
                            <button type="button" class="btn btn-success  pull-right actionkapten">Insert</button>
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
	
	<div class="modal fade" id="modalverifikasi"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

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
							
								<input class="form-control" type="hidden" id="id_tiang2" name="id_tiang2" placeholder="keterangan" autocomplete="off">
						</div>

						<div class="form-row">
							<label for="rang">Verifikasi</label> 
							<select class="form-control" type="number" id="verifikasi" name="verifikasi" autocomplete="off">
							<option value=""></option>
							<option value="Sudah Dikerjakan">Verifikasi</option>											
							</select>
						</div>
					<br/>
							
						<hr>
                            <button type="button" class="btn btn-success  pull-right actionverifikasi">edit</button>
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
	
	<div class="modal fade" id="modal_set_blasting" role="dialog">
  <div class="modal-dialog">
	<div class="modal-content">	 
	<div class="modal-body">		
	  <div class="box-header with-border">
            <h3 class="box-title">Insert Info Blasting</h3>
      </div>	
		<div class="form-row">
			<input class="form-control" type="text" name="all_id" id="all_id" readonly>
		</div>
		 <div class="form-row">
                                <label for="rang">Yang Menerima</label>                
								<select class="form-control" type="text" id="pihak1" name="pihak1" autocomplete="off" required>								
								<option></option>					
								<option value='Kiki Rekananda'>KIKI REKANANDA</option>					
								<option value='DEDDY YUSTIAN'>DEDDY YUSTIAN</option>				
								<option value='FERDY FAUZI'>FERDY FAUZI</option>																	
								</select>
                            </div> 
		<div class="form-row">
                                <label for="rang">Yang Menyerahkan</label>                
								<select class="form-control" type="text" id="pihak2" name="pihak2" autocomplete="off" required>								
								<option></option>					
								<option value='REZA MAULANA YAHYA'>REZA MAULANA YAHYA</option>																	
								</select>
                            </div> 
							<br/>
								
		<div class="box-footer">            
		   <button type="button" id="reset_kelas" class="btn btn-danger btn-flat" data-dismiss="modal">Cancel</button>
		   <button type="button" id="submit_select_client" class="btn btn-success btn-flat pull-right"><span class="fa fa-save"></span> Save</button>
		</div>						
	</div>
		
	</div>
	<!-- /.modal-content -->
 </div>
	  <!-- /.modal-dialog -->
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





    <!-- Page level custom scripts -->


    <script src="../asset/vendor/datatables/jquery.dataTables.min.js"></script>

    <script src="../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="../js/bs-custom-file-input.js"></script>
	
	<!-- iCheck 1.0.1 -->
	<script src="../asset/plugins/iCheck/icheck.min.js"></script>
	<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

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
	
	<script>
	$(document).ready(function() {
		var table = $('#tabel_solved').DataTable({

                "responsive": true,

                "processing": true,

                "language": {

                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

                }, 

                "ajax": {

                    "url":"../models/modal_tiang_solved.php",

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

                    { mData: 'targets'},
					
                    { mData: 'no'},

                    { mData: 'key'},

                    { mData: 'id'},

                    { mData: 'nama_tiang'} ,                  

                    { mData: 'alamat'} ,

					{ mData: 'keterangan'} ,
					
					{ mData: 'pic_vendor'} ,
					
					{ mData: 'type_status'} ,
					
					{ mData: 'maps'} ,            

                ],
				
					'drawCallback': function(){
				$('input[type="checkbox"]').iCheck({
					checkboxClass: 'icheckbox_minimal-red',
					radioClass   : 'iradio_flat-green'
				});
			},
				
					 'columnDefs': [
							{
								'targets': 0,
								'checkboxes': {
									'selectRow': true,
									'selectCallback': function(nodes, selected){
										$('input[type="checkbox"]', nodes).iCheck('update');
									},
									'selectAllCallback': function(nodes, selected, indeterminate){
										$('input[type="checkbox"]', nodes).iCheck('update');
									}
								}
							}
						],
				  'select': {
					 'style': 'multi'
				  },
				  'order': [[1, 'asc']]
   });
   
	// Handle iCheck change event for "select all" control
	var table = $('#tabel_solved').DataTable();
	$(table.table().container()).on('ifChanged', '.dt-checkboxes-select-all input[type="checkbox"]', function(event){
		var col = table.column($(this).closest('th'));
		col.checkboxes.select(this.checked);
	});

	// Handle iCheck change event for checkboxes in table body
	var table = $('#tabel_solved').DataTable();
	$(table.table().container()).on('ifChanged', '.dt-checkboxes', function(event){
	  var cell = table.cell($(this).closest('td'));
	  cell.checkboxes.select(this.checked);
	});	
	
	// Remove the checked state from "All" if any checkbox is unchecked
	$('.check').on('ifUnchecked', function (event) {
		$('#check-all').iCheck('uncheck');		
	});

	// Make "All" checked if all checkboxes are checked
	$('.check').on('ifChecked', function (event) {
		if ($('.check').filter(':checked').length == $('.check').length) {
			$('#check-all').iCheck('check');			
		}
	});
	
	$("#set").click(function(event){
		//event.stopPropagation();
		//event.preventDefault();
		//event.stopImmediatePropagation();		
		var pilih_id = [];
		//alert (pilih_id); return;
		//var lognya = this;
		var otable = $('#tabel_solved').DataTable();

			var rows_selected = otable.column(0).checkboxes.selected();
			//var rows_selected = otable.$(".minimal:checked",{"page":"all"});
			$.each(rows_selected, function(index, rowId){
			
				paijo = rowId.replace(/<\/?label>/g, '');
				
				var dataId = $(paijo).attr('value');
				pilih_id.push(dataId);	
			
			});
			
		event.preventDefault();		
		alert(pilih_id);
		//console.log(pilih_id);
		$(".modal-body #all_id").val(pilih_id);			
		$("#modal_set_blasting").modal("show");
			
		});
		
$('#submit_select_client').click(function(event){
    event.stopPropagation();
	event.preventDefault();	
	event.stopImmediatePropagation();
	//var info_blasting = $("#info_blasting").val();
	var all_id		= $("#all_id").val();
	var pihak1		= $("#pihak1").val();
	var pihak2		= $("#pihak2").val();
	//var select_user = all_id.length;
	var value = { all_id:all_id, pihak1:pihak1, pihak2:pihak2,}; 
	 
	
	//alert (value); return;
	
	//alert(all_id); return;
	 $.ajax({       type: "POST",
					async: false,
                    url: "../controller/laporan-cetak.php",
                    data: value,
                    dataType: 'html',					
                }).done(function(data) {
					printWindow = window.open();
					printWindow.document.write(data);
					printWindow.print();
				});
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
	$('#provinsi').select2().on('change', function(){
		//var a = $('.js-example-basic-multiple').val();
		var prov = $(this).val();
		//alert(prov);
		if(prov){
			$.ajax({
				type:'POST',
				url : "../create/list_kabupaten.php",
				data:'prov_id='+prov,
					success:function(html){
						//alert(html);
						$('#kabupaten').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
			}); 
		}else{
			$('#kabupaten').html('<option value="">Select Provinsi dulu</option>');
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
				url : "../create/list_kecamatan.php",
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
		//alert(kab);
		if(kec){
			$.ajax({
				type:'POST',
				url : "../create/list_kelurahan.php",
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

                    "url":"../models/modal_tiang_notsolved.php",

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

                    { mData: 'key'},

                    { mData: 'id'},

                    { mData: 'nama_tiang'} ,                  

                    { mData: 'alamat'} ,

					{ mData: 'keterangan'} ,
					
					{ mData: 'pic_vendor'} ,
					
					{ mData: 'type_status'} ,
					
					{ mData: 'maps'} ,            

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
		$(document).on('click', '.actionkapten', function(){
			
            var nama_tiang = $("#nama_tiang").val();

            var pic_vendor = $("#pic_vendor").val();

            var kd_layanan = $("#kd_layanan").val();

            var id_tiang = $("#id_tiang").val();

            var alamat = $("#alamat").val();
			
            var rt = $("#rt").val();

            var rw = $("#rw").val();
            
			var kelurahan = $("#kelurahan").val();
            
			var kecamatan = $("#kecamatan").val();
			
			var kabupaten = $("#kabupaten").val();
			
			var provinsi = $("#provinsi").val();            

            var keterangan = $("#keterangan").val();

            var lokasi = $("#b").text();
			
            var status = $("#status").text();
			
			
			
			//alert(paket_fal); return;
			 
			if(nama_tiang == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Nama Tiang Belum Terisi!',				  
				}) 
				return
			}  
			
			if(pic_vendor == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'PIC Vendor Belum Terisi!',				  
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
			
			if(kd_layanan == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kantro Cabang Belum Terisi!',				  
				}) 
				return
			}
			
			if(provinsi == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Provinsi Belum Terisi!',
				  
				})  
				return
			}
			
			if(kabupaten == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Kabupaten Belum Terisi!',
				  
				})  
				return
			}			
			
			 
			 
			 //alert(get_distribusi); return;
			 
			 var value = { 
						  nama_tiang:nama_tiang, 
						  pic_vendor:pic_vendor, 
						  kd_layanan:kd_layanan,
						  id_tiang:id_tiang,
						  alamat:alamat,
						  rw:rw,
						  rt:rt,
						  kelurahan:kelurahan,
						  kecamatan:kecamatan,
						  kabupaten:kabupaten,
						  provinsi:provinsi,						  
						  status:status,	
						  keterangan:keterangan, 
						  lokasi:lokasi,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_insert_tiang.php",
                    data: value,
                    success : function(data) {
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
                }); 
			 
			});
		
			//get data value kapten
		$(document).on('click', '.edittiang', function(){
                //alert a; return;
				var id_tiang2 = $(this).attr('id_tiang');				
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				alert (id_tiang2); 
				
				$('#modalverifikasi').modal('show');
				$('#id_tiang2').val(id_tiang2);				
				
				
            });
			
		// Edit 			
		$(document).on('click', '.actionverifikasi', function(){
			
            var id_tiang2 = $("#id_tiang2").val();
            var verifikasi = $("#verifikasi").val();

			
			if(verifikasi == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Verifikasi Tidak Boleh Kosong!',				  
				}) 
				return
			} 	
			 		 
			 //alert(get_distribusi); return;
			 
			 var value = { 
						  id_tiang:id_tiang2, 
						  verifikasi:verifikasi,
						  
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_edittiang_verifikasi.php",
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
$('#tiang').change(function(){ 
 var a = $('#tiang').val();
//alert (a);
    $.ajax({
        url: "../create/create_kode_tiang.php",
        data: { "value": $("#tiang").val() },
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
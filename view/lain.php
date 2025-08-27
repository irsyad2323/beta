-<?php
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

                            <?php 
                            if ( $_SESSION["level_user"] != "ikr"){ 
                        ?>
                        <div class="row">

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
							  <h6 class="m-0 font-weight-bold text-primary">Data WO LAIN LAIN <?php echo $user; ?></h6>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
								<table class="table table-bordered" id="tabel_pengguna_bckbn" width="100%" cellspacing="0">
								  <thead>
									<tr>
									<th>NO</th>
									<th>ID</th>
									<th>Nama</th>
									<th>Produk</th>
									<th>Layanan</th>
									<th>PIC</th>
									<th>Alamat</th>
									<th>Lain Lain</th>
									<th>Action</th>
									</tr>
								  </thead>
								  <tfoot>
									<tr>
									<th>NO</th>
									<th>ID</th>
									<th>Nama</th>
									<th>Produk</th>
									<th>Layanan</th>
									<th>PIC</th>
									<th>Alamat</th>
									<th>Lain Lain</th>
									<th>Action</th>
									</tr>
								  </tfoot>
								  <tbody> 
									<?php 
						  include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT * FROM tbl_lain_lain WHERE kd_layanan='".$kota."' and pic_ikr='".$acces_user_log."' and status_wo='belum' ORDER BY key_fal DESC");
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  $no=1;
						  
						  if($row['status_wo'] == 'sudah'){
											$row['type_status'] = '<small class="badge badge-success">'. strtoupper($row['status_wo']).'</small>';
											}elseif($row['status_wo'] == 'belum'){
												$row['type_status'] = '<small class="badge badge-danger">'. strtoupper($row['status_wo']).'</small>';
											}else{
												$row['type_status'] = $data[$i]['status_wo'];
											}
						  ?>
						  <tr id=<?php echo $row['key_fal']; ?>">
							<td> <?php echo $no; ?></td>
							<td data-target="key_fal"> <?php echo $row['key_fal'];?></td>
							<td data-target="nama"> <?php echo $row['nama'];?></td>
							<td data-target="produk"> <?php echo $row['produk'];?></td>
							<td data-target="produk"> <?php echo $row['kd_layanan'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
							<td data-target="alamat_fal"> <?php echo $row['alamat_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td> <div class="btn-group">	 
							<button type="button" name="edit" data-id="<?php echo $row['key_fal'];?>"
							key_fal="<?php echo $row['key_fal'];?>"							
							nama="<?php echo $row['nama'];?>"							
							produk="<?php echo $row['produk'];?>"
							alamat_fal="<?php echo $row['alamat_fal'];?>"
							lain_lain="<?php echo $row['lain_lain'];?>"
							class="btn btn-info btn-sm mr-2 editlain">Edit</button>
							
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
							<th>ACTION</th>
                    
                          
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
	
	
	
	<!-- form selain kapten -->
	
	 <div class="modal fade" id="modallain"  role="dialog" tabindex="-1">

        <div class="modal-dialog modal-xl" role="document">

            <div class="modal-content">


                 <div class="modal-body">
                    <form role="form" method="post" id="form_edit_sinden">
					
                   
                    <div class="form-row">
				
					<div class="form-group col-md-2">
                            <label for="rang">ID</label>
                            <input class="form-control" type="text" id="key_fal" name="key_fal" autocomplete="off"  disabled>
                        </div>
						
						<div class="form-group col-md-2">
                            <label for="rang">Nama</label>
                            <input class="form-control" type="text" id="nama" name="nama" autocomplete="off"  disabled>
                        </div>
					
                        <div class="form-group col-md-2">
                    <label for="rang">Teknisi 1</label>                
                    <select class="form-control" type="text" id="pic_lain" name="pic_lain" autocomplete="off" >
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
                    <select class="form-control" type="text" id="pic_lain2" name="pic_lain2" autocomplete="off">
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
	
						
					<div class="form-group col-md-6">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
                        </div>
					
					<div class="form-group col-md-6">
                            <label for="rang">Alamat</label>
                            <input class="form-control" type="text" id="alamat_fal" name="alamat_fal" placeholder="keterangan" autocomplete="off">
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
                            <input class="form-control" type="text" id="ba" name="ba" autocomplete="off" required>   
                        </div>
				</div>
			  
			 
			  
                <div class="form-row">
               <div class="form-group col-md-6">
                    <label for="rang">Status</label>                
                    <select class="form-control" type="text" id="status_wo" name="status_wo" autocomplete="off">
                    <option value=''></option>
                    <option value='sudah'>Sudah Terpasang</option>
                    <option value='belum'>Belum Terpasang</option>              
                                                                                     
                    </select>
                  </div>                     
                           
                        
                        </div>
				
						<hr>
                            <button type="button" class="btn btn-success  pull-right savelain">Save</button>
                            <button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
                            
                        </form>
			
					<!-- END ISIAN DATA ADMIN -->
						
		
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

    <script src="../asset/js/bootstrap-datepicker.min.js"></script>
    <script src="../asset/locales/bootstrap-datepicker.id.min.js"></script>
	<script src="../js/sweetalert2.all.min.js"></script>
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
            
			
			var table = $('#tabel_pengguna_bckbn').DataTable({

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
			

			
			//get data value sinden
		$(document).on('click', '.editlain', function(){
                
				var key_fal = $(this).attr('key_fal');
				
				var nama = $(this).attr('nama');
				var lain_lain = $(this).attr('lain_lain');
				var alamat_fal = $(this).attr('alamat_fal');
				//alert (nama);
				$('#modallain').modal('show');
				$('#key_fal').val(key_fal);				
				$('#nama').val(nama);
				$('#lain_lain').val(lain_lain);
				$('#alamat_fal').val(alamat_fal);
				
            });
		
			
			
			// create 			
		$(document).on('click', '.editproses', function(){
			//var nama_fal = $("#nama_fal").val();
			 var key_fal = $(this).attr('key_fal');
			 
			 //alert(key_fal); return;
			 
			 var value = { key_fal:key_fal,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_proses.php",
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
		$(document).on('click', '.savelain', function(){
			//var nama_fal = $("#nama_fal").val();
			 var key_fal = $('#key_fal').val();
			 var lain_lain = $('#lain_lain').val();
			 var nama = $('#nama').val();
			 var pic_lain = $('#pic_lain').val();
			 var pic_lain2 = $('#pic_lain2').val();
			 var status_wo = $('#status_wo').val();
			 var alamat_fal = $('#alamat_fal').val();
			 var loklain = $('#ba').val();
			 
			 
			 //alert(username_sinden); return;
			 
			 var value = { key_fal:key_fal,
						   lain_lain:lain_lain,
						   nama:nama,
						   pic_lain:pic_lain, 
						   pic_lain2:pic_lain2,
						   status_wo:status_wo,	
						   alamat_fal:alamat_fal,
						   loklain:loklain,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_edit_lain.php",
                    data: value,
                    success : function(data) {
					alert(data);
					window.location.reload(true);
					}

                }); 
			 
			});
			
			// create 			
		$(document).on('click', '.updatemaintenace', function(){
			//var nama_fal = $("#nama_fal").val();			 
			 var key_fal = $('#key_fal').val();
			 var mntn = $('#mntn').val();
			 var pic_maintenace = $('#pic_maintenace').val();
			 var pic_maintenace2 = $('#pic_maintenace2').val();
			 var kategori_maintenance = $("#kategori_maintenance").val();
			 var modem = $("#modem").val();
             var kabel1 = $("#kabel1").val();
             var kabel2 = $("#kabel2").val();
             var kabel3 = $("#kabel3").val();
             var lain_lain = $("#lain_lain").val();
			 var status_wo = $('#status_wo').val();
			 var lokasi = $('#ba').val();			
			 var username_Maintenance = $('#username_Maintenance').val();			
			 var kd_layanan = $('#kd_layanan').val();			
			 var tlp_fal = $('#tlp_fal').val();			
			 var nama_fal = $('#nama_fal').val();			
			 var tanggal_kom = $('#tanggal_kom').val();			
			 
			 
			 //alert(kategori_maintenance); return;
			 
			 var value = { key_fal:key_fal,
						   mntn:mntn,
						   pic_maintenace:pic_maintenace,
						   pic_maintenace2:pic_maintenace2, 
						   kategori_maintenance:kategori_maintenance,
						   modem:modem,						   
						   kabel1:kabel1,
						   kabel2:kabel2,
						   kabel3:kabel3,
						   lain_lain:lain_lain,
						   status_wo:status_wo,
						   username_Maintenance:username_Maintenance,
						   lokasi:lokasi,
						   kd_layanan:kd_layanan,
						   tlp_fal:tlp_fal,
						   nama_fal:nama_fal,
						   tanggal_kom:tanggal_kom,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_edit_maintenance.php",
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
			
		});
		
	</script>
     <script>

    // Set up global variable

    var result;

    

    function showPosition() {   

        // Store the element where the page displays the result

        result = document.getElementById("b");
		getlokasi = document.getElementById("get_lokasi");
        lokasi = document.getElementById("ba");
        loklain = document.getElementById("loklain");
		
        

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
		getlokasi.value = position.coords.latitude + "#" + position.coords.longitude;
		bckbn.value = position.coords.latitude + "#" + position.coords.longitude;
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


  $('#pic').change(function() {
    $('.select-default-hidden').hide();
    $('.select-default-shown').show();
      //var a = $(this).val();
      //alert (a);
    $('.select-' + $(this).val() + '-shown').show();
    $('.select-' + $(this).val() + '-hidden').hide();
}).change();

$(function() {
    $('#modem').hide();
	$('#kabel1').hide();
	$('#kabel2').hide();	
	$('#kabel3').hide();
    $('#kategori_maintenance').change(function(){
		var a = $('#kategori_maintenance').val();
		//alert(a);
       if(a == 'Ganti Modem'){
            $('#modem').show(); 
			$('#kabel1').hide();
			$('#kabel2').hide();
			$('#kabel3').hide();
        }else if(a == 'Tarik Kabel'){
            $('#modem').hide();
			$('#kabel1').show();
			$('#kabel2').show();
			$('#kabel3').show();
        }else{
			$('#modem').hide();
			$('#kabel1').hide();
			$('#kabel2').hide();
			$('#kabel3').hide();
		}
    });
});
</script>
</body>

</html>
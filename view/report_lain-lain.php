	<?php
session_start();

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

    <title>SB Admin 2 - IKR</title>

    <!-- Custom fonts for this template-->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
                        <h1 class="h3 mb-0 text-gray-800">REPORT Lain Lain<?php //echo $_SESSION["level_user"]; ?></h1>
                        <?php 
                            if ( $_SESSION["level_user"] != "Admin" ){ 
                        ?>
                        <div>                          

                            <a href="controller/export_nmc.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                        <button class="btn btn-success insertlain_lain">TAMBAH +</button>
                    </div> 


                            

                    <!-- Content Row -->
                    <?php 
                        if ($_SESSION["level_user"] != "ts"){
                       ?>


                          <div class="table-responsive">
                        <table id="tabel_pengguna" class="table table-bordered table-striped">
                        
                          <thead>
                      
                          <tr>
                            
                            
                            <th>Key</th>                          
                            <th>Tanggal WO</th>
							<th>PIC WO</th>
                            <th>Alamat</th>                            
                            <th>Lain-lain</th>
                            <th>kd_layanan</th>
                            <th>Status WO</th>
                    
                          
                          </tr>
                          </thead>
                          <tbody>
						  <?php 
						  include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT * FROM tbl_lain_lain 
														WHERE kd_layanan='".$kota."'
														ORDER BY key_fal DESC");
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;
						  $no=1;
						  ?>
						  <tr id=<?php echo $row['username_fal']; ?>">
							
							<td data-target="no"> <?php echo $row['no'];?></td>
							<td data-target="key_fal"> <?php echo $row['key_fal'];?></td>
							<td data-target="tanggal_wo"> <?php echo $row['tanggal_wo'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
							<td data-target="alamat_fal"> <?php echo $row['alamat_fal'];?></td>
							<td data-target="lain_lain"> <?php echo $row['lain_lain'];?></td>
							<td data-target="kd_layanan"> <?php echo $row['kd_layanan'];?></td>
							<td data-target="status_wo"> <?php echo $row['status_wo'];?></td>
							
						  </tr>
						  <?php	
						  }
						  ?>
						  </tbody>
          
                        </table>
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

    <div class="modal fade" id="modaltambahdata"  role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    
                </div>
                <div class="modal-body">
                    <form action="" id="formdatapengguna">
					<div class="form-group col-md-2">                        
                            <input class="form-control" type="hidden" id="username_fal" name="username_fal" placeholder="Jangan Di isi" autocomplete="off" disabled>
                        </div>
                        <div class="form-row">
                                                                              
                             
                            <div class="form-group col-md-4">
                                <label for="rang">kantor Cabang</label>                
                    <select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off">
                    <option><?php echo $kota ?></option>                                   
                    </select>
                            </div> 
                            <div class="form-group col-md-4">
                                <label for="rang">Pic</label>                
                    <select class="form-control" type="text" id="pic_ikr" name="pic_ikr" autocomplete="off">
					<option> <?php
											  include('../controller/controller_mysqli.php');
											  $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai WHERE kantor_cabang='".$kota."' and status_pegawai='aktiv' and ( status_karyawan='Karyawan' or status_karyawan='Outsourcing' ) and jabatan='teknisi'");
											  //$data_user = mysqli_fetch_array($sql_user);
											  //print_r($data_user);
											 while ($data_user = mysqli_fetch_array($sql_user)) {
												echo '<option value"'.$data_user['nama_panggilan'].'">'.$data_user['nama_panggilan'].'</option>';
											  } 
											?>   </option> 
					
                    </select>
                            </div>

					       
					
					 <div class="form-group col-md-6">
                            <label for="rang">Alamat</label>
                            <input class="form-control" type="text" id="alamat_fal" name="alamat_fal" placeholder="keterangan" autocomplete="off">
                        </div>

                   <div class="form-group col-md-6">
                            <label for="rang">Keterangan</label>
                            <input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
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
					<button type="button" class="btn btn-success  pull-right actionlain">Insert</button>
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
                    "url":"../models/datapengguna_nmc.php",
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

            $(document).on('click', '.insertlain_lain', function(){
             
				$('#modaltambahdata').modal('show');
				
				
            });
			
			// INSERT 			
		$(document).on('click', '.actionlain', function(){	
            
            var kd_layanan = $("#kd_layanan").val();

            var alamat_fal = $("#alamat_fal").val();

            var pic_ikr = $("#pic_ikr").val();           

            var lain_lain = $("#lain_lain").val();         

            var k = $("#b").text();			
			
			
			//alert(paket_fal); return;
			 
			if(pic_ikr == '' ){
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
			
			if(lain_lain == '' ){
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Keterangan Belum Terisi!',
				  
				})  
				return
			}
			
			
			 
			 
			 //alert(get_distribusi); return;
			 
			 var value = { 						  
						  kd_layanan:kd_layanan, 
						  pic_ikr:pic_ikr,
						  alamat_fal:alamat_fal,
						  lain_lain:lain_lain, 
						  ket:k,
						 }; 

                $.ajax({

                    type: "POST",
					async: false,
                    url: "../controller/action_insert_lainlain.php",
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
		
			//get data value sinden
		$(document).on('click', '.editkptn', function(){
                //alert($(this).data('id'));
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
				var tgl_fal = $(this).attr('tgl_fal');
				var lain_lain = $(this).attr('lain_lain');
				var total_diskon = $(this).attr('total_diskon');
				var free = $(this).attr('free');
				var pindah_alamat = $(this).attr('pindah_alamat');
				var keterangan_angsuran = $(this).attr('keterangan_angsuran');
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (key_odp); 
				
				$('#modaledit').modal('show');
				$('#username_fal2').val(username_fal);				
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
				$('#tgl_fal2').val(tgl_fal);				
				$('#lain_lain2').val(lain_lain);
				$('#total_diskon2').val(total_diskon);				
				$('#free2').val(free);
				$('#pindah_alamat2').val(pindah_alamat);
				$('#keterangan_angsuran2').val(keterangan_angsuran);
				
            });
			
		// INSERT 			
		$(document).on('click', '.actioneditkapten', function(){
			
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
</body>

</html>
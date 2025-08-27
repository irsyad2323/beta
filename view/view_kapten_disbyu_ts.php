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
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
	<h1 class="h3 mb-0 text-gray-800">WO Distribusi BYU <?php //echo $_SESSION["level_user"]; ?></h1>              
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
<?php } ?>			
<?php if ( $_SESSION["level_user"] != "ikr"){ ?>

<div class="row">

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
			  <h6 class="m-0 font-weight-bold text-primary">Data Kirim Kartu BYU</h6>
			</div>
			<div class="card-body">
			  <div class="table-responsive">
				<table class="table table-bordered" id="tabel_pengguna" width="100%" cellspacing="0">
				  <thead>
					<tr>
					  <th>No</th>
					  <th>Create at</th>
					  <th>Kode User</th>
					  <th>Nama Pelanggan</th>
					  <th>Alamat</th>							
					  <th>Telfon User</th>
					  <th>Admin</th>
					  <th>Status</th>
					  <th>PIC</th>
					  <th>ACTION</th>
					</tr>
				  </thead>
				  <tfoot>
				  </tfoot>
				  <tbody> 
					<?php 
						  include('../controller/controller_mysqli.php');
						$acces_user_log = $_SESSION["username"];
						  $table = mysqli_query($koneksi,"SELECT a.*, b.* FROM tbl_log_combo a 
															LEFT JOIN tb_gundala b
															ON a.kode_user = b.kode_user
															WHERE pic_ikr = '".$_SESSION["username"]."' and status_wo = 'n' and tipe in ('upgrade','downgrade')");
						  $no=1;
						  
						  while ($row = mysqli_fetch_assoc($table)){ 
						  $i=0;				
							 $date_ins = $row['tgl_fal'];
							 $date_now = date("Y-m-d");
						  ?>
						  <tr>
							<td data-target="no"> <?php echo $no;?></td>
							<td data-target="create_at"> <?php echo $row['create_at'];?></td>
							<td data-target="kode_user"> <?php echo $row['kode_user'];?></td>
							<td data-target="nama_user"> <?php echo $row['nama_user'];?></td>
							<td data-target="alamat_user"> <?php echo $row['alamat_user'];?></td>
							<td data-target="telp_user"> <?php echo $row['telp_user'];?></td>
							<td data-target="admin"> <?php echo $row['admin'];?></td>
							<td data-target="tipe"> <?php echo $row['tipe'];?></td>
							<td data-target="pic_ikr"> <?php echo $row['pic_ikr'];?></td>
							
							<td>
								<div class="dropdown">
								  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									ACTION
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a name="edit" data-id="<?php echo $row['key_fal'];?>"
										id="<?php echo $row['id'];?>"
										kode_user="<?php echo $row['kode_user'];?>"
										class="dropdown-item edit_byu_ts">Edit</a>
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

	<div class="modal fade" id="modaleditbyuts"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

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
					   
							<input class="form-control" type="hidden" id="id" name="id" autocomplete="off" readonly>
						<br/>
                            <div class="form-row">
                                <label for="rang">Kode User</label>             
								<input class="form-control" type="text" id="kode_user" name="kode_user" autocomplete="off" readonly>
                            </div> 
						<br/>
						
						<div class="form-row">
                                <label for="rang">Status Pekerjaan</label>                
									<select class="form-control" type="text" id="status_pekerjaan" name="status_pekerjaan" autocomplete="off" >
									<option value="">Pilih Status</option> 
									<option value="y">Solved</option> 
									</select>
                            </div> 
						<br/>					
						
                            <div class="form-row">
								<label for="rang">Input Number Perdana By.u</label>
								<input list="numbers" id="input_number" name="input_number" style="width: 450px;" required>
								<datalist id="numbers">
									<?php
									include('../controller/controller_mysqli.php');
									$sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_upload_byu WHERE status = 'n'");
									while ($data_user = mysqli_fetch_array($sql_user)) {
										echo '<option value="'.$data_user['number'].'">';
									}
									?>
								</datalist>
							</div>

                   				
						<hr>
                            <button type="button" class="btn btn-success  pull-right proses_byuts">edit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
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
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
		
			//get data value kapten
		$(document).on('click', '.edit_byu_ts', function(){
                //alert($(this).data('id'));
				var id = $(this).attr('id');
				var kode_user = $(this).attr('kode_user');
				
				
				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				//alert (kode_user); 
				
				$('#modaleditbyuts').modal('show');
				$('#id').val(id);				
				$('#kode_user').val(kode_user);						
				
				
            });
			
	// Edit 			
	$(document).on('click', '.proses_byuts', function () {
    // Ambil nilai dari elemen input
    var id = $("#id").val();
    var kode_user = $("#kode_user").val();
    var status_pekerjaan = $("#status_pekerjaan").val();
    var input_number = $("#input_number").val();

    // Validasi data input sebelum dikirim ke server
    if (!id || !kode_user || !status_pekerjaan || !input_number) {
        Swal.fire(
            'Error!',
            'Semua field harus diisi.',
            'error'
        );
        return;
    }

    // Data yang akan dikirim ke server
    var value = {
        id: id,
        kode_user: kode_user,
        input_number: input_number,
        status_pekerjaan: status_pekerjaan
    };

    // Kirim permintaan AJAX
    $.ajax({
        type: "POST",
        url: "../controller/action_byu_ts.php",
        data: value,
        success: function (response) {
            try {
                // Parsing respons JSON dari server
                var data = JSON.parse(response);

                // Periksa status respons
                if (data.status === 'success') {
                    Swal.fire(
                        'Good job!',
                        data.message || 'Proses berhasil!',
                        'success'
                    ).then(function () {
                        window.location.reload(true); // Reload halaman setelah sukses
                    });
                } else {
                    Swal.fire(
                        'Error!',
                        data.message || 'Terjadi kesalahan.',
                        'error'
                    );
                }
            } catch (e) {
                // Jika respons bukan JSON atau terjadi kesalahan parsing
                Swal.fire(
                    'Error!',
                    'Respons server tidak valid.',
                    'error'
                );
            }
        },
        error: function (xhr, status, error) {
            // Penanganan kesalahan koneksi atau server
            Swal.fire(
                'Error!',
                'Terjadi kesalahan: ' + error,
                'error'
            );
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
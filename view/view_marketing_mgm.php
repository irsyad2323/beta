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

			<h1 class="h3 mb-0 text-gray-800"> <?php //echo $_SESSION["level_user"]; ?></h1>

		 

		</div>
		
		<div class="d-sm-flex align-items-center justify-content-between mb-4">

	   

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
				  <h6 class="m-0 font-weight-bold text-primary">REPORT LAPORAN MGM</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
				  <form name="frm-example" id="frm-example">
					<table class="table table-bordered" id="tabel_pengguna3" width="100%" cellspacing="0">
					  <thead>
						<tr>
						  <th>No</th>
						  <th>ID MGM</th>
						  <th>Nama MGM</th>
						  <th>No Handphone</th>
						  <th>Metode Pembayaran</th>
						  <th>No Rekening</th>
						  <th>An Rekening</th>
						  <th>TOTAL MGM Yang Didaftarkan</th>									  
						  <th>Total FEE MGM</th>									  
						  <th>Keterangan</th>									  
						  <th>Status Aprove Marketing</th>									  
						  <th>Action</th>
						</tr>
					  </thead>
					  <tfoot>
						
					  </tfoot>
					  <tbody> 
						<?php 
							  include('../controller/controller_mysqli.php');
							  $acces_user_log = $_SESSION["username"];
							  $table = mysqli_query($koneksi,"SELECT 
																	a.*, 
																	b.nama_sobat, 
																	b.metode_bayar, 
																	b.no_rekening, 
																	b.no_wa_sobat, 
																	b.an_rek, 
																	(SELECT COUNT(*) 
																	 FROM tbl_fal 
																	 WHERE verif_nominal = 'y' 
																	   AND verified_mgm = 'y' 
																	   AND verified_fls = 'n' 
																	   AND kd_layanan LIKE '".$kota."' 
																	   AND status_wo = 'Sudah Terpasang' 
																	   AND mgm = 'mgm' 
																	   AND nama_sobat = a.nama_sobat
																	) AS total
																FROM tbl_fal a
																JOIN tbl_sobat_mgm b 
																	ON a.nama_sobat = b.nama_sobat COLLATE utf8mb4_unicode_ci
																WHERE a.verif_nominal = 'y'
																  AND a.verified_mgm = 'y'
																  AND a.verified_fls = 'n'
																  AND a.kd_layanan LIKE '".$kota."'
																  AND a.status_wo = 'Sudah Terpasang'
																  AND a.mgm = 'mgm'
																GROUP BY a.nama_sobat;
																");
							  $i=1;
							  $no=1;
							  while ($row = mysqli_fetch_assoc($table)){ 
							  
							  if($row['verif_nominal'] = 'y'){
									$row['verif_nominall'] = '<small class="badge badge-success">Aproved</small>';
								}
							  
							  $row['hasil'] = ($row['nominal_mgm'] * $row['total']);
				
							  ?>
							  <tr id=<?php echo $row['key_fal']; ?>>
								<td data-target="no"> <?php echo $no;?></td>
								<td data-target="nama_sobat"> <?php echo $row['id_mgm'];?></td>
								<td data-target="nama_sobat"> <?php echo $row['nama_sobat'];?></td>
								<td data-target="no_wa_sobat"> <?php echo $row['no_wa_sobat'];?></td>
								<td data-target="metode_pembayaran"> <?php echo $row['metode_pembayaran'];?></td>
								<td data-target="no_rekening"> <?php echo $row['no_rekening'];?></td>
								<td data-target="an_rek"> <?php echo $row['an_rek'];?></td>
								<td data-target="total"> <?php echo $row['total'];?></td>
								<td data-target="nominal_mgm"> <?php echo $row['hasil'];?></td>
								<td data-target="ket_mgm"> <?php echo $row['ket_mgm'];?></td>
								<td data-target="verif_nominall"> <?php echo $row['verif_nominall'];?></td>
								
								 <!-- value="61" -->
								
								<td> <div class="btn-group">	 
								<button type="button" name="edit" data-id="<?php echo $row['key_fal'];?>"
								key_fal="<?php echo $row['key_fal'];?>"							
								nama_sobat="<?php echo $row['nama_sobat'];?>"
								verif_nominal="<?php echo $row['verif_nominal'];?>"
								id_mgm="<?php echo $row['id_mgm'];?>"
								class="btn btn-info btn-sm mr-2 nominalaprof">ACTION</button>		 
								<button type="button" name="edit" data-id="<?php echo $row['key_fal'];?>"
								key_fal="<?php echo $row['key_fal'];?>"							
								nama_sobat="<?php echo $row['nama_sobat'];?>"
								verif_nominal="<?php echo $row['verif_nominal'];?>"
								class="btn btn-danger btn-sm mr-2 nominalreset">RESET TO MARKETING</button>									
								
							</div></td>
							  </tr>
							  <?php	
							  $i++;
							  $no++;
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
				  <h6 class="m-0 font-weight-bold text-primary">REPORT LAPORAN APROVE</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
				  <form name="frm-example" id="frm-example">
					<table class="table table-bordered" id="tabel_pengguna4" width="100%" cellspacing="0">
					  <thead>
						<tr>
						  <th>No</th>
						  <th>ID User</th>
						  <th>Nama MGM</th>
						  <th>Metode Pembayaran</th>
						  <th>No rekening</th>									  
						  <th>Total FEE MGM</th>									  
						  <th>Keterangan</th>									  
						  <th>Status Aprove Marketing</th>									  
						  <th>ID Jurnal</th>	
						  <th>Tanggal Aprove</th>		
						  
						</tr>
					  </thead>
					  <tfoot>
						
					  </tfoot>
					  <tbody> 
						<?php 
							  include('../controller/controller_mysqli.php');
							  $acces_user_log = $_SESSION["username"];
							  $table = mysqli_query($koneksi,"SELECT *,
									   nama_sobat, 
									   metode_pembayaran, 
									   no_rekening
								FROM tbl_fal 
								WHERE verif_nominal='y' 
								  AND verified_mgm='y' 
								  AND verified_fls='y' 
								  AND kd_layanan LIKE '".$kota."' 
								  AND status_wo='Sudah Terpasang' 
								  AND mgm = 'mgm' 
								  AND id_tran_jrnl_mgm <> '';
								");
							  $i=1;
							  $no=1;
							  while ($row = mysqli_fetch_assoc($table)){ 
							  
							  if($row['verif_nominal'] = 'y'){
									$row['verif_nominall'] = '<small class="badge badge-success">Aproved</small>';
								}
							  
							  $row['hasil'] = ($row['nominal_mgm'] * $row['total']);
				
							  ?>
							  <tr id=<?php echo $row['key_fal']; ?>>
								<td data-target="no"> <?php echo $no;?></td>
								<td data-target="username_fal"> <?php echo $row['username_fal'];?></td>
								<td data-target="nama_sobat"> <?php echo $row['nama_sobat'];?></td>
								<td data-target="metode_pembayaran"> <?php echo $row['metode_pembayaran'];?></td>
								<td data-target="no_rekening"> <?php echo $row['no_rekening'];?></td>
								<td data-target="nominal_mgm"> <?php echo $row['nominal_mgm'];?></td>
								<td data-target="ket_mgm"> <?php echo $row['ket_mgm'];?></td>
								<td data-target="verif_nominall"> <?php echo $row['verif_nominall'];?></td>
								<td data-target="id_tran_jrnl_mgm"> <?php echo $row['id_tran_jrnl_mgm'];?></td>
								<td data-target="tgl_verified_mgm"> <?php echo $row['tgl_verified_mgm'];?></td>
								
							  </tr>
							  <?php	
							  $i++;
							  $no++;
							  }
							  ?>
					  </tbody>
					</table>
				  </div>
				</div>
			  </div>

			</div>
	


		   <?php   }  ?>


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

<div class="modal fade" id="nominalmodal"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

<div class="modal-dialog" role="document">

<div class="modal-content">

	<div class="modal-header">

		<h4 class="modal-user">Tambah Data</h4>

		<button type="button" class="close" data-dismiss="modal" aria-label="Close">

		<span aria-hidden="true">&times;</span></button>

		

	</div>

	 <div class="modal-body">
		<form role="form" method="post" id="formdatapengguna">

				<input type="hidden" class="form-control" name="key_fal2" id="key_fal2" >										
				<input type="hidden" class="form-control" name="nama_sobat2" id="nama_sobat2" >
				<input type="hidden" class="form-control" name="total" id="total" >
				<input type="hidden" class="form-control" value='
									<?php
									$conn=mysqli_connect("117.103.69.22", "kocak", "gaming", "billkapten");
									if (mysqli_connect_errno())
									{echo "Failed to connect to MySQL: " . mysqli_connect_error();}
									$sql="SELECT a.id_mgm + 1 as id FROM tbl_fal a ORDER BY a.id_mgm DESC LIMIT 0,1;";
									$result=mysqli_query($conn,$sql);
									$row=mysqli_fetch_array($result);
									echo "$row[0]";
									mysqli_close($conn);
									?>' name="id_mgm" id="id_mgm" >
		
			<div class="form-group">
					<label for="recipient-name" class="col-form-label">Nilai Pekerjan (Nominal) &nbsp&nbsp<small class="badge badge-danger">NEW</small></label>
					<input type="text" class="form-control" name="nominal" id='nominal' placeholder="" />
				</div> 
			
			<div class="form-row">
					<label for="rang">KETERANGAN</label>                
					<input type="text" class="form-control" name="ket_fls2" id="ket_fls2" >
				</div>
			
					
			<hr>
				<button type="button" class="btn btn-success  pull-right actionnominal">Insert</button>
				<button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
				
			</form>

		<!-- END ISIAN DATA ADMIN -->
			
		
		  </div>
		  
</div>

</div>

</div>

<div class="modal fade" id="modalaprof"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

<div class="modal-dialog" role="document">

<div class="modal-content">

	<div class="modal-header">

		<h4 class="modal-user">Tambah Data</h4>

		<button type="button" class="close" data-dismiss="modal" aria-label="Close">

		<span aria-hidden="true">&times;</span></button>

		

	</div>

	 <div class="modal-body">
		<form role="form" method="post" id="formdatapengguna">

			<input type="hidden" class="form-control" name="key_fal3" id="key_fal3" >										
			<input type="hidden" class="form-control" name="nama_sobat" id="nama_sobat" >
				
			<div class="form-row">
					<label for="rang">Aproved</label>                
					<select class="form-control" type="text" id="verified_fls" name="verified_fls" autocomplete="off" required>								
					<option></option>					
					<option value='y'>Aproved</option>					
					<option value='n'>Not Aproved</option>																
					</select>
				</div> <br/>

			<div class="form-row">
					<label for="rang">ID TRANSAKSI JURNAL</label>                
					<input type="text" class="form-control" name="id_tran_jrnl" id="id_tran_jrnl" >
				</div><br/>

			<div class="form-row">
					<label for="rang">KETERANGAN</label>                
					<input type="text" class="form-control" name="ket_fls" id="ket_fls" >
				</div><br/>
				
			 <!-- Begin Page Content -->
			<div class="container-fluid">

			  <!-- Page Heading 
			  <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
			  <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
				-->
			  <!-- DataTales Example -->
			  <div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">REPORT LAPORAN MGM</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
				  <form name="frm-example" id="frm-example">
					<table class="table table-bordered" id="data_log" width="100%" cellspacing="0">
					  <thead>
						<tr>
						  <th>NO</th>
						  <th>TANGGAL IKR</th>
						  <th>ID MGM</th>
						  <th>ID User</th>
						  <th>Nama MGM</th>	
						  
						</tr>
					  </thead>
					  <tfoot>
						
					  </tfoot>
					  <tbody> 
						
					  </tbody>
					</table>
				  </div>
				</div>
			  </div>

			</div>

					
			<hr>
				<button type="button" class="btn btn-success  pull-right actionaprof">Insert</button>
				<button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
				
			</form>

		<!-- END ISIAN DATA ADMIN -->
			
		
		  </div>
		  
</div>

</div>

</div>

<div class="modal fade" id="modalreset"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

<div class="modal-dialog" role="document">

<div class="modal-content">

	<div class="modal-header">

		<h4 class="modal-user">Tambah Data</h4>

		<button type="button" class="close" data-dismiss="modal" aria-label="Close">

		<span aria-hidden="true">&times;</span></button>

		

	</div>

	 <div class="modal-body">
		<form role="form" method="post" id="formdatapengguna">

			<input type="hidden" class="form-control" name="key_fal_reset" id="key_fal_reset" >
			<input type="hidden" class="form-control" name="nama_sobat_riset" id="nama_sobat_riset" >
			<div class="form-row">
					<label for="rang">KETERANGAN</label>                
					<input type="text" class="form-control" name="ket_fls_riset" id="ket_fls_riset" >
				</div><br/>
								
			<div class="form-row">
					<label for="rang">RESET TO MARKETING</label>                
					<select class="form-control" type="text" id="verif_nominal_riset" name="verif_nominal_riset" autocomplete="off" required>								
					<option></option>					
					<option value='n'>Reset</option>											
					</select>
				</div><br/>

					
			<hr>
				<button type="button" class="btn btn-success  pull-right actionriset">Insert</button>
				<button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
				
			</form>

		<!-- END ISIAN DATA ADMIN -->
			
		
		  </div>
		  
</div>

</div>

</div>

<div class="modal fade" id="modalverif"  role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

<div class="modal-dialog" role="document">

<div class="modal-content">

	<div class="modal-header">

		<h4 class="modal-user">Tambah Data</h4>

		<button type="button" class="close" data-dismiss="modal" aria-label="Close">

		<span aria-hidden="true">&times;</span></button>

		

	</div>

	 <div class="modal-body">
		<form role="form" method="post" id="formdatapengguna">

			<input type="hidden" class="form-control" name="key_fal" id="key_fal" >										
		
		
			<div class="form-row">
					<label for="rang">Aproved</label>                
					<select class="form-control" type="text" id="aproved" name="aproved" autocomplete="off" required>								
					<option></option>					
					<option value='y'>Aproved</option>					
					<option value='n'>Not Aproved</option>					
																			
					</select>
				</div> 
					
			<hr>
				<button type="button" class="btn btn-success  pull-right actionaproved">Insert</button>
				<button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
				
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

<!-- Bootstrap core JavaScript-->

<script src="../asset/vendor/jquery/jquery.min.js"></script>

<script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



<!-- Core plugin JavaScript-->

<script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>



<!-- Custom scripts for all pages-->

<script src="../asset/js/sb-admin-2.min.js"></script>



<!-- Page level plugins -->

<script src="../asset/vendor/chart.js/Chart.min.js"></script>




<script src="../asset/vendor/datatables/jquery.dataTables.min.js"></script>

<script src="../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="../js/bs-custom-file-input.js"></script>

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


$(document).ready(function() {

bsCustomFileInput.init()


var table = $('#tabel_pengguna4').DataTable({

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

var table = $('#tabel_pengguna2').DataTable({

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

var table = $('#tabel_pengguna3').DataTable({

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

var table = $('#tabel_solved').DataTable({

	"responsive": true,

	"processing": true,

	"language": {

		processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

	}, 

	"ajax": {

		"url":"../models/datapengguna_fal_pendaftaran.php",

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

		{ mData: 'tlp_fal'},

		{ mData: 'paket_fal'} ,

		{ mData: 'tgl_fal'} ,

		{ mData: 'username_fal'} ,

		{ mData: 'password_fal'} ,                   

		{ mData: 'kd_layanan'} ,                    

		{ mData: 'pic_ikr'} ,

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

var key_fal = $("#key_fal").val();
var nama_fal = $("#nama_fal").val();
var pic_ikr = $("#pic_ikr").val();
var kd_layanan = $("#kd_layanan").val();
var alamat_fal = $("#alamat_fal").val();
var rt = $("#rt").val();
var rw = $("#rw").val();
var kelurahan = $("#kelurahan").val();
var provinsi = $("#provinsi").val();
var kabupaten = $("#kabupaten").val();
var kecamatan = $("#kecamatan").val();
var lokasi = $("#lokasi").val();
var foto_rumah = $("#foto_rumah").val();
var foto_ktp = $("#foto_ktp").val();
var no_wa = $("#no_wa").val();
var no_wa2 = $("#no_wa2").val();
var no_wa3 = $("#no_wa3").val();
var no_wa4 = $("#no_wa4").val();
var tgl_fal = $("#tgl_fal").val();			
var paket_fal = $("#paket_fal").val();
var pic = $("#pic").val();
var status = $("#status").val();
var status2 = $("#status2").val();
var jenis_wo = $("#jenis_wo").val();
var produk = $("#produk").val();          
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
var status_lokasi = $("#status_lokasi").val();			
var tahu_layanan = $("#tahu_layanan").val();			
var alasan = $("#alasan").val();	
var nama_sobat = $("#nama_sobat").val();	
var metode_pembayaran = $("#metode_pembayaran").val();	
var no_rekening = $("#no_rekening").val();	
var total = (free + total_diskon + pindah_alamat);
//alert(foto_rumah);
	//alert(no_wa); return;
 
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


if(paket_fal == '-' ){
	Swal.fire({
	  icon: 'error',
	  title: 'Oops...',
	  text: 'Paket Belum Terisi!',
	  
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
 
 
 //alert(foto_rumah); return;
 
 var value = { 
			  key_fal:key_fal, 
			  nama_fal:nama_fal, 
			  kd_layanan:kd_layanan, 
			  pic_ikr:pic_ikr,
			  alamat_fal:alamat_fal,
			  rt:rt,
			  rw:rw,
			  kelurahan:kelurahan,
			  kabupaten:kabupaten,
			  kecamatan:kecamatan,
			  provinsi:provinsi,
			  no_wa:no_wa,
			  no_wa2:no_wa2,
			  no_wa3:no_wa3,
			  no_wa4:no_wa4,
			  pic:pic , 
			  status:status, 						  
			  status2:status2, 
			  jenis_wo:jenis_wo,
			  produk:produk,
			 /* lokasi:lokasi, */
			  foto_rumah:foto_rumah, 
			  foto_ktp:foto_ktp, 
			  perlakuan:perlakuan,
			  total_diskon:total_diskon,
			  keterangan_angsuran:keterangan_angsuran,						 
			  free:free,
			  pindah_alamat:pindah_alamat,				  
			  paket_fal:paket_fal,
			  tgl_fal:tgl_fal,
			  username_fal:username_fal,						  
			  password_fal:password_fal, 
			  status_wo:status_wo,
			  lain_lain:lain_lain,
			  status_lokasi:status_lokasi,	
			  tahu_layanan:tahu_layanan,	
			  alasan:alasan,
			  metode_pembayaran:metode_pembayaran,
			  no_rekening:no_rekening,
			  nama_sobat:nama_sobat,
			 }; 

	$.ajax({
		type: "POST",
		async: false,
		url: "../controller/action_post_womgm.php",
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
$(document).on('click', '.editpendaftaran', function(){
	//alert($(this).data('id'));
	var key_fal = $(this).attr('key_fal');				
	var nama_lengkap = $(this).attr('nama_lengkap');				
	var no_wa = $(this).attr('no_wa');				
	var no_wa2 = $(this).attr('no_wa2');				
	var no_wa3 = $(this).attr('no_wa3');				
	var no_wa4 = $(this).attr('no_wa4');				
	var alamat = $(this).attr('alamat');				
	var rt1 = $(this).attr('rt1');				
	var rw = $(this).attr('rw');				
	var provinsi = $(this).attr('provinsi');				
	var kabupaten = $(this).attr('kabupaten');				
	var kecamatan = $(this).attr('kecamatan');				
	var kelurahan = $(this).attr('kelurahan');				
	var foto_rumah = $(this).attr('foto_rumah');				
	var foto_ktp = $(this).attr('foto_ktp');				
	var paket_kapten = $(this).attr('paket_kapten');				
	var lokasi = $(this).attr('lokasi');
	var status_lokasi = $(this).attr('status_lokasi');				
	var tahu_layanan = $(this).attr('tahu_layanan');				
	var alasan = $(this).attr('alasan');					
	var metode_pembayaran = $(this).attr('metode_pembayaran');					
	var no_rekening = $(this).attr('no_rekening');					
	var nama_sobat = $(this).attr('nama_sobat');					
	//.alert($(this).data('key'));
	
	/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
	var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
	var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
	var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
	var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
	var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
	//alert (nama_lengkap); return;
	
	$('#modaltambahdata').modal('show');									
	$('#nama_fal').val(nama_lengkap);
	$('#no_wa').val(no_wa);
	$('#no_wa2').val(no_wa2);
	$('#no_wa3').val(no_wa3);
	$('#no_wa4').val(no_wa4);
	$('#paket_fal').val(paket_kapten);
	$('#alamat_fal').val(alamat);				
	$('#rt').val(rt1);
	$('#rw').val(rw);				
	$('#kelurahan').val(kelurahan);				
	$('#kecamatan').val(kecamatan);				
	$('#kabupaten').val(kabupaten);				
	$('#provinsi').val(provinsi);
	$('#foto_rumah').val(foto_rumah);				
	$('#foto_ktp').val(foto_ktp);				
	$('#lokasi').val(lokasi);				
	$('#key_fal').val(key_fal);
	$('#status_lokasi').val(status_lokasi);				
	$('#tahu_layanan').val(tahu_layanan);				
	$('#alasan').val(alasan);				
	$('#metode_pembayaran').val(metode_pembayaran);				
	$('#no_rekening').val(no_rekening);				
	$('#nama_sobat').val(nama_sobat);				
});

//get data value kapten
$(document).on('click', '.aprove', function(){
	//alert($(this).data('id'));
	var key_fal = $(this).attr('key_fal');						
	//.alert($(this).data('key'));

	//alert (nama_lengkap); return;
	
	$('#modalverif').modal('show');	
	$('#key_fal').val(key_fal);
				
});

//get data value kapten
$(document).on('click', '.nominaledit', function(){
	//alert($(this).data('id'));
	var key_fal2 = $(this).attr('key_fal');						
	var nama_sobat2 = $(this).attr('nama_sobat');						
	var total = $(this).attr('total');						
	var ket_fls2 = $(this).attr('ket_fls');						
	//.alert($(this).data('key'));

	//alert (nama_lengkap); return;
	
	$('#nominalmodal').modal('show');									
	$('#key_fal2').val(key_fal2);
	$('#nama_sobat2').val(nama_sobat2);
	$('#total').val(total);
	$('#ket_fls2').val(ket_fls2);
				
});

//get data value kapten
$(document).on('click', '.nominalaprof', function(){
	//alert($(this).data('id'));
	event.stopPropagation();
	event.preventDefault();
	event.stopImmediatePropagation();
	var key_fal3 = $(this).attr('key_fal');						
	var nama_sobat = $(this).attr('nama_sobat');						
	var verif_nominal = $(this).attr('verif_nominal');						
	var id_mgm = $(this).attr('id_mgm');						
	//.alert($(this).data('key'));
	
	
	//var id = $('#id').data('daterangepicker').startDate.format('YYYY-MM-DD');
	//var id_user = $("#id_user").val();
	//alert (nama_sobat); return;
	//var akhir = $('#tgl_ikr').data('daterangepicker').endDate.format('YYYY-MM-DD');
	var value = {
		id_mgm:id_mgm
	  };
	  //alert(awal);
	  $(document).ajaxStart(function(){
			$("#wait").css("display", "block");
	  });
	  $(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
	  }); 
	  
	  $.ajax(
	  {
		url : "../controller/filter_iduser.php",
		type: "POST",
		data : value,
		dataType: 'JSON',
		success: function(data, textStatus, jqXHR)
		{        		
			var start_id_mgm = data.start_id_mgm;
			//var end_tgl = data.end_tgl;	
			//alert(start_iduser); return;
			$('#data_log').DataTable().clear().destroy();
			$('#data_log').dataTable({ 
				"processing": true,				
				"bDestroy": true,
				"bJQueryUI": true,
				"responsive": true,
				"language": {

						processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

					}, 				
				"ajax": {
					'type': 'POST',
					'url': '../models/data_log_mar.php',
					"data" : function(d){	
					   d.iduser= start_id_mgm;	
					},
				},
				"columns": [
					{ mData: 'no'} ,
					{ mData: 'tanggal_instalasi'} ,
					{ mData: 'id_mgm'} ,
					{ mData: 'username_fal'},
					{ mData: 'nama_sobat'}
				]
			});	
				
		}
	  });
	//alert (nama_lengkap); return;
	
	$('#modalaprof').modal('show');									
	$('#key_fal3').val(key_fal3);
	$('#nama_sobat').val(nama_sobat);
	$('#verif_nominal').val(verif_nominal);
				
});

//get data value kapten
$(document).on('click', '.nominalreset', function(){
	//alert($(this).data('id'));
	var key_fal_reset = $(this).attr('key_fal');							
	var verif_nominal = $(this).attr('verif_nominal');						
	var nama_sobat_riset = $(this).attr('nama_sobat');						
	//.alert($(this).data('key'));

	//alert (nama_lengkap); return;
	
	$('#modalreset').modal('show');									
	$('#key_fal3').val(key_fal3);
	$('#nama_sobat_riset').val(nama_sobat_riset);
	$('#verif_nominal').val(verif_nominal);
				
});

// Edit 			
$(document).on('click', '.actionaproved', function(){

var key_fal = $("#key_fal").val();			
var aproved = $("#aproved").val();


//alert(key_fal); return;
 
if(aproved == '' ){
	Swal.fire({
	  icon: 'error',
	  title: 'Oops...',
	  text: 'Pilih Aproved dulu brooo!',				  
	}) 
	return
} 
 


	   //alert (level); return;
$.ajax({
type: "POST",
url: "../controller/update_mgm_ver.php",
data: { 
			  key_fal:key_fal, 
			  aproved:aproved, 
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

// Edit 			
$(document).on('click', '.actionnominal', function(){

var key_fal2 = $("#key_fal2").val();			
var nama_sobat2 = $("#nama_sobat2").val();			
var nominal = $("#nominal").val();
var total = $("#total").val();
var id_mgm = $("#id_mgm").val();
var ket_fls2 = $("#ket_fls2").val();


//alert(id_mgm); return;
 
if(nominal == '' ){
	Swal.fire({
	  icon: 'error',
	  title: 'Oops...',
	  text: 'Pilih Aproved dulu brooo!',				  
	}) 
	return
} 
 


	   //alert (level); return;
$.ajax({
type: "POST",
url: "../controller/update_mgm_nominal.php",
data: { 
			  key_fal:key_fal2, 
			  nominal:nominal, 
			  nama_sobat:nama_sobat2, 
			  total:total, 
			  id_mgm:id_mgm, 
			  ket_fls:ket_fls2, 
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

// Edit 			
$(document).on('click', '.actionaprof', function(){

var key_fal3 = $("#key_fal3").val();			
var nama_sobat = $("#nama_sobat").val();
var verified_fls = $("#verified_fls").val();
var verif_nominal = $("#verif_nominal").val();
var ket_fls = $("#ket_fls").val();
var id_tran_jrnl = $("#id_tran_jrnl").val();

if(verified_fls == '' ){
	Swal.fire({
	  icon: 'error',
	  title: 'Oops...',
	  text: 'Pilih Verified dulu brooo!',				  
	}) 
	return
} 
 


	   //alert (level); return;
$.ajax({
type: "POST",
url: "../controller/update_mgm_aprof.php",
data: { 
			  key_fal:key_fal3, 
			  nama_sobat:nama_sobat, 
			  verified_fls:verified_fls, 
			  verif_nominal:verif_nominal, 
			  ket_fls:ket_fls, 
			  id_tran_jrnl:id_tran_jrnl, 
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

// Edit 			
$(document).on('click', '.actionriset', function(){

var key_fal = $("#key_fal_reset").val();			
var nama_sobat = $("#nama_sobat_riset").val();
var verif_nominal = $("#verif_nominal_riset").val();
var ket_fls = $("#ket_fls_riset").val();

if(verif_nominal == '' ){
	Swal.fire({
	  icon: 'error',
	  title: 'Oops...',
	  text: 'Pilih Verified dulu brooo!',				  
	}) 
	return
} 
 


	   //alert (level); return;
$.ajax({
type: "POST",
url: "../controller/update_mgm_reset.php",
data: { 
			  key_fal:key_fal, 
			  nama_sobat:nama_sobat,  
			  verif_nominal:verif_nominal, 
			  ket_fls:ket_fls,  
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





$(document).on('click', '.deletepengguna', function(){

	var key_fal = $(this).attr("key_fal");
	
	//alert (username_fal); return;

	if(confirm('Hapus id '+key_fal+'?'))

	{

		$.ajax({

			url:"../controller/delete_pendaftaran_mgm.php",

			method:"POST",

			data:{key_fal:key_fal},

			success:function(data){
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

			})

	}

});

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
</script>

</body>

</html>
</html>
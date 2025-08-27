<?php

session_start();
$level_kantor = $_SESSION["kantor"];


if (!isset($_SESSION["logingundala"])) {

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

							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']; ?></span>

								<img class="img-profile rounded-circle" src="../img/undraw_profile.svg">

							</a>


							<!-- Dropdown - User Information -->

							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

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

						<h1 class="h3 mb-0 text-gray-800">View Permit <?php //echo $_SESSION["level_user"]; 
																		?></h1>
					</div>

					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<?php
						if ($_SESSION["level_user"] != "Admin" && $_SESSION["level_user"] != "kapten" && $_SESSION["level_user"] != "ts") {
						?>
							<div class="my-2"></div>
							<!-- a href="index.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">HOME</span>
                                    </a -->


						<?php } ?>

					</div>


					<div class="row">
						<!-- Content Row -->

						<?php

						if ($_SESSION["level_user"] != "ts") {

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
										<h6 class="m-0 font-weight-bold text-primary">Data Intalasi Kendala Perijinan</h6>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered" id="tabel_pengguna" width="100%" cellspacing="0">
												<thead>
													<tr>
														<th>Key</th>
														<th>TGL FAL</th>
														<th>PERLAKUAN</th>
														<th>ID USER</th>
														<th>NAMA</th>
														<th>ALAMAT</th>
														<th>KETERANGAN</th>
														<th>PIC</th>
														<th>PEKERJAAN</th>
														<th>STATUS</th>
														<th>ACTION</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>Key</th>
														<th>TGL FAL</th>
														<th>PERLAKUAN</th>
														<th>ID USER</th>
														<th>NAMA</th>
														<th>ALAMAT</th>
														<th>KETERANGAN</th>
														<th>PIC</th>
														<th>PEKERJAAN</th>
														<th>STATUS</th>
														<th>ACTION</th>
													</tr>
												</tfoot>
												<tbody>
													<?php
													include('../controller/controller_mysqli.php');
													$acces_user_log = $_SESSION["username"];
													$table = mysqli_query($koneksi, "SELECT * FROM tbl_fal	
										  WHERE kd_layanan like '" . $kota . "' and status_wo in ('Masalah Perijinan') 
											ORDER BY key_fal DESC");
													$i = 0;
													$no = 1;
													while ($row = mysqli_fetch_assoc($table)) {



														if ($row['status_wo'] == 'Sudah Terpasang') {
															$row['type_status'] = '<small class="badge badge-success">' . strtoupper($row['status_wo']) . '</small>';
														} elseif ($row['status_wo'] == 'Proses Pengerjaan') {
															$row['type_status'] = '<small class="badge badge-warning">' . strtoupper($row['status_wo']) . '</small>';
														} elseif ($row['status_wo'] == 'Belum Terpasang') {
															$row['type_status'] = '<small class="badge badge-danger">' . strtoupper($row['status_wo']) . '</small>';
														} elseif ($row['status_wo'] == 'Masalah Perijinan') {
															$row['type_status'] = '<small class="badge badge-danger">' . strtoupper($row['status_wo']) . '</small>';
														} elseif ($row['status_wo'] == 'Pending') {
															$row['type_status'] = '<small class="badge badge-secondary">' . strtoupper($row['status_wo']) . '</small>';
														} else {
															$row['type_status'] = $data[$i]['status_wo'];
														}

													?>
														<tr id=<?php echo $row['key_fal']; ?>">
															<td data-target="no"> <?php echo $no; ?></td>
															<td data-target="tgl_fal"> <?php echo $row['tgl_fal']; ?></td>
															<td data-target="perlakuan"> <?php echo $row['perlakuan']; ?></td>
															<td data-target="username_fal"> <?php echo $row['username_fal']; ?></td>
															<td data-target="nama_fal"> <?php echo $row['nama_fal']; ?></td>
															<td data-target="alamat_fal"> <?php echo $row['alamat_fal']; ?></td>
															<td data-target="alamat_fal"> <?php echo $row['lain_lain']; ?></td>
															<td data-target="pic_ikr"> <?php echo $row['pic_ikr']; ?></td>
															<td data-target="jenis_pekerjaan"> <?php echo $row['jenis_pekerjaan']; ?></td>
															<td data-target="type_status"> <?php echo $row['type_status']; ?></td>
															<td>
																<div class="dropdown">
																	<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																		ACTION
																	</button>
																	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																		<a href="https://pendaftaran.kaptennaratel.com/<?php echo $row['foto_ktp']; ?>" target="_blank" class="dropdown-item">
																			Foto KTP</a>
																		<a name="edit" data-id="<?php echo $row['key_fal']; ?>" key_fal="<?php echo $row['key_fal']; ?>" status_wo="<?php echo $row['status_wo']; ?>" lain_lain="<?php echo $row['lain_lain']; ?>" class="dropdown-item perijinan">Edit</a>
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

		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

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

		<!-- Modal Button Action Edit -->
		<div class="modal fade" id="modal_perijinan" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-user">Masalah Perijinan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<form role="form" method="post" id="formdatapengguna">
							<!-- FORM ISIAN DATA ADMIN -->
							<?php
							if ($_SESSION["level_user"] != "ikr") {
							?>
								<input class="form-control" type="hidden" id="key_fal" name="key_fal" autocomplete="off">

								<div class="form-row mb-3">
									<label for="rang">Keterangan</label>
									<input class="form-control" type="text" id="lain_lain_perijinan" name="lain_lain_perijinan" placeholder="keterangan" autocomplete="off">
								</div>

								<div class="form-row mb-3">
									<label for="rang">Status Pelanggan</label>
									<select class="form-control" type="text" id="status_wo" name="status_wo" autocomplete="off">
										<option></option>
										<option value="Belum Terpasang">Solved</option>
										<option value="Ditolak">Rejected</option>
									</select>
								</div>

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


		<div class="modal fade" id="modaltambah" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

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
							if ($_SESSION["level_user"] != "ikr") {
							?>

								<div class="form-row">
									<label for="fname">Nama</label>
									<input class="form-control" type="text" id="nama" name="nama" placeholder="nama...">
								</div>
								<br />

								<div class="form-row">
									<label for="halaman">NO. Telepon</label>
									<input class="form-control" type="number" id="tlp" name="tlp" placeholder="telepon.." autocomplete="off">
								</div>
								<br />

								<div class="form-row">
									<label for="rang">kantor Cabang</label>
									<select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" required>
										<option></option>
										<option value="mlg">mlg</option>
										<option value="mlg1">Jalantra</option>
										<option value="pas">pas</option>
										<option value="batu">batu</option>
									</select>
								</div>
								<br />

								<div class="form-row">
									<label for="rang">Pic</label>
									<select class="form-control" type="text" id="pic" name="pic" autocomplete="off">
										<option>-</option>
										<?php if ($_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg1" /* && $_SESSION["level_kantor"] != "mlg" */) {  ?>
											<option>ivan</option>
										<?php } ?>
										<?php if ($_SESSION["level_kantor"] != "pas" /* && $_SESSION["level_kantor"] != "batu" */ && $_SESSION["level_kantor"] != "mlg" && $_SESSION["level_kantor"] != "mlg1") {  ?>
											<option>wawan</option>
											<option>roni</option>
										<?php } ?>
										<?php if ( /* $_SESSION["level_kantor"] != "pas" && */$_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg" && $_SESSION["level_kantor"] != "mlg1") {  ?>
											<option>ricky</option>
											<option>lukman</option>
											<option>bayu</option>
											<option>yusufpas</option>
											<option>roni</option>
											<option>satria</option>
											<option>adam</option>
											<option>wahyudi</option>
										<?php } ?>
										<?php if ($_SESSION["level_kantor"] != "pas" && $_SESSION["level_kantor"] != "batu" && $_SESSION["level_kantor"] != "mlg") {  ?>
											<option>rozak</option>
											<option>yuni</option>
										<?php } ?>
									</select>
								</div>
								<br />

								<div class="form-row">
									<label for="lname">Alamat</label>
									<input class="form-control" type="text" id="alamat" name="alamat" placeholder="alamat..." autocomplete="off">
								</div>
								<br />

								<div class="form-row">
									<label for="rang">RT</label>
									<input class="form-control" type="text" id="rt" name="rt" placeholder="rt..." autocomplete="off">
								</div>
								<br />

								<div class="form-row">
									<label for="rang">RW</label>
									<input class="form-control" type="text" id="rw" name="rw" placeholder="rw..." autocomplete="off">
								</div>
								<br />

								<div class="form-row">
									<label for="rang">Kelurahan</label>
									<input class="form-control" type="text" id="kelurahan" name="kelurahan" placeholder="kelurahan..." autocomplete="off">
								</div>
								<br />

								<div class="form-row">
									<label for="rang">Keterangan</label>
									<input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan" autocomplete="off">
								</div>
								<br />

								<div class="form-row">
									<textarea id="lain_lain" name="lain_lain" class="materialize-textarea"></textarea>
									<label for="lain_lain">Textarea</label>
								</div>
								<br />


								<hr>
								<button type="button" class="btn btn-success  pull-right actionpermit">Save</button>
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


		<div class="modal fade" id="modalsolved_nonikr" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

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
							if ($_SESSION["level_user"] != "ikr") {
							?>

								<div class="form-row">
									<label for="fname">ID</label>
									<input class="form-control" type="text" id="key_fal" name="key_fal" placeholder="nama...">
								</div>
								<br />

								<div class="form-row">
									<label for="halaman">Keterangan</label>
									<input class="form-control" type="text" id="lain_lain2" name="lain_lain2" placeholder="telepon.." autocomplete="off">
								</div>
								<br />

								<div class="form-row">
									<label for="rang">kantor Cabang</label>
									<select class="form-control" type="text" id="status2" name="status2" autocomplete="off" required>
										<option value=""></option>
										<option value="Solved">Solved</option>
										<option value="Not Solved">Not Solved</option>
									</select>
								</div>
								<br />

								<hr>
								<button type="button" class="btn btn-success  pull-right actioneditpermit">Save</button>
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

		<script>
			$('#lain_lain').val('New Text');
			M.textareaAutoResize($('#lain_lain'));
		</script>

		<script>
			function test() {
				if (document.getElementById('perlakuan').value == 'Diskon Biaya Instalasi') {
					document.getElementById('total_diskon').style.display = 'block';
					document.getElementById('keterangan_angsuran').style.display = 'none';
					document.getElementById('free').style.display = 'none';
					document.getElementById('pindah_alamat').style.display = 'none';
				} else if (document.getElementById('perlakuan').value == 'Angsuran Biaya Instalasi') {
					document.getElementById('total_diskon').style.display = 'none';
					document.getElementById('keterangan_angsuran').style.display = 'block';
					document.getElementById('free').style.display = 'none';
					document.getElementById('pindah_alamat').style.display = 'none';
				} else if (document.getElementById('perlakuan').value == 'Free Biaya Instalasi & Free Biaya Bulanan') {
					document.getElementById('total_diskon').style.display = 'none';
					document.getElementById('keterangan_angsuran').style.display = 'none';
					document.getElementById('free').style.display = 'block';
					document.getElementById('pindah_alamat').style.display = 'none';
				} else if (document.getElementById('perlakuan').value == 'Pindah Alamat') {
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

				var table = $('#tabel_permit_nonikr').DataTable({

					"responsive": true,

					"processing": true,

					"language": {

						processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

					},

					"ajax": {

						"url": "../models/datapengguna_permitnonikr.php",

						"type": "POST",

					},

					"paging": true,

					"lengthChange": true,

					"searching": true,

					"ordering": true,

					"info": true,

					"autoWidth": true,

					"responsive": true,

					"columns": [

						{
							mData: 'no'
						},

						{
							mData: 'nama'
						},

						{
							mData: 'alamat'
						},

						{
							mData: 'tlp'
						},

						{
							mData: 'tgl'
						},

						{
							mData: 'lain_lain'
						},

						{
							mData: 'kd_layanan'
						},

						{
							mData: 'kelurahan'
						},

						{
							mData: 'rt'
						},

						{
							mData: 'rw'
						},

						{
							mData: 'pic'
						},

						{
							mData: 'type_status'
						},

						{
							mData: 'action'
						},

					],

				});




				var table = $('#tabel_pengguna_ts').DataTable({

					"responsive": true,

					"processing": true,

					"language": {

						processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

					},

					"ajax": {

						"url": "../models/datapengguna_ts.php",

						"type": "POST",

					},

					"paging": true,

					"lengthChange": true,

					"searching": true,

					"ordering": true,

					"info": true,

					"autoWidth": true,

					"responsive": true,

					"columns": [

						{
							mData: 'no'
						},

						{
							mData: 'nama_fal'
						},

						{
							mData: 'alamat_fal'
						},

						{
							mData: 'username_fal'
						},

						{
							mData: 'modem'
						},

						{
							mData: 'kabel1'
						},

						{
							mData: 'kabel2'
						},

						{
							mData: 'kabel3'
						},

						{
							mData: 'produk'
						},

						{
							mData: 'pic'
						},

						{
							mData: 'pic2'
						},

						{
							mData: 'status'
						},

						{
							mData: 'status2'
						},

					],

				});

				$(document).on('click', '.insertkptn', function() {
					$('#modaltambah').modal('show');
				});

				// INSERT 			
				$(document).on('click', '.actionpermit', function() {

					var nama = $("#nama").val();

					var tlp = $("#tlp").val();

					var kd_layanan = $("#kd_layanan").val();

					var alamat = $("#alamat").val();

					var rt = $("#rt").val();

					var rw = $("#rw").val();

					var kelurahan = $("#kelurahan").val();

					var tlp_fal = $("#tlp_fal").val();

					var pic = $("#pic").val();

					var lain_lain = $("#lain_lain").val();

					//alert(paket_fal); return;

					if (nama == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Nama Belum Terisi!',
						})
						return
					}

					if (alamat == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Alamat ODP Belum Terisi!',
						})
						return
					}

					if (tlp == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No Telfon Belum Terisi!',

						})
						return
					}

					if (rt == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'RT Belum Terisi!',

						})
						return
					}

					if (rw == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'RW Belum Terisi!',

						})
						return
					}

					if (kelurahan == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Kelurahan Belum Terisi!',

						})
						return
					}

					//alert(get_distribusi); return;

					var value = {
						nama: nama,
						tlp: tlp,
						kd_layanan: kd_layanan,
						alamat: alamat,
						rt: rt,
						rw: rw,
						kelurahan: kelurahan,
						pic: pic,
						lain_lain: lain_lain,
					};

					$.ajax({

						type: "POST",
						async: false,
						url: "../controller/action_insert_permit.php",
						data: value,
						success: function(data) {
							//alert(data);
							Swal.fire(
								'Good job!',
								'You clicked the button!',
								'success'
							).then(function(success) {
								//if (data == 'succes') {
								//alert('a');
								window.location.reload(true);
								//}
							})
						}
					});

				});

				//get data value kapten
				$(document).on('click', '.editkptn', function() {
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
					$('#tgl_fal2').val(tgl_fal);
					$('#lain_lain2').val(lain_lain);
					$('#total_diskon2').val(total_diskon);
					$('#free2').val(free);
					$('#pindah_alamat2').val(pindah_alamat);
					$('#keterangan_angsuran2').val(keterangan_angsuran);

				});

				//get data value kapten
				$(document).on('click', '.perijinan', function() {
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
				$(document).on('click', '.actionperijinan', function() {

					var key_fal = $("#key_fal").val();
					var lain_lain_perijinan = $("#lain_lain_perijinan").val();
					var status_wo = $("#status_wo").val();

					//alert(nama_fal2); return;

					if (lain_lain_perijinan == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Keterangan Belum Terisi!',
						})
						return
					}

					if (status_wo == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Alamat ODP Belum Terisi!',
						})
						return
					}

					//alert(get_distribusi); return;

					var value = {
						lain_lain_perijinan: lain_lain_perijinan,
						status_wo: status_wo,
						key_fal: key_fal,
					};

					$.ajax({

						type: "POST",
						async: false,
						url: "../controller/action_solv_perijinan.php",
						data: value,
						success: function(data) {
							//alert(data);
							Swal.fire(
								'Good job!',
								'You clicked the button!',
								'success'
							).then(function(success) {
								//if (data == 'succes') {
								//alert('a');
								window.location.reload(true);
								//}
							})
						}
					});

				});
				// Edit 			
				$(document).on('click', '.actioneditkapten', function() {

					var jenis_pekerjaan = $("#jenis_pekerjaan").val();

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

					if (nama_fal2 == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Nama Belum Terisi!',
						})
						return
					}

					if (alamat_fal2 == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Alamat ODP Belum Terisi!',
						})
						return
					}

					if (username_fal2 == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'ID User Belum Terisi!',

						})
						return
					}

					if (password_fal2 == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Password Belum Terisi!',

						})
						return
					}

					if (tlp_fal2 == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No Telfon Belum Terisi!',

						})
						return
					}

					if (paket_fal2 == '-') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Paket Belum Terisi!',

						})
						return
					}

					if (rt2 == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'RT Belum Terisi!',

						})
						return
					}

					if (rw2 == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'RW Belum Terisi!',

						})
						return
					}

					if (kelurahan2 == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Kelurahan Belum Terisi!',

						})
						return
					}

					if (tgl_fal2 == '') {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Tgl Fal Belum Terisi!',

						})
						return
					}


					//alert(get_distribusi); return;

					var value = {
						jenis_pekerjaan: jenis_pekerjaan,
						nama_fal: nama_fal2,
						kd_layanan: kd_layanan2,
						pic_ikr: pic_ikr2,
						alamat_fal: alamat_fal2,
						rt: rt2,
						rw: rw2,
						kelurahan: kelurahan2,
						tlp_fal: tlp_fal2,
						jenis_wo: jenis_wo2,
						produk: produk2,
						perlakuan: perlakuan2,
						total_diskon: total_diskon2,
						keterangan_angsuran: keterangan_angsuran2,
						free: free2,
						pindah_alamat: pindah_alamat2,
						pembayaran: pembayaran2,
						paket_fal: paket_fal2,
						tgl_fal: tgl_fal2,
						username_fal: username_fal2,
						verified: verified2,
						total: total2,
						letak_odp: letak_odp2,
						password_fal: password_fal2,
						status_wo: status_wo2,
						lain_lain: lain_lain2,
					};

					$.ajax({

						type: "POST",
						async: false,
						url: "../controller/action_editadmin_kptn.php",
						data: value,
						success: function(data) {
							//alert(data);
							Swal.fire(
								'Good job!',
								'You clicked the button!',
								'success'
							).then(function(success) {
								//if (data == 'succes') {
								//alert('a');
								window.location.reload(true);
								//}
							})
						}
					});

				});




				$(document).on('click', '.deletepengguna', function() {

					var username_fal = $(this).attr("username_fal");

					//alert (username_fal); return;

					if (confirm('Hapus id ' + username_fal + '?'))

					{

						$.ajax({

							url: "../controller/delete.php",

							method: "POST",

							data: {
								username_fal: username_fal
							},

							success: function(data) {
								//alert(data);
								Swal.fire(
									'Good job!',
									'You clicked the button!',
									'success'
								).then(function(success) {
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

				if (navigator.geolocation) {

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

				if (error.code == 1) {

					result.innerHTML = "Harap login melalui Grub Telegram (Grup WO) atau hubungi (IRSYAD)";

				} else if (error.code == 2) {

					result.innerHTML = "The network is down or the positioning service can't be reached.";

				} else if (error.code == 3) {

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
			$('#OLT').change(function() {
				var a = $('#OLT').val();
				//alert (a);
				$.ajax({
					url: "../create/create_kode_user.php",
					data: {
						"value": $("#OLT").val()
					},
					//dataType:"html",
					type: "post",
					success: function(data) {
						//alert(data);
						$('#username_fal').val(data);
					}
				});
			});
		</script>

</body>

</html>

</html>
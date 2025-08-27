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
	<link

		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"

		rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">


	<link rel="stylesheet" href="../asset/vendor/datatables/dataTables.bootstrap4.min.css">

	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="../asset/plugins/iCheck/all.css">


	<!-- Custom styles for this template-->

	<link href="../asset/css/sb-admin-2.css" rel="stylesheet">





	<link rel="stylesheet" href="../asset/css/bootstrap-datepicker.min.css">



</head>

<style>
	#map {
		height: 500px;
		width: 100%;
		position: relative;
	}

	/* General styles for custom map control buttons */
	.custom-map-control-button {
		background-color: #fff;
		border: 2px solid #fff;
		border-radius: 3px;
		box-shadow: 0 2px 6px rgba(0, 0, 0, .3);
		margin: 10px;
		padding: 8px 16px;
		font-size: 14px;
		font-weight: bold;
		color: #5f6368;
		text-align: center;
		outline: none;
		cursor: pointer;
		transition: background-color 0.3s, color 0.3s;
	}

	.custom-map-control-button:hover {
		background-color: #4285f4;
		color: #fff;
	}

	/* Responsive styles for tablets and smaller devices */
	@media (max-width: 768px) {
		#map {
			height: 300px;
		}

		.custom-map-control-button {
			font-size: 12px;
			padding: 6px 12px;
			margin: 5px;
		}
	}

	/* Responsive styles for mobile phones */
	@media (max-width: 480px) {
		#map {
			height: 250px;
		}

		.custom-map-control-button {
			font-size: 12px;
			padding: 4px 8px;
			margin: 3px;
		}
	}

	/* Pastikan dropdown autocomplete Google berada di atas elemen lainnya */
	.pac-container {
		z-index: 1055 !important;
		/* Pastikan ini lebih tinggi dari elemen modal dan lainnya */
		position: absolute !important;
		/* Pastikan dropdown tetap di lokasi yang benar */
	}

	/* Tambahkan padding dan font style jika diperlukan */
	.pac-item {
		padding: 10px;
		font-size: 14px;
	}

	.modal {
		z-index: 1050;
	}

	.modal-backdrop {
		z-index: 1049;
	}
</style>

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

								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']; ?></span>

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

						<h1 class="h3 mb-0 text-gray-800">Instalasi Tiang Baru<?php //echo $_SESSION["level_user"]; 
																				?></h1>



					</div>

					<div class="d-sm-flex align-items-center justify-content-between mb-4">


						<?php

						if ($_SESSION["level_user"] != "Admin" && $_SESSION["level_user"] != "kapten" && $_SESSION["level_user"] != "ts") {

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
								<h6 class="m-0 font-weight-bold text-primary">Data Instalasi Tiang Belum Verified</h6>
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
												<th>LABEL TIANG</th>
												<th>JENIS TIANG</th>
												<th>NAMA TIANG</th>
												<th>RUAS JALAN</th>
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
												<th>LABEL TIANG</th>
												<th>JENIS TIANG</th>
												<th>NAMA TIANG</th>
												<th>RUAS JALAN</th>
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
								<h6 class="m-0 font-weight-bold text-primary">Data Instalasi Tiang Verified</h6>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="tabel_solved" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th></th>
												<th>NO</th>
												<th>KEY</th>
												<th>LABEL TIANG</th>
												<th>JENIS TIANG</th>
												<th>NAMA TIANG</th>
												<th>RUAS JALAN</th>
												<th>KETERANGAN</th>
												<th>PIC</th>
												<th>STATUS</th>
												<th>LAYANAN</th>
												<th>MAPS</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th></th>
												<th>NO</th>
												<th>KEY</th>
												<th>LABEL TIANG</th>
												<th>JENIS TIANG</th>
												<th>NAMA TIANG</th>
												<th>RUAS JALAN</th>
												<th>KETERANGAN</th>
												<th>PIC</th>
												<th>STATUS</th>
												<th>LAYANAN</th>
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

	<div class="modal fade" id="modaltambahdata" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title">Tambah Data</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form role="form" method="post" id="formdatapengguna">

						<!-- FORM ISIAN DATA ADMIN -->
						<?php if ($_SESSION["level_user"] != "ikr") { ?>

							<div class="form-group">
								<label for="id_tiang">Label Tiang</label>
								<select class="form-control" id="id_tiang" name="id_tiang" autocomplete="off" readonly>
									<?php
									include('../controller/controller_mysqli.php');
									$sql_user = mysqli_query($koneksi, "SELECT a.id_tiang + 1 as id FROM tbl_instalasi_tiang a ORDER BY a.id_tiang DESC LIMIT 1");
									while ($data_user = mysqli_fetch_array($sql_user)) {
										echo '<option value="' . $data_user['id'] . '">' . $data_user['id'] . '</option>';
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label for="nama_tiang">Arah Tiang Dari Jalan</label>
								<select class="form-control" id="nama_tiang" name="nama_tiang" required>
									<option>Timur</option>
									<option>Barat</option>
									<option>Selatan</option>
									<option>Utara</option>
								</select>
							</div>

							<div class="form-group">
								<label for="jenis_tiang">Jenis Tiang</label>
								<select class="form-control" id="jenis_tiang" name="jenis_tiang" required>
									<option>Crosing 9 M</option>
									<option>Crosing 7 M</option>
									<option>Distribusi 6 M</option>
								</select>
							</div>

							<div class="form-group">
								<label for="kd_layanan">Kantor Cabang</label>
								<select class="form-control" id="kd_layanan" name="kd_layanan" required>
									<option value="mlg">NARATEL</option>
									<option value="pas">SBM</option>
									<option value="batu">JALIBAR</option>
									<option value="mlg1">JALANTRA</option>
								</select>
							</div>

							<div class="form-group">
								<label for="pic_vendor">PIC Vendor</label>
								<select class="form-control" id="pic_vendor" name="pic_vendor">
									<?php
									include('../controller/controller_mysqli.php');
									$sql_user = mysqli_query($koneksi, "SELECT * FROM tb_vendor WHERE status_aktif='y'");
									while ($data_user = mysqli_fetch_array($sql_user)) {
										echo '<option value="' . $data_user['user_key'] . '">' . $data_user['user_key'] . '</option>';
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label for="daerah">Daerah</label>
								<select class="form-control selectpicker" id="daerah" name="daerah" data-live-search="true">
									<option value="">Pilih Daerah</option>
									<?php
									include('koneksi.php');
									$sql_user = mysqli_query($koneksi, "
                                    SELECT a.kd_kel, a.kd_kec, a.kd_kabkota, b.nama_provinsi, c.nama_kabkota, d.nama_kec, a.nama_kel 
                                    FROM tb_kelurahan a
                                    LEFT JOIN tb_provinsi b ON a.kd_prov = b.kd_provinsi
                                    LEFT JOIN tb_kabkota c ON a.kd_kabkota = c.kd_kabkota
                                    LEFT JOIN tb_kecamatan d ON a.kd_kec = d.kd_kec
                                    WHERE a.status='y'
                                ");
									while ($data_user = mysqli_fetch_array($sql_user)) {
										echo '<option value="' . $data_user['kd_kel'] . '|' . $data_user['kd_kec'] . '|' . $data_user['kd_kabkota'] . '">' .
											$data_user['nama_kel'] . ', ' . $data_user['nama_kec'] . ', ' . $data_user['nama_kabkota'] . ', ' . $data_user['nama_provinsi'] .
											'</option>';
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label for="rt">RT</label>
								<input class="form-control" type="number" id="rt" name="rt" placeholder="RT..." autocomplete="off">
							</div>

							<div class="form-group">
								<label for="rw">RW</label>
								<input class="form-control" type="number" id="rw" name="rw" placeholder="RW..." autocomplete="off">
							</div>

							<div class="form-group">
								<form id="alamat" style="overflow: visible; position: static;">
									<span>Cari Lokasi Anda</span>
									<input class="form-control" id="alamat" name="alamat" type="text" placeholder="Enter an address" autocomplete="off">
								</form>
							</div>

							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<input class="form-control" type="text" id="keterangan" name="keterangan" placeholder="Keterangan..." autocomplete="off">
							</div>

							<!-- Menampilkan hasil pilihan daerah -->
							<div class="form-group">
								<input type="hidden" class="form-control" type="text" id="provinsi" readonly>

								<div class="form-group">
									<input type="hidden" class="form-control" type="text" id="kelurahan" readonly>

									<input type="hidden" class="form-control" type="text" id="kecamatan" readonly>

									<input type="hidden" class="form-control" type="text" id="kabupaten" readonly>
								</div>

								<div id="map" style="height: 300px; width: 100%;"></div> <!-- Tentukan tinggi dan lebar peta -->
								<input type="hidden" id="coordinates" name="coordinates">
								<input type="hidden" id="long_lat" name="long_lat">
							</div>
							<!-- 
							<div id="map" style="height: 300px; width: 100%;"></div>
							<input type="hidden" id="coordinates" name="coordinates">
							<input type="hidden" id="long_lat" name="long_lat"> -->

							<div class="modal-footer">
								<button type="button" class="btn btn-success actionkapten">Insert</button>
								<button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Reset</button>
							</div>

						<?php } ?>
						<!-- END ISIAN DATA ADMIN -->

					</form>
				</div>

			</div>
		</div>
	</div>


	<div class="modal fade" id="modalverifikasi" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

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
						if ($_SESSION["level_user"] != "ikr") {
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
							<br />

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
							<option value='Abdur Rozak'>ABDUR ROZAK</option>
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
					<br />

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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

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

	<script>
		$(document).ready(function() {
			var table = $('#tabel_solved').DataTable({

				"responsive": true,

				"processing": true,

				"language": {

					processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'

				},

				"ajax": {

					"url": "../models/modal_tiang_solved.php",

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
						mData: 'targets'
					},

					{
						mData: 'no'
					},

					{
						mData: 'key'
					},

					{
						mData: 'id'
					},

					{
						mData: 'jenis_tiang'
					},

					{
						mData: 'nama_tiang'
					},

					{
						mData: 'alamat'
					},

					{
						mData: 'keterangan'
					},

					{
						mData: 'pic_vendor'
					},

					{
						mData: 'type_status'
					},

					{
						mData: 'layanan'
					},

					{
						mData: 'maps'
					},

				],

				'drawCallback': function() {
					$('input[type="checkbox"]').iCheck({
						checkboxClass: 'icheckbox_minimal-red',
						radioClass: 'iradio_flat-green'
					});
				},

				'columnDefs': [{
					'targets': 0,
					'checkboxes': {
						'selectRow': true,
						'selectCallback': function(nodes, selected) {
							$('input[type="checkbox"]', nodes).iCheck('update');
						},
						'selectAllCallback': function(nodes, selected, indeterminate) {
							$('input[type="checkbox"]', nodes).iCheck('update');
						}
					}
				}],
				'select': {
					'style': 'multi'
				},
				'order': [
					[1, 'asc']
				]
			});

			// Handle iCheck change event for "select all" control
			var table = $('#tabel_solved').DataTable();
			$(table.table().container()).on('ifChanged', '.dt-checkboxes-select-all input[type="checkbox"]', function(event) {
				var col = table.column($(this).closest('th'));
				col.checkboxes.select(this.checked);
			});

			// Handle iCheck change event for checkboxes in table body
			var table = $('#tabel_solved').DataTable();
			$(table.table().container()).on('ifChanged', '.dt-checkboxes', function(event) {
				var cell = table.cell($(this).closest('td'));
				cell.checkboxes.select(this.checked);
			});

			// Remove the checked state from "All" if any checkbox is unchecked
			$('.check').on('ifUnchecked', function(event) {
				$('#check-all').iCheck('uncheck');
			});

			// Make "All" checked if all checkboxes are checked
			$('.check').on('ifChecked', function(event) {
				if ($('.check').filter(':checked').length == $('.check').length) {
					$('#check-all').iCheck('check');
				}
			});

			$("#set").click(function(event) {
				//event.stopPropagation();
				//event.preventDefault();
				//event.stopImmediatePropagation();		
				var pilih_id = [];
				//alert (pilih_id); return;
				//var lognya = this;
				var otable = $('#tabel_solved').DataTable();

				var rows_selected = otable.column(0).checkboxes.selected();
				//var rows_selected = otable.$(".minimal:checked",{"page":"all"});
				$.each(rows_selected, function(index, rowId) {

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

			$('#submit_select_client').click(function(event) {
				event.stopPropagation();
				event.preventDefault();
				event.stopImmediatePropagation();
				//var info_blasting = $("#info_blasting").val();
				var all_id = $("#all_id").val();
				var pihak1 = $("#pihak1").val();
				var pihak2 = $("#pihak2").val();
				//var select_user = all_id.length;
				var value = {
					all_id: all_id,
					pihak1: pihak1,
					pihak2: pihak2,
				};


				//alert (value); return;

				//alert(all_id); return;
				$.ajax({
					type: "POST",
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
		$('#provinsi').select2().on('change', function() {
			//var a = $('.js-example-basic-multiple').val();
			var prov = $(this).val();
			//alert(prov);
			if (prov) {
				$.ajax({
					type: 'POST',
					url: "../create/list_kabupaten.php",
					data: 'prov_id=' + prov,
					success: function(html) {
						//alert(html);
						$('#kabupaten').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
				});
			} else {
				$('#kabupaten').html('<option value="">Select Provinsi dulu</option>');
				//$('#city').html('<option value="">Select state first</option>'); 
			}
		});

		//add kec
		$('#kabupaten').on('change', function() {
			var kab = $(this).val();
			//alert(kab);
			if (kab) {
				$.ajax({
					type: 'POST',
					url: "../create/list_kecamatan.php",
					data: 'kab_id=' + kab,
					success: function(html) {
						$('#kecamatan').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
				});
			} else {
				$('#kecamatan').html('<option value="">Select kecamatan dulu</option>');
				//$('#city').html('<option value="">Select state first</option>'); 
			}
		});

		//add kel
		$('#kecamatan').on('change', function() {
			var kec = $(this).val();
			//alert(kab);
			if (kec) {
				$.ajax({
					type: 'POST',
					url: "../create/list_kelurahan.php",
					data: 'kec_id=' + kec,
					success: function(html) {
						$('#kelurahan').html(html);
						//$('#city').html('<option value="">Select state first</option>'); 
					}
				});
			} else {
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

					"url": "../models/modal_tiang_notsolved.php",

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
						mData: 'key'
					},

					{
						mData: 'id'
					},

					{
						mData: 'jenis_tiang'
					},

					{
						mData: 'nama_tiang'
					},

					{
						mData: 'alamat'
					},

					{
						mData: 'keterangan'
					},

					{
						mData: 'pic_vendor'
					},

					{
						mData: 'type_status'
					},

					{
						mData: 'maps'
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

				$('#modaltambahdata').modal('show');


			});

			// INSERT 			
			$(document).on('click', '.actionkapten', function() {

				var nama_tiang = $("#nama_tiang").val();
				var pic_vendor = $("#pic_vendor").val();
				var jenis_tiang = $("#jenis_tiang").val();
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
				var long_lat = $("#long_lat").val();
				var latitude = '';
				var longitude = '';

				if (long_lat !== '') {
					var coords = long_lat.split(',');
					latitude = coords[0].trim();
					longitude = coords[1].trim();
				}

				// Validasi input
				if (nama_tiang == '') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Nama Tiang Belum Terisi!'
					});
					return;
				}

				if (jenis_tiang == '') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Jenis Tiang Belum Terisi!'
					});
					return;
				}

				if (pic_vendor == '') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'PIC Vendor Belum Terisi!'
					});
					return;
				}

				if (alamat == '') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Alamat Belum Terisi!'
					});
					return;
				}

				if (provinsi == '') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Provinsi Belum Terisi!'
					});
					return;
				}

				if (kabupaten == '') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Kabupaten Belum Terisi!'
					});
					return;
				}
				// Kirim data ke backend
				var value = {
					nama_tiang: nama_tiang,
					jenis_tiang: jenis_tiang,
					pic_vendor: pic_vendor,
					kd_layanan: kd_layanan,
					id_tiang: id_tiang,
					alamat: alamat,
					rt: rt,
					rw: rw,
					kelurahan: kelurahan,
					kecamatan: kecamatan,
					kabupaten: kabupaten,
					provinsi: provinsi,
					keterangan: keterangan,
					lokasi: lokasi,
					status: status,
					latitude: latitude, // <-- Tambahkan ini
					longitude: longitude // <-- Tambahkan ini
				};

				$.ajax({
					type: "POST",
					url: "../controller/action_insert_tiang.php",
					data: value,
					success: function(data) {
						Swal.fire('Good job!', 'Data berhasil disimpan!', 'success').then(function() {
							window.location.reload(true);
						});
					},
					error: function() {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Gagal menyimpan data!'
						});
					}
				});
			});

			//get data value kapten
			$(document).on('click', '.edittiang', function() {
				//alert a; return;
				var id_tiang2 = $(this).attr('id_tiang');

				/* var nama_fal = $('#'+id).children('td[data-target=nama_fal]').text();
				var alamat_fal = $('#'+id).children('td[data-target=alamat_fal]').text();
				var tlp_fal = $('#'+id).children('td[data-target=tlp_fal]').text();
				var paket_fal = $('#'+id).children('td[data-target=paket_fal]').text();
				var tanggal_instalasi = $('#'+id).children('td[data-target=tanggal_instalasi]').text();
				var username_fal = $('#'+id).children('td[data-target=nama_fal]').text(); */
				alert(id_tiang2);

				$('#modalverifikasi').modal('show');
				$('#id_tiang2').val(id_tiang2);


			});

			// Edit 			
			$(document).on('click', '.actionverifikasi', function() {

				var id_tiang2 = $("#id_tiang2").val();
				var verifikasi = $("#verifikasi").val();


				if (verifikasi == '') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Verifikasi Tidak Boleh Kosong!',
					})
					return
				}

				//alert(get_distribusi); return;

				var value = {
					id_tiang: id_tiang2,
					verifikasi: verifikasi,

				};

				$.ajax({

					type: "POST",
					async: false,
					url: "../controller/action_edittiang_verifikasi.php",
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

			// INSERT 			
			$(document).on('click', '.actionkapten', function() {

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

				if (nama_fal == '') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Nama Belum Terisi!',
					})
					return
				}

				if (alamat_fal == '') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Alamat ODP Belum Terisi!',
					})
					return
				}

				if (username_fal == '') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'ID User Belum Terisi!',

					})
					return
				}

				if (password_fal == '') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Password Belum Terisi!',

					})
					return
				}

				if (tlp_fal == '') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'No Telfon Belum Terisi!',

					})
					return
				}

				if (paket_fal == '-') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Paket Belum Terisi!',

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

				if (tgl_fal == '') {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Tgl Fal Belum Terisi!',

					})
					return
				}


				//alert(get_distribusi); return;

				var value = {
					nama_fal: nama_fal,
					kd_layanan: kd_layanan,
					pic_ikr: pic_ikr,
					alamat_fal: alamat_fal,
					rt: rt,
					rw: rw,
					kelurahan: kelurahan,
					tlp_fal: tlp_fal,
					pic: pic,
					status: status,
					status2: status2,
					jenis_wo: jenis_wo,
					produk: produk,
					perlakuan: perlakuan,
					total_diskon: total_diskon,
					keterangan_angsuran: keterangan_angsuran,
					free: free,
					pindah_alamat: pindah_alamat,
					pembayaran: pembayaran,
					paket_fal: paket_fal,
					tgl_fal: tgl_fal,
					username_fal: username_fal,
					verified: verified,
					total: total,
					letak_odp: letak_odp,
					password_fal: password_fal,
					status_wo: status_wo,
					lain_lain: lain_lain,
					ket: k,
				};

				$.ajax({

					type: "POST",
					async: false,
					url: "../controller/action_insert_kptn.php",
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

			document.getElementById('daerah').addEventListener('change', function() {
				// Mendapatkan nilai dari option yang dipilih
				var selectedValue = this.value;

				// Memisahkan nilai berdasarkan tanda '|'
				var values = selectedValue.split('|');

				// Mengisi input dengan nilai yang dipilih
				document.getElementById('provinsi').value = values[0]; // Menampilkan kode provinsi
				document.getElementById('kelurahan').value = values[0]; // Menampilkan kode kelurahan
				document.getElementById('kecamatan').value = values[1]; // Menampilkan kode kecamatan
				document.getElementById('kabupaten').value = values[2]; // Menampilkan kode kabupaten/kota
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
		$('#tiang').change(function() {
			var a = $('#tiang').val();
			//alert (a);
			$.ajax({
				url: "../create/create_kode_tiang.php",
				data: {
					"value": $("#tiang").val()
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

	<script>
		function initMap() {
			// Create a new map centered on a default location
			const map = new google.maps.Map(document.getElementById('map'), {
				center: {
					lat: -7.983908,
					lng: 112.621391
				},
				zoom: 8
			});

			// Initialize Geocoder
			const geocoder = new google.maps.Geocoder();

			// Create a draggable marker
			const marker = new google.maps.Marker({
				map: map,
				position: {
					lat: -7.983908,
					lng: 112.621391
				},
				draggable: true
			});

			// Add an event listener to the marker to update the coordinates when it is dragged
			google.maps.event.addListener(marker, 'dragend', function(event) {
				// Update the hidden inputs with lat, lng
				const latLng = event.latLng;
				document.getElementById('coordinates').value = `https://www.google.com/maps/search/?api=1&query=${latLng.lat()},${latLng.lng()}`;
				document.getElementById('long_lat').value = `${latLng.lat()}, ${latLng.lng()}`;
			});

			// Set up the autocomplete feature for the address input field
			const input = document.getElementById('alamat');
			const autocomplete = new google.maps.places.Autocomplete(input);

			autocomplete.addListener('place_changed', function() {
				const place = autocomplete.getPlace();
				if (place.geometry) {
					// map.setCenter(place.geometry.location);
					// marker.setPosition(place.geometry.location);
					document.getElementById('coordinates').value = `https://www.google.com/maps/search/?api=1&query=${place.geometry.location.lat()},${place.geometry.location.lng()}`;
					document.getElementById('long_lat').value = `${place.geometry.location.lat()}, ${place.geometry.location.lng()}`;
				} else {
					alert('No details available for input: ' + input.value);
				}
			});

			// Create a button to get the user's current location
			const locationButton = document.createElement("button");
			locationButton.textContent = "Get My Location";
			locationButton.classList.add("custom-map-control-button");
			locationButton.id = "get-location";
			locationButton.type = "button";

			locationButton.addEventListener("click", function(event) {
				event.preventDefault();
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(function(position) {
						const pos = {
							lat: position.coords.latitude,
							lng: position.coords.longitude
						};
						map.setCenter(pos);
						marker.setPosition(pos);
						document.getElementById('coordinates').value = `https://www.google.com/maps/search/?api=1&query=${pos.lat},${pos.lng}`;
						document.getElementById('long_lat').value = `${pos.lat}, ${pos.lng}`;
					}, function(error) {
						alert("Error getting location: " + error.message);
					});
				} else {
					alert("Geolocation not supported.");
				}
			});

			map.controls[google.maps.ControlPosition.TOP_RIGHT].push(locationButton);
		}

		// Function to load the Google Maps API
		function loadGoogleMapsAPI() {
			const script = document.createElement('script');
			script.src = 'api_maps/get_api_key.php?callback=initMap';
			script.async = true;
			script.defer = true;
			document.head.appendChild(script);
		}

		window.onload = loadGoogleMapsAPI;
	</script>

</body>

</html>

</html>
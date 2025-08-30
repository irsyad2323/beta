<?php
session_start();
$level_user = $_SESSION["level_user"];
$acces_user_log = $_SESSION["username"];
$leveladmin = $_SESSION["level_admin"];

if (!isset($_SESSION["logingundala"])) {

	header("location:login.php");

	exit;
}

if (isset($_SESSION['username'])) {
	$access_user_log = $_SESSION['username'];
} else {
	// Jika session tidak ada, redirect ke halaman login dengan parameter
	header("Location: login.php?session=expired");
	exit();
}

if ($level_user == 'kapten' or $level_user == 'vendor_marketing' or $level_user == 'ikr' or $level_user == 'adminwo_fulus' or $level_user == 'permit' or $level_user == 'vendor' or $level_user == 'psg_dcp') {
	$kota = $_SESSION["level_kantor"];
	if ($kota == 'mlg') {
		$hasil = '<small class="badge badge-success">NARATEL</small>';
	} elseif ($kota == 'pas') {
		$hasil = '<small class="badge badge-success">SBM</small>';
	} elseif ($kota == '%%%') {
		$hasil = '<small class="badge badge-success">ALL CABANG</small>';
	} elseif ($kota == 'batu') {
		$hasil = '<small class="badge badge-success">JALIBAR</small>';
	} elseif ($kota == 'mlg1') {
		$hasil = '<small class="badge badge-success">JALANTRA</small>';
	}
} else {
	echo ('Session Berakhir Login Kembali??');
	header("location:login.php");
	die();
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
	<link href="css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
	<title>SB Admin 2 - IKR <?php echo $levelad ?></title>
	<link rel="icon" type="image/x-icon" href="img/icons/kaptennaratel.png" />
	<link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="asset/css/sb-admin-2.css" rel="stylesheet">
	<link href="asset/css/custom.css" rel="stylesheet">
	<link href="css/fix-accessibility.css" rel="stylesheet">
	<link href="css/button-fix.css" rel="stylesheet">
	<link rel="stylesheet" href="asset/vendor/datatables/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="asset/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="asset/plugins/iCheck/all.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	
	<style>
	/* Tab styling */
	.tab {
		overflow: hidden;
		border: 1px solid #ddd;
		background-color: #f8f9fa;
		margin-bottom: 10px;
	}
	.tab button {
		background-color: #e9ecef;
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 12px 20px;
		transition: 0.3s;
		color: #495057;
		font-weight: 500;
		border-right: 1px solid #ddd;
	}
	.tab button:hover {
		background-color: #007bff;
		color: white;
	}
	.tab button.active {
		background-color: #007bff;
		color: white;
	}
	.tabcontent {
		display: none;
		padding: 15px;
		border: 1px solid #ddd;
		border-top: none;
		background-color: white;
	}
	/* Loader */
	#loader {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
		z-index: 9999;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}
	.loader-content {
		text-align: center;
		color: white;
	}
	.loading-bars {
		display: flex;
		gap: 4px;
		margin-bottom: 20px;
		justify-content: center;
		align-items: center;
	}
	.bar {
		width: 8px;
		height: 60px;
		background: white;
		animation: loading 1.2s infinite ease-in-out;
	}
	.bar:nth-child(2) { animation-delay: -1.1s; }
	.bar:nth-child(3) { animation-delay: -1.0s; }
	.bar:nth-child(4) { animation-delay: -0.9s; }
	.bar:nth-child(5) { animation-delay: -0.8s; }
	.loader-text {
		font-size: 18px;
		font-weight: 500;
		margin-bottom: 10px;
		animation: pulse 1.5s ease-in-out infinite;
	}
	.loader-subtext {
		font-size: 14px;
		opacity: 0.8;
	}
	@keyframes loading {
		0%, 40%, 100% { transform: scaleY(0.4); }
		20% { transform: scaleY(1.0); }
	}
	@keyframes pulse {
		0%, 100% { opacity: 1; }
		50% { opacity: 0.5; }
	}
	/* Modal z-index fix */
	.modal-priority {
		z-index: 1070 !important;
	}
	.modal-priority .modal-backdrop {
		z-index: 1069 !important;
	}
	/* Fix for nested modals */
	.modal.show ~ .modal {
		z-index: 1080 !important;
	}
	.modal.show ~ .modal .modal-backdrop {
		z-index: 1079 !important;
	}
	</style>

</head>

<body id="page-top">
	<!-- Page Loader -->
	<div id="loader">
		<div class="loader-content">
			<div class="loading-bars">
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
			</div>
			<div class="loader-text">Loading...</div>
			<div class="loader-subtext">Mohon tunggu sebentar</div>
		</div>
	</div>

	<!-- Page Wrapper sidebar e -->
	<div id="wrapper">
		<?php include 'sidebar.php'; ?>

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
								<img class="img-profile rounded-circle" src="img/undraw_profile.svg">
							</a>

							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
								aria-labelledby="userDropdown">
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
								</a>
							</div>
						</li>
					</ul>
				</nav>

				<!-- HALAMAN TEKNISI -->
				<?php
				if ($_SESSION["level_user"] == "kapten" or $_SESSION["level_user"] == "ikr") {
				?>
					<div class="container-fluid">
						<?php include 'content_scoreboard.php' ?>

						<!-- DataTales Example -->
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">SLOT WO</h6>
							</div>
							<div class="card-body">
								<form method="GET" action="">
									<label for="tanggal">Pilih Tanggal:</label>
									<div class="form-row">
										<div class="form-group col-md-2" autocomplete="off">
											<input class='form-control' type="date" id="tanggal" name="tanggal" value="<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d'); ?>">
										</div>
										<div class="form-group col-md-2" autocomplete="off">
											<input type="submit" class="btn btn-success  pull-right" value="Tampilkan">
										</div>
										<div class="form-group col-md-2" autocomplete="off">
											<div class="dropdown">
												<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Schedule Settings
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<?php if ($leveladmin == 'admin_ts') { ?>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modaljadwal">Add Jadwal</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#updatejadwal">Update Jadwal error</a>
													<?php } ?>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#arti_warna">Arti Warna</a>
												</div>
											</div>
										</div>
									</div>

								</form>
								<?php if ($level_user == 'kapten') { ?>
									<div class="tab">
										<button class="tablinks" onclick="openCity(event, 'malang')" id="defaultOpen">Malang</button>
										<button class="tablinks" onclick="openCity(event, 'Pasuruan')">Pasuruan</button>
									</div>
								<?php } ?>
								<?php include 'content_kotak.php'; ?>
							</div>
						</div>
						<?php if ($level_user == 'ikr') { ?>
							<!-- Begin Page Content -->
							<?php include 'modal_list_ikr_ts.php'; ?>

						<?php } ?>
						</tbody>
						</table>
					</div>
			</div>
		</div>
	</div>
<?php } ?>

<!-- Begin Page Content -->
<div class="content-wrapper d-flex flex-column">
	<!-- Main Content -->
	<div class="main-content">
		<!-- Topbar Navbar -->
		<ul class="navbar-nav ml-auto">
			<!-- Nav Item - Search Dropdown (Visible Only XS) -->
			<li class="nav-item dropdown no-arrow d-sm-none">
				<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-search fa-fw"></i>
				</a>
				<!-- Dropdown - Messages -->
				<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
					aria-labelledby="searchDropdown">
					<form class="form-inline mr-auto w-100 navbar-search">
						<div class="input-group">
							<input type="text" class="form-control bg-light border-0 small"
								placeholder="Search for..." aria-label="Search"
								aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</li>
			<div class="topbar-divider d-none d-sm-block"></div>
		</ul>
		<!-- End of Topbar -->
	</div>
</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">

	<i class="fas fa-angle-up"></i>

</a>
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
				<a class="btn btn-danger" href="controller/logout.php">Logout</a>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modaljadwal" role="dialog" tabindex="-1">

	<div class="modal-dialog" role="document">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-user">Tambah Data</h4>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span></button>

			</div>

			<div class="modal-body">
				<form method="post" action="simpan_kotak.php">
					<label for="Kota">Kota:</label>
					<select class="form-control" type="text" id="kota" name="kota" autocomplete="off">
						<option>-</option>
						<option>mlg</option>
						<option>pas</option>
					</select>
					<label for="tanggal_modal">Tanggal:</label>
					<input class="form-control" type="date" id="tanggal_modal" name="tanggal" required><br>
					<?php for ($i = 1; $i <= 6; $i++): ?>
						Baris <?php echo $i; ?>: <input class="form-control" type="number" name="baris[<?php echo $i; ?>]" min="0" max="10" required><br>
					<?php endfor; ?>
					<div class="modal-footer">
						<input class="btn btn-success" type="submit" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="updatejadwal" role="dialog" tabindex="-1">

	<div class="modal-dialog modal-xl" role="document">

		<div class="modal-content">

			<div class="modal-body">
				<form role="form" method="post" id="form_updatejadwal" data-id="formdatapengguna_slot">
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">List Slot</h6>
						</div>
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-md-3">
									<input type="date" id="start_date" class="form-control" placeholder="Tanggal Awal">
								</div>
								<div class="col-md-3">
									<input type="date" id="end_date" class="form-control" placeholder="Tanggal Akhir">
								</div>
								<div class="col-md-3">
									<button id="filter" type="button" class="btn btn-primary">Filter</button>
								</div>
							</div>


							<div class="table-responsive">
								<table class="table table-bordered" id="tabel_slot" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>NO</th>
											<th>Slot</th>
											<th>Tanggal</th>
											<th>Unit</th>
											<th>Jumlah Hijau</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>NO</th>
											<th>Slot</th>
											<th>Tanggal</th>
											<th>Unit</th>
											<th>Jumlah Hijau</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="arti_warna" tabindex="-1" role="dialog" aria-labelledby="colorModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="colorModalLabel">Pengartian Warna</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Hijau
						<span class="badge badge-success badge-pill">Teknisi Idle</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Kuning
						<span class="badge badge-warning badge-pill">WO belum diambil</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Merah
						<span class="badge badge-danger badge-pill">Proses Pengerjaan</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						Biru
						<span class="badge badge-primary badge-pill">Pekerjaan diselesaikan</span>
					</li>
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modal_post_wo" role="dialog" tabindex="-1">

	<div class="modal-dialog modal-xl" role="document">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-user">Tambah Data</h4>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span></button>



			</div>

			<div class="modal-body">
				<form role="form" method="post" id="form_post_wo" data-id="formdatapengguna_post">
					<input class="form-control date_wo" type="text" name="date_wo" readonly>
					<input class="form-control end" type="hidden" name="end">
					<div class="form-row col-md-4">
						<label for="rang">Jenis WO</label>
						<select class="form-control" id="kategori" name="kategori" onclick='test()'>
							<option></option>
							<option value="ikr">Instalasi Kapten</option>
							<option value="mntn">Maintennace Kapten</option>
						</select> &nbsp
					</div>
					<br />
					<div id="ikr"><?php include 'modal_form_ikr.php'; ?></div>
					<div id="mntn"><?php include 'modal_mntn.php'; ?></div>
			</div>
			</br>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
	</form>
</div>

<div class="modal fade" id="modal_post_wo_pas" role="dialog" tabindex="-1">

	<div class="modal-dialog modal-xl" role="document">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-user">Tambah Data</h4>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span></button>



			</div>

			<div class="modal-body">
				<form role="form" method="post" id="form_post_wo_pas" data-id="formdatapengguna_pas">

					<input class="form-control" type="text" id="date_wo_pas" name="date_wo_pas">
					<input class="form-control" type="text" id="end_pas" name="end_pas">
					<div class="form-row col-md-4">
						<label for="rang">Jenis WO</label>
						<select class="form-control" id="kategori_pas" name="kategori_pas" onclick='test()'>
							<option></option>
							<option value="ikr_pas">Instalasi Kapten</option>
							<option value="mntn_pas">Maintennace Kapten</option>
						</select> &nbsp
					</div>
					<br />

					<div id="ikr_pas"><?php include 'modal_form_ikr_pas.php'; ?></div>

					<div id="mntn_pas"><?php include 'modal_mntn_pas.php'; ?></div>

			</div>
			</br>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
	</form>
</div>



<div class="modal fade" id="modal_detail_ikr" role="dialog" tabindex="-1">

	<div class="modal-dialog" role="document">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-user">Detail Data</h4>

				<button type="button" class="close" data-dismiss="modal" aria-label="Close">

					<span aria-hidden="true">&times;</span></button>

			</div>

			<div class="modal-body">
				<div class="loader_data_user"></div>
				<div id="komponen_va"></div>
			</div>

			<div class="modal-footer">
				<button type="reset" class="btn btn-danger pull-right"><i class="fa fa-times fa-fw"></i>Reset</button>
				<button type="button" class="btn btn-success  pull-right save_solved_ikr">Save</button>
			</div>

		</div>
	</div>
	</form>
</div>

<!-- Essential Modals Only -->
<?php include 'modal_add_ikr.php'; ?>
<?php include 'modal_add_mntn.php'; ?>
<?php include 'modal_add_mntnodp.php'; ?>
<?php include 'modal_solved_ikr.php'; ?>
<?php include 'modal_add_dis.php'; ?>
<?php include 'modal_add_cor.php'; ?>
<!-- Dynamic modal container -->
<div id="dynamic-modal-container"></div>

<script src="asset/vendor/jquery/jquery.min.js"></script>
<script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="asset/js/sb-admin-2.min.js"></script>
<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/action.js"></script>
<script src="js/bs-custom-file-input.js"></script>
<script src="asset/js/bootstrap-datepicker.min.js"></script>
<script src="asset/locales/bootstrap-datepicker.id.min.js"></script>
<script src="js/datatable.js"></script>
<script src="js/show_position.js"></script>
<script src="js/fix-duplicate-ids.js"></script>
<script src="js/final-id-fix.js"></script>

<?php include 'modal_datatable_slot.php'; ?>
<?php include 'modal_datatable_sign.php'; ?>
<?php include 'modal_datatable_sign_pas_unified.php'; ?>
<?php include 'modal_datatable_proses.php'; ?>
<?php include 'modal_datatable_proses_pas_unified.php'; ?>
<?php include 'modal_datatable_solved.php'; ?>

<?php include 'modal_form_list.php'; ?>
<script src="js/maps-loader.js"></script>
<script src="asset/plugins/iCheck/icheck.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="js/button-fix.js"></script>
<script>
	// Hide loader when page is ready
	$(window).on('load', function() {
		$('#loader').fadeOut();
	});
	
	// Inisialisasi DataTable dengan AJAX
	$(document).ready(function() {
		$('#dataTable').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "ajax/api_data.php",
				"type": "POST"
			},
			"columns": [
				{ "data": 0 },
				{ "data": 1 },
				{ "data": 2 },
				{ "data": 3 },
				{ "data": 4 }
			],
			"pageLength": 10,
			"language": {
				"processing": "Loading...",
				"search": "Cari:"
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$('#solved_ikr').hide();
		$('#resceduleid_ikr').hide();

		$('#status_wo_ikr').change(function() {
			var a = $(this).val();
			if (a == 'Sudah Terpasang') {
				$('#solved_ikr').show();
				$('#resceduleid_ikr').hide();
			} else if (a == 'Rescedule' || a == 'Pending') {
				$('#solved_ikr').hide();
				$('#resceduleid_ikr').show();
			} else {
				$('#solved_ikr').hide();
				$('#resceduleid_ikr').hide();
			}
		});
	});
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
<!-- Local Flatpickr -->
<script>
	// Inisialisasi flatpickr dengan format 24-jam termasuk detik
	flatpickr("#tgl_fal_res", {
		enableTime: true,
		dateFormat: "Y-m-d H:i:S",
		time_24hr: true,
		enableSeconds: true,
		onReady: function(selectedDates, dateStr, instance) {
			instance.input.removeAttribute("readonly");
		}
	});
	// Inisialisasi flatpickr dengan format 24-jam termasuk detik
	flatpickr("#tgl_res_pros", {
		enableTime: true,
		dateFormat: "Y-m-d H:i:S",
		time_24hr: true,
		enableSeconds: true,
		onReady: function(selectedDates, dateStr, instance) {
			instance.input.removeAttribute("readonly");
		}
	});

	// Inisialisasi flatpickr dengan format 24-jam termasuk detik
	flatpickr("#tgl_fal_switch", {
		enableTime: true,
		dateFormat: "Y-m-d H:i:S",
		time_24hr: true,
		enableSeconds: true,
		onReady: function(selectedDates, dateStr, instance) {
			instance.input.removeAttribute("readonly");
		}
	});

	// Inisialisasi flatpickr dengan format 24-jam termasuk detik
	flatpickr("#tanggalsign_wo", {
		enableTime: true,
		dateFormat: "Y-m-d H:i:S",
		time_24hr: true,
		enableSeconds: true,
		onReady: function(selectedDates, dateStr, instance) {
			instance.input.removeAttribute("readonly");
		}
	});

	// Inisialisasi flatpickr dengan format 24-jam termasuk detik
	flatpickr("#tanggalsign_mntn", {
		enableTime: true,
		dateFormat: "Y-m-d H:i:S",
		time_24hr: true,
		enableSeconds: true,
		onReady: function(selectedDates, dateStr, instance) {
			instance.input.removeAttribute("readonly");
		}
	});
</script>

e.input.removeAttribute("readonly");
		}
	});
</script>

<script>
	// Set up global variable

	var result;
	showPosition();

	function showPosition() {

		// Store the element where the page displays the result

		lokasi_kapten_bckbn = document.getElementById("lokasi_kapten_mntn_bckbn");
		//lokasi_dst = document.getElementById("lokasi_kapten_ins_dis");
		//okasi_kapten_ins_odp = document.getElementById("lokasi_kapten_ins_odp");
		lokasi_ins = document.getElementById("lokasi_ins");
		lokasi_kapten_mt = document.getElementById("lokasi_kapten_mt");
		lokasi_odp = document.getElementById("lokasi_kapten_mntn_odp");


		// If geolocation is available, try to get the visitor's position

		if (navigator.geolocation) {

			navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

		} else {

			result.innerHTML = "error_browser";

		}

	};



	// Define callback function for   attempt
	function successCallback(position) {
		lokasi_kapten_bckbn.value = position.coords.latitude + "#" + position.coords.longitude;
		//lokasi_kapten_ins_odp.value = position.coords.latitude + "#" + position.coords.longitude;
		lokasi_ins.value = position.coords.latitude + "#" + position.coords.longitude;
		//lokasi_dst.value = position.coords.latitude + "#" + position.coords.longitude;
		lokasi_kapten_mt.value = position.coords.latitude + "#" + position.coords.longitude;
		lokasi_odp.value = position.coords.latitude + "#" + position.coords.longitude;
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
	function showFotoBase64(base64) {
		document.getElementById("fotoBase64").src = base64;
		$('#modalFotoBase64').modal('show');
	}
</script>

<script>
	// Fungsi openCity seperti biasa
	function openCity(evt, tabName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(tabName).style.display = "block";
		evt.currentTarget.className += " active";
	}

	// Panggil setelah elemen tersedia
	var defaultOpenElement = document.getElementById("defaultOpen");
	if (defaultOpenElement) {
		defaultOpenElement.click();
	}
</script>
<!-- Select2 loaded locally above -->
 <script>
$(document).ready(function(){
  // Tambah select baru
  $('.add-splitter').click(function(){
    $('#splitter-container').append(`
      <div class="input-group mb-2">
        <select name="spltr_ins[]" class="form-control">
          <option value="1/4">1/4</option>
          <option value="1/8">1/8</option>
          <option value="1/16">1/16</option>
        </select>
        <div class="input-group-append">
          <button type="button" class="btn btn-outline-danger btn-sm remove-splitter">Hapus</button>
        </div>
      </div>
    `);
  });
  
  // Hapus select
  $('#splitter-container').on('click', '.remove-splitter', function(){
    $(this).closest('.input-group').remove();
  });
  
  // Saat form submit
  $('#myForm').submit(function(e){
    // Ambil semua value select
    var values = [];
    $('select[name="spltr_ins[]"]').each(function(){
      values.push($(this).val());
    });
    
    // Convert ke JSON string
    $('#spltr_json').val(JSON.stringify(values));
    
    // Boleh cek di console dulu
    console.log('Data JSON:', $('#spltr_json').val());
    
    // Jika ingin submit via AJAX, bisa e.preventDefault();
    // e.preventDefault();
  });
});
</script>
</body>
</html>
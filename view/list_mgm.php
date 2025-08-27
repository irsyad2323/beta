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

                        <h1 class="h3 mb-0 text-gray-800">REKAP MGM <?php //echo $_SESSION["level_user"]; ?></h1>

                     

                    </div>
					
					<div class="d-sm-flex align-items-center justify-content-between mb-4">

                        
                        <?php 

                            if ( $_SESSION["level_user"] != "Admin" && $_SESSION["level_user"] != "kapten" && $_SESSION["level_user"] != "ts"  ){ 

                        ?>

                        	<div class="my-2"></div>
                                    <a href="controller/export_mgm.php" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">HOME</span>
                                    </a>


                    <?php } ?>

                    </div>

                      	
				





                        <div class="row">










                    <!-- Content Row -->

                    <?php 

                        if ($_SESSION["level_user"] != "ts"){

                       ?>
					   
					  <div class="container-fluid">
							<h1 class="h3 mb-2 text-gray-800">Data MGM</h1>
							
							<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Tambah Data</button>
							
							<div class="card shadow">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="tabel_pengguna">
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Sobat</th>
													<th>Alamat</th>
													<th>No WA</th>
													<th>Metode Bayar</th>
													<th>No Rekening</th>
													<th>Atas Nama</th>
													<th>Tanggal Create</th>
													<th>Status</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody></tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

						<!-- Modal Tambah -->
						<div class="modal fade" id="addModal">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="card shadow">
									<div class="card-header bg-primary text-white">
										<h5 class="m-0">Pendaftaran Sobat Kapten</h5>
									</div>
									<div class="card-body">
										<form id="upload_form">
											<p class="text-center">Jika sudah mendaftarkan, bisa kembali ke halaman 
												<a href="index.php">pendaftaran MGM</a>.
											</p>

											<div class="mb-3">
												<label for="nama_sobat" class="form-label">Nama Sobat:</label>
												<input type="text" id="nama_sobat" name="nama_sobat" class="form-control" placeholder="Masukkan nama lengkap" required>
											</div>

											<div class="mb-3">
												<label for="alamat" class="form-label">Alamat:</label>
												<input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan alamat lengkap" required>
											</div>

											<div class="mb-3">
												<label for="no_wa_sobat" class="form-label">No WhatsApp:</label>
												<input type="number" id="no_wa_sobat" name="no_wa_sobat" class="form-control" placeholder="Masukkan nomor WhatsApp" required>
											</div>

											<div class="mb-3">
												<label for="metode_bayar" class="form-label">Metode Pembayaran Uang Saku:</label>
												<select name="metode_bayar" id="metode_bayar" class="form-select" required>
													<option value="">Pilih metode pembayaran</option>
													<option value="Cash">Cash (diambil di kantor)</option>
													<option value="Transfer">Transfer Bank</option>
													<option value="E-Wallet">E-Wallet</option>
												</select>
											</div>

											<div id="additional-fields"></div>

											<div class="mb-3">
												<label for="no_rekening" class="form-label">No Rekening / No E-Wallet</label>
												<input type="text" id="no_rekening" name="no_rekening" class="form-control" placeholder="Masukkan nomor rekening atau e-wallet" required>
											</div>

											<div class="mb-3">
												<label for="an_rek" class="form-label">Atas Nama Rekening:</label>
												<input type="text" id="an_rek" name="an_rek" class="form-control" placeholder="Masukkan atas nama rekening" required>
											</div>

											<div class="d-flex justify-content-between">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
												<button type="submit" class="btn btn-primary">Daftar</button>
											</div>
										</form>
									</div>
								</div>
								</div>
							</div>
						</div>
						
					<div class="modal fade" id="editModal">
							<div class="modal-dialog">
								<div class="modal-content">
									<form id="edit_form">
										<div class="modal-header">
											<h5 class="modal-title">Edit Data Sobat Kapten</h5>
										</div>
										<div class="modal-body">
											<input type="hidden" id="editId" name="id">
											
											<div class="mb-3">
												<label class="form-label">Nama Sobat:</label>
												<input type="text" id="editNamaSobat" name="nama_sobat" class="form-control" required>
											</div>

											<div class="mb-3">
												<label class="form-label">Alamat:</label>
												<input type="text" id="editAlamat" name="alamat" class="form-control" required>
											</div>

											<div class="mb-3">
												<label class="form-label">No WhatsApp:</label>
												<input type="number" id="editNoWa" name="no_wa_sobat" class="form-control" required>
											</div>

											<div class="mb-3">
												<label class="form-label">Metode Pembayaran:</label>
												<select name="metode_bayar" id="editMetodeBayar" class="form-select" required>
													<option value="">Pilih metode pembayaran</option>
													<option value="Cash">Cash (diambil di kantor)</option>
													<option value="Transfer">Transfer Bank</option>
													<option value="E-Wallet">E-Wallet</option>
												</select>
											</div>

											<div id="edit-additional-fields"></div>

											<div class="mb-3">
												<label class="form-label">No Rekening / No E-Wallet:</label>
												<input type="text" id="editNoRekening" name="no_rekening" class="form-control" required>
											</div>

											<div class="mb-3">
												<label class="form-label">Atas Nama Rekening:</label>
												<input type="text" id="editAnRek" name="an_rek" class="form-control" required>
											</div>                                            

											<div class="mb-3">
												<label class="form-label">Edit Status</label>
												<input type="text" id="level" name="level" class="form-control" required>
											</div>

                                            <div class="mb-3">
												<label for="level" class="form-label">Edit Status</label>
												<select name="level" id="level" class="form-select" required>
													<option value="">Pilih metode pembayaran</option>
													<option value="mgm">MGM</option>
													<option value="cs">CS</option>
													<option value="freelance">Freelance</option>
												</select>
											</div>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
											<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
										</div>
									</form>
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
	<script src="../js/select2.min.js"></script>	
	<script>
	
	$(document).ready(function () {
    loadTable(); // Memuat data saat halaman dibuka

    function loadTable() {
        $.ajax({
            url: "../controller/crud_sobat_mgm.php",
            method: "GET",
            dataType: "json",
            success: function (data) {
                let html = "";
                let no = 1;
                data.forEach(function (row) {
                    html += `<tr>
                        <td>${no++}</td>
                        <td>${row.nama_sobat}</td>
                        <td>${row.alamat}</td>
                        <td>${row.no_wa_sobat}</td>
                        <td>${row.metode_bayar}</td>
                        <td>${row.no_rekening}</td>
                        <td>${row.an_rek}</td>
                        <td>${row.tanggal}</td>                        
                        <td>${row.level}</td>
                        <td>
                            <button class="btn btn-warning btn-sm edit-btn" data-id="${row.id}">Edit</button>
                            <button class="btn btn-danger btn-sm delete-btn" data-id="${row.id}">Hapus</button>
                        </td>
                    </tr>`;
                });
                $("#tabel_pengguna tbody").html(html);
                $("#tabel_pengguna").DataTable(); // Inisialisasi DataTables
            }
        });
    }

    $(document).ready(function () {
    $("#metode_bayar").change(function () {
        const metode = $(this).val();
        const $additionalFields = $("#additional-fields");
        $additionalFields.empty();

        if (metode === "Cash") {
            $("#no_rekening").val("Diambil di kantor").prop("readonly", true);
            $("#an_rek").val("").prop("readonly", true);
        } else if (metode === "Transfer") {
            $("#no_rekening").val("").prop("readonly", false);
            $("#an_rek").val("").prop("readonly", false);
            $additionalFields.append(`
                <div class="mb-3">
                    <label for="jenis_transfer" class="form-label">Jenis Transfer:</label>
                    <select name="jenis_transfer" id="jenis_transfer" class="form-select">
                        <option value="">Pilih jenis transfer</option>
                        <option value="BCA">BCA</option>
                        <option value="BRI">BRI</option>
                        <option value="Mandiri">Mandiri</option>
                        <option value="BNI">BNI</option>
                        <option value="Other">Lainnya</option>
                    </select>
                </div>
                <div id="other-transfer" style="display: none;" class="mt-3">
                    <label class="form-label">Bank Lainnya:</label>
                    <input type="text" id="other_transfer_input" name="other_transfer_input" class="form-control">
                </div>
            `);
        } else if (metode === "E-Wallet") {
            $("#no_rekening").val("").prop("readonly", false);
            $("#an_rek").val("").prop("readonly", false);
            $additionalFields.append(`
                <div class="mb-3">
                    <label for="jenis_wallet" class="form-label">Jenis E-Wallet:</label>
                    <select name="jenis_wallet" id="jenis_wallet" class="form-select">
                        <option value="">Pilih jenis E-Wallet</option>
                        <option value="GoPay">GoPay</option>
                        <option value="OVO">OVO</option>
                        <option value="DANA">DANA</option>
                        <option value="ShopeePay">ShopeePay</option>
                        <option value="Other">Lainnya</option>
                    </select>
                </div>
                <div id="other-wallet" style="display: none;" class="mt-3">
                    <label class="form-label">E-Wallet Lainnya:</label>
                    <input type="text" id="other_wallet_input" name="other_wallet_input" class="form-control">
                </div>
            `);
        }
    });

    $("#upload_form").submit(function (e) {
        e.preventDefault();
        let formData = $(this).serialize() + "&action=insert";

        $.post("../controller/crud_sobat_mgm.php", formData, function (response) {
            Swal.fire({
                icon: "success",
                title: "Pendaftaran Berhasil!",
                text: "Data Sobat Kapten telah tersimpan.",
                showConfirmButton: false,
                timer: 1500
            });
            $("#editModal").modal("hide");
            loadTable();
        }, "json");
    });

    $(document).on("change", "#jenis_transfer", function () {
        $("#other-transfer").toggle($(this).val() === "Other");
    });

    $(document).on("change", "#jenis_wallet", function () {
        $("#other-wallet").toggle($(this).val() === "Other");
    });
});

     $(document).on("click", ".edit-btn", function () {
        let id = $(this).data("id");

        $.post("../controller/crud_sobat_mgm.php", { id: id, action: "fetch" }, function (data) {
            $("#editId").val(data.id);
            $("#editNamaSobat").val(data.nama_sobat);
            $("#editAlamat").val(data.alamat);
            $("#editNoWa").val(data.no_wa_sobat);
            $("#editMetodeBayar").val(data.metode_bayar);
            $("#editNoRekening").val(data.no_rekening);
            $("#editAnRek").val(data.an_rek);
            $("#level").val(data.level);
            
            // Load dropdown tambahan
            loadEditDropdowns(data.metode_bayar, data.jenis_transfer, data.jenis_wallet);

            $("#editModal").modal("show");
        }, "json");
    });

    function loadEditDropdowns(metode, jenisTransfer = "", jenisWallet = "") {
        const $additionalFields = $("#edit-additional-fields");
        $additionalFields.empty();

        if (metode === "Cash") {
            $("#editNoRekening").val("Diambil di kantor").prop("readonly", true);
            $("#editAnRek").val("").prop("readonly", true);
        } else if (metode === "Transfer") {
            $("#editNoRekening").prop("readonly", false);
            $("#editAnRek").prop("readonly", false);
            $additionalFields.append(`
                <div class="mb-3">
                    <label class="form-label">Jenis Transfer:</label>
                    <select name="jenis_transfer" id="editJenisTransfer" class="form-select">
                        <option value="BCA" ${jenisTransfer === "BCA" ? "selected" : ""}>BCA</option>
                        <option value="BRI" ${jenisTransfer === "BRI" ? "selected" : ""}>BRI</option>
                        <option value="Mandiri" ${jenisTransfer === "Mandiri" ? "selected" : ""}>Mandiri</option>
                        <option value="BNI" ${jenisTransfer === "BNI" ? "selected" : ""}>BNI</option>
                        <option value="Other" ${jenisTransfer === "Other" ? "selected" : ""}>Lainnya</option>
                    </select>
                </div>
            `);
        } else if (metode === "E-Wallet") {
            $("#editNoRekening").prop("readonly", false);
            $("#editAnRek").prop("readonly", false);
            $additionalFields.append(`
                <div class="mb-3">
                    <label class="form-label">Jenis E-Wallet:</label>
                    <select name="jenis_wallet" id="editJenisWallet" class="form-select">
                        <option value="GoPay" ${jenisWallet === "GoPay" ? "selected" : ""}>GoPay</option>
                        <option value="OVO" ${jenisWallet === "OVO" ? "selected" : ""}>OVO</option>
                        <option value="DANA" ${jenisWallet === "DANA" ? "selected" : ""}>DANA</option>
                        <option value="ShopeePay" ${jenisWallet === "ShopeePay" ? "selected" : ""}>ShopeePay</option>
                        <option value="Other" ${jenisWallet === "Other" ? "selected" : ""}>Lainnya</option>
                    </select>
                </div>
            `);
        }
    }

    $("#editMetodeBayar").change(function () {
        loadEditDropdowns($(this).val());
    });

    $("#edit_form").submit(function (e) {
        e.preventDefault();
        let formData = $(this).serialize() + "&action=update";

        $.post("../controller/crud_sobat_mgm.php", formData, function (response) {
            Swal.fire({
                icon: "success",
                title: "Data Berhasil Diperbarui!",
                showConfirmButton: false,
                timer: 1500
            });
            $("#edit_form")[0].reset();
            $("#editModal").modal("hide");
            loadTable();
        }, "json");
    });

    $(document).on("click", ".delete-btn", function () {
        let id = $(this).data("id");

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("../controller/crud_sobat_mgm.php", { id: id, action: "delete" }, function (response) {
                    Swal.fire({
                        icon: "success",
                        title: "Data Berhasil Dihapus!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    loadTable();
                }, "json");
            }
        });
    });
});

	</script>
</body>

</html>
</html>
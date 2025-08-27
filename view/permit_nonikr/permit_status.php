<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Relationship Status | Partner Relationship | NARATEL</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../img/icons/partner-relationship.png" />

    <!-- Custom fonts for this template-->
    <link href="../../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../css/select2.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="../../asset/vendor/datatables/dataTables.bootstrap4.min.css">

    <!-- Custom styles for this template-->
    <link href="../../asset/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="../../asset/css/bootstrap-datepicker.min.css">

    <style>
        /* Sembunyikan elemen secara default */
        .form_add_elements_insert {
            display: none;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include '../../sidebar-sementara.php'; ?>

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
                                <img class="img-profile rounded-circle" src="../../img/undraw_profile.svg">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php
                    if ($_SESSION["level_user"] != "ikr") {
                    ?>
                        <div class="row">
                        <?php } ?>
                        <!-- Content Row -->

                        <?php
                        if ($_SESSION["level_user"] != "ts") {
                        ?>
                            <!-- Begin Page Content -->
                            <div class="container-fluid">

                                <!-- DataTables -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Relationship Status </h6>
                                            <!-- <div class="col-sm-3">
                                                <label for="statusFilter" class="col-form-label">Status</label>
                                                <select id="statusFilter" class="form-control">
                                                    <option value="in_progress" selected>In Progress</option>
                                                    <option value="completed">Completed</option>
                                                </select>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center" id="tabel_permit_status" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Kode</th>
                                                        <th>Kelurahan</th>
                                                        <th>RW</th>
                                                        <th>RT</th>
                                                        <th>Partner Head</th>
                                                        <th>Status Terakhir</th>
                                                        <th>PIC Terakhir</th>
                                                        <th>Keterangan Terakhir</th>
                                                        <th>Tanggal Dibuat Terakhir</th>
                                                        <th>Lead Time</th>
                                                        <th>Status Tracking</th>
                                                        <th>Lead Time for Head of Unit Approval</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Kode</th>
                                                        <th>Kelurahan</th>
                                                        <th>RW</th>
                                                        <th>RT</th>
                                                        <th>Partner Head</th>
                                                        <th>Status Terakhir</th>
                                                        <th>PIC Terakhir</th>
                                                        <th>Keterangan Terakhir</th>
                                                        <th>Tanggal Dibuat Terakhir</th>
                                                        <th>Lead Time</th>
                                                        <th>Status Tracking</th>
                                                        <th>Lead Time for Head of Unit Approval</th>
                                                        <th>Action</th>
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
                        <?php
                        }
                        ?>
                        </div>
                        <!-- /.container-fluid -->
                </div>
                <!-- End of Page Content -->

                <!-- Footer -->
                <?php include '../footer.php'; ?>

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>

    <!-- Modal View Detail Relationship Status -->
    <div class="modal fade" id="viewPermitStatusDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewPermitStatusDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewPermitStatusDetailsModalLabel">Relationship Status Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="d-sm-flex align-items-center justify-content-end mb-3">
                        <button class="btn btn-success insertTambahPermitStatus" data-id="">Tambah Relationship Status</button>
                    </div>

                    <div class="table-responsive">
                        <table id="modalDataTable" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Permit</th>
                                    <th>Status</th>
                                    <th>Metode Followup</th>
                                    <th>Partnership Fee</th>
                                    <th>Deskripsi Partnership</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data dari AJAX akan diisi di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Relationship Status -->
    <div class="modal fade" id="modalInsertPermitStatus" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data Relationship Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form role="form" method="post" id="addPermitStatusForm">

                        <?php
                        if ($_SESSION["level_user"] != "ikr") {
                        ?>

                            <div class="row g-3">

                                <!-- Key Fal -->
                                <input class="form-control" type="hidden" id="key_fal" name="key_fal">

                                <!-- PIC -->
                                <div class="form-row mb-3 col-4">
                                    <label for="pic">PIC <span class="text-danger">*</span></label>
                                    <select class="form-control" id="pic" name="pic" autocomplete="off" required>
                                        <option value="">Buka menu pilihan ini</option>
                                        <option value="ivan" <?php echo ($_SESSION['nama'] === 'ivan') ? 'selected' : ''; ?>>Ivan</option>
                                        <option value="anisa" <?php echo ($_SESSION['nama'] === 'anisa') ? 'selected' : ''; ?>>Anisa</option>
                                        <option value="Lukito" <?php echo ($_SESSION['nama'] === 'Lukito') ? 'selected' : ''; ?>>Lukito</option>
                                        <option value="Lia" <?php echo ($_SESSION['nama'] === 'Lia') ? 'selected' : ''; ?>>Lia</option>
                                        <option value="Saiin" <?php echo ($_SESSION['nama'] === 'Saiin') ? 'selected' : ''; ?>>Saiin</option>
                                    </select>
                                </div>

                                <!-- Status -->
                                <div class="form-row mb-3 col-4">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" type="text" id="status" name="status" autocomplete="off" required>
                                        <option value="">Buka menu pilihan ini</option>
                                        <option value="inisiasi_perkenalan">Inisiasi/Perkenalan</option>
                                        <option value="negosiasi">Negosiasi</option>
                                        <option value="closing">Closing</option>
                                        <option value="re_visit">Re-visit</option>
                                        <option value="followup">Follow Up</option>
                                        <option value="reject">Reject</option>
                                        <option value="kolaborasi">Kolaborasi</option>
                                    </select>
                                </div>

                                <!-- Metode Followup -->
                                <div class="form-row mb-3 col-4">
                                    <label for="metode_followup">Metode Followup <span class="text-danger">*</span></label>
                                    <select class="form-control" type="text" id="metode_followup" name="metode_followup" autocomplete="off" required>
                                        <option value="">Buka menu pilihan ini</option>
                                        <option value="byphone">By Phone</option>
                                        <option value="visit">Visit</option>
                                    </select>
                                </div>

                                <!-- Partnership Fee -->
                                <div class="form-row mb-3 col-4" style="display: none;">
                                    <label for="total_komitmen">Partnership Fee <span class="text-danger">*</span></label>
                                    <input class="form-control nominal" type="text" id="total_komitmen" name="total_komitmen" placeholder="0" autocomplete="off">
                                </div>

                                <!-- Deskripsi Partnership -->
                                <div class="form-row mb-3 col-4" style="display: none;">
                                    <label for="deskripsi_komitmen">Deskripsi Partnership <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="deskripsi_komitmen" name="deskripsi_komitmen" placeholder="Kontrak, Tiang" rows="1" autocomplete="off"></textarea>
                                </div>

                                <!-- Partnership Kerjasama -->
                                <div class="form-row mb-3 col-4" style="display: none;">
                                    <label for="berita_acara">Partnership Kerjasama <span class="text-danger">*</span></label>
                                    <input type="file" name="berita_acara" class="form-control-file input-design" id="berita_acara">
                                </div>

                                <!-- Form Add Dinamis Elements -->
                                <div class="col-12 form_add_elements_insert mb-3">
                                    <div class="row g-3 form_add_elements_row_insert mb-3">
                                        <!-- Jadwal Bayar -->
                                        <div class="form-row col-sm-6">
                                            <label for="jadwal_bayar_1">Jadwal Bayar <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date" id="jadwal_bayar_1" name="jadwal_bayar[]">
                                        </div>

                                        <!-- Nominal -->
                                        <div class="form-row col-sm-6">
                                            <label for="nominal_1">Nominal <span class="text-danger">*</span></label>
                                            <input class="form-control nominal" type="text" id="nominal_1" name="nominal[]" placeholder="0" autocomplete="off">
                                        </div>

                                    </div>

                                    <!-- Place the buttons below the form rows -->
                                    <div class="form-row col-sm-4 mt-3">
                                        <button type="button" class="btn btn-outline-success add_new_frm_field_btn_insert" title="Tambah baris baru"><i class="fas fa-plus"></i></button>
                                        <button type="button" class="btn btn-outline-danger mx-2 remove_node_btn_frm_field_insert" title="Hapus baris terakhir"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>

                                <!-- Keterangan -->
                                <div class="form-row mb-3 col-12">
                                    <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Follow up by WA kepada Pak Sugeng, untuk menanyakan kelanjutan negosiasi sebelumnya." rows="2" autocomplete="off" required></textarea>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-success pull-right">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <?php
                        }
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Relationship Status -->
    <div class="modal fade" id="modalEditPermitStatus" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Ubah Data Relationship Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form role="form" method="post" id="updatePermitForm">

                        <!-- FORM ISIAN DATA ADMIN -->
                        <?php
                        if ($_SESSION["level_user"] != "ikr") {
                        ?>

                            <div class="row g-3">
                                <input class="form-control" type="hidden" id="permit_status_id1" name="permit_status_id1" placeholder="permit_status_id1...">

                                <!-- PIC -->
                                <div class="form-row mb-3 col-4">
                                    <label for="pic1">PIC <span class="text-danger">*</span></label>
                                    <select class="form-control" type="text" id="pic1" name="pic1" autocomplete="off" required>
                                        <option value="ivan">Ivan</option>
                                        <option value="anisa">Anisa</option>
                                        <option value="Lukito">Lukito</option>
                                        <option value="Lia">Lia</option>
                                        <option value="Saiin">Saiin</option>
                                    </select>
                                </div>

                                <!-- Status -->
                                <div class="form-row mb-3 col-4">
                                    <label for="status1">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" type="text" id="status1" name="status1" autocomplete="off" required>
                                        <option value="inisiasi_perkenalan">Inisiasi/Perkenalan</option>
                                        <option value="negosiasi">Negosiasi</option>
                                        <option value="closing">Closing</option>
                                        <option value="re_visit">Re-visit</option>
                                        <option value="followup">Follow Up</option>
                                        <option value="reject">Reject</option>
                                        <option value="kolaborasi">Kolaborasi</option>
                                    </select>
                                </div>

                                <!-- Metode Followup -->
                                <div class="form-row mb-3 col-4">
                                    <label for="metode_followup1">Metode Followup <span class="text-danger">*</span></label>
                                    <select class="form-control" type="text" id="metode_followup1" name="metode_followup1" autocomplete="off">
                                        <option value="byphone">By Phone</option>
                                        <option value="visit">Visit</option>
                                    </select>
                                </div>

                                <!-- Partnership Fee -->
                                <div class="form-row mb-3 col-6">
                                    <label for="total_komitmen1">Partnership Fee <span class="text-danger">*</span></label>
                                    <input class="form-control nominal" type="text" id="total_komitmen1" name="total_komitmen1" placeholder="2000000" autocomplete="off">
                                </div>

                                <!-- Deskripsi Partnership -->
                                <div class="form-row mb-3 col-6">
                                    <label for="deskripsi_komitmen1">Deskripsi Partnership <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="deskripsi_komitmen1" name="deskripsi_komitmen1" placeholder="Kontrak, Tiang" rows="1" autocomplete="off"></textarea>
                                </div>

                                <!-- Partnership Kerjasama -->
                                <div class="form-row mb-3 col-6">
                                    <label for="berita_acara1">Partnership Kerjasama</label>
                                    <input type="file" name="berita_acara" class="form-control-file input-design" id="berita_acara1">
                                </div>

                                <!-- KTP -->
                                <div class="form-row mb-3 col-6">
                                    <label for="ktp1">KTP</label>
                                    <input type="file" name="ktp" class="form-control-file input-design" id="ktp1">
                                </div>

                                <!-- Dokumentasi -->
                                <div class="form-group mb-3 col-6">
                                    <label for="dokumentasi">Dokumentasi</label>
                                    <input type="file" name="dokumentasi" class="form-control-file input-design" id="dokumentasi">
                                </div>

                                <!-- Form Add Dinamis Elements -->
                                <div class="col-12 form_add_elements_edit mb-3">
                                    <!-- <div class="row g-3 form_add_elements_row_edit mb-3">
                                        Jadwal Bayar
                                        <div class="form-row col-sm-4">
                                            <label for="jadwal_bayar_1">Jadwal Bayar <span class="text-danger">*</span></label>
                                            <input class="form-control" type="date" id="jadwal_bayar_1" name="jadwal_bayar[]" required>
                                        </div>

                                        Nominal
                                        <div class="form-row col-sm-4">
                                            <label for="nominal_1">Nominal <span class="text-danger">*</span></label>
                                            <input class="form-control" type="number" id="nominal_1" name="nominal[]" placeholder="1000000" autocomplete="off" required>
                                        </div>

                                        Kwitansi
                                        <div class="form-row col-sm-4">
                                            <label for="kwitansi_1">Kwitansi <span class="text-danger">*</span></label>
                                            <input type="file" name="kwitansi[]" class="form-control-file input-design" id="kwitansi_1" required>
                                        </div>
                                    </div> -->

                                    <!-- Place the buttons below the form rows -->
                                    <!-- <div class="form-row col-sm-4 mt-3">
                                        <button type="button" class="btn btn-outline-success add_new_frm_field_btn_edit" title="Tambah baris baru"><i class="fas fa-plus"></i></button>
                                        <button type="button" class="btn btn-outline-danger mx-2 remove_node_btn_frm_field_edit" title="Hapus baris terakhir"><i class="fas fa-trash"></i></button>
                                    </div> -->
                                </div>

                                <!-- Keterangan -->
                                <div class="form-row mb-3 col-12">
                                    <label for="keterangan1">Keterangan <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="keterangan1" name="keterangan1" placeholder="keterangan" autocomplete="off">
                                </div>

                            </div>

                            <input type="submit" class="btn btn-success pull-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal View Dokumentasi -->
    <div class="modal fade" id="viewDokumentasiModal" tabindex="-1" role="dialog" aria-labelledby="viewDokumentasiModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDokumentasiModalLabel">Gambar Dokumentasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalContent">
                    <!-- Konten gambar atau PDF akan dimuat di sini -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../asset/vendor/jquery/jquery.min.js"></script>
    <script src="../../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../asset/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../asset/js/demo/chart-area-demo.js"></script>
    <script src="../../asset/js/demo/chart-pie-demo.js"></script>
    <script src="../../asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../../js/bs-custom-file-input.js"></script>

    <!-- datepicker bootstrap -->
    <script src="../../js/sweetalert2.all.min.js"></script>
    <script src="../../asset/js/bootstrap-datepicker.min.js"></script>
    <script src="../../asset/locales/bootstrap-datepicker.id.min.js"></script>
    <script src="../../js/select2.min.js"></script>

    <script>
        const sessionUsername = "<?= $_SESSION['username'] ?>";
    </script>
    <!-- Relationship Status JS -->
    <script src="permit_status.js"></script>
</body>

</html>
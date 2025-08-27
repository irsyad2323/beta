<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Status | Business Solutions | NARATEL</title>

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
                                            <h6 class="m-0 font-weight-bold text-primary">Data Status</h6>
                                            <div class="d-flex align-items-center">
                                                <select class="form-control" id="filter" name="filter" autocomplete="off">
                                                    <option value="" <?= $_SESSION['username'] == '' ? 'selected' : ''; ?>>Semua</option>
                                                    <option value="rolies" <?= $_SESSION['username'] == 'rolies' ? 'selected' : ''; ?>>Rolies</option>
                                                    <option value="nyoman" <?= $_SESSION['username'] == 'nyoman' ? 'selected' : ''; ?>>Nyoman</option>
                                                    <option value="vicky" <?= $_SESSION['username'] == 'vicky' ? 'selected' : ''; ?>>Vicky</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center" id="tabel_permit_status" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Hot Prospek</th>
                                                        <th>Kode</th>
                                                        <th>Kelurahan</th>
                                                        <th>Lead</th>
                                                        <th>Status Terakhir</th>
                                                        <th>PIC Terakhir</th>
                                                        <th>Keterangan Terakhir</th>
                                                        <th>Tanggal Dibuat Terakhir</th>
                                                        <th>Lead Time</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Hot Prospek</th>
                                                        <th>Kode</th>
                                                        <th>Kelurahan</th>
                                                        <th>Lead</th>
                                                        <th>Status Terakhir</th>
                                                        <th>PIC Terakhir</th>
                                                        <th>Keterangan Terakhir</th>
                                                        <th>Tanggal Dibuat Terakhir</th>
                                                        <th>Lead Time</th>
                                                        <th>Aksi</th>
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

    <!-- Modal View Detail Status -->
    <div class="modal fade" id="viewPermitStatusDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewPermitStatusDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewPermitStatusDetailsModalLabel">Status Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="d-sm-flex align-items-center justify-content-end mb-3">
                        <button class="btn btn-success insertTambahPermitStatus" data-id="">Tambah Status</button>
                    </div>

                    <div class="table-responsive">
                        <table id="modalDataTable" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>PIC</th>
                                    <th>Status</th>
                                    <th>Metode Followup</th>
                                    <th>Nominal Kontrak</th>
                                    <th>Rincian Paket Kerjasama</th>
                                    <th>Termin Pembayaran</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
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

    <!-- Modal Tambah Status -->
    <div class="modal fade" id="modalInsertPermitStatus" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data Status</h4>
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
                                <div class="form-row mb-3 col-6">
                                    <label for="pic">PIC <span class="text-danger">*</span></label>
                                    <select class="form-control" id="pic" name="pic" autocomplete="off" required>
                                        <option value="">Buka menu pilihan ini</option>
                                        <option value="rolies" <?php echo ($_SESSION['nama'] === 'rolies') ? 'selected' : ''; ?>>Rolies</option>
                                        <option value="nyoman" <?php echo ($_SESSION['nama'] === 'nyoman') ? 'selected' : ''; ?>>Nyoman</option>
                                        <option value="vicky" <?php echo ($_SESSION['nama'] === 'vicky') ? 'selected' : ''; ?>>Vicky</option>
                                    </select>
                                </div>

                                <!-- Status -->
                                <div class="form-row mb-3 col-6">
                                    <label for="status">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" type="text" id="status" name="status" autocomplete="off" required>
                                        <option value="">Buka menu pilihan ini</option>
                                        <option value="inisiasi">Contacted</option>
                                        <option value="follow_up">Send Offer</option>
                                        <option value="negosiasi">Negotiation</option>
                                        <option value="closing">Deal</option>
                                        <option value="control_visit">Lost</option>
                                    </select>
                                </div>

                                <!-- Metode Followup -->
                                <input class="form-control" type="hidden" id="metode_followup" name="metode_followup" value="visit">

                                <!-- Nominal Kontrak -->
                                <div class="form-row mb-3 col-6" style="display: none;">
                                    <label for="total_komitmen">Nominal Kontrak <span class="text-danger">*</span></label>
                                    <input class="form-control nominal" type="text" id="total_komitmen" name="total_komitmen" placeholder="0" autocomplete="off">
                                </div>

                                <!-- Rincian Paket Kerjasama -->
                                <div class="form-row mb-3 col-6" style="display: none;">
                                    <label for="deskripsi_komitmen">Rincian Paket Kerjasama <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="deskripsi_komitmen" name="deskripsi_komitmen" placeholder="Bandwidth, jenis perangkat, dan sebagainya." rows="1" autocomplete="off"></textarea>
                                </div>

                                <!-- BA Kerjasama -->
                                <div class="form-row mb-3 col-6" style="display: none;">
                                    <label for="berita_acara">BA Kerjasama <span class="text-danger">*</span></label>
                                    <input type="file" name="berita_acara" class="form-control-file input-design" id="berita_acara">
                                </div>

                                <!-- Termin Pembayaran -->
                                <div class="form-row mb-3 col-6" style="display: none;">
                                    <label for="termin_pembayaran">Termin Pembayaran <span class="text-danger">*</span></label>
                                    <select class="form-control" type="text" id="termin_pembayaran" name="termin_pembayaran" autocomplete="off">
                                        <option value="">Buka menu pilihan ini</option>
                                        <option value="1_bulan">1 Bulan</option>
                                        <option value="3_bulan">3 Bulan</option>
                                        <option value="6_bulan">6 Bulan</option>
                                        <option value="9_bulan">9 Bulan</option>
                                        <option value="12_bulan">12 Bulan</option>
                                    </select>
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

    <!-- Modal Edit Status -->
    <div class="modal fade" id="modalEditPermitStatus" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Ubah Data Status</h4>
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
                                <div class="form-row mb-3 col-6">
                                    <label for="pic1">PIC <span class="text-danger">*</span></label>
                                    <select class="form-control" type="text" id="pic1" name="pic1" autocomplete="off" required>
                                        <option value="rolies">Rolies</option>
                                        <option value="nyoman">Nyoman</option>
                                        <option value="vicky">Vicky</option>
                                    </select>
                                </div>

                                <!-- Status -->
                                <div class="form-row mb-3 col-6">
                                    <label for="status1">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" type="text" id="status1" name="status1" autocomplete="off" required>
                                        <option value="inisiasi">Contacted</option>
                                        <option value="follow_up">Send Offer</option>
                                        <option value="negosiasi">Negotiation</option>
                                        <option value="closing">Deal</option>
                                        <option value="control_visit">Lost</option>
                                    </select>
                                </div>

                                <!-- Metode Followup -->
                                <input class="form-control" type="hidden" id="metode_followup1" name="metode_followup1" value="visit">

                                <!-- Nominal Kontrak -->
                                <div class="form-row mb-3 col-4">
                                    <label for="total_komitmen1">Nominal Kontrak <span class="text-danger">*</span></label>
                                    <input class="form-control nominal" type="text" id="total_komitmen1" name="total_komitmen1" placeholder="2000000" autocomplete="off">
                                </div>

                                <!-- Rincian Paket Kerjasama -->
                                <div class="form-row mb-3 col-4">
                                    <label for="deskripsi_komitmen1">Rincian Paket Kerjasama <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="deskripsi_komitmen1" name="deskripsi_komitmen1" placeholder="Bandwidth, jenis perangkat, dan sebagainya." rows="1" autocomplete="off"></textarea>
                                </div>

                                <!-- Termin Pembayaran -->
                                <div class="form-row mb-3 col-4">
                                    <label for="termin_pembayaran1">Termin Pembayaran <span class="text-danger">*</span></label>
                                    <select class="form-control" type="text" id="termin_pembayaran1" name="termin_pembayaran1" autocomplete="off">
                                        <option value="">Buka menu pilihan ini</option>
                                        <option value="1_bulan">1 Bulan</option>
                                        <option value="3_bulan">3 Bulan</option>
                                        <option value="6_bulan">6 Bulan</option>
                                        <option value="9_bulan">9 Bulan</option>
                                        <option value="12_bulan">12 Bulan</option>
                                    </select>
                                </div>

                                <!-- BA Kerjasama -->
                                <div class="form-row mb-3 col-6">
                                    <label for="berita_acara1">BA Kerjasama</label>
                                    <input type="file" name="berita_acara" class="form-control-file input-design" id="berita_acara1">
                                </div>

                                <!-- Dokumentasi -->
                                <div class="form-group mb-3 col-6">
                                    <label for="dokumentasi">Dokumentasi</label>
                                    <input type="file" name="dokumentasi" class="form-control-file input-design" id="dokumentasi">
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
                <div class="modal-body">
                    <img id="modalImage" src="" class="img-fluid" alt="Gambar Dokumentasi">
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
    <!-- Status JS -->
    <script src="status.js"></script>
</body>

</html>
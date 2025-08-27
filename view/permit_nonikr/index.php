<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Partner Head | Partner Relationship | NARATEL</title>

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

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-3">
                        <h3 class="text-gray-800">Partner Head</h3>
                    </div> -->

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
                                            <h6 class="m-0 font-weight-bold text-primary mb-3">Data Partner Head</h6>
                                            <?php
                                            if ($_SESSION["level_user"] != "ikr" && $_SESSION["level_user"] != "Admin") {
                                            ?>
                                                <button class="btn btn-success tambahPartnerHead">Tambah Partner Head</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center" id="tabel_partner_head" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <th>RT</th>
                                                        <th>RW</th>
                                                        <th>Kelurahan</th>
                                                        <th>Telepon</th>
                                                        <th>Jabatan</th>
                                                        <th>Kantor</th>
                                                        <th>Nama Bank</th>
                                                        <th>Nomor Rekening</th>
                                                        <th>Atas Nama Rekening</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Nama</th>
                                                        <th>Alamat</th>
                                                        <th>RT</th>
                                                        <th>RW</th>
                                                        <th>Kelurahan</th>
                                                        <th>Telepon</th>
                                                        <th>Jabatan</th>
                                                        <th>Kantor</th>
                                                        <th>Nama Bank</th>
                                                        <th>Nomor Rekening</th>
                                                        <th>Atas Nama Rekening</th>
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

    <!-- Modal Partner Head -->
    <div class="modal fade" id="modalTambahPartnerHead" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data Partner Head</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form role="form" method="post" id="addPartnerHeadForm">

                        <?php
                        if ($_SESSION["level_user"] != "ikr") {
                        ?>

                            <!-- Nama -->
                            <div class="form-row mb-3">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="nama" name="nama" placeholder="Fulan" required>
                            </div>

                            <!-- Alamat -->
                            <div class="form-row mb-3">
                                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="alamat" name="alamat" placeholder="Jl. Industri barat no. 3" autocomplete="off" required>
                            </div>

                            <!-- RT -->
                            <div class="form-row mb-3">
                                <label for="rt">RT <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" id="rt" name="rt" placeholder="06" autocomplete="off" required>
                            </div>

                            <!-- RW -->
                            <div class="form-row mb-3">
                                <label for="rw">RW <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" id="rw" name="rw" placeholder="04" autocomplete="off" required>
                            </div>

                            <!-- Kelurahan -->
                            <div class="form-row mb-3">
                                <label for="kelurahan">Kelurahan <span class="text-danger">*</span></label>
                                <select class="form-control" id="kelurahan" name="kelurahan" autocomplete="off" required>
                                    <option value="">Buka menu pilihan ini</option>
                                    <?php
                                    include('../../controller/controller.php');

                                    // Using PDO to query the database
                                    $stmt = $conn->query("SELECT nama_kel AS kelurahan FROM tb_kelurahan");
                                    $kelurahan = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($kelurahan as $data_kelurahan) {
                                    ?>
                                        <option value="<?= htmlspecialchars($data_kelurahan['kelurahan']) ?>"><?= htmlspecialchars($data_kelurahan['kelurahan']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- Telepon -->
                            <div class="form-row mb-3">
                                <label for="tlp">Telepon <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" id="tlp" name="tlp" placeholder="088123456789" autocomplete="off" required>
                            </div>

                            <!-- Jabatan -->
                            <div class="form-row mb-3">
                                <label for="jabatan">Jabatan <span class="text-danger">*</span></label>
                                <select class="form-control" type="text" id="jabatan" name="jabatan" autocomplete="off" required>
                                    <option value="">Buka menu pilihan ini</option>
                                    <option value="developer">Developer</option>
                                    <option value="lurah/kades">Lurah/Kades</option>
                                    <option value="sekdes">Sekdes</option>
                                    <option value="ketua_rw">Ketua RW</option>
                                    <option value="ketua_rt">Ketua RT</option>
                                    <option value="lainnya">Lainnya</option>
                                    sekdes dan developer di kolom input jabatan
                                </select>
                            </div>

                            <!-- Kantor Cabang -->
                            <div class="form-row mb-3">
                                <label for="kd_layanan">Kantor Cabang <span class="text-danger">*</span></label>
                                <select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" required>
                                    <option value="">Buka menu pilihan ini</option>
                                    <option value="mlg">Malang</option>
                                    <option value="mlg1">Jalantra</option>
                                    <option value="pas">Pasuruan</option>
                                    <option value="batu">Batu</option>
                                    <option value="bangil">Bangil</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success  pull-right">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <?php
                        }
                        ?>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Partner Head -->
    <div class="modal fade" id="modalEditPartnerHead" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Edit Partner Head</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form role="form" method="post" id="updatePartnerHeadForm">

                        <!-- FORM ISIAN DATA ADMIN -->
                        <?php
                        if ($_SESSION["level_user"] != "ikr") {
                        ?>
                            <input class="form-control" type="hidden" id="key_fal1" name="key_fal1">

                            <!-- Nama -->
                            <div class="form-row mb-3">
                                <label for="nama1">Nama <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="nama1" name="nama1" placeholder="Fulan" required>
                            </div>

                            <!-- Alamat -->
                            <div class="form-row mb-3">
                                <label for="alamat1">Alamat <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="alamat1" name="alamat1" placeholder="Jl. Industri barat no. 3" autocomplete="off" required>
                            </div>

                            <!-- RT -->
                            <div class="form-row mb-3">
                                <label for="rt1">RT <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" id="rt1" name="rt1" placeholder="06" autocomplete="off" required>
                            </div>

                            <!-- RW -->
                            <div class="form-row mb-3">
                                <label for="rw1">RW <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" id="rw1" name="rw1" placeholder="04" autocomplete="off" required>
                            </div>

                            <!-- Kelurahan -->
                            <div class="form-row mb-3">
                                <label for="kelurahan1">Kelurahan <span class="text-danger">*</span></label>
                                <select class="form-control" id="kelurahan1" name="kelurahan1" autocomplete="off" required>
                                    <option value="">Buka menu pilihan ini</option>
                                    <?php
                                    // Using PDO to query the database
                                    $stmt = $conn->query("SELECT nama_kel AS kelurahan FROM tb_kelurahan");
                                    $kelurahan = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($kelurahan as $data_kelurahan) {
                                    ?>
                                        <option value="<?= htmlspecialchars($data_kelurahan['kelurahan']) ?>"><?= htmlspecialchars($data_kelurahan['kelurahan']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- Telepon -->
                            <div class="form-row mb-3">
                                <label for="tlp1">Telepon <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" id="tlp1" name="tlp1" placeholder="088123456789" autocomplete="off" required>
                            </div>

                            <!-- Jabatan -->
                            <div class="form-row mb-3">
                                <label for="jabatan1">Jabatan <span class="text-danger">*</span></label>
                                <select class="form-control" type="text" id="jabatan1" name="jabatan1" autocomplete="off" required>
                                    <option value="developer">Developer</option>
                                    <option value="lurah/kades">Lurah/Kades</option>
                                    <option value="sekdes">Sekdes</option>
                                    <option value="ketua_rw">Ketua RW</option>
                                    <option value="ketua_rt">Ketua RT</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>

                            <!-- Kantor Cabang -->
                            <div class="form-row mb-3">
                                <label for="kd_layanan1">Kantor Cabang <span class="text-danger">*</span></label>
                                <select class="form-control" type="text" id="kd_layanan1" name="kd_layanan1" autocomplete="off" required>
                                    <option value="mlg">Malang</option>
                                    <option value="mlg1">Jalantra</option>
                                    <option value="pas">Pasuruan</option>
                                    <option value="batu">Batu</option>
                                    <option value="bangil">Bangil</option>
                                </select>
                            </div>

                            <!-- Nama Bank -->
                            <div class="form-row mb-3">
                                <label for="nama_bank1">Nama Bank</label>
                                <select class="form-control" type="text" id="nama_bank1" name="nama_bank1" autocomplete="off">
                                    <option value="">Buka menu pilihan ini</option>
                                    <!-- Bank Milik Negara (BUMN) -->
                                    <option value="Bank Mandiri">Bank Mandiri</option>
                                    <option value="BNI">Bank Negara Indonesia (BNI)</option>
                                    <option value="BRI">Bank Rakyat Indonesia (BRI)</option>
                                    <option value="BTN">Bank Tabungan Negara (BTN)</option>

                                    <!-- Bank Swasta Nasional -->
                                    <option value="BCA">Bank Central Asia (BCA)</option>
                                    <option value="CIMB Niaga">Bank CIMB Niaga</option>
                                    <option value="Danamon">Bank Danamon</option>
                                    <option value="Permata">Bank Permata</option>
                                    <option value="Panin">Bank Panin</option>
                                    <option value="OCBC NISP">Bank OCBC NISP</option>
                                    <option value="Mega">Bank Mega</option>
                                    <option value="Maybank Indonesia">Bank Maybank Indonesia</option>
                                    <option value="UOB Indonesia">Bank UOB Indonesia</option>
                                    <option value="Sinarmas">Bank Sinarmas</option>
                                    <option value="Bukopin">Bank Bukopin</option>
                                    <option value="BTPN">Bank BTPN</option>

                                    <!-- Bank Syariah -->
                                    <option value="BSI">Bank Syariah Indonesia (BSI)</option>
                                    <option value="Muamalat">Bank Muamalat</option>
                                    <option value="Mega Syariah">Bank Mega Syariah</option>
                                    <option value="Panin Dubai Syariah">Bank Panin Dubai Syariah</option>

                                    <!-- Bank Daerah (BPD) -->
                                    <option value="Bank DKI">Bank DKI</option>
                                    <option value="BJB">Bank Jabar Banten (BJB)</option>
                                    <option value="Bank Jatim">Bank Jatim</option>
                                    <option value="Bank Sumut">Bank Sumut</option>
                                    <option value="Bank Nagari">Bank Nagari</option>
                                    <option value="Bank Riau Kepri">Bank Riau Kepri</option>
                                    <option value="Bank BPD DIY">Bank BPD DIY</option>
                                    <option value="Bank Kaltimtara">Bank Kaltimtara</option>
                                    <option value="Bank Kalsel">Bank Kalsel</option>
                                    <option value="Bank Sulselbar">Bank Sulselbar</option>
                                </select>
                            </div>

                            <!-- Nomor Rekening -->
                            <div class="form-row mb-3">
                                <label for="no_rekening1">Nomor Rekening</label>
                                <input class="form-control" type="number" id="no_rekening1" name="no_rekening1" placeholder="126001016378392" autocomplete="off">
                            </div>

                            <!-- Atas Nama Rekening -->
                            <div class="form-row mb-3">
                                <label for="atas_nama_rekening1">Atas Nama Rekening</label>
                                <input class="form-control" type="text" id="atas_nama_rekening1" name="atas_nama_rekening1" placeholder="Fulan">
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

    <!-- Index JS -->
    <script src="index.js"></script>
</body>

</html>
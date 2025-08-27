<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lead | Business Solutions | NARATEL</title>

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
                        <h3 class="text-gray-800">Head</h3>
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
                                            <h6 class="m-0 font-weight-bold text-primary mb-3">Data Lead</h6>
                                            <div class="d-flex align-items-center">
                                                <button class="btn btn-success tambahPartnerHead mr-3">Tambah Lead</button>
                                                <div class="flex-grow-1">
                                                    <select class="form-control" id="filter" name="filter" autocomplete="off">
                                                        <option value="" <?= $_SESSION['username'] == '' ? 'selected' : ''; ?>>Semua</option>
                                                        <option value="rolies" <?= $_SESSION['username'] == 'rolies' ? 'selected' : ''; ?>>Rolies</option>
                                                        <option value="nyoman" <?= $_SESSION['username'] == 'nyoman' ? 'selected' : ''; ?>>Nyoman</option>
                                                        <option value="vicky" <?= $_SESSION['username'] == 'vicky' ? 'selected' : ''; ?>>Vicky</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center" id="tabel_partner_head" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Nama Instansi</th>
                                                        <th>Alamat Instansi</th>
                                                        <th>Kelurahan</th>
                                                        <th>Contact Person</th>
                                                        <th>Telepon</th>
                                                        <th>Jabatan</th>
                                                        <th>Kantor</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Nama Instansi</th>
                                                        <th>Alamat Instansi</th>
                                                        <th>Kelurahan</th>
                                                        <th>Contact Person</th>
                                                        <th>Telepon</th>
                                                        <th>Jabatan</th>
                                                        <th>Kantor</th>
                                                        <th>Tanggal Dibuat</th>
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

    <!-- Modal Head -->
    <div class="modal fade" id="modalTambahPartnerHead" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data Lead</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form role="form" method="post" id="addPartnerHeadForm">

                        <?php
                        if ($_SESSION["level_user"] != "ikr") {
                        ?>

                            <!-- Nama Instansi -->
                            <div class="form-row mb-3">
                                <label for="nama_instansi">Nama Instansi</label>
                                <input class="form-control" type="text" id="nama_instansi" name="nama_instansi" placeholder="Hotel Santika" required>
                            </div>

                            <!-- Alamat Instansi -->
                            <div class="form-row mb-3">
                                <label for="alamat_instansi">Alamat Instansi</label>
                                <input class="form-control" type="text" id="alamat_instansi" name="alamat_instansi" placeholder="Jl. Industri barat no. 3" autocomplete="off" required>
                            </div>

                            <!-- Kelurahan -->
                            <div class="form-row mb-3">
                                <label for="kelurahan">Kelurahan</label>
                                <select class="form-control" id="kelurahan" name="kelurahan" autocomplete="off" required>
                                    <option value="">Buka menu pilihan ini</option>
                                    <?php
                                    include('../../controller/controller.php');

                                    // Using PDO to query the database
                                    $stmt = $conn->query("SELECT nama_kel AS kelurahan FROM tb_kelurahan");
                                    $kelurahan = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($kelurahan as $data_kelurahan) {
                                    ?>
                                        <option value="<?= $data_kelurahan['kelurahan'] ?>"><?= $data_kelurahan['kelurahan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- Contact Person -->
                            <div class="form-row mb-3">
                                <label for="contact_person">Contact Person</label>
                                <input class="form-control" type="text" id="contact_person" name="contact_person" placeholder="Fulan" required>
                            </div>

                            <!-- Telepon -->
                            <div class="form-row mb-3">
                                <label for="telepon">Telepon</label>
                                <input class="form-control" type="number" id="telepon" name="telepon" placeholder="088123456789" autocomplete="off" required>
                            </div>

                            <!-- Jabatan -->
                            <div class="form-row mb-3">
                                <label for="jabatan">Jabatan</label>
                                <input class="form-control" type="text" id="jabatan" name="jabatan" placeholder="Manajer" required>
                            </div>

                            <!-- Kantor Cabang -->
                            <div class="form-row mb-3">
                                <label for="kd_layanan">Kantor Cabang</label>
                                <select class="form-control" type="text" id="kd_layanan" name="kd_layanan" autocomplete="off" required>
                                    <option value="">Buka menu pilihan ini</option>
                                    <option value="mlg">Malang</option>
                                    <option value="mlg1">Jalantra</option>
                                    <option value="pas">Pasuruan</option>
                                    <option value="batu">Batu</option>
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

    <!-- Modal Edit Head -->
    <div class="modal fade" id="modalEditPartnerHead" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Edit Lead</h4>
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

                            <!-- Nama Instansi -->
                            <div class="form-row mb-3">
                                <label for="nama_instansi1">Nama Instansi</label>
                                <input class="form-control" type="text" id="nama_instansi1" name="nama_instansi1" placeholder="Hotel Santika">
                            </div>

                            <!-- Alamat Instansi -->
                            <div class="form-row mb-3">
                                <label for="alamat_instansi1">Alamat Instansi</label>
                                <input class="form-control" type="text" id="alamat_instansi1" name="alamat_instansi1" placeholder="Jl. Industri barat no. 3" autocomplete="off">
                            </div>

                            <!-- Kelurahan -->
                            <div class="form-row mb-3">
                                <label for="kelurahan1">Kelurahan</label>
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

                            <!-- Contact Person -->
                            <div class="form-row mb-3">
                                <label for="contact_person1">Contact Person</label>
                                <input class="form-control" type="text" id="contact_person1" name="contact_person1" placeholder="Fulan">
                            </div>

                            <!-- Telepon -->
                            <div class="form-row mb-3">
                                <label for="telepon1">Telepon</label>
                                <input class="form-control" type="number" id="telepon1" name="telepon1" placeholder="088123456789" autocomplete="off">
                            </div>

                            <!-- Jabatan -->
                            <div class="form-row mb-3">
                                <label for="jabatan1">Jabatan</label>
                                <input class="form-control" type="text" id="jabatan1" name="jabatan1" placeholder="Manajer">
                            </div>

                            <!-- Kantor Cabang -->
                            <div class="form-row mb-3">
                                <label for="kd_layanan1">Kantor Cabang</label>
                                <select class="form-control" type="text" id="kd_layanan1" name="kd_layanan1" autocomplete="off">
                                    <option value="mlg">Malang</option>
                                    <option value="mlg1">Jalantra</option>
                                    <option value="pas">Pasuruan</option>
                                    <option value="batu">Batu</option>
                                </select>
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

    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 saat modal tambah dibuka
            $('#modalTambahPartnerHead').on('shown.bs.modal', function() {
                $('#kelurahan').select2({
                    placeholder: "Pilih Kelurahan",
                    allowClear: true,
                    dropdownParent: $('#modalTambahPartnerHead'), // Mengikat dropdown ke modal
                    width: '100%'
                });
            });

            // Inisialisasi Select2 saat modal edit dibuka
            $('#modalEditPartnerHead').on('shown.bs.modal', function() {
                $('#kelurahan1').select2({
                    placeholder: "Pilih Kelurahan",
                    allowClear: true,
                    dropdownParent: $('#modalEditPartnerHead'), // Mengikat dropdown ke modal
                    width: '100%'
                });
            });
        });
    </script>

    <!-- Index JS -->
    <script src="index.js"></script>
</body>

</html>
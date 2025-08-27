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

    <title>Permit - Naratel</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../img/icons/kaptennaratel.png" />

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

                    <?php
                    if ($_SESSION["level_user"] != "ikr" && $_SESSION["level_user"] != "Admin") {
                    ?>

                        <div class="d-sm-flex align-items-center  justify-content-end mb-4">
                            <button class="btn btn-success insertTambahPermit mr-3">Tambah Permit</button>
                            <button class="btn btn-success insertTambahPermitStatus">Tambah Permit Status</button>
                        </div>

                    <?php } ?>

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

                                <!-- Page Heading 
						        <h1 class="h3 mb-2 text-gray-800">Tables Instalasi Kapten</h1>
						        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
							    -->
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Data Masalah Perijinan Non IKR </h6>
                                        <br />
                                        <div class="box-header">
                                            <div class="col-sm-6 pull-left">
                                            </div>
                                            <!--button type="submit" id="add_profile_user" name="add_profile_user" class="btn bg-maroon btn-flat pull-right"><i class="fa fa-plus-square-o"><span> Add Profile</span></i></button-->
                                            <!--h3 class="box-title pull-right">Data Table Customer</h3-->
                                            <div class="col-sm-5 pull-right">

                                                <!--input type="text" class="form-control"-->
                                                <div class="input-group">
                                                    <select class="form-control" type="text" id="pilih_bln_thn" name="pilih_bln_thn" autocomplete="off" required>
                                                        <option value="">Filter Status</option>
                                                        <option value="inisiasi_perkenalan">Inisiasi/Perkenalan</option>
                                                        <option value="negosiasi">Negosiasi</option>
                                                        <option value="closing">Closing</option>
                                                        <option value="re_visit">Re-visit</option>
                                                        <option value="followup">Follow Up</option>
                                                        <option value="reject">Reject</option>
                                                        <option value="kolaborasi">Kolaborasi</option>
                                                    </select>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-danger filter_bln_thn btn-flat pull-right">Go!</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="tabel_permit_nonikr" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Nama</th>
                                                        <th>Obyek Jalan</th>
                                                        <th>tlp</th>
                                                        <th>tgl</th>
                                                        <th>Leadtime</th>
                                                        <th>Keterangan</th>
                                                        <th>Layanan</th>
                                                        <th>Kelurahan</th>
                                                        <th>RT</th>
                                                        <th>RW</th>
                                                        <th>PIC</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Nama</th>
                                                        <th>Obyek Jalan</th>
                                                        <th>tlp</th>
                                                        <th>tgl</th>
                                                        <th>Leadtime</th>
                                                        <th>Keterangan</th>
                                                        <th>Layanan</th>
                                                        <th>Kelurahan</th>
                                                        <th>RT</th>
                                                        <th>RW</th>
                                                        <th>PIC</th>
                                                        <th>Status</th>
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

    </div>

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

    <!-- Update by Andika on 06-07-2024: Updated field-form Modal Tambah Permit dan tambah Modal Tambah Permit Permit -->
    <!-- Modal Tambah Permit -->
    <div class="modal fade" id="modalTambahPermit" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data Permit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form role="form" method="post" id="addPermitForm">

                        <?php
                        if ($_SESSION["level_user"] != "ikr") {
                        ?>

                            <div class="form-row mb-3">
                                <label for="nama">Nama CP</label>
                                <input class="form-control" type="text" id="nama" name="nama" placeholder="nama..." required>
                            </div>

                            <div class="form-row mb-3">
                                <label for="alamat">Alamat</label>
                                <input class="form-control" type="text" id="alamat" name="alamat" placeholder="alamat..." autocomplete="off" required>
                            </div>

                            <div class="form-row mb-3">
                                <label for="rt">RT</label>
                                <input class="form-control" type="number" id="rt" name="rt" placeholder="rt..." autocomplete="off" required>
                            </div>

                            <div class="form-row mb-3">
                                <label for="rw">RW</label>
                                <input class="form-control" type="number" id="rw" name="rw" placeholder="rw..." autocomplete="off" required>
                            </div>

                            <div class="form-row mb-3">
                                <label for="kelurahan">Kelurahan</label>
                                <input class="form-control" type="text" id="kelurahan" name="kelurahan" placeholder="kelurahan..." autocomplete="off" required>
                            </div>

                            <div class="form-row mb-3">
                                <label for="tlp">NO. Telepon</label>
                                <input class="form-control" type="number" id="tlp" name="tlp" placeholder="telepon.." autocomplete="off" required>
                            </div>

                            <div class="form-row mb-3">
                                <label for="jabatan">Jabatan</label>
                                <select class="form-control" type="text" id="jabatan" name="jabatan" autocomplete="off" required>
                                    <option value="">Buka menu pilihan ini</option>
                                    <option value="lurah/kades">Lurah/Kades</option>
                                    <option value="ketua_rw">Ketua RW</option>
                                    <option value="ketua_rt">Ketua RT</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>

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

    <!-- Modal Tambah Permit Status -->
    <div class="modal fade" id="modalTambahPermitStatus" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data Permit Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form role="form" method="post" id="addPermitStatusForm">

                        <?php
                        if ($_SESSION["level_user"] != "ikr") {
                        ?>

                            <div class="form-row mb-3">
                                <label for="key_fal">Nama</label>
                                <select class="form-control" type="text" id="key_fal" name="key_fal" autocomplete="off" required>
                                    <option value="">Buka menu pilihan ini</option>
                                    <?php
                                    include('../controller/controller_mysqli.php');
                                    $permit = mysqli_query($koneksi, "SELECT * FROM tbl_permit");
                                    foreach ($permit as $data_permit) {
                                    ?>
                                        <option value="<?= $data_permit['key_fal'] ?>"> <?= $data_permit['nama'] . ($data_permit['rw'] && $data_permit['rw'] !== '00' ? ', RW ' . $data_permit['rw'] : '') . ', Kelurahan ' . $data_permit['kelurahan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-row mb-3">
                                <label for="pic">PIC</label>
                                <select class="form-control" type="text" id="pic" name="pic" autocomplete="off" required>
                                    <option value="">Buka menu pilihan ini</option>
                                    <option value="ivan">Ivan</option>
                                    <option value="anisa">Anisa</option>
                                    <option value="tio">Tio</option>
                                    <option value="ivan_tio">Ivan & Tio</option>
                                </select>
                            </div>

                            <div class="form-row mb-3">
                                <label for="status">Status Tahap</label>
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

                            <div class="form-row mb-3">
                                <label for="metode_followup">Metode Followup</label>
                                <select class="form-control" type="text" id="metode_followup" name="metode_followup" autocomplete="off" required>
                                    <option value="">Buka menu pilihan ini</option>
                                    <option value="byphone">By Phone</option>
                                    <option value="visit">Visit</option>
                                </select>
                            </div>

                            <div class="form-row mb-3">
                                <label for="keterangan">Keterangan Hasil</label>
                                <input class="form-control" type="text" id="keterangan" name="keterangan" placeholder="keterangan" autocomplete="off" required>
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

    <!-- Modal Edit Permit dan Permit Status -->
    <div class="modal fade" id="modalEditPermit" role="dialog" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Ubah Data Permit</h4>
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
                            <input class="form-control" type="hidden" id="key_fal1" name="key_fal1" placeholder="key_fal1...">
                            <input class="form-control" type="hidden" id="permit_status_id1" name="permit_status_id1" placeholder="permit_status_id1...">

                            <div class="form-row mb-3">
                                <label for="nama1">Nama CP</label>
                                <input class="form-control" type="text" id="nama1" name="nama1" placeholder="nama...">
                            </div>

                            <div class="form-row mb-3">
                                <label for="alamat1">Alamat</label>
                                <input class="form-control" type="text" id="alamat1" name="alamat1" placeholder="alamat..." autocomplete="off">
                            </div>

                            <div class="form-row mb-3">
                                <label for="rt1">RT</label>
                                <input class="form-control" type="number" id="rt1" name="rt1" placeholder="rt..." autocomplete="off">
                            </div>

                            <div class="form-row mb-3">
                                <label for="rw1">RW</label>
                                <input class="form-control" type="number" id="rw1" name="rw1" placeholder="rw..." autocomplete="off">
                            </div>

                            <div class="form-row mb-3">
                                <label for="kelurahan1">Kelurahan</label>
                                <input class="form-control" type="text" id="kelurahan1" name="kelurahan1" placeholder="kelurahan..." autocomplete="off">
                            </div>

                            <div class="form-row mb-3">
                                <label for="tlp1">NO. Telepon</label>
                                <input class="form-control" type="number" id="tlp1" name="tlp1" placeholder="telepon.." autocomplete="off">
                            </div>

                            <div class="form-row mb-3">
                                <label for="jabatan1">Jabatan</label>
                                <select class="form-control" type="text" id="jabatan1" name="jabatan1" autocomplete="off">
                                    <option value="lurah/kades">Lurah/Kades</option>
                                    <option value="ketua_rw">Ketua RW</option>
                                    <option value="ketua_rt">Ketua RT</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>

                            <div class="form-row mb-3">
                                <label for="kd_layanan1">Kantor Cabang</label>
                                <select class="form-control" type="text" id="kd_layanan1" name="kd_layanan1" autocomplete="off">
                                    <option value="mlg">Malang</option>
                                    <option value="mlg1">Jalantra</option>
                                    <option value="pas">Pasuruan</option>
                                    <option value="batu">Batu</option>
                                </select>
                            </div>

                            <!-- tbl_permit_status -->
                            <div class="form-row mb-3">
                                <label for="pic1">PIC</label>
                                <select class="form-control" type="text" id="pic1" name="pic1" autocomplete="off" required>
                                    <option value="" disabled>Buka menu pilihan ini</option>
                                    <option value="ivan">Ivan</option>
                                    <option value="anisa">Anisa</option>
                                    <option value="tio">Tio</option>
                                    <option value="ivan_tio">Ivan & Tio</option>
                                </select>
                            </div>

                            <div class="form-row mb-3">
                                <label for="status1">Status Tahap</label>
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

                            <div class="form-row mb-3">
                                <label for="metode_followup1">Metode Followup</label>
                                <select class="form-control" type="text" id="metode_followup1" name="metode_followup1" autocomplete="off">
                                    <option value="byphone">By Phone</option>
                                    <option value="visit">Visit</option>
                                </select>
                            </div>

                            <div class="form-row mb-3">
                                <label for="keterangan1">Keterangan</label>
                                <input class="form-control" type="text" id="keterangan1" name="keterangan1" placeholder="keterangan" autocomplete="off">
                            </div>

                            <div class="form-group mb-3">
                                <label for="file">Upload Hasil</label>
                                <input type="file" name="file" class="form-control-file input-design" id="file">
                                <span id="error" class="text-danger"></span><br>
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

</body>

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
        $(".filter_bln_thn").click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            var month_select = $('#pilih_bln_thn').val();
            //alert (month_select); return;
            /* var start_tgl = $('#pilih_bln_thn').data('daterangepicker').startDate.format('YYYY-MM-DD');
            var end_tgl = $('#pilih_bln_thn').data('daterangepicker').endDate.format('YYYY-MM-DD');		 */
            var value = {
                filter_status: month_select
            }
            $.ajax({
                type: "Post",
                url: "control/filter_permit.php",
                data: value,
                dataType: 'JSON',
                success: function(data) {

                    var filter_status = data.status;
                    //alert (filter_status); return;
                    $('#tabel_permit_nonikr').DataTable().clear().destroy();
                    $('#tabel_permit_nonikr').DataTable({
                        "paging": true,
                        "lengthChange": true,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        'responsive': true,
                        "ajax": {
                            "url": "../models/datapengguna_permitnonikr.php",
                            "type": "POST",
                            "data": function(d) {
                                d.filter_status = filter_status;
                            },
                        },
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
                                mData: 'jumday'
                            },

                            {
                                mData: 'keterangan'
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
                }

            });
        });


        // 
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
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
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
            "columns": [{
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

        // Update by Andika on 06-07-2024: Updated penanganan data form dikirim ke server untuk Tambah data untuk tbl_permit dan tbl_permit_status
        $(document).on('click', '.insertTambahPermit', function() {
            $('#modalTambahPermit').modal('show');
        });

        $(document).on('click', '.insertTambahPermitStatus', function() {
            $('#modalTambahPermitStatus').modal('show');
        });

        // READ - Ambil data permit berdasarkan key_fal
        $(document).on('click', '.editpermit', function() {
            var attributes = [
                'key_fal', 'permit_status_id', 'nama', 'alamat', 'rt', 'rw', 'kelurahan', 'tlp', 'jabatan', 'kd_layanan', 'pic', 'status', 'metode_followup', 'keterangan'
            ];

            attributes.forEach(function(attr) {
                $('#' + attr + '1').val($(this).attr(attr));
            }, this);

            $('#modalEditPermit').modal('show');
        });

        // INSERT - Tambah data untuk tbl_permit 
        $('#addPermitForm').submit(function(e) {
            e.preventDefault();

            // Mengambil data dari form
            const formData = new FormData(this);

            // Mengirim data ke backend menggunakan AJAX
            $.ajax({
                url: "../controller/action_insert_permit.php",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire(
                        'Alhamdulillah',
                        'Data permit berhasil ditambah.',
                        'success'
                    ).then(function(success) {
                        window.location.reload(true);
                    });
                },
                error: function(jqXHR) {
                    alert(jqXHR);
                },
            });
        });

        // INSERT - Tambah data untuk tbl_permit_status 
        $('#addPermitStatusForm').submit(function(e) {
            e.preventDefault();

            // Mengambil data dari form
            const formData = new FormData(this);

            // Mengirim data ke backend menggunakan AJAX
            $.ajax({
                url: "../controller/action_insert_permit_status.php",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire(
                        'Alhamdulillah',
                        'Data permit status berhasil ditambah.',
                        'success'
                    ).then(function(success) {
                        window.location.reload(true);
                    });
                },
                error: function(jqXHR) {
                    alert(jqXHR);
                },
            });
        });

        // UPDATE - Simpan data permit baru
        $('#updatePermitForm').on('submit', (function(e) {
            e.preventDefault();

            var fd = new FormData();
            var key_fal = $("#key_fal1").val();
            var permit_status_id = $("#permit_status_id1").val();
            var nama = $("#nama1").val();
            var alamat = $("#alamat1").val();
            var rt = $("#rt1").val();
            var rw = $("#rw1").val();
            var kelurahan = $("#kelurahan1").val();
            var tlp = $("#tlp1").val();
            var jabatan = $("#jabatan1").val();
            var kd_layanan = $("#kd_layanan1").val();
            var pic = $("#pic1").val();
            var status = $("#status1").val();
            var metode_followup = $("#metode_followup1").val();
            var keterangan = $("#keterangan1").val();
            var files = $('#file')[0].files[0];

            fd.append('key_fal', key_fal);
            fd.append('permit_status_id', permit_status_id);
            fd.append('nama', nama);
            fd.append('alamat', alamat);
            fd.append('rt', rt);
            fd.append('rw', rw);
            fd.append('kelurahan', kelurahan);
            fd.append('tlp', tlp);
            fd.append('jabatan', jabatan);
            fd.append('kd_layanan', kd_layanan);
            fd.append('pic', pic);
            fd.append('status', status);
            fd.append('metode_followup', metode_followup);
            fd.append('keterangan', keterangan);
            fd.append('file', files);
            fd.append('files', files);

            $.ajax({
                type: 'POST',
                url: '../controller/action_edit_permit.php',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    Swal.fire(
                        'Alhamdulillah',
                        'Data permit berhasil diperbarui.',
                        'success'
                    ).then(function(success) {
                        window.location.reload(true);
                    });
                },
            });
        }));

        $(document).on('click', '.deletepengguna', function() {

            var username_fal = $(this).attr("username_fal");

            //alert (username_fal); return;

            if (confirm('Hapus id ' + username_fal + '?')) {
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
                        });
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
    }); */

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
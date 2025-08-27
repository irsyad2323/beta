<?php
session_start();

if (!isset($_SESSION["logingundala"])) {
    header("location:login.php");
    exit;
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
    <title>SB Admin 2 - IKR</title>
    <!-- CSS -->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="../asset/vendor/datatables/dataTables.bootstrap4.min.css">
    <link href="../asset/css/sb-admin-2.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.7/dist/sweetalert2.min.css">
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
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
                                <div class="dropdown-divider"></div> -->
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
                        <h1 class="h3 mb-0 text-gray-800">IKR</h1>
                        <?php
                        if ($_SESSION["level_user"] != "ikr" && $_SESSION["level_user"] != "Admin") {
                        ?>
                            <div>

                                <a href="controller/export.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                    <i class="fas fa-download fa-sm text-white-50"></i> Generate Export
                                </a>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">


                        <?php

                        if ($_SESSION["level_user"] != "Admin" && $_SESSION["level_user"] != "kapten" && $_SESSION["level_user"] != "ts") {

                        ?>

                            <div class="my-2"></div>
                            <a href="index.php" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">HOME</span>
                            </a>
                        <?php } ?>
                    </div>

                    <!-- Content Row -->
                    <?php
                    if ($_SESSION["level_user"] != "ts") {
                    ?>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data IKR</h6>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabel_pengguna_ikr" class="table table-bordered table-striped">
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <button id="btnFilterTanggal" class="btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-calendar"></i> Filter Tanggal
                                                </button>
                                                <span id="selectedRange" class="ml-2 text-muted"></span>
                                            </div>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>ID IKR</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Pic IKR</th>
                                                <th>Kelurahan</th>
                                                <th>Kabupaten</th>
                                                <th>Keterangan</th>
                                                <th>PIC</th>
                                                <th>Status WO</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                    <?php
                    } else {

                    ?>

                        <!-- <div class="table-responsive">
                            <table id="tabel_pengguna_ts" class="table table-bordered table-striped">

                                <thead>

                                    <tr>

                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Pic ODP</th>
                                        <th>Spliter</th>
                                        <th>Spliter 2</th>
                                        <th>Spliter 3</th>
                                        <th>Keterangan</th>
                                        <th>Jenis Pekerjaan</th>
                                        <th>Teknisi</th>
                                        <th>Teknisi 2</th>
                                        <th>Status WO</th>
                                        <th>Action</th>


                                    </tr>
                                </thead>
                                <tbody></tbody>

                            </table>
                        </div> -->

                    <?php
                    }
                    ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Modal untuk Lihat Foto -->
            <div class="modal fade" id="modalFotoBase64" tabindex="-1" role="dialog" aria-labelledby="modalFotoBase64Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Foto ODP</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <img id="fotoBase64" src="" alt="Foto ODP" class="img-fluid rounded" />
                        </div>
                    </div>
                </div>
            </div>

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

    <!-- Insert Modal-->
    <div class="modal fade" id="modaltambahdata" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-user">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body px-0">
                    <form role="form" method="post" id="formdatapengguna" class="px-3">

                        <!-- Hidden Input for ID -->
                        <input type="hidden" id="id" name="id">

                        <!-- Row 1: Letak ODP -->
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="letak_odpne">Letak ODP</label>
                                <select class="form-control" id="letak_odpne" name="letak_odpne" required>
                                    <?php
                                    include('../controller/controller_mysqli.php');
                                    $sql_user = mysqli_query($koneksi, "SELECT * FROM tbl_odp");
                                    while ($data_user = mysqli_fetch_array($sql_user)) {
                                        echo '<option value="' . $data_user['id_odp'] . '">' . $data_user['id_odp'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="alamat_odp">Alamat</label>
                                <input class="form-control" type="text" id="alamat_odp" name="alamat_odp" placeholder="alamat..." autocomplete="off" required>
                            </div>
                        </div>

                        <!-- Row 2: Kantor Cabang, Kelurahan, dan Keterangan -->
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="kd_layanan_display">Kantor Cabang</label>
                                <input type="text" class="form-control" id="kd_layanan" value="<?= $kd_layanan ?>" readonly>

                                <!-- Ini dikirim ke server saat form disubmit -->
                                <input type="hidden" name="kd_layanan" value="<?= $kd_layanan ?>">
                            </div>


                            <div class="form-group col-md-2">
                                <label for="kelurahan">Kelurahan</label>
                                <input class="form-control" type="text" id="kelurahan" name="kelurahan" placeholder="kelurahan..." autocomplete="off">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="lain_lain">Keterangan</label>
                                <input class="form-control" type="text" id="lain_lain" name="lain_lain" placeholder="keterangan..." autocomplete="off">
                            </div>
                        </div>

                        <!-- Row 3: Map Location -->
                        <div class="form-group w-100 px-3">
                            <label for="map">Lokasi ODP</label>
                            <div id="map" style="height: 350px; width: 100%; border-radius: 5px;"></div>
                        </div>

                        <!-- Hidden Fields: Latitude, Longitude -->
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">

                        <!-- Action Buttons -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-success submitdata" name="action" id="action" value="insert">
                                <i class="fa fa-check fa-fw"></i> SAVE
                            </button>
                            <button type="reset" class="btn btn-danger">
                                <i class="fa fa-times fa-fw"></i> Reset
                            </button>
                        </div>

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

    <!-- JavaScript -->
    <script src="../asset/vendor/jquery/jquery.min.js"></script> <!-- jQuery harus dimuat terlebih dahulu -->
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../asset/js/sb-admin-2.min.js"></script>
    <script src="../asset/vendor/chart.js/Chart.min.js"></script>
    <script src="../asset/js/demo/chart-area-demo.js"></script>
    <script src="../asset/js/demo/chart-pie-demo.js"></script>
    <script src="../asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.7/dist/sweetalert2.all.min.js"></script>

    <!-- Moment.js sebelum Daterangepicker -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- JavaScript untuk Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCF0F_M6IBOlzYMqrHQXiSBbnvv8npHafs&callback=initMap" async defer></script>

    <script>
        $(document).ready(function() {
            var startDate = '';
            var endDate = '';

            var table = $('#tabel_pengguna_ikr').DataTable({
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                },
                "ajax": {
                    url: "../models/datapengguna_ikr_new.php",
                    type: "POST",
                    data: function(d) {
                        d.page = d.start / d.length + 1;
                        d.startDate = startDate;
                        d.endDate = endDate;
                    }
                },
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                columns: [{
                        mData: 'no'
                    },
                    {
                        mData: 'username_fal'
                    },
                    {
                        mData: 'nama_fal'
                    },
                    {
                        mData: 'alamat_fal'
                    },
                    {
                        mData: 'pic_ikr'
                    },
                    {
                        mData: 'kelurahan'
                    },
                    {
                        mData: 'kabupaten'
                    },
                    {
                        mData: 'lain_lain'
                    },
                    {
                        mData: 'pic'
                    },
                    {
                        mData: 'status_wo'
                    },
                    {
                        mData: 'action'
                    }
                ]
            });

            // Inisialisasi Daterangepicker tapi tidak otomatis ditampilkan
            var datePicker = $('#btnFilterTanggal').daterangepicker({
                opens: 'left',
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'YYYY-MM-DD'
                }
            }, function(start, end, label) {
                // Callback ketika dipilih
                startDate = start.format('YYYY-MM-DD');
                endDate = end.format('YYYY-MM-DD');
                $('#selectedRange').text(startDate + ' - ' + endDate);
                table.ajax.reload();
            });

            // Hapus filter jika diklik cancel
            $('#btnFilterTanggal').on('cancel.daterangepicker', function(ev, picker) {
                startDate = '';
                endDate = '';
                $('#selectedRange').text('');
                table.ajax.reload();
            });

            // var table = $('#tabel_pengguna_ts').DataTable({
            //     "responsive": true,
            //     "processing": true,
            //     "language": {
            //         processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
            //     },
            //     "ajax": {
            //         "url": "../models/datapengguna_odp.php",
            //         "type": "POST",
            //     },
            //     "paging": true,
            //     "lengthChange": true,
            //     "searching": true,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": true,
            //     "responsive": true,
            //     "columns": [{
            //             mData: 'no'
            //         },
            //         {
            //             mData: 'nama_odp'
            //         },
            //         {
            //             mData: 'alamat_odp'
            //         },
            //         {
            //             mData: 'pic_ikr'
            //         },
            //         {
            //             mData: 'spliter'
            //         },
            //         {
            //             mData: 'spliter2'
            //         },
            //         {
            //             mData: 'spliter3'
            //         },
            //         {
            //             mData: 'lain_lain'
            //         },
            //         {
            //             mData: 'jenis_wo'
            //         },
            //         {
            //             mData: 'pic'
            //         },
            //         {
            //             mData: 'pic2'
            //         },
            //         {
            //             mData: 'status_wo'
            //         },
            //         {
            //             mData: 'action'
            //         },
            //     ],
            // });

            // $(document).on('click', '.add-data', function() {
            //     $('#modaltambahdata').modal('show');
            //     $("#formdatapengguna").trigger("reset");
            //     $("#id_odp").attr("disabled", false);
            //     $('.modal-user').text("Tambah Data");
            //     $('#action').val('insert');
            //     $('#actionform').text("Tambah");
            // });

            $("#formdatapengguna").submit(function(e) {
    e.preventDefault(); // Mencegah reload form

    // Ambil nilai dari form input
    var selectedId = $("#id").val(); // Pastikan nilai ID diambil dari input field

    // Tambahkan selectedId ke formData
    var formData = {
        action: $("#action").val(),
        id: selectedId, // Menggunakan selectedId untuk ID
        letak_odpne: $("#letak_odpne").val(),
        alamat_odp: $("#alamat_odp").val(),
        kd_layanan: $("#kd_layanan").val(),
        kelurahan: $("#kelurahan").val(),
        lain_lain: $("#lain_lain").val(),
        latitude: $("#latitude").val(),
        longitude: $("#longitude").val(),
    };

    console.log(formData); // Debug: Lihat data yang akan dikirimkan

    $.ajax({
        type: "POST",
        url: "../controller/action_ikr_new.php", // Pastikan URL sesuai
        data: formData,
        success: function(response) {
            var res = (typeof response === 'string') ? JSON.parse(response) : response;
            console.log(res); // Debug: Lihat response server
            if (res.status == 'success') {
                $('#tabel_pengguna').DataTable().ajax.reload();
                $('#modaltambahdata').modal('hide');

                // Pastikan SweetAlert2 tampil setelah data berhasil disimpan
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data ODP berhasil ditambahkan.',
                    timer: 2000,
                    showConfirmButton: false
                });
            } else {
                // Menampilkan alert error berdasarkan message dari server
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: res.message || 'Terjadi kesalahan saat mengirim data.',
                    showConfirmButton: true // Tampilkan tombol konfirmasi agar pengguna bisa menutupnya
                });
            }
        },
        error: function(xhr, status, error) {
            // Tangani error jika request gagal
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Terjadi kesalahan saat mengirim data.',
                showConfirmButton: true // Tampilkan tombol konfirmasi agar pengguna bisa menutupnya
            });
        }
    });
});


            // Menangani event klik untuk edit pengguna
            $(document).on('click', '.editpengguna', function() {
                var id = $(this).attr("id"); // Pastikan ID didapatkan dari klik tombol edit

                console.log("ID yang dipilih: " + id); // Debug: Periksa apakah ID benar

                // Reset form dan reset select2
                $('#formdatapengguna')[0].reset(); // Reset semua input form
                $('#letak_odpne').val(null).trigger('change'); // Reset select2

                // Reset peta dan marker
                if (typeof map !== 'undefined') {
                    map.setCenter({
                        lat: -7.250445,
                        lng: 112.768845
                    }); // Atur peta ke posisi default
                    marker.setMap(null); // Hapus marker sebelumnya
                }

                $.ajax({
                    url: "../controller/get_data_ikr.php",
                    method: "POST",
                    data: {
                        id: id
                    }, // Pastikan ID dikirim dengan benar
                    dataType: "JSON",
                    success: function(data) {
                        if (data.error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: data.error,
                            });
                        } else {
                            $('#modaltambahdata').modal('show');
                            $('.modal-user').text("Edit Data");
                            $('#action').val('update');
                            $('#actionform').text("Edit");

                            // Isi form dengan data yang diterima
                            $('#id').val(data.id); // Isi ID yang didapat dari response
                            $('#letak_odpne').val(data.letak_odpne).trigger('change'); // Pilih nilai yang sesuai di select2
                            $("#alamat_odp").val(data.alamat_odp);
                            $("#kd_layanan").val(data.kd_layanan);
                            $("#kelurahan").val(data.kelurahan);
                            $("#lain_lain").val(data.lain_lain);
                            $("#latitude").val(data.latitude);
                            $("#longitude").val(data.longitude);

                            // Menampilkan peta dan marker berdasarkan latitude dan longitude
                            var latitude = parseFloat(data.latitude);
                            var longitude = parseFloat(data.longitude);

                            // Jika latitude dan longitude valid, perbarui peta
                            if (!isNaN(latitude) && !isNaN(longitude)) {
                                initMap(latitude, longitude);
                                $('#latitude').val(latitude);
                                $('#longitude').val(longitude);
                            }
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat mengambil data.',
                        });
                    }
                });
            });

            $(document).on('click', '.deletepengguna', function() {
                var id = $(this).attr("id");
                if (confirm('Hapus id ' + id + '?')) {
                    $.ajax({
                        url: "../controller/delete_odp.php",
                        method: "POST",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            $('#tabel_pengguna').DataTable().ajax.reload();
                        }
                    })
                }
            });
        });
    </script>

    <!-- Script Foto -->
    <!-- <script>
        function showFotoBase64(fotoBase64) {
            var modal = $('#modalFotoBase64');
            var img = modal.find('#fotoBase64');


            if (!fotoBase64.startsWith('data:image/jpeg;base64,')) {
                fotoBase64 = 'data:image/jpeg;base64,' + fotoBase64;
            }

            img.attr('src', fotoBase64);
            modal.modal('show');
        }
    </script> -->

    <!-- Script Maps ODP -->
    <script>
        let map;
        let marker;

        function initMap(lat = -7.250445, lng = 112.768845) {
            const mapElement = document.getElementById("map");

            // Inisialisasi peta
            map = new google.maps.Map(mapElement, {
                zoom: 13,
                center: {
                    lat: lat,
                    lng: lng
                },
            });

            // Inisialisasi marker di posisi latitude dan longitude
            marker = new google.maps.Marker({
                position: {
                    lat: lat,
                    lng: lng
                },
                map: map,
                draggable: true,
            });

            // Mendengarkan event dragend pada marker untuk memperbarui latitude dan longitude
            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
            });
        }

        function openMapModal() {
            $('#formdatapengguna').on('shown.bs.modal', function() {
                google.maps.event.trigger(map, 'resize');
                map.setCenter(marker.getPosition());
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            openMapModal();
        });
    </script>
</body>

</html>
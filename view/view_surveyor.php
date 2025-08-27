<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Invoice Surveyor - Naratel</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../img/icons/kaptennaratel.png" />

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

        <!-- Sidebar -->
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-3">
                        <h3 class="text-gray-800">Invoice Surveyor</h3>
                    </div>

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
                                            <h6 class="m-0 font-weight-bold text-primary mb-3">Data Invoice Surveyor</h6>
                                            <div class="col-sm-3">
                                                <label for="statusFilter" class="col-form-label">Status</label>
                                                <select id="statusFilter" class="form-control">
                                                    <option value="verified">Verified</option>
                                                    <option value="approved" selected>Approved</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center" id="tabel_surveyor" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Total Harga</th>
                                                        <th>Deskripsi</th>
                                                        <th>Status</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Dibuat Oleh</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Total Harga</th>
                                                        <th>Deskripsi</th>
                                                        <th>Status</th>
                                                        <th>Tanggal Dibuat</th>
                                                        <th>Dibuat Oleh</th>
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
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>© 2024 PT. Naraya Telematika. All Rights Reserved.</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Main Content -->

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
    <script src="../js/select2.min.js"></script>

    <!-- JS -->
    <script>
        $(document).ready(function() {
            function formatRupiah(angka) {
                // Memastikan data adalah string sebelum diolah
                var number_string = angka.toString();

                // Memeriksa apakah angka negatif
                var isNegative = number_string[0] === '-';

                // Jika negatif, hapus tanda negatif untuk sementara
                if (isNegative) {
                    number_string = number_string.substr(1);
                }

                var sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                // Menambahkan titik jika ada ribuan
                if (ribuan) {
                    var separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                // Mengembalikan tanda negatif jika angka negatif
                if (isNegative) {
                    rupiah = '-' + rupiah;
                }

                return 'Rp. ' + rupiah;
            }

            function formatTanggal(tanggal) {
                var date = new Date(tanggal);
                var day = String(date.getDate()).padStart(2, '0');
                var month = String(date.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
                var year = date.getFullYear();
                return day + '-' + month + '-' + year;
            }

            // Fungsi untuk menginisialisasi DataTable
            function initializeDataTable(status) {
                $('#tabel_surveyor').DataTable({
                    processing: true,
                    responsive: true,
                    paging: true,
                    lengthChange: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    autoWidth: false,
                    ajax: {
                        url: '../models/surveyor.php',
                        type: 'POST',
                        data: {
                            status: status // Kirim parameter status ke server
                        }
                    },
                    columns: [{
                            data: null,
                            render: function(data, type, row, meta) {
                                return meta.row + 1;
                            },
                        },
                        {
                            data: 'total_harga',
                            render: function(data, type, row) {
                                // Cek apakah data kosong atau null
                                if (data === null || data === '') {
                                    return '-'; // Mengembalikan string kosong jika data kosong atau null
                                }
                                return formatRupiah(data);
                            },
                        },
                        {
                            data: 'deskripsi'
                        },
                        {
                            data: 'status',
                            render: function(data) {
                                return `<small class="badge badge-${data === 'verified' ? 'success' : 'warning'} text-uppercase">${data}</small>`;
                            },
                        },
                        {
                            data: 'created_at',
                        },
                        {
                            data: 'name',
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                // Cek apakah status adalah 'approved'
                                if (row.status === 'approved') {
                                    // Jika status 'approved', tampilkan tombol
                                    return `
                                    <button class="btn btn-success btn-approve" type="button" data-id="${row.id}">
                                        <i class="fas fa-check-circle"></i>
                                    </button>
                                `;
                                } else {
                                    // Jika status bukan 'approved', tampilkan string kosong
                                    return '<i class="fas fa-check-circle text-success"></i>';
                                }
                            },
                            orderable: false,
                            searchable: false,
                        }

                    ],
                });
            }

            // Inisialisasi DataTable dengan status default 'approved'
            let currentStatus = 'approved';
            initializeDataTable(currentStatus);

            // Event listener untuk perubahan status pada select
            $('#statusFilter').change(function() {
                currentStatus = $(this).val();
                $('#tabel_surveyor').DataTable().destroy(); // Hancurkan DataTable yang lama
                initializeDataTable(currentStatus); // Inisialisasi DataTable dengan status baru
            });


            function updateInvoiceStatus(invoiceId, status, keterangan = null) {
                let approvedBy = <?= ($_SESSION['username'] === 'firda') ? 24 : 1 ?>;

                // Cek apakah approved_by bukan 24
                if (approvedBy !== 24) {
                    Swal.fire(
                        'Tidak Berwenang!',
                        'Maaf, Anda tidak berwenang untuk melakukan approved. Mohon hubungi admin.',
                        'error'
                    );
                    return; // Hentikan eksekusi fungsi
                }

                let data = {
                    invoice_id: invoiceId,
                    status: status,
                    approved_by: approvedBy
                };

                // Tambahkan keterangan jika status adalah 'rejected'
                if (status === 'rejected' && keterangan) {
                    data.keterangan = keterangan;
                }

                $.ajax({
                    url: '../controller/approve_surveyor.php',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        if (response.status === 200) {
                            Swal.fire(
                                status.charAt(0).toUpperCase() + status.slice(1) + '!',
                                'Invoice berhasil di-' + status.toLowerCase() + '.',
                                'success'
                            ).then((result) => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Gagal ' + status.toLowerCase() + ' invoice: ' + response.message,
                                'error'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + status + ' ' + error);
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan pada proses pengiriman data: ' + error,
                            'error'
                        );
                    }
                });
            }

            $(document).on('click', '.btn-approve', function() {
                const invoiceId = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Anda yakin ingin approve invoice ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Approve!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        updateInvoiceStatus(invoiceId, 'verified');
                    }
                });
            });

        });
    </script>
</body>

</html>
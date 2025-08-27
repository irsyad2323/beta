<?php
session_start();

$session_username = $_SESSION['username'];
$session_nama = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Partner Relationship | NARATEL</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../img/icons/partner-relationship.png" />

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
                                            <h6 class="m-0 font-weight-bold text-primary mb-3">Data Partner Relationship</h6>

                                            <?php if (strpos($session_username, 'firda') !== false) : ?>
                                                <div class="col-sm-3">
                                                    <label for="statusFilter" class="col-form-label">Status</label>
                                                    <select id="statusFilter" class="form-control">
                                                        <option value="in_progress" selected>In Progress</option>
                                                        <option value="completed">Completed</option>
                                                    </select>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center" id="tabel_permit_status" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Kode</th>
                                                        <th>Nama</th>
                                                        <th>Kelurahan</th>
                                                        <th>RW</th>
                                                        <th>RT</th>
                                                        <th>Unit</th>
                                                        <th>Info Bank</th>
                                                        <th>Total Komitmen</th>
                                                        <th>Termin Pembayaran</th>
                                                        <?php if (strpos($session_username, 'firda') !== false) : ?>
                                                            <th>Outstanding</th>
                                                            <th>Tanggal Termin</th>
                                                            <th>Status Komitmen Pembayaran</th>
                                                            <th>Status Tracking</th>
                                                        <?php endif; ?>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Kode</th>
                                                        <th>Nama</th>
                                                        <th>Kelurahan</th>
                                                        <th>RW</th>
                                                        <th>RT</th>
                                                        <th>Unit</th>
                                                        <th>Info Bank</th>
                                                        <th>Total Komitmen</th>
                                                        <th>Termin Pembayaran</th>
                                                        <?php if (strpos($session_username, 'firda') !== false) : ?>
                                                            <th>Outstanding</th>
                                                            <th>Tanggal Termin</th>
                                                            <th>Status Komitmen Pembayaran</th>
                                                            <th>Status Tracking</th>
                                                        <?php endif; ?>
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

    <!-- Modal View Detail Partner Relationship -->
    <div class="modal fade" id="viewPermitStatusDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewPermitStatusDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewPermitStatusDetailsModalLabel">Partner Relationship Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="table-responsive">
                        <table id="modalDataTable" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jadwal Bayar</th>
                                    <th>Nominal</th>
                                    <th>Actual Bayar</th>
                                    <th>Actual Nominal</th>
                                    <th>Outstanding</th>
                                    <th>Status</th>
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

            function updateHeadOfUnitApprovalStatus(id, approval_status) {
                let decision_by = <?php echo json_encode($_SESSION['username']); ?>;

                let data = {
                    id: id,
                    decision_by: decision_by,
                    approval_status: approval_status
                };

                $.ajax({
                    url: '../controller/head_of_unit_permit_approval.php',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        if (response.status === 200) {
                            Swal.fire({
                                title: "Alhamdulillah",
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Ok',
                            }).then((result) => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                text: response.message,
                                icon: 'error',
                            })
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

            $(document).on('click', '.btn-head-of-unit-approve', function() {
                const id = $(this).data('id');

                // Menampilkan SweetAlert2 dengan pilihan status persetujuan
                Swal.fire({
                    title: 'Konfirmasi Persetujuan',
                    text: 'Pilih status persetujuan untuk permintaan ini:',
                    icon: 'question',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Setujui',
                    denyButtonText: 'Tolak',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika disetujui
                        updateHeadOfUnitApprovalStatus(id, 'approved');
                    } else if (result.isDenied) {
                        // Jika ditolak
                        updateHeadOfUnitApprovalStatus(id, 'rejected');
                    }
                });
            });

            // Fungsi untuk menginisialisasi DataTable
            function initializeDataTable(status) {
                const sessionUsername = "<?= $_SESSION['username'] ?>";
                const sessionNama = "<?= $session_nama ?>";

                $('#tabel_permit_status').DataTable({
                    processing: true,
                    responsive: true,
                    paging: true,
                    lengthChange: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    autoWidth: false,
                    ajax: {
                        url: '../models/finance_permit_status.php',
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
                            data: 'kode'
                        },
                        {
                            data: 'nama'
                        },
                        {
                            data: 'kelurahan'
                        },
                        {
                            data: 'rw'
                        },
                        {
                            data: 'rt'
                        },
                        {
                            data: 'kd_layanan',
                            render: function(data, type, row) {
                                return data == 'mlg' ? 'NRT' : data == 'pas' ? 'SBM' : data == 'mlg1' ? 'JTI' : data == 'batu' ? 'JLB' : 'BANGIL';
                            },
                        },
                        {
                            data: null,
                            render: function(data, type, row, meta) {
                                return data['nama_bank'] ? `Bank: ${data['nama_bank']}, No. Rekening: ${data['no_rekening']}, Atas Nama: ${data['atas_nama_rekening']}` : '-';
                            },
                        },
                        {
                            data: 'total_komitmen',
                            render: function(data, type, row) {
                                // Cek apakah data kosong atau null
                                if (data === null || data === '') {
                                    return '-'; // Mengembalikan string kosong jika data kosong atau null
                                }
                                return formatRupiah(data);
                            },
                        },
                        {
                            data: 'termin_pembayaran',
                            render: function(data, type, row) {
                                return `${data} Kali`;
                            },
                        },

                        ...(sessionUsername.includes('firda') ? [{
                            data: 'outstanding',
                            render: function(data, type, row) {
                                // Cek apakah data kosong atau null
                                if (data === null || data === '') {
                                    return '-'; // Mengembalikan string kosong jika data kosong atau null
                                }
                                return formatRupiah(data);
                            },
                        }] : []),
                        ...(sessionUsername.includes('firda') ? [{
                            data: 'jadwal_bayar',
                            render: function(data, type, row) {
                                // Cek apakah data kosong atau null
                                if (data === null || data === '') {
                                    return '-'; // Mengembalikan string kosong jika data kosong atau null
                                }
                                return formatTanggal(data);
                            },
                        }] : []),
                        ...(sessionUsername.includes('firda') ? [{
                            data: 'status_komitmen_pembayaran',
                            render: function(data) {
                                return `<span class="badge badge-${data === 'completed' ? 'success' : 'danger'} text-uppercase">${data}</span>`;
                            },
                        }] : []),
                        ...(sessionUsername.includes('firda') ? [{
                            data: 'approval_status',
                            render: function(data) {
                                return `<span class="badge badge-${data == 1 ? 'success' : 'danger'} text-uppercase">${data == 1 ? 'Approved' : 'Menunggu Approval'}</span>`;
                            },
                        }] : []),

                        {
                            data: null,
                            render: function(data, type, row) {
                                const ktpButton = data.ktp ? `<button type="button" class="btn btn-secondary view-dokumentasi" title="Lihat KTP" data-title="KTP" data-src="../${data.ktp}"><i class="fas fa-id-card"></i></button>` : '';

                                // Percabangan berdasarkan kd_layanan dan sessionUsername/sessionNama
                                let approvalButton = '';
                                if (data.kd_layanan === 'bangil' || data.kd_layanan === 'pas') {
                                    // Jika kd_layanan adalah 'bangil' atau 'pas', tombol untuk Fauzi
                                    if (sessionNama.includes('Fauzi')) {
                                        approvalButton = `<button type="button" class="btn btn-success btn-head-of-unit-approve" title="Persetujuan" data-id="${data.permit_status_id}"><i class="fas fa-check-circle"></i></button>`;
                                    }
                                } else if (data.kd_layanan === 'batu') {
                                    if (sessionNama.includes('Deddy') || sessionUsername.includes('pandu') || sessionUsername === 'pandu') {
                                        approvalButton = `<button type="button" class="btn btn-success btn-head-of-unit-approve" title="Persetujuan" data-id="${data.permit_status_id}"><i class="fas fa-check-circle"></i></button>`;
                                    }
                                } else {
                                    // Jika kd_layanan selain 'bangil' atau 'pas', tombol untuk Pandu
                                    if (sessionUsername.includes('pandu') || sessionUsername === 'pandu') {
                                        approvalButton = `<button type="button" class="btn btn-success btn-head-of-unit-approve" title="Persetujuan" data-id="${data.permit_status_id}"><i class="fas fa-check-circle"></i></button>`;
                                    }
                                }

                                return `
                                <div class="btn-group" role="group" aria-label="Action Buttons" style="width: 100%;">
                                    ${approvalButton}
                                    <button type="button" class="btn btn-secondary view-dokumentasi" title="Lihat Berita Acara" data-title="Berita Acara" data-src="../${data.berita_acara}"><i class="fas fa-file-alt"></i></button>
                                    ${ktpButton}
                                    <button type="button" class="btn btn-info view-details" title="Lihat Detail" data-id="${data.permit_status_id}" data-kode="${data.kode}"><i class="fas fa-info-circle"></i></button>    
                                </div>
                                `;
                            },
                            orderable: false,
                            searchable: false,
                        }
                    ],
                });
            }

            // Inisialisasi DataTable dengan status default 'in_progress'
            let currentStatus = 'in_progress';
            initializeDataTable(currentStatus);

            // Event listener untuk perubahan status pada select
            $('#statusFilter').change(function() {
                currentStatus = $(this).val();
                $('#tabel_permit_status').DataTable().destroy(); // Hancurkan DataTable yang lama
                initializeDataTable(currentStatus); // Inisialisasi DataTable dengan status baru
            });

            function updateFinanceApprovalStatus(id, status, nominal, actual_bayar, actual_nominal) {
                let approved_by = <?php echo json_encode($_SESSION['username']); ?>;

                let data = {
                    id: id,
                    actual_bayar: actual_bayar,
                    actual_nominal: actual_nominal,
                    nominal: nominal,
                    status: status,
                    approved_by: approved_by
                };

                // Tampilkan loading saat request AJAX dimulai
                Swal.fire({
                    title: 'Sedang Diproses... 😊',
                    text: 'Mohon menunggu sebentar, kami sedang memproses permintaan Anda. Terima kasih atas kesabaran Anda. ⏳',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading(); // Tampilkan animasi loading
                    }
                });

                $.ajax({
                    url: '../controller/finance_permit_approval.php',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        Swal.close(); // Tutup loading setelah mendapat respons
                        if (response.status === 200) {
                            Swal.fire(
                                'Alhamdulillah',
                                'Approval Berhasil',
                                'success'
                            ).then((result) => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Gagal ' + status.toLowerCase() + ' approval: ' + response.message,
                                'error'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.close(); // Tutup loading jika ada error
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
                const id = $(this).data('id');
                const nominal = $(this).data('nominal');

                // Mendapatkan tanggal hari ini (format YYYY-MM-DD)
                const today = new Date().toISOString().split('T')[0];

                // Simpan referensi modal yang sedang terbuka
                const activeModal = $('.modal.show'); // Simpan modal HTML yang terbuka (jika ada)

                // Tutup modal HTML yang aktif
                activeModal.modal('hide');

                // Tampilkan SweetAlert2 dengan form input
                Swal.fire({
                    title: 'Masukkan Detail Pembayaran',
                    html: `
                                <input id="actual_bayar" class="swal2-input" placeholder="Actual Bayar" type="date" value="${today}">
                                <input id="actual_nominal" class="swal2-input" placeholder="Actual Nominal" type="number" min="0" value="${nominal}">
                            `,
                    focusConfirm: false,
                    preConfirm: () => {
                        const actualBayar = Swal.getPopup().querySelector('#actual_bayar').value;
                        const actualNominal = Swal.getPopup().querySelector('#actual_nominal').value;

                        if (!actualBayar || !actualNominal) {
                            Swal.showValidationMessage('Semua field harus diisi!');
                        }

                        return {
                            actual_bayar: actualBayar,
                            actual_nominal: actualNominal
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const actual_bayar = result.value.actual_bayar;
                        const actual_nominal = result.value.actual_nominal;

                        updateFinanceApprovalStatus(id, 'verified', nominal, actual_bayar, actual_nominal);
                    } else if (result.isDismissed) {
                        // Buka kembali modal HTML jika SweetAlert ditutup tanpa konfirmasi
                        activeModal.modal('show');
                    }
                });
            });

            // Event delegation untuk klik pada button view details
            $(document).on('click', '.view-details', function() {
                var permit_status_id = $(this).data('id');
                var kode = $(this).data('kode'); // Ambil kode dari data-kode di button

                // Lakukan permintaan AJAX ke backend untuk mendapatkan data berdasarkan permit_status_id
                $.ajax({
                    url: '../models/finance_detail_permit_status.php',
                    type: 'POST',
                    data: {
                        permit_status_id: permit_status_id
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            var data = response.data;
                            var modalContent = '';

                            // Generate rows untuk tabel modal
                            data.forEach(function(item, index) {
                                const sessionUsername = "<?= $_SESSION['username'] ?>";

                                // Tombol Lihat Kwitansi
                                const kwitansiButton = item.kwitansi ?
                                    `<button type="button" class="btn btn-info view-dokumentasi" title="Lihat Kwitansi" data-title="Kwitansi" data-src="../${item.kwitansi}"><i class="fas fa-receipt"></i></button>` :
                                    '';

                                // Tombol Approve
                                const approveButton = item.status === 'unverified' &&
                                    (sessionUsername.includes('firda') || sessionUsername === 'firda') &&
                                    response.approval_status == 1 ?
                                    `<button class="btn btn-success btn-approve" type="button" data-id="${item.id}" data-nominal="${item.nominal}">
                                        <i class="fas fa-check-circle"></i>
                                    </button>` :
                                    '';

                                modalContent += `
                                                <tr>
                                                    <td>${index + 1}</td>
                                                    <td>${item.nama}</td>
                                                    <td>${item.jadwal_bayar}</td>
                                                    <td>${item.nominal}</td>
                                                    <td>${item.actual_bayar || '-'}</td>
                                                    <td>${item.actual_nominal || '-'}</td>
                                                    <td>${item.outstanding || '-'}</td>
                                                    <td>
                                                        <small class="badge badge-${item.status === 'verified' ? 'success' : 'danger'} text-uppercase">${item.status}</small>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Action Buttons" style="width: 100%;">
                                                            ${kwitansiButton}
                                                            ${approveButton}
                                                        </div>
                                                    </td>
                                                </tr>`;
                            });

                            // Hapus DataTables yang ada jika ada
                            if ($.fn.DataTable.isDataTable('#modalDataTable')) {
                                $('#modalDataTable').DataTable().clear().destroy();
                            }

                            // Masukkan data ke dalam tbody
                            $('#modalDataTable tbody').html(modalContent);

                            // Inisialisasi DataTables
                            $('#modalDataTable').DataTable({
                                processing: true,
                                responsive: true,
                                paging: true,
                                lengthChange: true,
                                searching: true,
                                ordering: true,
                                info: true,
                                autoWidth: false,
                            });

                            // Update judul modal dengan data-id
                            kode == null ? $('#viewPermitStatusDetailsModalLabel').text('Partner Relationship Details') : $('#viewPermitStatusDetailsModalLabel').text(`Partner Relationship Details - Kode: ${kode}`);

                            // Tampilkan modal
                            $('#viewPermitStatusDetailsModal').modal('show');
                        } else {
                            console.error('Terjadi kesalahan: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan:', error);
                    },
                });
            });

            // Event delegation untuk klik pada link dokumentasi/berita acara
            $(document).on('click', '.view-dokumentasi', function(e) {
                e.preventDefault();
                const fileSrc = $(this).data('src');
                const modalTitle = $(this).data('title');

                // Tentukan apakah file adalah gambar atau PDF
                const fileExtension = fileSrc.split('.').pop().toLowerCase();
                const isImage = ['jpg', 'jpeg', 'png', 'gif', 'bmp'].includes(fileExtension);
                const isPDF = fileExtension === 'pdf';

                // Set judul modal
                $('#viewDokumentasiModalLabel').text(modalTitle);

                // Bersihkan konten modal
                $('#modalContent').empty();

                if (isImage) {
                    // Jika file adalah gambar
                    $('#modalContent').html(`<img id="modalImage" src="${fileSrc}" class="img-fluid" alt="Dokumentasi">`);
                } else if (isPDF) {
                    // Jika file adalah PDF
                    $('#modalContent').html(`<iframe src="${fileSrc}" width="100%" height="500px"></iframe>`);
                } else {
                    // Jika file bukan gambar atau PDF, tampilkan pesan
                    $('#modalContent').html('<p>File tidak didukung untuk pratinjau.</p>');
                }

                // Tampilkan modal
                $('#viewDokumentasiModal').modal('show');
            });

            // Ketika sebuah modal ditutup, Bootstrap secara otomatis menghapus kelas 'modal-open' dari elemen body,
            // yang menyebabkan halaman bisa di-scroll lagi. Namun, jika masih ada modal lain yang terbuka,
            // kita harus menambahkan kembali kelas 'modal-open' ke elemen body agar scroll tetap terkunci.
            // Kode ini memastikan bahwa selama ada modal yang masih terlihat, halaman tetap tidak bisa di-scroll.
            $(document).on('hidden.bs.modal', '.modal', function() {
                if ($('.modal:visible').length) {
                    $('body').addClass('modal-open');
                }
            });

        });
    </script>
</body>

</html>
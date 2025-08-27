$(document).ready(function() {
    // Inisialisasi DataTable untuk modal proses saat modal dibuka
    $('#modal_list_proses').on('shown.bs.modal', function () {
        if (!$.fn.DataTable.isDataTable('#tabel_proses')) {
            $('#tabel_proses').DataTable({
                "processing": true,
                "ajax": {
                    "url": "ajax/get_proses_data.php",
                    "type": "GET",
                    "dataSrc": "data"
                },
                "columns": [
                    { "data": 0 }, // NO
                    { "data": 1 }, // Jenis WO
                    { "data": 2 }, // ID
                    { "data": 3 }, // Tanggal
                    { "data": 4 }, // Nama
                    { "data": 5 }, // Telpon
                    { "data": 6 }, // Layanan
                    { "data": 7 }, // PIC
                    { "data": 8 }  // Action
                ],
                "pageLength": 10,
                "language": {
                    "processing": "Loading...",
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered": "(disaring dari _MAX_ total data)",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });
        }
    });

    // Destroy DataTable saat modal ditutup
    $('#modal_list_proses').on('hidden.bs.modal', function () {
        if ($.fn.DataTable.isDataTable('#tabel_proses')) {
            $('#tabel_proses').DataTable().destroy();
        }
    });
});
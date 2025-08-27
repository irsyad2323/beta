$(document).ready(function() {
    // Inisialisasi DataTable untuk modal solved saat modal dibuka
    $('#modal_list_solved').on('shown.bs.modal', function () {
        if (!$.fn.DataTable.isDataTable('#tabel_done')) {
            $('#tabel_done').DataTable({
                "processing": true,
                "ajax": {
                    "url": "ajax/get_solved_data.php",
                    "type": "GET",
                    "dataSrc": "data"
                },
                "columns": [
                    { "data": 0 }, // NO
                    { "data": 1 }, // ID
                    { "data": 2 }, // Tanggal
                    { "data": 3 }, // Nama
                    { "data": 4 }, // Jenis WO
                    { "data": 5 }, // Modem
                    { "data": 6 }, // Kabel 1
                    { "data": 7 }, // Kabel 2
                    { "data": 8 }, // Kabel 3
                    { "data": 9 }  // PIC
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

    // Destroy DataTable saat modal ditutup untuk menghindari konflik
    $('#modal_list_solved').on('hidden.bs.modal', function () {
        if ($.fn.DataTable.isDataTable('#tabel_done')) {
            $('#tabel_done').DataTable().destroy();
        }
    });
});
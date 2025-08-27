	
var table = $('#tabel_penggunae').DataTable({
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
"responsive": true,

});	
var table = $('#tabel_slot1').DataTable({
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
"responsive": true,

});	
var table = $('#tabel_pen').DataTable({
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
var table = $('#tabel_slot2').DataTable({
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
var table = $('#tabel_slot3').DataTable({
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
var table = $('#tabel_slot4').DataTable({
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
var table = $('#tabel_slot5').DataTable({
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
var table = $('#tabel_slot6').DataTable({
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

var table = $('#tabel_pros').DataTable({
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
	
var table = $('#tabel_visit').DataTable({
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
var table = $('#tabel_pengguna').DataTable({
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
var table = $('#tabel_ikr').DataTable({
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

/* var table = $('#report').DataTable({
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

}); */

var table = $('#tabel_mntnodp').DataTable({
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

var table = $('#tabel_mntnodp').DataTable({
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

$(document).ready(function () {
    // Inisialisasi DataTable
    var table = $('#tabel_slot').DataTable({
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "models/model_stok_slot.php", // URL server-side processing
            "type": "POST",
            "data": function (d) {
                // Kirim parameter filter tanggal
                d.start_date = $('#start_date').val();
                d.end_date = $('#end_date').val();
            }
        },
        "columns": [
            { "data": "no" },
            { "data": "slot" },
            { "data": "tanggal" },
            { "data": "lyn_area" },
            { "data": "tot_slot" },
            { "data": "action" }
        ]
    });

    // Event untuk tombol filter
    $('#filter').click(function (event) {
        event.preventDefault(); // Hentikan refresh halaman
        table.ajax.reload(); // Reload data tabel
    });
}); 
$(document).ready(function () {
  const lastBBM = $('#last_bbm_date').val(); // dari server
  if (lastBBM) {
    const lastDate = new Date(lastBBM);
    const today = new Date();
    const diffTime = Math.abs(today - lastDate);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    if (diffDays < 2) {
      $('#nominal_bbm').prop('disabled', true);
      $('#bbmWarning').removeClass('d-none');
    }
  }
});


 	$(document).ready(function () {
    var table = $('#tabel_sudah').DataTable({
        responsive: true,
        processing: true,
        language: {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
        },
        ajax: {
            url: "models/modal_reimburse.php",
            type: "POST"
        },
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        columns: [
            { data: 'targets' },
            { data: 'username_fal' },
            { data: 'nama_fal' },
            { data: 'tgl_ins_datetime' },
            { data: 'jenis_wo' },
            { data: 'pic_ikr' },
            { data: 'jenis_unit' },
            { data: 'alamat_fal' },
            { data: 'lain_lain' }
        ],
        columnDefs: [{
            targets: 0,
            checkboxes: {
                selectRow: true,
                selectCallback: function (nodes, selected) {
                    $('input[type="checkbox"]', nodes).iCheck('update');
                },
                selectAllCallback: function (nodes, selected, indeterminate) {
                    $('input[type="checkbox"]', nodes).iCheck('update');
                }
            }
        }],
        select: {
            style: 'multi'
        },
        order: [[1, 'asc']],
        drawCallback: function () {
            $('input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_flat-green'
            });
        }
    });

    // Event: Checkbox Select All
    $(table.table().container()).on('ifChanged', '.dt-checkboxes-select-all input[type="checkbox"]', function () {
        var col = table.column($(this).closest('th'));
        col.checkboxes.select(this.checked);
    });

    // Event: Checkbox in body
    $(table.table().container()).on('ifChanged', '.dt-checkboxes', function () {
        var cell = table.cell($(this).closest('td'));
        cell.checkboxes.select(this.checked);
    });

    // Update 'Select All' checkbox if individual checkbox changed
    $(document).on('ifUnchecked', '.check', function () {
        $('#check-all').iCheck('uncheck');
    });

    $(document).on('ifChecked', '.check', function () {
        if ($('.check:checked').length === $('.check').length) {
            $('#check-all').iCheck('check');
        }
    });

    // Tombol Kirim Data Terpilih
    $("#set").click(function (event) {
	event.preventDefault();

	var otable = $('#tabel_sudah').DataTable();
	var rows_selected = otable.column(0).checkboxes.selected();
	var pilih_id = [];

	// Kosongkan container input
	$("#inputContainer").empty();

	$.each(rows_selected, function (index, rowId) {
		var checkbox = $('<div>' + rowId + '</div>').find('input[type="checkbox"]');
		var dataId = checkbox.val();
		var jenis_wo = checkbox.attr('jenis_wo');
		var pic_ikr = checkbox.attr('pic_ikr');
		var tgl_ins_datetime = checkbox.attr('tgl_ins_datetime');
		var kd_layanan = checkbox.attr('kd_layanan');

		if (dataId) {
			pilih_id.push({ id: dataId, jenis_wo: jenis_wo, pic_ikr: pic_ikr, tgl_ins_datetime: tgl_ins_datetime, kd_layanan: kd_layanan });

			// Tambahkan input hidden untuk dikirim
			$("#inputContainer").append(`
				<input type="hidden" name="data[${index}][id]" value="${dataId}">
				<input type="hidden" name="data[${index}][jenis_wo]" value="${jenis_wo}">
				<input type="hidden" name="data[${index}][pic_ikr]" value="${pic_ikr}">
				<input type="hidden" name="data[${index}][tgl_ins_datetime]" value="${tgl_ins_datetime}">
				<input type="hidden" name="data[${index}][kd_layanan]" value="${kd_layanan}">
			`);
		}
	});

	if (pilih_id.length === 0) {
		Swal.fire('Peringatan', 'Tidak ada data yang dipilih.', 'warning');
		return;
	}

	// Tampilkan JSO di form
	$('#data_json').val(JSON.stringify(pilih_id, null, 2));

	// Tampilkan modal
	$('#modalReimburse').modal('show');
});

$('#formReimburse').submit(function (e) {
  e.preventDefault();

  let formData = $(this).serialize(); // ambil semua data form (termasuk hidden input)

  $.ajax({
    type: 'POST',
    url: 'controller/action_reimburse_set.php',
    data: formData,
    success: function (response) {
      Swal.fire({
        title: 'Berhasil!',
        text: response,
        icon: 'success'
      }).then(() => {
        $('#modalReimburse').modal('hide');
        window.location.reload(); // reload halaman
      });
    },
    error: function (xhr, status, error) {
      Swal.fire('Error', 'Terjadi kesalahan saat menyimpan data.', 'error');
    }
  });
});



    // Tombol Cetak Data
    $('#submit_select_client').click(function (event) {
        event.preventDefault();

        var all_id = $("#all_id").val();
        var pihak1 = $("#pihak1").val();
        var pihak2 = $("#pihak2").val();

        if (!all_id || !pihak1 || !pihak2) {
            Swal.fire('Error', 'Lengkapi semua field sebelum mencetak.', 'error');
            return;
        }

        $.ajax({
            type: "POST",
            async: false,
            url: "../controller/laporan-cetak.php",
            data: { all_id: all_id, pihak1: pihak1, pihak2: pihak2 },
            dataType: 'html'
        }).done(function (data) {
            var printWindow = window.open();
            printWindow.document.write(data);
            printWindow.print();
        });
    });
});

 


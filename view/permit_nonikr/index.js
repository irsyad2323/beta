$(document).ready(function () {
  // Inisialisasi DataTables
  $('#tabel_partner_head').DataTable({
    processing: true,
    responsive: true,
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    ajax: {
      url: '../../models/permit.php',
      type: 'POST',
    },
    columns: [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      { data: 'nama' },
      { data: 'alamat' },
      { data: 'rt' },
      { data: 'rw' },
      { data: 'kelurahan' },
      { data: 'tlp' },
      { data: 'jabatan' },
      {
        data: 'kd_layanan',
        render: function (data) {
          // Cek apakah data kosong atau null
          if (data === null || data === '') {
            return '-'; // Mengembalikan string kosong jika data kosong atau null
          }

          // Peta nilai untuk data
          const valueMap = {
            mlg: 'NARATEL',
            SBM: 'SBM',
            batu: 'JLB',
            mlg1: 'JTI',
          };

          // Menentukan nilai yang akan ditampilkan berdasarkan data
          const displayText = valueMap[data] || data; // Tampilkan data apa adanya jika tidak ditemukan di peta

          return `<small class="badge badge-primary text-uppercase">${displayText}</small>`;
        },
      },
      {
        data: 'nama_bank',
        render: function (data, type, row) {
          return data ? data : '-'; // Jika data kosong, tampilkan '-'
        },
      },
      {
        data: 'no_rekening',
        render: function (data, type, row) {
          return data ? data : '-'; // Jika data kosong, tampilkan '-'
        },
      },
      {
        data: 'atas_nama_rekening',
        render: function (data, type, row) {
          return data ? data : '-'; // Jika data kosong, tampilkan '-'
        },
      },
      {
        data: null,
        render: function (data) {
          // return `
          //               <a id="${data.id}"
          //                    permit_status_id="${data.permit_status_id}"
          //                    jadwal_bayar="${data.jadwal_bayar}"
          //                    nominal="${data.nominal}"
          //                    class="btn btn-warning ${editButtonClass} editPermit"><i class="fas fa-pencil-alt"></i>
          //                 </a>
          //         `;

          return `
                  <a key_fal="${data.key_fal}"
                     nama="${data.nama}"
                     alamat="${data.alamat}"
                     rt="${data.rt}"
                     rw="${data.rw}"
                     kelurahan="${data.kelurahan}"
                     tlp="${data.tlp}"
                     jabatan="${data.jabatan}"
                     kd_layanan="${data.kd_layanan}" 
                     nama_bank="${data.nama_bank}" 
                     no_rekening="${data.no_rekening}" 
                     atas_nama_rekening="${data.atas_nama_rekening}" 
                     class="btn btn-warning editPermit"><i class="fas fa-pencil-alt"></i>
                  </a>
                  `;
        },
        orderable: false,
        searchable: false,
      },
    ],
  });

  // Handler untuk tombol "Tambah Permit"
  $('.tambahPartnerHead').on('click', () => $('#modalTambahPartnerHead').modal('show'));

  // READ - Ambil data permit berdasarkan key_fal
  $(document).on('click', '.editPermit', function () {
    var attributes = ['key_fal', 'nama', 'alamat', 'rt', 'rw', 'kelurahan', 'tlp', 'jabatan', 'kd_layanan', 'nama_bank', 'no_rekening', 'atas_nama_rekening'];

    attributes.forEach(function (attr) {
      $('#' + attr + '1').val($(this).attr(attr));
    }, this);

    $('#modalEditPartnerHead').modal('show');
  });

  // INSERT
  $('#addPartnerHeadForm').submit(function (e) {
    e.preventDefault();

    // Mengambil data dari form
    const formData = new FormData(this);

    // Mengirim data ke backend menggunakan AJAX
    $.ajax({
      url: '../../controller/action_insert_permit.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        Swal.fire('Alhamdulillah', 'Data permit berhasil ditambah.', 'success').then(function (success) {
          window.location.reload(true);
        });
      },
      error: function (jqXHR) {
        alert(jqXHR);
      },
    });
  });

  // UPDATE - Simpan data permit baru
  $('#updatePartnerHeadForm').on('submit', function (e) {
    e.preventDefault();

    var fd = new FormData();
    var key_fal = $('#key_fal1').val();
    var permit_status_id = $('#permit_status_id1').val();
    var nama = $('#nama1').val();
    var alamat = $('#alamat1').val();
    var rt = $('#rt1').val();
    var rw = $('#rw1').val();
    var kelurahan = $('#kelurahan1').val();
    var tlp = $('#tlp1').val();
    var jabatan = $('#jabatan1').val();
    var kd_layanan = $('#kd_layanan1').val();
    var nama_bank = $('#nama_bank1').val();
    var no_rekening = $('#no_rekening1').val();
    var atas_nama_rekening = $('#atas_nama_rekening1').val();

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
    fd.append('nama_bank', nama_bank);
    fd.append('no_rekening', no_rekening);
    fd.append('atas_nama_rekening', atas_nama_rekening);

    $.ajax({
      type: 'POST',
      url: '../../controller/action_edit_permit_update.php',
      data: fd,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        Swal.fire('Alhamdulillah', 'Data permit berhasil diperbarui.', 'success').then(function (success) {
          window.location.reload(true);
        });
      },
    });
  });

  // Event delegation untuk klik pada link kwitansi
  $(document).on('click', '.view-kwitansi', function (e) {
    e.preventDefault();
    const imageSrc = $(this).data('src');
    $('#modalImage').attr('src', imageSrc);
    $('#viewDokumentasiModal').modal('show');
  });
});
